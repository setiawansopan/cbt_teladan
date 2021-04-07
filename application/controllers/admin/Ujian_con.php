<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ujian_con extends CI_Controller {

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

	public function ujian()
	{
		//judul halaman
		$data['judul'] = "Daftar Ujian";
		$data['sub_judul'] = "Halaman daftar ujian sistem CBT Teladan";

		//navbar
		$data['navbar'] = array('ujian','buat');
		$data['nav_active'] = "ujian";

		//sidebar
		$data['sid_active'] = "ujian";

		//halaman yg diambil
		$data['page']  = "ujian";

		//load model
		$data['ujian'] = $this->admin_mod->ujian_all();

		//load view
		$this->load->view('admin/index', $data);
	}

	public function buat()
	{
		//judul halaman
		$data['judul'] = "Buat Ujian";
		$data['sub_judul'] = "Halaman buat ujian sistem CBT Teladan";

		//navbar
		$data['navbar'] = array('ujian','buat');
		$data['nav_active'] = "buat";

		//sidebar
		$data['sid_active'] = "ujian";

		//halaman yg diambil
		$data['page']  = "ujian_buat";

		//load model
		$data['mapel'] = $this->main_mod->select_order('cbt_mapel','*','mapel_urut')->result_array();
		// $data['rombel']  = $this->ujian_mod->rombel();

		//load view
		$this->load->view('admin/index', $data);
	}

	public function ujian_add()
	{
		$startTime = $this->input->post('ujian_mulai');
		$endTime = date('H:i:s',strtotime('+'.$this->input->post('ujian_durasi').' minutes',strtotime($startTime)));
		$data = array(
			'ujian_id'       => uniqid(),
			'ujian_nama'     => $this->input->post('ujian_nama'),
			'ujian_mapel_id' => $this->input->post('ujian_mapel_id'),
			'ujian_tingkat'  => $this->input->post('ujian_tingkat'),
			'ujian_tanggal'  => $this->input->post('ujian_tanggal'),
			'ujian_mulai'    => $this->input->post('ujian_mulai'),
			'ujian_selesai'  => $endTime,
			'ujian_durasi'   => $this->input->post('ujian_durasi'),
			'ujian_jenis'   => $this->input->post('ujian_jenis'),
			'ujian_token'    => acak(6),
			'ujian_hasil'    => $this->input->post('ujian_hasil'),
			'ujian_pinalti'  => $this->input->post('ujian_pinalti'),
		);

		//$this->load->model('admin/main_mod');
		$this->main_mod->insert('cbt_ujian', $data);
		$this->session->set_flashdata('simpan','true');
		redirect(base_url('index.php/admin/ujian_con/ujian'));
	}

	public function ujian_edit()
	{
		//judul halaman
		$data['judul'] = "Edit Ujian";
		$data['sub_judul'] = "Halaman edit ujian sistem CBT Teladan";

		//navbar
		$data['navbar'] = array('edit');
		$data['nav_active'] = "edit";

		//sidebar
		$data['sid_active'] = "ujian";

		//halaman yg diambil
		$data['page']  = "ujian_edit";

		//load model
		$where = array('ujian_id' => $this->input->get('ujian_id') );
		$data['ujian'] = $this->main_mod->get_where('cbt_ujian', $where)->row();
		$data['mapel'] = $this->main_mod->select_order('cbt_mapel','*','mapel_urut')->result_array();

		//load view
		$this->load->view('admin/index', $data);
	}

	public function ujian_update()
	{
		$startTime = $this->input->post('ujian_mulai');
		$endTime = date('H:i:s',strtotime('+'.$this->input->post('ujian_durasi').' minutes',strtotime($startTime)));
		$data = array(
			'ujian_nama'     => $this->input->post('ujian_nama'),
			'ujian_mapel_id' => $this->input->post('ujian_mapel_id'),
			'ujian_tingkat'  => $this->input->post('ujian_tingkat'),
			'ujian_tanggal'  => $this->input->post('ujian_tanggal'),
			'ujian_mulai'    => $this->input->post('ujian_mulai'),
			'ujian_selesai'  => $endTime,
			'ujian_durasi'   => $this->input->post('ujian_durasi'),
			'ujian_jenis'   => $this->input->post('ujian_jenis'),
			'ujian_hasil'    => $this->input->post('ujian_hasil'),
			'ujian_pinalti'  => $this->input->post('ujian_pinalti'),
		);

		$where = array('ujian_id' => $this->input->post('ujian_id') );
		$this->main_mod->update('cbt_ujian', $where, $data);
		$this->session->set_flashdata('update','true');
		redirect(base_url('index.php/admin/ujian_con/ujian'));
	}

	public function ujian_reset()
	{
		$where = array('ujian_id' => $this->input->get('ujian_id') );
		$datares = array('ujian_token' => acak(6));
		$this->main_mod->update('cbt_ujian', $where, $datares);
		$this->session->set_flashdata('reset','true');
		redirect(base_url('index.php/admin/ujian_con/ujian'));
	}

	public function ujian_delete()
	{
		$where = array('ujian_id' => $this->input->get('ujian_id'), );
		$this->main_mod->delete('cbt_ujian', $where);
		$this->session->set_flashdata('hapus','true');
		redirect(base_url('index.php/admin/ujian_con/ujian'));
	}

	public function soal()
	{
		//judul halaman
		$data['judul'] = "Tambah Soal Ujian";
		$data['sub_judul'] = "Halaman tambah soal ujian sistem CBT Teladan";

		//navbar
		$data['navbar'] = array('soal');
		$data['nav_active'] = "soal";

		//sidebar
		$data['sid_active'] = "ujian";

		//halaman yg diambil
		$data['page']  = "soal";

		//data ujian
		$where1 = array('ujian_id' => $this->input->get('ujian_id') );
		$data['ujian'] = $this->admin_mod->ujian_by_id($where1)->row();

		//data skor dan total
		$where2 = array('soal_ujian_id' => $this->input->get('ujian_id') );
		$data['jum_soal'] = $this->main_mod->get_where('cbt_soal', $where2)->num_rows();
		$data['total'] = $this->admin_mod->total_skor($where2)->row();

		//data KD
		$tingkat  = $this->admin_mod->ujian_by_id($where1)->row()->ujian_tingkat;
		$mapel_id = $this->admin_mod->ujian_by_id($where1)->row()->ujian_mapel_id;
		$where3 = array('kd_tingkat'  => $tingkat, 
						'kd_mapel_id' => $mapel_id);
		$data['kompetensi'] = $this->main_mod->select_ow('cbt_kd', 'kd_semester, kd_nomor', $where3)->result_array();

		//load view
		$this->load->view('admin/index', $data);
	}

	public function soal_add()
	{
		$data = array(
			'soal_id' => uniqid(),
			'soal_ujian_id' => $this->input->post('soal_ujian_id'),
			'soal_kd_id' => $this->input->post('soal_kd_id'),
			'soal_mapel_id' => $this->input->post('soal_mapel_id'),
		 	'soal_teks' => $this->input->post('soal_teks'), 
		 	'soal_kunci' => $this->input->post('soal_kunci'),
		 	'soal_skor' => $this->input->post('soal_skor')
		 );

		$this->main_mod->insert('cbt_soal', $data);
		redirect(base_url('index.php/admin/ujian_con/soal?ujian_id='.$this->input->post('soal_ujian_id')));
	}

	public function soal_hapus()
	{
		$where = array('soal_id' => $this->input->get('hapus_id'));
		$this->main_mod->delete('cbt_soal', $where);
		if(!empty($this->input->get('soal_id'))) {
		redirect(base_url('index.php/admin/ujian_con/soal_preview').'?ujian_id='.$this->input->get('ujian_id').'&soal_id='.$this->input->get('soal_id').'&n='.$this->input->get('n'));
		} else {
		$where = array('soal_ujian_id' => $this->input->get('ujian_id'));
		$soal_id = $this->main_mod->select_where('min(soal_id) as soal_id','cbt_soal', $where)->row()->soal_id;
		if (!empty($soal_id)) 
		{
		$new_n = $this->input->get('n') + 1;
		redirect(base_url('/index.php/admin/ujian_con/soal_preview?ujian_id='.$this->input->get('ujian_id').'&soal_id='.$soal_id.'&n='.$new_n));
		} 
		else {
		redirect(base_url('index.php/admin/ujian_con/ujian'));
		}
		}
	}

	public function soal_preview()
	{
		//judul halaman
		$data['judul'] = "Preview Soal Ujian";
		$data['sub_judul'] = "Halaman preview soal ujian sistem CBT Teladan";

		//navbar
		$data['navbar'] = array('preview');
		$data['nav_active'] = "preview";

		//sidebar
		$data['sid_active'] = "ujian";

		//halaman yg diambil
		$data['page']  = "soal_preview";

		//load model
		$where1 = array('ujian_id' => $this->input->get('ujian_id') );
		$data['ujian'] = $this->admin_mod->ujian_by_id($where1)->row();

		$where2 = array('soal_ujian_id' => $this->input->get('ujian_id') );
		$data['jum_soal'] = $this->main_mod->get_where('cbt_soal', $where2)->num_rows();
		$data['total'] = $this->admin_mod->total_skor($where2)->row();
		$data['data_soal'] = $this->main_mod->get_where('cbt_soal', $where2)->result_array();

		$where3 = array('soal_id' => $this->input->get('soal_id') );
		$data['soal'] = $this->main_mod->get_where('cbt_soal', $where3)->row();
		$data['nomor'] = $this->input->get('n');

		//data KD
		$soal_kd_id = $this->main_mod->get_where('cbt_soal', $where3)->row()->soal_kd_id;
		$where4 = array('kd_id'  => $soal_kd_id );
		$data['kompetensi'] = $this->main_mod->get_where('cbt_kd', $where4)->row();

		//navigasi soal
		$o_asc  = 'soal_id asc';
		$o_desc = 'soal_id desc';

		$where_next = array(
			'soal_id > ' => $this->input->get('soal_id'),
			'soal_ujian_id' =>$this->input->get('ujian_id')  
		);

		$where_prev = array(
			'soal_id < ' => $this->input->get('soal_id'),
			'soal_ujian_id' =>$this->input->get('ujian_id')  
		);

		$data['next'] = $this->main_mod->nav('cbt_soal', $where_next, $o_asc)->row();
		$data['prev'] = $this->main_mod->nav('cbt_soal', $where_prev, $o_desc)->row();
		$data['mm'] = $this->main_mod->select_where('min(soal_id) as first, max(soal_id) as last, count(soal_id) as max', 'cbt_soal', $where2)->row();

		//load view
		$this->load->view('admin/index', $data);
	}

	public function soal_edit()
	{
		//judul halaman
		$data['judul'] = "Edit Soal Ujian";
		$data['sub_judul'] = "Halaman edit soal ujian sistem CBT Teladan";

		//navbar
		$data['navbar'] = array('edit');
		$data['nav_active'] = "edit";

		//sidebar
		$data['sid_active'] = "ujian";

		//halaman yg diambil
		$data['page']  = "soal_edit";

		//load model
		$where1 = array('ujian_id' => $this->input->get('ujian_id') );
		$data['ujian'] = $this->admin_mod->ujian_by_id($where1)->row();

		$where2 = array('soal_ujian_id' => $this->input->get('ujian_id') );
		$data['jum_soal'] = $this->main_mod->get_where('cbt_soal', $where2)->num_rows();
		$data['total'] = $this->admin_mod->total_skor($where2)->row();

		$where3 = array('soal_id' => $this->input->get('soal_id') );
		$data['soal'] = $this->main_mod->get_where('cbt_soal', $where3)->row();
		$data['nomor'] = $this->input->get('n');

		//data KD
		$tingkat  = $this->admin_mod->ujian_by_id($where1)->row()->ujian_tingkat;
		$mapel_id = $this->admin_mod->ujian_by_id($where1)->row()->ujian_mapel_id;
		$where4 = array('kd_tingkat'  => $tingkat, 
						'kd_mapel_id' => $mapel_id);
		$data['kompetensi'] = $this->main_mod->select_ow('cbt_kd', 'kd_semester, kd_nomor', $where4)->result_array();

		//load view
		$this->load->view('admin/index', $data);
	}

	public function soal_update()
	{
		$datasoal = array(
			'soal_kd_id' => $this->input->post('soal_kd_id'),
			'soal_teks' => $this->input->post('soal_teks'),
			'soal_kunci' => $this->input->post('soal_kunci'),
			'soal_skor' => $this->input->post('soal_skor'),
		);

		$where = array('soal_id' => $this->input->get('soal_id'));

		$nomor    = $this->input->get('n');
		$ujian_id = $this->input->get('ujian_id');
		$soal_id  = $this->input->get('soal_id');

		$this->main_mod->update('cbt_soal', $where, $datasoal);
		redirect(base_url('index.php/admin/ujian_con/soal_preview').'?ujian_id='.$ujian_id.'&soal_id='.$soal_id.'&n='.$nomor);
	}

	public function pindah_soal()
	{
		$data = $this->input->post('data_soal');
		$data_soal = explode('-',$data);
		$ujian_id = $data_soal[1];
		$soal_id  = $data_soal[0];
		$nomor    = $data_soal[2];

		redirect(base_url('index.php/admin/ujian_con/soal_preview').'?ujian_id='.$ujian_id.'&soal_id='.$soal_id.'&n='.$nomor);

	}

	public function ujian_cetak()
	{
		$where = array(
			'soal_ujian_id' => $this->input->get('ujian_id'),
		);

		$where1 = array(
			'ujian_id' => $this->input->get('ujian_id'),
		);

		$where2 = array('set_id' => 1);
		$data['sekolah'] = $this->main_mod->get_where('cbt_setting', $where2)->row();
		$data['soal'] = $this->main_mod->get_where('cbt_soal',$where)->result_array();
		$data['identitas'] = $this->admin_mod->data_ujian($where1)->row();
		$this->load->view('print/ujian_cetak', $data);
	}

}
