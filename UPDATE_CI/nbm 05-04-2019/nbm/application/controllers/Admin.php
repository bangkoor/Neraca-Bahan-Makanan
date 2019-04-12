<?php

class Admin extends CI_Controller
{

  function __construct()

  {
    parent::__construct();
    check_session();
    $this->load->model('Model_fields');
    $this->load->model('Model_komoditas');
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

  function laporan_nbm()
  {
    $data['title'] = 'Laporan NBM';
    $data['fields'] = $this->Model_komoditas->produksi_padi();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/laporan/nbm');
    $this->load->view('templates/footer');
  }

  function laporan_pph()
  {
    $data['title'] = 'Laporan PPH';
    $data['fields'] = $this->Model_komoditas->produksi_padi();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/laporan/pph');
    $this->load->view('templates/footer');
  }

function padi_post_produksi()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $produksi_kotor = $_POST['produksi_kotor']; // Ambil data telp dan masukkan ke variabel telp
        $luas_panen = $_POST['luas_panen']; // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi'];
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'produksi_kotor'=>$produksi_kotor[$index],
        'luas_panen'=>$luas_panen[$index], 
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_produksi($data);
    redirect('admin/produksi_padi');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/produksi_berpati');
    }
    else {
    $data['title'] = 'Tambah Data Padi';
    $data['fields'] = $this->Model_komoditas->input_padi();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/padi/input');
    $this->load->view('templates/footer');

    }
}

function edit_padi_produksi()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_produksi();
      redirect('admin/produksi_padi');
    } else {
      $data['title'] = 'Edit Padi';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_padi()->result();
      $data['record'] = $this->Model_komoditas->get_id_produksi($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/produksi/padi/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_padi_produksi()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_produksi($id);
    redirect ('admin/produksi_padi');
  }

  function produksi_padi()
  {
    $data['title'] = 'Produksi Padi';
    $data['fields'] = $this->Model_komoditas->produksi_padi();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/padi/index');
    $this->load->view('templates/footer');
  }



  function berpati_post_produksi()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $produksi_kotor = $_POST['produksi_kotor']; // Ambil data telp dan masukkan ke variabel telp
        $luas_panen = $_POST['luas_panen']; // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi'];
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'produksi_kotor'=>$produksi_kotor[$index],
        'luas_panen'=>$luas_panen[$index], 
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_produksi($data);
    redirect('admin/produksi_berpati');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/produksi_gula');
    }
    else {
    $data['title'] = 'Tambah Data berpati';
    $data['fields'] = $this->Model_komoditas->input_berpati();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/berpati/input');
    $this->load->view('templates/footer');

    }
}

function edit_berpati_produksi()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_produksi();
      redirect('admin/produksi_berpati');
    } else {
      $data['title'] = 'Edit berpati';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_berpati()->result();
      $data['record'] = $this->Model_komoditas->get_id_produksi($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/produksi/berpati/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_berpati_produksi()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_produksi($id);
    redirect ('admin/produksi_berpati');
  }

  function produksi_berpati()
  {
    $data['title'] = 'Produksi berpati';
    $data['fields'] = $this->Model_komoditas->produksi_berpati();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/berpati/index');
    $this->load->view('templates/footer');
  }

  function gula_post_produksi()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $produksi_kotor = $_POST['produksi_kotor']; // Ambil data telp dan masukkan ke variabel telp
        $luas_panen = $_POST['luas_panen']; // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi'];
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'produksi_kotor'=>$produksi_kotor[$index],
        'luas_panen'=>$luas_panen[$index], 
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_produksi($data);
    redirect('admin/produksi_gula');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/produksi_biji');
    }
    else {
    $data['title'] = 'Tambah Data gula';
    $data['fields'] = $this->Model_komoditas->input_gula();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/gula/input');
    $this->load->view('templates/footer');

    }
}

function edit_gula_produksi()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_produksi();
      redirect('admin/produksi_gula');
    } else {
      $data['title'] = 'Edit gula';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_gula()->result();
      $data['record'] = $this->Model_komoditas->get_id_produksi($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/produksi/gula/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_gula_produksi()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_produksi($id);
    redirect ('admin/produksi_gula');
  }

  function produksi_gula()
  {
    $data['title'] = 'Produksi gula';
    $data['fields'] = $this->Model_komoditas->produksi_gula();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/gula/index');
    $this->load->view('templates/footer');
  }




  function biji_post_produksi()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $produksi_kotor = $_POST['produksi_kotor']; // Ambil data telp dan masukkan ke variabel telp
        $luas_panen = $_POST['luas_panen']; // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi'];
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'produksi_kotor'=>$produksi_kotor[$index],
        'luas_panen'=>$luas_panen[$index], 
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_produksi($data);
    redirect('admin/produksi_biji');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/produksi_buah');
    }
    else {
    $data['title'] = 'Tambah Data biji';
    $data['fields'] = $this->Model_komoditas->input_biji();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/biji/input');
    $this->load->view('templates/footer');

    }
}

function edit_biji_produksi()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_produksi();
      redirect('admin/produksi_biji');
    } else {
      $data['title'] = 'Edit biji';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_biji()->result();
      $data['record'] = $this->Model_komoditas->get_id_produksi($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/produksi/biji/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_biji_produksi()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_produksi($id);
    redirect ('admin/produksi_biji');
  }

  function produksi_biji()
  {
    $data['title'] = 'Produksi biji';
    $data['fields'] = $this->Model_komoditas->produksi_biji();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/biji/index');
    $this->load->view('templates/footer');
  }


  function buah_post_produksi()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $produksi_kotor = $_POST['produksi_kotor']; // Ambil data telp dan masukkan ke variabel telp
        $luas_panen = $_POST['luas_panen']; // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi'];
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'produksi_kotor'=>$produksi_kotor[$index],
        'luas_panen'=>$luas_panen[$index], 
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_produksi($data);
    redirect('admin/produksi_buah');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/produksi_sayur');
    }
    else {
    $data['title'] = 'Tambah Data buah';
    $data['fields'] = $this->Model_komoditas->input_buah();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/buah/input');
    $this->load->view('templates/footer');

    }
}

