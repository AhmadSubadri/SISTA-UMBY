<!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="<?= site_url('Home');?>">SISTA UMBY<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <a class="nav-link scrollto <?php if($this->uri->segment(1)=="Home"){echo "active";};?>" href="<?= site_url('Home');?>"><li class="bx bx-home"></li></a>
          <li><a class="nav-link scrollto <?php if($this->uri->segment(1)=="About"){echo "active";};?>" href="<?= site_url('About');?>">About</a></li>
          <li><a class="nav-link scrollto <?php if($this->uri->segment(1)=="Requirement"){echo "active";};?>" href="<?= site_url('Requirement');?>">Requirements</a></li>
          <li><a class="nav-link scrollto <?php if($this->uri->segment(1)=="Timeline"){echo "active";};?>" href="<?= site_url('Timeline');?>">Timeline</a></li>
          <li><a class="nav-link scrollto <?php if($this->uri->segment(1)=="Announcement"){echo "active";};?>" href="<?= site_url('Announcement');?>">Announcement</a></li>
          <li><a class="nav-link scrollto <?php if($this->uri->segment(1)=="Download" || $this->uri->segment(2)=="Download/ConSearch"){echo "active";};?>" href="<?= site_url('Download');?>">Download</a></li>
          <li><a class="nav-link scrollto <?php if($this->uri->segment(1)=="Contact"){echo "active";};?>" href="<?= site_url('Contact');?>">Contact</a></li>
          <li><a class="nav-link scrollto" href="<?= site_url('Login-user');?>">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->