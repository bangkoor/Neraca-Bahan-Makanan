<?php

class Dashboard extends CI_Controller
{

  function __construct()

  {
    parent::__construct();
    check_session();
    $this->load->model('Daerah_model','daerah');
  }

  function index()
  {
    $data['title'] = 'Sistem Kementrian Pertanian';
    $data['provinsi']=$this->daerah->getProv();
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
  
  public function getKab($id_prov)
  {
    $kab=$this->daerah->getKab($id_prov);
     echo"<option value=''>Pilih Kota/Kab</option>";
    foreach($kab as $k){
      echo "<option value='{$k->id_kab}'>{$k->nama}</option>";
    }
  }
  
  public function getKec($id_kab)
  {
    $kec=$this->daerah->getKec($id_kab);
     echo"<option value=''>Pilih Kecamatan</option>";
    foreach($kec as $k){
      echo "<option value='{$k->id_kec}'>{$k->nama}</option>";
    }
  }

  public function getKel($id_kec)
  {
    $kel=$this->daerah->getKel($id_kec);
     echo"<option value=''>Pilih Kelurahan/Desa</option>";
    foreach($kel as $k){
      echo "<option value='{$k->id_kel}'>{$k->nama}</option>";
    }
  } 

}


?>