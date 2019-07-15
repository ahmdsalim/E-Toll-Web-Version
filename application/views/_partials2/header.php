  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-brand"><b>Petugas</b> E-Toll</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="<?php $nav = $this->session->flashdata('nav'); if($nav == 'transaksi'){ echo 'active'; } ?>"><a href="<?php echo site_url('petugas/') ?>">Pembayaran</a></li>
            <li class="<?php $nav = $this->session->flashdata('nav'); if($nav == 'masuk'){ echo 'active'; } ?>"><a href="<?php echo site_url('petugas/transaksi/gerbang_masuk') ?>">Gerbang Masuk</a></li>
            <li class="<?php $nav = $this->session->flashdata('nav'); if($nav == 'list'){ echo 'active'; } ?>"><a href="<?php echo site_url('petugas/listtransaksi') ?>">Histori Pembayaran</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="<?php echo base_url('assets/images/user.png') ?>" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?php echo $this->session->userdata('nama'); ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="<?php echo base_url('assets/images/user.png') ?>" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $this->session->userdata('nama'); ?> - Petugas
                  </p>
                </li>
                <!-- Menu Body -->

                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php echo base_url('index.php/petugas/profile') ?>" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="#" onclick="signout()" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>