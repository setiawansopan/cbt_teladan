<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('main_mod');
		$this->load->model('admin_mod');

		//usir jika tidak login
		if($this->session->login_guru != TRUE) {
			redirect(base_url('index.php/guru/login_con'));
		}
	}

	public function mapel()
	{
		//judul halaman
		$data['judul'] = "Mata Pelajaran";
		$data['sub_judul'] = "Halaman daftar mata pelajaran sistem CBT Teladan";

		//navbar
		$data['navbar'] = array('mapel','kompetensi');
		$data['nav_active'] = "mapel";

		//sidebar
		$data['sid_active'] = "mapel";

		//halaman yg diambil
		$data['page']  = "mapel_page";

		//load model
		$data['mapel'] = $this->admin_mod->mapel_all()->result_array();

		//load view
		$this->load->view('guru/index', $data);
	}

	public function mapel_add()
	{
		//post data
		$datamap = array(
			'mapel_id' => uniqid(),
			'mapel_nama' => $this->input->post('mapel_nama'),
			'mapel_kode' => $this->input->post('mapel_kode'), 
			'mapel_urut' => $this->input->post('mapel_urut'), 
			'mapel_kelompok' => $this->input->post('mapel_kelompok'),  
		);

		//load model
		$this->main_mod->insert('cbt_mapel', $datamap);
		$this->session->set_flashdata('simpan','true');
		redirect(base_url('index.php/guru/mapel/mapel'));
	}

	public function mapel_update()
	{
		$where = array('mapel_id' => $this->input->post('mapel_id'));
		//post data
		$datamap = array(
			'mapel_nama' => $this->input->post('mapel_nama'),
			'mapel_kode' => $this->input->post('mapel_kode'), 
			'mapel_urut' => $this->input->post('mapel_urut'), 
			'mapel_kelompok' => $this->input->post('mapel_kelompok'),  
		);

		//load model
		$this->main_mod->update('cbt_mapel', $where, $datamap);
		$this->session->set_flashdata('update','true');
		redirect(base_url('index.php/guru/mapel/mapel'));
	}

	public function mapel_del()
	{
		$where = array('mapel_id' => $this->input->get('mapel_id'));
		$this->main_mod->delete('cbt_mapel', $where);
		redirect(base_url('index.php/guru/mapel/mapel'));
	}

	public function kompetensi()
	{
		//judul halaman
		$data['judul'] = "Kompetensi Dasar";
		$data['sub_judul'] = "Halaman daftar kompetensi dasar mata pelajaran sistem CBT Teladan";

		//navbar
		$data['navbar'] = array('mapel', 'kompetensi');
		$data['nav_active'] = "kompetensi";

		//sidebar
		$data['sid_active'] = "mapel";

		//halaman yg diambil
		$data['page']  = "kompetensi_page";

		//load model
		$data['mapel'] = $this->main_mod->select_order('cbt_mapel','*','mapel_urut, mapel_nama')->result_array();

		//get mapel_id
		if(!empty($this->input->post('mapel_id')))
		{
			$mapel_id = $this->input->post('mapel_id');
		}
		if(!empty($this->input->get('mapel_id')))
		{
			$mapel_id = $this->input->get('mapel_id');
		}

		if(!empty($mapel_id))
		{
			//array 
			$where_kd = array('kd_mapel_id' => $mapel_id);
			$where_mp = array('mapel_id' => $mapel_id);

			//push data
			$data['kd'] = $this->main_mod->select_ow('cbt_kd','kd_tingkat, kd_semester, kd_nomor', $where_kd)->result_array();
			$data['n_mapel'] = $this->main_mod->select_where('*', 'cbt_mapel', $where_mp)->row();
		}

		//load view
		$this->load->view('guru/index', $data);
	}

	public function kompetensi_add()
	{
		//post data
		$datakom = array(
			'kd_id' => uniqid(),
			'kd_mapel_id' => $this->input->post('kd_mapel_id'),
			'kd_nomor' => $this->input->post('kd_nomor'), 
			'kd_tingkat' => $this->input->post('kd_tingkat'), 
			'kd_semester' => $this->input->post('kd_semester'), 
			'kd_teks' => $this->input->post('kd_teks'),   
		);

		//load model
		$this->main_mod->insert('cbt_kd', $datakom);
		$this->session->set_flashdata('simpan','true');
		redirect(base_url('index.php/guru/mapel/kompetensi?mapel_id='.$this->input->post('kd_mapel_id').''));
	}

	public function kompetensi_update()
	{
		$where = array('kd_id' => $this->input->post('kd_id'));
		//post data
		$datakd = array(
			'kd_nomor' => $this->input->post('kd_nomor'),
			'kd_tingkat' => $this->input->post('kd_tingkat'), 
			'kd_semester' => $this->input->post('kd_semester'), 
			'kd_teks' => $this->input->post('kd_teks'),  
		);

		//load model
		$this->main_mod->update('cbt_kd', $where, $datakd);
		$this->session->set_flashdata('update','true');
		redirect(base_url('index.php/guru/mapel/kompetensi?mapel_id='.$this->input->post('kd_mapel_id')));
	}

	public function kompetensi_del()
	{
		$where = array('kd_id' => $this->input->get('kd_id'));
		$this->main_mod->delete('cbt_kd', $where);
		redirect(base_url('index.php/guru/mapel/kompetensi?mapel_id='.$this->input->get('kd_mapel_id').''));
	}
}
