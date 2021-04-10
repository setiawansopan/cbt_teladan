<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('main_mod');
		$this->load->model('admin_mod');
		$this->load->model('exam_mod');

		//usir jika tidak login
		if($this->session->login_guru != TRUE) {
			redirect(base_url('index.php/guru/login'));
		}
	}

	public function laporan()
	{
		//judul halaman
		$data['judul'] = "Laporan Penilaian";
		$data['sub_judul'] = "Halaman laporan penilaian sistem CBT Teladan";

		//navbar
		$data['navbar'] = array('laporan','anbuso','lembarjawab', 'presensi');
		$data['nav_active'] = "laporan";

		//sidebar
		$data['sid_active'] = "laporan";

		//halaman yg diambil
		$data['page']  = "laporan_page";

		//data ujian selesai
		$where = array(
			'ujian_tanggal <= ' => date('Y-m-d'),
			'mapel_id' => $this->session->mapel_id,
		);
		$where1 = array(
			'pj_ujian_id' => $this->input->post('ujian_id'),
		);
		$where_ujian_kd = array(
			'ujian_id' => $this->input->post('ujian_id'),
		);
		$where_soal_kd = array(
			'soal_ujian_id' => $this->input->post('ujian_id'),
		);
		$data['ujian'] = $this->admin_mod->ujian_by_id_guru($where)->result_array();
		$data['laporan'] = $this->admin_mod->laporan($where1)->result_array();
		$data['ujian_kd'] = $this->admin_mod->ujian_by_id($where_ujian_kd)->row();
		$data['kd'] = $this->admin_mod->get_kd($where_soal_kd)->result_array();
		//load view
		$this->load->view('guru/index', $data);
	}

	public function lembarjawab()
	{
		//judul halaman
		$data['judul'] = "Laporan Lembar Jawab";
		$data['sub_judul'] = "Halaman laporan lembar jawab sistem CBT Teladan";

		//navbar
		$data['navbar'] = array('laporan','anbuso','lembarjawab', 'presensi');
		$data['nav_active'] = "lembarjawab";

		//sidebar
		$data['sid_active'] = "laporan";

		//halaman yg diambil
		$data['page']  = "lembarjawab_page";

		//data ujian selesai
		$where = array(
			'ujian_tanggal <= ' => date('Y-m-d'),
			'mapel_id' => $this->session->mapel_id,
		);
		$where1 = array(
			'pj_ujian_id' => $this->input->post('ujian_id'),
		);
		$data['ujian'] = $this->admin_mod->ujian_by_id_guru($where)->result_array();
		$data['laporan'] = $this->admin_mod->laporan($where1)->result_array();
		
		//load view
		$this->load->view('guru/index', $data);
	}

	public function anbuso()
	{
		//judul halaman
		$data['judul'] = "Laporan Analisis Butir Soal";
		$data['sub_judul'] = "Halaman laporan analisis butir soal sistem CBT Teladan";

		//navbar
		$data['navbar'] = array('laporan','anbuso','lembarjawab', 'presensi');
		$data['nav_active'] = "anbuso";

		//sidebar
		$data['sid_active'] = "laporan";

		//halaman yg diambil
		$data['page']  = "anbuso_page";

		//data ujian selesai
		$where = array(
			'ujian_tanggal <= ' => date('Y-m-d'),
			'mapel_id' => $this->session->mapel_id,
		);
		$where1 = array(
			'pj_ujian_id' => $this->input->post('ujian_id'),
		);
		$data['ujian']   = $this->admin_mod->ujian_by_id_guru($where)->result_array();
		$data['laporan'] = $this->admin_mod->laporan($where1)->result_array();
		
		//load view
		$this->load->view('guru/index', $data);
	}

	public function presensi()
	{
		//judul halaman
		$data['judul'] = "Laporan Presensi Siswa";
		$data['sub_judul'] = "Halaman laporan presensi siswa sistem CBT Teladan";

		//navbar
		$data['navbar'] = array('laporan','anbuso','lembarjawab', 'presensi');
		$data['nav_active'] = "presensi";

		//sidebar
		$data['sid_active'] = "laporan";

		//halaman yg diambil
		$data['page']  = "presensi_page";

		$data['mulai'] = $this->main_mod->select_group('cbt_ujian', 'ujian_mulai', 'ujian_mulai')->result_array();
		$data['tingkat'] = $this->main_mod->select_group('cbt_peserta', 'peserta_kelas_tingkat', 'peserta_kelas_tingkat')->result_array();
		
		//load view
		$this->load->view('guru/index', $data);
	}

	public function get_kelas_by_ujian()
	{
		$ujian_id = $this->input->post('ujian_id');
		$data = $this->admin_mod->get_kelas_by_ujian($ujian_id)->result_array();
		// $data = $this->admin_mod->get_kelas_by_ujian('5ed5e0dfc9aea')->result_array();
		// return var_dump($data);
		echo json_encode($data);
	}

	public function laporan_cetak()
	{
		$where = array(
			'pj_ujian_id' => $this->input->get('ujian_id'),
		);
		$where1 = array(
			'ujian_id' => $this->input->get('ujian_id'),
		);
		$data['laporan'] = $this->admin_mod->laporan($where)->result_array();
		$data['identitas'] = $this->admin_mod->laporan_identitas($where1)->row();
		$this->load->view('print/laporan_penilaian', $data);
	}

	public function laporan_import()
	{
		$where = array(
			'pj_ujian_id' => $this->input->get('ujian_id'),
		);
		$where1 = array(
			'ujian_id' => $this->input->get('ujian_id'),
		);
		$data['laporan'] = $this->admin_mod->laporan($where)->result_array();
		$data['identitas'] = $this->admin_mod->laporan_identitas($where1)->row();
		$this->load->view('print/laporan_import', $data);
	}

	public function laporan_cetak_kd()
	{
		$where = array(
			'pj_ujian_id' => $this->input->post('ujian_id'),
			'soal_kd_id' => $this->input->post('kd_id'),
		);
		$where1 = array(
			'ujian_id' => $this->input->post('ujian_id'),
			'kd_id' => $this->input->post('kd_id'),
		);
		$data['laporan'] = $this->admin_mod->laporan_kd($where)->result_array();
		$data['identitas'] = $this->admin_mod->laporan_identitas_kd($where1)->row();
		$this->load->view('print/laporan_penilaian_kd', $data);
	}

	public function laporan_individu()
	{
		$where1 = array(
			'pu_ujian_id' => $this->input->get('ujian_id'),
			'peserta_id' => $this->input->get('peserta_id'),
		);
		$where2 = array(
			'pu_ujian_id'   => $this->input->get('ujian_id'),
			'pu_peserta_id' => $this->input->get('peserta_id'),
			'soal_mapel_id' => $this->input->get('mapel_id')
		);
		$where3 = array(
			'pj_ujian_id'   => $this->input->get('ujian_id'),
			'pj_peserta_id' => $this->input->get('peserta_id'),
		);

		//data kop sekolah
		$where = array('set_id' => 1);
		$data['sekolah'] = $this->main_mod->get_where('cbt_setting', $where)->row();

		$data['lembar_jawab'] = $this->admin_mod->lembar_jawab_koreksi($where3)->result_array();
		$data['identitas'] = $this->admin_mod->identitas_ujian($where1)->row();
		$data['koreksi'] = $this->exam_mod->koreksi($where2)->row();
		$data['jum_soal'] = $this->main_mod->get_where('cbt_peserta_jawaban', $where3)->num_rows();
		$this->load->view('print/laporan_individu', $data);
	}

	public function laporan_lembarjawab()
	{
		$where1 = array(
			'pu_ujian_id' => $this->input->post('ujian_id'),
			'peserta_kelas' => $this->input->post('peserta_kelas'),
		);
		$where2 = array(
			'pu_ujian_id'   => $this->input->post('ujian_id'),
			//'pu_peserta_id' => $this->input->get('peserta_id'),
			'soal_mapel_id' => $this->input->post('mapel_id')
		);
		$where3 = array(
			'pj_ujian_id'   => $this->input->post('ujian_id'),
			'peserta_kelas' => $this->input->post('peserta_kelas'),
		);
		$where4 = array(
			'pj_ujian_id' => $this->input->post('ujian_id'),
		);

		//data kop sekolah
		$where = array('set_id' => 1);
		$data['sekolah']      = $this->main_mod->get_where('cbt_setting', $where)->row();
		$data['lembar_jawab'] = $this->admin_mod->lembar_jawab_koreksi_kelas($where3)->result_array();
		$data['identitas']    = $this->admin_mod->identitas_ujian($where1)->result_array();
		$data['jum_soal']     = $this->main_mod->get_where('cbt_peserta_jawaban', $where4)->num_rows();
		$this->load->view('print/laporan_lembarjawab', $data);
	}

	public function daftar_hadir()
	{
		$where1 = array(
			'pu_ujian_id' => $this->input->get('ujian_id'),
			//'peserta_id' => $this->input->get('peserta_id'),
		);
		$where2 = array(
			'pu_ujian_id'   => $this->input->get('ujian_id'),
			//'pu_peserta_id' => $this->input->get('peserta_id'),
			'soal_mapel_id' => $this->input->get('mapel_id')
		);

		$where3 = array(
			'peserta_kelas_tingkat' => $this->input->get('tingkat'),
			'pu_ujian_id' => $this->input->get('ujian_id'),
		);

		//data kop sekolah
		$where = array('set_id' => 1);
		$data['sekolah']      = $this->main_mod->get_where('cbt_setting', $where)->row();
		$data['kelas'] 		  = $this->admin_mod->kelas_ujian($where3)->result_array();
		$data['identitas']    = $this->admin_mod->daftar_hadir($where1)->result_array();
		$data['ujian']        = $this->admin_mod->identitas_ujian($where1)->row();
		$data['nilai']        = $this->admin_mod->nilai($where2)->result_array();
		$this->load->view('print/laporan_daftar_hadir', $data);	
	}

	public function laporan_anbuso()
	{
		$where1 = array(
			'pu_ujian_id' => $this->input->post('ujian_id'),
			'peserta_kelas' => $this->input->post('peserta_kelas'),
		);
		$where2 = array(
			'pj_ujian_id'   => $this->input->post('ujian_id'),
			'peserta_kelas' => $this->input->post('peserta_kelas'),
		);
		$where3 = array(
			'soal_ujian_id'   => $this->input->post('ujian_id'),
		);

		$where = array('set_id' => 1);

		$data['kelas'] 		  = $this->input->post('peserta_kelas');
		$data['sekolah']      = $this->main_mod->get_where('cbt_setting', $where)->row();
		$data['ujian']        = $this->admin_mod->identitas_ujian($where1)->row();
		$data['identitas']    = $this->admin_mod->daftar_hadir($where1)->result_array();
		$data['jawaban']      = $this->admin_mod->get_jawaban($where2)->result_array();
		$data['jum_soal']     = $this->main_mod->get_where('cbt_soal', $where3)->num_rows();
		$this->load->view('print/laporan_anbuso', $data);
	}

	public function laporan_presensi()
	{

		$ujian_tanggal = $this->input->post('ujian_tanggal');
		$ujian_mulai = $this->input->post('ujian_mulai');
		$peserta_kelas_tingkat = $this->input->post('peserta_kelas_tingkat');
		$status = $this->input->post('status');
		
		if($status == "TIDAK MENGIKUTI")
			$router = "NOT";
		else
			$router = "";

		$where = array('set_id' => 1);
		$data['sekolah']    = $this->main_mod->get_where('cbt_setting', $where)->row();
		$data['laporan'] 	= $this->admin_mod->laporan_presensi($ujian_tanggal, $peserta_kelas_tingkat, $ujian_mulai, $router)->result_array();
		$data['tanggal'] = $ujian_tanggal;
		$data['mulai']   = $ujian_mulai;
		$data['status']  = $status;
 
		$this->load->view('print/laporan_presensi', $data);
	}
}
