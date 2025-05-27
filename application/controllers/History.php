<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends Fazri_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');

        // proteksi halaman dashboard
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $data['title'] = 'History Pinjaman';
        $data['content'] = 'history';
        $data['history'] = $this->Pos_model->history_pinjaman();
        $this->load->view('layouts/template', $data);
    }
    
}