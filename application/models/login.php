<?php
class login extends CI_Model{
   /* function __construct(){
        $this->load->database();
    }*/
    function ulogin($tname,$pass){

       $this->mongo_db->select("*");
       $this->mongo_db->from("teams");
       $this->mongo_db->where("name",$tname);
       $this->mongo_db->where("passwd",$pass);
       $udata = $this->mongo_db->get();
       return $udata->row_array();
    }
    function getfext($tid){
        $this->mongo_db->select("platform");
        $this->mongo_db->from("teams");
        $this->mongo_db->where("id",$tid);
        $udata = $this->mongo_db->get();
        return $udata->row_array();
    }
}