<?php
class Ruas extends CI_Controller{

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
		$data["dt_ruas"] = $this->m_admin->getRuas()->result_array();
		$this->session->set_flashdata('nav', 'ruas');
		$this->load->view('admin/data/ruas', $data);
        }else {
            redirect(base_url('index.php/login/'));
        }
	}

    function add()
    {
        $this->form_validation->set_rules('ruas','Nama Ruas Tol', 'required');

        if ($this->form_validation->run()) {
           $id = $this->m_admin->getId('id_ruas','tbl_ruas_tol')->row_array();
            $this->m_admin->insertRuas($id['id']);
            redirect("admin/ruas"); 
        }
        $data["ruas"] = $this->m_admin->getRuas()->result();

        $this->load->view('admin/add-data/tambah_ruas',$data);
    }

    function ubah($id){

        $this->form_validation->set_rules('ruas','Nama Ruas Tol', 'required');

        if ($this->form_validation->run()) {
            $this->m_admin->updateRuas($id);
            redirect("admin/ruas");
        }

        $data["dt"] = $this->m_admin->getRuasBy($id)->row();  
        $this->load->view('admin/ubah-data/ubah_ruas',$data);
        
    }

    public function delete($id)
    {
        if (!isset($id)) show_404();
        
        if ($this->m_admin->deleteRuas($id)) {
            redirect(site_url('admin/ruas'));
        }
    }

    public function laporan_semua(){

            $data['dt'] = $this->m_admin->getAll('tbl_ruas_tol')->result();
            $data['total'] = $this->m_admin->getAll('tbl_cabang')->num_rows();
            $data['model'] = $this->m_admin;
            $this->load->library('pdf');

            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "laporan_ruas_tol.pdf";
            $this->pdf->load_view('admin/laporan/laporan_ruas_tol', $data);
    }

}