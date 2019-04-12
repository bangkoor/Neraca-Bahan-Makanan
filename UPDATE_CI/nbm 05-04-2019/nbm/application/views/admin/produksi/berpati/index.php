<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h3>Produksi</h3>
                  <h4>
                      Jenis Bahan Makanan <?php echo ucfirst($this->uri->segment(2)); ?>
                  </h4>
                   

                  <?php echo form_open(base_url().'admin/berpati_post_produksi','class="form-horizontal form-data"', array("id" => "form-data"));?>

                  <?= anchor('admin/berpati_post_produksi','Tambah Data', array('title' => 'Tambah','class' => 'btn btn-primary')); ?> 
                  <div class="table-responsive mt-4 mb-4">
                  <table class="table table-hover table-borderless" id="myTable" class="myTable">
                  <thead class=" thead-light">
                    <tr>
                      <th>No</th>
                      <th>Bahan Makanan</th>
                      <th>Produksi Kotor</th>
                      <th>Luas Panen</th>
                      <th>Konversi</th>
                      <th>Produksi Bersih</th>
                      <th>Tahun</th>
                      <th>Quartal</th>
                      <th>Status</th>
                      <th>Aksi</th>
                   </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($fields->result() as $f) :
                  ?>
                  
                   <tr>
                    <td><?= $no; ?></td>
                    <td><?= $f->nama_komoditas; ?><br><i><?= $f->nama_inggris; ?></i></td>
                   <td> 
                    <?= $f->produksi_kotor; ?>
                    </td>
                    <td>
                      <?= $f->luas_panen; ?>
                  </td>
                  <td>
                      <?= $f->konversi; ?>
                  </td>
                  <td>
                      <?= $f->produksi_kotor*$f->konversi/1000; ?>
                  </td>
                  <td>
                      <?= $f->tahun; ?>
                  </td>
                  <td>
                      <?= $f->quartal; ?>
                  </td>
                  <td>
                      <?= $f->status; ?>
                  </td>
                  <td><?= anchor('admin/edit_berpati_produksi/'.$f->id_produksi,'<i class="mdi mdi-transcribe"></i>', array('title' => 'Edit','class' => 'btn btn-primary')); ?> <?= anchor('admin/hapus_berpati_produksi/'.$f->id_produksi,'<i class="mdi mdi-delete"></i>', array('title' => 'Hapus', 'class' => 'btn btn-danger', 'onclick'=>"return confirm('Apakah anda yakin ingin menghapus data ini?')"))?></td>
                </tr>
                <?php $no++; ?>
               <?php endforeach;  ?>
              </tbody>
            </table>
            </div>
                  </form>
                </div>
              </div>
            </div>