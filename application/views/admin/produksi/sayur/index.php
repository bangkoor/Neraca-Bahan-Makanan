<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h3><?php echo ucfirst($this->uri->segment(1)); ?></h3>
                  <h4>
                      Jenis Bahan Makanan <?php echo ucfirst($this->uri->segment(2)); ?>
                  </h4>
                  <form class="forms-sample">
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tahun</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Masukkan tahun data">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Jenis</label>
                          <div class="col-sm-9">
                            <select class="form-control">
                              <option>Sangat Sementara</option>
                              <option>Sementara</option>
							  <option>Tetap</option>
                            </select>
                          </div>
                        </div>
						<div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Penyusun</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Masukkan instansi penyusun laporan">
                          </div>
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Muat Data</button>
                        <button class="btn btn-light">Cancel</button>
                      </form>
                  <?php echo form_open(base_url().'produksi/padi','class="form-horizontal form-data"', array("id" => "form-data"));?>
                  <div class="table-responsive mt-4 mb-4">
                  <table class="table table-borderless" id="myTable" class="myTable">
                  <thead class=" thead-light">
                    <tr>
                      <th>Nama Bahan Makanan</th>
                      <th>Produksi Kotor</th>
                      <th>Konversi</th>                  
                   </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($fields->result() as $f) :
                  ?>
                  
                   <tr>
                    <td><p class="card-title mt-4"><?= ucfirst($f->name); ?></i></p></td>
                   <td width="25%"> 
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <input type="text" class="form-control" />
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
                            <input type="text" class="form-control" <?php if($f->jenis != 'padi'){echo "disabled";}else{echo "";}?>/>
                          </div>
                        </div>
                      </div>
                    </div>
                    </td>
                    
                  </td>
                </tr>
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