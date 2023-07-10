<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function Manajemen()
    {

        
        $data = [
            'title' => 'Manajemen User',
            'users' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            //tampilkan akun
            'user' => $this->db->get_where('users')->result_array(),
            // 'admin' => $this->db->get_where('users',['role' => 1])->result_array(),
        ];

        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/sidebar', $data);
        $this->load->view('Templates/topbar', $data);
        $this->load->view('Admin/Manajemen', $data);
        $this->load->view('Templates/footer', $data);
    }

    public function Ruangan()
    {

        
        $data = [
            'title' => 'Ruangan',
            'users' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            'ruangan' => $this->db->get_where('ruangan')->result_array(),
        
        ];

        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/sidebar', $data);
        $this->load->view('Templates/topbar', $data);
        $this->load->view('Admin/Ruangan', $data);
        $this->load->view('Templates/footer', $data);
    }

    public function Tambah_Ruangan()
    {
        $this->load->model('Admin_model');

        $data = [
            'user_id' => htmlspecialchars($this->input->post('user_id', true)),
            'nama_ruangan' => htmlspecialchars($this->input->post('nama_ruangan', true)),
        ];

        $this->Admin_model->tambahRuang($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Ruangan berhasil di tambahkan 
      </div>');
        redirect('Admin/Ruangan');
        
    }
}
