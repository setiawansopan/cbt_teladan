<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_con extends CI_Controller {
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

	public function guru()
	{
		//judul halaman
		$data['judul'] = "Daftar guru";
		$data['sub_judul'] = "Halaman daftar guru sistem CBT Teladan";

		//navbar
		$data['navbar'] = array('guru', 'upload', 'mapel');
		$data['nav_active'] = "guru";

		//sidebar
		$data['sid_active'] = "guru";

		//halaman yg diambil
		$data['page']  = "guru";

		//load data guru
        $order_guru = "guru_nama ASC";
		$data['guru'] = $this->main_mod->select_order('cbt_guru', '*', $order_guru)->result_array();

        //load view
		$this->load->view('admin/index', $data);
	}

	public function upload()
	{
		//judul halaman
		$data['judul'] = "Upload guru";
		$data['sub_judul'] = "Halaman upload guru ujian sistem CBT Teladan";

		//navbar
		$data['navbar'] = array('guru', 'upload', 'mapel');
		$data['nav_active'] = "upload";

		//sidebar
		$data['sid_active'] = "guru";

		//halaman yg diambil
		$data['page']  = "guru_upload";

 		//load view
		$this->load->view('admin/index', $data);
	}

	public function upload_do()
	{
		require_once APPPATH.'third_party/PHPExcel.php';
        $this->load->library('PHPExcel');
        $this->excel = new PHPExcel();

        $fileName = time().$_FILES['guru_file']['name'];  
        $config['upload_path'] = 'fileExcel';                              
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 1000;
        $this->load->library('upload', $config);
    
        if (!$this->upload->do_upload('guru_file'))
        {
            $this->upload->display_errors();
        }
        
        $media = $this->upload->data('guru_file');

        $inputFileName = 'fileExcel/' . $fileName;
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }
 
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        for ($row = 7; $row <= $highestRow; $row++) {                           // Read a row of data into an array
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
            
            //cek nis dulu
            $where = array('guru_nik' => $rowData[0][44]);
            $data['guru'] = $this->main_mod->get_where('cbt_guru', $where)->row();
            $pass = explode('-', $rowData[0][5]);
            $newpass = $pass[2].''.$pass[1].''.$pass[0];

            if(isset($data['guru']) == false) {
                if($rowData[0][44] != null) {
                    //$tgl_lhr = PHPExcel_Style_NumberFormat::toFormattedString($rowData[0][5],'DD-MM-YYYY' );
                    //$tingkat = explode(' ', $rowData[0][42]);
                    $dataGuru = array(
                        'guru_id' => uniqid(),
                        'guru_nip' => $rowData[0][6], 
                        'guru_nik' => $rowData[0][44], 
                        'guru_password' => md5($newpass),
                        'guru_password_status' => 0,
                        'guru_nama' => $rowData[0][1], 
                        'guru_tmp_lahir' => $rowData[0][4],
                        'guru_tgl_lahir' => $rowData[0][5],
                        'guru_hp' => $rowData[0][18],
                    );
                    $this->main_mod->insert('cbt_guru', $dataGuru);

                }
            } else {
                if($rowData[0][44] != null) {
                    $guru_id = $data['guru']->guru_id;
                    // $tgl_lhr = PHPExcel_Style_NumberFormat::toFormattedString($rowData[0][6],'DD-MM-YYYY' );
                    // $tingkat = explode(' ', $rowData[0][42]);
                    $dataGuru = array(
                        'guru_nip' => $rowData[0][6], 
                        'guru_password' => md5($newpass),
                        'guru_password_status' => 0,
                        'guru_nama' => $rowData[0][1], 
                        'guru_tmp_lahir' => $rowData[0][4],
                        'guru_tgl_lahir' => $rowData[0][5],
                        'guru_hp' => $rowData[0][18],
                    );

                    $where = array(
                    	'guru_nik' => $rowData[0][44]
                    );
                    $this->main_mod->update('cbt_guru' , $where , $dataGuru);
                }
            }

        }

        $pathinfo = pathinfo($inputFileName);
        $dirname  = $pathinfo['dirname'];
        $filename = $pathinfo['filename'];
    
        $files = glob($dirname.'/'.$filename.'*');
        array_walk($files, function ($files) {
            if (file_exists($files)) {
                unlink($files);
            }
        });
        $this->session->set_flashdata('simpan','true');
        redirect(base_url('index.php/admin/guru_con/guru'));
	}

    public function guru_reset()
    {
        $where = array('guru_id' => $this->input->get('guru_id'));
        $pass = explode('-', $this->main_mod->get_where('cbt_guru', $where)->row()->guru_tgl_lahir);
        $newpass = $pass[2].''.$pass[1].''.$pass[0];

        $data  = array(
            'guru_password' => md5($newpass),
            'guru_password_status' => 0,
        );
        $this->main_mod->update('cbt_guru', $where, $data);
        redirect(base_url('index.php/admin/guru_con/guru'));
    }

    public function mapel()
    {
        //judul halaman
        $data['judul'] = "Daftar Mata Pelajaran Guru";
        $data['sub_judul'] = "Halaman daftar mata pelajaran guru sistem CBT Teladan";

        //navbar
        $data['navbar'] = array('guru', 'upload', 'mapel');
        $data['nav_active'] = "mapel";

        //sidebar
        $data['sid_active'] = "guru";

        //halaman yg diambil
        $data['page']  = "guru_mapel";

        //load data guru
        $order_guru = "guru_nama ASC";
        $data['guru'] = $this->main_mod->select_order('cbt_guru', '*', $order_guru)->result_array();

        //load data mapel
        $order_mapel = "mapel_urut, mapel_nama";
        $data['mapel'] = $this->main_mod->select_order('cbt_mapel', '*', $order_mapel)->result_array();

        //load data guru mapel
        $data['guru_mapel'] = $this->admin_mod->guru_mapel()->result_array();

        //load view
        $this->load->view('admin/index', $data);
    }

    public function guru_mapel_add()
    {
        $data = array(  'gm_id' => uniqid(),
                        'gm_guru_id' => $this->input->post('guru_id'),
                        'gm_mapel_id' => $this->input->post('mapel_id')
                        );
        $this->main_mod->insert('cbt_guru_mapel', $data);
        $this->session->set_flashdata('simpan','true');
        redirect(base_url('index.php/admin/guru_con/mapel'));
    }

    public function guru_mapel_del()
    {
        $data = array('gm_id' => $this->input->get('gm_id'));
        $this->main_mod->delete('cbt_guru_mapel', $data);
        $this->session->set_flashdata('hapus','true');
        redirect(base_url('index.php/admin/guru_con/mapel'));
    }

}