<?php
class leader extends CI_Model{

    function getleader(){
        $this->load->database();
        $this->db->select("*");
        $this->db->from("teams");
        $this->db->order_by("rank");
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

    function getlogs($gid){
        $this->load->database();
        $this->db->select("log_id");
        $this->db->where("game_id",$gid);
        $this->db->from("errorlogs");
        $resp['error'] = $this->db->get()->result_array()[0]['log_id'];
        $this->db->select("log_id");
        $this->db->where("game_id",$gid);
        $this->db->from("debuglogs");
        $resp['debug'] = $this->db->get()->result_array()[0]['log_id'];
        $this->db->select("log_id");
        $this->db->where("game_id",$gid);
        $this->db->from("movelogs");
        $resp['move'] = $this->db->get()->result_array()[0]['log_id'];
        return $resp;
    }
}
?>