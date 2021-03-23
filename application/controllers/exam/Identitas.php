<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Identitas extends CI_Controller {
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
		$where1 = array('peserta_id' => $this->session->peserta_id);
		$where2 = array('set_id' => 1);
		$data['peserta'] = $this->main_mod->get_where('cbt_peserta', $where1)->row();
		$data['sekolah'] = $this->main_mod->get_where('cbt_setting', $where2)->row();
		//ambil ujian
		$kelas  = explode(' ', $this->main_mod->get_where('cbt_peserta', $where1)->row()->peserta_kelas);
		$where = array('ujian_tingkat' => $kelas[0]); 
		$data['ujian']   = $this->exam_mod->ujian_daftar($where)->result_array();
		$this->load->view('exam/identitas_page', $data);
	}

	public function detail()
	{
		//data kop sekolah
		$where = array('set_id' => 1);
		$data['sekolah'] = $this->main_mod->get_where('cbt_setting', $where)->row();

		$where = array(
		'ujian_id' => $this->input->get('ujian_id'),
		);
		$data['ujian'] = $this->exam_mod->ujian_detail($where)->row();
		$this->load->view('exam/detail_page', $data);
	}

	public function foto()
	{
		$where1 = array('peserta_id' => $this->session->peserta_id);
		$where2 = array('set_id' => 1);
		$data['peserta'] = $this->main_mod->get_where('cbt_peserta', $where1)->row();
		$data['sekolah'] = $this->main_mod->get_where('cbt_setting', $where2)->row();
		//ambil ujian
		
		$this->load->view('exam/foto_page', $data);
	}

	public function savefoto()
	{
		$config['file_name']			= $this->input->post('nis');
		$config['upload_path']          = './images/peserta/';
        $config['allowed_types']        = 'jpg';
        $config['max_size']             = 200;
        $config['max_width']            = 5366;
        $config['max_height']           = 5000;
        $config['overwrite']			= TRUE;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
                $this->session->set_flashdata('error_foto', $this->upload->display_errors());
                redirect(base_url('index.php/exam/identitas/foto'));
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $this->session->set_flashdata('success_foto', 'Upload Foto berhasil!');
                redirect(base_url('index.php/exam/identitas'));
        }
	}

	public function auth()
	{
		$peserta_id = $this->session->peserta_id;
		$ujian_id   = $this->input->post('ujian_id');
		$token = $this->input->post('ujian_token');

		//ambil status ujian
		$where4 = array(
			'pu_ujian_id'   => $ujian_id,
			'pu_peserta_id' => $peserta_id  
		);
		$pu_status = $this->main_mod->get_where('cbt_peserta_ujian', $where4)->row()->pu_status;
		//$pu_mac = $this->main_mod->get_where('cbt_peserta_ujian', $where4)->row()->pu_mac;

		//ambil token dan mapel_id
		$where = array('ujian_id' => $ujian_id);

		$ujian_token = $this->main_mod->get_where('cbt_ujian', $where)->row()->ujian_token;
		$mapel_id    = $this->main_mod->get_where('cbt_ujian', $where)->row()->ujian_mapel_id;
		$durasi_ujian = $this->main_mod->get_where('cbt_ujian', $where)->row()->ujian_durasi;
		$ujian_tanggal   = $this->main_mod->get_where('cbt_ujian', $where)->row()->ujian_tanggal;
		$ujian_mulai   = $this->main_mod->get_where('cbt_ujian', $where)->row()->ujian_mulai;
		$ujian_jenis = $this->main_mod->get_where('cbt_ujian', $where)->row()->ujian_jenis;
		$ujian_pinalti = $this->main_mod->get_where('cbt_ujian', $where)->row()->ujian_pinalti;

		if($ujian_pinalti == 1) {
			$peserta_mulai = strtotime(date('Y-m-d H:i:s')); 
			$ujian_buka = strtotime($ujian_tanggal.' '.$ujian_mulai); 

			$diff_waktu = ($peserta_mulai - $ujian_buka)/60;
			$durasi = $durasi_ujian-$diff_waktu;
		} else {
			$durasi = $durasi_ujian;
		}

		//buat durasi ujian
		$jam = intdiv($durasi, 60);
		$menit = $durasi % 60;
		$detik = '0';
		$new_durasi = $jam.':'.$menit.':'.$detik;

		//cek kondisi
		if($pu_status == 'of') {
			//$this->session->set_flashdata('error', 'KESALAHAN : Anda telah menyelesaikan penilaian ini.');
			$this->session->set_flashdata('err_status', 'true');
			redirect(base_url('index.php/exam/identitas/detail?ujian_id='.$ujian_id.''));
		}

		else if($ujian_token != $token) {
			//$this->session->set_flashdata('error', 'KESALAHAN : Token Tidak Valid');
			$this->session->set_flashdata('err_token', 'true');
			redirect(base_url('index.php/exam/identitas/detail?ujian_id='.$ujian_id.''));
		}

		// else if(!empty($pu_mac)) {
		// 	if($pu_mac != get_mac()){
		// 	//$this->session->set_flashdata('error', 'KESALAHAN : Token Tidak Valid');
		// 	$this->session->set_flashdata('err_mac', 'true');
		// 	redirect(base_url('index.php/exam/identitas/detail?ujian_id='.$ujian_id.''));
		// 	}
		// }

		else
		{
			$where2 = array(
				'pu_ujian_id' => $ujian_id,
				'pu_peserta_id' => $peserta_id
			);
			$cek = $this->main_mod->get_where('cbt_peserta_ujian', $where2)->row();

			if(empty($cek->pu_peserta_id))
				{			
					$uniqid = uniqid();
					$data = array(
						'pu_id' => $uniqid, 
						'pu_ujian_id' => $ujian_id,
						'pu_peserta_id' => $peserta_id,
						'pu_mulai' => date('Y-m-d H:i:s'),
						'pu_durasi' => $new_durasi,
						'pu_status' => 'on',
						'pu_jenis' => $ujian_jenis,
						'pu_mac' => get_mac(),
					);
					$this->main_mod->insert('cbt_peserta_ujian', $data);

					//random soal
					$where3 = array('soal_ujian_id' => $ujian_id);
					$soal_id = $this->main_mod->select_where('soal_id', 'cbt_soal', $where3)->result_array();
					shuffle($soal_id);
					foreach ($soal_id as $soal_id) {
						$datasoal[] = array(
							//'pj_id'  		=> uniqid(),
							'pj_pu_id' 		=> $uniqid,
							'pj_ujian_id' 	=> $ujian_id,
							'pj_soal_id' 	=> $soal_id['soal_id'], 
							'pj_peserta_id' => $this->session->peserta_id,
						);
					}
					$this->main_mod->insert_batch('cbt_peserta_jawaban', $datasoal);
				}
			
			if(!empty($cek->pu_peserta_id))
				{
					$set = array(
						'pu_durasi' => $new_durasi,
					);
					
					$this->main_mod->update('cbt_peserta_ujian', $where2, $set);
				}
			
			//buat session
			$this->session->set_userdata('ujian_id', $ujian_id);
			$this->session->set_userdata('mapel_id', $mapel_id);
			
			//buat durasi ujian
			$this->session->set_userdata('pu_durasi', $this->main_mod->get_where('cbt_peserta_ujian', $where4)->row()->pu_durasi);	

			//redirect
			redirect(base_url('index.php/exam/soal'));
		}
	}
}