function edit_buah_produksi()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_produksi();
      redirect('admin/produksi_buah');
    } else {
      $data['title'] = 'Edit buah';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_buah()->result();
      $data['record'] = $this->Model_komoditas->get_id_produksi($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/produksi/buah/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_buah_produksi()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_produksi($id);
    redirect ('admin/produksi_buah');
  }

  function produksi_buah()
  {
    $data['title'] = 'Produksi buah';
    $data['fields'] = $this->Model_komoditas->produksi_buah();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/buah/index');
    $this->load->view('templates/footer');
  }


  function sayur_post_produksi()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $produksi_kotor = $_POST['produksi_kotor']; // Ambil data telp dan masukkan ke variabel telp
        $luas_panen = $_POST['luas_panen']; // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi'];
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'produksi_kotor'=>$produksi_kotor[$index],
        'luas_panen'=>$luas_panen[$index], 
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_produksi($data);
    redirect('admin/produksi_sayur');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/produksi_daging');
    }
    else {
    $data['title'] = 'Tambah Data sayur';
    $data['fields'] = $this->Model_komoditas->input_sayur();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/sayur/input');
    $this->load->view('templates/footer');

    }
}

function edit_sayur_produksi()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_produksi();
      redirect('admin/produksi_sayur');
    } else {
      $data['title'] = 'Edit sayur';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_sayur()->result();
      $data['record'] = $this->Model_komoditas->get_id_produksi($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/produksi/sayur/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_sayur_produksi()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_produksi($id);
    redirect ('admin/produksi_sayur');
  }

  function produksi_sayur()
  {
    $data['title'] = 'Produksi sayur';
    $data['fields'] = $this->Model_komoditas->produksi_sayur();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/sayur/index');
    $this->load->view('templates/footer');
  }


  function daging_post_produksi()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $produksi_kotor = $_POST['produksi_kotor']; // Ambil data telp dan masukkan ke variabel telp
        $luas_panen = $_POST['luas_panen']; // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi'];
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'produksi_kotor'=>$produksi_kotor[$index],
        'luas_panen'=>$luas_panen[$index], 
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_produksi($data);
    redirect('admin/produksi_daging');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/produksi_telur');
    }
    else {
    $data['title'] = 'Tambah Data daging';
    $data['fields'] = $this->Model_komoditas->input_daging();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/daging/input');
    $this->load->view('templates/footer');

    }
}

function edit_daging_produksi()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_produksi();
      redirect('admin/produksi_daging');
    } else {
      $data['title'] = 'Edit daging';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_daging()->result();
      $data['record'] = $this->Model_komoditas->get_id_produksi($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/produksi/daging/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_daging_produksi()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_produksi($id);
    redirect ('admin/produksi_daging');
  }

  function produksi_daging()
  {
    $data['title'] = 'Produksi daging';
    $data['fields'] = $this->Model_komoditas->produksi_daging();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/daging/index');
    $this->load->view('templates/footer');
  }

  function telur_post_produksi()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $produksi_kotor = $_POST['produksi_kotor']; // Ambil data telp dan masukkan ke variabel telp
        $luas_panen = $_POST['luas_panen']; // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi'];
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'produksi_kotor'=>$produksi_kotor[$index],
        'luas_panen'=>$luas_panen[$index], 
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_produksi($data);
    redirect('admin/produksi_telur');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/produksi_susu');
    }
    else {
    $data['title'] = 'Tambah Data telur';
    $data['fields'] = $this->Model_komoditas->input_telur();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/telur/input');
    $this->load->view('templates/footer');

    }
}

function edit_telur_produksi()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_produksi();
      redirect('admin/produksi_telur');
    } else {
      $data['title'] = 'Edit telur';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_telur()->result();
      $data['record'] = $this->Model_komoditas->get_id_produksi($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/produksi/telur/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_telur_produksi()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_produksi($id);
    redirect ('admin/produksi_telur');
  }

  function produksi_telur()
  {
    $data['title'] = 'Produksi telur';
    $data['fields'] = $this->Model_komoditas->produksi_telur();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/telur/index');
    $this->load->view('templates/footer');
  }

  function susu_post_produksi()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $produksi_kotor = $_POST['produksi_kotor']; // Ambil data telp dan masukkan ke variabel telp
        $luas_panen = $_POST['luas_panen']; // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi'];
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'produksi_kotor'=>$produksi_kotor[$index],
        'luas_panen'=>$luas_panen[$index], 
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_produksi($data);
    redirect('admin/produksi_susu');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/produksi_ikan');
    }
    else {
    $data['title'] = 'Tambah Data susu';
    $data['fields'] = $this->Model_komoditas->input_susu();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/susu/input');
    $this->load->view('templates/footer');

    }
}

function edit_susu_produksi()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_produksi();
      redirect('admin/produksi_susu');
    } else {
      $data['title'] = 'Edit susu';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_susu()->result();
      $data['record'] = $this->Model_komoditas->get_id_produksi($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/produksi/susu/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_susu_produksi()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_produksi($id);
    redirect ('admin/produksi_susu');
  }

  function produksi_susu()
  {
    $data['title'] = 'Produksi susu';
    $data['fields'] = $this->Model_komoditas->produksi_susu();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/susu/index');
    $this->load->view('templates/footer');
  }

  function ikan_post_produksi()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $produksi_kotor = $_POST['produksi_kotor']; // Ambil data telp dan masukkan ke variabel telp
        $luas_panen = $_POST['luas_panen']; // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi'];
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'produksi_kotor'=>$produksi_kotor[$index],
        'luas_panen'=>$luas_panen[$index], 
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_produksi($data);
    redirect('admin/produksi_ikan');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/produksi_minyak');
    }
    else {
    $data['title'] = 'Tambah Data ikan';
    $data['fields'] = $this->Model_komoditas->input_ikan();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/ikan/input');
    $this->load->view('templates/footer');

    }
}

