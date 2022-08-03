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
	<section class="section-bg">
		<div class="container">
			<form action="" method="post">
				<input type="" name="" class="form-control" placeholder="search"><br>
			</form>
			<?php if(count($Data) != 0):?>
				<?php foreach($Data as $announc):?>
					<div class="card mb-3">
						<div class="row g-0">
							<div class="col-sm-1" style="font-size: 50px; text-align: center; display: flex; justify-content: center; align-items: center; background: blue;">
								<i class="ti-info-alt text-primary"></i>
							</div>
							<div class="col-md-11">
								<div class="card-body">
									<h5 class="card-title"><?= $announc->title;?> <a href="<?= base_url('_uploads/announcement/'.$announc->file);?>" class="btn btn-sm btn-outline-primary" target="_blank"><i class="ti-download"></i> Download file</a></h5>
									<?php if ( str_word_count($announc->description) > 10 ):
										echo substr("<p class='card-text'>".$announc->description."</p>",0,150)."...<a href='' class='text-primary' style='font-size: 15px;'> <u>read more</u></a>";?>
									<?php else :?>
										<p class='card-text'><?= $announc->description ;?></p>
									<?php endif;?>
									<p class="card-text"><small class="text-muted"><i class="ti-user"> <em><?= $announc->pengupload;?></em> </i><i class="ti-calendar"> <em><?= $announc->created_at;?></em></i></small></p>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach;?>
			<?php else:?>
				<div class="col-md-12 text-center">TIdak ada data Announcement</div>
			<?php endif;?>
		</div>
	</section>
</main>