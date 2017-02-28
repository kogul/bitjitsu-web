<?php
class leader extends CI_Model{
    function __construct(){

    }

    function getleader(){
        $this->load->database();
        $this->db->select("*");
        $this->db->from("teams");
        $this->db->order_by("rank","desc");
        $scores = $this->db->get();
        return $scores->result();
    }
    function getsum($gid){
        $this->load->database();
        $this->db->select("*");
        $this->db->from("games");
        $this->db->where("id",$gid);
        $summery = $this->db->get();
        return $summery->row_array();
    }
    function getcount($tid){
        $this->load->database();
        $this->db->select_max("sub_count");
        $this->db->from("games");
        $this->db->where("team_id",$tid);
        //$this->db->where('team_id',$tid);
        $maxcount = $this->db->get();
        return $maxcount->row_array();
    }
    function getreplays($tid,$subnum){
        $this->load->database();
        $this->db->select("*");
        $this->db->where("team_id",$tid);
        $this->db->where("sub_count",$subnum);
        $this->db->from("games");
        $replays = $this->db->get();
        return $replays->result_array();
    }
}
?>