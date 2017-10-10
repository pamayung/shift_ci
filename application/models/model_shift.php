<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_shift extends CI_Model {

    public function all() {
        $hasil = $this->db->get('data_shift');
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return array();
        }
    }

    public function find($id_shift) {
        $hasil = $this->db->where('id_shift', $id_shift)
                ->limit(1)
                ->get('data_shift');
        if ($hasil->num_rows() > 0) {
            return $hasil->row();
        } else {
            return array();
        }
    }

    public function tambah($sf) {
        $this->db->insert('data_shift', $sf);
    }

    public function cari($nama_shift) {
        $this->db->like('nama_shift', $nama_shift);
        $hasil = $this->db->get('data_shift');
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return array();
        }
    }

    public function update($id_shift, $data_shift) {
        $this->db->where('id_shift', $id_shift)
                ->update('data_shift', $data_shift);
    }

    public function delete($id_shift) {
        $this->db->where('id_shift', $id_shift)
                ->delete('data_shift');
    }

}