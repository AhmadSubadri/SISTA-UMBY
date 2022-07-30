<div class="col-xl-12">
	<a href="<?= site_url('TU/dashboard/hasil-pendadaran');?>" class="btn btn-mini"><i
		class="ti-back-left"></i>Kembali</a>
		<div class="card">
			<div class="card-header" style="background-color: #75A8FE;">
				<h5 style="color: white;">DETAIL DATA HASIL PENDADARAN MAHASISWA</h5>
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
									class="img-radius img-40 align-top m-r-15" width="40px" height="40px">
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
									<img src="<?php echo base_url('_uploads/profile/staff/').$row->imageDosen;?>" alt="user image" class="img-radius img-40 align-top m-r-15" width="40px" height="40px">
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
										<div class="col-sm-12 col-xl-3 sub-title text-primary">
											# Penguji
										</div>
										<div class="col-sm-12 col-xl-2 sub-title text-primary">
											Status
										</div>
										<div class="col-sm-12 col-xl-2 sub-title text-center text-primary">
											Nilai
										</div>
										<div class="col-sm-12 col-xl-5 sub-title text-primary">
											Catatan
										</div>
										<!-- Data -->
										<?php if( !empty($DetailPenguji) ):?>
											<?php $i=1; foreach($DetailPenguji as $data):?>
											<div class="col-sm-12 col-xl-3 sub-title">
												<?= $i++?>. <?= $data->fullname;?>
											</div>
											<div class="col-sm-12 col-xl-2 sub-title">
												<?php if($data->status == 0):?>
													<label class="label label-mini label-warning">Belum ada status</label>
												<?php elseif($data->status == 1):?>
													<label class="label label-mini label-success">Lulus</label>
												<?php elseif($data->status == 2):?>
													<label class="label label-mini label-danger">Mengulang pendadaran periode berikutnya</label>
												<?php elseif($data->status == 3):?>
													<label class="label label-mini label-primary">Menunggu (panding)</label>
												<?php else:?>
													<label class="label label-mini label-danger">Mengulang skripsi semester depan</label>
												<?php endif;?>
											</div>
											<div class="col-sm-12 col-xl-2 sub-title text-center">
												<?php if($data->nilai == null):?>
													<label class="label label-mini label-warning">Belum ada nilai</label>
												<?php else:?>
													<h6><?= $data->nilai;?></h6>
												<?php endif;?>
											</div>
											<div class="col-sm-12 col-xl-5 sub-title">
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
						<a class="accordion-msg bg-dark-primary b-none waves-effect waves-light">Kirim pengumuman form revisi hasil ujian pendadaran kepada mahasiswa</a>
						<div class="accordion-desc">
							<div class="row">
								<div class="col-sm-12 col-xl-12 sub-title">
									<!-- <form class="form-material" method="post" id="savedata"> -->
										<?= form_open_multipart('TU/dashboard/save-pengumuman-pendadaran-tu'); ?>
										<div class="card">
											<div class="form-material">
												<div class="card-block">
													<?php foreach($Data as $dt):?>
														<input type="text" name="nim" class="form-control" value="<?= $dt->nim;?>" hidden>
													<?php endforeach;?>
													<!-- <div class="form-group form-default row"> -->
														<!-- <div class="form-group col-sm-6 form-default form-static-label"> -->
															<?php $notnull = count($MeanNilai);?>
															<?php $sum = 0; foreach($MeanNilai as $as):?>
															<?php $sum += str_replace(",", "", $as->total);
															$hasil = $sum/$notnull;
															?>
														<?php endforeach;?>
															<input type="hidden" name="nilaiangka"
															value="<?php if($notnull != 0):?><?php if($hasil >= 50):echo number_format($hasil,1);else:echo number_format($hasil,1);endif;?><?php else:?>0<?php endif;?>" class="form-control" readonly>
														<!-- </div> -->
														<!-- <div class="form-group col-sm-6 form-default form-static-label text-center"> -->
															<input type="hidden" name="nilaihuruf"
															value="<?php if($notnull != 0):?><?php if($hasil >= 85):
																echo "A";
															elseif($hasil >= 80 && $hasil <=84.99):
																echo "A-";
															elseif($hasil >= 70 && $hasil <= 79.99):
																echo "B+";
															elseif($hasil >= 65 && $hasil <= 69.99):
																echo "B";
															elseif($hasil >= 60 && $hasil <= 64.99):
																echo "B-";
															elseif($hasil >= 50 && $hasil <= 59.99):
																echo "C+";
															elseif($hasil >= 40 && $hasil <= 49.99):
																echo "C";
															elseif($hasil >= 20 && $hasil <=39.99):
																echo "D";
															elseif($hasil <= 19.99):
																echo "E";
															else:
																echo "NULL";
															endif;?><?php else:?>-<?php endif;?>" class="form-control" readonly required="">
														<!-- </div> -->
													<!-- </div> -->
													<div class="form-group form-default row">
														<label class="col-sm-1 col-form-label text-primary">Status</label>
														<select name="status" class="form-control" required>
									                        <option value="1">Approved revisi</option>
									                        <option value="3">Menunggu (dalam masa revisi)</option>
									                        <option value="2">Mengulang pendadaran periode berikutnya</option>
									                        <option value="4">Mengulang skripsi semester depan</option>
									                    </select>
													</div>
													<div class="form-group form-default row">
														<div class="form-group col-sm-12 form-default form-static-label">
															<textarea name="note" id="catatanPengumuman" required=""></textarea>
														</div>
													</div>
													<div class="form-group form-default row">
														<button type="submit" class="btn btn-mini btn-outline-primary"><i class="ti-save"></i> Kirim pengumuman hasil pendadaran</button>
													</div>
												</div>
											</div>
										</div>
										<?= form_close();?>
										<!-- </form> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url('assets/js/jquery-3.3.1.js');?>"></script>
<script src="<?php echo base_url('assets/bootstrap/bootstrap.bundle.js');?>"></script>
<script src="<?php echo base_url('assets/ckeditor/ckeditor.js');?>"></script>
<script type="text/javascript">
    $(function() {
        CKEDITOR.replace('catatanPengumuman', {
            filebrowserImageBrowseUrl: '<?php echo base_url('assets/kcfinder/browse.php');?>',
            height: '100px'
        });
    });
</script>