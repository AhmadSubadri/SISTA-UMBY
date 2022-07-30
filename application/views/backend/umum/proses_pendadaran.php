<div class="col-xl-12">
	<a href="<?= site_url('dsn/dashboard/data-mahasiswa-pendadaran');?>" class="btn btn-mini"><i
		class="ti-back-left"></i>Kembali</a>
		<div class="card">
			<div class="card-header" style="background-color: #75A8FE;">
				<h5 style="color: white;">PELAKSANAAN UJIAN PENDADARAN</h5>
			</div>
			<div class="card-block">
				<div class="row">
					<?php foreach($Data as $row):?>
						<div class="col-sm-12 col-xl-6">
							<p class="sub-title">Profil mahasiswa</p>
							<div class="media sub-title">
								<?php if($row->imageMhs == null):?>
									<img class="img-radius img-40 align-top m-r-15"
									src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
								<?php else:?>
									<img src="<?php echo base_url('_uploads/profile/student/').$row->imageMhs;?>" alt="user image"
									class="img-radius img-40 align-top m-r-15" width="40px" height="40px">
								<?php endif;?>
								<div class="media-body">
									<h6 class="text-primary"><?= $row->nameStudent;?>/<?= $row->nim;?></h6>
									Email : <?= $row->emailMhs?><br>
									"<?= $row->title;?>"
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-xl-6">
							<p class="sub-title">Profil pembimbing</p>
							<div class="media sub-title">
								<?php if($row->imageDsn == null):?>
									<img class="img-radius img-40 align-top m-r-15"
									src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
								<?php else:?>
									<img src="<?php echo base_url('_uploads/profile/staff/').$row->imageDsn;?>" alt="user image" class="img-radius img-40 align-top m-r-15" width="40px" height="40px">
								<?php endif;?>
								<div class="media-body">
									<h6 class="text-primary"><?= $row->nameLecturer;?>/<?= $row->nidn;?></h6>
									Email : <?= $row->emailDsn;?><br>No : <?= $row->phone;?>
								</div>
							</div>
						</div>
					<?php endforeach;?>
				</div>
				<div class="row">
					<div class="col-sm-12 col-xl-12">
						<div class="accordion-block color-accordion-block">
							<div class="color-accordion" id="color-accordion">
								<a class="accordion-msg b-none waves-effect waves-light">Form penilaian hasil ujian pendadaran</a>
								<div class="accordion-desc">
									<div class="row">
										<div class="col-sm-12 col-xl-12 sub-title">
											<!-- <form class="form-material" method="post" id="savedata"> -->
												<?= form_open_multipart('dsn/dashboard/save-feedback-pendadaran-umum'); ?>
												<div class="card">
													<div class="form-material">
														<div class="card-block">
															<?php foreach($Data as $row):?>
																<input type="text" name="nim" class="form-control" value="<?= $row->nim;?>" hidden>
																<input type="text" name="id_thesisrecheived" class="form-control" value="<?= $row->id;?>" hidden>
																<input type="text" name="name" class="form-control" value="<?= $row->nameStudent;?>" hidden>
															<?php endforeach;?>
															<div class="form-group form-default row">
																<label class="col-sm-1 col-form-label text-primary">Status</label>
									                            <div class="col-sm-4">
									                                <select name="status" class="form-control" required>
									                                    <option value="1">Lulus ujian</option>
									                                    <option value="3">Menunggu (panding)</option>
									                                    <option value="2">Mengulang pendadaran periode berikutnya</option>
									                                    <option value="4">Mengulang skripsi semester depan</option>
									                                </select>
									                            </div>
																<div class="form-group col-sm-3 form-default form-static-label">
																	<input type="text" name="nilai" class="form-control" placeholder="- -">
																	<span class="form-bar"></span>
																	<label class="float-label text-primary">Nilai <i class="text-danger">(Skala nilai 1-100)</i></label>
																</div>
																<div class="form-group col-sm-4 form-default form-static-label">
																	<input id="uploadFile" name="file" class="form-bg-null" placeholder="name file..." disabled />
																	<div class="fileUpload btn btn-mini btn-grd-inverse">
																		<span>Choose file</span>
																		<input id="uploadBtn" type="file" name="file" class="upload" />
																	</div>
																</div>
															</div>
															<div class="form-group form-default row">
																<div class="form-group col-sm-12 form-default form-static-label">
																	<textarea name="note" id="catatanPendadaran" required=""></textarea>
																</div>
															</div>
															<div class="form-group form-default row">
																<button type="submit" class="btn btn-mini btn-outline-primary"><i class="ti-save"></i> Save hasil pendadaran</button>
															</div>
														</div>
													</div>
												</div>
												<?= form_close();?>
												<!-- </form> -->
											</div>
										</div>
										<div class="col-sm-12 col-xl-12 card-block text-center">
											<h5 class="sub-title">Laporan akhir</h5>
											<?php foreach($Data as $row):?>
												<?php if($row->laporan_akhir == 0):?>
													<h6>Data not available</h6>
												<?php else:?>
													<object data="<?=base_url('_uploads/laporanakhir/'.$row->nameStudent.'/'.$row->laporan_akhir);?>" width="100%" height="500"></object>
												<?php endif;?>
											<?php endforeach;?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<style>
			.fileUpload {
				position: relative;
				overflow: hidden;
				margin: 10px;
			}

			.fileUpload input.upload {
				position: absolute;
				top: 0;
				right: 0;
				margin: 0;
				padding: 0;
				font-size: 20px;
				cursor: pointer;
				opacity: 0;
				filter: alpha(opacity=0);
			}
		</style>
		<script type="text/javascript">
			document.getElementById("uploadBtn").onchange = function() {
				document.getElementById("uploadFile").value = this.value;
			};
		</script>
		<script src="<?php echo base_url('assets/js/jquery-3.3.1.js');?>"></script>
		<script src="<?php echo base_url('assets/bootstrap/bootstrap.bundle.js');?>"></script>
		<script src="<?php echo base_url('assets/ckeditor/ckeditor.js');?>"></script>
		<script type="text/javascript">
			$(function() {
				CKEDITOR.replace('catatanPendadaran', {
					filebrowserImageBrowseUrl: '<?php echo base_url('assets/kcfinder/browse.php');?>',
					height: '100px'
				});
			});
		</script>