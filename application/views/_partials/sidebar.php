<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/images/user.png') ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGASI</li>
        <li class="<?php $nav = $this->session->flashdata('nav'); if($nav == 'dashboard'){ echo 'active'; } ?>">
          <a href="<?php echo site_url('admin/') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="<?php $nav = $this->session->flashdata('nav'); if($nav == 'transaksi' || $nav == 'petugas' || $nav == 'kartu' || $nav == 'tarif' || $nav == 'ruas' || $nav == 'tol'){ echo 'active menu-open'; } ?> treeview">
          <a href="#">
            <i class="fa fa-briefcase"></i>
            <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php $nav = $this->session->flashdata('nav'); if($nav == 'petugas'){ echo 'active'; } ?>"><a href="<?php echo site_url('admin/petugas')?>"><i class="fa fa-user"></i> Petugas</a></li>
            <li class="<?php $nav = $this->session->flashdata('nav'); if($nav == 'kartu'){ echo 'active'; } ?>"><a href="<?php echo site_url('admin/kartu')?>"><i class="fa fa-credit-card"></i> e-Toll Card</a></li>
            <li class="<?php $nav = $this->session->flashdata('nav'); if($nav == 'transaksi'){ echo 'active'; } ?>"><a href="<?php echo site_url('admin/transaksi')?>"><i class="fa fa-clock-o"></i> Histori Transaksi</a></li>
            <li class="<?php $nav = $this->session->flashdata('nav'); if($nav == 'tarif'){ echo 'active'; } ?>"><a href="<?php echo site_url('admin/tarif')?>"><i class="fa fa-dollar"></i> Tarif</a></li>
            <li class="<?php $nav = $this->session->flashdata('nav'); if($nav == 'ruas'){ echo 'active'; } ?>"><a href="<?php echo site_url('admin/ruas')?>"><i class="fa fa-road"></i> Ruas Tol</a></li>
            <li class="<?php $nav = $this->session->flashdata('nav'); if($nav == 'tol'){ echo 'active'; } ?>"><a href="<?php echo site_url('admin/tol')?>"><i class="fa fa-road"></i> Tol</a></li>
          </ul>
        </li>
        <!--<li class="<?php $nav = $this->session->flashdata('nav'); if($nav == 'laporan_petugas' || $nav == 'laporan_kartu' || $nav == 'laporan_transaksi'){ echo 'active menu-open'; } ?> treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('admin/petugas/laporan_petugas')?>"><i class="fa fa-bar-chart-o"></i> Laporan Data Petugas</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-bar-chart-o"></i> Laporan Data e-Toll Card</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-bar-chart-o"></i> Laporan Histori Transaksi</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-bar-chart-o"></i> Laporan Tarif</a></li>
          </ul>
        </li>-->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>