function edit_ikan_produksi()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_produksi();
      redirect('admin/produksi_ikan');
    } else {
      $data['title'] = 'Edit ikan';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_ikan()->result();
      $data['record'] = $this->Model_komoditas->get_id_produksi($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/produksi/ikan/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_ikan_produksi()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_produksi($id);
    redirect ('admin/produksi_ikan');
  }

  function produksi_ikan()
  {
    $data['title'] = 'Produksi ikan';
    $data['fields'] = $this->Model_komoditas->produksi_ikan();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/ikan/index');
    $this->load->view('templates/footer');
  }

  function minyak_post_produksi()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $produksi_kotor = $_POST['produksi_kotor']; // Ambil data telp dan masukkan ke variabel telp
        $luas_panen = $_POST['luas_panen']; // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi'];
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'produksi_kotor'=>$produksi_kotor[$index],
        'luas_panen'=>$luas_panen[$index], 
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_produksi($data);
    redirect('admin/produksi_minyak');
    }
    else {
    $data['title'] = 'Tambah Data minyak';
    $data['fields'] = $this->Model_komoditas->input_minyak();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/minyak/input');
    $this->load->view('templates/footer');

    }
}

function edit_minyak_produksi()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_produksi();
      redirect('admin/produksi_minyak');
    } else {
      $data['title'] = 'Edit minyak';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_minyak()->result();
      $data['record'] = $this->Model_komoditas->get_id_produksi($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/produksi/minyak/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_minyak_produksi()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_produksi($id);
    redirect ('admin/produksi_minyak');
  }

  function produksi_minyak()
  {
    $data['title'] = 'Produksi minyak';
    $data['fields'] = $this->Model_komoditas->produksi_minyak();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/produksi/minyak/index');
    $this->load->view('templates/footer');
  }



  function stok_padi()
  {
    $data['title'] = 'Stok Padi';
    $data['fields'] = $this->Model_komoditas->stok_padi();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/stok/padi/index');
    $this->load->view('templates/footer');
  }

  function padi_post_stok()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $stok_awal = $_POST['stok_awal']; // Ambil data telp dan masukkan ke variabel telp
        $stok_akhir = $_POST['stok_akhir']; // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'stok_awal'=>$stok_awal[$index],
        'stok_akhir'=>$stok_akhir[$index], 
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_stok($data);
    redirect('admin/stok_padi');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/stok_berpati');
    }
    else {
    $data['title'] = 'Tambah Data Stok';
    $data['fields'] = $this->Model_komoditas->input_padi();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/stok/padi/input');
    $this->load->view('templates/footer');

    }
}

function edit_padi_stok()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_stok();
      redirect('admin/stok_padi');
    } else {
      $data['title'] = 'Edit Padi';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_padi()->result();
      $data['record'] = $this->Model_komoditas->get_id_stok($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/stok/padi/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_padi_stok()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_stok($id);
    redirect ('admin/stok_padi');
  }


  function stok_berpati()
  {
    $data['title'] = 'Stok berpati';
    $data['fields'] = $this->Model_komoditas->stok_berpati();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/stok/berpati/index');
    $this->load->view('templates/footer');
  }

  function berpati_post_stok()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $stok_awal = $_POST['stok_awal']; // Ambil data telp dan masukkan ke variabel telp
        $stok_akhir = $_POST['stok_akhir']; // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'stok_awal'=>$stok_awal[$index],
        'stok_akhir'=>$stok_akhir[$index], 
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_stok($data);
    redirect('admin/stok_berpati');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/stok_berpati');
    }
    else {
    $data['title'] = 'Tambah Data Stok';
    $data['fields'] = $this->Model_komoditas->input_berpati();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/stok/berpati/input');
    $this->load->view('templates/footer');

    }
}

function edit_berpati_stok()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_stok();
      redirect('admin/stok_berpati');
    } else {
      $data['title'] = 'Edit berpati';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_berpati()->result();
      $data['record'] = $this->Model_komoditas->get_id_stok($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/stok/berpati/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_berpati_stok()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_stok($id);
    redirect ('admin/stok_berpati');
  }

  function stok_gula()
  {
    $data['title'] = 'Stok gula';
    $data['fields'] = $this->Model_komoditas->stok_gula();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/stok/gula/index');
    $this->load->view('templates/footer');
  }

  function gula_post_stok()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $stok_awal = $_POST['stok_awal']; // Ambil data telp dan masukkan ke variabel telp
        $stok_akhir = $_POST['stok_akhir']; // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'stok_awal'=>$stok_awal[$index],
        'stok_akhir'=>$stok_akhir[$index], 
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_stok($data);
    redirect('admin/stok_gula');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/stok_berpati');
    }
    else {
    $data['title'] = 'Tambah Data Stok';
    $data['fields'] = $this->Model_komoditas->input_gula();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/stok/gula/input');
    $this->load->view('templates/footer');

    }
}

function edit_gula_stok()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_stok();
      redirect('admin/stok_gula');
    } else {
      $data['title'] = 'Edit gula';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_gula()->result();
      $data['record'] = $this->Model_komoditas->get_id_stok($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/stok/gula/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_gula_stok()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_stok($id);
    redirect ('admin/stok_gula');
  }

function stok_biji()
  {
    $data['title'] = 'Stok biji';
    $data['fields'] = $this->Model_komoditas->stok_biji();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/stok/biji/index');
    $this->load->view('templates/footer');
  }

  function biji_post_stok()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $stok_awal = $_POST['stok_awal']; // Ambil data telp dan masukkan ke variabel telp
        $stok_akhir = $_POST['stok_akhir']; // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'stok_awal'=>$stok_awal[$index],
        'stok_akhir'=>$stok_akhir[$index], 
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_stok($data);
    redirect('admin/stok_biji');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/stok_berpati');
    }
    else {
    $data['title'] = 'Tambah Data Stok';
    $data['fields'] = $this->Model_komoditas->input_biji();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/stok/biji/input');
    $this->load->view('templates/footer');

    }
}

function edit_biji_stok()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_stok();
      redirect('admin/stok_biji');
    } else {
      $data['title'] = 'Edit biji';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_biji()->result();
      $data['record'] = $this->Model_komoditas->get_id_stok($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/stok/biji/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_biji_stok()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_stok($id);
    redirect ('admin/stok_biji');
  }

function stok_buah()
  {
    $data['title'] = 'Stok buah';
    $data['fields'] = $this->Model_komoditas->stok_buah();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/stok/buah/index');
    $this->load->view('templates/footer');
  }

  function buah_post_stok()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $stok_awal = $_POST['stok_awal']; // Ambil data telp dan masukkan ke variabel telp
        $stok_akhir = $_POST['stok_akhir']; // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'stok_awal'=>$stok_awal[$index],
        'stok_akhir'=>$stok_akhir[$index], 
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_stok($data);
    redirect('admin/stok_buah');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/stok_berpati');
    }
    else {
    $data['title'] = 'Tambah Data Stok';
    $data['fields'] = $this->Model_komoditas->input_buah();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/stok/buah/input');
    $this->load->view('templates/footer');

    }
}

