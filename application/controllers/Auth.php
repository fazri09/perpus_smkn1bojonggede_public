<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Fazri_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function login()
    {
        if ($this->input->post()) {

            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->User_model->check_login($username, $password);
            if ($user) {

                $ip_address = $this->input->ip_address();
                $now = date('Y-m-d H:i:s');

                // Update last_login dan last_ip
                $this->User_model->update_login_info($user->id, $now, $ip_address);

                $this->session->set_userdata('user_id', $user->id);
                $this->session->set_userdata('user_nama', $user->nama);
                $this->session->set_userdata('user_role', $user->role);
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
