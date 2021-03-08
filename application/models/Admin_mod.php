<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_mod extends CI_Model {
	//-----------------------------------
	//bagian dashboard
	//-----------------------------------
	public function online()
	{
		return $this->db->select('*')
				->from('cbt_peserta_ujian')
				->join('cbt_peserta', 'pu_peserta_id = peserta_id')
				->join('cbt_ujian', 'pu_ujian_id = ujian_id')
				->join('cbt_mapel', 'ujian_mapel_id = mapel_id')
				->limit(5)
				->order_by('pu_id DESC')
				->get();
	}
	//--------------------------------------
	//Bagian ujian
	//-------------------------------------
	public function ujian_all()
	{
		$query = $this->db->select('cbt_ujian.*, cbt_mapel.*, count(soal_id) as jum_soal, min(soal_id) as soal_id')
		->from('cbt_ujian')
		->join('cbt_mapel','ujian_mapel_id = mapel_id')
		->join('cbt_soal', 'ujian_id = soal_ujian_id', 'left')
		->group_by('ujian_id')
		->order_by('ujian_tanggal ASC, ujian_tingkat ASC, ujian_mulai ASC')
		->get();
		return $query->result_array();
	}

	public function ujian_by_id($where)
	{
		return $this->db->select('*')
		->from('cbt_ujian')
		->join('cbt_mapel','ujian_mapel_id = mapel_id')
		->where($where)
		->get();
	}

	//--------------------------------------
	//Bagian mapel
	//--------------------------------------
	public function mapel_all()
	{
		return $this->db->select('cbt_mapel.*, ujian_id')
				->from('cbt_mapel')
				->join('cbt_ujian', 'mapel_id = ujian_mapel_id', 'left')
				->group_by('mapel_id')
				->order_by('mapel_urut')
				->get();
	}

	public function get_kd($where)
	{
		return $this->db->select('*')
				->from('cbt_kd')
				->join('cbt_soal','kd_id = soal_kd_id')
				->group_by('soal_kd_id')
				->order_by('kd_nomor')
				->where($where)
				->get();
	}

	public function guru_mapel()
	{
		return $this->db->select('cbt_guru.*, cbt_mapel.*, cbt_guru_mapel.*')
				->from('cbt_guru_mapel')
				->join('cbt_guru', 'gm_guru_id = guru_id')
				->join('cbt_mapel', 'gm_mapel_id = mapel_id')
				->order_by('guru_nama')
				->get();
	}

	//-------------------------------------
	//bagian status
	//-------------------------------------
	public function status($where)
	{
		return $this->db->select('*')
			->from('cbt_ujian')
			->join('cbt_mapel', 'ujian_mapel_id = mapel_id')
			->join('cbt_peserta_ujian', 'ujian_id = pu_ujian_id')
			->join('cbt_peserta', 'pu_peserta_id = peserta_id')
			->where($where)
			->order_by('peserta_kelas ASC, peserta_nama ASC')
			->get();
	}

	//----------------------------------------
	//bagian laporan
	//---------------------------------------
	public function laporan($where)
	{
		return $this->db->select('
			cbt_peserta.*,cbt_mapel.*, cbt_peserta_jawaban.*, cbt_peserta_ujian.pu_mulai,
			sum(IF(soal_kunci = pj_jawaban, soal_skor, 0)) as nilai,
			sum(IF(soal_kunci = pj_jawaban, 1, 0)) as benar,
			sum(IF(soal_kunci != pj_jawaban, 1, 0)) as salah,
			sum(soal_skor) as max_skor'
		)
		->from('cbt_soal')
		->join('cbt_peserta_jawaban', 'soal_id = pj_soal_id')
		->join('cbt_peserta', 'pj_peserta_id = peserta_id')
		->join('cbt_peserta_ujian', 'pu_id = pj_pu_id')
		->join('cbt_mapel', 'soal_mapel_id = mapel_id')
		->where($where)
		->group_by('peserta_id')
		// ->order_by('pu_mulai ASC')
		->order_by('peserta_kelas ASC')
		->order_by('peserta_nama ASC')
		->get();
	}

	public function laporan_kd($where)
	{
		return $this->db->select('
			cbt_peserta.*,cbt_mapel.*, cbt_peserta_jawaban.*, cbt_peserta_ujian.pu_mulai,
			sum(IF(soal_kunci = pj_jawaban, soal_skor, 0)) as nilai,
			sum(IF(soal_kunci = pj_jawaban, 1, 0)) as benar,
			sum(IF(soal_kunci != pj_jawaban, 1, 0)) as salah,
			sum(soal_skor) as max_skor'
		)
		->from('cbt_soal')
		->join('cbt_peserta_jawaban', 'soal_id = pj_soal_id')
		->join('cbt_peserta', 'pj_peserta_id = peserta_id')
		->join('cbt_peserta_ujian', 'pu_id = pj_pu_id')
		->join('cbt_mapel', 'soal_mapel_id = mapel_id')
		->join('cbt_kd','kd_id = soal_kd_id')
		->where($where)
		->group_by('peserta_id')
		// ->order_by('pu_mulai ASC')
		->order_by('peserta_kelas ASC')
		->order_by('peserta_nama ASC')
		->get();
	}

	public function laporan_identitas($where)
	{
		return $this->db->select('*')
			->from('cbt_ujian')
			->join('cbt_mapel', 'ujian_mapel_id = mapel_id')
			->where($where)
			->get();
	}

	public function laporan_identitas_kd($where)
	{
		return $this->db->select('*')
			->from('cbt_ujian')
			->join('cbt_mapel', 'ujian_mapel_id = mapel_id')
			->join('cbt_kd','mapel_id = kd_mapel_id')
			->where($where)
			->get();
	}

	public function identitas_ujian($where)
	{
		return $this->db->select('*')
			->from('cbt_peserta')
			->join('cbt_peserta_ujian', 'peserta_id = pu_peserta_id')
			->join('cbt_ujian', 'pu_ujian_id = ujian_id')
			->join('cbt_mapel', 'ujian_mapel_id = mapel_id')
			->where($where)
			->order_by('peserta_kelas ASC, peserta_nama ASC')
			->get();
	}

	public function lembar_jawab_koreksi($where)
	{
		return $this->db->select('*')
			->from('cbt_peserta_jawaban')
			->join('cbt_soal', ' pj_soal_id = soal_id')
			->where($where)
			->order_by('soal_id')
			->get();
	}

	public function lembar_jawab_koreksi_kelas($where)
	{
		return $this->db->select('*')
			->from('cbt_peserta_jawaban')
			->join('cbt_soal', ' pj_soal_id = soal_id')
			->join('cbt_peserta', 'pj_peserta_id = peserta_id')
			->where($where)
			->order_by('soal_id')
			->get();
	}


	public function grafik()
	{
		return $this->db->select("
			DATE_FORMAT(ujian_tanggal, '%d/%m/%y') as ujian_tanggal,
			SUM(IF(ujian_tingkat = 'X', 1, 0)) as jx,
			SUM(IF(ujian_tingkat = 'XI', 1, 0)) as jxi,
			SUM(IF(ujian_tingkat = 'XII', 1, 0)) as jxii,
			")
			->from('cbt_peserta_ujian')
			->join('cbt_ujian', 'pu_ujian_id = ujian_id')
			->group_by('ujian_tanggal')
			->limit(7)
			->order_by('ujian_tanggal DESC')
			->get();
	}

	public function kelas_ujian($where)
	{
		return $this->db->select('peserta_kelas')
				->from('cbt_peserta_ujian')
				->join('cbt_peserta', 'peserta_id = pu_peserta_id')
				->where($where)
				->group_by('peserta_kelas')
				->order_by('peserta_kelas')
				->get();
	}

	public function daftar_hadir($where)
	{
		return $this->db->select('
			cbt_peserta.*, cbt_peserta_ujian.*,cbt_ujian.*,cbt_mapel.*,
			DATE_FORMAT(pu_mulai, "%h:%i:%s") as mulai,
			DATE_FORMAT(pu_selesai, "%h:%i:%s") as selesai
			')
			->from('cbt_peserta')
			->join('cbt_peserta_ujian', 'peserta_id = pu_peserta_id', 'left')
			->join('cbt_ujian', 'pu_ujian_id = ujian_id', 'left')
			->join('cbt_mapel', 'ujian_mapel_id = mapel_id', 'left')
			->where($where)
			->order_by('peserta_kelas ASC, peserta_nama ASC')
			->get();
	}

	public function nilai($where)
	{
		return $this->db->select('
			sum(IF(soal_kunci = pj_jawaban, soal_skor, 0)) as nilai,
			sum(soal_skor) as max_skor'
		)
		->from('cbt_soal')
		->join('cbt_peserta_jawaban', 'soal_id = pj_soal_id')
		->join('cbt_peserta_ujian', 'pj_peserta_id = pu_peserta_id')
		->join('cbt_peserta', 'pj_peserta_id = peserta_id')
		->where($where)
		->group_by('pj_peserta_id')
		->order_by('peserta_kelas ASC, peserta_nama ASC')
		->get();
	}

	public function get_kelas_by_ujian($ujian_id)
	{
		$where = array('pj_ujian_id' => $ujian_id);

		return $this->db->select('*')
		->from('cbt_peserta_jawaban')
		->join('cbt_peserta', 'pj_peserta_id = peserta_id')
		->where($where)
		->group_by('peserta_kelas')
		->order_by('peserta_kelas')
		->get();
	}

	public function get_jawaban($where)
	{
		return $this->db->select('pj_peserta_id, pj_jawaban, soal_kunci')
		->from('cbt_peserta_jawaban')
		->join('cbt_peserta', 'pj_peserta_id = peserta_id')
		->join('cbt_soal', 'pj_soal_id = soal_id')
		->where($where)
		->order_by('pj_soal_id')
		->get();
	}

	public function laporan_presensi($ujian_tanggal, $peserta_kelas_tingkat, $ujian_mulai, $router)
	{
		return $this->db->query("SELECT * FROM cbt_peserta WHERE peserta_id ".$router." IN (SELECT pu_peserta_id FROM cbt_peserta_ujian JOIN cbt_ujian ON (pu_ujian_id = ujian_id) WHERE ujian_tanggal = '".$ujian_tanggal."' AND ujian_mulai = '".$ujian_mulai."') AND peserta_kelas_tingkat = '".$peserta_kelas_tingkat."'
			ORDER BY peserta_kelas ASC, peserta_nama ASC ");
	}

	public function total_skor($where)
	{
		return $this->db->select('sum(soal_skor) as total_skor')
		->from('cbt_soal')
		->where($where)
		->get();

	}

}















