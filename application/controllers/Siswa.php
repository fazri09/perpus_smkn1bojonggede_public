<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends Fazri_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');

        // proteksi halaman dashboard
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $data['title'] = 'Siswa';
        $data['content'] = 'siswa';
        $data['siswa'] = $this->Siswa_model->get_all();
        $data['kelas'] = $this->Kelas_model->get_all();
        $data['jurusan'] = $this->Jurusan_model->get_all();
        $this->load->view('layouts/template', $data);
    }

     public function add() {
         $data = [
            'nis' => $this->input->post('nis'),
            'nama' => $this->input->post('nama'),
            'id_jurusan' => $this->input->post('jurusan'),
            'id_kelas' => $this->input->post('kelas'),
            'no_hp' => $this->input->post('no_hp'),
            'created_by' => $this->session->userdata('user_id')
        ];

        if ($this->Siswa_model->insert($data)) {
            // Jika update sukses
            $this->session->set_flashdata('notif', 'Data Siswa berhasil diinput.');
            $this->session->set_flashdata('notif_type', 'success');  // Set flashdata sukses
        } else {
            // Jika update gagal
            $this->session->set_flashdata('notif', 'Gagal menginput data siswa.');
            $this->session->set_flashdata('notif_type', 'danger');  // Set flashdata gagal
        }

        redirect('siswa'); // arahkan kembali ke halaman utama siswa
    }

    public function edit()
    {
        $id = $this->input->post('id'); 
        $nis = $this->input->post('nis');
        $nama = $this->input->post('nama');
        $kelas = $this->input->post('kelas');
        $jurusan = $this->input->post('jurusan');
        $no_hp = $this->input->post('no_hp');

        // Proses update siswa
        $data = [
            'nis' => $nis,
            'nama' => $nama,
            'id_kelas' => $kelas,
            'id_jurusan' => $jurusan,
            'no_hp' => $no_hp
        ];

        // Panggil model untuk update data siswa berdasarkan id
        if ($this->Siswa_model->update($id, $data)) {
            // Jika update sukses
            $this->session->set_flashdata('notif', 'Data Siswa berhasil diperbarui.');
            $this->session->set_flashdata('notif_type', 'success');  // Set flashdata sukses
        } else {
            // Jika update gagal
            $this->session->set_flashdata('notif', 'Gagal memperbarui data siswa.');
            $this->session->set_flashdata('notif_type', 'danger');  // Set flashdata gagal
        }

        // Setelah update, redirect ke halaman data jurusn
        redirect('siswa');
    }

}