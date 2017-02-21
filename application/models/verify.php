<?php
class verify extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    function gethash($teamid){
        $this->db->select("*");
        $this->db->from("fileinfo");
        $this->db->where("tid",$teamid);
        $filedet = $this->db->get();
        return $filedet->row_array();
    }
    function puthash($finf){
        $this->db->where("tid",$finf['tid']);
        $this->db->update("fileinfo",$finf);
    }
    function inshash($finf){
        $this->db->insert("fileinfo",$finf);
    }
}