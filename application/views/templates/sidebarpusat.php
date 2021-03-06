<div class="container-fluid page-body-wrapper">
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="<?php echo base_url(); ?>assets/images/faces/face1.png" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo ucfirst($this->session->userdata('lokasi')); ?></p>
                  <div>
                    <small class="designation text-muted"><?php echo ucfirst($this->session->userdata('level')); ?></small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
              <!-- <button class="btn btn-success btn-block">Laporan Baru
                <i class="mdi mdi-plus"></i>
              </button> -->
            </div>
          </li>
          <li class="nav-item <?php if($this->uri->segment(1) == "home"){echo "active"; } ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>dashboard">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dasbord</span>
            </a>
          </li>
		  <li class="nav-item <?php if($this->uri->segment(1) == "produksi"){echo "active"; } ?>">
            <a class="nav-link" data-toggle="collapse" href="#produksi" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-factory"></i>
              <span class="menu-title">Produksi</span>
              <i class="menu-arrow"></i><span class="badge badge-info">50%</span>
            </a>
            <div class="collapse" id="produksi">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>pusat/padi">Padi-padian/<i>Cereals</i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>pusat/berpati">Makanan Berpati/<i>Starchy Foods</i></a>
                </li>
        <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>pusat/gula">Gula/<i>Sugar</i></a>
                </li>
        <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>pusat/biji">Buah Biji Berminyak/<i>Pulses Nut & Oil Seeds</i></a>
                </li>
        <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>pusat/buah">Buah-buahan/<i>Fruits</i></a>
                </li>
        <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>pusat/sayur">Sayur-sayuran/<i>Vegetables</i></a>
                </li>
        <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>pusat/daging">Daging/<i>Meat</i></a>
                </li>
        <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>pusat/telur">Telur/<i>Eggs</i></a>
                </li>
        <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>pusat/susu">Susu/<i>Milk</i></a>
                </li>
        <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>pusat/ikan">Ikan/<i>Fish</i></a>
                </li>
        <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>pusat/minyak">Minyak & Lemak/<i>Oil & Fats</i></a>
                </li>
              </ul>
            </div>
          </li>
      <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#stok" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-elevation-rise"></i>
              <span class="menu-title">Stok</span> 
              <i class="menu-arrow"></i><span class="badge badge-info">34%</span>
            </a>
            <div class="collapse" id="stok">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/buttons.html">Padi-padian/<i>Cereals</i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/typography.html">Makanan Berpati/<i>Starchy Foods</i></a>
                </li>
        <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/typography.html">Gula/<i>Sugar</i></a>
                </li>
        <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/typography.html">Buah Biji Berminyak/<i>Pulses Nut & Oil Seeds</i></a>
                </li>
        <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/typography.html">Buah-buahan/<i>Fruits</i></a>
                </li>
        <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/typography.html">Sayur-sayuran/<i>Vegetables</i></a>
                </li>
        <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/typography.html">Daging/<i>Meat</i></a>
                </li>
        <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/typography.html">Telur/<i>Eggs</i></a>
                </li>
        <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/typography.html">Susu/<i>Milk</i></a>
                </li>
        <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/typography.html">Ikan/<i>Fish</i></a>
                </li>
        <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/typography.html">Minyak & Lemak/<i>Oil & Fats</i></a>
                </li>
              </ul>
            </div>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="../../pages/tables/basic-table.html">
              <i class="menu-icon mdi mdi-settings"></i>
              <span class="menu-title">Pengaturan</span>
            </a>
          </li>
        </ul>
      </nav>