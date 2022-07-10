<div class="col-xl-12">
	<a href="<?= site_url('dsn/dashboard/mahasiswa-pendadaran');?>" class="btn btn-mini"><i
		class="ti-back-left"></i>Kembali</a>
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
									<div class="col-sm-12 col-xl-4 sub-title">
										# Penguji
									</div>
									<div class="col-sm-12 col-xl-2 sub-title text-center">
										Nilai
									</div>
									<div class="col-sm-12 col-xl-6 sub-title">
										Catatan
									</div>
									<!-- Data -->
									<?php if( !empty($DetailPenguji) ):?>
										<?php $i=1; foreach($DetailPenguji as $data):?>
											<div class="col-sm-12 col-xl-4 sub-title">
												<?= $i++?>. <?= $data->fullname;?>
											</div>
											<div class="col-sm-12 col-xl-2 sub-title text-center">
											<?php if($data->nilai == null):?>
												<label class="label label-mini label-warning">Belum ada nilai</label>
											<?php else:?>
												<h6><?= $data->nilai;?></h6>
											<?php endif;?>
											</div>
											<div class="col-sm-12 col-xl-6 sub-title">
											<?php if($data->note == null && $data->file == null):?>
												<label class="label label-mini label-warning">Belum ada catatan</label>
											<?php elseif($data->note != null && $data->file != null):?>
												<h6><?= $data->note;?></h6>
												<a href="<?= base_url('_uploads/pendadaran/'.$data->nameStudent."/".$data->file);?>" target="_blank" class="text-primary btn-mini"><i class="ti-download"></i> Download file</a>
											<?php elseif($data->note != null && $data->file == null):?>
												<h6><?= $data->note;?></h6>
											<?php else:?>
												<a href="<?= base_url('_uploads/pendadaran/'.$data->nameStudent."/".$data->file);?>" target="_blank" class="btn btn-mini btn-outline-danger">Download file</a>
											<?php endif;?>
											</div>
										<?php endforeach;?>
										<div class="col-sm-12 col-xl-4 sub-title text-danger text-center">
											Hasil nilai rata-rata 
										</div>
										<div class="col-sm-12 col-xl-2 sub-title text-center">
											<?php $notnull = count($MeanNilai);?>
											<?php $sum = 0; foreach($MeanNilai as $as):?>
												<?php $sum += str_replace(",", "", $as->total);
													$count = $sum/$notnull;
												?>
											<?php endforeach;?>
											<?php if($notnull != 0):?>
											<?php
											if(number_format($count,1) >= 50):
												echo "<label class='text-primary'>".number_format($count,1)."</label>";
											else:
												echo "<label class='text-danger'>".number_format($count,1)."</label>";
											endif;
													if($count >= 85):
														echo " (A)<br> <u class='text-primary'>LULUS</u>";
													elseif($count >= 80 && $count <=84.99):
														echo " (A-)<br> <u class='text-primary'>LULUS</u>";
													elseif($count >= 70 && $count <= 79.99):
														echo " (B+)<br> <u class='text-primary'>LULUS</u>";
													elseif($count >= 65 && $count <= 69.99):
														echo " (B)<br> <u class='text-primary'>LULUS</u>";
													elseif($count >= 60 && $count <= 64.99):
														echo " (B-)<br> <u class='text-primary'>LULUS</u>";
													elseif($count >= 50 && $count <= 59.99):
														echo " (C+)<br> <u class='text-primary'>LULUS</u>";
													elseif($count >= 40 && $count <= 49.99):
														echo " (C)<br> <u class='text-danger'>TIDAL LULUS</u>";
													elseif($count >= 20 && $count <=39.99):
														echo " (D)<br> <u class='text-danger'>TIDAL LULUS</u>";
													elseif($count <= 19.99):
														echo " (E)<br> <u class='text-danger'>TIDAL LULUS</u>";
													else:
														echo "NULL";
													endif;
											?>
										<?php else:?>
											0
										<?php endif;?>
										</div>
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