<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('main_mod');

        //usir jika tidak login
        if($this->session->login_guru != TRUE) {
            redirect(base_url('index.php/guru/login_con'));
        }
    }

	public function peserta()
	{
		//judul halaman
		$data['judul'] = "Daftar Peserta";
		$data['sub_judul'] = "Halaman daftar peserta sistem CBT Teladan";

		//navbar
		$data['navbar'] = array('peserta');
		$data['nav_active'] = "peserta";

		//sidebar
		$data['sid_active'] = "peserta";

		//halaman yg diambil
		$data['page']  = "peserta_page";

		//load model
        $order = "peserta_kelas ASC, peserta_nama ASC";
		$data['peserta'] = $this->main_mod->select_order('cbt_peserta', '*', $order)->result_array();

		//load view
		$this->load->view('guru/index', $data);
	}

}
