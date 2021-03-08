<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Server_con extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('main_mod');
		$this->load->model('admin_mod');

		//usir jika tidak login
		if($this->session->login_admin != TRUE) {
			redirect(base_url('index.php/admin/login_con'));
		}
	}

	public function server()
	{
		//judul halaman
		$data['judul'] = "Monitoring Server";
		$data['sub_judul'] = "Halaman monitoring server sistem CBT Teladan";

		//navbar
		$data['navbar'] = array('server');
		$data['nav_active'] = "server";

		//sidebar
		$data['sid_active'] = "server";

		//halaman yg diambil
		$data['page']  = "server";

		//load model

		//load view
		$this->load->view('admin/index', $data);
	}

}
