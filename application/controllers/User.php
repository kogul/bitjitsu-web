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

        $this->load->view("header");
        if($_FILES){
            $file = $_FILES["filesub"]["name"];
            $tfile = $_FILES["filesub"]["tmp_name"];
            if(move_uploaded_file($tfile, base_url("/BitJitsu/Submissions/").$file)){
                $this->load->view("success");
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