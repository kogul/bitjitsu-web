<?php
class leader extends CI_Model{
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
}
?>