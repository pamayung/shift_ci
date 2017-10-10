<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Daftar extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('usergroup') != '2') {
            redirect('login');
        }

        $this->load->model('model_shift_karyawan');
        $this->load->model('model_users');
    }

    public function index($get = '', $awal = "", $akhir = "") {
//        print_r($this->session->userdata('id_karyawan'));
        $this->load->model('model_shift_karyawan');
//        print_r($this->input->post());exit;
        if ($this->input->post()) {
            $awal = $this->input->post('tanggalawal');
            $akhir = $this->input->post('tanggalakhir');
        } else {
            $awal = date("Y-m-d");
            $akhir = date("Y-m-d", strtotime("+6 day"));
        }

        $data['tanggalawal'] = $awal;
        $data['tanggalakhir'] = $akhir;
//print_r($this->input->post('id_shift'));exit();
        $query = $this->model_shift_karyawan->get('data_shift_karyawan', array(
//            'id_shift' => $id_shift,
//            'nama' => $nama,
            "id_karyawan" => $this->session->userdata('id_karyawan'),
            "tanggal >='" . $awal . "'" => null,
            "tanggal <='" . $akhir . "'" => null
                ), "tanggal"
        );
//                echo $this->db->last_query();exit;

        $data_shift_karyawan = $query;
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

//        print_r($data);
        $this->load->view('jadwal_shift', $data, false);
    }

    public function login() {
        $this->load->view('tampilan_login');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */