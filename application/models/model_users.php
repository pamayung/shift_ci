<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_users extends CI_Model {

    public function check_credential() {
        $username = set_value('username');
        $password = set_value('password');

        $this->db->from('user')
                ->join('data_karyawan', 'user.nama = data_karyawan.nama', 'LEFT')
                ->join('data_shift_karyawan', 'data_karyawan.id = data_shift_karyawan.id_karyawan', 'LEFT')
                ->where('username', $username)
                ->where('password', $password)
                ->limit(1);
//        echo $this->db->last_query();exit;
        $hasil = $this->db->get();
        if ($hasil->num_rows() > 0) {
            return $hasil->row();
        } else {
            return array();
        }
    }

    public function data_user() {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('data_karyawan', 'user.nama = data_karyawan.nama', 'LEFT');
        $this->db->join('data_shift_karyawan', 'data_karyawan.id = data_shift_karyawan.id_karyawan', 'LEFT');
        $hasil = $this->db->get();
//          echo $this->db->last_query();exit;

        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return array();
        }
    }

}