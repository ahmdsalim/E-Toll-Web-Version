<?php
class M_petugas extends CI_Model{

	public function getPetugas($username, $password)
	{
		$this->db->where("email = '$username' or username_petugas = '$username'");
		$this->db->where('password', md5($password));
		$query = $this->db->get('tbl_petugas');
		return $query->row_array();
	}

	public function transWhere($id)
	{
		$this->db->where('id_transaksi', $id);
		$query = $this->db->get('tbl_transaksi');
		return $query;
	}

	public function get_by_id($id)
	{
	  $query = $this->db->query("SELECT tbl_card.id_card, tbl_card.saldo, tbl_cabang.kode_penempatan, tbl_cabang.nama FROM tbl_card, tbl_cabang WHERE tbl_card.id_card = '$id' AND tbl_card.asal_tol = tbl_cabang.kode_penempatan;");
	  
	  	return $query->row_array();
	
	}

	public function getCard($id)
	{
	  $query = $this->db->query("SELECT tbl_card.id_card, tbl_card.saldo FROM tbl_card, tbl_cabang WHERE tbl_card.id_card = '$id'");
	  
	  	return $query->row_array();
	
	}

	public function getTrans()
	{
		return $this->db->query("SELECT id_transaksi,id_card,total, CONCAT_WS(' ',tanggal_bayar, waktu) AS tanggal, nama_ruas FROM tbl_transaksi,tbl_ruas_tol WHERE tbl_transaksi.id_ruas = tbl_ruas_tol.id_ruas ORDER BY id_transaksi");
	}

	public function getWhere($kode)
	{
		return $this->db->query("SELECT tbl_petugas.kode_penempatan,tbl_cabang.nama,tbl_cabang.id_tol FROM tbl_petugas INNER JOIN tbl_cabang ON $kode = tbl_cabang.kode_penempatan");
	}

	public function getAsal($kode)
	{
		$this->db->where('kode_penempatan', $kode);
		$query = $this->db->get('tbl_cabang');
		return $query;
	}

	public function getAll($tbl)
	{
		return $this->db->get($tbl);
	}

	public function getId()
	{
		return $this->db->query("SELECT max(id_transaksi)+1 AS id FROM tbl_transaksi");
	}

	public function save($table,$data)
	{
		$this->db->insert($table,$data);
		return TRUE;

	}

	public function updateCard($data,$kode)
	{
		$this->db->where('id_card', $kode);
        $this->db->update('tbl_card', $data);
        return TRUE;
	}
}