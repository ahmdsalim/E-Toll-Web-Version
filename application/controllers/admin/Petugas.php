<?php
class Petugas extends CI_Controller{

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
		$data["dt_petugas"] = $this->m_admin->getPetugas()->result();       
		$this->session->set_flashdata('nav', 'petugas');
		$this->load->view('admin/data/petugas', $data);
        }else {
            redirect(base_url('index.php/login/'));
        }
	}

    function add(){
        $admin = $this->m_admin;
        $validation = $this->form_validation;
        $validation->set_rules($admin->rulesPetugas());

        if ($validation->run()) {
           $id = $this->m_admin->getId('id_petugas','tbl_petugas')->row_array();
            $this->m_admin->insertPetugas($id['id']);
            redirect("admin/petugas"); 
        }
        $data["dt_cabang"] = $this->m_admin->getAll('tbl_cabang')->result();  
        $this->load->view('admin/add-data/tambah_petugas', $data);
        
    }

    function ubah($id_petugas){

        $this->form_validation->set_rules('nama','Nama', 'required');
        $this->form_validation->set_rules('tgl_lahir','Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jk','Jenis Kelamin', 'required');
        $this->form_validation->set_rules('username','Username', 'required');
        $this->form_validation->set_rules('password','Password', '');
        $this->form_validation->set_rules('email','Alamat Email', 'required|valid_email');
        $this->form_validation->set_rules('alamat','Alamat', 'required');
        $this->form_validation->set_rules('no_telp','No Handphone', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['cabang'] = $this->m_admin->getAll('tbl_cabang')->result();
            $data["dt_petugas"] = $this->m_admin->getPtgsBy($id_petugas)->row();  
            $this->load->view('admin/ubah-data/ubah_petugas', $data);
        }else{
            $this->m_admin->updatePetugas($id_petugas);
            redirect("admin/petugas");
        }
        
    }

    public function laporan_pdf(){

        $data['dt'] = $this->m_admin->getAll('tbl_petugas')->result();

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan_pdf.pdf";
        $this->pdf->load_view('admin/laporan/laporan_petugas', $data);
    }

	public function delete($id)
    {
        if (!isset($id)) show_404();
        
        if ($this->m_admin->deletePtgs($id)) {
            redirect(site_url('admin/petugas'));
        }
    }

}