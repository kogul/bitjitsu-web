<?php
class user extends CI_Controller{


    function index(){

        $data['userdata']=$this->session->userdata();
        $this->load->view("header",$data);
        if($_POST){
            $post = filter_var_array($_POST,FILTER_SANITIZE_STRING);
            if(strlen($post['pass'])>6) {
                $pass = md5($post['pass']);;
                $this->load->model("login");
                $udata=$this->login->ulogin($post['usrname'],$pass);
                unset($udata['passwd']);
                if(empty($udata)){
                    $data['msg']= "Invalid Credentials";
                }else {
                    $udata['logged_in'] = TRUE;
                    $this->session->set_userdata($udata);
                    redirect('/');
                }
            }else{
                $data['msg'] = "Invalid password";
            }
        }
        $this->load->view("login",$data);
        $this->load->view("footer");
    }
    function gameplay(){
        $data['userdata']=$this->session->userdata();
        $this->load->view("header",$data);
        $this->load->view("gameplay");
        $this->load->view("footer");
    }
    function spectator(){
        $data['userdata']=$this->session->userdata();
        $this->load->view("header",$data);
        $this->load->view("spectator");
        $this->load->view("footer");
    }
    function submission(){
        $id = $this->session->userdata('id');
        $data['userdata']=$this->session->userdata();
        $this->load->view("header",$data);
        if($_FILES){
            $file = $_FILES["filesub"]["name"];
            $tfile = $_FILES["filesub"]["tmp_name"];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $file="file".$this->session->userdata('id').".".$ext;
            if(move_uploaded_file($tfile,base_url("/bitjitsu-web/Submissions/").$file)) {
                $cont = file_get_contents(base_url("/bitjitsu-web/Submissions/") . $file);
                $cont = md5($cont);
                $this->load->model("verify");
                $oldcont = $this->verify->gethash($id);
                if (empty($oldcont)) {
                    $fileinf = array(
                        'id' => $id,
                        'checksum' => $cont,
                        'platform' => $ext
                    );
                    $this->verify->inshash($fileinf);
                    $this->verify->setdirty($id);
                    $data['msg'] = "Your file has been uploaded";
                    $data['mtype'] = "success";

                    //make api call
                    //get filename
                    //rename()
                    $obj = array("extension" =>$ext,
                        "team_id" => intval($this->session->userdata('id'))
                    );
                    $obj = json_encode($obj);
                    $url = 'http://foss.amritanet.edu:8888/api/getfilename/';
                    $ch = curl_init($url);
                    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"POST");
                    curl_setopt($ch,CURLOPT_POSTFIELDS,$obj);
                    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                            'Content-Type: application/json',
                            'Content-Length: '.strlen($obj))
                    );

                    $resp = curl_exec($ch);
                    $resp = json_decode($resp);
                    $oldfile = base_url('/bitjitsu-web/Submissions/file'.$this->session->userdata('id').".".$ext);
                    if(!rename($oldfile,base_url('/bitjitsu-web/Submissions/').$resp->data)){
                        copy($oldfile,base_url('/bitjitsu-web/Submissions/').$resp->data);
                        unlink($oldfile);
                    }
                    redirect('/user/processing');

                } else {
                    if (strcmp($cont, $oldcont['checksum'])) {
                        $fileinf = array(
                            'id' => $id,
                            'checksum' => $cont,
                            'platform' => $ext
                        );
                        $this->verify->puthash($fileinf);
                        $this->verify->setdirty($id);
                        $data['msg'] = "Your file has been uploaded";
                        $data['mtype'] = "success";
                        $obj = array("extension" =>$ext,
                            "team_id" => intval($this->session->userdata('id'))
                        );
                        $obj = json_encode($obj);
                        $url = 'http://foss.amritanet.edu:8888/api/getfilename/';
                        $ch = curl_init($url);
                        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"POST");
                        curl_setopt($ch,CURLOPT_POSTFIELDS,$obj);
                        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                                'Content-Type: application/json',
                                'Content-Length: '.strlen($obj))
                        );

                        $resp = curl_exec($ch);
                        $resp = json_decode($resp);
                        $oldfile = base_url('/bitjitsu-web/Submissions/file'.$this->session->userdata('id').".".$ext);
                        if(!rename($oldfile,base_url('/bitjitsu-web/Submissions/').$resp->data)){
                            copy($oldfile,base_url('/bitjitsu-web/Submissions/').$resp->data);
                            unlink($oldfile);
                        }
                        redirect('/user/processing');
                    }else{
                        $data['msg'] = "This file has been submitted already";
                        $data['mtype'] = "error";
                    }
                }
            }else{
                $data['msg'] = "Your file has not been uploaded.";
                $data['mtype'] = "error";
            }
        }
        $this->load->view("submission",$data);
        $this->load->view("footer");
    }
    function processing(){
        $this->load->model("login");
        $data['userdata']=$this->session->userdata();
       $this->load->view("header",$data);
       $data['tid'] = $this->session->userdata('id');
       $this->load->view("processing",$data);
       $this->load->view("footer");
    }
    function inewsub(){
        $obj = array('team_id' => intval($this->session->userdata('id')));
        $obj = json_encode($obj);
        $url = "http://foss.amritanet.edu:8888/api/newsub/";
        $ch = curl_init($url);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"POST");
        curl_setopt($ch,CURLOPT_POSTFIELDS,$obj);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: '.strlen($obj))
        );

        $resp = curl_exec($ch);
        echo $resp;
    }
    function leaderboard(){
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
        redirect('/');
    }
}