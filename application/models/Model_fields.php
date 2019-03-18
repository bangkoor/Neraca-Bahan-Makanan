<?php

/**
 *
 */
class Model_fields extends CI_Model
{

  function padi()
  {
     $param = array('jenis'=>'padi');
    return $this->db->get_where('fields',$param);
  }

  function berpati()
  {
     $param = array('jenis'=>'berpati');
    return $this->db->get_where('fields',$param);
  }

  function gula()
  {
     $param = array('jenis'=>'gula');
    return $this->db->get_where('fields',$param);
  }

  function biji()
  {
     $param = array('jenis'=>'biji');
    return $this->db->get_where('fields',$param);
  }

  function buah()
  {
     $param = array('jenis'=>'buah');
    return $this->db->get_where('fields',$param);
  }

  function sayur()
  {
     $param = array('jenis'=>'sayur');
    return $this->db->get_where('fields',$param);
  }

  function daging()
  {
     $param = array('jenis'=>'daging');
    return $this->db->get_where('fields',$param);
  }

  function telur()
  {
     $param = array('jenis'=>'telur');
    return $this->db->get_where('fields',$param);
  }

  function susu()
  {
     $param = array('jenis'=>'susu');
    return $this->db->get_where('fields',$param);
  }

  function ikan()
  {
     $param = array('jenis'=>'ikan');
    return $this->db->get_where('fields',$param);
  }

  function minyak()
  {
     $param = array('jenis'=>'minyak');
    return $this->db->get_where('fields',$param);
  }
  
}
