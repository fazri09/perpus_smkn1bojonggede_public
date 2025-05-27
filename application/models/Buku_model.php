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

}
