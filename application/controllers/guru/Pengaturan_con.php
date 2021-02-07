<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan_con extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('main_mod');

		//usir jika tidak login
		if($this->session->login_admin != TRUE) {
			redirect(base_url('index.php/admin/login_con'));
		}
	}

	public function pengaturan()
	{
		//judul halaman
		$data['judul'] = "Pengaturan Sistem";
		$data['sub_judul'] = "Halaman pengaturan sistem CBT Teladan";

		//navbar
		$data['navbar'] = array('pengaturan', 'reset');
		$data['nav_active'] = "pengaturan";

		//sidebar
		$data['sid_active'] = "pengaturan";

		//halaman yg diambil
		$data['page']  = "pengaturan";

		//load model
		$data['set'] = $this->main_mod->get_all('cbt_setting')->row();
		$data['admin'] = $this->main_mod->get_all('cbt_admin')->result_array();

		//load view
		$this->load->view('admin/index', $data);
	}

	public function pengaturan_update()
	{
		$dataset = array(
			'set_sekolah' => $this->input->post('set_sekolah') ,
			'set_alamat' => $this->input->post('set_alamat') , 
			'set_telpon' => $this->input->post('set_telpon') , 
			'set_fax' => $this->input->post('set_fax') , 
			'set_web' => $this->input->post('set_web') , 
			'set_email' => $this->input->post('set_email') , 
			'set_kab' => $this->input->post('set_kab') , 
			'set_pos' => $this->input->post('set_pos') , 
			'set_npsn' => $this->input->post('set_npsn') , 
			'set_kepsek' => $this->input->post('set_kepsek') , 
			'set_nip' => $this->input->post('set_nip') 
		);

		$where = array('set_id' => 1);

		$this->load->model('admin/main_mod');
		$this->main_mod->update('cbt_setting', $where , $dataset);

		redirect(base_url('index.php/admin/pengaturan_con/pengaturan')); 
	}

	public function admin_add()
	{
		$dataad = array(
			'admin_id'   => uniqid(),
			'admin_nama' => $this->input->post('admin_nama'), 
			'admin_user' => $this->input->post('admin_user'), 
			'admin_pass' => md5($this->input->post('admin_pass')), 
			'admin_level' => 'entry',
		);

		$where = array('admin_user' => $this->input->post('admin_user'));

		$cek = $this->main_mod->get_where('cbt_admin', $where)->num_rows();
		if(empty($cek))
		{
			$this->load->model('admin/main_mod');
			$this->main_mod->insert('cbt_admin', $dataad);
			redirect(base_url('index.php/admin/pengaturan_con/pengaturan')); 
		}
		else {
			$this->session->set_flashdata('pesan','Username sudah dipakai!');
			redirect(base_url('index.php/admin/pengaturan_con/pengaturan'));
		}
	}

	public function admin_del()
	{
		$where = array(
			'admin_id' => $this->input->get('admin_id')
		);

		$this->load->model('admin/main_mod');
		$this->main_mod->delete('cbt_admin', $where);

		redirect(base_url('index.php/admin/pengaturan_con/pengaturan')); 
	}

	public function admin_reset()
	{
		$random = rand(10,100);
		$datamin = array(
			'admin_user' => strtolower(str_replace(" ","",$this->input->get('admin_nama'))).''.$random,
			'admin_pass' => md5('123456789')
		);
		$where = array('admin_id' => $this->input->get('admin_id'));

		$this->load->model('admin/main_mod');
		$this->main_mod->update('cbt_admin', $where, $datamin);
		redirect(base_url('index.php/admin/pengaturan_con/pengaturan')); 
	}
}
