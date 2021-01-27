<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('main_mod');
		$this->load->model('exam_mod');

		//usir jika tidak login
		if($this->session->login_peserta != TRUE) {
			redirect(base_url('index.php/exam/login'));
		}
	}

	public function index()
	{
		//data kop sekolah
		$where = array('set_id' => 1);
		$data['sekolah'] = $this->main_mod->get_where('cbt_setting', $where)->row();
			//data peserta ujian
		$wherepu = array(
			'pu_ujian_id'   => $this->session->ujian_id,
			'pu_peserta_id' => $this->session->peserta_id,
		);
		
		//buat sesi pu_id
		$this->session->set_userdata('pu_id', $this->main_mod->get_where('cbt_peserta_ujian', $wherepu)->row()->pu_id);

		//ambil peserta ujian
		$where3 = array(
			'pu_ujian_id' => $this->session->ujian_id,
			'pu_peserta_id' => $this->session->peserta_id,
		);
		$data['review'] = $this->exam_mod->review($where3)->row(); 
		
		//ambil jumlah soal
		$where2 = array('soal_ujian_id' => $this->session->ujian_id,);
		$jum_soal = $this->main_mod->get_where('cbt_soal', $where2)->num_rows();
		$this->session->set_userdata('jum_soal', $jum_soal);

		//data lembar jawab
		$where1 = array(
			'pj_ujian_id'   => $this->session->ujian_id,
			'pj_peserta_id' => $this->session->peserta_id,
		);
		$data['lembar_jawab'] = $this->main_mod->select_where('cbt_peserta_jawaban.*', 'cbt_peserta_jawaban', $where1)->result_array();
		//ambil soal pertama siswa
		$where1 = array(
			'pj_ujian_id'   => $this->session->ujian_id,
			'pj_peserta_id' => $this->session->peserta_id,
		); 
		$data['soal'] = $this->exam_mod->ambil_soal_pertama($where1)->row();
		$data['n'] = '1';
		$this->load->view('exam/soal_page', $data);
	}

	public function act()
	{
		//data kop sekolah
		$where = array('set_id' => 1);
		$data['sekolah'] = $this->main_mod->get_where('cbt_setting', $where)->row();

		//navigasi soal
		$o_asc  = 'pj_id asc';
		$o_desc = 'pj_id desc';

		$where_next = array('pj_id > ' => $this->input->post('pj_id'),);
		$where_prev = array('pj_id < ' => $this->input->post('pj_id'),);
		$where_save = array('pj_id ' => $this->input->post('pj_id'),);
		$where_link = array('pj_id ' => $this->input->get('pj_id'),);

		//data lembar jawab
		$where1 = array(
			'pj_ujian_id'   => $this->session->ujian_id,
			'pj_peserta_id' => $this->session->peserta_id,
		);
	
		//data peserta ujian
		$wherepu = array(
			'pu_ujian_id'   => $this->session->ujian_id,
			'pu_peserta_id' => $this->session->peserta_id,
		);

		$where_pu_id = array(
			'pu_id' => $this->session->pu_id,
		);
	
		//update session waktu
		$this->session->set_userdata('pu_durasi', $this->main_mod->get_where('cbt_peserta_ujian', $where_pu_id)->row()->pu_durasi);
		
		//------------------------------------------------------
		//JIKA TOMBOL LINK DITEKAN
		//------------------------------------------------------
		if (!empty($this->input->get('link'))) {

		//data jawaban dan id jawaban dari link
		$datajwb = array(
			'pj_jawaban' 	=> $this->input->get('pj_jawaban'),
			'pj_ragu' 		=> $this->input->get('pj_ragu'),
		);
		$wherepj 	= array('pj_id' => $this->input->get('pj_id'));

		//update
		//$this->main_mod->update('cbt_peserta_jawaban', $wherepj, $datajwb );

		//tampil data
		$data['soal'] 		  = $this->exam_mod->ambil_soal($where_link, $o_asc)->row();
		$data['n'] 			  = $this->input->get('n');
		$data['lembar_jawab'] = $this->main_mod->select_where('cbt_peserta_jawaban.*', 'cbt_peserta_jawaban', $where1)->result_array();
		$data['review'] 	  = $this->exam_mod->review($wherepu)->row();

		//load page
		$this->load->view('exam/soal_page', $data);
		}

		//------------------------------------------------------
		//JIKA TOMBOL PREV DITEKAN
		//------------------------------------------------------
		if (!empty($this->input->post('prev'))) {

		//data jawaban dan id jawaban dari tombol
		$datajwb = array(
			'pj_jawaban' 	=> $this->input->post('pj_jawaban'),
			'pj_ragu' 		=> $this->input->post('pj_ragu'),
		);
		$wherepj 	= array('pj_id' => $this->input->post('pj_id'));
		$n 			= $this->input->post('n');		
		
		//update
		$this->main_mod->update('cbt_peserta_jawaban', $wherepj, $datajwb );
		
		//get data
		$data['soal']         = $this->exam_mod->ambil_soal($where_prev, $o_desc)->row();
		$data['n']            = $n-1;
		$data['lembar_jawab'] = $this->main_mod->select_where('cbt_peserta_jawaban.*', 'cbt_peserta_jawaban', $where1)->result_array();
		$data['review']       = $this->exam_mod->review($wherepu)->row();

		//load page
		$this->load->view('exam/soal_page', $data);
		}

		//------------------------------------------------------
		//JIKA TOMBOL NEXT DITEKAN
		//------------------------------------------------------
		if (!empty($this->input->post('next'))) {
		//data jawaban dan id jawaban dari tombol
		$datajwb = array(
			'pj_jawaban' 	=> $this->input->post('pj_jawaban'),
			'pj_ragu' 		=> $this->input->post('pj_ragu'),
		);
		$wherepj 	= array('pj_id' => $this->input->post('pj_id'));
		$n 			= $this->input->post('n');		

		//update
		$this->main_mod->update('cbt_peserta_jawaban', $wherepj, $datajwb);

		//tampil data
		$data['soal'] 		  = $this->exam_mod->ambil_soal($where_next, $o_asc)->row();
		$data['n'] 			  = $n+1;
		$data['lembar_jawab'] = $this->main_mod->select_where('cbt_peserta_jawaban.*', 'cbt_peserta_jawaban', $where1)->result_array();
		$data['review'] 	  = $this->exam_mod->review($wherepu)->row();

		//load page
		$this->load->view('exam/soal_page', $data);
		}

		//------------------------------------------------------
		//JIKA TOMBOL FIRST DITEKAN
		//------------------------------------------------------
		if (!empty($this->input->post('first'))) {

		//data jawaban dan id jawaban dari tombol
		$datajwb = array(
			'pj_jawaban' 	=> $this->input->post('pj_jawaban'),
			'pj_ragu' 		=> $this->input->post('pj_ragu'),
		);
		$wherepj 	= array('pj_id' => $this->input->post('pj_id'));
		$n 			= $this->input->post('n');		
		
		//update
		$this->main_mod->update('cbt_peserta_jawaban', $wherepj, $datajwb );

		//tampil data
		$data['soal']         = $this->exam_mod->ambil_soal($where1, $o_asc)->row();
		$data['n'] 			  = 1;
		$data['lembar_jawab'] = $this->main_mod->select_where('cbt_peserta_jawaban.*', 'cbt_peserta_jawaban', $where1)->result_array();
		$data['review'] 	  = $this->exam_mod->review($wherepu)->row();	
		$this->load->view('exam/soal_page', $data);
		}

		//------------------------------------------------------
		//JIKA TOMBOL LAST DITEKAN
		//------------------------------------------------------
		if (!empty($this->input->post('last'))) {

		//data jawaban dan id jawaban dari tombol
		$datajwb = array(
			'pj_jawaban' 	=> $this->input->post('pj_jawaban'),
			'pj_ragu' 		=> $this->input->post('pj_ragu'),
		);
		$wherepj 	= array('pj_id' => $this->input->post('pj_id'));
		$n 			= $this->input->post('n');		
		
		//update
		$this->main_mod->update('cbt_peserta_jawaban', $wherepj, $datajwb );

		//tampil data
		$data['soal'] 		  = $this->exam_mod->ambil_soal($where1, $o_desc)->row();
		$data['n'] 			  = $this->main_mod->get_where('cbt_peserta_jawaban', $where1)->num_rows();
		$data['lembar_jawab'] = $this->main_mod->select_where('cbt_peserta_jawaban.*', 'cbt_peserta_jawaban', $where1)->result_array();
		$data['review'] 	  = $this->exam_mod->review($wherepu)->row();	

		//load page
		$this->load->view('exam/soal_page', $data);
		}

		//------------------------------------------------------
		//JIKA TOMBOL SIMPAN DITEKAN
		//------------------------------------------------------
		if (!empty($this->input->post('save'))) {

		//data jawaban dan id jawaban dari tombol
		$datajwb = array(
			'pj_jawaban' 	=> $this->input->post('pj_jawaban'),
			'pj_ragu' 		=> $this->input->post('pj_ragu'),
		);
		$wherepj 	= array('pj_id' => $this->input->post('pj_id'));
		$n 			= $this->input->post('n');		

		//update
		$this->main_mod->update('cbt_peserta_jawaban', $wherepj, $datajwb);

		//tampil data
		$data['soal'] 		  = $this->exam_mod->ambil_soal($where_save, $o_asc)->row();
		$data['n'] 			  = $n;
		$data['lembar_jawab'] = $this->main_mod->select_where('cbt_peserta_jawaban.*', 'cbt_peserta_jawaban', $where1)->result_array();
		$data['review'] 	  = $this->exam_mod->review($wherepu)->row();

		//load page	
		$this->load->view('exam/soal_page', $data);
		}
		
		//------------------------------------------------------
		//JIKA TOMBOL SELESAI DITEKAN
		//------------------------------------------------------
		if (!empty($this->input->post('selesai'))) {

		//data jawaban dan id jawaban dari tombol
		$data_jwb = array(
			'pj_jawaban' 	=> $this->input->post('pj_jawaban'),
			'pj_ragu' 		=> $this->input->post('pj_ragu'),
		);

		$where_pj 	= array(
			'pj_id' => $this->input->post('pj_id')
		);

		$data_sls = array(
			'pu_selesai' => date('Y-m-d H:i:s'),
			'pu_status' => 'of',
		);

		$where_review = array(
			'pu_ujian_id'   => $this->session->ujian_id,
			'pu_peserta_id' => $this->session->peserta_id,
		);

		$where_koreksi = array(
			'pu_ujian_id'   => $this->session->ujian_id,
			'pu_peserta_id' => $this->session->peserta_id,
			'soal_mapel_id' => $this->session->mapel_id,
		);

		$where_lj = array(
			'pj_ujian_id'   => $this->session->ujian_id,
			'pj_peserta_id' => $this->session->peserta_id,
		);

		$where_peserta = array(
			'peserta_id' => $this->session->peserta_id,
		);

		//update data
		$this->main_mod->update('cbt_peserta_jawaban', $where_pj, $data_jwb);
		$this->main_mod->update('cbt_peserta_ujian', $where_review, $data_sls);

		//tampil data
		$data['lembar_jawab'] = $this->main_mod->select_where('pj_jawaban, pj_id','cbt_peserta_jawaban', $where_lj)->result_array();
		$data['peserta'] 	  = $this->main_mod->get_where('cbt_peserta', $where_peserta)->row();
		$data['review'] 	  = $this->exam_mod->review($where_review)->row();
		$data['koreksi'] 	  = $this->exam_mod->koreksi($where_koreksi)->row();

		//hapus session
		$this->session->sess_destroy();

		//load page
		$this->load->view('exam/review_page', $data);
		}
		
	}

	public function selesai()
	{
		//data kop sekolah
		$where = array('set_id' => 1);
		$data['sekolah'] = $this->main_mod->get_where('cbt_setting', $where)->row();

		$where1 = array(
			'pj_ujian_id'   => $this->session->ujian_id,
			'pj_peserta_id' => $this->session->peserta_id,
		);
		
		$where2 = array('pu_ujian_id' => $this->session->ujian_id, );
		$datasls = array(
			'pu_selesai' => date('Y-m-d H:i:s'),
			'pu_status' => 'of',
		);
		$where3 = array(
			'pu_ujian_id'   => $this->session->ujian_id,
			'pu_peserta_id' => $this->session->peserta_id,
		);
		$where_koreksi = array(
			'pu_ujian_id'   => $this->session->ujian_id,
			'pu_peserta_id' => $this->session->peserta_id,
			'soal_mapel_id' => $this->session->mapel_id,
		);
		$where4 = array('peserta_id' => $this->session->peserta_id);
		//$this->main_mod->update('cbt_peserta_jawaban', $wherepj, $datajwb);
		$this->main_mod->update('cbt_peserta_ujian', $where3, $datasls);
		$data['lembar_jawab'] = $this->main_mod->select_where('pj_jawaban, pj_id', 'cbt_peserta_jawaban', $where1)->result_array();
		$data['peserta'] = $this->main_mod->get_where('cbt_peserta', $where4)->row();
		$data['review'] = $this->exam_mod->review($where3)->row();
		$data['koreksi'] = $this->exam_mod->koreksi($where_koreksi)->row();
		
		$this->load->view('exam/review_page', $data);
	}

	public function update_durasi() 
	{
		$where_pu_durasi   = array('pu_durasi' => $this->input->post('pu_durasi'));
		$where_pu_id  = array('pu_id' => $this->input->post('pu_id'),);
		//update
		$this->main_mod->update('cbt_peserta_ujian', $where_pu_id, $where_pu_durasi);

		$this->session->set_userdata('pu_durasi', $this->main_mod->get_where('cbt_peserta_ujian', $where_pu_id)->row()->pu_durasi);

		$data['durasi'] = $this->main_mod->get_where('cbt_peserta_ujian', $where_pu_id)->row()->pu_durasi;

		echo json_encode($data);
	}

	public function update_jawaban() 
	{
		//nilai variabel
		$datajwb = array(
			'pj_jawaban' 	=> $this->input->post('pj_jawaban'),
		);

		//identitas jawaban
		$wherepj 	= array('pj_id' => $this->input->post('pj_id'));

		$where_pu_id  = array('pu_id' => $this->input->post('pu_id'),);

		//update
		$this->main_mod->update('cbt_peserta_jawaban', $wherepj, $datajwb );
		$lembar_jawab = $this->main_mod->select_where('cbt_peserta_jawaban.*', 'cbt_peserta_jawaban', $wherepj)->result_array();

		$this->session->set_userdata('pu_durasi', $this->main_mod->get_where('cbt_peserta_ujian', $where_pu_id)->row()->pu_durasi);

		echo json_encode($lembar_jawab);
	}

	public function update_ragu() 
	{
		//data chekbox ragu
		$dataragu = array(
			'pj_ragu' 	=> $this->input->post('pj_ragu'),
			);
		//identitas jawaban
		$wherepj 	= array('pj_id' => $this->input->post('pj_id'));
		
		$where_pu_id  = array('pu_id' => $this->input->post('pu_id'),);
		
		//update
		$this->main_mod->update('cbt_peserta_jawaban', $wherepj, $dataragu );
		$lembar_jawab = $this->main_mod->select_where('cbt_peserta_jawaban.*', 'cbt_peserta_jawaban', $wherepj)->result_array();

		$this->session->set_userdata('pu_durasi', $this->main_mod->get_where('cbt_peserta_ujian', $where_pu_id)->row()->pu_durasi);

		echo json_encode($lembar_jawab);
	}

	public function soal_first()
	{
		$where_pu_id  = array('pu_id' => $this->input->post('pu_id'),);

		$data['jum_soal'] = $this->input->post('jum_soal');
		$where1 = array(
			'pj_ujian_id'   => $this->input->post('ujian_id'),
			'pj_peserta_id' => $this->input->post('peserta_id'),
		);
		$data['n'] = 1;

		$o_asc  = 'pj_id asc';
		$data['soal']         = $this->exam_mod->ambil_soal($where1, $o_asc)->row();

		$this->session->set_userdata('pu_durasi', $this->main_mod->get_where('cbt_peserta_ujian', $where_pu_id)->row()->pu_durasi);

		echo json_encode($data);
	}

	public function soal_last()
	{
		$where_pu_id  = array('pu_id' => $this->input->post('pu_id'),);

		$data['jum_soal'] = $this->input->post('jum_soal');
		$where1 = array(
			'pj_ujian_id'   => $this->input->post('ujian_id'),
			'pj_peserta_id' => $this->input->post('peserta_id'),
		);
		$data['n'] 			  = $this->main_mod->get_where('cbt_peserta_jawaban', $where1)->num_rows();

		$o_desc = 'pj_id desc';
		$data['soal']         = $this->exam_mod->ambil_soal($where1, $o_desc)->row();

		$this->session->set_userdata('pu_durasi', $this->main_mod->get_where('cbt_peserta_ujian', $where_pu_id)->row()->pu_durasi);

		echo json_encode($data);
	}

	public function soal_prev()
	{
		$where_pu_id  = array('pu_id' => $this->input->post('pu_id'),);

		$jum_soal = $this->input->post('jum_soal');
		$n = $this->input->post('n');
        if($n > 1) {
            $data['n_new'] = $n-1;
        } else {
            $data['n_new'] = $n;
        }
        $data['jum_soal'] = $jum_soal;

		$o_desc = 'pj_id desc';
		$where_prev = array('pj_id < ' => $this->input->post('pj_id'),);

		$data['soal']         = $this->exam_mod->ambil_soal($where_prev, $o_desc)->row();
		
		$this->session->set_userdata('pu_durasi', $this->main_mod->get_where('cbt_peserta_ujian', $where_pu_id)->row()->pu_durasi);

		echo json_encode($data);
	}

	public function soal_next()
	{
		$where_pu_id  = array('pu_id' => $this->input->post('pu_id'),);

		$jum_soal = $this->input->post('jum_soal');
		$n = $this->input->post('n');
        if($n < $jum_soal) {
            $data['n_new'] = $n+1;
        } else {
            $data['n_new'] = $n;
        }
        $data['jum_soal'] = $jum_soal;

		$o_asc = 'pj_id asc';

		$where_next = array('pj_id > ' => $this->input->post('pj_id'),);

		$data['soal']         = $this->exam_mod->ambil_soal($where_next, $o_asc)->row();
		
		$this->session->set_userdata('pu_durasi', $this->main_mod->get_where('cbt_peserta_ujian', $where_pu_id)->row()->pu_durasi);

		echo json_encode($data);
	}

	public function go_to_soal()
	{
		$where_pu_id  = array('pu_id' => $this->input->post('pu_id'),);
		
		$where_link = array('pj_id ' => $this->input->post('pj_id'),);

		$o_asc  = 'pj_id asc';
		
		//tampil data
		$data['soal'] 		  = $this->exam_mod->ambil_soal($where_link, $o_asc)->row();
		$data['n_new'] 	  = $this->input->post('n');
		$data['jum_soal'] = $this->input->post('jum_soal');

		$this->session->set_userdata('pu_durasi', $this->main_mod->get_where('cbt_peserta_ujian', $where_pu_id)->row()->pu_durasi);
		
		echo json_encode($data);
	}
}