<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Shift extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('usergroup') != '1') {
            redirect('login');
        }

        $this->load->model('model_shift');
    }

    public function index() {
        $data['hasil'] = $this->model_shift->all();
        $this->load->view('pengelolaan_shift', $data);
    }

//    public function tambah() {
//        $this->form_validation->set_rules('nama_shift', 'Nama Shift', 'required');
//        $this->form_validation->set_rules('jam_masuk', 'Jam Masuk', 'required');
//        $this->form_validation->set_rules('jam_keluar', 'Jam Keluar', 'required');
//        $this->form_validation->set_message('required', '* isi dulu');
//        if ($this->form_validation->run() == FALSE) {
//            $this->load->view('tambah_shift');
//        } else {
//            $sf = array(
//                'nama_shift' => set_value('nama_shift'),
//                'jam_masuk' => set_value('jam_masuk'),
//                'jam_keluar' => set_value('jam_keluar')
//            );
//            $this->model_shift->tambah($sf);
//            redirect('shift');
//        }
//    }

//    public function cari() {
//        $this->load->model('model_shift');
//        $nama_shift = $this->input->post('search');
//
//        if (isset($nama_shift) and !empty($nama_shift)) {
//            $data['nama_shift'] = $this->model_shift->cari($nama_shift);
//            $this->load->view('cari_shift', $data);
//        } else {
//            redirect('shift');
//        }
//    }

    public function tambah_shift() {
        $this->load->view('tambah_shift');
    }

    public function login() {
        $this->load->view('tampilan_login');
    }

    public function update($id_shift) {
        $this->form_validation->set_rules('nama_shift', 'Nama Shift', 'required');
        $this->form_validation->set_rules('jam_masuk', 'Jam Masuk', 'required');
        $this->form_validation->set_rules('jam_keluar', 'Jam Keluar', 'required');
        $this->form_validation->set_message('required', '* isi dulu');
        if ($this->form_validation->run() == FALSE) {
            $data['edit_shift'] = $this->model_shift->find($id_shift);
            $this->load->view('form_edit_shift', $data);
        } else {
            $data_shift = array(
                'nama_shift' => set_value('nama_shift'),
                'jam_masuk' => set_value('jam_masuk'),
                'jam_keluar' => set_value('jam_keluar')
            );
            $this->model_shift->update($id_shift, $data_shift);
            redirect('shift');
        }
    }

    public function delete($id) {
        $this->model_shift->delete($id);
        redirect('shift');
    }

}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */