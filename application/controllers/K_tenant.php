<?php
defined('BASEPATH') or exit('No direct script access allowed');

class K_tenant extends CI_Controller
{

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
		$data['trx'] = $this->ten_mod->get_transaksi();
		$data['tenant'] = $this->ten_mod->get_tenant();
		$this->load->view('page_kelola_tenant', $data);
	}
	
	public function dashboard()
	{
	$data = array();
	$data['title'] = "Rekap Keuangan";
	$data['rekap'] = $this->ten_mod->get_detail_rekapall();
	$data['tenant'] = $this->ten_mod->get_tenant();
	$this->load->view('chart_rekap_tenantpall', $data);
	}	

	public function detail_tenant($name)
	{
		$data = array();
		$data['title'] = "Rekap Keuangan";
		$data['trx'] = $this->ten_mod->get_detil_tenant($name);
		$data['tenant'] = $this->ten_mod->get_tenant();

		$this->load->view('page_detail_tenant', $data);
	}


	public function rekap()
	{
		$this->ten_mod->insert_rekap();
		redirect('K_tenant');
	}


	public function get_all_rekap()
	{
		$data = array();
		$data['title'] = "Rekap Keuangan";
		$data['rekap'] = $this->ten_mod->get_rekap();
		$data['tenant'] = $this->ten_mod->get_tenant();
		$this->load->view('page_kelola_rekap', $data);
	}

	public function get_detail_rekap($name)
	{
		$data = array();
		$data['title'] = "Rekap Keuangan";
		$data['rekap'] = $this->ten_mod->get_detail_rekap($name);
		$data['tenant'] = $this->ten_mod->get_tenant();
		$this->load->view('page_detail_rekap', $data);
	}

	public function chart_detail_rekap($name)
	{
		$data = array();
		$data['title'] = "Rekap Keuangan";
		$data['rekap'] = $this->ten_mod->get_detail_rekap($name);
		$data['tenant'] = $this->ten_mod->get_tenant();
		$this->load->view('chart_rekap_tenant', $data);
		
	}

	public function chart_detail_rekapp($name)
	{
		$data = array();
		$data['title'] = "Rekap Keuangan";
		$data['rekap'] = $this->ten_mod->get_detail_rekap($name);
		$data['tenant'] = $this->ten_mod->get_tenant();
		$this->load->view('chart_rekap_tenantp', $data);
	}

	public function chart_detail_rekapall()
	{
		$data = array();
		$data['title'] = "Rekap Keuangan";
		$data['rekap'] = $this->ten_mod->get_detail_rekapall();
		$data['tenant'] = $this->ten_mod->get_tenant();
		$this->load->view('chart_rekap_tenantpall', $data);
	}

}
