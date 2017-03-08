<?php
class leader extends CI_Model{

    function getleader(){
        //$this->load->database();
        $this->mongo_db->select("*");
        $this->mongo_db->from("teams");
        $this->mongo_db->order_by("rank");
        $scores = $this->mongo_db->get();
        return $scores->result();
    }
    function getsum($gid){
      //  $this->load->database();
        $this->mongo_db->select("*");
        $this->mongo_db->from("games");
        $this->mongo_db->where("id",$gid);
        $summery = $this->mongo_db->get();
        return $summery->row_array();
    }
    function getcount($tid){
     //   $this->load->database();
        $this->mongo_db->select_max("sub_count");
        $this->mongo_db->from("games");
        $this->mongo_db->where("team_id",$tid);
        //$this->mongo_db->where('team_id',$tid);
        $maxcount = $this->mongo_db->get();
        return $maxcount->row_array();
    }
    function getreplays($tid,$subnum){
       // $this->load->database();
        $this->mongo_db->select("*");
        $this->mongo_db->where("team_id",$tid);
        $this->mongo_db->where("sub_count",$subnum);
        $this->mongo_db->from("games");
        $replays = $this->mongo_db->get();
        return $replays->result_array();
    }
}
?>