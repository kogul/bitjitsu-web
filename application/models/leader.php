<?php
class leader extends CI_Model{
    function getleader(){
        $this->load->database();
        $this->db->select("*");
        $this->db->from("scorecard");
        $this->db->order_by("tscore","desc");
        $scores = $this->db->get();
        return $scores->result();
    }
}
?>