<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam_mod extends CI_Model {

	public function ujian_daftar($where)
	{
		return $this->db->select('*')
		->from('cbt_ujian')
		->join('cbt_mapel','ujian_mapel_id = mapel_id')
		->where($where)
		->get();
	}

	public function ambil_soal_pertama($where) {
		return $this->db->select('*')
		->from('cbt_peserta_jawaban')
		->join('cbt_soal', 'pj_soal_id = soal_id')
		->where($where)
		->order_by('pj_id ASC')
		->limit(1)
		->get();
	}

	public function ambil_soal($where, $order) {
		return $this->db->select('*')
		->from('cbt_peserta_jawaban')
		->join('cbt_soal', 'pj_soal_id = soal_id')
		->where($where)
		->order_by($order)
		->limit(1)
		->get();
	}

	public function review($where){
		return $this->db->select('*')
		->from('cbt_peserta_ujian')
		->join('cbt_ujian', 'pu_ujian_id = ujian_id')
		->join('cbt_mapel', 'ujian_mapel_id = mapel_id')
		->where($where)
		->get();
	}

	public function koreksi($where)
	{
		return $this->db->select('
			sum(IF(soal_kunci = pj_jawaban, soal_skor, 0)) as nilai,
			sum(IF(soal_kunci = pj_jawaban, 1, 0)) as benar,
			sum(IF(soal_kunci != pj_jawaban, 1, 0)) as salah,
			sum(soal_skor) as max_skor'
		)
		->from('cbt_soal')
		->join('cbt_peserta_jawaban', 'soal_id = pj_soal_id')
		->join('cbt_peserta_ujian', 'pj_peserta_id = pu_peserta_id')
		->where($where)
		->group_by('pj_peserta_id')
		->get();
	}

	public function ujian_detail($where)
	{
		return $this->db->select('*')
			->from('cbt_ujian')
			->join('cbt_mapel', 'ujian_mapel_id = mapel_id')
			->where($where)
			->get();
	}

}