function edit_buah_stok()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_stok();
      redirect('admin/stok_buah');
    } else {
      $data['title'] = 'Edit buah';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_buah()->result();
      $data['record'] = $this->Model_komoditas->get_id_stok($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/stok/buah/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_buah_stok()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_stok($id);
    redirect ('admin/stok_buah');
  }

function stok_sayur()
  {
    $data['title'] = 'Stok sayur';
    $data['fields'] = $this->Model_komoditas->stok_sayur();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/stok/sayur/index');
    $this->load->view('templates/footer');
  }

  function sayur_post_stok()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $stok_awal = $_POST['stok_awal']; // Ambil data telp dan masukkan ke variabel telp
        $stok_akhir = $_POST['stok_akhir']; // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'stok_awal'=>$stok_awal[$index],
        'stok_akhir'=>$stok_akhir[$index], 
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_stok($data);
    redirect('admin/stok_sayur');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/stok_berpati');
    }
    else {
    $data['title'] = 'Tambah Data Stok';
    $data['fields'] = $this->Model_komoditas->input_sayur();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/stok/sayur/input');
    $this->load->view('templates/footer');

    }
}

function edit_sayur_stok()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_stok();
      redirect('admin/stok_sayur');
    } else {
      $data['title'] = 'Edit sayur';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_sayur()->result();
      $data['record'] = $this->Model_komoditas->get_id_stok($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/stok/sayur/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_sayur_stok()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_stok($id);
    redirect ('admin/stok_sayur');
  }

  function stok_daging()
  {
    $data['title'] = 'Stok daging';
    $data['fields'] = $this->Model_komoditas->stok_daging();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/stok/daging/index');
    $this->load->view('templates/footer');
  }

  function daging_post_stok()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $stok_awal = $_POST['stok_awal']; // Ambil data telp dan masukkan ke variabel telp
        $stok_akhir = $_POST['stok_akhir']; // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'stok_awal'=>$stok_awal[$index],
        'stok_akhir'=>$stok_akhir[$index], 
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_stok($data);
    redirect('admin/stok_daging');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/stok_berpati');
    }
    else {
    $data['title'] = 'Tambah Data Stok';
    $data['fields'] = $this->Model_komoditas->input_daging();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/stok/daging/input');
    $this->load->view('templates/footer');

    }
}

function edit_daging_stok()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_stok();
      redirect('admin/stok_daging');
    } else {
      $data['title'] = 'Edit daging';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_daging()->result();
      $data['record'] = $this->Model_komoditas->get_id_stok($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/stok/daging/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_daging_stok()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_stok($id);
    redirect ('admin/stok_daging');
  }

  function stok_telur()
  {
    $data['title'] = 'Stok telur';
    $data['fields'] = $this->Model_komoditas->stok_telur();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/stok/telur/index');
    $this->load->view('templates/footer');
  }

  function telur_post_stok()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $stok_awal = $_POST['stok_awal']; // Ambil data telp dan masukkan ke variabel telp
        $stok_akhir = $_POST['stok_akhir']; // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'stok_awal'=>$stok_awal[$index],
        'stok_akhir'=>$stok_akhir[$index], 
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_stok($data);
    redirect('admin/stok_telur');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/stok_berpati');
    }
    else {
    $data['title'] = 'Tambah Data Stok';
    $data['fields'] = $this->Model_komoditas->input_telur();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/stok/telur/input');
    $this->load->view('templates/footer');

    }
}

function edit_telur_stok()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_stok();
      redirect('admin/stok_telur');
    } else {
      $data['title'] = 'Edit telur';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_telur()->result();
      $data['record'] = $this->Model_komoditas->get_id_stok($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/stok/telur/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_telur_stok()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_stok($id);
    redirect ('admin/stok_telur');
  }

  function stok_susu()
  {
    $data['title'] = 'Stok susu';
    $data['fields'] = $this->Model_komoditas->stok_susu();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/stok/susu/index');
    $this->load->view('templates/footer');
  }

  function susu_post_stok()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $stok_awal = $_POST['stok_awal']; // Ambil data telp dan masukkan ke variabel telp
        $stok_akhir = $_POST['stok_akhir']; // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'stok_awal'=>$stok_awal[$index],
        'stok_akhir'=>$stok_akhir[$index], 
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_stok($data);
    redirect('admin/stok_susu');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/stok_berpati');
    }
    else {
    $data['title'] = 'Tambah Data Stok';
    $data['fields'] = $this->Model_komoditas->input_susu();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/stok/susu/input');
    $this->load->view('templates/footer');

    }
}

function edit_susu_stok()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_stok();
      redirect('admin/stok_susu');
    } else {
      $data['title'] = 'Edit susu';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_susu()->result();
      $data['record'] = $this->Model_komoditas->get_id_stok($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/stok/susu/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_susu_stok()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_stok($id);
    redirect ('admin/stok_susu');
  }

  function stok_ikan()
  {
    $data['title'] = 'Stok ikan';
    $data['fields'] = $this->Model_komoditas->stok_ikan();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/stok/ikan/index');
    $this->load->view('templates/footer');
  }

  function ikan_post_stok()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $stok_awal = $_POST['stok_awal']; // Ambil data telp dan masukkan ke variabel telp
        $stok_akhir = $_POST['stok_akhir']; // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'stok_awal'=>$stok_awal[$index],
        'stok_akhir'=>$stok_akhir[$index], 
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_stok($data);
    redirect('admin/stok_ikan');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/stok_berpati');
    }
    else {
    $data['title'] = 'Tambah Data Stok';
    $data['fields'] = $this->Model_komoditas->input_ikan();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/stok/ikan/input');
    $this->load->view('templates/footer');

    }
}

