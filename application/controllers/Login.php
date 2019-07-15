<?php
class Login extends CI_Controller{
	public function __construct()
    {
        parent::__construct();
        $this->load->model("m_petugas");
        $this->load->model("m_admin");
    }

	function index()
	{
		$session = $this->session->userdata('session');
    	if (!empty($session)) {
			redirect(base_url('index.php/admin/'));
		}else {
    		$this->load->view('login');
    	}
	}

	function auth()
	{
		$username = addslashes($this->input->post('username'));
		$password = addslashes($this->input->post('password'));
		$check2 = $this->m_admin->getAdmin($username,$password);
		  if(!empty($check2)) {

			$this->session->set_userdata('id',$check2['id_admin']);
			$this->session->set_userdata('username',$check2['username_admin']);
			$this->session->set_userdata('nama',$check2['nama_admin']);
			$this->session->set_userdata('email',$check2['email']);
			$this->session->set_userdata('alamat',$check2['alamat']);
			$this->session->set_userdata('no_telp',$check2['no_telp']);
			$this->session->set_userdata('tgl_lahir',$check2['tgl_lahir']);
			$this->session->set_userdata('jenis_kelamin',$check2['jenis_kelamin']);
			$this->session->set_userdata('status',$check2['status']);
			$this->session->set_userdata('session','login');
			redirect(base_url('index.php/admin'));
		} else {
			$this->session->set_flashdata('gagal','Username atau Password Salah!');
			redirect(base_url('index.php/login/'));
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('index.php/login/'));
	}

}