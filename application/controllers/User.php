<?php

class User extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Model_user');
    check_session();
  }
  function index()
  {
    $data['title'] = 'Manajemen User';
    $data['record'] = $this->Model_user->tampilkan_data();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topnav'); 
    $this->template->load('templates','admin/user/lihat_data',$data);
    $this->load->view('templates/footer');
  }

  function post()
  {
    if (isset($_POST['submit'])) {
      $this->Model_user->post();
      redirect('user');
    } else {
      $data['title'] = 'Tambah Kelola User';
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav');
      $this->template->load('templates','admin/user/form_input',$data);
      $this->load->view('templates/footer');
    }
  }

  function edit()
  {
    if (isset($_POST['submit'])) {
      $this->Model_user->edit();
      redirect('user');
    } else {
      $data['title'] = 'Edit Kelola User';
      $id = $this->uri->segment(3);
	    $data['record'] = $this->Model_user->get_user($id)->row_array();
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topnav');
      $this->template->load('templates','admin/user/form_edit',$data);
      $this->load->view('templates/footer');
    }
  }

  function hapus()
  {
    $id = $this->uri->segment(3);
    $this->Model_kelola_user->hapus($id);
    redirect ('user');
  }

    function verifikasi_hapus($id_user){
    $id_kelola = $this->uri->segment(3);
    $data = array('status' => 'Pending');
    $this->db->where('id_user', $id_user);
    $update = $this->db->update('user',$data);
    if($update) {
      redirect('user');
    }
  }

}
