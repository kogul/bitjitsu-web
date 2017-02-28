<?php
class verify extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    function gethash($teamid){
        $this->db->select("*");
        $this->db->from("teams");
        $this->db->where("id",$teamid);
        $filedet = $this->db->get();
        return $filedet->row_array();
    }
    function puthash($finf){
        $this->db->where("id",$finf['id']);
        $this->db->update("teams",$finf);
    }
    function inshash($finf){
        $this->db->insert("teams",$finf);
    }
    function setdirty($id){
        $this->db->where("id",$id);
        $this->db->set("sub_count","sub_count+1",FALSE);
        $this->db->update("teams",array("dirty"=>1));
    }
    function checksub($id){
        $this->db->select("rate_limit,time_sub");
        $this->db->from("teams");
        $this->db->where("id",$id);
        $det = $this->db->get();
        return $det->row_array();
    }
    function uprate($id){
        $this->db->where("id",$id);
        $this->db->set("rate_limit","rate_limit+1",FALSE);
        $this->db->update("teams");
    }
    function resetrate($id){
        $this->db->where("id",$id);
        $this->db->set("rate_limit",0);
        $this->db->update("teams");
    }
}