<?php
class Tol extends CI_Controller{

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
		$data["dt_tol"] = $this->m_admin->getAll('tbl_cabang')->result();
		$this->session->set_flashdata('nav', 'tol');
		$this->load->view('admin/data/tol', $data);
        }else {
            redirect(base_url('index.php/login/'));
        }
	}

    function add()
    {
        $this->form_validation->set_rules('ruas','Nama Ruas Tol', 'required');
        $this->form_validation->set_rules('nama_tol','Nama Tol', 'required');

        if ($this->form_validation->run()) {
           $id = $this->m_admin->getId('kode_penempatan','tbl_cabang')->row_array();
            $this->m_admin->insertTol($id['id']);
            redirect("admin/tol"); 
        }
        $data["ruas"] = $this->m_admin->ruas();

        $this->load->view('admin/add-data/tambah_cabang',$data);
    }

    function ubah($id){

        $this->form_validation->set_rules('ruas','Nama Ruas Tol', 'required');
        $this->form_validation->set_rules('nama_tol','Nama Tol', 'required');   

        if ($this->form_validation->run()) {
            $this->m_admin->updateTol($id);
            redirect("admin/tol");
        }

        $data["ruas"] = $this->m_admin->ruas();
        $data["dt"] = $this->m_admin->getTolBy($id)->row();  
        $this->load->view('admin/ubah-data/ubah_tol',$data);
        
    }

    public function delete($id)
    {
        if (!isset($id)) show_404();
        
        if ($this->m_admin->deleteTol($id)) {
            redirect(site_url('admin/tol'));
        }
    }

    public function laporan_semua(){

            $data['dt'] = $this->m_admin->getRuas()->result();
            $data['total'] = $this->m_admin->getAll('tbl_cabang')->num_rows();
            $this->load->library('pdf');

            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "laporan_data_tol.pdf";
            $this->pdf->load_view('admin/laporan/laporan_tol', $data);
    }

}