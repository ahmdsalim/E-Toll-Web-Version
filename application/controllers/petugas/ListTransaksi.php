<?php
class ListTransaksi extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_petugas');
	}

	function index()
	{
		$session = $this->session->userdata('session');
        if (!empty($session)) {
			$data["transaksi"] = $this->m_petugas->getTrans()->result();
			$this->session->set_flashdata('nav', 'list');
			$this->load->view('petugas/data/datatransaksi', $data);
		}else {
            redirect(base_url('index.php/login/'));
        }
	}

}