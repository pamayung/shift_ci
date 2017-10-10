<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cari extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('usergroup') != '1') {
            redirect('login');
        }

        $this->load->model('model_shift');
    }
    public function index() {
        $this->load->model('model_shift');
        $nama_shift = $this->input->post('search');

        if (isset($nama_shift) and !empty($nama_shift)) {
            $data['nama_shift'] = $this->model_shift->cari($nama_shift);
            $this->load->view('cari_shift', $data);
        } else {
            redirect('shift');
        }
    }
}
