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
        $data['jml_buku'] = $this->Buku_model->get_jumlah_buku();
        $data['jml_siswa'] = $this->Siswa_model->get_jumlah_siswa();        
        $data['jml_stok_buku'] = $this->Buku_model->get_total_stok_buku();
        $data['top_buku'] = $this->Buku_model->get_top_6_buku_terbanyak_dipinjam();
        $data['top_jurusan'] = $this->Pos_model->get_jumlah_pinjaman_per_jurusan();
        $data['top_siswa'] = $this->Pos_model->get_top_5_siswa_peminjam();
        $this->load->view('layouts/template', $data);
    }

    public function grafik_peminjaman_bulanan()
    {
        $data = $this->Pos_model->get_data_peminjaman_per_bulan();
        echo json_encode($data);
    }

}