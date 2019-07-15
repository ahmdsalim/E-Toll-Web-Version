<?php
class Overview extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_admin");
    }

	function index()
	{
	    	$data["now"] = $this->m_admin->getRuas()->result();
		 	$data["total"] = $this->m_admin->getAll('tbl_transaksi')->num_rows();
		 	$data["total_cards"] = $this->m_admin->getAll('tbl_card')->num_rows();
		 	$data["total_ruas"] = $this->m_admin->getAll('tbl_ruas_tol')->num_rows();
		 	$data["total_petugas"] = $this->m_admin->getAll('tbl_petugas')->num_rows();
		 	$data["jumlahtrans"] = $this->m_admin->getTotal()->row();
		 	$data["rata_tarif"] = $this->m_admin->getAvg()->row();
			$this->load->view('tambah_cabang',$data);
	}

}