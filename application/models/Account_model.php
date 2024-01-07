<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account_model extends CI_Model
{
    public function login_check($username, $password)
    {
        $query = $this->db->query("call login_check('" . $username . "','" . $password . "')");
        mysqli_next_result($this->db->conn_id);
        return $query->num_rows();
    }

    public function login_get($username, $password)
    {
        $query = $this->db->query("call login_check('" . $username . "','" . $password . "')");
        mysqli_next_result($this->db->conn_id);
        return $query->result();
    }

    public function level_get($id_level)
    {
        $query = $this->db->query("call level_get('" . $id_level . "')");
        mysqli_next_result($this->db->conn_id);
        return $query->result();
    }

    public function siswa_check($username, $password)
    {
        $query = $this->db->query("call siswa_check('" . $username . "', '" . $password . "')");
        mysqli_next_result($this->db->conn_id);
        return $query->result();
    }

    public function siswa_get($username, $password)
    {
        $query = $this->db->query("call siswa_check('" . $username . "', '" . $password . "')");
        mysqli_next_result($this->db->conn_id);
        return $query->result();
    }
}
