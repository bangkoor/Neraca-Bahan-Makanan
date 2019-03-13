<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
             <div align="center"><img src="<?php echo base_url(); ?>assets/images/logo.png" width="80%" /></div>
             <?php echo form_open('auth/login');?>
                <div class="form-group danger has-error">
                  <label class="label">Username</label>
                  <div class="input-group danger <?= $this->session->flashdata('form'); ?>">
                    <input type="text" name="username" class="form-control has-error" placeholder="Username">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group danger has-error">
                  <label class="label">Password</label>
                  <div class="input-group danger <?= $this->session->flashdata('form'); ?>">
                    <input type="password" name="password" class="form-control has-error" placeholder="*********">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-primary submit-btn btn-block">Login</button>
                </div>
                </form>
                <?php if ( $this->session->flashdata('message') ) : ?>
                	<div class="alert alert-danger" role="alert">
                		<?= $this->session->flashdata('message'); ?>		
                	</div>
				<?php endif; ?>
                              
            </div>
            
            <p class="footer-text text-center">copyright © 2019 Kementerian Pertanian. All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->