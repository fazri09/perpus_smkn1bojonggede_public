<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends Fazri_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');

        // proteksi halaman dashboard
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $data['title'] = 'Buku';
        $data['content'] = 'buku';
        $data['buku'] = $this->Buku_model->get_all_buku_with_stok();

        $this->load->view('layouts/template', $data);
    }
    
    public function add() {
         $data = [
            'kode_buku' => $this->input->post('kode_buku'),
            'nama_buku' => $this->input->post('nama_buku'),
            'created_by' => $this->session->userdata('user_id')
        ];

        if ($this->Buku_model->insert($data)) {
            // Jika update sukses
            $this->session->set_flashdata('notif', 'Data Buku berhasil diinput.');
            $this->session->set_flashdata('notif_type', 'success');  // Set flashdata sukses
        } else {
            // Jika update gagal
            $this->session->set_flashdata('notif', 'Gagal menginput data buku.');
            $this->session->set_flashdata('notif_type', 'danger');  // Set flashdata gagal
        }

        redirect('buku'); // arahkan kembali ke halaman utama buku
    }

    public function edit()
    {
        $id_buku = $this->input->post('id_buku'); // Ambil id buku dari form
        $kode_buku = $this->input->post('kode_buku');
        $nama_buku = $this->input->post('nama_buku');

        // Proses update buku
        $data = [
            'kode_buku' => $kode_buku,
            'nama_buku' => $nama_buku,
            'updated_by' => $this->session->userdata('user_id')
        ];

        // Panggil model untuk update data buku berdasarkan id
        if ($this->Buku_model->update_book($id_buku, $data)) {
            // Jika update sukses
            $this->session->set_flashdata('notif', 'Data Buku berhasil diperbarui.');
            $this->session->set_flashdata('notif_type', 'success');  // Set flashdata sukses
        } else {
            // Jika update gagal
            $this->session->set_flashdata('notif', 'Gagal memperbarui data buku.');
            $this->session->set_flashdata('notif_type', 'danger');  // Set flashdata gagal
        }

        // Setelah update, redirect ke halaman data buku
        redirect('buku');
    }

    public function addstok()
    {
        $buku_id = $this->input->post('buku_id');
        $qty     = $this->input->post('qty');
        $user_id = $this->session->userdata('user_id');

        $result = $this->Pos_model->add_stok($buku_id, $qty, $user_id);

        if ($result) {
            $this->session->set_flashdata('notif', 'Stok berhasil ditambahkan.');
            $this->session->set_flashdata('notif_type', 'success');
        } else {
            $this->session->set_flashdata('notif', 'Gagal menambahkan stok.');
            $this->session->set_flashdata('notif_type', 'danger');
        }

        redirect('buku');
    }

}