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
            <div class="box-header bg-blue">
              <h3 class="box-title">Data Tarif Tol <small style="color: #fff;">s/d</small> <?php date_default_timezone_set('Asia/Jakarta'); echo date('d F Y'); ?></h3>
              <div class="box-tools pull-right">
                <a href="<?php echo base_url('index.php/admin/tarif/add') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add</a>
                <a href="<?php echo base_url('index.php/admin/tarif/laporan_semua') ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Cetak PDF</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatable" class="table table-hover">
                <thead>
                <tr align="center">
                  <th class="btn-warning text-white">Ruas Tol</th>
                  <th class="btn-success text-white">Gebang Masuk</th>
                  <th class="btn-success text-white">Gerbang Keluar</th>
                  <th class="btn-success text-white">Tarif</th>
                  <th class="btn-success text-white">Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($dt_tarif as $data) { ?>
                <tr>
                  <td><?php echo $data->nama_ruas ?></td>
                  <td><?php echo $data->masuk ?></td>
                  <td><?php echo $data->keluar ?></td>
                  <td>Rp. <?php echo number_format($data->tarif,0,'','.') ?></td>
                  <td>
                    <a href="<?php echo base_url('index.php/admin/tarif/ubah/'.$data->id_tarif) ?>" class="btn btn-success btn-md text-white"><i class="fa fa-edit"></i></a>
                    <a onclick="hapus('<?= $data->id_tarif ?>')"
                       href="#!" class="btn btn-danger btn-md text-white"><i class="fa fa-trash"></i></a>
                  </td>
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
  <script type="text/javascript">
      function hapus(id) {
        Swal({
            title: 'Yakin Mau Hapus?',
            text: "Tekan 'Hapus' Untuk Meneruskan Penghapusan",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                Swal({
                    title: 'Sukses!',
                    text: 'Penghapusan Data Berhasil.',
                    type: 'success'
                }).then((result) => {
                    if(result.value) {
                        document.location.href = '<?= base_url()?>index.php/admin/tarif/delete/' + id;
                    }
                })
            }
        })
    }
  </script>
</body>
</html>
