<style type="text/css">
	th{
        background-color: #ddd;
        padding: 5px 5px 5px 5px;
    }
    p{
        font-family: sans-serif;
    }
</style>
    <img align="left" src="c:/image/JasaMarga.png" width="85px" height="85px" style="margin-right: 0">
    <img align="right" src="c:/image/bpjt.jpg" width="85px" height="85px" style="margin-right: 0">
    <p align="center" style="font-family: sans-serif; margin-left: 0px;"><b><font size="25px">PT JASA MARGA INDONESIA</font></b><br>
        <font style="font-weight: 700;">KANTOR PUSAT JAKARTA</font><br>

        <font size="12px">JL. Keramat, Pusat Niaga Roxy Blok B. l No. 1-2 Jakarta 10150<br>
        Telp : (021) 6385 5122, 6385 5120, 632 6218, 634 8606</font><br>
    <hr style="border: 1px solid;" /></p>
    <br>
    <?php foreach($dt as $data){  ?>
    <h4 style="font-family: sans-serif; background-color: #ddd; padding: 5px 5px 5px 5px;"><b>Ruas Tol <?php echo $data->nama_ruas ?></b></h4>
    <table border="0" cellpadding="0" width="100%" style="font-family: sans-serif;color: #232323;border-collapse: collapse;">
    	<thead>
    		<tr>
    			<th align="center">No</th>
		    	<th>Gerbang Masuk</th>
                <th>Keluar Masuk</th>
                <th>Tarif</th>
    		</tr>
    	</thead>
    	<tbody>
    		<?php
                $no=0;
                $dte=$model->setTarifBy($data->id_ruas)->result();
                $total=$model->setTarifBy($data->id_ruas)->num_rows();
    			foreach ($dte as $dta) {
                $no++;
    		?>
    		<tr>
                <td align="center" style="padding-top: 4px; padding-bottom: 4px;"><?php echo $no ?></td>
    			<td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $dta->masuk ?></td>
                <td style="padding-top: 4px; padding-bottom: 4px;"><?php echo $dta->keluar ?></td>
    			<td style="padding-top: 4px; padding-bottom: 4px;"><?php echo number_format($dta->tarif,0,'','.') ?></td>
    		</tr>
    		<?php } ?>
            <tr>
                <td align="center" style="background-color: #ddd; padding: 5px 5px 5px 5px;"><b>Grand Total</b></td>
                <td align="left" style="background-color: #ddd"><?php echo $total; ?></td>
                <td align="center" style="background-color: #ddd;"></td>
                <td style="background-color: #ddd;"></td>
            </tr>
    	</tbody>

    </table>
<?php } ?>
    <div style="float: right; margin-right: 30px;">
        <p style="margin-bottom: 70px;"><b>Penanggung Jawab,</b></p>
        <p><b><?php echo $this->session->userdata('nama'); ?></b></p>
    </div>