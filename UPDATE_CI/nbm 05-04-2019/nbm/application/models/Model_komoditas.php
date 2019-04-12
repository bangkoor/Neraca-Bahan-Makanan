<?php

/**
 *
 */
class Model_komoditas extends CI_Model
{

 function input_produksi($data){
    return $this->db->insert_batch('produksi', $data);
  }

function get_id_produksi($id)
  {
    $param = array('id_produksi'=>$id);
    return $this->db->get_where('produksi',$param);
  }

  function edit_produksi()
  {
  $data = array('produksi_kotor' => $this->input->post('produksi_kotor'),
                'luas_panen' => $this->input->post('luas_panen'),
                'konversi' => $this->input->post('konversi'));

    $this->db->where('id_produksi', $this->input->post('id_produksi'));
    $this->db->update('produksi',$data);

  }

  function hapus_produksi($id)
  {
    $this->db->where('id_produksi', $id);
    $this->db->delete('produksi');
  }

function input_padi()
  {
     $param = array('jenis'=>'padi');
    return $this->db->get_where('komoditas',$param);
  }

  function produksi_padi()
  {
     $query = "SELECT produksi.id_produksi, produksi.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, produksi.produksi_kotor, produksi.luas_panen, produksi.quartal, produksi.status, produksi.tahun
FROM komoditas
INNER JOIN produksi on komoditas.id_komoditas = produksi.id_komoditas
WHERE komoditas.jenis = 'padi'
ORDER BY produksi.id_produksi ASC
              ";

    return $this->db->query($query);
  }

  function input_berpati()
  {
     $param = array('jenis'=>'berpati');
    return $this->db->get_where('komoditas',$param);
  }

  function produksi_berpati()
  {
     $query = "SELECT produksi.id_produksi, produksi.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, produksi.produksi_kotor, produksi.luas_panen, produksi.quartal, produksi.status, produksi.tahun
FROM komoditas
INNER JOIN produksi on komoditas.id_komoditas = produksi.id_komoditas
WHERE komoditas.jenis = 'berpati'
ORDER BY produksi.id_produksi ASC
              ";

    return $this->db->query($query);
  }

  function input_gula()
  {
     $param = array('jenis'=>'gula');
    return $this->db->get_where('komoditas',$param);
  }

  function produksi_gula()
  {
     $query = "SELECT produksi.id_produksi, produksi.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, produksi.produksi_kotor, produksi.luas_panen, produksi.quartal, produksi.status, produksi.tahun
FROM komoditas
INNER JOIN produksi on komoditas.id_komoditas = produksi.id_komoditas
WHERE komoditas.jenis = 'gula'
ORDER BY produksi.id_produksi ASC
              ";

    return $this->db->query($query);
  }

  function input_biji()
  {
     $param = array('jenis'=>'biji');
    return $this->db->get_where('komoditas',$param);
  }

  function produksi_biji()
  {
     $query = "SELECT produksi.id_produksi, produksi.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, produksi.produksi_kotor, produksi.luas_panen, produksi.quartal, produksi.status, produksi.tahun
FROM komoditas
INNER JOIN produksi on komoditas.id_komoditas = produksi.id_komoditas
WHERE komoditas.jenis = 'biji'
ORDER BY produksi.id_produksi ASC
              ";

    return $this->db->query($query);
  }

function input_buah()
  {
     $param = array('jenis'=>'buah');
    return $this->db->get_where('komoditas',$param);
  }

  function produksi_buah()
  {
     $query = "SELECT produksi.id_produksi, produksi.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, produksi.produksi_kotor, produksi.luas_panen, produksi.quartal, produksi.status, produksi.tahun
FROM komoditas
INNER JOIN produksi on komoditas.id_komoditas = produksi.id_komoditas
WHERE komoditas.jenis = 'buah'
ORDER BY produksi.id_produksi ASC
              ";

    return $this->db->query($query);
  }

function input_sayur()
  {
     $param = array('jenis'=>'sayur');
    return $this->db->get_where('komoditas',$param);
  }

