<!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <?php $dataa = $this->db->select('*')->where('type', 1)->from('tb_settings')->get()->result();?>
      <?php foreach($dataa as $ac):?>
        <h1 class="logo"><a href="<?= site_url('Home');?>"><?= $ac->nama_web;?><span>.</span></a></h1>
      <?php endforeach;?>

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