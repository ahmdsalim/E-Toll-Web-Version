<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('_partials/head') ?>
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">
  <!-- HEADER -->
  <?php $this->load->view('_partials/header') ?>
  <!-- HEADER CLOSE -->
  <!-- SIDEBAR -->
  <?php $this->load->view('_partials/sidebar') ?>
  <!-- SIDEBAR CLOSE -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Master
        <small>Control</small>
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
              <h3 class="box-title">Tambah Petugas</h3>
              <div class="box-tools pull-right">
                <a href="<?php echo base_url('index.php/admin/petugas') ?>"><i class="fa fa-arrow-left"></i> Back</a>
              </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url('index.php/admin/petugas/add') ?>" method="POST">
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" onkeypress="return hanyaHuruf(this)" placeholder="Masukkan Nama Anda">
                    <span class="help-block"><?= form_error('nama') ?></span>
                  </div>
                  <!-- Date dd/mm/yyyy -->
                  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control" name="tgl_lahir" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask>
                    </div>
                    <!-- /.input group -->
                    <span class="help-block"><?= form_error('tgl_lahir') ?></span>
                  </div>
                  <!-- /.form group -->
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control select2" name="jk" style="width: 100%;">
                      <option value="" selected="selected">Pilih Jenis Kelamin</option>
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                    <span class="help-block"><?= form_error('jk') ?></span>
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username">
                    <span class="help-block"><?= form_error('username') ?></span>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <span class="help-block"><?= form_error('password') ?></span>
                  </div>
                  <div class="form-group">
                    <label>Ulangi Password</label>
                    <input type="password" class="form-control" name="konfirmasi" placeholder="Konfirmasi Password">
                    <span class="help-block"><?= form_error('konfirmasi') ?></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Alamat Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Masukkan Email">
                    <span class="help-block"><?= form_error('email') ?></span>
                  </div>
                  <!-- textarea -->
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" rows="3" name="alamat" placeholder="Masukkan Alamat"></textarea>
                    <span class="help-block"><?= form_error('alamat') ?></span>
                  </div>
                  <!-- phone mask -->
                  <div class="form-group">
                    <label>Nomor Handphone</label>

                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                      </div>
                      <input type="text" class="form-control" name="no_telp" data-inputmask='"mask": "999999999999"' data-mask>
                    </div>
                    <!-- /.input group -->
                    <span class="help-block"><?= form_error('no_telp') ?></span>
                  </div>
                  <div class="form-group">
                    <label>Penempatan</label>
                    <select class="form-control select2" name="kode_penempatan" style="width: 100%;">
                      <option value="" selected="selected">--Pilih--</option>
                      <?php foreach ($dt_cabang as $data) { ?>
                      <option value="<?php echo $data->kode_penempatan ?>"><?php echo $data->nama ?></option>
                      <?php } ?>
                    </select>
                    <span class="help-block"><?= form_error('kode_penempatan') ?></span>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right" style="margin-right: 17px; width: 200px;">Simpan</button>
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
  <!-- /.content-wrapper -->
  <!-- FOOTER -->
  <?php $this->load->view('_partials/footer') ?>
  <!-- FOOTER CLOSE -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!--  JAVASCRIPT -->
  <?php $this->load->view('_partials/js'); ?>
<!--  JAVASCRIPT CLOSE -->
</body>
</html>
