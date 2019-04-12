<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h3>Produksi</h3>
                  <h4>
                      Jenis Bahan Makanan Telur
                  </h4>
                   <?php echo form_open(base_url().'admin/telur_post_produksi','class="form-horizontal form-data"', array("id" => "form-data"));?>
                   <div class="row">
                     <div class="col-md-4">
                       <div class="form-group mt-3">
                    <label for="exampleFormControlSelect2">Tahun</label>
                    <select class="form-control" id="tahun" name="tahun">
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option>
                      <option>2021</option>
                    </select>
                  </div>
                     </div>
                     <div class="col-md-4">
                       <div class="form-group mt-3">
                    <label for="exampleFormControlSelect2">Quartal</label>
                    <select class="form-control" id="quartal" name="quartal">
                      <option>Q1</option>
                      <option>Q2</option>
                      <option>Q3</option>
                    </select>
                  </div>
                     </div>
                     <div class="col-md-4">
                       <div class="form-group mt-3">
                    <label for="exampleFormControlSelect2">Status</label>
                    <select class="form-control" id="status" name="status">
                      <option>Sangat Sementara</option>
                      <option>Sementara</option>
                      <option>Tetap</option>
                    </select>
                  </div>
                     </div>
                   </div>
                  <div class="table-responsive mt-4 mb-4">
                  <table class="table table-borderless" id="myTable" class="myTable">
                  <thead class=" thead-light">
                    <tr>
                      <th width="1%">No</th>
                      <th>Nama Bahan Makanan</th>
                      <th>Produksi Kotor</th>
                      <th>Luas Panen</th>
                      <th>Konversi</th>
                   </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($fields->result() as $f) :
                  ?>
                  
                   <tr>
                    <td><?= $no; ?></td>
                    <td><?= ucfirst($f->nama_komoditas); ?><br><hr><i><?= ucfirst($f->nama_inggris); ?></i>
<input type="hidden" id="id_komoditas[]" name="id_komoditas[]" value="<?= $f->id_komoditas; ?>" class="form-control" /><input type="hidden" id="komoditas" name="komoditas" value="<?php echo ucfirst($this->uri->segment(2)); ?>" class="form-control" />
                    </td>
                   <td width="25%"> 
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-sm-12">

                            <input type="text" id="produksi_kotor[]" name="produksi_kotor[]" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>
                    </td>
                    <td width="25%">
                      <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <input type="text" id="luas_panen[]" name="luas_panen[]" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td width="25%">
                      <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <input type="text" id="konversi[]" name="konversi[]" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php $no++; ?>
               <?php endforeach;  ?>
              </tbody>
            </table>
            </div>
                    <button type="submit" name="submit" class="btn btn-success btn-fw">Submit</button>
                    <button type="next" name="next" class="btn btn-primary btn-fw float-right">Next</button>
                  </form>
                </div>
              </div>
            </div>