<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Auth_model');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',[
            'required' => 'harap masukkan {field} terlebih dahulu!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required',[
            'required' => 'harap masukkan {field} terlebih dahulu!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('Auth/login', $data);
        } else {
            $this->login();
        }
    }

    private function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->Auth_model->getUser($email);


        if ($user) {
            // cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                // echo 'password benar';
                redirect('Dasboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			The password is wrong!
		  </div>');
                //   echo 'password salah';
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Email is not registered! 
		  </div>');
            //   echo 'password salah';
            redirect('Auth');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('username', 'username', 'required|trim',[
        'required' => 'Kolom {field} harus di isi!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
            'is_unique' => '{field} sudah terdaftar!',
            'required' => 'kolon {field} harus di isi!',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'kolom {field} harus di isi!',
        ]);
        $this->form_validation->set_rules('role', 'role', 'required|trim|in_list[1,2]', [
            'in_list' => 'pilih {field} yang tersedia',
            'required' => 'pilih {field} yang tersedia'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'User registration';
            $this->load->view('Auth/register', $data);
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => $this->input->post('role'),
                'date_created' => date('Y-m-d H:i:s')
            ];

          
            $this->Auth_model->insertUser($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Congratulation your account has been created! 
		  </div>');
            redirect('Auth');
        }
    }
    public function logout()
    {
        // Hapus session dan redirect ke halaman login
        $this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			you have been logout
		  </div>');
        $this->session->unset_userdata('user_id');
        redirect('Auth');
    }
}
