<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Fazri_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');

        // proteksi halaman dashboard
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $data['title'] = 'Dashboard';
        $data['content'] = 'dashboard';
        $this->load->view('layouts/template', $data);
    }
}