<div class="col-xl-12">
	<div class="card">
		<div class="card-header">
			<h6>Detail data pendadaran mahasiswa</h6>
		</div>
		<div class="card-block">
			<div class="row">
				<?php foreach($Data as $row):?>
					<div class="col-sm-12 col-xl-6">
						<p class="sub-title">Profil mahasiswa</p>
						<div class="media sub-title">
							<?php if($row->image == null):?>
								<img class="img-radius img-40 align-top m-r-15"
								src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
							<?php else:?>
								<img src="<?php echo base_url('_uploads/profile/student/').$row->image;?>" alt="user image"
								class="img-radius img-40 align-top m-r-15">
							<?php endif;?>
							<div class="media-body">
								<h6 class="text-primary"><?= $row->fullname;?>/<?= $row->nim;?></h6>
								"<?= $row->title;?>"
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-xl-6">
						<p class="sub-title">Profil pembimbing</p>
						<div class="media sub-title">
							<?php if($row->image == null):?>
								<img class="img-radius img-40 align-top m-r-15"
								src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
							<?php else:?>
								<img src="<?php echo base_url('_uploads/profile/staff/').$row->imageDosen;?>" alt="user image" class="img-radius img-40 align-top m-r-15">
							<?php endif;?>
							<div class="media-body">
								<h6 class="text-primary"><?= $row->nameLecturer;?>/<?= $row->nidn;?></h6>
								Email : <?= $row->email;?><br>No : <?= $row->phone;?>
							</div>
						</div>
					</div>
				<?php endforeach;?>
			</div>
			<div class="row">
				<div class="col-sm-12 col-xl-12">
					<div class="accordion-block color-accordion-block">
						<div class="color-accordion" id="color-accordion">
							<a class="accordion-msg b-none waves-effect waves-light">Data hasil ujian pendadaran</a>
							<div class="accordion-desc">
								<div class="row">
									<div class="col-sm-12 col-xl-5 sub-title">
										# Penguji
									</div>
									<div class="col-sm-12 col-xl-1 sub-title">
										Nilai
									</div>
									<div class="col-sm-12 col-xl-6 sub-title">
										Catatan
									</div>
									<!-- Data -->
									<?php if(!empty($DataPenguji)):?>
										<?php foreach($DetailPenguji as $data):?>
											<div class="col-sm-12 col-xl-5 sub-title">
												<?= $data->fullname;?>
											</div>
											<div class="col-sm-12 col-xl-1 sub-title">
												Nilai
											</div>
											<div class="col-sm-12 col-xl-6 sub-title">
												Catatan
											</div>
										<?php endforeach;?>
									<?php else:?>
										<div class="col-sm-12 col-xl-12 sub-title text-center">
												Data not availabel
											</div>
									<?php endif;?>
								</div>
							</div>
							<a class="accordion-msg bg-dark-primary b-none waves-effect waves-light">Persyaratan pendadaran mahasiswa upload</a>
							<div class="accordion-desc">
								<p>
									Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has
									survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
									Lorem Ipsum passages, and more .
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>