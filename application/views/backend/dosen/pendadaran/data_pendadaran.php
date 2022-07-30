<?php $this->load->view('backend/partials_/alert_success.php');?>
<div class="col-xl-12">
	<div class="card">
		<div class="card-header" style="background-color: #FFE3C7;">
			<b>Note.</b> Data dibawah ini merupakan daftar mahasiswa yang sudah menyelesaikan masa bimbingan dan sudah di <code>Approved</code> oleh masing-masing pembimbing.
		</div>
		<div class="card-block">
			<h6 class="sub-title">Data mahasiswa pendadaran</h6>
			<div class="row">
				<div class="col-sm-12 col-xl-6 sub-title text-primary">
					# Profil
				</div>
				<div class="col-sm-12 col-xl-2 sub-title text-primary">
					Status daftar
				</div>
				<div class="col-sm-12 col-xl-2 sub-title text-primary">
					Status pendadaran
				</div>
				<div class="col-sm-12 col-xl-2 sub-title text-primary">
					Aksi
				</div>
				<?php if(count($Data) != 0):?>
				<?php $i=1; foreach($Data as $row):?>
					<div class="col-sm-12 col-xl-6 sub-title">
						<div class="media">
							<label class="badge-top-right"><?=$i++;?>.</label>
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
					<div class="col-sm-12 col-xl-2 sub-title">
						<?php if ($row->status_daftar == 0):?>
							<label class="label label-mini label-warning">Belum mendaftar</label>
						<?php elseif($row->status_daftar == 1):?>
							<label class="label label-danger">Pemeriksaan dokumen</label>
						<?php else:?>
							<label class="label label-success">Dokumen approved</label>
						<?php endif;?>
					</div>
					<div class="col-sm-12 col-xl-2 sub-title">
						<?php if ($row->status_pendadaran == 0):?>
							<label class="label label-mini label-warning">Belum pendadaran</label>
						<?php elseif($row->status_pendadaran == 1):?>
							<label class="label label-mini label-success">Sudah pendadaran</label>
						<?php elseif($row->status_pendadaran == 2):?>
							<label class="label label-mini label-primary">Sudah pengumuman</label>
						<?php elseif($row->status_pendadaran == 4):?>
							<label class="label label-mini label-success">Revisi approved</label>
						<?php else:?>
							<label class="label label-mini label-danger">Dalam proses revisi</label>
						<?php endif;?>
					</div>
					<div class="col-sm-12 col-xl-2 sub-title">
						<?php if ($row->status_daftar == 0):?>
							<a href="" class="btn btn-mini btn-outline-danger btn-disabled disabled"><i class="ti-na"></i>Lihat hasil</a>
						<?php elseif($row->status_daftar == 1):?>
							<a href="" class="btn btn-mini btn-outline-danger btn-disabled disabled"><i class="ti-reload"></i>Checking data</a>
						<?php else:?>
							<a href="<?= site_url('dsn/dashboard/detail-data-pendadaran/'.$row->id);?>" class="btn btn-mini btn-outline-primary">Lihat hasil</a>
						<?php endif;?>
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