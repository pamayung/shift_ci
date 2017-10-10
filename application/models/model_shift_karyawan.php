<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_shift_karyawan extends CI_Model {

    public function all() {
        $this->db->select('*');
        $this->db->from('data_shift_karyawan');
        $this->db->join('data_shift', 'data_shift_karyawan.id_shift = data_shift.id_shift', 'data_shift_karyawan.id_karyawan = data_karyawan.id', 'LEFT');
        $this->db->from('data_karyawan');
        $this->db->join('data_departemen', 'data_karyawan.departemen = data_departemen.id_departemen', 'LEFT');

        $hasil = $this->db->get();
        if ($hasil->num_rows() > 0) {
            foreach ($hasil->result() as $data) {
                $hasil_shift[] = $data;
            }return $hasil_shift;
        }
    }

    public function shift_karyawan() {
        $this->db->select('*');
        $this->db->from('data_shift_karyawan');
        $this->db->join('data_karyawan', 'data_shift_karyawan.id_karyawan = data_karyawan.id', 'LEFT');
        $this->db->join('data_shift', 'data_shift_karyawan.id_shift = data_shift.id_shift', 'LEFT');
        $this->db->join('data_departemen', 'data_karyawan.departemen = data_departemen.id_departemen', 'LEFT');
        $hasil = $this->db->get();
//        echo '--'.$this->db->last_query();exit;

        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return array();
        }
    }

    public function departemen() {
        $this->db->distinct();
        $this->db->select(array('id_departemen', 'nama_departemen'));
        $hasil = $this->db->get('data_departemen');
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return array();
        }
    }

    public function karyawan() {
        $this->db->distinct();
        $this->db->select(array('id', 'nama', 'departemen'));
        $hasil = $this->db->get('data_karyawan');
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return array();
        }
    }

    public function shift() {
        $this->db->distinct();
        $this->db->select(array('id_shift', 'nama_shift'));
        $hasil = $this->db->get('data_shift');
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return array();
        }
    }

    public function tambah($tbh) {
        $this->db->insert('data_shift_karyawan', $tbh);
    }

    public function get($nama_tabel = '', $where = array()) {
        $this->db->select('*');
        $this->db->from('data_karyawan');
        $this->db->join($nama_tabel, 'data_karyawan.id = data_shift_karyawan.id_karyawan', 'LEFT');
        $this->db->join('data_shift', 'data_shift_karyawan.id_shift = data_shift.id_shift', 'LEFT');
        $this->db->join('data_departemen', 'data_karyawan.departemen = data_departemen.id_departemen', 'LEFT');
        $this->db->order_by('tanggal', 'ASC');
        $this->db->where($where);
        $hasil = $this->db->get();
//        echo $this->db->last_query();exit();
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return array();
        }
    }

    public function getData() {
        $this->db->select('*');
        $this->db->from('data_departemen');
        $this->db->join('data_karyawan', 'data_departemen.id_departemen = data_karyawan.departemen', 'LEFT');
        $hasil = $this->db->get();
//        echo $this->db->last_query();exit();
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return array();
        }
    }

    public function getSelectedData($table, $data) {
        return $this->db->get_where($table, $data);
    }
    
    public function total() {
        $this->db->select('*');
        $this->db->from('data_karyawan');
        $this->db->join('data_shift_karyawan', 'data_karyawan.id = data_shift_karyawan.id_karyawan', 'LEFT');
        $this->db->join('data_departemen', 'data_karyawan.departemen = data_departemen.id_departemen', 'LEFT');
        $hasil = $this->db->get();
//        echo $this->db->last_query();exit();
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return array();
        }
    }
    public function total_karyawan() {
        return $this->db->count_all('data_karyawan', 'data_shift_karyawan', 'data_departemen');
    }
    
    public function getkaryawan($where =  array()) {
//        print_r($where);exit;
        $this->db->select('*');
        $this->db->from('data_karyawan');
        $this->db->join('data_departemen', 'data_karyawan.departemen = data_departemen.id_departemen', 'LEFT');
        $this->db->where($where);
        $hasil = $this->db->get();
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return array();
        }
    }
    
    public function find($id) {
        $hasil = $this->db->where('id_shift_karyawan', $id)
                ->limit(1)
                ->get('data_shift_karyawan');
        if ($hasil->num_rows() > 0) {
            return $hasil->row();
        } else {
            return array();
        }
    }
    
    public function update($id, $data_shift) {
        $this->db->where('id_shift_karyawan', $id)
                ->update('data_shift_karyawan', $data_shift);
    }

    public function delete($id) {
        $this->db->where('id_shift_karyawan', $id)
                ->delete('data_shift_karyawan');
    }
    public function hapus($id) {
        $this->db->where_in('id_shift_karyawan', $id)
                ->delete('data_shift_karyawan');
//        echo $this->db->last_query();exit();
        return $this->db->affected_rows();
    }

}