  function produksi_sayur()
  {
     $query = "SELECT produksi.id_produksi, produksi.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, produksi.produksi_kotor, produksi.luas_panen, produksi.quartal, produksi.status, produksi.tahun
FROM komoditas
INNER JOIN produksi on komoditas.id_komoditas = produksi.id_komoditas
WHERE komoditas.jenis = 'sayur'
ORDER BY produksi.id_produksi ASC
              ";

    return $this->db->query($query);
  }

  function input_daging()
  {
     $param = array('jenis'=>'daging');
    return $this->db->get_where('komoditas',$param);
  }

  function produksi_daging()
  {
     $query = "SELECT produksi.id_produksi, produksi.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, produksi.produksi_kotor, produksi.luas_panen, produksi.quartal, produksi.status, produksi.tahun
FROM komoditas
INNER JOIN produksi on komoditas.id_komoditas = produksi.id_komoditas
WHERE komoditas.jenis = 'daging'
ORDER BY produksi.id_produksi ASC
              ";

    return $this->db->query($query);
  }

  function input_telur()
  {
     $param = array('jenis'=>'telur');
    return $this->db->get_where('komoditas',$param);
  }

  function produksi_telur()
  {
     $query = "SELECT produksi.id_produksi, produksi.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, produksi.produksi_kotor, produksi.luas_panen, produksi.quartal, produksi.status, produksi.tahun
FROM komoditas
INNER JOIN produksi on komoditas.id_komoditas = produksi.id_komoditas
WHERE komoditas.jenis = 'telur'
ORDER BY produksi.id_produksi ASC
              ";

    return $this->db->query($query);
  }

  function input_susu()
  {
     $param = array('jenis'=>'susu');
    return $this->db->get_where('komoditas',$param);
  }

  function produksi_susu()
  {
     $query = "SELECT produksi.id_produksi, produksi.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, produksi.produksi_kotor, produksi.luas_panen, produksi.quartal, produksi.status, produksi.tahun
FROM komoditas
INNER JOIN produksi on komoditas.id_komoditas = produksi.id_komoditas
WHERE komoditas.jenis = 'susu'
ORDER BY produksi.id_produksi ASC
              ";

    return $this->db->query($query);
  }

  function input_ikan()
  {
     $param = array('jenis'=>'ikan');
    return $this->db->get_where('komoditas',$param);
  }

  function produksi_ikan()
  {
     $query = "SELECT produksi.id_produksi, produksi.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, produksi.produksi_kotor, produksi.luas_panen, produksi.quartal, produksi.status, produksi.tahun
FROM komoditas
INNER JOIN produksi on komoditas.id_komoditas = produksi.id_komoditas
WHERE komoditas.jenis = 'ikan'
ORDER BY produksi.id_produksi ASC
              ";

    return $this->db->query($query);
  }

  function input_minyak()
  {
     $param = array('jenis'=>'minyak');
    return $this->db->get_where('komoditas',$param);
  }

  function produksi_minyak()
  {
     $query = "SELECT produksi.id_produksi, produksi.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, produksi.produksi_kotor, produksi.luas_panen, produksi.quartal, produksi.status, produksi.tahun
FROM komoditas
INNER JOIN produksi on komoditas.id_komoditas = produksi.id_komoditas
WHERE komoditas.jenis = 'minyak'
ORDER BY produksi.id_produksi ASC
              ";

    return $this->db->query($query);
  }


  function stok_padi()
  {
     $query = "SELECT stok.id_stok, stok.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, stok.stok_awal, stok.stok_akhir, stok.quartal, stok.status, stok.tahun
FROM komoditas
INNER JOIN stok on komoditas.id_komoditas = stok.id_komoditas
WHERE komoditas.jenis = 'padi'
ORDER BY stok.id_stok ASC
              ";

    return $this->db->query($query);
  }

