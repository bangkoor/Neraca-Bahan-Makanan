<?php

/**
 *
 */
class Model_menu extends CI_Model
{

  function menu()
  {
    $query = 'SELECT menu.nama_menu, menu.level, sub_menu.nama_menu as submenu
              FROM menu
              INNER JOIN sub_menu ON menu.id_menu = sub_menu.id_menu';
    return $this->db->query($query);
  }
}
