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
}