  function edit_stok()
  {
  $data = array('stok_awal' => $this->input->post('stok_awal'),
                'stok_akhir' => $this->input->post('stok_akhir'),
                'konversi' => $this->input->post('konversi'));

    $this->db->where('id_stok', $this->input->post('id_stok'));
    $this->db->update('stok',$data);

  }

  function get_id_stok($id)
  {
    $param = array('id_stok'=>$id);
    return $this->db->get_where('stok',$param);
  }

  function input_stok($data){
    return $this->db->insert_batch('stok', $data);
  }

  function hapus_stok($id)
  {
    $this->db->where('id_stok', $id);
    $this->db->delete('stok');
  }


  function stok_berpati()
  {
     $query = "SELECT stok.id_stok, stok.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, stok.stok_awal, stok.stok_akhir, stok.quartal, stok.status, stok.tahun
FROM komoditas
INNER JOIN stok on komoditas.id_komoditas = stok.id_komoditas
WHERE komoditas.jenis = 'berpati'
ORDER BY stok.id_stok ASC
              ";

    return $this->db->query($query);
  }


  function stok_gula()
  {
     $query = "SELECT stok.id_stok, stok.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, stok.stok_awal, stok.stok_akhir, stok.quartal, stok.status, stok.tahun
FROM komoditas
INNER JOIN stok on komoditas.id_komoditas = stok.id_komoditas
WHERE komoditas.jenis = 'gula'
ORDER BY stok.id_stok ASC
              ";

    return $this->db->query($query);
  }

  function stok_biji()
  {
     $query = "SELECT stok.id_stok, stok.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, stok.stok_awal, stok.stok_akhir, stok.quartal, stok.status, stok.tahun
FROM komoditas
INNER JOIN stok on komoditas.id_komoditas = stok.id_komoditas
WHERE komoditas.jenis = 'biji'
ORDER BY stok.id_stok ASC
              ";

    return $this->db->query($query);
  }

  function stok_buah()
  {
     $query = "SELECT stok.id_stok, stok.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, stok.stok_awal, stok.stok_akhir, stok.quartal, stok.status, stok.tahun
FROM komoditas
INNER JOIN stok on komoditas.id_komoditas = stok.id_komoditas
WHERE komoditas.jenis = 'buah'
ORDER BY stok.id_stok ASC
              ";

    return $this->db->query($query);
  }

  function stok_sayur()
  {
     $query = "SELECT stok.id_stok, stok.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, stok.stok_awal, stok.stok_akhir, stok.quartal, stok.status, stok.tahun
FROM komoditas
INNER JOIN stok on komoditas.id_komoditas = stok.id_komoditas
WHERE komoditas.jenis = 'sayur'
ORDER BY stok.id_stok ASC
              ";

    return $this->db->query($query);
  }

  function stok_daging()
  {
     $query = "SELECT stok.id_stok, stok.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, stok.stok_awal, stok.stok_akhir, stok.quartal, stok.status, stok.tahun
FROM komoditas
INNER JOIN stok on komoditas.id_komoditas = stok.id_komoditas
WHERE komoditas.jenis = 'daging'
ORDER BY stok.id_stok ASC
              ";

    return $this->db->query($query);
  }

function stok_telur()
  {
     $query = "SELECT stok.id_stok, stok.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, stok.stok_awal, stok.stok_akhir, stok.quartal, stok.status, stok.tahun
FROM komoditas
INNER JOIN stok on komoditas.id_komoditas = stok.id_komoditas
WHERE komoditas.jenis = 'telur'
ORDER BY stok.id_stok ASC
              ";

    return $this->db->query($query);
  }

  function stok_susu()
  {
     $query = "SELECT stok.id_stok, stok.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, stok.stok_awal, stok.stok_akhir, stok.quartal, stok.status, stok.tahun
FROM komoditas
INNER JOIN stok on komoditas.id_komoditas = stok.id_komoditas
WHERE komoditas.jenis = 'susu'
ORDER BY stok.id_stok ASC
              ";

    return $this->db->query($query);
  }

