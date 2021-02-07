<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_con extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('main_mod');
		$this->load->model('exam_mod');

	}

	public function index()
	{
		$this->load->view('admin/login');
	}

	public function auth()
	{
		$datalog = array(
				'admin_user' => $this->input->post('username'),
				'admin_pass' => md5($this->input->post('password'))
			);

		$admin = $this->main_mod->get_where('cbt_admin', $datalog)->row();

		if(!empty($admin->admin_user)) 
		{
			$login_admin = TRUE;
			$this->session->set_userdata('login_admin', $login_admin);
        	$this->session->set_userdata('admin_user', $admin->admin_user);
        	$this->session->set_userdata('admin_nama', $admin->admin_nama);
        	$this->session->set_userdata('admin_level', $admin->admin_level);
        	redirect(base_url('index.php/admin/dashboard_con/dashboard'));
		}
		
		else
		{
			$this->session->set_flashdata('error','User atau Password Salah');
			redirect(base_url('index.php/admin/login_con'));
		}
	}

	
	public function logout()
    {
		$this->session->sess_destroy();
		redirect(base_url('index.php/admin/login_con'));
    }
}