function edit_ikan_stok()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_stok();
      redirect('admin/stok_ikan');
    } else {
      $data['title'] = 'Edit ikan';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_ikan()->result();
      $data['record'] = $this->Model_komoditas->get_id_stok($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/stok/ikan/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_ikan_stok()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_stok($id);
    redirect ('admin/stok_ikan');
  }

  function stok_minyak()
  {
    $data['title'] = 'Stok minyak';
    $data['fields'] = $this->Model_komoditas->stok_minyak();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/stok/minyak/index');
    $this->load->view('templates/footer');
  }

  function minyak_post_stok()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $stok_awal = $_POST['stok_awal']; // Ambil data telp dan masukkan ke variabel telp
        $stok_akhir = $_POST['stok_akhir']; // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'stok_awal'=>$stok_awal[$index],
        'stok_akhir'=>$stok_akhir[$index], 
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_stok($data);
    redirect('admin/stok_minyak');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/stok_berpati');
    }
    else {
    $data['title'] = 'Tambah Data Stok';
    $data['fields'] = $this->Model_komoditas->input_minyak();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/stok/minyak/input');
    $this->load->view('templates/footer');

    }
}

function edit_minyak_stok()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_stok();
      redirect('admin/stok_minyak');
    } else {
      $data['title'] = 'Edit minyak';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_minyak()->result();
      $data['record'] = $this->Model_komoditas->get_id_stok($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/stok/minyak/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_minyak_stok()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_stok($id);
    redirect ('admin/stok_minyak');
  }

  function impor_padi()
  {
    $data['title'] = 'Impor Padi';
    $data['fields'] = $this->Model_komoditas->impor_padi();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/impor/padi/index');
    $this->load->view('templates/footer');
  }

  function padi_post_impor()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $angka_impor = $_POST['angka_impor'];  // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'angka_impor'=>$angka_impor[$index],
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_impor($data);
    redirect('admin/impor_padi');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/impor_berpati');
    }
    else {
    $data['title'] = 'Tambah Data impor';
    $data['fields'] = $this->Model_komoditas->input_padi();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/impor/padi/input');
    $this->load->view('templates/footer');

    }
}

function edit_padi_impor()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_impor();
      redirect('admin/impor_padi');
    } else {
      $data['title'] = 'Edit Padi';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_padi()->result();
      $data['record'] = $this->Model_komoditas->get_id_impor($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/impor/padi/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_padi_impor()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_impor($id);
    redirect ('admin/impor_padi');
  }

  function impor_berpati()
  {
    $data['title'] = 'Impor berpati';
    $data['fields'] = $this->Model_komoditas->impor_berpati();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/impor/berpati/index');
    $this->load->view('templates/footer');
  }

  function berpati_post_impor()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $angka_impor = $_POST['angka_impor'];  // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'angka_impor'=>$angka_impor[$index],
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_impor($data);
    redirect('admin/impor_berpati');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/impor_berpati');
    }
    else {
    $data['title'] = 'Tambah Data impor';
    $data['fields'] = $this->Model_komoditas->input_berpati();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/impor/berpati/input');
    $this->load->view('templates/footer');

    }
}

function edit_berpati_impor()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_impor();
      redirect('admin/impor_berpati');
    } else {
      $data['title'] = 'Edit berpati';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_berpati()->result();
      $data['record'] = $this->Model_komoditas->get_id_impor($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/impor/berpati/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_berpati_impor()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_impor($id);
    redirect ('admin/impor_berpati');
  }

    function impor_gula()
  {
    $data['title'] = 'Impor gula';
    $data['fields'] = $this->Model_komoditas->impor_gula();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/impor/gula/index');
    $this->load->view('templates/footer');
  }

  function gula_post_impor()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $angka_impor = $_POST['angka_impor'];  // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'angka_impor'=>$angka_impor[$index],
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_impor($data);
    redirect('admin/impor_gula');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/impor_berpati');
    }
    else {
    $data['title'] = 'Tambah Data impor';
    $data['fields'] = $this->Model_komoditas->input_gula();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/impor/gula/input');
    $this->load->view('templates/footer');

    }
}

function edit_gula_impor()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_impor();
      redirect('admin/impor_gula');
    } else {
      $data['title'] = 'Edit gula';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_gula()->result();
      $data['record'] = $this->Model_komoditas->get_id_impor($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/impor/gula/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_gula_impor()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_impor($id);
    redirect ('admin/impor_gula');
  }

    function impor_biji()
  {
    $data['title'] = 'Impor biji';
    $data['fields'] = $this->Model_komoditas->impor_biji();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/impor/biji/index');
    $this->load->view('templates/footer');
  }

  function biji_post_impor()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $angka_impor = $_POST['angka_impor'];  // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'angka_impor'=>$angka_impor[$index],
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_impor($data);
    redirect('admin/impor_biji');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/impor_berpati');
    }
    else {
    $data['title'] = 'Tambah Data impor';
    $data['fields'] = $this->Model_komoditas->input_biji();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/impor/biji/input');
    $this->load->view('templates/footer');

    }
}

function edit_biji_impor()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_impor();
      redirect('admin/impor_biji');
    } else {
      $data['title'] = 'Edit biji';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_biji()->result();
      $data['record'] = $this->Model_komoditas->get_id_impor($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/impor/biji/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_biji_impor()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_impor($id);
    redirect ('admin/impor_biji');
  }

    function impor_buah()
  {
    $data['title'] = 'Impor buah';
    $data['fields'] = $this->Model_komoditas->impor_buah();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/impor/buah/index');
    $this->load->view('templates/footer');
  }

  function buah_post_impor()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $angka_impor = $_POST['angka_impor'];  // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'angka_impor'=>$angka_impor[$index],
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_impor($data);
    redirect('admin/impor_buah');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/impor_berpati');
    }
    else {
    $data['title'] = 'Tambah Data impor';
    $data['fields'] = $this->Model_komoditas->input_buah();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/impor/buah/input');
    $this->load->view('templates/footer');

    }
}

function edit_buah_impor()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_impor();
      redirect('admin/impor_buah');
    } else {
      $data['title'] = 'Edit buah';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_buah()->result();
      $data['record'] = $this->Model_komoditas->get_id_impor($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/impor/buah/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_buah_impor()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_impor($id);
    redirect ('admin/impor_buah');
  }

    function impor_sayur()
  {
    $data['title'] = 'Impor sayur';
    $data['fields'] = $this->Model_komoditas->impor_sayur();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/impor/sayur/index');
    $this->load->view('templates/footer');
  }

  function sayur_post_impor()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $angka_impor = $_POST['angka_impor'];  // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'angka_impor'=>$angka_impor[$index],
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_impor($data);
    redirect('admin/impor_sayur');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/impor_berpati');
    }
    else {
    $data['title'] = 'Tambah Data impor';
    $data['fields'] = $this->Model_komoditas->input_sayur();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/impor/sayur/input');
    $this->load->view('templates/footer');

    }
}

