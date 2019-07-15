<?php
class Tarif extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_admin");
        $this->load->library("form_validation");
    }

    function index()
    {
        $data['dt_tarif']=$this->m_admin->getTarif()->result();
        $this->session->set_flashdata('nav', 'tarif');
        $this->load->view('admin/data/tarif',$data);
    }

    function add()
	{
        $this->form_validation->set_rules('id_ruas','Ruas Tol', 'required');
        $this->form_validation->set_rules('masuk','Gerbang Masuk', 'required');
        $this->form_validation->set_rules('keluar','Gerbang keluar', 'required');
        $this->form_validation->set_rules('tarif','Tarif', 'required');

        if ($this->form_validation->run()) {
           $id = $this->m_admin->getId('id_tarif','tbl_tarif')->row_array();
            $this->m_admin->insertTarif($id['id']);
            redirect("admin/tarif"); 
        }
        $data['ruas_tol']=$this->m_admin->ruas();

        $this->load->view('admin/add-data/tambah_tarif',$data);
	}

    function ubah($id){

        $this->form_validation->set_rules('id_ruas','Ruas Tol', 'required');
        $this->form_validation->set_rules('masuk','Gerbang Masuk', 'required');
        $this->form_validation->set_rules('keluar','Gerbang keluar', 'required');
        $this->form_validation->set_rules('tarif','Tarif', 'required');

        if ($this->form_validation->run()) {
            $this->m_admin->updateTarif($id);
            redirect("admin/tarif");
        }
        $data['model']=$this->m_admin;
        $data['ruas_tol']=$this->m_admin->ruas();
        $data["dt"] = $this->m_admin->getTarifBy($id)->row();  
        $this->load->view('admin/ubah-data/ubah_tarif',$data);
        
    }

    function ambil_data()
    {
        $modul=$this->input->post('modul');
        $id=$this->input->post('id');

        if($modul=="masuk"){
            echo $this->m_admin->masuk($id);
        }else if($modul=="kosong"){
            echo "<option value='0'>--Pilih--</pilih>";
        }
    }

    public function delete($id)
    {
        if (!isset($id)) show_404();
        
        if ($this->m_admin->deleteTarif($id)) {
            redirect(site_url('admin/tarif'));
        }
    }

    public function laporan_semua(){

            $data['dt']=$this->m_admin->getPureRuas()->result();
            $data['model']=$this->m_admin;
            $this->load->library('pdf');

            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "laporan_data_tol.pdf";
            $this->pdf->load_view('admin/laporan/laporan_tarif', $data);
    }

}