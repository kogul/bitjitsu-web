<?php
$GLOBALS['redir_base']="";
$GLOBALS['game_hostname']="foss.amritanet.edu:8888";
$GLOBALS['rate_limit']=30;
$GLOBALS['submission_dir']="/bitjitsu-web/submissions/";
class user extends CI_Controller{

    function index(){
        $data['pagetitle'] = "Home";
        $data['userdata']=$this->session->userdata();
        $this->load->view("hheader",$data);
    }
    function documentation(){
        $data['pagetitle'] = "Documentation";
        $this->load->view("documentation",$data);
    }
    function resources(){
        $data['userdata']=$this->session->userdata();
        $data['pagetitle']= "Resources";
        $this->load->view("header",$data);
        $this->load->view("resources");
        $this->load->view("footer");
    }
    function login(){
        if($this->session->userdata('logged_in')){
            redirect($GLOBALS['redir_base'].'/');
        }
        $data['pagetitle']="Login";
        $data['userdata']=$this->session->userdata();
        $this->load->view("header",$data);
        if($_POST){
            $post = filter_var_array($_POST,FILTER_SANITIZE_STRING);
            if(strlen($post['pass'])>6) {
                $pass = md5($post['pass']);
                $this->load->model("login");
                $udata=$this->login->ulogin($post['usrname'],$pass);
                unset($udata['passwd']);
                if(empty($udata)){
                    $data['msg']= "Invalid Credentials";
                }else {
                    $udata['logged_in'] = TRUE;
                    $this->session->set_userdata($udata);
                    redirect($GLOBALS['redir_base'].'/');
                }
            }else{
                $data['msg'] = "Invalid password";
            }
        }
        $this->load->view("login",$data);
        $this->load->view("footer");
    }
    function gameplay(){
        if(!($this->session->userdata('logged_in'))){
            redirect($GLOBALS['redir_base'].'/user/login');
        }
        $this->load->model("leader");
        $data['file']= $this->input->get('json');
        $sum = $this->leader->getsum($data['file']);
        $data['summary'] = $sum['summary'];
        $data['pagetitle'] = "Gameplay";
        $data['userdata']=$this->session->userdata();
        $this->load->view("header",$data);
        $this->load->view("gameplay",$data);
        $this->load->view("footer");
    }
    function spectator(){
        if(!($this->session->userdata('logged_in'))){
            redirect($GLOBALS['redir_base'].'/user/login');
        }
        $data['pagetitle'] = "Spectator";
        $this->load->model("leader");
        $data['file']= $this->input->get('json');
        $sum = $this->leader->getsum($data['file']);
        $data['summary'] = $sum['summary'];
        $data['userdata']=$this->session->userdata();
        $this->load->view("header",$data);
        $this->load->view("spectator",$data);
        $this->load->view("footer");
    }
    function submission(){
        if(!($this->session->userdata('logged_in'))){
            redirect($GLOBALS['redir_base'].'/user/login');
        }
        date_default_timezone_set('Asia/Kolkata');
        $data['pagetitle'] = "Submission";
        $id = $this->session->userdata('id');
        $data['userdata']=$this->session->userdata();
        $this->load->view("header",$data);

        $id = $this->session->userdata('id');
        if($_POST) {
            $plat = $this->input->post('platform');
            $this->load->model("verify");
            $lastsub = $this->verify->checksub($id);
            $oldsub = new DateTime();
            $oldsub->setTimestamp(strtotime($lastsub['time_sub']));
            $newsub = new DateTime("now");
            $split_time = $newsub->diff($oldsub);
            $hour = $split_time->format("%H");
            $mins = $split_time->format("%i");

            $file = $_FILES["filesub"]["name"];
            $tfile = $_FILES["filesub"]["tmp_name"];
            $ext = pathinfo($file, PATHINFO_EXTENSION);

            if (($hour > 1 || $mins > 30) || ($hour < 1 && $mins < 30 && $lastsub['rate_limit'] < $GLOBALS['rate_limit'])) {
                if (($hour > 1 || $mins > 30)) {
                    $this->verify->resetrate($id);
                }
                $obj = array("extension" => $ext,
                    "team_id" => intval($this->session->userdata('id'))
                );
                $obj = json_encode($obj);
                $url = 'http://'.$GLOBALS['game_hostname'].'/api/getfilename/';
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $obj);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($obj))
                );

                $resp = curl_exec($ch);
                $resp = json_decode($resp);
                $target = base_url($GLOBALS['submission_dir']);
                $file = $resp->data;

