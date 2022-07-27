<nav class="navbar header-navbar pcoded-header">
  <div class="navbar-wrapper">
    <div class="navbar-logo">
      <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
        <i class="ti-menu"></i>
      </a>
      <div class="mobile-search waves-effect waves-light">
        <div class="header-search">
          <div class="main-search morphsearch-search">
            <div class="input-group">
              <span class="input-group-addon search-close"><i class="ti-close"></i></span>
              <input type="text" class="form-control" placeholder="Enter Keyword">
              <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
            </div>
          </div>
        </div>
      </div>
      <a href="<?= site_url('Dashboard')?>">
        <img class="img-fluid" src="<?php echo base_url()?>assets/logo/logo1.png" alt="Theme-Logo" />
      </a>
      <a class="mobile-options waves-effect waves-light">
        <i class="ti-more"></i>
      </a>
    </div>
    
    <div class="navbar-container container-fluid">
      <ul class="nav-left">
        <li>
          <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
        </li>
        <li class="header-search">
          <div class="main-search morphsearch-search">
            <div class="input-group">
              <span class="input-group-addon search-close"><i class="ti-close"></i></span>
              <input type="text" class="form-control">
              <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
            </div>
          </div>
        </li>
        <li>
          <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
            <i class="ti-fullscreen"></i>
          </a>
        </li>
      </ul>
      <ul class="nav-right">
        <li class="header-notification">
          <?php $notif = $this->db->select('*')->where('penerima', $this->session->userdata('username'))->from('tb_notification')->get()->result();?>
          <a href="#!" class="waves-effect waves-light">
            <i class="ti-bell"></i>
            <?php if(count($notif) != 0):?>
            <span class="badge bg-c-red"></span>
            <?php else:?>
              
            <?php endif;?>
          </a>
          <ul class="show-notification">
            <li>
              <h6>Notifications</h6>
              <label class="label label-danger">New</label>
            </li>
            <?php if(count($notif) != 0):?>
              <?php foreach($notif as $not):?>
                <li class="waves-effect waves-light" onclick="fungsi(<?= $not->id;?>)">
                  <a href="<?= site_url();?><?= $not->url;?>">
                    <div class="media">
                      <img class="d-flex align-self-center img-radius" src="<?php echo base_url()?>_uploads/profile/profile.png" alt="Generic placeholder image">
                      <div class="media-body">
                        <h5 class="notification-user"><?= $not->pengirim;?></h5>
                        <p class="notification-msg"><?= $not->pesan;?></p>
                        <span class="notification-time">30 minutes ago</span>
                      </div>
                    </div>
                  </a>
                </li>
              <?php endforeach;?>
            <?php else:?>
              <li class="text-center">
                pesan kosong
              </li>
            <?php endif;?>
          </ul>
        </li>
        <li class="user-profile header-notification">
          <a href="#!" class="waves-effect waves-light">
            <?php if($this->session->userdata('foto') == null):?>
              <img class="img-80 img-radius" src="<?php echo base_url()?>_uploads/profile/profile.png" alt="User-Profile-Image">
            <?php else:?>
              <?php if($this->session->userdata('level') == '1'):?>
                <img class="img-80 img-radius" src="<?= base_url('_uploads/profile/staff/').$this->session->userdata('foto');?>" alt="User-Profile-Image">
              <?php else:?>
                <img class="img-80 img-radius" src="<?= base_url('_uploads/profile/student/').$this->session->userdata('foto');?>" alt="User-Profile-Image">
              <?php endif;?>
            <?php endif;?>
            <span><?= $this->session->userdata('name');?></span>
            <i class="ti-angle-down"></i>
          </a>
          <ul class="show-notification profile-notification">
            <li class="waves-effect waves-light">
              <a href="#!">
                <i class="ti-settings"></i> Settings
              </a>
            </li>
            <li class="waves-effect waves-light">
              <a href="user-profile.html">
                <i class="ti-user"></i> Profile
              </a>
            </li>
            <li class="waves-effect waves-light">
              <a href="#!" data-target="#logoutmodal" data-toggle="modal">
                <i class="ti-layout-sidebar-left"></i> Logout
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script type="text/javascript">
  function fungsi(id) {
    $.ajax({
      type: "POST",
      url: '<?= site_url("TU/dashboard/delete-byid-uploaded")?>',
      data: {
        id: id
      },
      error: function(data) {
        alert("Something is wrong");
      },
    });
  }
</script>