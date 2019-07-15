<?php
class Dashboard extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_admin");
    }

    function index()
    {
    	$session = $this->session->userdata('session');
    	if (!empty($session)) {
	    	$data["now"] = $this->m_admin->getDataNow()->result();
		 	$data["total"] = $this->m_admin->getAll('tbl_transaksi')->num_rows();
		 	$data["total_cards"] = $this->m_admin->getAll('tbl_card')->num_rows();
		 	$data["total_petugas"] = $this->m_admin->getAll('tbl_petugas')->num_rows();
		 	$data["jumlahtrans"] = $this->m_admin->getTotal()->row();
		 	$data["rata_tarif"] = $this->m_admin->getAvg()->row();
		 	$data["total_ruas"] = $this->m_admin->getAll('tbl_ruas_tol')->num_rows();
		 	$this->session->set_flashdata('nav', 'dashboard');
		 	$this->load->view('admin/index', $data);
    	}else {
    		redirect(base_url('index.php/login/'));
    	}
    	
    }

	 function logout()
	 {
	 	$this->session->sess_destroy();

		redirect(base_url('index.php/login/'));
	 }

}