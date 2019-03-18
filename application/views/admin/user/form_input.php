<div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Input User</h4>
                  <p class="card-description">
                  </p>
                  <?php
                  echo form_open('user/post','class="form-horizontal"');
                  ?>
                    <div class="form-group">
                      <label for="exampleInputName1">Username</label>
                      <input type="text" class="form-control" name="username" id="exampleInputName1" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Password</label>
                      <input type="password" class="form-control" name="password" id="exampleInputPassword4" placeholder="Password">
                    </div>
                    <div class="form-group">
                    <label for="level" class="col-sm-2 control-label">Level</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="level">
                    <option value="0">Pilih Level</option>
                    <option value='Admin'>Admin</option>
                    <option value='Pusat'>Pusat</option>
                    <option value='Daerah'>Daerah</option>
                    </select>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
