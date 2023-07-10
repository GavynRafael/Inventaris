<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function getUsers()
    {
        return $this->db->get('users')->result_array(); 
    }
    public function tambahRuang($data)
    {
        return $this->db->insert('ruangan', $data);
    }
}
