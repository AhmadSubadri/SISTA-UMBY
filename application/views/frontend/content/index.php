<section id="hero" class="d-flex align-items-center">
  <div class="container" data-aos="zoom-out" data-aos-delay="100">
    <?php foreach($HeroSection as $HS):?>
      <h1><?= $HS->judul;?> <span><?= $HS->judul_biru;?></span></h1>
      <h2><?= $HS->sub_judul;?></h2>
    <?php endforeach;?>
    <div class="d-flex">
      <a href="<?= site_url('Login-user');?>" class="btn-get-started scrollto">Get Started</a>
      <!-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> -->
    </div>
  </div>
</section><!-- End Hero -->
<section id="about" class="about section-bg">
  <div class="container" data-aos="fade-up">
  <?php foreach($Calender as $CL):?>
    <div class="section-title">
      <h2>Component</h2>
      <h3><?= $CL->judul;?> <span><?= $CL->judul_biru;?></span></h3>
    </div>

    <div class="row">
      <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
        <object data="<?=base_url('_uploads/frontend/'.$CL->file);?>" width="100%" height="400"></object>
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
        <h3><?= $CL->sub_judul;?></h3>
        <p class="fst-italic">
          <?= $CL->deskripsi;?>
        </p>
        <ul>
          <li>
            <i class="bx bx-download"> <a href="<?= base_url('_uploads/frontend/'.$CL->file);?>" target="_blank">Download calendar academic</a></i>
          </li>
        </ul>
      </div>
    </div>
  <?php endforeach;?>
  </div>
</section><!-- End About Section -->
<br>
<div class="section-title">
  <h2>Testimoni</h2>
  <h3>Testimoni <span>lulusan</span></h3>
</div>
<section id="testimonials" class="testimonials">
  <div class="container" data-aos="zoom-in">
    <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper-wrapper">
        <?php foreach($Testimoni as $tst):?>
          <div class="swiper-slide">
            <div class="testimonial-item">
              <?php if($tst->image != null):?>
                <img src="<?=base_url('_uploads/frontend/'.$tst->image);?>" class="testimonial-img" width="100" height="100" alt="">
              <?php else:?>
                <img src="<?=base_url('_uploads/frontend/no_image.jpg');?>" class="testimonial-img" width="100" height="100" alt="">
              <?php endif;?>
              <h3><?= $tst->nama;?></h3>
              <h4><?= $tst->pekerjaan;?></h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                <?= $tst->testimoni;?>
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item -->
        <?php endforeach;?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section><!-- End Testimonials Section -->