<style type="text/css">
	.p{
        text-align: justify-all;
        font-size: 10px;
        margin-bottom: 0.5px;
        margin-left: 75px;
    }
</style>
    <img align="center" src="c:/image/logo_struk.jpg" width="120px" height="50px" style="margin-top: 0px; margin-left: 75px;">
    <p align="left" class="p"><?php echo $this->session->userdata('nama_tol'); ?></p>
    <p class="p"><?php echo $dt['tanggal_bayar'] ?>  <?php echo $dt['waktu'] ?>  <?php echo $dt['tanggal_bayar'] ?></p>
    <p class="p">No Seri : <?php echo $dt['id_transaksi'] ?> 004483/000602</p>
    <p class="p">GOL-1 e-Toll Mandiri Rp <?php echo $dt['total'] ?></p>
    <p class="p">CN:<?php echo $dt['id_card'] ?>        Rp. <?php echo $saldo; ?></p>
    <?php 
    if($saldo <= 15000){
    ?>
    <p class="p">HARAP SEGERA ISI ULANG.</p>
    <?php
    }
    ?>
<script type="text/javascript">
    window.print();
</script>