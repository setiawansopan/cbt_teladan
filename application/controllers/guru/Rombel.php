<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rombel extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('main_mod');

		//usir jika tidak login
		if($this->session->login_guru != TRUE) {
			redirect(base_url('index.php/guru/login'));
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
		$data['page']  = "rombel_page";

		//load model
		$query ='peserta_kelas, count(peserta_kelas) as anggota';
		$data['rombel'] = $this->main_mod->select_og('cbt_peserta', $query, 'peserta_kelas', 'peserta_kelas')->result_array();

		//load view
		$this->load->view('guru/index', $data);
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
		$data['page']  = "rombel_anggota_page";

		//get data
		$rombel = $this->input->get('rombel');
		$where = array('peserta_kelas' => $rombel );
		$order = 'peserta_kelas ASC, peserta_nama ASC';

		//load model
		$data['anggota'] = $this->main_mod->select_ow('cbt_peserta',$order, $where)->result_array();

		//load view
		$this->load->view('guru/index', $data);
	}
}