  function stok_ikan()
  {
     $query = "SELECT stok.id_stok, stok.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, stok.stok_awal, stok.stok_akhir, stok.quartal, stok.status, stok.tahun
FROM komoditas
INNER JOIN stok on komoditas.id_komoditas = stok.id_komoditas
WHERE komoditas.jenis = 'ikan'
ORDER BY stok.id_stok ASC
              ";

    return $this->db->query($query);
  }

function stok_minyak()
  {
     $query = "SELECT stok.id_stok, stok.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, stok.stok_awal, stok.stok_akhir, stok.quartal, stok.status, stok.tahun
FROM komoditas
INNER JOIN stok on komoditas.id_komoditas = stok.id_komoditas
WHERE komoditas.jenis = 'minyak'
ORDER BY stok.id_stok ASC
              ";

    return $this->db->query($query);
  }

function impor_padi()
  {
     $query = "SELECT impor.id_impor, impor.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, impor.angka_impor, impor.quartal, impor.status, impor.tahun
FROM komoditas
INNER JOIN impor on komoditas.id_komoditas = impor.id_komoditas
WHERE komoditas.jenis = 'padi'
ORDER BY impor.id_impor ASC
              ";

    return $this->db->query($query);
  }

  function impor_berpati()
  {
     $query = "SELECT impor.id_impor, impor.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, impor.angka_impor, impor.quartal, impor.status, impor.tahun
FROM komoditas
INNER JOIN impor on komoditas.id_komoditas = impor.id_komoditas
WHERE komoditas.jenis = 'berpati'
ORDER BY impor.id_impor ASC
              ";

    return $this->db->query($query);
  }

  function impor_gula()
  {
     $query = "SELECT impor.id_impor, impor.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, impor.angka_impor, impor.quartal, impor.status, impor.tahun
FROM komoditas
INNER JOIN impor on komoditas.id_komoditas = impor.id_komoditas
WHERE komoditas.jenis = 'gula'
ORDER BY impor.id_impor ASC
              ";

    return $this->db->query($query);
  }

  function impor_biji()
  {
     $query = "SELECT impor.id_impor, impor.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, impor.angka_impor, impor.quartal, impor.status, impor.tahun
FROM komoditas
INNER JOIN impor on komoditas.id_komoditas = impor.id_komoditas
WHERE komoditas.jenis = 'biji'
ORDER BY impor.id_impor ASC
              ";

    return $this->db->query($query);
  }

  function impor_buah()
  {
     $query = "SELECT impor.id_impor, impor.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, impor.angka_impor, impor.quartal, impor.status, impor.tahun
FROM komoditas
INNER JOIN impor on komoditas.id_komoditas = impor.id_komoditas
WHERE komoditas.jenis = 'buah'
ORDER BY impor.id_impor ASC
              ";

    return $this->db->query($query);
  }

  function impor_sayur()
  {
     $query = "SELECT impor.id_impor, impor.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, impor.angka_impor, impor.quartal, impor.status, impor.tahun
FROM komoditas
INNER JOIN impor on komoditas.id_komoditas = impor.id_komoditas
WHERE komoditas.jenis = 'sayur'
ORDER BY impor.id_impor ASC
              ";

    return $this->db->query($query);
  }

  function impor_daging()
  {
     $query = "SELECT impor.id_impor, impor.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, impor.angka_impor, impor.quartal, impor.status, impor.tahun
FROM komoditas
INNER JOIN impor on komoditas.id_komoditas = impor.id_komoditas
WHERE komoditas.jenis = 'daging'
ORDER BY impor.id_impor ASC
              ";

    return $this->db->query($query);
  }

  function impor_telur()
  {
     $query = "SELECT impor.id_impor, impor.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, impor.angka_impor, impor.quartal, impor.status, impor.tahun
FROM komoditas
INNER JOIN impor on komoditas.id_komoditas = impor.id_komoditas
WHERE komoditas.jenis = 'telur'
ORDER BY impor.id_impor ASC
              ";

    return $this->db->query($query);
  }

