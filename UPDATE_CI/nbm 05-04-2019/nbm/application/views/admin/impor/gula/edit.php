<div class="col-12 grid-margin">
<div class="card">
                <div class="card-body">
                  <h3>Edit gula</h3>
                  <p class="card-description">
                    Data Komoditas gula
                  </p>
                  <hr>
                  <div class="row">
                     <div class="col-md-4">
                      <h5><b>Tahun : <?= $record['tahun']; ?></b></h5>
                     </div>
                     <div class="col-md-4">
                      <h5><b>Quartal : <?= $record['quartal']; ?></b></h5>
                     </div>
                     <div class="col-md-4">
                      <h5><b>Status : <?= $record['status']; ?></b></h5>
                     </div>
                   </div>
                  <?php
                  echo form_open(base_url().'admin/edit_gula_impor','class="form-horizontal form-data"', array("id" => "form-data"));
                  ?>
                  <input type="hidden" name="id_impor" id="id_impor" value="<?= $record['id_impor']; ?>">
                  <div class="form-group mt-3">
                      <label for="exampleInputName1">Bahan Makanan</label>
                      <?php
              foreach ($fields as $f) : ?>
                      <input type="<?php echo $record['id_komoditas']==$f->id_komoditas?'text':'hidden'; ?>" class="form-control" id="bahan_makanan" name="bahan_makanan" value="<?= $f->nama_komoditas ?>" disabled>
                    <?php endforeach; ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Angka Impor</label>
                      <input type="text" class="form-control" id="angka_impor" name="angka_impor" value="<?= $record['angka_impor']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Konversi</label>
                      <input type="text" class="form-control" id="konversi" name="konversi" value="<?= $record['konversi']; ?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-success mr-2">Submit</button>
                  </form>
                </div>
              </div>
            </div>