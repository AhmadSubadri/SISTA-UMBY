<div class="col-xl-12">
	<div class="card">
		<div class="card-block">
			<p class="text-danger"><b>Note.</b> Data dibawah ini merupakan daftar mahasiswa yang sudah melakukan<code>pendaftaran dan upload</code>syarat pendadaran.</p>
		</div>
	</div>
</div>
<div class="col-xl-12">
	<div class="card">
		<div class="card-header">
			<h6>Daftar mahasiswa siap ploting penguji</h6>
			<div class="card-header-right">
				<a href="" class="btn btn-mini btn-outline-primary" id="Modal-Tourist" data-toggle="modal" data-target="#modalPendadaran">+ Ploting dosen penguji pendadaran</a>
			</div>
		</div>
		<div class="card-block">
			<div class="row">
				<div class="col-sm-12 col-xl-4 sub-title">
					# profil
				</div>
				<div class="col-sm-12 col-xl-4 sub-title">
					Jadwal
				</div>
				<div class="col-sm-12 col-xl-4 sub-title">
					Penguji
				</div>
				<!-- Data -->
				<?php if(!empty($Data)):?>
					<?php foreach($Data as $data):?>
						<div class="col-sm-12 col-xl-4 sub-title">
							<div class="media sub-title">
								<?php if($data->image == null):?>
									<img class="img-radius img-40 align-top m-r-15"
									src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
								<?php else:?>
									<img src="<?php echo base_url('_uploads/profile/student/').$row->image;?>" alt="user image"
									class="img-radius img-40 align-top m-r-15">
								<?php endif;?>
								<div class="media-body">
									<h6 class="text-primary"><?= $data->nameStudent;?></h6>
									<?= $data->nim;?>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-xl-4 sub-title">
							Nilai
						</div>
						<div class="col-sm-12 col-xl-4 sub-title">
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
	</div>
</div>

<!-- Modal insert Requirements -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modalPendadaran" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="exampleModalLabel">Ploting penguji pedadaran</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="form-material" action="<?= site_url("dsn/dashboard/insert-syarat")?>" method="post" id="savedata">
				<div class="modal-body">
					<div class="form-group form-default row">
						<div class="col-sm-6">
							<input type="date" name="tanggal" class="form-control" required="">
							<span class="form-bar"></span>
						</div>
						<div class="col-sm-6">
							<input type="text" name="tempat" class="form-control" required="">
							<span class="form-bar"></span>
							<label class="float-label">Tempat</label>
						</div>
					</div>
					<a class="waves-effect waves-light text-primary" id="newcolumn">+ Create column</a>
					<table class="table table-bordered" id="tableLoop">
						<input type="text" name="major" value="<?= $this->session->userdata("major")?>" hidden>
						<tbody></tbody>
					</table>
					<div class="form-group form-default row">
						<div class="col-sm-4">
							<input type="text" name="mahasiswa" class="form-control" required="">
							<span class="form-bar"></span>
							<label class="float-label">Mahasiswa</label>
						</div>
						<div class="col-sm-4">
							<input type="text" name="penguji" class="form-control" required="">
							<span class="form-bar"></span>
							<label class="float-label">Penguji</label>
						</div>
						<div class="col-sm-4">
							<input type="time" name="jam" class="form-control" required="">
							<span class="form-bar"></span>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-mini btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-mini btn-primary">Save penjadwalan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="<?php echo base_url()?>assets/js/modal-penjadwalan.js"></script>