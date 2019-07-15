<style type="text/css">
	th{
        background-color: #ddd;
        padding: 5px 5px 5px 5px;
    }
</style>
    <img align="left" src="c:/image/JasaMarga.png" width="110px" height="95px" style="margin-right: 0">
    <img align="right" src="c:/image/bpjt.jpg" width="110px" height="95px" style="margin-right: 0">
    <p align="center" style="font-family: sans-serif; margin-left: 0px;"><b><font size="25px">PT JASA MARGA INDONESIA</font></b><br>
        <font style="font-weight: 700;">KANTOR PUSAT JAKARTA</font><br>

        <font size="12px">JL. Keramat, Pusat Niaga Roxy Blok B. l No. 1-2 Jakarta 10150<br>
        Telp : (021) 6385 5122, 6385 5120, 632 6218, 634 8606</font><br>
    <hr style="border: 1px solid;" /></p>
    <br>
    <h4 style="font-family: sans-serif; background-color: #ddd; padding: 5px 5px 5px 5px;"><b>DATA TRANSAKSI TOL DENGAN KARTU E-TOLL</b></h4>
    <table border="0" cellpadding="0" width="100%" style="font-family: sans-serif;color: #232323;border-collapse: collapse;">
    	<thead>
    		<tr>
    			<th>No</th>
                <th>Ruas Tol</th>
		    	<th>CN Number</th>
                <th>Tanggal</th>
                <th>Total</th>
    		</tr>
    	</thead>
    	<tbody>
    		<?php
    			foreach ($dt as $data) {
    		?>
    		<tr>
    			<td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $data->id_transaksi ?></td>
                <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $data->nama_ruas ?></td>
    			<td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $data->id_card ?></td>
                <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $data->tanggal ?></td>
                <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo number_format($data->total,0,'','.') ?></td>
    		</tr>
    		<?php } ?>
            <tr>
                <td style="background-color: #ddd; padding: 5px 5px 5px 5px;"><b>Grand Total</b></td>
                <td style="background-color: #ddd;"><?php echo $total; ?></td>
                <td style="background-color: #ddd;"></td>
                <td style="background-color: #ddd;"></td>
                <td style="background-color: #ddd;"><?php echo number_format($jumlah->jumlahtransaksi,0,'','.') ?></td>
            </tr>
    	</tbody>

    </table>
    <div style="float: right; margin-right: 30px;">
        <p style="margin-bottom: 50px;">Penanggung jawab,</p>
        <p><?php echo $this->session->userdata('nama'); ?></p>
    </div>