  function impor_susu()
  {
     $query = "SELECT impor.id_impor, impor.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, impor.angka_impor, impor.quartal, impor.status, impor.tahun
FROM komoditas
INNER JOIN impor on komoditas.id_komoditas = impor.id_komoditas
WHERE komoditas.jenis = 'susu'
ORDER BY impor.id_impor ASC
              ";

    return $this->db->query($query);
  }

  function impor_ikan()
  {
     $query = "SELECT impor.id_impor, impor.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, impor.angka_impor, impor.quartal, impor.status, impor.tahun
FROM komoditas
INNER JOIN impor on komoditas.id_komoditas = impor.id_komoditas
WHERE komoditas.jenis = 'ikan'
ORDER BY impor.id_impor ASC
              ";

    return $this->db->query($query);
  }

  function impor_minyak()
  {
     $query = "SELECT impor.id_impor, impor.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, impor.angka_impor, impor.quartal, impor.status, impor.tahun
FROM komoditas
INNER JOIN impor on komoditas.id_komoditas = impor.id_komoditas
WHERE komoditas.jenis = 'minyak'
ORDER BY impor.id_impor ASC
              ";

    return $this->db->query($query);
  }

  function edit_impor()
  {
  $data = array('angka_impor' => $this->input->post('angka_impor'),
                'konversi' => $this->input->post('konversi'));

    $this->db->where('id_impor', $this->input->post('id_impor'));
    $this->db->update('impor',$data);

  }

  function get_id_impor($id)
  {
    $param = array('id_impor'=>$id);
    return $this->db->get_where('impor',$param);
  }

  function input_impor($data){
    return $this->db->insert_batch('impor', $data);
  }

  function hapus_impor($id)
  {
    $this->db->where('id_impor', $id);
    $this->db->delete('impor');
  }



  function ekspor_padi()
  {
     $query = "SELECT ekspor.id_ekspor, ekspor.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, ekspor.angka_ekspor, ekspor.quartal, ekspor.status, ekspor.tahun
FROM komoditas
INNER JOIN ekspor on komoditas.id_komoditas = ekspor.id_komoditas
WHERE komoditas.jenis = 'padi'
ORDER BY ekspor.id_ekspor ASC
              ";

    return $this->db->query($query);
  }

  function ekspor_berpati()
  {
     $query = "SELECT ekspor.id_ekspor, ekspor.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, ekspor.angka_ekspor, ekspor.quartal, ekspor.status, ekspor.tahun
FROM komoditas
INNER JOIN ekspor on komoditas.id_komoditas = ekspor.id_komoditas
WHERE komoditas.jenis = 'berpati'
ORDER BY ekspor.id_ekspor ASC
              ";

    return $this->db->query($query);
  }

  function ekspor_gula()
  {
     $query = "SELECT ekspor.id_ekspor, ekspor.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, ekspor.angka_ekspor, ekspor.quartal, ekspor.status, ekspor.tahun
FROM komoditas
INNER JOIN ekspor on komoditas.id_komoditas = ekspor.id_komoditas
WHERE komoditas.jenis = 'gula'
ORDER BY ekspor.id_ekspor ASC
              ";

    return $this->db->query($query);
  }

  function ekspor_biji()
  {
     $query = "SELECT ekspor.id_ekspor, ekspor.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, ekspor.angka_ekspor, ekspor.quartal, ekspor.status, ekspor.tahun
FROM komoditas
INNER JOIN ekspor on komoditas.id_komoditas = ekspor.id_komoditas
WHERE komoditas.jenis = 'biji'
ORDER BY ekspor.id_ekspor ASC
              ";

    return $this->db->query($query);
  }

