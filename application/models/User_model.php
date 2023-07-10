<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function tambahBarang($data)
    {
        return $this->db->insert('barang', $data);
    }

    public function updateData($data, $where)
    {
        $this->db->update($data, $where);
        return $this->db->affected_rows();
    }

    public function tambahRiwayat($data)
    {
        return $this->db->insert('riwayat_kerusakan', $data);
    }
}
