<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends Fazri_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');

        // proteksi halaman dashboard
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $data['title'] = 'Kelas';
        $data['content'] = 'kelas';
        $data['kelas'] = $this->Kelas_model->get_all();
        $this->load->view('layouts/template', $data);
    }

    public function add() {
         $data = [
            'nama_kelas' => $this->input->post('nama_kelas'),
            'created_by' => $this->session->userdata('user_id')
        ];

        if ($this->Kelas_model->insert($data)) {
            // Jika update sukses
            $this->session->set_flashdata('notif', 'Data Kelas berhasil diinput.');
            $this->session->set_flashdata('notif_type', 'success');  // Set flashdata sukses
        } else {
            // Jika update gagal
            $this->session->set_flashdata('notif', 'Gagal menginput data kelas.');
            $this->session->set_flashdata('notif_type', 'danger');  // Set flashdata gagal
        }

        redirect('kelas'); // arahkan kembali ke halaman utama kelas
    }

    public function edit()
    {
        $id = $this->input->post('id'); 
        $nama_kelas = $this->input->post('nama_kelas');

        // Proses update kelas
        $data = [
            'nama_kelas' => $nama_kelas
        ];

        // Panggil model untuk update data kelas berdasarkan id
        if ($this->Kelas_model->update($id, $data)) {
            // Jika update sukses
            $this->session->set_flashdata('notif', 'Data Kelas berhasil diperbarui.');
            $this->session->set_flashdata('notif_type', 'success');  // Set flashdata sukses
        } else {
            // Jika update gagal
            $this->session->set_flashdata('notif', 'Gagal memperbarui data kelas.');
            $this->session->set_flashdata('notif_type', 'danger');  // Set flashdata gagal
        }

        // Setelah update, redirect ke halaman data kelas
        redirect('kelas');
    }
}