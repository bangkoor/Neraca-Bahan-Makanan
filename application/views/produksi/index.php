<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h3><?php echo ucfirst($this->uri->segment(1)); ?></h3>
                  <div class="center">
                  <div class="btn-group btn-block center" role="group" aria-label="Basic example">
                          <button type="button" class="btn btn-outline-secondary btn-block">Q 1</button>
                          <button type="button" class="btn btn-secondary disabled">></button>
                          <button type="button" class="btn btn-secondary btn-block disabled">Q 2</button>
                          <button type="button" class="btn btn-secondary disabled">></button>
                          <button type="button" class="btn btn-secondary btn-block disabled">Q 3</button>
                   </div>
               	   </div>
                  <form class="form-sample">
                    <p class="card-title mt-4">
                      Jenis Bahan Makanan <?php echo ucfirst($this->uri->segment(2)); ?>
                    </p>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Produksi Kotor</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Konversi</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Produksi Bersih</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="button" class="btn btn-success btn-fw">Submit</button>
                    <button type="button" class="btn btn-primary btn-fw float-right">Next</button>

                 
                  </form>
                </div>
              </div>
            </div>