<main id="main" data-aos="fade-up">

	<!-- ======= Breadcrumbs ======= -->
	<section class="breadcrumbs">
		<div class="container">

			<div class="d-flex justify-content-between align-items-center">
				<h2>Timeline</h2>
				<ol>
					<li><a href="<?= site_url('Home');?>">Home</a></li>
					<li>Timeline</li>
				</ol>
			</div>

		</div>
	</section><!-- End Breadcrumbs -->
	<section id="faq" class="faq">
		<div data-aos="fade-up">
			<div class="section-title">
				<h2>Timeline</h2>
				<h3>Timeline <span>Tugas akhir</span></h3>
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
											<?php $timeline = $this->db->select('*')->where('major', $mjr->id)->from('tb_timeline')->get()->result();?>
											<div class="container my-5">
												<div class="row">
													<div class="col-md-8 offset-md-3">
														<h4 style="margin-left: 1.2rem;">Timeline</h4>
														<ul class="timeline-3">
															<?php if(count($timeline) !=0):?>
																<?php foreach($timeline as $tml):?>
																	<li>
																		<a href="#!"><?= $tml->judul;?></a>
																		<a href="#!" class="float-end"></a>
																		<?php if($tml->start_date == 0 && $tml->end_date != 0):?>
																			<p class="mt-2"><?= format_tanggal(date($tml->end_date));?></p>
																		<?php elseif($tml->end_date == 0 && $tml->start_date != 0):?>
																			<p class="mt-2"><?= format_tanggal(date($tml->start_date));?></p>
																		<?php elseif($tml->end_date == 0 && $tml->start_date == 0):?>
																		<?php elseif($tml->end_date != 0 && $tml->start_date != 0):?>
																			<p class="mt-2"><?= format_tanggal(date($tml->start_date));?> - <?= format_tanggal(date($tml->end_date));?></p>
																		<?php endif;?>
																	</li>
																<?php endforeach;?>
															<?php else:?>
																Tidak ada timeline
															<?php endif;?>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach;?>
							</li>
						<?php endforeach;?>
					</ul>
				</div>
			</div>
		</div>
	</section><!-- End Frequently Asked Questions Section -->
</main>

<link href="<?php base_url()?>frontend/timeline.css" rel="stylesheet">