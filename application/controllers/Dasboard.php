<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dasboard extends CI_Controller
{


    public function index()
    {
        $data = [
            'title' => 'Dasboard',
            'users' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
        ];

        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/sidebar', $data);
        $this->load->view('Templates/topbar', $data);
        $this->load->view('Dasboard/index', $data);
        $this->load->view('Templates/footer', $data);
    }
}
