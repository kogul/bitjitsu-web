<?php
class user extends CI_Controller{
    function index(){
        $this->load->view("header");
        $this->load->view("login");
        $this->load->view("footer");
    }
    function gameplay(){
        $this->load->view("header");
        $this->load->view("gameplay");
        $this->load->view("footer");
    }
    function spectator(){
        $this->load->view("header");
        $this->load->view("spectator");
        $this->load->view("footer");
    }
    function submission(){
        $_SESSION['tid']=300;
        $this->load->view("header");
        if($_FILES){
            $file = $_FILES["filesub"]["name"];
            $tfile = $_FILES["filesub"]["tmp_name"];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $file="newname.".$ext;
            if(move_uploaded_file($tfile,base_url("/bitjitsu-web/Submissions/").$file)) {
                $cont = file_get_contents(base_url("/bitjitsu-web/Submissions/") . $file);
                $cont = md5($cont);
                $this->load->model("verify");
                $oldcont = $this->verify->gethash($_SESSION['tid']);
                if (empty($oldcont)) {
                    $fileinf = array(
                        'tid' => $_SESSION['tid'],
                        'salt' => $cont
                    );
                    $this->verify->inshash($fileinf);
                    $this->load->view("success");

                } else {
                    if (strcmp($cont, $oldcont['salt'])) {
                        $fileinf = array(
                            'tid' => $_SESSION['tid'],
                            'salt' => $cont
                        );
                        $this->verify->puthash($fileinf);
                        $this->load->view("success");
                    }else{
                        $data['msg'] = "This file has been submitted already";
                        $this->load->view("error",$data);
                    }
                }
            }else{
                $data['msg'] = "Your file has not been uploaded.";
                $this->load->view("error",$data);
            }
        }
        $this->load->view("submission");
        $this->load->view("footer");
    }
    function leaderboard(){
        $this->load->model("leader");
        $this->load->view("header");
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
}