  function ekspor_buah()
  {
     $query = "SELECT ekspor.id_ekspor, ekspor.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, ekspor.angka_ekspor, ekspor.quartal, ekspor.status, ekspor.tahun
FROM komoditas
INNER JOIN ekspor on komoditas.id_komoditas = ekspor.id_komoditas
WHERE komoditas.jenis = 'buah'
ORDER BY ekspor.id_ekspor ASC
              ";

    return $this->db->query($query);
  }

  function ekspor_sayur()
  {
     $query = "SELECT ekspor.id_ekspor, ekspor.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, ekspor.angka_ekspor, ekspor.quartal, ekspor.status, ekspor.tahun
FROM komoditas
INNER JOIN ekspor on komoditas.id_komoditas = ekspor.id_komoditas
WHERE komoditas.jenis = 'sayur'
ORDER BY ekspor.id_ekspor ASC
              ";

    return $this->db->query($query);
  }

  function ekspor_daging()
  {
     $query = "SELECT ekspor.id_ekspor, ekspor.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, ekspor.angka_ekspor, ekspor.quartal, ekspor.status, ekspor.tahun
FROM komoditas
INNER JOIN ekspor on komoditas.id_komoditas = ekspor.id_komoditas
WHERE komoditas.jenis = 'daging'
ORDER BY ekspor.id_ekspor ASC
              ";

    return $this->db->query($query);
  }

  function ekspor_telur()
  {
     $query = "SELECT ekspor.id_ekspor, ekspor.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, ekspor.angka_ekspor, ekspor.quartal, ekspor.status, ekspor.tahun
FROM komoditas
INNER JOIN ekspor on komoditas.id_komoditas = ekspor.id_komoditas
WHERE komoditas.jenis = 'telur'
ORDER BY ekspor.id_ekspor ASC
              ";

    return $this->db->query($query);
  }

  function ekspor_susu()
  {
     $query = "SELECT ekspor.id_ekspor, ekspor.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, ekspor.angka_ekspor, ekspor.quartal, ekspor.status, ekspor.tahun
FROM komoditas
INNER JOIN ekspor on komoditas.id_komoditas = ekspor.id_komoditas
WHERE komoditas.jenis = 'susu'
ORDER BY ekspor.id_ekspor ASC
              ";

    return $this->db->query($query);
  }

  function ekspor_ikan()
  {
     $query = "SELECT ekspor.id_ekspor, ekspor.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, ekspor.angka_ekspor, ekspor.quartal, ekspor.status, ekspor.tahun
FROM komoditas
INNER JOIN ekspor on komoditas.id_komoditas = ekspor.id_komoditas
WHERE komoditas.jenis = 'ikan'
ORDER BY ekspor.id_ekspor ASC
              ";

    return $this->db->query($query);
  }

  function ekspor_minyak()
  {
     $query = "SELECT ekspor.id_ekspor, ekspor.konversi, komoditas.id_komoditas, komoditas.nama_komoditas, komoditas.nama_inggris, ekspor.angka_ekspor, ekspor.quartal, ekspor.status, ekspor.tahun
FROM komoditas
INNER JOIN ekspor on komoditas.id_komoditas = ekspor.id_komoditas
WHERE komoditas.jenis = 'minyak'
ORDER BY ekspor.id_ekspor ASC
              ";

    return $this->db->query($query);
  }

  function edit_ekspor()
  {
  $data = array('angka_ekspor' => $this->input->post('angka_ekspor'),
                'konversi' => $this->input->post('konversi'));

    $this->db->where('id_ekspor', $this->input->post('id_ekspor'));
    $this->db->update('ekspor',$data);

  }

  function get_id_ekspor($id)
  {
    $param = array('id_ekspor'=>$id);
    return $this->db->get_where('ekspor',$param);
  }

  function input_ekspor($data){
    return $this->db->insert_batch('ekspor', $data);
  }

  function hapus_ekspor($id)
  {
    $this->db->where('id_ekspor', $id);
    $this->db->delete('ekspor');
  }
  
}
