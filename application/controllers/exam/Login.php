<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('main_mod');
		$this->load->model('exam_mod');

	}

	public function index()
	{
		$this->load->view('exam/login_page');
	}

	public function auth()
	{
		$datalog = array(
				'peserta_nis' => $this->input->post('username'),
				'peserta_password' => md5($this->input->post('password'))
			);

		$peserta = $this->main_mod->get_where('cbt_peserta', $datalog)->row();

		if(!empty($peserta->peserta_nis) && $peserta->peserta_password_status != 0) 
		{
			$login_peserta = TRUE;
			$this->session->set_userdata('login_peserta', $login_peserta);
        	$this->session->set_userdata('peserta_id', $peserta->peserta_id);
        	redirect(base_url('index.php/exam/identitas'));
		}
		
		else if(!empty($peserta->peserta_nis) && $peserta->peserta_password_status == 0)
		{
			redirect(base_url('index.php/exam/login/password?peserta_id='.$peserta->peserta_id));
		}

		else
		{
			$this->session->set_flashdata('error','User atau Password Salah');
			redirect(base_url('index.php/exam/login'));
		}
	}

	public function password()
	{
		$peserta_id = $this->input->get('peserta_id');
		$this->load->view('exam/password_page', $peserta_id);
	}

	public function password_update()
	{
		$peserta_id = $this->input->post('peserta_id');
		$password   = $this->input->post('password');
		$confirmpassword = $this->input->post('confirmpassword');

		if(strlen($password) < 8) {
			$this->session->set_flashdata('error','Password minimal 8 karakter.');
			redirect(base_url('index.php/exam/login/password?peserta_id='.$peserta_id));
		}
		else if($password != $confirmpassword) {
			$this->session->set_flashdata('error','Password tidak sama.');
			redirect(base_url('index.php/exam/login/password?peserta_id='.$peserta_id));
		}
		else {
			$where = array('peserta_id' => $peserta_id);
			$data  = array(
				'peserta_password' => md5($password),
				'peserta_password_status' => 1
			);
			$this->main_mod->update('cbt_peserta',$where, $data);

			$this->session->set_flashdata('success','Perubahan password berhasil.');
			redirect(base_url('index.php/exam/login'));
		} 
	}

	public function logout()
    {
		$this->session->sess_destroy();
		redirect(base_url('index.php/exam/login'));
    }
}
