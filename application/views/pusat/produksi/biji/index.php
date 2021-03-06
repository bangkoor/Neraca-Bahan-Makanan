<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h3><?php echo ucfirst($this->uri->segment(1)); ?></h3>
                  <h4>
                      Jenis Bahan Makanan <?php echo ucfirst($this->uri->segment(2)); ?>
                  </h4>
                  <div class="center">
                  <div class="btn-group btn-block center" role="group" aria-label="Basic example">
                          <button type="button" class="btn btn-outline-secondary btn-block">Q 1</button>
                          <button type="button" class="btn btn-secondary disabled">></button>
                          <button type="button" class="btn btn-secondary btn-block disabled">Q 2</button>
                          <button type="button" class="btn btn-secondary disabled">></button>
                          <button type="button" class="btn btn-secondary btn-block disabled">Q 3</button>
                   </div>
               	   </div>
                  <?php echo form_open(base_url().'produksi/biji','class="form-horizontal form-data"', array("id" => "form-data"));?>
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
                            <!-- <input type="text" class="form-control" /> -->Data1
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
                            <!-- <input type="text" class="form-control" /> -->Data2
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
                            <!-- <input type="text" class="form-control" /> -->Data3
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