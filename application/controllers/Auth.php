<?php

class Auth extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('model_user');
  }
  function login()
  {
    if (isset($_POST['submit'])) {
            $data = array( 'username' => $this->input->post('username'),
                           'password' => md5($this->input->post('password'))
           );
      $this->load->model('model_user');      
      $hasil = $this->model_user->login($data);
      if ($hasil->num_rows() == 1) {
    foreach ($hasil->result() as $sess) {
    $sess_data['status_login'] = 'oke';
    $sess_data['username'] = $sess->username;
    $sess_data['level'] = $sess->level;
    $sess_data['lokasi'] = $sess->lokasi;
    $this->db->update('users',array('login_terakhir'=>date('Y-m-d')));
    $this->session->set_userdata($sess_data);
    redirect('dashboard');
    }
  } 
    else {
      $this->session->set_flashdata('message', 'Username atau Password Salah !!!');
      $this->session->set_flashdata('form', 'has-error');
      redirect('auth/login');
      }
    } 
  else {
      check_session_login();
      $this->load->view('templates/header');
      $this->load->view('form_login');
      $this->load->view('templates/footer');
    }
  }
  function logout()
  {
    $this->session->sess_destroy();
    redirect('auth/login');
  }
}

