<main id="main" data-aos="fade-up">
	<!-- ======= Breadcrumbs ======= -->
	<section class="breadcrumbs">
		<div class="container">
			<div class="d-flex justify-content-between align-items-center">
				<h2>Detail Announcement</h2>
				<ol>
					<li><a href="<?= site_url('Home');?>">Home</a></li>
					<li>Detail Announcement</li>
				</ol>
			</div>
		</div>
	</section><!-- End Breadcrumbs -->
	<section class="featured-services">
		<div class="container" data-aos="fade-up">
			<?php foreach($Data as $announc):?>
				<div class="row">
					<div class="col-md-12">
						<div class="mb-5 mb-lg-0">
							<div class="" data-aos="fade-up" data-aos-delay="100">
								<p class="description"><small class="text-muted description"><i class="ti-user description"> <em><?= $announc->pengupload;?></em> </i><i class="ti-calendar description"> <em><?= $announc->created_at;?></em></i></small></p>
								<h6 class="title"><a href=""><?= $announc->title;?></a></h6>
								<p class="description" align="justify"><?= $announc->description ;?></p>
							</div>
						</div>
					</div>
					<div class="col-sm-2" style="font-size: 50px; text-align: center; display: flex; justify-content: center; align-items: center;">
						<a href="<?= base_url('_uploads/announcement/'.$announc->file);?>" target="_blank" class="btn btn-sm btn-success description"><i class="ti-download"></i> Download File</a>
					</div>
				</div><br>
				<!-- </div> -->
			<?php endforeach;?>
		</div>
	</section>
	<section>
		<div class="container" data-aos="fade-up">
			<a href="<?= site_url('Announcement');?>" class="text-primary"><i class="ti-back-left"></i> Back</a>
		</div>
	</section>
</main>