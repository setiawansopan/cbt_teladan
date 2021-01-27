<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_route extends CI_Controller {

	public function index()
	{
		// routing halaman
		redirect(base_url('index.php/exam/login'));
	}
}
