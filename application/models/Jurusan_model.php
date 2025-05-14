<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan_model extends CI_Model {

    protected $table = 'mst_jurusan';

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);  // Sesuaikan dengan nama kolom id
        return $this->db->update($this->table, $data); // Sesuaikan dengan nama tabel di database
    }

}