function edit_sayur_impor()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_impor();
      redirect('admin/impor_sayur');
    } else {
      $data['title'] = 'Edit sayur';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_sayur()->result();
      $data['record'] = $this->Model_komoditas->get_id_impor($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/impor/sayur/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_sayur_impor()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_impor($id);
    redirect ('admin/impor_sayur');
  }

    function impor_daging()
  {
    $data['title'] = 'Impor daging';
    $data['fields'] = $this->Model_komoditas->impor_daging();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/impor/daging/index');
    $this->load->view('templates/footer');
  }

  function daging_post_impor()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $angka_impor = $_POST['angka_impor'];  // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'angka_impor'=>$angka_impor[$index],
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_impor($data);
    redirect('admin/impor_daging');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/impor_berpati');
    }
    else {
    $data['title'] = 'Tambah Data impor';
    $data['fields'] = $this->Model_komoditas->input_daging();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/impor/daging/input');
    $this->load->view('templates/footer');

    }
}

function edit_daging_impor()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_impor();
      redirect('admin/impor_daging');
    } else {
      $data['title'] = 'Edit daging';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_daging()->result();
      $data['record'] = $this->Model_komoditas->get_id_impor($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/impor/daging/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_daging_impor()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_impor($id);
    redirect ('admin/impor_daging');
  }


    function impor_telur()
  {
    $data['title'] = 'Impor telur';
    $data['fields'] = $this->Model_komoditas->impor_telur();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/impor/telur/index');
    $this->load->view('templates/footer');
  }

  function telur_post_impor()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $angka_impor = $_POST['angka_impor'];  // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'angka_impor'=>$angka_impor[$index],
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_impor($data);
    redirect('admin/impor_telur');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/impor_berpati');
    }
    else {
    $data['title'] = 'Tambah Data impor';
    $data['fields'] = $this->Model_komoditas->input_telur();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/impor/telur/input');
    $this->load->view('templates/footer');

    }
}

function edit_telur_impor()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_impor();
      redirect('admin/impor_telur');
    } else {
      $data['title'] = 'Edit telur';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_telur()->result();
      $data['record'] = $this->Model_komoditas->get_id_impor($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/impor/telur/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_telur_impor()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_impor($id);
    redirect ('admin/impor_telur');
  }


    function impor_susu()
  {
    $data['title'] = 'Impor susu';
    $data['fields'] = $this->Model_komoditas->impor_susu();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/impor/susu/index');
    $this->load->view('templates/footer');
  }

  function susu_post_impor()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $angka_impor = $_POST['angka_impor'];  // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'angka_impor'=>$angka_impor[$index],
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_impor($data);
    redirect('admin/impor_susu');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/impor_berpati');
    }
    else {
    $data['title'] = 'Tambah Data impor';
    $data['fields'] = $this->Model_komoditas->input_susu();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/impor/susu/input');
    $this->load->view('templates/footer');

    }
}

function edit_susu_impor()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_impor();
      redirect('admin/impor_susu');
    } else {
      $data['title'] = 'Edit susu';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_susu()->result();
      $data['record'] = $this->Model_komoditas->get_id_impor($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/impor/susu/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_susu_impor()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_impor($id);
    redirect ('admin/impor_susu');
  }


    function impor_ikan()
  {
    $data['title'] = 'Impor ikan';
    $data['fields'] = $this->Model_komoditas->impor_ikan();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/impor/ikan/index');
    $this->load->view('templates/footer');
  }

  function ikan_post_impor()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $angka_impor = $_POST['angka_impor'];  // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'angka_impor'=>$angka_impor[$index],
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_impor($data);
    redirect('admin/impor_ikan');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/impor_berpati');
    }
    else {
    $data['title'] = 'Tambah Data impor';
    $data['fields'] = $this->Model_komoditas->input_ikan();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/impor/ikan/input');
    $this->load->view('templates/footer');

    }
}

function edit_ikan_impor()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_impor();
      redirect('admin/impor_ikan');
    } else {
      $data['title'] = 'Edit ikan';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_ikan()->result();
      $data['record'] = $this->Model_komoditas->get_id_impor($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/impor/ikan/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_ikan_impor()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_impor($id);
    redirect ('admin/impor_ikan');
  }

    function impor_minyak()
  {
    $data['title'] = 'Impor minyak';
    $data['fields'] = $this->Model_komoditas->impor_minyak();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/impor/minyak/index');
    $this->load->view('templates/footer');
  }

  function minyak_post_impor()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $angka_impor = $_POST['angka_impor'];  // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'angka_impor'=>$angka_impor[$index],
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_impor($data);
    redirect('admin/impor_minyak');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/impor_berpati');
    }
    else {
    $data['title'] = 'Tambah Data impor';
    $data['fields'] = $this->Model_komoditas->input_minyak();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/impor/minyak/input');
    $this->load->view('templates/footer');

    }
}

function edit_minyak_impor()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_impor();
      redirect('admin/impor_minyak');
    } else {
      $data['title'] = 'Edit minyak';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_minyak()->result();
      $data['record'] = $this->Model_komoditas->get_id_impor($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/impor/minyak/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_minyak_impor()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_impor($id);
    redirect ('admin/impor_minyak');
  }


  function ekspor_padi()
  {
    $data['title'] = 'Ekspor Padi';
    $data['fields'] = $this->Model_komoditas->ekspor_padi();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/ekspor/padi/index');
    $this->load->view('templates/footer');
  }

  function padi_post_ekspor()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $angka_ekspor = $_POST['angka_ekspor'];  // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'angka_ekspor'=>$angka_ekspor[$index],
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_ekspor($data);
    redirect('admin/ekspor_padi');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/ekspor_berpati');
    }
    else {
    $data['title'] = 'Tambah Data ekspor';
    $data['fields'] = $this->Model_komoditas->input_padi();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/ekspor/padi/input');
    $this->load->view('templates/footer');

    }
}

