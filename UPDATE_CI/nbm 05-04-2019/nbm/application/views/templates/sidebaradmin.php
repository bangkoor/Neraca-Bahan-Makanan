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
          <li class="nav-item <?php if($this->uri->segment(1) == "user"){echo "active"; } ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>user">
              <i class="menu-icon mdi mdi-account"></i>
              <span class="menu-title">User</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#produksi" aria-expanded="false" aria-controls="produksi">
              <i class="menu-icon mdi mdi-factory"></i>
              <span class="menu-title">Produksi</span>
              <i class="menu-arrow"></i><span class="badge badge-info">50%</span>
            </a>
            <div class="collapse" id="produksi">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/produksi_padi">Padi-padian/<i>Cereals</i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/produksi_berpati">Makanan Berpati/<i>Starchy Foods</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/produksi_gula">Gula/<i>Sugar</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/produksi_biji">Buah Biji Berminyak/<i>Pulses Nut & Oil Seeds</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/produksi_buah">Buah-buahan/<i>Fruits</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/produksi_sayur">Sayur-sayuran/<i>Vegetables</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/produksi_daging">Daging/<i>Meat</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/produksi_telur">Telur/<i>Eggs</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/produksi_susu">Susu/<i>Milk</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/produksi_ikan">Ikan/<i>Fish</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/produksi_minyak">Minyak & Lemak/<i>Oil & Fats</i></a>
                </li>
              </ul>
            </div>
          </li>

		  <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#stok" aria-expanded="false" aria-controls="stok">
              <i class="menu-icon mdi mdi-elevation-rise"></i>
              <span class="menu-title">Stok</span> 
              <i class="menu-arrow"></i><span class="badge badge-info">34%</span>
            </a>
            <div class="collapse" id="stok">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/stok_padi">Padi-padian/<i>Cereals</i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/stok_berpati">Makanan Berpati/<i>Starchy Foods</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/stok_gula">Gula/<i>Sugar</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/stok_biji">Buah Biji Berminyak/<i>Pulses Nut & Oil Seeds</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/stok_buah">Buah-buahan/<i>Fruits</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/stok_sayur">Sayur-sayuran/<i>Vegetables</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/stok_daging">Daging/<i>Meat</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/stok_telur">Telur/<i>Eggs</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/stok_susu">Susu/<i>Milk</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/stok_ikan">Ikan/<i>Fish</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/stok_minyak">Minyak & Lemak/<i>Oil & Fats</i></a>
                </li>
              </ul>
            </div>
          </li>



		  <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#impor" aria-expanded="false" aria-controls="impor">
              <i class="menu-icon mdi mdi-arrow-down-bold-circle"></i>
              <span class="menu-title">Impor</span> 
              <i class="menu-arrow"></i><span class="badge badge-info">30%</span>
            </a>
            <div class="collapse" id="impor">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/impor_padi">Padi-padian/<i>Cereals</i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/impor_berpati">Makanan Berpati/<i>Starchy Foods</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/impor_gula">Gula/<i>Sugar</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/impor_biji">Buah Biji Berminyak/<i>Pulses Nut & Oil Seeds</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/impor_buah">Buah-buahan/<i>Fruits</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/impor_sayur">Sayur-sayuran/<i>Vegetables</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/impor_daging">Daging/<i>Meat</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/impor_telur">Telur/<i>Eggs</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/impor_susu">Susu/<i>Milk</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/impor_ikan">Ikan/<i>Fish</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/impor_minyak">Minyak & Lemak/<i>Oil & Fats</i></a>
                </li>
              </ul>
            </div>
          </li>
		  <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ekspor" aria-expanded="false" aria-controls="ekspor">
              <i class="menu-icon mdi mdi-arrow-up-bold-circle"></i>
              <span class="menu-title">Ekspor</span> 
              <i class="menu-arrow"></i><span class="badge badge-info">20%</span>
            </a>
            <div class="collapse" id="ekspor">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/ekspor_padi">Padi-padian/<i>Cereals</i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/ekspor_berpati">Makanan Berpati/<i>Starchy Foods</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/ekspor_gula">Gula/<i>Sugar</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/ekspor_biji">Buah Biji Berminyak/<i>Pulses Nut & Oil Seeds</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/ekspor_buah">Buah-buahan/<i>Fruits</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/ekspor_sayur">Sayur-sayuran/<i>Vegetables</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/ekspor_daging">Daging/<i>Meat</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/ekspor_telur">Telur/<i>Eggs</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/ekspor_susu">Susu/<i>Milk</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/ekspor_ikan">Ikan/<i>Fish</i></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/ekspor_minyak">Minyak & Lemak/<i>Oil & Fats</i></a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#laporan" aria-expanded="false" aria-controls="laporan">
              <i class="menu-icon mdi mdi-file-document"></i>
              <span class="menu-title">Laporan</span> 
              <i class="menu-arrow"></i><span class="badge badge-info">20%</span>
            </a>
            <div class="collapse" id="laporan">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/laporan_nbm">NBM</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/laporan_pph">PPH</a>
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