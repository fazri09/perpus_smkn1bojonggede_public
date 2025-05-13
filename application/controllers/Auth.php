<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
    }

    public function login()
    {
        if ($this->input->post()) {

            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->User_model->check_login($username, $password);
            if ($user) {
                $this->session->set_userdata('user_id', $user->id);
                redirect('dashboard');
            } else {
                // Set flashdata untuk menampilkan error
                $this->session->set_flashdata('login_error', 'Username atau Password salah');
                redirect('auth/login'); // Redirect ke halaman login setelah gagal
            }
        }
        // Jika form pertama kali dimuat tanpa POST
        $this->load->view('auth/login');
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        redirect('auth/login');
    }
}
