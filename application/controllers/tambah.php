<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tambah extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('usergroup') != '1') {
            redirect('login');
        }
        $this->load->model('model_shift');
    }

    public function index() {
        $this->form_validation->set_rules('nama_shift', 'Nama Shift', 'required');
        $this->form_validation->set_rules('jam_masuk', 'Jam Masuk', 'required');
        $this->form_validation->set_rules('jam_keluar', 'Jam Keluar', 'required');
        $this->form_validation->set_message('required', '* isi dulu');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('tambah_shift');
        } else {
            $sf = array(
                'nama_shift' => set_value('nama_shift'),
                'jam_masuk' => set_value('jam_masuk'),
                'jam_keluar' => set_value('jam_keluar')
            );
            $this->model_shift->tambah($sf);
            redirect('shift');
        }
    }

    public function shift() {
        $this->load->view('pengelolaan_shift');
    }

    public function login() {
        $this->load->view('tampilan_login');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */