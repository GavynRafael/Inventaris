<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function getUser($email)
    {
        // Query untuk mendapatkan user berdasarkan email
        $this->db->where('email', $email);
        return $this->db->get('users')->row_array();
    }

    public function insertUser($data)
    {
        return $this->db->insert('users', $data);
    }
}
