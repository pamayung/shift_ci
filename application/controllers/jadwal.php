<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jadwal extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('usergroup') != '1') {
            redirect('login');
        }
        $this->load->model('model_shift_karyawan');
    }

    public function index($get = '', $awal = "", $akhir = "") {
        $this->load->model('model_shift_karyawan');
        $data['hasil_shift'] = $this->model_shift_karyawan->shift_karyawan();
        $data['hasil_jadwal'] = $this->model_shift_karyawan->departemen();
        $data['hasil_karyawan'] = $this->model_shift_karyawan->karyawan();
//        print_r($this->input->post());exit;
        if ($this->input->post()) {
            $awal = $this->input->post('tanggalawal');
            $akhir = $this->input->post('tanggalakhir');
        } else {
            $awal = date("Y-m-d");
            $akhir = date("Y-m-d");
        }
        $data['tanggalawal'] = $awal;
        $data['tanggalakhir'] = $akhir;
//print_r($this->input->post('id_shift'));exit();
        $query = $this->model_shift_karyawan->get('data_shift_karyawan', array(
//            'id_shift' => $id_shift,
//            'nama' => $nama,
            "tanggal >='" . $awal . "'" => null,
            "tanggal <='" . $akhir . "'" => null
                ), "tanggal"
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

//    public function tambah() {
//        $this->form_validation->set_rules('tanggalawal', 'Tanggal Awal', 'required');
//        $this->form_validation->set_rules('tanggalakhir', 'Tanggal Akhir', 'required');
////        $this->form_validation->set_rules('departemen', 'Departemen', 'required');
//        $this->form_validation->set_rules('id_karyawan', 'Karyawan', 'required');
//        $this->form_validation->set_rules('id_shift', 'Shift', 'required');
//        if ($this->form_validation->run() == FALSE) {
//            //print_r($this->input->post());
//            //exit;
//            $data['hasil_shift'] = $this->model_shift_karyawan->shift();
//            $data['hasil_jadwal'] = $this->model_shift_karyawan->departemen();
//            $data['hasil_karyawan'] = $this->model_shift_karyawan->karyawan();
//            $this->load->view('tambah_jadwal', $data);
//        } else {
//            $tbh = array(
//                'id_shift' => $this->input->post('id_shift')
//            );
//            $array_list_karyawan = explode(',', $this->input->post('list_karyawan'));
//            foreach ($array_list_karyawan as $val) {
//                $date = $this->input->post('tanggalawal');
//                $akhir = $this->input->post('tanggalakhir');
//                while ($date <= $akhir) {
//                    $tbh['id_karyawan'] = $val;
//                    $tbh['tanggal'] = $date;
//                    $this->model_shift_karyawan->tambah($tbh);
//                    //print_r($tbh);
//                    $date = date('Y-m-d', strtotime($date . '+1 days'));
//                }
//            }
//            redirect('jadwal');
//        }
//    }
    public function get_karyawan() {
        $id['departemen'] = $this->input->post('departemen');
        $data = array(
                'detail_karyawan' =>$this->model_shift_karyawan->getKaryawan(array('departemen'=>$id['departemen'])));
        $this->load->view('ajax_detail_karyawan', $data);
//        print_r($data);
    }
    public function cari_karyawan() {
        $id['departemen'] = $this->input->post('departemen');
        $data = array(
                'detail_karyawan' =>$this->model_shift_karyawan->getKaryawan(array('departemen'=>$id['departemen'])));
        $this->load->view('ajax_cari_karyawan', $data);
//        print_r($data);
    }
    
    public function delete($id) {
        $this->model_shift_karyawan->delete($id);
        redirect('jadwal');
    }

    public function login() {
        $this->load->view('tampilan_login');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */