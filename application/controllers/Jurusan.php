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

        $this->load->library('upload');

        $config['upload_path'] = './uploads/jurusan/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048; // max 2MB
        $config['file_name'] = uniqid('jurusan_');

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('foto_jurusan')) {
            // Jika upload gagal
            $error = $this->upload->display_errors();
            // Jika update gagal
            $this->session->set_flashdata('notif', 'Gagal upload gambar : '.$error);
            $this->session->set_flashdata('notif_type', 'danger');  // Set flashdata gagal
            redirect('jurusan');
        } else {
            $upload_data = $this->upload->data();

            $data = [
                'nama_jurusan' => $this->input->post('nama_jurusan'),
                'singkatan_jurusan' => $this->input->post('singkatan_jurusan'),
                'foto_jurusan' => $upload_data['file_name'],
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
    }

    public function edit()
    {
        $id = $this->input->post('id'); 
        $nama_jurusan = $this->input->post('nama_jurusan');
        $singkatan_jurusan = $this->input->post('singkatan_jurusan');

        // Load library upload CI
        $config['upload_path'] = './uploads/jurusan/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048; // 2MB
        $config['file_name'] = 'jurusan_'.$id.'_'.time();
        $this->load->library('upload', $config);

        $gambar_file = null;
        if (!empty($_FILES['gambar_jurusan']['name'])) {
            if ($this->upload->do_upload('gambar_jurusan')) {
                $uploadData = $this->upload->data();
                $gambar_file = $uploadData['file_name'];

                // Bisa juga hapus file lama jika ada, untuk pengelolaan storage
            } else {
                // Upload gagal, bisa tangani error atau abaikan
                $error = $this->upload->display_errors();

                $this->session->set_flashdata('notif', 'Gagal upload gambar : '.$error);
                $this->session->set_flashdata('notif_type', 'danger');  // Set flashdata gagal
                redirect('jurusan');
                die;
                // echo $error; or set flashdata error
            }
        }


        // Proses update jurusan
        $data = [
            'nama_jurusan' => $nama_jurusan,
            'singkatan_jurusan' => $singkatan_jurusan
        ];
        if ($gambar_file) {
                $data['foto_jurusan'] = $gambar_file;
        }

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