<?php

class Produksi extends CI_Controller
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
    if ($this->session->userdata('level') == "Daerah"){
    $this->template->load('templates','dashboard/dashboard_daerah');
    } elseif($this->session->userdata('level') == "Pusat"){
    $this->template->load('templates','dashboard/dashboard_pusat');
    } elseif($this->session->userdata('level') == "Admin"){
    $this->template->load('templates','dashboard/dashboard_admin');
    }
    $this->load->view('templates/footer');
  }

  function padi()
  {
    if (isset($_POST['submit'])) {
    redirect('dashboard');
    }
    elseif (isset($_POST['next'])) {
    redirect('produksi/berpati');
    }
    else{
    $data['title'] = 'Produksi Padi';
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','produksi/padi/index');
    $this->load->view('templates/footer');
    }
    
  }

  function berpati()
  {
    if (isset($_POST['submit'])) {
    redirect('dashboard');
    }
    elseif (isset($_POST['next'])) {
    redirect('produksi/gula');
    }
    else{
    $data['title'] = 'Produksi Berpati';
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','produksi/berpati/index');
    $this->load->view('templates/footer');
    }
  }

  function gula()
  {
    if (isset($_POST['submit'])) {
    redirect('dashboard');
    }
    elseif (isset($_POST['next'])) {
    redirect('produksi/biji');
    }
    else{
    $data['title'] = 'Produksi Gula';
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','produksi/gula/index');
    $this->load->view('templates/footer');
    }
  }

  function biji()
  {
    if (isset($_POST['submit'])) {
    redirect('dashboard');
    }
    elseif (isset($_POST['next'])) {
    redirect('produksi/buah');
    }
    else{
    $data['title'] = 'Produksi Biji';
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','produksi/biji/index');
    $this->load->view('templates/footer');
    }
  }

  function buah()
  {
    if (isset($_POST['submit'])) {
    redirect('dashboard');
    }
    elseif (isset($_POST['next'])) {
    redirect('produksi/sayur');
    }
    else{
    $data['title'] = 'Produksi Buah';
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','produksi/buah/index');
    $this->load->view('templates/footer');
    }
  }

  function sayur()
  {
    if (isset($_POST['submit'])) {
    redirect('dashboard');
    }
    elseif (isset($_POST['next'])) {
    redirect('produksi/daging');
    }
    else{
    $data['title'] = 'Produksi Sayur';
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','produksi/sayur/index');
    $this->load->view('templates/footer');
    }
  }

  function daging()
  {
    if (isset($_POST['submit'])) {
    redirect('dashboard');
    }
    elseif (isset($_POST['next'])) {
    redirect('produksi/telur');
    }
    else{
    $data['title'] = 'Produksi Daging';
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','produksi/daging/index');
    $this->load->view('templates/footer');
    }
  }

  function telur()
  {
    if (isset($_POST['submit'])) {
    redirect('dashboard');
    }
    elseif (isset($_POST['next'])) {
    redirect('produksi/susu');
    }
    else{
    $data['title'] = 'Produksi Telur';
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','produksi/telur/index');
    $this->load->view('templates/footer');
    }
  }

  function susu()
  {
    if (isset($_POST['submit'])) {
    redirect('dashboard');
    }
    elseif (isset($_POST['next'])) {
    redirect('produksi/ikan');
    }
    else{
    $data['title'] = 'Produksi Susu';
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','produksi/susu/index');
    $this->load->view('templates/footer');
    }
  }

  function ikan()
  {
    if (isset($_POST['submit'])) {
    redirect('dashboard');
    }
    elseif (isset($_POST['next'])) {
    redirect('produksi/minyak');
    }
    else{
    $data['title'] = 'Produksi Ikan';
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','produksi/ikan/index');
    $this->load->view('templates/footer');
    }
  }

  function minyak()
  {
    if (isset($_POST['submit'])) {
    redirect('dashboard');
    }
    else{
    $data['title'] = 'Produksi Minyak';
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','produksi/minyak/index');
    $this->load->view('templates/footer');
    }
  }

}


?>