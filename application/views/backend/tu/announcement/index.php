<?php $this->load->view('backend/partials_/alert_success.php');?>
<div class="col-xl-12">
	<div class="card">
		<div class="card-header">
			<h5>Data Announcement</h5>
			<div class="card-header-right">
				<a href="" class="btn btn-mini btn-outline-primary" id="Modal-Tourist" data-toggle="modal" data-target="#modalTambahann">+ Tambah Announcement</a>
			</div>
		</div>
		<div class="card-block">
			<div class="row">
				<div class="col-sm-12 col-xl-3 sub-title text-primary">#Judul</div>
				<div class="col-sm-12 col-xl-5 sub-title text-primary">Deskripsi</div>
				<div class="col-sm-12 col-xl-2 sub-title text-primary">File</div>
				<div class="col-sm-12 col-xl-2 sub-title text-primary">Aksi</div>
				<!-- Data -->
				<?php if(count($Data) != 0):?>
					<?php $i=1;foreach($Data as $announc):?>
						<div class="col-sm-12 col-xl-3 sub-title"><?= $announc->title;?></div>
						<div class="col-sm-12 col-xl-5 sub-title">
							<?php if ( str_word_count($announc->description) > 10 ):
								echo substr($announc->description,0,100)."...<a id='Modal-Tourist' data-toggle='modal' data-target='#editann$announc->id' class='text-primary'><u>read more</u></a>";?>
							<?php else :?>
								<?= $announc->description ;?>
							<?php endif;?>
						</div>
						<div class="col-sm-12 col-xl-2 sub-title">
							<a href="<?=base_url('_uploads/announcement/'.$announc->file);?>" target="_blank" class="btn btn-mini btn-outline-primary"><i class="ti-download"></i> Download</a>
						</div>
						<div class="col-sm-12 col-xl-2 sub-title">
							<a href="" class="btn btn-mini btn-outline-primary" id="Modal-Tourist" data-toggle="modal" data-target="#editann<?= $announc->id;?>"><i class="ti-pencil"></i>Edit</a>
							<a href="<?= site_url('Announcement/delete-announcement/'.$announc->id);?>" class="btn btn-mini btn-outline-danger"><i class="ti-trash"></i>Delete</a>
						</div>
						<!-- Modal insert Requirements -->
						<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="editann<?= $announc->id;?>" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Update announcement's</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<?= form_open_multipart('Announcement/update-announcement/'.$announc->id); ?>
										<div class="modal-body">
											<div class="form-group row">
												<label class="col-sm-1 col-form-label">Judul</label>
												<div class="col-sm-11">
													<input type="hidden" name="pengupload" class="form-control" value="<?= $this->session->userdata('name');?>">
													<input type="text" name="judul" class="form-control" value="<?= $announc->title;?>">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-1 col-form-label">Deskripsi</label>
												<div class="col-sm-11">
													<textarea name="announcement" id="announcementedit" style="width: 100%;"><?= $announc->description;?></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-1 col-form-label">File</label>
												<div class="col-sm-11">
													<input type="file" name="file" class="form-control"><br>
													<?php if($announc->file != null):?>
														<object data="<?=base_url('_uploads/announcement/'.$announc->file);?>" width="300" height="150"></object>
													<?php else:?>
														<object data="<?=base_url('_uploads/announcement/no_image.jpg');?>" width="80" height="80"></object>
													<?php endif;?>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-mini btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-mini btn-primary">Update announcement</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					<?php endforeach;?>
				<?php else:?>
					<div class="col-sm-12 col-xl-12 sub-title text-center">Data not availabel</div>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>

<!-- Modal insert Requirements -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modalTambahann" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Create announcement's</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open_multipart('Announcement/save-announcement'); ?>
			<div class="modal-body">
				<div class="form-group row">
					<label class="col-sm-1 col-form-label">Judul</label>
					<div class="col-sm-11">
						<input type="hidden" name="pengupload" class="form-control" value="<?= $this->session->userdata('name');?>">
						<input type="text" name="judul" class="form-control" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-1 col-form-label">Deskripsi</label>
					<div class="col-sm-11">
						<textarea name="announcement" id="announcement" required=""></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-1 col-form-label">File</label>
					<div class="col-sm-11">
						<input type="file" name="file" class="form-control" required>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-mini btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-mini btn-primary">Save announcement</button>
			</div>
		</form>
	</div>
</div>
</div>

<script src="<?php echo base_url('assets/js/jquery-3.3.1.js');?>"></script>
<script src="<?php echo base_url('assets/bootstrap/bootstrap.bundle.js');?>"></script>
<script src="<?php echo base_url('assets/ckeditor/ckeditor.js');?>"></script>
<script type="text/javascript">
	$(function() {
		CKEDITOR.replace('announcement', {
			filebrowserImageBrowseUrl: '<?php echo base_url('assets/kcfinder/browse.php');?>',
			height: '100px'
		});
	});

	$(function() {
		CKEDITOR.replace('announcementedit', {
			filebrowserImageBrowseUrl: '<?php echo base_url('assets/kcfinder/browse.php');?>',
			height: '100px'
		});
	});
</script>