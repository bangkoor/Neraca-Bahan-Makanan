<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h3><?php echo ucfirst($this->uri->segment(1)); ?></h3>
                  <h4>
                      Jenis Bahan Makanan <?php echo ucfirst($this->uri->segment(2)); ?>
                  </h4>
                  <div class="center">
                  <div class="btn-group btn-block center" role="group" aria-label="Basic example">
                          <button type="button" class="btn btn-danger btn-block"><big>2019</big><br/><small>(sangat sementara)</small></button>
                          <button type="button" class="btn btn-secondary disabled">></button>
                          <button type="button" class="btn btn-warning btn-block"><big>2018</big><br/><small>(sementara)</small></button>
                          <button type="button" class="btn btn-secondary disabled">></button>
                          <button type="button" class="btn btn-success btn-block"><big>2017</big><br/><small>(tetap)</small></button>
                   </div>
               	   </div>
                  <?php echo form_open(base_url().'produksi/gula','class="form-horizontal form-data"', array("id" => "form-data"));?>
                    <div class="table-responsive mt-4 mb-4">
                  <table class="table table-borderless" id="myTable" class="myTable">
                  <thead class=" thead-light">
                    <tr>
                      <th>Nama Bahan Makanan</th>
                      <th>Produksi Kotor</th>
                      <th>Konversi</th>
                      <th>Produksi Bersih</th>
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
                            <input type="text" class="form-control" />
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