<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cari_jadwal extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('usergroup') != '1') {
            redirect('login');
        }
        $this->load->model('model_shift_karyawan');
    }

    public function index($get = '', $id_karyawan = "", $nama_departemen = "", $awal = "", $akhir = "") {
        $this->load->model('model_shift_karyawan');
        $data['hasil_shift'] = $this->model_shift_karyawan->shift_karyawan();
        $data['hasil_jadwal'] = $this->model_shift_karyawan->departemen();
        $data['hasil_karyawan'] = $this->model_shift_karyawan->karyawan();
//        print_r($this->input->post());exit;
        if ($this->input->post()) {
            $id_karyawan = $this->input->post('id_karyawan');
            $nama_departemen = $this->input->post('nama_departemen');
            $awal = $this->input->post('tanggalawal');
            $akhir = $this->input->post('tanggalakhir');
        } else {
            $id_karyawan = $id_karyawan;
//            $nama = $nama;
            $nama_departemen = $nama_departemen;
            $awal = $awal;
            $akhir = $awal;
        }

        $data['id_karyawan'] = $id_karyawan;
//        $data['nama'] = $nama;
        $data['nama_departemen'] = $nama_departemen;
        $data['tanggalawal'] = $awal;
        $data['tanggalakhir'] = $akhir;
//print_r($this->input->post('id_shift'));exit();
        $query = $this->model_shift_karyawan->get('data_shift_karyawan', array('id_karyawan' => $id_karyawan, 'id_departemen' => $nama_departemen,
//            'id_shift' => $id_shift,
//            'nama' => $nama,
            "tanggal >='" . $awal . "'" => null,
            "tanggal <='" . $akhir . "'" => null
                ), "id_karyawan, id_departemen, tanggal"
        );
//                echo $this->db->last_query();exit;

        $data_shift_karyawan = $query;
//print_r($data_shift_karyawan);exit();
        $dates = array();

//        if ($this->input->post()) {
            $current = strtotime($awal);
            $last = strtotime($akhir);
            while ($current <= $last) {
                $dates[] = date("d/m", $current);
                $current = strtotime("+1 day", $current);
            }
            $data['jumlah'] = count($data_shift_karyawan);
        
//        print_r($data_shift_karyawan);exit();

        $data['data_shift'] = $data_shift_karyawan;
        $data['tanggal'] = $dates;
//        if (count($_POST) != 0 || $get == 'page') {
            $data['show'] = true;
        
        $this->load->view('pengelolaan_jadwal', $data, false);
    }
    public function multidel() {
        $id = explode(',', $this->input->post('list_shift'));
//        print_r($id);
//        exit;
            $this->model_shift_karyawan->hapus($id);
        redirect('jadwal');
    }
}
