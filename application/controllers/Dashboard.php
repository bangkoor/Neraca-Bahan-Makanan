<?php

class Dashboard extends CI_Controller
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
    if ($this->session->userdata('level') == "Daerah"){
    $this->template->load('templates','dashboard/dashboard_daerah');
    } elseif($this->session->userdata('level') == "Pusat"){
    $this->template->load('templates','dashboard/dashboard_pusat');
    } elseif($this->session->userdata('level') == "Admin"){
    $this->template->load('templates','dashboard/dashboard_admin');
    }
    $this->load->view('templates/footer');
  }

}


?>