<?php
class login extends CI_Model{
    function ulogin($tid,$pass){
       $this->load->database();
       $this->db->select("*");
       $this->db->from("teams");
       $this->db->where("id",$tid);
       $this->db->where("passwd",$pass);
       $udata = $this->db->get();
       return $udata->row_array();
    }
}