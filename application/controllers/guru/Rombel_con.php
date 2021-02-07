<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rombel_con extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('main_mod');

		//usir jika tidak login
		if($this->session->login_admin != TRUE) {
			redirect(base_url('index.php/admin/login_con'));
		}
	}

	public function rombel()
	{
		//judul halaman
		$data['judul'] = "Rombongan Belajar";
		$data['sub_judul'] = "Halaman data rombongan belajar sistem CBT Teladan";

		//navbar
		$data['navbar'] = array('rombel');
		$data['nav_active'] = "rombel";

		//sidebar
		$data['sid_active'] = "rombel";

		//halaman yg diambil
		$data['page']  = "rombel";

		//load model
		$query ='peserta_kelas, count(peserta_kelas) as anggota';
		$data['rombel'] = $this->main_mod->select_og('cbt_peserta', $query, 'peserta_kelas', 'peserta_kelas')->result_array();

		//load view
		$this->load->view('admin/index', $data);
	}

	public function rombel_anggota()
	{
		//judul halaman
		$data['judul'] = "Rombongan Belajar";
		$data['sub_judul'] = "Halaman data anggota rombongan belajar sistem CBT Teladan";

		//navbar
		$data['navbar'] = array('rombel');
		$data['nav_active'] = "rombel";

		//sidebar
		$data['sid_active'] = "rombel";

		//halaman yg diambil
		$data['page']  = "rombel_anggota";

		//get data
		$rombel = $this->input->get('rombel');
		$where = array('peserta_kelas' => $rombel );
		$order = 'peserta_kelas ASC, peserta_nama ASC';

		//load model
		$data['anggota'] = $this->main_mod->select_ow('cbt_peserta',$order, $where)->result_array();

		//load view
		$this->load->view('admin/index', $data);
	}
}
