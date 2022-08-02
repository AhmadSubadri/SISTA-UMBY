<main id="main" data-aos="fade-up">
	<section class="breadcrumbs">
		<div class="container">

			<div class="d-flex justify-content-between align-items-center">
				<h2>About as</h2>
				<ol>
					<li><a href="<?= site_url('Home');?>">Home</a></li>
					<li>About</li>
				</ol>
			</div>

		</div>
	</section>
	<section id="about" class="about section-bg">
		<div class="container" data-aos="fade-up">
			<?php foreach($konten as $ct):?>
				<div class="section-title">
					<h2>About</h2>
					<h3><?= $ct->judul;?> <span><?= $ct->judul_biru;?></span></h3>
				</div>
				<div class="row">
					<div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
						<img src="<?= base_url('_uploads/frontend/'.$ct->image);?>" class="img-fluid" alt="">
					</div>
					<div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
						<h3><?= $ct->sub_judul;?></h3>
						<p align="justify">
							<?= $ct->deskripsi;?>
						</p>
						<ul>
							<?php foreach($icon as $ic):?>
								<li>
									<i class="<?= $ic->icon;?>"></i>
									<div>
										<h5><?= $ic->judul;?></h5>
										<p align="justify"><?= $ic->deskripsi;?></p>
									</div>
								</li>
							<?php endforeach;?>
						</ul>
						<?php foreach($konlagi as $kn):?>
							<p align="justify">
				              <?= $kn->deskripsi;?>
				            </p>
			        	<?php endforeach;?>
					</div>
				</div>
			<?php endforeach;?>
		</div>
	</section>
  </main><!-- End #main -->