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
          Gerbang Keluar Tol <?php echo $this->session->userdata('nama_tol'); ?>
        </h1>
        <?php $this->load->view('_partials/breadcrumb') ?>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Pembayaran Tol</h3>
          </div>
          <div class="box-body">
            <form action="<?php echo base_url('index.php/petugas/transaksi/insert') ?>" method="POST">
            <div class="col-md-6">
                <div id="card">
                  <input id="saldo" class="form-control bg-white" type="hidden" readonly>
                  <div class="form-group">
                    <label>Asal Tol</label>
                    <input id="asal" name="asal_tol" class="form-control bg-white" type="text" readonly>
                  </div>
                  <!-- Date dd/mm/yyyy -->
                  <div class="form-group">
                    <label>Tarif</label>
                    <input id="tarif" name="tarif" class="form-control" type="text" readonly style="border: none; background: #3085d6;">
                  </div>
                  <!-- /.form group -->
                </div>
            </div>
            <div class="col-md-6">
                  <div class="form-group">
                    <label>Card Number</label>
                    <input id="id_card" name="id_card" oninput="showCard(this.value)" class="form-control" type="text" placeholder="Enter the ID Card" autocomplete="off" autofocus="on" required>
                    <div id="notif" class="text-yellow">
                                        
                    </div>
                  </div>
                  <!-- Date dd/mm/yyyy -->
                  <div class="form-group">
                    <label>Sisa Saldo</label>
                    <input id="sisa" name="sisa" class="form-control" type="text" readonly>
                      <div id="notif2">
                                          
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
            $('#sisa').val('');
            $('#tarif').val('');
            $('#asal').val('');
            $('#submit').attr("disabled","disabled")
            document.getElementById("notif").innerHTML = "";
            document.getElementById("notif2").innerHTML = "";
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
                  var note = $('#note').val();
                  if(saldo != ""){
                    var saldo = $('#saldo').val().replace(".", "").replace(".", "");
                    var tarif = $('#tarif').val().replace(".", "").replace(".", "");
                    document.getElementById("notif").innerHTML = "";
                    var hasil = saldo-tarif;
                    if(hasil >= 0){
                      $('#submit').removeAttr("disabled");
                      $('#sisa').val(convertToRupiah(hasil));
                    } else {
                      var notif2 = document.getElementById("notif2");
                      $('#sisa').val(saldo);
                      notif2.innerHTML = "<b>Saldo Tidak Mencukupi!</b>";
                    }
                  }else if(note == "ERROR"){
                      var notif = document.getElementById("notif");
                      notif.innerHTML = "<b>ERROR</b> Kartu Tidak Sinkron dengan Sistem! ";
                      $('#sisa').val('');
                      document.getElementById("notif2").innerHTML = "";
                  }else {
                      var notif = document.getElementById("notif");
                      notif.innerHTML = "<b>ID Card tidak valid!</b>";
                      $('#sisa').val('');
                      document.getElementById("notif2").innerHTML = "";
                    }
                  
              }
          }
          xmlhttp.open("GET", "<?= base_url(
            'index.php/petugas/transaksi/getcard') ?>/"+str,true);
          xmlhttp.send();
          
        }
      }

    function convertToRupiah(angka)
    {

      var rupiah = '';    
      var angkarev = angka.toString().split('').reverse().join('');
      
      for(var i = 0; i < angkarev.length; i++) 
        if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
      
      return rupiah.split('',rupiah.length-1).reverse().join('');
  
    }
    </script>
</body>
</html>
