<?php
class Transaksi extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_admin");
    }

    function index()
	{
		$session = $this->session->userdata('session');
        if (!empty($session)) {
		$data["dt_transaksi"] = $this->m_admin->getTransaksi()->result();
        $data["dt_ruas"] = $this->m_admin->getAll('tbl_ruas_tol')->result();
		$this->session->set_flashdata('nav', 'transaksi');
		$this->load->view('admin/data/histori', $data);
		}else {
    		redirect(base_url('index.php/login/'));
    	}
	}

	public function delete($id)
    {
        if (!isset($id)) show_404();
        
        if ($this->m_admin->deleteTrans($id)) {
            redirect(site_url('admin/transaksi'));
        }
    }

    public function laporan_pdf($ruas){

            $data['dta'] = $this->m_admin->getTransBy($ruas)->result();
            $data['total'] = $this->m_admin->getTransBy($ruas)->num_rows();
            $data["jumlah"] = $this->m_admin->getTotalBy($ruas)->row();
            $data["ruas"] = $this->m_admin->getnamaRuas($ruas)->row();
            $this->load->library('pdf');

            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "laporan_transaksi_e-toll.pdf";
            $this->pdf->load_view('admin/laporan/laporan_transaksi_by', $data);
    }

    public function laporan_semua(){

            $data['dt'] = $this->m_admin->getTransaksi('tbl_transaksi')->result();
            $data['total'] = $this->m_admin->getAll('tbl_transaksi')->num_rows();
            $data["jumlah"] = $this->m_admin->getTotal()->row();
            $this->load->library('pdf');

            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "laporan_transaksi_e-toll.pdf";
            $this->pdf->load_view('admin/laporan/laporan_transaksi', $data);
    }

}