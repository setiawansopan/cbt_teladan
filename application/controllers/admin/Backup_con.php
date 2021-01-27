<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup_con extends CI_Controller {
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

	public function backup()
	{
		//judul halaman
		$data['judul'] = "Backup database";
		$data['sub_judul'] = "Halaman backup database sistem CBT Teladan";

		//navbar
		$data['navbar'] = array('backup', 'restore');
		$data['nav_active'] = "backup";

		//sidebar
		$data['sid_active'] = "backup";

		//halaman yg diambil
		$data['page']  = "backup";

		//load model

		//load view
		$this->load->view('admin/index', $data);
	}

	public function restore()
	{
		//judul halaman
		$data['judul'] = "Restore database";
		$data['sub_judul'] = "Selamat datang di halaman restore database sistem CBT Teladan";

		//navbar
		$data['navbar'] = array('backup', 'restore');
		$data['nav_active'] = "restore";

		//sidebar
		$data['sid_active'] = "backup";

		//halaman yg diambil
		$data['page']  = "restore";

		//load model

		//load view
		$this->load->view('admin/index', $data);
	}

	public function backup_do()
	{
		$this->load->dbutil();
		$this->load->helper('file');
		
		$config = array(
			'format'	=> 'zip',
			'filename'	=> 'database_cbt_'.date('dmYHis').'.sql'
		);
		
		$backup =& $this->dbutil->backup($config);
		$save = FCPATH.'backup_db/backup-'.date("dmYHis").'.zip';
		
		write_file($save, $backup);
		$this->load->helper('download');
		force_download($db_name, $backup);
	}
}
