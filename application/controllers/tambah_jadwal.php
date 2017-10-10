<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tambah_jadwal extends CI_Controller {

	public function __construct()
       {
            parent::__construct();

            if($this->session->userdata('usergroup') !='1'){
            	redirect('login');
            }
            $this->load->model('model_shift_karyawan');
       }
	public function index() {
        $this->form_validation->set_rules('tanggalawal', 'Tanggal Awal', 'required');
        $this->form_validation->set_rules('tanggalakhir', 'Tanggal Akhir', 'required');
//        $this->form_validation->set_rules('departemen', 'Departemen', 'required');
        $this->form_validation->set_rules('id_karyawan', 'Karyawan', 'required');
        $this->form_validation->set_rules('id_shift', 'Shift', 'required');
        if ($this->form_validation->run() == FALSE) {
            //print_r($this->input->post());
            //exit;
            $data['hasil_shift'] = $this->model_shift_karyawan->shift();
            $data['hasil_jadwal'] = $this->model_shift_karyawan->departemen();
            $data['hasil_karyawan'] = $this->model_shift_karyawan->karyawan();
            $this->load->view('tambah_jadwal', $data);
        } else {
            $tbh = array(
                'id_shift' => $this->input->post('id_shift')
            );
            $array_list_karyawan = explode(',', $this->input->post('list_karyawan'));
//            print_r($array_list_karyawan);exit;
            foreach ($array_list_karyawan as $val) {
                $date = $this->input->post('tanggalawal');
                $akhir = $this->input->post('tanggalakhir');
                while ($date <= $akhir) {
                    $tbh['id_karyawan'] = $val;
                    $tbh['tanggal'] = $date;
                    $this->model_shift_karyawan->tambah($tbh);
                    //print_r($tbh);
                    $date = date('Y-m-d', strtotime($date . '+1 days'));
                }
            }
            redirect('jadwal');
        }
    }
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
	public function login()
	{
		$this->load->view('tampilan_login');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */