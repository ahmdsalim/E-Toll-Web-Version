<?php
class Profile extends CI_Controller{

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
	    	$this->load->view('admin/profile');
    	}else {
    		redirect(base_url('index.php/login/'));
    	}
    	
    }

    function ubah_password()
    {
        $this->form_validation->set_rules('password','Password', 'required');
        $this->form_validation->set_rules('konfirmasi','Konfirmasi Password', 'required|matches[password]');
        $id = $this->session->userdata('id');
        if ($this->form_validation->run()) {
            $this->m_admin->updatePass($id);
            redirect("admin/");
        }
 
        $this->load->view('admin/profile');
    }

}