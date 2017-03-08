<?php
class verify extends CI_Model{
    /*function __construct(){
        $this->load->database();
    }*/

    function gethash($teamid){
        $this->mongo_db->select("*");
        $this->mongo_db->from("teams");
        $this->mongo_db->where("id",$teamid);
        $filedet = $this->mongo_db->get();
        return $filedet->row_array();
    }
    function getsource($teamid){
        $this->mongo_db->select("*");
        $this->mongo_db->from("teams");
        $this->mongo_db->where("id",$teamid);
        $source = $this->mongo_db->get();
        return $source->row_array();
    }
    function puthash($finf){
        $this->mongo_db->where("id",$finf['id']);
        $this->mongo_db->update("teams",$finf);
    }
    function inshash($finf){
        $this->mongo_db->insert("teams",$finf);
    }
    function setdirty($id){
        $this->mongo_db->where("id",$id);
        $this->mongo_db->set("sub_count","sub_count+1",FALSE);
        $this->mongo_db->update("teams",array("dirty"=>1));
    }
    function checksub($id){
        $this->mongo_db->select("rate_limit,time_sub");
        $this->mongo_db->from("teams");
        $this->mongo_db->where("id",$id);
        $det = $this->mongo_db->get();
        return $det->row_array();
    }
    function uprate($id){
        $this->mongo_db->where("id",$id);
        $this->mongo_db->set("rate_limit","rate_limit+1",FALSE);
        $this->mongo_db->update("teams");
    }
    function resetrate($id){
        $this->mongo_db->where("id",$id);
        $this->mongo_db->set("rate_limit",0);
        $this->mongo_db->update("teams");
    }
}