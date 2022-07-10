<div class="col-xl-12">
	<div class="card">
		<div class="card-block">
			<p class="text-danger"><b>Note.</b> Data dibawah ini merupakan daftar mahasiswa yang sudah menyelesaikan masa bimbingan dan sudah di <code>Approved</code> oleh masing-masing pembimbing.</p>
		</div>
	</div>
</div>
<div class="col-xl-12">
	<div class="card">
		<div class="card-header">
			<h6>Data pendadaran</h6>
		</div>
		<div class="card-block">
			<div class="row">
				<div class="col-sm-12 col-xl-6 sub-title">
					# Profil
				</div>
				<div class="col-sm-12 col-xl-2 sub-title">
					Status daftar
				</div>
				<div class="col-sm-12 col-xl-2 sub-title">
					Status pendadaran
				</div>
				<div class="col-sm-12 col-xl-2 sub-title">
					Aksi
				</div>

				<?php $i=1; foreach($Data as $row):?>
					<div class="col-sm-12 col-xl-6 sub-title">
						<div class="media">
							<label class="badge-top-right"><?=$i++;?>.</label>
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
					<div class="col-sm-12 col-xl-2 sub-title">
						<?php if ($row->status_daftar != 0):?>
							<label class="label label-mini label-success">Sudah mendaftar</label>
						<?php else:?>
							<label class="label label-mini label-warning">Belum mendaftar</label>
						<?php endif;?>
					</div>
					<div class="col-sm-12 col-xl-2 sub-title">
						<?php if ($row->status_pendadaran == 0):?>
							<label class="label label-mini label-warning">Belum pendadaran</label>
						<?php elseif($row->status_pendadaran == 1):?>
							<label class="label label-mini label-success">Sudah pendadaran</label>
						<?php else:?>
							<label class="label label-mini label-primary">Sudah pengumuman</label>
						<?php endif;?>
					</div>
					<div class="col-sm-12 col-xl-2 sub-title">
						<?php if ($row->status_daftar != 0):?>
							<a href="<?= site_url('dsn/dashboard/detail-data-pendadaran/'.$row->id);?>" class="btn btn-mini btn-outline-primary">Lihat hasil</a>
						<?php else:?>
							<a href="" class="btn btn-mini btn-outline-danger btn-disabled disabled"><i class="ti-na"></i>Lihat hasil</a>
						<?php endif;?>
					</div>
				<?php endforeach;?>
			</div>
		</div>
	</div>
</div>