<main id="main" data-aos="fade-up">

	<!-- ======= Breadcrumbs ======= -->
	<section class="breadcrumbs">
		<div class="container">

			<div class="d-flex justify-content-between align-items-center">
				<h2>Announcement</h2>
				<ol>
					<li><a href="<?= site_url('Home');?>">Home</a></li>
					<li>Announcement</li>
				</ol>
			</div>

		</div>
	</section><!-- End Breadcrumbs -->
	<section class="featured-services">
		<div class="container" data-aos="fade-up">
			<form action="<?php echo base_url('Announcement-search');?>" method="get">
				<input type="text" name="keyword" class="form-control" placeholder="search"><br>
			</form>
			<?php if(count($Data) != 0):?>
				<?php foreach($Data as $announc):?>
					<!-- <div class="card"> -->
						<div class="row icon-box">
							<div class="col-md-10">
								<div class="mb-5 mb-lg-0">
									<div class="" data-aos="fade-up" data-aos-delay="100">
										<h6 class="title"><a href=""><?= $announc->title;?></a></h6>
										<?php if ( str_word_count($announc->description) > 10 ):?>
											<p class="description"><?php echo substr($announc->description,0,100)?>...
												<a href="<?= site_url('Announcement-detail/'.$announc->id);?>" class="description" style="font-size: 15px;"> <u>read more</u></a></p>
										<?php else :?>
											<p class="description"><?= $announc->description ;?></p>
										<?php endif;?>
										<p class="description"><small class="text-muted description"><i class="ti-user description"> <em><?= $announc->pengupload;?></em> </i><i class="ti-calendar description"> <em><?php echo date('F d Y', strtotime($announc->created_at));?></em></i></small></p>
									</div>
								</div>
							</div>
							<div class="col-sm-2" style="font-size: 50px; text-align: center; display: flex; justify-content: center; align-items: center;">
								<a href="<?= base_url('_uploads/announcement/'.$announc->file);?>" target="_blank" class="btn btn-sm btn-success description"><i class="ti-download"></i> Download File</a>
							</div>
						</div><br>
					<!-- </div> -->
				<?php endforeach;?>
			<?php else:?>
				<div class="row">
					<div class="col-md-12 mb-5 mb-lg-0">
						<div class="icon-box" data-aos="fade-up" data-aos-delay="200">
							<!-- <div class="icon"><i class="bx bx-file"></i>
							</div> -->
							<h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
							<p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
						</div>
					</div>
				</div>
			<?php endif;?>
		</div>
	</section>
</main>