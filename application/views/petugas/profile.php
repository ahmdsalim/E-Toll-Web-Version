<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('_partials/head') ?>
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
          Profile <?php echo $this->session->userdata('nama'); ?>
        </h1>
        <?php $this->load->view('_partials/breadcrumb') ?>
      </section>

      <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Profile</h3>
              <div class="box-tools pull-right">
                <a href="<?php echo base_url('index.php/petugas/') ?>"><i class="fa fa-arrow-left"></i> Back</a>
              </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url('index.php/petugas/profile/ubah_password') ?>" method="POST">
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" onkeypress="return hanyaHuruf(this)" value="<?php echo $this->session->userdata('nama') ?>" placeholder="Masukkan Nama Anda" readonly>
                    <span class="help-block"><?= form_error('nama') ?></span>
                  </div>
                  <!-- Date dd/mm/yyyy -->
                  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control" name="tgl_lahir" readonly value="<?php echo $this->session->userdata('tgl_lahir') ?>" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask>
                    </div>
                    <!-- /.input group -->
                    <span class="help-block"><?= form_error('tgl_lahir') ?></span>
                  </div>
                  <!-- /.form group -->
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <input type="text" class="form-control" name="nama" onkeypress="return hanyaHuruf(this)" value="<?php echo $this->session->userdata('jenis_kelamin') ?>" readonly>
                    <span class="help-block"><?= form_error('nama') ?></span>
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $this->session->userdata('username') ?>" placeholder="Username" readonly>
                    <span class="help-block"><?= form_error('username') ?></span>
                  </div>
                  <div class="form-group">
                    <label>Penempatan</label>
                    <input type="text" class="form-control" name="nama" value="<?php echo $this->session->userdata('nama_tol') ?>" placeholder="Masukkan Nama Anda" readonly>
                    <span class="help-block"><?= form_error('nama') ?></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Alamat Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $this->session->userdata('email') ?>" placeholder="Masukkan Email" readonly>
                    <span class="help-block"><?= form_error('email') ?></span>
                  </div>
                  <!-- textarea -->
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" rows="4" name="alamat" placeholder="Masukkan Alamat" readonly><?php echo $this->session->userdata('alamat') ?></textarea>
                    <span class="help-block"><?= form_error('alamat') ?></span>
                  </div>
                  <!-- phone mask -->
                  <div class="form-group">
                    <label>Nomor Handphone</label>

                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                      </div>
                      <input type="text" class="form-control" name="no_telp" readonly value="<?php echo $this->session->userdata('no_telp') ?>" data-inputmask='"mask": "999999999999"' data-mask>
                    </div>
                    <!-- /.input group -->
                    <span class="help-block"><?= form_error('no_telp') ?></span>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
              </div>
            </form>
          </div>
          <!-- /.box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ubah Password</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url('index.php/petugas/profile/ubah_password') ?>" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Password Baru</label>
                  <input type="password" name="password" class="form-control" placeholder="Password">
                  <span class="help-block"><?= form_error('password') ?></span>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Konfirmasi Password</label>
                  <input type="password" name="konfirmasi" class="form-control" placeholder="Password">
                  <span class="help-block"><?= form_error('konfirmasi') ?></span>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
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
