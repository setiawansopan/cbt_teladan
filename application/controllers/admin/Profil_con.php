<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_con extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('main_mod');

		//usir jika tidak login
		if($this->session->login_admin != TRUE) {
			redirect(base_url('index.php/admin/login_con'));
		}
	}

	public function profil()
	{
		//judul halaman
		$data['judul'] = "Profil Administrator";
		$data['sub_judul'] = "Halaman data profil administrator CBT Teladan";

		//navbar
		$data['navbar'] = array('profil');
		$data['nav_active'] = "profil";

		//sidebar
		$data['sid_active'] = "profil";

		//halaman yg diambil
		$data['page']  = "profil";

		//array data
		$where = array('admin_user' => $this->session->admin_user);

		//load model
		$data['admin'] = $this->main_mod->get_where('cbt_admin', $where)->row();

		//load view
		$this->load->view('admin/index', $data);
	}

	public function profil_update() 
	{
		$admin_password = $this->input->post('admin_password');
		$admin_repassword = $this->input->post('admin_repassword');

		if($admin_password != $admin_repassword)
		{
			$this->session->set_flashdata('error','Password tidak sama!');
			redirect(base_url('index.php/admin/profil_con/profil'));
		}
		else if(strlen($admin_password) < 8 || strlen($admin_password) > 15)
		{
			$this->session->set_flashdata('error','Password minimal 8 karakter dan maksimal 15 karakter!');
			redirect(base_url('index.php/admin/profil_con/profil'));
		}
		else if(!preg_match("/^[a-zA-Z0-9]*$/", $admin_password))
		{
			$this->session->set_flashdata('error','Password tidak boleh menggunakan spasi!');
			redirect(base_url('index.php/admin/profil_con/profil'));
		}

		else 
		{
			//where
			$where = array('admin_user' => $this->session->admin_user);
			//data array 
			$data = array(
				'admin_nama' => $this->input->post('admin_nama'),
				'admin_pass' => md5($admin_password)
			);
			//update
			$this->main_mod->update('cbt_admin', $where, $data);
			//redirect
			$this->session->set_flashdata('success','Password berhasil diupdate!');
			redirect(base_url('index.php/admin/profil_con/profil'));
		}
	}

	public function profil_foto()
	{
		$admin_user = $this->session->admin_user;

		$config['file_name']			= $admin_user;
		$config['upload_path']          = './images/admin/';
        $config['allowed_types']        = 'jpg';
        $config['max_size']             = 3000;
        $config['max_width']            = 5366;
        $config['max_height']           = 5000;
        $config['overwrite']			= TRUE;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
                $this->session->set_flashdata('error_foto', $this->upload->display_errors());
                redirect(base_url('index.php/admin/profil_con/profil'));
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $this->session->set_flashdata('success_foto', 'Upload Foto berhasil!');
                redirect(base_url('index.php/admin/profil_con/profil'));
        }
	}
}