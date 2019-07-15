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
          Gerbang Masuk Tol <?php echo $this->session->userdata('nama_tol'); ?>
        </h1>
        <?php $this->load->view('_partials/breadcrumb') ?>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Masuk Tol</h3>
          </div>
          <div class="box-body" style="padding-top: 30px; padding-bottom: 50px;">
            <form action="<?php echo base_url('index.php/petugas/transaksi/updatecard') ?>" method="POST">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <label>Card Number</label>
                    <input id="id_card" name="id_card" oninput="showCard(this.value)" class="form-control" type="text" placeholder="Enter the Card Number" autocomplete="off" required="required" autofocus="on">
                    <div id="notif" class="text-yellow">
                                        
                    </div>
                </div>
                <div id="card">
                  <div class="form-group">
                    <label>Saldo</label>
                    <input id="saldo" class="form-control" type="text" readonly>
                  </div>
                </div>
                <div class="form-group">
                    <button id="submit" type="submit" class="btn btn-md btn-success btn-block"  disabled><i class="fa fa-check fa-fx"></i></button>
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
        function showCard(str) 
      {

        if (str == "") {
            $('#saldo').val('');
            $('#submit').attr("disabled","disabled")
            document.getElementById("notif").innerHTML = "";
        } else { 
          if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
               xmlhttp = new XMLHttpRequest();
          } else {
              // code for IE6, IE5
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
               if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                  document.getElementById("card").innerHTML = 
                  xmlhttp.responseText;
                  var saldo = $('#saldo').val().replace(".", "").replace(".", "");

                  if(saldo != 0){
                      document.getElementById("notif").innerHTML = "";
                      $('#submit').removeAttr("disabled");
                  }else {
                      var notif = document.getElementById("notif");
                      notif.innerHTML = "<b>ID Card tidak valid!</b>";
                      $('#sisa').val('');
                      document.getElementById("notif2").innerHTML = "";
                    }
                  
              }
          }
          xmlhttp.open("GET", "<?= base_url(
            'index.php/petugas/transaksi/getcardmsk') ?>/"+str,true);
          xmlhttp.send();
          
        }
      }
    </script>
</body>
</html>
