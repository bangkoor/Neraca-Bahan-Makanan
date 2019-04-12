<div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit User</h4>
                  <p class="card-description">
                  </p>
                  <?php
                  echo form_open('user/edit','class="form-horizontal"');
                  ?>
                   <input type="hidden" name="id_user" value="<?php echo $record['id_user']; ?>">
                    <div class="form-group">
                      <label for="exampleInputName1">Username</label>
                      <input type="text" class="form-control" name="username" value="<?php echo $record['username']; ?>" id="exampleInputName1" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Password</label>
                      <input type="password" class="form-control" name="password" id="exampleInputPassword4" placeholder="Isi Jika Ingin Mengganti Password">
                    </div>
                    <div class="form-group">
                    <label for="level" class="col-sm-2 control-label">Level</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="level" value="<?php echo $record['level']; ?>">
                    <option value="0">Pilih Level</option>
                    <?php
                    $level = $record['level'];
                    if ($level == "Admin") echo "<option value='Admin' selected>Admin</option>";
                    else echo "<option value='Admin'>Admin</option>";
                    if ($level == "Pusat") echo "<option value='Pusat' selected>Pusat</option>";
                    else echo "<option value='Pusat'>Pusat</option>";
                    if ($level== "Daerah") echo "<option value='Daerah' selected>Daerah</option>";
                    else echo "<option value='Daerah'>Daerah</option>";                  
                    ?>
                    </select>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>