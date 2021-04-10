<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('main_mod');
		//$this->load->model('admin_mod');

	}

	public function index()
	{
		$this->load->view('guru/login_page');
	}

	public function auth()
	{
		$datalog = array(
				'guru_nik' => $this->input->post('username'),
				'guru_password' => md5($this->input->post('password'))
			);
		$guru = $this->main_mod->get_where('cbt_guru', $datalog)->row();

		$where_guru = array('gm_guru_id' => $guru->guru_id);
		$mapel_id = $this->main_mod->get_where('cbt_guru_mapel', $where_guru)->row();

		if(!empty($guru->guru_nik) && $guru->guru_password_status != 0) 
		{
			$login_guru = TRUE;
			$this->session->set_userdata('login_guru', $login_guru);
        	$this->session->set_userdata('guru_id', $guru->guru_id);
			$this->session->set_userdata('guru_nama', $guru->guru_nama);
			$this->session->set_userdata('mapel_id', $mapel_id->gm_mapel_id);
        	redirect(base_url('index.php/guru/dashboard/dashboard'));
		}
		
		else if(!empty($guru->guru_nik) && $guru->guru_password_status == 0)
		{
			redirect(base_url('index.php/guru/login/password?guru_id='.$guru->guru_id));
		}

		else
		{
			$this->session->set_flashdata('error','User atau Password Salah');
			redirect(base_url('index.php/guru/login'));
		}
	}

	public function password()
	{
		$guru_id = $this->input->get('guru_id');
		$this->load->view('guru/password_page', $guru_id);
	}

	public function password_update()
	{
		$guru_id = $this->input->post('guru_id');
		$password   = $this->input->post('password');
		$confirmpassword = $this->input->post('confirmpassword');

		if(strlen($password) < 8) {
			$this->session->set_flashdata('error','Password minimal 8 karakter.');
			redirect(base_url('index.php/guru/login/password?guru_id='.$guru_id));
		}
		else if($password != $confirmpassword) {
			$this->session->set_flashdata('error','Password tidak sama.');
			redirect(base_url('index.php/guru/login/password?guru_id='.$guru_id));
		}
		else {
			$where = array('guru_id' => $guru_id);
			$data  = array(
				'guru_password' => md5($password),
				'guru_password_status' => 1
			);
			$this->main_mod->update('cbt_guru',$where, $data);

			$this->session->set_flashdata('success','Perubahan password berhasil.');
			redirect(base_url('index.php/guru/login'));
		} 
	}

	public function logout()
    {
		$this->session->sess_destroy();
		redirect(base_url('index.php/guru/login'));
    }
}
