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

    public function get_data_peminjaman_per_bulan()
    {
        $query = $this->db->query("
            SELECT 
                MONTH(tgl_pinjam) AS bulan,
                COUNT(*) AS total 
            FROM pos 
            WHERE tgl_pinjam IS NOT NULL AND tgl_pinjam != '0000-00-00'
            GROUP BY MONTH(tgl_pinjam)
            ORDER BY MONTH(tgl_pinjam)
        ");

        $result = $query->result();

        // Siapkan array 12 bulan default 0
        $data = array_fill(1, 12, 0);
        foreach ($result as $row) {
            $data[(int) $row->bulan] = (int) $row->total;
        }

        return array_values($data); // Ubah jadi [0, 3, 12, ...]
    }

    public function get_jumlah_pinjaman_per_jurusan()
    {
        $this->db->select('
            j.nama_jurusan,
            COALESCE(SUM(p.qty), 0) as jumlah_pinjaman
        ');
        $this->db->from('mst_jurusan j');
        $this->db->join('siswa s', 's.id_jurusan = j.id', 'left');
        $this->db->join('pos p', 'p.siswa = s.id AND p.siswa IS NOT NULL', 'left');
        $this->db->group_by('j.id');
        $this->db->order_by('jumlah_pinjaman', 'DESC');
        return $this->db->get()->result();
    }
    
    public function get_top_5_siswa_peminjam() {
        $this->db->select('s.nis, s.nama, k.nama_kelas, SUM(p.qty) AS jumlah_buku_dipinjam');
        $this->db->from('pos p');
        $this->db->join('siswa s', 'p.siswa = s.id');
        $this->db->join('mst_kelas k', 's.id_kelas = k.id', 'left');
        $this->db->where('p.siswa IS NOT NULL');
        $this->db->group_by('s.id');
        $this->db->order_by('jumlah_buku_dipinjam', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result();
    }

    
}