function edit_padi_ekspor()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_ekspor();
      redirect('admin/ekspor_padi');
    } else {
      $data['title'] = 'Edit Padi';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_padi()->result();
      $data['record'] = $this->Model_komoditas->get_id_ekspor($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/ekspor/padi/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_padi_ekspor()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_ekspor($id);
    redirect ('admin/ekspor_padi');
  }

function ekspor_berpati()
  {
    $data['title'] = 'Ekspor berpati';
    $data['fields'] = $this->Model_komoditas->ekspor_berpati();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/ekspor/berpati/index');
    $this->load->view('templates/footer');
  }

  function berpati_post_ekspor()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $angka_ekspor = $_POST['angka_ekspor'];  // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'angka_ekspor'=>$angka_ekspor[$index],
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_ekspor($data);
    redirect('admin/ekspor_berpati');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/ekspor_berpati');
    }
    else {
    $data['title'] = 'Tambah Data ekspor';
    $data['fields'] = $this->Model_komoditas->input_berpati();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/ekspor/berpati/input');
    $this->load->view('templates/footer');

    }
}

function edit_berpati_ekspor()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_ekspor();
      redirect('admin/ekspor_berpati');
    } else {
      $data['title'] = 'Edit berpati';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_berpati()->result();
      $data['record'] = $this->Model_komoditas->get_id_ekspor($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/ekspor/berpati/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_berpati_ekspor()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_ekspor($id);
    redirect ('admin/ekspor_berpati');
  }


  function ekspor_gula()
  {
    $data['title'] = 'Ekspor gula';
    $data['fields'] = $this->Model_komoditas->ekspor_gula();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/ekspor/gula/index');
    $this->load->view('templates/footer');
  }

  function gula_post_ekspor()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $angka_ekspor = $_POST['angka_ekspor'];  // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'angka_ekspor'=>$angka_ekspor[$index],
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_ekspor($data);
    redirect('admin/ekspor_gula');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/ekspor_berpati');
    }
    else {
    $data['title'] = 'Tambah Data ekspor';
    $data['fields'] = $this->Model_komoditas->input_gula();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/ekspor/gula/input');
    $this->load->view('templates/footer');

    }
}

function edit_gula_ekspor()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_ekspor();
      redirect('admin/ekspor_gula');
    } else {
      $data['title'] = 'Edit gula';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_gula()->result();
      $data['record'] = $this->Model_komoditas->get_id_ekspor($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/ekspor/gula/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_gula_ekspor()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_ekspor($id);
    redirect ('admin/ekspor_gula');
  }


function ekspor_biji()
  {
    $data['title'] = 'Ekspor biji';
    $data['fields'] = $this->Model_komoditas->ekspor_biji();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/ekspor/biji/index');
    $this->load->view('templates/footer');
  }

  function biji_post_ekspor()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $angka_ekspor = $_POST['angka_ekspor'];  // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'angka_ekspor'=>$angka_ekspor[$index],
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_ekspor($data);
    redirect('admin/ekspor_biji');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/ekspor_berpati');
    }
    else {
    $data['title'] = 'Tambah Data ekspor';
    $data['fields'] = $this->Model_komoditas->input_biji();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/ekspor/biji/input');
    $this->load->view('templates/footer');

    }
}

function edit_biji_ekspor()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_ekspor();
      redirect('admin/ekspor_biji');
    } else {
      $data['title'] = 'Edit biji';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_biji()->result();
      $data['record'] = $this->Model_komoditas->get_id_ekspor($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/ekspor/biji/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_biji_ekspor()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_ekspor($id);
    redirect ('admin/ekspor_biji');
  }

function ekspor_buah()
  {
    $data['title'] = 'Ekspor buah';
    $data['fields'] = $this->Model_komoditas->ekspor_buah();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/ekspor/buah/index');
    $this->load->view('templates/footer');
  }

  function buah_post_ekspor()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $angka_ekspor = $_POST['angka_ekspor'];  // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'angka_ekspor'=>$angka_ekspor[$index],
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_ekspor($data);
    redirect('admin/ekspor_buah');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/ekspor_berpati');
    }
    else {
    $data['title'] = 'Tambah Data ekspor';
    $data['fields'] = $this->Model_komoditas->input_buah();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/ekspor/buah/input');
    $this->load->view('templates/footer');

    }
}

function edit_buah_ekspor()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_ekspor();
      redirect('admin/ekspor_buah');
    } else {
      $data['title'] = 'Edit buah';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_buah()->result();
      $data['record'] = $this->Model_komoditas->get_id_ekspor($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/ekspor/buah/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_buah_ekspor()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_ekspor($id);
    redirect ('admin/ekspor_buah');
  }

function ekspor_sayur()
  {
    $data['title'] = 'Ekspor sayur';
    $data['fields'] = $this->Model_komoditas->ekspor_sayur();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/ekspor/sayur/index');
    $this->load->view('templates/footer');
  }

  function sayur_post_ekspor()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $angka_ekspor = $_POST['angka_ekspor'];  // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'angka_ekspor'=>$angka_ekspor[$index],
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_ekspor($data);
    redirect('admin/ekspor_sayur');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/ekspor_berpati');
    }
    else {
    $data['title'] = 'Tambah Data ekspor';
    $data['fields'] = $this->Model_komoditas->input_sayur();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/ekspor/sayur/input');
    $this->load->view('templates/footer');

    }
}

function edit_sayur_ekspor()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_ekspor();
      redirect('admin/ekspor_sayur');
    } else {
      $data['title'] = 'Edit sayur';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_sayur()->result();
      $data['record'] = $this->Model_komoditas->get_id_ekspor($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/ekspor/sayur/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_sayur_ekspor()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_ekspor($id);
    redirect ('admin/ekspor_sayur');
  }

function ekspor_daging()
  {
    $data['title'] = 'Ekspor daging';
    $data['fields'] = $this->Model_komoditas->ekspor_daging();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/ekspor/daging/index');
    $this->load->view('templates/footer');
  }

  function daging_post_ekspor()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $angka_ekspor = $_POST['angka_ekspor'];  // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'angka_ekspor'=>$angka_ekspor[$index],
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_ekspor($data);
    redirect('admin/ekspor_daging');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/ekspor_berpati');
    }
    else {
    $data['title'] = 'Tambah Data ekspor';
    $data['fields'] = $this->Model_komoditas->input_daging();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/ekspor/daging/input');
    $this->load->view('templates/footer');

    }
}

