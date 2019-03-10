<body>
  <div class="container-scroller">
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="<?php echo base_url(); ?>">
          <img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="<?php echo base_url(); ?>">
          <img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
          <li class="nav-item">
            <a href="#" class="nav-link">Jadwal
              <span class="badge badge-primary ml-1">New</span>
            </a>
          </li>
          <li class="nav-item active">
            <a href="#" class="nav-link">
              <i class="mdi mdi-elevation-rise"></i>Daftar Laporan</a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Hallo, <?php echo ucfirst($this->session->userdata('level')); ?> <?php echo ucfirst($this->session->userdata('lokasi')); ?>!</span>
              <img class="img-xs rounded-circle" src="<?php echo base_url(); ?>assets/images/faces/face1.jpg" alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item" href="<?php echo base_url() ?>auth/logout">
                Sign Out
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <?php

        if($this->session->userdata('level') == "Daerah") {
        $this->load->view('templates/sidebardaerah');
        }
        elseif($this->session->userdata('level') == "Admin") {
        $this->load->view('templates/sidebaradmin');
        }
        elseif($this->session->userdata('level') == "Pusat") {
        $this->load->view('templates/sidebarpusat');
        }
        else{
        }
    ?>
