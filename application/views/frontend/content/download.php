<main id="main" data-aos="fade-up">

	<!-- ======= Breadcrumbs ======= -->
	<section class="breadcrumbs">
		<div class="container">

			<div class="d-flex justify-content-between align-items-center">
				<h2>Download</h2>
				<ol>
					<li><a href="<?= site_url('Home');?>">Home</a></li>
					<li>Download</li>
				</ol>
			</div>

		</div>
	</section><!-- End Breadcrumbs -->
	<section class="section-bg">
		<div class="container">
			<form action="<?= site_url('Download/searcha');?>" method="post">
				<input type="search" name="keyword" method="post" class="form-control" placeholder="search" required maxlength="32"><br>
			</form>
			<?php if(count($Data) != 0):?>
				<?php foreach($Data as $announc):?>
					<div class="card mb-3 info-box">
						<div class="row g-0">
							<div class="col-sm-1" style="font-size: 50px; text-align: center; display: flex; justify-content: center; align-items: center; background: blue;">
								<i class="ti-download text-primary"></i>
							</div>
							<div class="col-md-11">
								<div class="card-body">
									<h5 class="card-title"><?= $announc->judul;?> <a href="<?= base_url('_uploads/download/'.$announc->file);?>" class="btn btn-sm btn-outline-primary" target="_blank"><i class="ti-download"></i> Download file</a></h5>
									<p class='card-text'><?= $announc->deskripsi ;?></p>
									<p class="card-text"><small class="text-muted"><i class="ti-user"> <em><?= $announc->uploader;?></em> </i><i class="ti-calendar"> <em><?= $announc->created_at;?></em></i></small></p>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach;?>
			<?php else:?>
				<div class="col-md-12 text-center">TIdak ada data File Download</div>
			<?php endif;?>
		</div>
	</section>
</main>