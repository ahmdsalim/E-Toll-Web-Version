<?php
class Loginpetugas extends CI_Controller{
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
			redirect(base_url('index.php/petugas/'));
		}else {
    		$this->load->view('login_petugas');
    	}
	}

	function auth()
	{
		$username = addslashes($this->input->post('username'));
		$password = addslashes($this->input->post('password'));
		$check = $this->m_petugas->getPetugas($username,$password);

		if(!empty($check))
		{
			$this->session->set_userdata('id',$check['id_petugas']);
			$this->session->set_userdata('username',$check['username_petugas']);
			$this->session->set_userdata('nama',$check['nama_petugas']);
			$this->session->set_userdata('email',$check['email']);
			$this->session->set_userdata('alamat',$check['alamat']);
			$this->session->set_userdata('no_telp',$check['no_telp']);
			$this->session->set_userdata('jenis_kelamin',$check['jenis_kelamin']);
			$this->session->set_userdata('tgl_lahir',$check['tgl_lahir']);
			$this->session->set_userdata('status',$check['status']);
			$this->session->set_userdata('kode_penempatan',$check['kode_penempatan']);

			$data = $this->m_petugas->getWhere($check['kode_penempatan'])->row_array();
			$this->session->set_userdata('nama_tol',$data['nama']);
			$this->session->set_userdata('id_ruas',$data['id_tol']);
			$this->session->set_userdata('session','login');

			redirect(base_url('index.php/petugas'));

		}  else {
			$this->session->set_flashdata('gagal','Username atau Password Salah!');
			redirect(base_url('index.php/loginpetugas/'));
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('index.php/loginpetugas/'));
	}

}