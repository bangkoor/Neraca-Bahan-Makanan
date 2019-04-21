          
          <div class="row">
            <div class="col-lg-12 grid-margin" height="100%">
              <!--weather card-->
              <div class="card card-weather">
                <div class="card-body">
                  <div class="weather-date-location">
                    <p class="text-white">
                      <span class="weather-date"><font size="5"><?php echo tanggal() ?></font></span>
                    </p>
                  </div>
                  <div class="weather-data d-flex">
                    <div class="mr-auto">
                      <h4 class="display-3"><font color="white">Hallo! 
                        <p>
                        <?php echo ucfirst($this->session->userdata('level')); ?> <?php echo ucfirst($this->session->userdata('lokasi')); ?></font>
                      </p>
                    </div>
                  </div>
                </div>
                
              </div>
              <!--weather card ends-->
            </div>
            
          </div>