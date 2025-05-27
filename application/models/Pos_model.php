<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos_model extends CI_Model {

    public function add_stok($buku_id, $qty, $created_by)
    {
        $data = [
            'buku_id'     => $buku_id,
            'qty'         => $qty,
            'type'        => 'IN',
            'created_by'  => $created_by
        ];

        return $this->db->insert('pos', $data);
    }

    public function add_pinjaman($buku_id_pinjam, $siswa, $jml_pinjaman,$tgl_pinjam,$note,$user_id)
    {
        $data = [
            'buku_id'     => $buku_id_pinjam,
            'siswa'       => $siswa,
            'qty'         => $jml_pinjaman,
            'tgl_pinjam'  => $tgl_pinjam,
            'type'        => 'OUT',
            'created_by'  => $user_id,
            'note'  => $note
        ];

        return $this->db->insert('pos', $data);
    }

    public function list_pinjaman()
    {
        $this->db->select('
            pos.id,
            siswa.nis,
            siswa.nama,
            buku.kode_buku,
            buku.nama_buku,
            pos.qty,
            pos.tgl_pinjam,
            pos.type,
            pos.note
        ');
        $this->db->from('pos');
        $this->db->join('siswa', 'siswa.id = pos.siswa', 'left');
        $this->db->join('buku', 'buku.id = pos.buku_id', 'left');
        $this->db->where('pos.type', 'OUT');
        $this->db->order_by('pos.tgl_pinjam', 'DESC');
        
        return $this->db->get()->result();
    }

    public function history_pinjaman()
    {
        $this->db->select('
            pos.id,
            siswa.nis,
            siswa.nama,
            buku.kode_buku,
            buku.nama_buku,
            pos.qty,
            pos.tgl_pinjam,
            pos.tgl_kembali,
            pos.type,
            pos.note
        ');
        $this->db->from('pos');
        $this->db->join('siswa', 'siswa.id = pos.siswa', 'left');
        $this->db->join('buku', 'buku.id = pos.buku_id', 'left');
        $this->db->where('pos.type', 'BACK');
        $this->db->order_by('pos.tgl_pinjam', 'DESC');
        
        return $this->db->get()->result();
    }


    public function updatePengembalian($id, $tanggal_kembali)
    {
        $data = [
            'type' => 'BACK',
            'tgl_kembali' => $tanggal_kembali 
        ];
        $this->db->where('id', $id);
        return $this->db->update('pos', $data);
    }
    
}
