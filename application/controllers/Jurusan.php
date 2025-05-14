<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends Fazri_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');

        // proteksi halaman dashboard
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $data['title'] = 'Jurusan';
        $data['content'] = 'jurusan';
        $data['jurusan'] = $this->Jurusan_model->get_all();
        $this->load->view('layouts/template', $data);
    }

    public function add() {
         $data = [
            'nama_jurusan' => $this->input->post('nama_jurusan'),
            'singkatan_jurusan' => $this->input->post('singkatan_jurusan'),
            'created_by' => $this->session->userdata('user_id')
        ];

        if ($this->Jurusan_model->insert($data)) {
            // Jika update sukses
            $this->session->set_flashdata('notif', 'Data Jurusan berhasil diinput.');
            $this->session->set_flashdata('notif_type', 'success');  // Set flashdata sukses
        } else {
            // Jika update gagal
            $this->session->set_flashdata('notif', 'Gagal menginput data jurusan.');
            $this->session->set_flashdata('notif_type', 'danger');  // Set flashdata gagal
        }

        redirect('jurusan'); // arahkan kembali ke halaman utama jurusan
    }

    public function edit()
    {
        $id = $this->input->post('id'); 
        $nama_jurusan = $this->input->post('nama_jurusan');
        $singkatan_jurusan = $this->input->post('singkatan_jurusan');

        // Proses update jurusan
        $data = [
            'nama_jurusan' => $nama_jurusan,
            'singkatan_jurusan' => $singkatan_jurusan
        ];

        // Panggil model untuk update data jurusan berdasarkan id
        if ($this->Jurusan_model->update($id, $data)) {
            // Jika update sukses
            $this->session->set_flashdata('notif', 'Data Jurusan berhasil diperbarui.');
            $this->session->set_flashdata('notif_type', 'success');  // Set flashdata sukses
        } else {
            // Jika update gagal
            $this->session->set_flashdata('notif', 'Gagal memperbarui data jurusan.');
            $this->session->set_flashdata('notif_type', 'danger');  // Set flashdata gagal
        }

        // Setelah update, redirect ke halaman data jurusn
        redirect('jurusan');
    }
}