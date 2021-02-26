<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta_con extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('main_mod');

        //usir jika tidak login
        if($this->session->login_admin != TRUE) {
            redirect(base_url('index.php/admin/login_con'));
        }
    }

	public function peserta()
	{
		//judul halaman
		$data['judul'] = "Daftar Peserta";
		$data['sub_judul'] = "Halaman daftar peserta sistem CBT Teladan";

		//navbar
		$data['navbar'] = array('peserta', 'upload');
		$data['nav_active'] = "peserta";

		//sidebar
		$data['sid_active'] = "peserta";

		//halaman yg diambil
		$data['page']  = "peserta";

		//load model
        $order = "peserta_kelas ASC, peserta_nama ASC";
		$data['peserta'] = $this->main_mod->select_order('cbt_peserta', '*', $order)->result_array();

		//load view
		$this->load->view('admin/index', $data);
	}

	public function upload()
	{
		//judul halaman
		$data['judul'] = "Upload Peserta";
		$data['sub_judul'] = "Halaman upload peserta ujian sistem CBT Teladan";

		//navbar
		$data['navbar'] = array('peserta', 'upload');
		$data['nav_active'] = "upload";

		//sidebar
		$data['sid_active'] = "peserta";

		//halaman yg diambil
		$data['page']  = "peserta_upload";

 		//load view
		$this->load->view('admin/index', $data);
	}

	public function upload_do()
	{
		require_once APPPATH.'third_party/PHPExcel.php';
        $this->load->library('PHPExcel');
        $this->excel = new PHPExcel();

        $fileName = time().$_FILES['peserta_file']['name'];  
        $config['upload_path'] = 'fileExcel';                              
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 1000;
        $this->load->library('upload', $config);
    
        if (!$this->upload->do_upload('peserta_file'))
        {
            $this->upload->display_errors();
        }
        
        $media = $this->upload->data('peserta_file');

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
            $where = array('peserta_nis' => $rowData[0][2]);
            $data['peserta'] = $this->main_mod->get_where('cbt_peserta', $where)->row();
            $pass = explode('-', $rowData[0][6]);
            $newpass = $pass[2].''.$pass[1].''.$pass[0];

            if(isset($data['peserta']) == false) {
                if($rowData[0][2] != null) {
                    $tgl_lhr = PHPExcel_Style_NumberFormat::toFormattedString($rowData[0][6],'DD-MM-YYYY' );
                    $tingkat = explode(' ', $rowData[0][42]);
                    $dataSiswa = array(
                        'peserta_id' => uniqid(),
                        'peserta_nis' => $rowData[0][2], 
                        'peserta_password' => md5($newpass),
                        'peserta_password_status' => 0,
                        'peserta_nama' => $rowData[0][1], 
                        'peserta_kelamin' => $rowData[0][3],
                        'peserta_tmp_lahir' => $rowData[0][5],
                        'peserta_tgl_lahir' => date('Y-m-d', strtotime($tgl_lhr)), 
                        'peserta_kelas' => $rowData[0][42],
                        'peserta_kelas_tingkat' => $tingkat[0],
                        'peserta_jurusan' => $tingkat[1],
                    );
                    $this->main_mod->insert('cbt_peserta', $dataSiswa);

                }
            } else {
                if($rowData[0][2] != null) {
                    $peserta_id = $data['peserta']->peserta_id;
                    $tgl_lhr = PHPExcel_Style_NumberFormat::toFormattedString($rowData[0][6],'DD-MM-YYYY' );
                    $tingkat = explode(' ', $rowData[0][42]);
                    $dataSiswa = array(
                        'peserta_nama' => $rowData[0][1], 
                        'peserta_kelamin' => $rowData[0][3],
                        'peserta_tmp_lahir' => $rowData[0][5],
                        'peserta_tgl_lahir' => date('Y-m-d', strtotime($tgl_lhr)), 
                        'peserta_kelas' => $rowData[0][42],
                        'peserta_kelas_tingkat' => $tingkat[0],
                        'peserta_jurusan' => $tingkat[1],
                    );

                    $where = array(
                    	'peserta_nis' => $rowData[0][2]
                    );
                    $this->main_mod->update('cbt_peserta' , $where , $dataSiswa);
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
        redirect(base_url('index.php/admin/peserta_con/peserta'));
	}

    public function peserta_reset()
    {
        $where = array('peserta_id' => $this->input->get('peserta_id'));
        $pass = explode('-', $this->main_mod->get_where('cbt_peserta', $where)->row()->peserta_tgl_lahir);
        $newpass = $pass[2].''.$pass[1].''.$pass[0];

        $data  = array(
            'peserta_password' => md5($newpass),
            'peserta_password_status' => 0,
        );
        $this->main_mod->update('cbt_peserta', $where, $data);
        $this->session->set_flashdata('reset','true');
        redirect(base_url('index.php/admin/peserta_con/peserta'));
    }

}
