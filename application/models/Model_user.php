<?php

/**
 *
 */
class Model_user extends CI_Model
{

  function login($data)
  {
    $query = $this->db->get_where('users',$data);
    return $query;
  }
  function tampilkan_data()
  {
    return $this->db->get('users');
  }

   function post()
  {
      $username = $this->input->post('username',true);
      $password = $this->input->post('password',true);
      $level = $this->input->post('level',true);
      $data = array('username'     => $username,
                    'password'     => md5($password),
                    'level'        => $level
                  );
      $this->db->insert('users',$data);
  }

  function get_user($id)
  {
    $param = array('id_user'=>$id);
    return $this->db->get_where('users',$param);
  }

  function edit()
  {
      $id       = $this->input->post('id_user',true);
      $username = $this->input->post('username',true);
      $password = $this->input->post('password',true);
      $level = $this->input->post('level',true);
        if (empty($password)) {
          $data = array('username'     => $username,
                        'level'     => $level
                      );
        } else {
          $data = array('username'     => $username,
                        'password'     => md5($password),
                        'level'        => $level
                      );
        }

      $this->db->where('id_users',$this->input->post('id_user'));
      $this->db->update('user',$data);
  }

  function hapus($id)
  {
    $this->db->where('id_user', $id);
    $this->db->delete('users');
  }
}
