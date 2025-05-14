<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fazri_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();

        // Set timezone di sini
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Buku_model');
        $this->load->model('Pos_model');
        $this->load->model('User_model');
        $this->load->model('Jurusan_model');
    }
}
