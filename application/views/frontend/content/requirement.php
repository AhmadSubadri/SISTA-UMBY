<main id="main" data-aos="fade-up">

	<!-- ======= Breadcrumbs ======= -->
	<section class="breadcrumbs">
		<div class="container">
			<div class="d-flex justify-content-between align-items-center">
				<h2>Requirements</h2>
				<ol>
					<li><a href="<?= site_url('Home');?>">Home</a></li>
					<li>Requirements</li>
				</ol>
			</div>
		</div>
	</section><!-- End Breadcrumbs -->
	<section id="faq" class="faq section-bg">
		<div class="row">
			<div class="col-sm-12 col-xl-6">
				<div class="container" data-aos="fade-up">
					<div class="section-title">
						<h2>REQUIREMENT'S</h2>
						<h3>Persyaratan <span>Pendadaran</span></h3>
					</div>
					<div class="row justify-content-center">
						<div class="col-xl-10">
							<ul class="faq-list">
								<?php foreach($Faculty as $fac):?>
									<li>
										<div data-bs-toggle="collapse" class="collapsed question" href="#pen<?= $fac->id;?>"><?= $fac->name;?> (<?= $fac->short_name;?>)<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
										<?php $major = $this->db->select('*')->where('id_faculty', $fac->id)->from('tb_major')->get()->result();?>
										<?php foreach($major as $mjr):?>
											<div id="pen<?= $fac->id;?>" class="collapse" data-bs-parent=".faq-list">
												<br><div data-bs-toggle="collapse" class="collapsed question" href="#mjra<?= $mjr->id;?>"><b class="text-primary">> </b><?= $mjr->name;?></div>
												<div id="mjra<?= $mjr->id;?>" class="collapse" data-bs-parent=".faq-lista">
													<?php $requirement = $this->db->select('*')->where('major', $mjr->id)->where('status', 1)->where('type', 1)->from('tb_requirements')->get()->result();?>
													<?php $i=1; foreach($requirement as $req):?>
														<p><?= $i++;?>. <?= $req->requirements;?></p>
													<?php endforeach;?>
												</div>
											</div>
										<?php endforeach;?>
									</li>
								<?php endforeach;?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-xl-6">
				<div class="container" data-aos="fade-up">
					<div class="section-title">
						<h2>REQUIREMENT'S</h2>
						<h3>Persyaratan <span>Yudisium</span></h3>
					</div>
					<div class="row justify-content-center">
						<div class="col-xl-10">
							<ul class="faq-list">
								<?php foreach($Faculty as $fac):?>
									<li>
										<div data-bs-toggle="collapse" class="collapsed question" href="#yud<?= $fac->id;?>"><?= $fac->name;?> (<?= $fac->short_name;?>)<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
										<?php $major = $this->db->select('*')->where('id_faculty', $fac->id)->from('tb_major')->get()->result();?>
										<?php foreach($major as $mjr):?>
											<div id="yud<?= $fac->id;?>" class="collapse" data-bs-parent=".faq-list">
												<br><div data-bs-toggle="collapse" class="collapsed question" href="#mjr<?= $mjr->id;?>"><b class="text-primary">> </b><?= $mjr->name;?></div>
												<div id="mjr<?= $mjr->id;?>" class="collapse" data-bs-parent=".faq-lista">
													<?php $requirement = $this->db->select('*')->where('major', $mjr->id)->where('status', 1)->where('type', 2)->from('tb_requirements')->get()->result();?>
													<?php $i=1; foreach($requirement as $req):?>
														<p><?= $i++;?>. <?= $req->requirements;?></p>
													<?php endforeach;?>
												</div>
											</div>
										<?php endforeach;?>
									</li>
								<?php endforeach;?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- End Frequently Asked Questions Section -->
</main>