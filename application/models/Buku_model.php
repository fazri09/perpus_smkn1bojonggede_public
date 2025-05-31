<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {

    protected $table = 'buku';

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    public function update_book($id_buku, $data)
    {
        $this->db->where('id', $id_buku);  // Sesuaikan dengan nama kolom id
        return $this->db->update('buku', $data); // Sesuaikan dengan nama tabel di database
    }

    public function get_all_buku_with_stok()
    {
        $this->db->select("
            buku.*,
            COALESCE(SUM(CASE WHEN pos.type = 'IN' THEN pos.qty ELSE 0 END), 0) -
            COALESCE(SUM(CASE WHEN pos.type = 'OUT' THEN pos.qty ELSE 0 END), 0) AS stok
        ");
        $this->db->from('buku');
        $this->db->join('pos', 'pos.buku_id = buku.id', 'left');
        $this->db->group_by('buku.id');
        
        return $this->db->get()->result();
    }

    public function get_jumlah_buku() {
        return $this->db->count_all('buku');
    }

    public function get_total_stok_buku()
    {
        $this->db->select("
            COALESCE(SUM(
                CASE WHEN pos.type = 'IN' THEN pos.qty ELSE 0 END
            ), 0) -
            COALESCE(SUM(
                CASE WHEN pos.type = 'OUT' THEN pos.qty ELSE 0 END
            ), 0) AS total_stok
        ");
        $this->db->from('pos');

        $query = $this->db->get();
        return $query->row()->total_stok;
    }

    public function get_top_6_buku_terbanyak_dipinjam()
    {
        $this->db->select('b.kode_buku, b.nama_buku, SUM(p.qty) AS jumlah_pinjaman');
        $this->db->from('pos p');
        $this->db->join('buku b', 'b.id = p.buku_id');
        $this->db->where('p.siswa IS NOT NULL');
        $this->db->group_by('p.buku_id');
        $this->db->order_by('jumlah_pinjaman', 'DESC');
        $this->db->limit(6);
        return $this->db->get()->result();
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

}
