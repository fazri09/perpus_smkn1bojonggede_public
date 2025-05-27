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

    public function addpinjam()
    {
        $buku_id_pinjam = $this->input->post('buku_id_pinjam');
        $siswa     = $this->input->post('siswa');
        $jml_pinjaman = $this->input->post('jml_pinjaman');
        $tgl_pinjam = $this->input->post('tgl_pinjam');
        $note = $this->input->post('note');
        $user_id = $this->session->userdata('user_id');


        $result = $this->Pos_model->add_pinjaman($buku_id_pinjam, $siswa, $jml_pinjaman,$tgl_pinjam,$note,$user_id);

        if ($result) {
            $this->session->set_flashdata('notif', 'Sukses meminjam buku.');
            $this->session->set_flashdata('notif_type', 'success');
        } else {
            $this->session->set_flashdata('notif', 'Gagal meminjam buku.');
            $this->session->set_flashdata('notif_type', 'danger');
        }

        redirect('buku');
    }

    public function pinjaman_kembali()
    {
        $input = json_decode(file_get_contents("php://input"), true);
        $id = $input['id'] ?? null;
        $tanggal_kembali = $input['tanggal_kembali'] ?? null;

        if ($id && $tanggal_kembali) {
            $update = $this->Pos_model->updatePengembalian($id, $tanggal_kembali);

            if ($update) {
                echo json_encode(['status' => true, 'message' => 'Pengembalian berhasil']);
            } else {
                echo json_encode(['status' => false, 'message' => 'Gagal update data']);
            }
        } else {
            echo json_encode(['status' => false, 'message' => 'Data tidak lengkap']);
        }
    }


}