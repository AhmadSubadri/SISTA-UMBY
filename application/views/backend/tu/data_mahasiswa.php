<div class="col-xl-12">
	<div class="card">
		<div class="card-header">
			<h5>Data mahasiswa skripsi</h5>
			<div class="card-header-right">
				<a href="" class="btn btn-mini btn-outline-primary">+ Data mahasiswa</a>
			</div>
		</div>
		<div class="card-block">
			<div class="row">
				<div class="col-sm-12 col-xl-3 sub-title text-primary">
					# Profil
				</div>
				<div class="col-sm-12 col-xl-4 sub-title text-primary">
					Hash password
				</div>
				<div class="col-sm-12 col-xl-2 sub-title text-primary">
					Program studi
				</div>
				<div class="col-sm-12 col-xl-1 sub-title text-primary">
					Class
				</div>
				<div class="col-sm-12 col-xl-2 sub-title text-primary">
					Aksi
				</div>
				<!-- Data -->
				<?php $i=1; foreach($Data as $row):?>
					<div class="col-sm-12 col-xl-3 sub-title">
						<div class="media">
							<label class="badge-top-right"><?=$i++;?>.</label>
							<?php if($row->image == null):?>
								<img class="img-radius img-40 align-top m-r-15"
								src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
							<?php else:?>
								<img src="<?php echo base_url('_uploads/profile/student/').$row->image;?>" alt="user image"
								class="img-radius img-40 align-top m-r-15">
							<?php endif;?>
							<div class="media-body align-middle">
								<!-- <h6 class="text-primary"></h6> -->
								<?= $row->fullname;?> / <?= $row->username;?><br>
								<label class="text-primary"><?= $row->email;?></label>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-xl-4 sub-title">
						<?= $row->password;?>
					</div>
					<div class="col-sm-12 col-xl-2 sub-title">
						<?= $row->major;?>
					</div>
					<div class="col-sm-12 col-xl-1 sub-title">
						<?= $row->class;?>
					</div>
					<div class="col-sm-12 col-xl-2 sub-title">
						<a href="" class="btn btn-mini btn-outline-primary"><i class="ti-eye"></i></a>
						<a href="" class="btn btn-mini btn-outline-warning"><i class="ti-pencil"></i></a>
					</div>
				<?php endforeach;?>
			</div>
		</div>
	</div>
</div>