<?php

class Impor extends CI_Controller
{

  function __construct()

  {
    parent::__construct();
    check_session();
  }

  function index()
  {
    $data['title'] = 'Sistem Kementrian Pertanian';
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->load->view('templates/sidebar');
    $this->template->load('templates','dashboard/dashboard_daerah');
    $this->load->view('templates/footer');
  }

}


?>