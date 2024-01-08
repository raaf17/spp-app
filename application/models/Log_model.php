<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log_model extends CI_Model
{
    public function save_log($param)
    {
        $query = $this->db->insert_string('tbl_log', $param);
        $ex    = $this->db->query($query);
        return $this->db->affected_rows($query);
    }

    public function get_activity_log()
    {
        $this->db->order_by('log_time', 'DESC');
        return $this->db->get('tbl_log', 8)->result();
    }

    public function count_activity()
    {
        $query = $this->db->get('tbl_log');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
