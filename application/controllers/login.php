<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->form_validation->set_rules('username','Username', 'required|alpha_numeric');
		$this->form_validation->set_rules('password','Password', 'required|alpha_numeric');
		$this->load->view('tampilan_login');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->model('model_users');
			$this->session->set_flashdata('isi','Isi Username & Password dulu');
			
		}else{
			$this->load->model('model_users');
			$valid_user = $this->model_users->check_credential();

			if($valid_user == FALSE)
			{
				$this->session->set_flashdata('error','Username / Password Salah');
				redirect('login');
			}else{
				$this->session->set_userdata('username', $valid_user->username);
				$this->session->set_userdata('usergroup', $valid_user->usergroup);
				$this->session->set_userdata('nama', $valid_user->nama);
                                $this->session->set_userdata('id_karyawan', $valid_user->id_karyawan);

				switch ($valid_user->usergroup) {
					case 1:
						redirect('shift');
						break;
					case 2:
						redirect('daftar');
						break;
					default:
						break;
				}
			}
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */