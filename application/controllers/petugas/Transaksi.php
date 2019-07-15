<?php
class Transaksi extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_petugas');
	}

	function index()
	{
		$session = $this->session->userdata('session');
        if (!empty($session)) {
        	$this->session->set_flashdata('nav', 'transaksi');
			$this->load->view('petugas/index.php');
		}else {
            redirect(base_url('index.php/loginpetugas/'));
        }
	}

	function gerbang_masuk()
	{
		$session = $this->session->userdata('session');
        if (!empty($session)) {
        	$this->session->set_flashdata('nav', 'masuk');
			$this->load->view('petugas/gerbang_masuk.php');
		}else {
            redirect(base_url('index.php/loginpetugas/'));
        }
	}

	function updatecard()
	{
		$asal = $this->session->userdata('kode_penempatan');
		$id = $this->input->post('id_card');
			$data = array(
		            'asal_tol' => $asal
		            );
		$this->m_petugas->updateCard($data,$id);
		redirect(base_url('index.php/petugas/transaksi/gerbang_masuk'));
	}

	public function getcard($id)
	{

		$card = $this->m_petugas->get_by_id($id);
		$query = $this->m_petugas->getAll('tbl_tarif')->result_array();
		$masuk = $card['nama'];
		$keluar = $this->session->userdata('nama_tol');

		foreach ($query as $row) {
			if($masuk == $row['masuk'] && $keluar == $row['keluar']){
				$tarif = $row['tarif'];
			}
		}

		if (!empty($card)) {

			if(!empty($tarif)){
				echo '
	            <input id="saldo" class="form-control bg-white" value="'.number_format( $card['saldo'], 0 ,
	                             '' , '.' ).'" type="hidden" readonly>
                  <div class="form-group">
                    <label>Asal Tol</label>
                    <input id="asal" name="asal_tol" value="'.$card['nama'].'" class="form-control bg-white" type="text" readonly>
                  </div>
                  <!-- Date dd/mm/yyyy -->
                  <div class="form-group">
                    <label>Tarif</label>
                    <input id="tarif" name="tarif" class="form-control" type="text" value="'.number_format($tarif,0,'','.').'" readonly style="border: none; background: #3085d6; color: #fff;">
                  </div>';
	        }else{
	        	echo '
	               <input id="saldo" class="form-control bg-white" type="hidden" readonly>
	               <input type="hidden" id="note" value="ERROR">
	               <div class="form-group">
                    <label>Asal Tol</label>
                    <input id="asal" name="asal_tol" class="form-control bg-white" type="text" readonly>
                  </div>
                  <div class="form-group">
                    <label>Tarif</label>
                    <input id="tarif" name="tarif" class="form-control text-white" type="text" readonly style="border: none; background: #3085d6;">
                  </div>
	            	';
	        }	
				    
	    }else{

	    	echo '<input id="saldo" class="form-control bg-white" type="hidden" readonly>
            	<div class="form-group">
                    <label>Asal Tol</label>
                    <input id="asal" name="asal_tol" class="form-control bg-white" type="text" readonly>
                  </div>
                  <div class="form-group">
                    <label>Tarif</label>
                    <input id="tarif" name="tarif" class="form-control text-white" type="text" readonly style="border: none; background: #3085d6;">
                  </div>';
	    }

	}

	public function getcardmsk($id)
	{

		$card = $this->m_petugas->getCard($id);

		if (!empty($card)) {

				echo '
                  <div class="form-group">
                    <label>Saldo</label>
                    <input id="saldo" class="form-control" type="text" value="'.number_format( $card['saldo'], 0 ,
	                             '' , '.' ).'" readonly>
                  </div>';	
				    
	    }else{

	    	echo '<div class="form-group">
                    <label>Saldo</label>
                    <input id="saldo" class="form-control" type="text" readonly>
                  </div>';
	    }

	}

	function insert()
	{
		date_default_timezone_set("Asia/Jakarta");
		$id = $this->m_petugas->getId()->row();
		$id2 = $id->id;
		$kartu = $this->input->post('id_card');
		$tgl = date('d-m-Y');
		$time = date('H:i:s');
		$ruas = $this->session->userdata('id_ruas');
		$total = $this->input->post('tarif');
		$clean = str_replace(".","",$total);
		if (empty($kartu)) {
			redirect(base_url('index.php/petugas'));
		}else{

		$data = array(
            'id_transaksi' => $id2,
            'id_card' => $kartu,
            'tanggal_bayar' => $tgl,
            'waktu' => $time,
            'total' => $clean,
            'id_ruas' => $ruas
            );

		$cek = $this->m_petugas->save('tbl_transaksi',$data);
            if($cek == TRUE)
            {
				$saldo = $this->input->post('sisa');
				$clean2 = str_replace(".","",$saldo);
				$data = array(
				            'saldo' => $clean2,
				            'asal_tol' => NULL
				            );
				$cek2 = $this->m_petugas->updateCard($data,$kartu);
				$this->session->set_flashdata('success', 'Pembayaran <b>Berhasil</b>');
				if($cek2 == TRUE){
					$data["dt"] = $this->m_petugas->transWhere($id2)->row_array();
					$data["saldo"] = $clean2; 
			        $this->load->library('pdf');

			        $this->pdf->setPaper('A7', 'landscape');
			        $this->pdf->filename = "struk.pdf";
			        $this->pdf->load_view('petugas/struk/cetak-struk',$data);
				}
            }else{
               $this->session->set_flashdata('gagal', 'Pembayaran <b>Gagal</b>');
                redirect(base_url('index.php/petugas')); 
            }
        }

	}

	function logout()
	{
		$this->session->sess_destroy();

		redirect(base_url('index.php/login/'));
	}

}