                if (move_uploaded_file($tfile, $target . $file)) {
                    $cont = file_get_contents($target . $file);
                    $cont = md5($cont);
                    $oldcont = $this->verify->gethash($id);

                    if (empty($oldcont)) {
                        $fileinf = array(
                            'id' => $id,
                            'checksum' => $cont,
                            'source' => $resp->data,
                            'platform' => $plat,
                            'time_sub' => date('m/d/Y G:i:s')
                        );

                        $this->verify->inshash($fileinf);
                        $this->verify->setdirty($id);
                        $this->verify->uprate($id);
                        $data['msg'] = "Your file has been uploaded";
                        $data['mtype'] = "success";
                        redirect($GLOBALS['redir_base'].'/user/processing');
                    } else {
                        if (strcmp($cont, $oldcont['checksum'])) {
                            $old = $this->verify->getsource($id);
                            unlink($target.$old['source'].'.'.$ext);
                            $fileinf = array(
                                'id' => $id,
                                'checksum' => $cont,
                                'source' => $resp->data,
                                'platform' => $plat,
                                'time_sub' => date('m/d/Y h:i:s')
                            );
                            $this->verify->puthash($fileinf);
                            $this->verify->uprate($id);
                            $this->verify->setdirty($id);

                            $data['msg'] = "Your file has been uploaded";
                            $data['mtype'] = "success";

                            redirect($GLOBALS['redir_base'].'/user/processing');
                        } else {
                            unlink($target.$file);
                            $data['msg'] = "This file has been submitted already";
                            $data['mtype'] = "error";
                        }
                    }
                } else {
                    $data['msg'] = "Your file has not been uploaded.";
                    $data['mtype'] = "error";
                }
            }
        else{
                $data['msg'] = "You can make only ".$GLOBALS['rate_limit']." submissions in 30 minutes.";
                $data['mtype'] = "error";
            }
        }
        $this->load->view("submission",$data);
        $this->load->view("footer");
    }
    function processing(){
        if(!($this->session->userdata('logged_in'))){
            redirect($GLOBALS['redir_base'].'/');
        }
        $data['pagetitle'] = "Processing";
        $this->load->model("login");
        $data['userdata']=$this->session->userdata();
       $this->load->view("header",$data);
       $data['tid'] = $this->session->userdata('id');
       $this->load->view("processing",$data);
       $this->load->view("footer");
    }
    function inewsub(){
        if(!($this->session->userdata('logged_in'))){
            redirect($GLOBALS['redir_base'].'/user/login');
        }
        $id = $this->session->userdata('id');
            $obj = array('team_id' => intval($id));
            $obj = json_encode($obj);
            $url = "http://".$GLOBALS['game_hostname']."/api/newsub/";
            $ch = curl_init($url);
            curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"POST");
            curl_setopt($ch,CURLOPT_POSTFIELDS,$obj);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: '.strlen($obj))
            );
            $resp = curl_exec($ch);
            header('Content-type:application/json;charset=utf-8');
            echo $resp;
    }
    function track(){
        if(!($this->session->userdata('logged_in'))){
            redirect('/user/login');
        }
        $gid = $this->input->post('game_id');
        $obj= json_encode($gid);
        $url = "http://".$GLOBALS['game_hostname']."/api/track/";
        $ch = curl_init($url);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"POST");
        curl_setopt($ch,CURLOPT_POSTFIELDS,$obj);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: '.strlen($obj))
        );
        $resp = curl_exec($ch);
        header('Content-type:application/json;charset=utf-8');
        echo $resp;
    }
    function getsummary(){
        if(!($this->session->userdata('logged_in'))){
            redirect('/user/login');
        }
        $gid = $this->input->post('game_id');
        $this->load->model("leader");
        $summery = $this->leader->getsum($gid);
        header('Content-type:application/json;charset=utf-8');
        echo json_encode($summery);
    }
    function selectcount(){
        $data['pagetitle'] = "Replay";
        $data['userdata'] = $this->session->userdata();
        $this->load->model('leader');
        $max = $this->leader->getcount($this->session->userdata('id'));
        $data['max'] = $max['sub_count'];
      $this->load->view('header',$data);
      $this->load->view('selectreplay',$data);
      $this->load->view('footer');
    }
    function fetchreplay(){
       $subnum = $this->input->post("sub_num");
       $data['userdata'] = $this->session->userdata();
       $data['pagetitle'] = "Replays";
        $this->load->model('leader');
       $replays = $this->leader->getreplays($this->session->userdata('id'),$subnum);
       $data['replaylist'] = $replays;
       $data['subcount'] = $subnum;
       $this->load->view("header",$data);
       $this->load->view("fetchedreplay",$data);
       $this->load->view("footer");
    }
    function leaderboard(){
        $data['pagetitle'] = "Leaderboard";
        $this->load->model("leader");
        $data['userdata']=$this->session->userdata();
        $this->load->view("header",$data);
        $scoreset = $this->leader->getleader();
        $data['scores']= $scoreset;
        $this->load->view("leaderboard",$data);
        $this->load->view("footer");
    }
    function update(){
        $this->load->model("leader");
        $scoreset = $this->leader->getleader();
        $data['scores']= $scoreset;
        return $this->load->view("dynleaderboard",$data);
    }
    function logout(){
        $this->session->unset_userdata($this->session->userdata('id'));
        $this->session->sess_destroy();
        redirect($GLOBALS['redir_base'].'/');
    }
}