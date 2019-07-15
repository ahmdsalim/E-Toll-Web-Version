<?php
class Kartu extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_admin");
        $this->load->library("form_validation");
    }

    function index()
	{
        $session = $this->session->userdata('session');
        if (!empty($session)) {
		$data["dt_kartu"] = $this->m_admin->getAll('tbl_card')->result();
		$this->session->set_flashdata('nav', 'kartu');
		$this->load->view('admin/data/kartu', $data);
        }else {
            redirect(base_url('index.php/login/'));
        }
	}

    function add(){

        $this->form_validation->set_rules('id_card','Card Number', 'required');
        $this->form_validation->set_rules('saldo','Saldo', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/add-data/tambah_kartu');
        }else{
            $this->m_admin->insertCard();
            redirect("admin/kartu");
        }
        
    }

	public function delete($id)
    {
        if (!isset($id)) show_404();
        
        if ($this->m_admin->deleteCard($id)) {
            redirect(site_url('admin/kartu'));
        }
    }

    public function laporan_pdf(){

        $data['dt'] = $this->m_admin->getAll('tbl_card')->result();
        $data['total'] = $this->m_admin->getAll('tbl_card')->num_rows();
        $data["jumlah"] = $this->m_admin->getTotal()->row();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan_kartu_e-toll.pdf";
        $this->pdf->load_view('admin/laporan/laporan_kartu_tol', $data);
    }

}