<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_con extends CI_Controller {
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

	public function status()
	{
		//judul halaman
		$data['judul'] = "Status Peserta";
		$data['sub_judul'] = "Halaman status peserta sistem CBT Teladan";

		//navbar
		$data['navbar'] = array('status','selesai');
		$data['nav_active'] = "status";

		//sidebar
		$data['sid_active'] = "status";

		//halaman yg diambil
		$data['page']  = "status";

		//data ujian berlangsung
		$where = array(
			'ujian_tanggal' => date('Y-m-d'),
		);
		$where1 = array(
			'ujian_id' => $this->input->post('ujian_id'),
		);

		$data['ujian'] = $this->admin_mod->ujian_by_id($where)->result_array();
		$data['peserta'] = $this->admin_mod->status($where1)->result_array();
		//load view
		$this->load->view('admin/index', $data);
	}

	public function selesai()
	{
		//judul halaman
		$data['judul'] = "Status Peserta Selesai";
		$data['sub_judul'] = "Halaman status peserta selesai sistem CBT Teladan";

		//navbar
		$data['navbar'] = array('status','selesai');
		$data['nav_active'] = "selesai";

		//sidebar
		$data['sid_active'] = "status";

		//halaman yg diambil
		$data['page']  = "status_selesai";

		//data ujian berlangsung
		$where = array(
			'ujian_tanggal < ' => date('Y-m-d'),
		);
		$where1 = array(
			'ujian_id' => $this->input->post('ujian_id'),
		);
		$data['ujian'] = $this->admin_mod->ujian_by_id($where)->result_array();
		$data['peserta'] = $this->admin_mod->status($where1)->result_array();
		//load view
		$this->load->view('admin/index', $data);
	}

	public function set_selesai()
	{
		//where
		$where = array(
			'pu_ujian_id' => $this->input->get('pu_ujian_id'),
			'pu_status = ' => 'on',);
		//data
		$data = array('pu_status' => 'of', );
		
		//update
		$this->main_mod->update('cbt_peserta_ujian', $where, $data);

		//redirect
		redirect(base_url('index.php/admin/status_con/selesai'));

	}

	public function reset_peserta()
	{
		//get data
		$where_pu = array(
			'pu_peserta_id' => $this->input->get('peserta_id'), 
			'pu_ujian_id'   => $this->input->get('ujian_id'), 
		);

		$where_pj = array(
			'pj_peserta_id' => $this->input->get('peserta_id'), 
			'pj_ujian_id'   => $this->input->get('ujian_id'), 
		);

		//delete
		$this->main_mod->delete('cbt_peserta_ujian', $where_pu);
		$this->main_mod->delete('cbt_peserta_jawaban', $where_pj);

		//redirect
		redirect(base_url('index.php/admin/status_con/status'));
	}

		public function reopen_peserta()
	{
		//get data
		$where_pu = array(
			'pu_peserta_id' => $this->input->get('peserta_id'), 
			'pu_ujian_id'   => $this->input->get('ujian_id'), 
		);

		$pu_durasi  = $this->input->post('pu_durasi');
		$add_durasi = $this->input->post('add_durasi');
		$new_durasi = date('H:i:s',strtotime('+'.$add_durasi.' minutes',strtotime($pu_durasi)));

		$data = array(
		'pu_durasi' => $new_durasi,
		'pu_status' => 'on' );

		//delete
		$this->main_mod->update('cbt_peserta_ujian', $where_pu, $data);

		//redirect
		$this->session->set_flashdata('simpan','true');
		redirect(base_url('index.php/admin/status_con/status'));
	}
}
