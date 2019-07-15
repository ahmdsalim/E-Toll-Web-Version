<style type="text/css">
	th{
        background-color: #ddd;
    }
</style>
    <img align="left" src="c:/image/JasaMarga.png" width="85px" height="85px" style="margin-right: 0">
    <img align="right" src="c:/image/bpjt.jpg" width="85px" height="85px" style="margin-right: 0">
    <p align="center" style="font-family: sans-serif; margin-left: 0px;"><b><font size="25px">PT JASA MARGA INDONESIA</font></b><br>
        <font style="font-weight: 700;">KANTOR PUSAT JAKARTA</font><br>

        <font size="12px">JL. Keramat, Pusat Niaga Roxy Blok B. l No. 1-2 Jakarta 10150<br>
        Telp : (021) 6385 5122, 6385 5120, 632 6218, 634 8606<br></font>
    <hr style="border: 1px solid;" /></p>
    <br>
    <p style="font-family: sans-serif; background-color: #ddd; padding: 5px 5px 5px 5px;"><b>DATA PETUGAS</b></p>
    <table border="0" cellpadding="0" width="100%" style="font-family: sans-serif;color: #232323;border-collapse: collapse;">
    	<thead>
    		<tr align="center">
    			<th>ID</th>
		    	<th>Nama</th>
		    	<th>Lahir</th>
		    	<th>Jenis Kelamin</th>
		    	<th>E-mail</th>
		    	<th>Alamat</th>
		    	<th>Telp</th>
    		</tr>
    	</thead>
    	<tbody>
    		<?php
    			foreach ($dt as $data) {
    		?>
    		<tr>
    			<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px;"><?php echo $data->id_petugas ?></td>
    			<td width="120" style="padding-top: 2px; padding-bottom: 2px;"><?php echo $data->nama_petugas ?></td>
    			<td style="padding-top: 2px; padding-bottom: 2px;"><?php echo $data->tgl_lahir ?></td>
    			<td style="padding-top: 2px; padding-bottom: 2px;"><?php echo $data->jenis_kelamin ?></td>
    			<td style="padding-top: 2px; padding-bottom: 2px;"><?php echo $data->email ?></td>
    			<td style="padding-top: 2px; padding-bottom: 2px;"><?php echo $data->alamat ?></td>
    			<td width="80" style="padding-right: 5px; padding-top: 2px; padding-bottom: 2px;"><?php echo $data->no_telp ?></td>
    		</tr>
    		<?php } ?>
            <tr>
                <td align="center" colspan="6" style="background-color: #ddd; padding: 5px 5px 5px 5px;"><b>Total</b></td>
                <td align="center" style="background-color: #ddd">50</td>
            </tr>
    	</tbody>

    </table>
    <div style="float: right; margin-right: 30px;">
        <p style="margin-bottom: 50px;">Penanggung jawab,</p>
        <p><?php echo $this->session->userdata('nama'); ?></p>
    </div>