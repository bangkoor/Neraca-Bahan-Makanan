<div class="card-deck">
            <div class="card col-lg-12 px-0 mb-4">
              <div class="card-body">
                <h5 class="card-title">Sistem Neraca Bahan Makanan</h5>
                Selamat datang <b><?php echo ucfirst($this->session->userdata('username')); ?></b>
              </div>
            </div>
          </div>

<div class="card-deck">
            <div class="card col-lg-12 px-0 mb-4">
              <div class="card-body">
                <h5 class="card-title">Search Data Stok & Produksi</h5>
                <table>
      <tr>
      <td>Pilih Provinsi</td>
      <td>
        <select name="prop" id="prop" onchange="ajaxkota(this.value)">
          <option value="">Pilih Provinsi</option>
          <?php 
          foreach($provinsi as $data){
            echo '<option value="'.$data->id_prov.'">'.$data->nama.'</option>';
          }
          ?>
        <select>
      </td>
    </tr>
    <tr id='kab_box'>
      <td>Pilih Kota/Kab</td>
      <td>
        <select name="kota" id="kota" onchange="ajaxkec(this.value)">
          <option value="">Pilih Kota</option>
        </select>
      </td>
    </tr>
    </table>
                  <button type="submit" class="btn btn-primary mr-2 float-right">Search</button>
              </div>
            </div>
          </div>          