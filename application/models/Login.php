<?php
class login extends CI_Model{
    function __construct(){
        $this->load->database();
    }
    function ulogin($tname,$pass){

       $this->db->select("*");
       $this->db->from("teams");
       $this->db->where("name",$tname);
       $this->db->where("passwd",$pass);
       $udata = $this->db->get();
       return $udata->row_array();
    }
    function getfext($tid){
        $this->db->select("platform");
        $this->db->from("teams");
        $this->db->where("id",$tid);
        $udata = $this->db->get();
        return $udata->row_array();
    }
}