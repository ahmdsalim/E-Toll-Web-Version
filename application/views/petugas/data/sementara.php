<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('_partials2/head') ?>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <?php $this->load->view('_partials2/header') ?>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Gerbang Keluar Tol <?php echo $this->session->userdata('nama_tol'); ?>
        </h1>
        <?php $this->load->view('_partials/breadcrumb') ?>
      </section>

      <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header bg-blue">
              <h3 class="box-title">Data Transaksi e-Toll <small style="color: white;">s/d</small> <?php date_default_timezone_set('Asia/Jakarta'); echo date('d F Y'); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatable" class="table table-hover">
                <thead>
                <tr align="center">
                  <th class="btn-warning text-white">ID</th>
                  <th class="btn-success text-white">Card Number</th>
                  <th class="btn-success text-white">Tanggal</th>
                  <th class="btn-success text-white">Total</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($transaksi as $data) { ?>
                <tr>
                  <td><?php echo $data->id_transaksi ?></td>
                  <td><?php echo $data->id_card ?></td>
                  <td><?php echo $data->tanggal ?></td>
                  <td>Rp. <?php echo number_format($data->total, 0 ,'' , '.') ?></td>
                </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('_partials2/footer') ?>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<?php $this->load->view('_partials2/js') ?>
</body>
</html>
