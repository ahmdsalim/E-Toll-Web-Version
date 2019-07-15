<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('_partials/head') ?>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-brand">Aplikasi <b>E-Toll</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">

      <!-- Main content -->
      <section class="content" style="padding-right: 250px; padding-left: 250px;">
        <div class="box box-danger" style="margin-top: 100px;">
          <div class="box-header with-border bg-red">
            <h3 class="box-title">Masuk sebagai Admin</h3>
          </div>
          <div class="box-body" style="padding-top: 30px; padding-bottom: 50px;">
            <form action="<?php echo base_url('index.php/login/auth') ?>" method="POST">
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    <input id="id_card" name="username" class="form-control" type="text" placeholder="Username" autocomplete="off" required="required" autofocus="on">
                </div>
                <div class="form-group">
                    <div class="input-group">
                      <input class="form-control" id="sandi" name="password" type="password" placeholder="Kata Sandi">
                      <div class="input-group-addon">
                        <span><i onclick="show()" id="icon" class="fa fa-eye"></i></span>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-md btn-success" value="Masuk"></input>
                </div>
                <!-- /.form group -->
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
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
<script type="text/javascript">
function show() {
  var sandi = document.getElementById('sandi');
    if(sandi.type == "password"){
      $('#icon').attr('class','fa fa-eye-slash');
      sandi.type ='text';
    }else{
      sandi.type ='password';
      $('#icon').attr('class','fa fa-eye');
    }
  }
</script>
</body>
</html>
