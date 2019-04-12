<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h3>Laporan</h3>
                  <h4>
                      Pangan Harapan
                  </h4>
                   <?php echo form_open(base_url().'admin/pph','class="form-horizontal form-data"', array("id" => "form-data"));?>
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
                   <center>
                    <button type="submit" name="submit" class="btn btn-success btn-fw">Cetak Laporan</button>
                  </center>
                  </form>
                </div>
              </div>
            </div>