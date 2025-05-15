<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {

    protected $table = 'siswa';

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function get_all()
    {
        $this->db->select('siswa.*, mst_kelas.nama_kelas, mst_jurusan.nama_jurusan');
        $this->db->from($this->table);
        $this->db->join('mst_kelas', 'mst_kelas.id = siswa.id_kelas', 'left');
        $this->db->join('mst_jurusan', 'mst_jurusan.id = siswa.id_jurusan', 'left');
        return $this->db->get()->result();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);  // Sesuaikan dengan nama kolom id
        return $this->db->update($this->table, $data); // Sesuaikan dengan nama tabel di database
    }

}
