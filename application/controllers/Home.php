<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();
		$this->load->model('ten_mod');
	}
	public function index()
	{
		$data = array();
		$data['title'] = "Rekap Keuangan";
		$data['rekap'] = $this->ten_mod->get_detail_rekapall();
		$data['tenant'] = $this->ten_mod->get_tenant();
		$this->load->view('index', $data);
	}
}
