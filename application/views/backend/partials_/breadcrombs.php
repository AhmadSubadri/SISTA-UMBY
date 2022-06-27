<!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Dashboard</h5>
                                          <p class="m-b-0">Welcome to SISTA Universitas Mercu Buana Yogyakarta</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="<?= site_url('Dashboard');?>"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item">
                                            <?php echo ucfirst($this->uri->segment(1)) ." / ". ucfirst($this->uri->segment(2)) ." / ". ucfirst($this->uri->segment(3)) ?>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>