<!-- ======= Top Bar ======= -->
<?php $dataa = $this->db->select('*')->where('type', 1)->from('tb_settings')->get()->result();?>
<?php $datab = $this->db->select('*')->where('type', 3)->from('tb_settings')->get()->result();?>
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <?php foreach($dataa as $aa):?>
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:<?= $aa->email;?>"><?= $aa->email;?></a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span><?= $aa->faq;?></span></i>
        <?php endforeach;?>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <?php foreach($datab as $ab):?>
          <a href="<?= $ab->link_icon;?>" target="_blank"><i class="<?= $ab->icon;?>"></i></a>
        <?php endforeach;?>
      </div>
    </div>
  </section>