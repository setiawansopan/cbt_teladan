<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('main_mod');

		//usir jika tidak login
		if($this->session->login_guru != TRUE) {
			redirect(base_url('index.php/guru/login'));
		}
	}

	public function profil()
	{
		//judul halaman
		$data['judul'] = "Profil Guru";
		$data['sub_judul'] = "Halaman data profil guru CBT Teladan";

		//navbar
		$data['navbar'] = array('profil');
		$data['nav_active'] = "profil";

		//sidebar
		$data['sid_active'] = "profil";

		//halaman yg diambil
		$data['page']  = "profil_page";

		//array data
		$where = array('guru_id' => $this->session->guru_id);

		//load model
		$data['guru'] = $this->main_mod->get_where('cbt_guru', $where)->row();

		//load view
		$this->load->view('guru/index', $data);
	}

	public function profil_update() 
	{
		$guru_password = $this->input->post('guru_password');
		$guru_repassword = $this->input->post('guru_repassword');

		if($guru_password != $guru_repassword)
		{
			//$this->session->set_flashdata('error','Password tidak sama!');
			$this->session->set_flashdata('err_pass','true');
			redirect(base_url('index.php/guru/profil/profil'));
		}
		else if(strlen($guru_password) < 8 || strlen($guru_password) > 15)
		{
			//$this->session->set_flashdata('error','Password minimal 8 karakter dan maksimal 15 karakter!');
			$this->session->set_flashdata('err_char','true');
			redirect(base_url('index.php/guru/profil/profil'));
		}
		else if(!preg_match("/^[a-zA-Z0-9]*$/", $guru_password))
		{
			//$this->session->set_flashdata('error','Password tidak boleh menggunakan spasi!');
			$this->session->set_flashdata('err_space','true');
			redirect(base_url('index.php/guru/profil/profil'));
		}

		else 
		{
			//where
			$where = array('guru_id' => $this->session->guru_id);
			//data array 
			$data = array(
				'guru_nama' => $this->input->post('guru_nama'),
				'guru_password' => md5($guru_password)
			);
			//update
			$this->main_mod->update('cbt_guru', $where, $data);
			//redirect
			//$this->session->set_flashdata('success','Password berhasil diupdate!');
			$this->session->set_flashdata('simpan','true');
			redirect(base_url('index.php/guru/profil/profil'));
		}
	}

	public function profil_foto()
	{
		$guru_user = $this->session->guru_user;

		$config['file_name']			= $guru_user;
		$config['upload_path']          = './images/guru/';
        $config['allowed_types']        = 'jpg';
        $config['max_size']             = 3000;
        $config['max_width']            = 5366;
        $config['max_height']           = 5000;
        $config['overwrite']			= TRUE;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
                $this->session->set_flashdata('error_foto', $this->upload->display_errors());
				$this->session->set_flashdata('err_foto','true');
                redirect(base_url('index.php/guru/profil/profil'));
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
				$this->session->set_flashdata('foto','true');
                //$this->session->set_flashdata('success_foto', 'Upload Foto berhasil!');
                redirect(base_url('index.php/guru/profil/profil'));
        }
	}
}