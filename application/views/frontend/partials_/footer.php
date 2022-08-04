<!-- ======= Footer ======= -->
<?php $datag = $this->db->select('*')->where('type', 1)->from('tb_settings')->get()->result();?>
<?php $datad = $this->db->select('*')->where('type', 3)->from('tb_settings')->get()->result();?>
<?php $dataf = $this->db->select('*')->where('type', 2)->from('tb_settings')->get()->result();?>
<?php $datah = $this->db->select('*')->from('contact')->get()->result();?>
<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact justify-content-center">
            <?php foreach($datag as $agga):?>
              <img width="200px" height="150px" src="<?php echo base_url('assets/logo/'.$agga->logo);?>">
            <?php endforeach;?>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <?php foreach($datag as $agg):?>
              <h4><?= $agg->kampus;?></h4>
            <?php endforeach;?>
            <?php foreach($datah as $ah):?>
              <p>
                <?= $ah->alamat;?><br><br>
                <strong>Phone:</strong> <?= $ah->fax;?><br>
                <strong>Email:</strong> <?= $ah->email;?><br>
              </p>
            <?php endforeach;?>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <?php foreach($datag as $ag):?>
              <h4><?= $ag->nama_web;?><span class="text-primary">.</span></h4>
              <p><?= $ag->atribut;?></p>
            <?php endforeach;?>
            <div class="social-links mt-3">
              <h4>SOCIAL MEDIA</h4>
              <?php foreach($datad as $abc):?>
                <a href="<?= $abc->link_icon;?>" target="_blank"><i class="<?= $abc->icon;?>"></i></a>
              <?php endforeach;?>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4><i class="bx bx-link-alt text-primary"></i> Links</h4>
            <ul>
              <?php foreach($dataf as $ae):?>
              <li><i class="bx bx-chevron-right"></i> <a href="<?= $ae->links;?>" target="_blank"><?= $ae->nama_links;?></a></li>
              <?php endforeach;?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright 2022 - <?php echo date('Y');?><strong><span class="text-primary"> SISTA UMBY</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
        Designed by BootstrapMade. <a href="https://github.com/AhmadSubadri" target="_blank">Develop by AS.</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url()?>frontend/vendor/purecounter/purecounter.js"></script>
  <script src="<?php echo base_url()?>frontend/vendor/aos/aos.js"></script>
  <script src="<?php echo base_url()?>frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url()?>frontend/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo base_url()?>frontend/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url()?>frontend/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo base_url()?>frontend/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="<?php echo base_url()?>frontend/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url()?>frontend/js/main.js"></script>
</body>

</html>