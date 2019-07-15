<?php
class M_admin extends CI_Model
{

	public function getAdmin($username,$password)
	{
		$this->db->where("email = '$username' or username_admin = '$username'");
		$this->db->where('password', md5($password));
		$query = $this->db->get('tbl_admin');
		return $query->row_array();
	}

    public function getPetugas()
    {
        return $this->db->query("SELECT tbl_petugas.*,tbl_cabang.nama FROM tbl_petugas,tbl_cabang WHERE tbl_petugas.kode_penempatan = tbl_cabang.kode_penempatan");
    }

	public function rulesPetugas()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'tgl_lahir',
            'label' => 'Tanggal Lahir',
            'rules' => 'required'],
            
            ['field' => 'jk',
            'label' => 'Jenis Kelamin',
            'rules' => 'required'],

            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required'],

            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required'],

            ['field' => 'konfirmasi',
            'label' => 'Ulangi Password',
            'rules' => 'required|matches[password]'],

            ['field' => 'email',
            'label' => 'Alamat Email',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'],

            ['field' => 'no_telp',
            'label' => 'No Handphone',
            'rules' => 'required'],

            ['field' => 'kode_penempatan',
            'label' => 'Penempatan',
            'rules' => 'required'],
        ];
    }

	public function getRuas()
	{
		return $this->db->query("SELECT tbl_ruas_tol.*, tbl_cabang.* FROM tbl_ruas_tol,tbl_cabang WHERE tbl_cabang.id_tol = tbl_ruas_tol.id_ruas");
	}

    public function getPureRuas()
    {
        return $this->db->query("SELECT * FROM tbl_ruas_tol");
    }

    public function getCount($ruas)
    {
        return $this->db->query("SELECT COUNT(nama) AS jumlahnya FROM tbl_cabang WHERE id_tol = '$ruas'");
    }

    public function getnamaRuas($ruas)
    {
        return $this->db->query("SELECT nama_ruas FROM tbl_ruas_tol WHERE id_ruas = '$ruas'");
    }

	public function getPtgsBy($id)
	{
		return $this->db->query("SELECT * FROM tbl_petugas WHERE id_petugas = '$id'");
	}

	public function getTarifBy($id)
	{
		return $this->db->query("SELECT * FROM tbl_tarif WHERE id_tarif = '$id'");
	}

	public function getRuasBy($id)
	{
		return $this->db->query("SELECT * FROM tbl_ruas_tol WHERE id_ruas = '$id'");
	}

	public function getCardBy($id)
	{
		return $this->db->query("SELECT * FROM tbl_card WHERE id_card = '$id'");
	}

	public function getCabangBy($id)
	{
		return $this->db->query("SELECT * FROM tbl_cabang WHERE id_tol = '$id'");
	}

    public function getTolBy($id)
    {
        return $this->db->query("SELECT * FROM tbl_cabang WHERE kode_penempatan = '$id'");
    }

	public function ruas()
	{
		$this->db->order_by('nama_ruas','ASC');
		$ruas = $this->db->get('tbl_ruas_tol');
		return $ruas->result_array();
	}

	public function insertTarif($id)
	{
		$tarif = $this->input->post("tarif");
		$clean = str_replace(".","",$tarif);
		$data = [
                'id_tarif' => $id,
                'id_ruas' => $this->input->post("id_ruas", true),
                'masuk' => $this->input->post("masuk", true),
                'keluar' => $this->input->post("keluar", true),
                'tarif' => $clean
            ];

        $this->db->insert('tbl_tarif', $data);
	}

	public function insertRuas($id)
	{
		if(!empty($id)){
			$data = [
                'id_ruas' => $id,
                'nama_ruas' => $this->input->post("ruas", true)
            ];

        	$this->db->insert('tbl_ruas_tol', $data);	
		}else{
			$data = [
                'id_ruas' => '100',
                'nama_ruas' => $this->input->post("ruas", true)
            ];

        	$this->db->insert('tbl_ruas_tol', $data);
		}
		
	}

    public function insertTol($id)
    {
        if(!empty($id)){
            $data = [
                'kode_penempatan' => $id,
                'id_tol' => $this->input->post("ruas", true),
                'nama' => $this->input->post("nama_tol", true)
            ];

            $this->db->insert('tbl_cabang', $data);   
        }else{
            $data = [
                'kode_penempatan' => '1000',
                'id_tol' => $this->input->post("ruas", true),
                'nama' => $this->input->post("nama_tol", true)
            ];

            $this->db->insert('tbl_cabang', $data);
        }
        
    }

	public function masuk($ruasid)
	{
		$masuk="<option value=''>--Pilih--</pilih>";

		$this->db->order_by('nama','ASC');
		$msk=$this->db->get_where('tbl_cabang',array('id_tol'=>$ruasid));

		foreach ($msk->result_array() as $data) {
			$masuk.="<option value='$data[nama]'>$data[nama]</option>";
		}
		return $masuk;
	}


	public function getTarif()
	{
		return $this->db->query("SELECT * FROM tbl_tarif,tbl_ruas_tol WHERE tbl_tarif.id_ruas = tbl_ruas_tol.id_ruas");
	}

    public function setTarifBy($id)
    {
        return $this->db->query("SELECT * FROM tbl_tarif,tbl_ruas_tol WHERE tbl_tarif.id_ruas = '$id'");
    }

	public function getDataNow()
	{
		return $this->db->query("SELECT id_transaksi,id_card,total, CONCAT_WS(' ',tanggal_bayar, waktu) AS tanggal FROM tbl_transaksi WHERE tanggal_bayar = DATE(NOW()) ORDER BY id_transaksi");
	}

	public function getId($kolom,$tbl)
	{
		return $this->db->query("SELECT max($kolom)+1 AS id FROM $tbl");
	}

	public function getTransaksi()
	{
		return $this->db->query("SELECT id_transaksi,id_card,total, CONCAT_WS(' ',tanggal_bayar, waktu) AS tanggal, nama_ruas FROM tbl_transaksi,tbl_ruas_tol WHERE tbl_transaksi.id_ruas = tbl_ruas_tol.id_ruas ORDER BY id_transaksi");
	}

    public function getTransBy($ruas)
    {
        return $this->db->query("SELECT id_transaksi,id_card,total, CONCAT_WS(' ',tanggal_bayar, waktu) AS tanggal FROM tbl_transaksi,tbl_ruas_tol WHERE tbl_transaksi.id_ruas = '$ruas' ORDER BY id_transaksi");
    }

	public function getAvg()
	{
		return $this->db->query("SELECT AVG(tarif) AS tarif FROM tbl_tarif");
	}

    public function sortby($name)
    {
        $this->db->where('jenis_kelamin', $name);
        return $this->db->get('tbl_petugas');
    }

	public function getTotal()
	{
		return $this->db->query("SELECT SUM(total) as jumlahtransaksi FROM tbl_transaksi");
	}

    public function getTotalBy($ruas)
    {
        return $this->db->query("SELECT SUM(total) as jumlahtransaksi FROM tbl_transaksi WHERE id_ruas = '$ruas'");
    }

	public function getAll($table)
	{
		return $this->db->get($table);
	}

	public function insertPetugas($id)
	{
		$data = [
                'id_petugas' => $id,
                'username_petugas' => $this->input->post("username", true),
                'nama_petugas' => $this->input->post("nama", true),
                'tgl_lahir' => $this->input->post("tgl_lahir", true),
                'jenis_kelamin' => $this->input->post("jk", true),
                'email' => $this->input->post("email", true),
                'password' => $this->input->post("konfirmasi", true),
                'alamat' => $this->input->post("alamat", true),
                'no_telp' => $this->input->post("no_telp", true),
                'status' => 'Petugas',
                'kode_penempatan' => $this->input->post("kode_penempatan", true)
            ];

        $this->db->insert('tbl_petugas', $data);
	}

	public function insertCard()
	{
		$saldo = $this->input->post("saldo");
		$clean = str_replace(".","",$saldo);
		$data = [
                'id_card' => $this->input->post("id_card", true),
                'saldo' => $clean
            ];

        $this->db->insert('tbl_card', $data);
	}

	public function save($table,$data)
	{
		return $this->db->insert($table,$data);
	}

	public function update($data,$kode)
    {
    	$this->db->where('id_card', $kode);
        $this->db->update('tbl_card', $data);
        return TRUE;
    }

    public function updateTarif($id)
    {
    	$tarif = $this->input->post("tarif");
		$clean = str_replace(".","",$tarif);
    		$data = [
                'id_ruas' => $this->input->post("id_ruas", true),
                'masuk' => $this->input->post("masuk", true),
                'keluar' => $this->input->post("keluar", true),
                'tarif' => $clean
            ];

        	$this->db->where('id_tarif', $id);
        	$this->db->update('tbl_tarif', $data);
    }

    public function updateRuas($id)
    {
    		$data = [
                'nama_ruas' => $this->input->post("ruas", true)
            ];

        	$this->db->where('id_ruas', $id);
        	$this->db->update('tbl_ruas_tol', $data);
    }

    public function updatePass($id)
    {
            $data = [
                'password' => $this->input->post("konfirmasi", true)
            ];

            $this->db->where('id_admin', $id);
            $this->db->update('tbl_admin', $data);
    }

    public function updatePass2($id)
    {
            $data = [
                'password' => $this->input->post("konfirmasi", true)
            ];

            $this->db->where('id_petugas', $id);
            $this->db->update('tbl_petugas', $data);
    }

    public function updateTol($id)
    {
            $data = [
                'id_tol' => $this->input->post("ruas", true),
                'nama' => $this->input->post("nama_tol", true)
            ];

            $this->db->where('kode_penempatan', $id);
            $this->db->update('tbl_cabang', $data);
    }

    public function updatePetugas($id)
    {
    	$password = $this->input->post('password');
    	if(!empty($password)){
    		$data = [
                'username_petugas' => $this->input->post("username", true),
                'nama_petugas' => $this->input->post("nama", true),
                'tgl_lahir' => $this->input->post("tgl_lahir", true),
                'jenis_kelamin' => $this->input->post("jk", true),
                'email' => $this->input->post("email", true),
                'password' => md5($this->input->post("password", true)),
                'alamat' => $this->input->post("alamat", true),
                'no_telp' => $this->input->post("no_telp", true),
                'status' => 'Petugas',
                'kode_penempatan' => $this->input->post("kode_penempatan", true)
            ];

        	$this->db->where('id_petugas', $id);
        	$this->db->update('tbl_petugas', $data);
    	}else {
    		$data = [
                'username_petugas' => $this->input->post("username", true),
                'nama_petugas' => $this->input->post("nama", true),
                'tgl_lahir' => $this->input->post("tgl_lahir", true),
                'jenis_kelamin' => $this->input->post("jk", true),
                'email' => $this->input->post("email", true),
                'alamat' => $this->input->post("alamat", true),
                'no_telp' => $this->input->post("no_telp", true),
                'status' => 'Petugas',
                'kode_penempatan' => $this->input->post("kode_penempatan", true)
            ];

        	$this->db->where('id_petugas', $id);
        	$this->db->update('tbl_petugas', $data);
    	}
    }

    public function update2($data,$kode)
    {
    	$this->db->where('username_petugas', $kode);
        $this->db->update('tbl_petugas', $data);
        return TRUE;
    }

    public function deleteTrans($id)
    {
        return $this->db->delete("tbl_transaksi", array("id_transaksi" => $id));
    }

	public function deletePtgs($id)
    {
        return $this->db->delete("tbl_petugas", array("id_petugas" => $id));
    }

    public function deleteRuas($id)
    {
        return $this->db->delete("tbl_ruas_tol", array("id_ruas" => $id));
    }

    public function deleteTol($id)
    {
        return $this->db->delete("tbl_cabang", array("kode_penempatan" => $id));
    }

    public function deleteTarif($id)
    {
        return $this->db->delete("tbl_tarif", array("id_tarif" => $id));
    }

    public function deleteCard($id)
    {
        return $this->db->delete("tbl_card", array("id_card" => $id));
    }
}