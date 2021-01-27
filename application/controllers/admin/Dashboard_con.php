<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_con extends CI_Controller {
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

	public function dashboard()
	{
		//judul halaman
		$data['judul'] = "Dashboard";
		$data['sub_judul'] = "Hai, <b><font color=red size=+1>".$this->session->admin_nama."</font></b>. Selamat datang  di halaman dashboard sistem CBT Teladan";

		//navbar
		$data['navbar'] = array('dashboard');
		$data['nav_active'] = "dashboard";

		//sidebar
		$data['sid_active'] = "dashboard";

		//halaman yg diambil
		$data['page']  = "dashboard";

		//where jumon
		$where = array('pu_status' => 'on', );

		//load model
		$data['ujian']    = $this->main_mod->get_all('cbt_ujian')->num_rows();
		$data['soal']     = $this->main_mod->get_all('cbt_soal')->num_rows();
		$data['peserta']  = $this->main_mod->get_all('cbt_peserta')->num_rows();
		$data['rombel']   = $this->main_mod->select_group('cbt_peserta', '*', 'peserta_kelas')->num_rows();
		$data['online']   = $this->admin_mod->online()->result_array();
		$data['jumon']    = $this->main_mod->get_where('cbt_peserta_ujian',$where)->num_rows();
		$data['grafik'] = $this->admin_mod->grafik()->result_array();



		//load view
		$this->load->view('admin/index', $data);
	}
}
