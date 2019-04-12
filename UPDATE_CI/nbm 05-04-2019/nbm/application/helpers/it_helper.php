<?php

function check_session()
{
  $ci = & get_instance();
  $session = $ci->session->userdata('status_login');
  if ($session!='oke') {
    redirect ('auth/login');
  }
}

function check_session_login()
{
  $ci = & get_instance();
  $session = $ci->session->userdata('status_login');
  if ($session=='oke') {
    redirect ('dashboard');
  }

}