function edit_daging_ekspor()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_ekspor();
      redirect('admin/ekspor_daging');
    } else {
      $data['title'] = 'Edit daging';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_daging()->result();
      $data['record'] = $this->Model_komoditas->get_id_ekspor($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/ekspor/daging/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_daging_ekspor()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_ekspor($id);
    redirect ('admin/ekspor_daging');
  }

function ekspor_telur()
  {
    $data['title'] = 'Ekspor telur';
    $data['fields'] = $this->Model_komoditas->ekspor_telur();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/ekspor/telur/index');
    $this->load->view('templates/footer');
  }

  function telur_post_ekspor()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $angka_ekspor = $_POST['angka_ekspor'];  // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'angka_ekspor'=>$angka_ekspor[$index],
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_ekspor($data);
    redirect('admin/ekspor_telur');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/ekspor_berpati');
    }
    else {
    $data['title'] = 'Tambah Data ekspor';
    $data['fields'] = $this->Model_komoditas->input_telur();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/ekspor/telur/input');
    $this->load->view('templates/footer');

    }
}

function edit_telur_ekspor()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_ekspor();
      redirect('admin/ekspor_telur');
    } else {
      $data['title'] = 'Edit telur';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_telur()->result();
      $data['record'] = $this->Model_komoditas->get_id_ekspor($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/ekspor/telur/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_telur_ekspor()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_ekspor($id);
    redirect ('admin/ekspor_telur');
  }

function ekspor_susu()
  {
    $data['title'] = 'Ekspor susu';
    $data['fields'] = $this->Model_komoditas->ekspor_susu();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/ekspor/susu/index');
    $this->load->view('templates/footer');
  }

  function susu_post_ekspor()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $angka_ekspor = $_POST['angka_ekspor'];  // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'angka_ekspor'=>$angka_ekspor[$index],
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_ekspor($data);
    redirect('admin/ekspor_susu');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/ekspor_berpati');
    }
    else {
    $data['title'] = 'Tambah Data ekspor';
    $data['fields'] = $this->Model_komoditas->input_susu();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/ekspor/susu/input');
    $this->load->view('templates/footer');

    }
}

function edit_susu_ekspor()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_ekspor();
      redirect('admin/ekspor_susu');
    } else {
      $data['title'] = 'Edit susu';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_susu()->result();
      $data['record'] = $this->Model_komoditas->get_id_ekspor($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/ekspor/susu/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_susu_ekspor()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_ekspor($id);
    redirect ('admin/ekspor_susu');
  }

function ekspor_ikan()
  {
    $data['title'] = 'Ekspor ikan';
    $data['fields'] = $this->Model_komoditas->ekspor_ikan();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/ekspor/ikan/index');
    $this->load->view('templates/footer');
  }

  function ikan_post_ekspor()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $angka_ekspor = $_POST['angka_ekspor'];  // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'angka_ekspor'=>$angka_ekspor[$index],
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_ekspor($data);
    redirect('admin/ekspor_ikan');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/ekspor_berpati');
    }
    else {
    $data['title'] = 'Tambah Data ekspor';
    $data['fields'] = $this->Model_komoditas->input_ikan();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/ekspor/ikan/input');
    $this->load->view('templates/footer');

    }
}

function edit_ikan_ekspor()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_ekspor();
      redirect('admin/ekspor_ikan');
    } else {
      $data['title'] = 'Edit ikan';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_ikan()->result();
      $data['record'] = $this->Model_komoditas->get_id_ekspor($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/ekspor/ikan/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_ikan_ekspor()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_ekspor($id);
    redirect ('admin/ekspor_ikan');
  }

function ekspor_minyak()
  {
    $data['title'] = 'Ekspor minyak';
    $data['fields'] = $this->Model_komoditas->ekspor_minyak();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/ekspor/minyak/index');
    $this->load->view('templates/footer');
  }

  function minyak_post_ekspor()
{
    if (isset($_POST['submit'])) {
        $id_komoditas = $_POST['id_komoditas'];
        $angka_ekspor = $_POST['angka_ekspor'];  // Ambil data alamat dan masukkan ke variabel alamat
        $konversi = $_POST['konversi']; 
        $tahun = $_POST['tahun']; // Ambil data alamat dan masukkan ke variabel alamat
        $quartal = $_POST['quartal']; // Ambil data alamat dan masukkan ke variabel alamat
        $status = $_POST['status']; // Ambil data alamat dan masukkan ke variabel alamat
        $komoditas = $_POST['komoditas'];
        $data = array();
    
    $index = 0; // Set index array awal dengan 0
    foreach($id_komoditas as $datakomoditas){ // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_komoditas'=>$datakomoditas,
        'angka_ekspor'=>$angka_ekspor[$index],
        'konversi'=>$konversi[$index], 
        'tahun'=>$tahun, 
        'quartal'=>$quartal, 
        'status'=>$status,  // Ambil dan set data nama sesuai index array dari $index
      ));
      
      $index++;
    }
    
    $sql = $this->Model_komoditas->input_ekspor($data);
    redirect('admin/ekspor_minyak');
    }
    elseif (isset($_POST['next'])) {
    redirect('admin/ekspor_berpati');
    }
    else {
    $data['title'] = 'Tambah Data ekspor';
    $data['fields'] = $this->Model_komoditas->input_minyak();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/ekspor/minyak/input');
    $this->load->view('templates/footer');

    }
}

function edit_minyak_ekspor()
  {
      if (isset($_POST['submit'])) {
      $this->Model_komoditas->edit_ekspor();
      redirect('admin/ekspor_minyak');
    } else {
      $data['title'] = 'Edit minyak';
      $id = $this->uri->segment(3);
      $data['fields'] = $this->Model_komoditas->input_minyak()->result();
      $data['record'] = $this->Model_komoditas->get_id_ekspor($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav'); 
      $this->template->load('templates','admin/ekspor/minyak/edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus_minyak_ekspor()
  {
    $id = $this->uri->segment(3);
    $this->Model_komoditas->hapus_ekspor($id);
    redirect ('admin/ekspor_minyak');
  }


  

}


?>