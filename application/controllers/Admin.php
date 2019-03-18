<?php

class Admin extends CI_Controller
{

  function __construct()

  {
    parent::__construct();
    check_session();
    $this->load->model('Model_fields');
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
    $data['fields'] = $this->Model_fields->padi();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/padi/index');
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
    $data['fields'] = $this->Model_fields->berpati();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/berpati/index');
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
    $data['fields'] = $this->Model_fields->gula();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/gula/index');
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
    $data['fields'] = $this->Model_fields->biji();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/biji/index');
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
    $data['fields'] = $this->Model_fields->buah();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/buah/index');
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
    $data['fields'] = $this->Model_fields->sayur();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/sayur/index');
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
    $data['fields'] = $this->Model_fields->daging();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/daging/index');
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
    $data['fields'] = $this->Model_fields->telur();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/telur/index');
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
    $data['fields'] = $this->Model_fields->susu();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/susu/index');
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
    $data['fields'] = $this->Model_fields->ikan();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/ikan/index');
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
    $data['fields'] = $this->Model_fields->minyak();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/minyak/index');
    $this->load->view('templates/footer');
    }
  }

}


?>