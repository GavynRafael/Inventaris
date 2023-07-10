<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function Ruangan()
    {
        $data = [
            'title' => 'Ruangan',
            'users' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
        ];

        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/sidebar', $data);
        $this->load->view('Templates/topbar', $data);
        $this->load->view('User/Ruangan', $data);
        $this->load->view('Templates/footer', $data);
    }

    public function detailRuangan($id_ruangan)
    {
        $data = [
            'title' => 'Detail Ruangan',
            'users' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            'ruangan' => $this->db->get_where('ruangan', ['id' => $id_ruangan])->row_array()
        ];

        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/sidebar', $data);
        $this->load->view('Templates/topbar', $data);
        $this->load->view('User/Detail_ruangan', $data);
        $this->load->view('Templates/footer', $data);
    }

    public function tambahBarang($id)
    {
        $ruangan_id = $id;

        $data = [
            'ruangan_id' => $ruangan_id,
            'kode_barang' => htmlspecialchars($this->input->post('kode_barang', true)),
            'nama_barang' => htmlspecialchars($this->input->post('nama_barang', true)),
            'status_barang' => 1,
            'date_created' => date('Y-m-d H:i:s')
        ];
        var_dump($data);

        $this->User_model->tambahBarang($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           barang berhasil di tambahkan 
          </div>');
        redirect('User/detailRuangan/' . $ruangan_id);
    }

    public function laporKerusakan()
    {
        $ruanganId = $this->input->post('ruanganid');
        $barangId = $this->input->post('barangid');
        $userId = $this->input->post('userid');

        $status = [
            'status_barang' => 3,
        ];


        // proses update status barang

        $this->db->where('id', $barangId);
        $this->db->update('barang', $status);

        //proses tambah ke tabel riwayat kerusakan

        $data = [
            'barang_id' => $barangId,
            'ruangan_id' => $ruanganId,
            'user_id' => $userId,
            'alasan' => $this->input->post('alasan')
        ];

        $this->User_model->tambahRiwayat($data);

        redirect('User/Ruangan');
    }

    public function Riwayat()
    {
        $data = [
            'title' => 'Riwayat kerusakan',
            'users' => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()
        ];

        $this->load->view('Templates/header', $data);
        $this->load->view('Templates/sidebar', $data);
        $this->load->view('Templates/topbar', $data);
        $this->load->view('User/Riwayat', $data);
        $this->load->view('Templates/footer', $data);
    }
}
