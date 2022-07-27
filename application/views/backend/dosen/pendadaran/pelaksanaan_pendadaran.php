<div class="col-xl-12">
	<?php $this->load->view('backend/partials_/alert_success.php');?>
	<div class="card">
		<div class="card-header" style="background-color: #FFE3C7;">
			<b>Note.</b> Data dibawah ini merupakan daftar mahasiswa yang akan anda uji sidang pendadaran, pastikan tanggal dan jam pelaksanaan pendadaran sudah di pahami.<code> Jika tanggal pelaksaan berkedip berwarna merah, itu menandakan ada jadwal sidang pendadaran untuk anda di hari ini.</code>
		</div>
		<div class="card-block">
			<h6 class="sub-title">Daftar mahasiswa siap anda uji pendadaran</h6>
			<div class="row sub-title">
				<div class="col-sm-12 col-xl-6 sub-title text-primary">
					# profil
				</div>
				<div class="col-sm-12 col-xl-3 sub-title text-primary">
					Jadwal
				</div>
				<div class="col-sm-12 col-xl-2 sub-title text-primary">
					status
				</div>
				<div class="col-sm-12 col-xl-1 sub-title text-primary">
					Aksi
				</div>
				<?php if(!empty(count($DataPendadaran->result()))):?>
					<?php $i=1; foreach($DataPendadaran->result() as $data):?>
					<div class="col-sm-12 col-xl-6">
						<div class="media">
							<label class="badge-top-right"><?=$i++;?>.</label>
							<?php if($data->image == null):?>
								<img class="img-radius img-40 align-top m-r-15"
								src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
							<?php else:?>
								<img src="<?php echo base_url('_uploads/profile/student/').$data->image;?>" alt="user image"
								class="img-radius img-40 align-top m-r-15">
							<?php endif;?>
							<div class="media-body align-middle">
								<h6 class="text-primary"><?= $data->fullname;?> / <?= $data->nim;?></h6>
								"<?= $data->title;?>"
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-xl-3">
					<?php if(format_tanggal(date($data->date)) == format_tanggal(date('Y-m-d'))):?>
					<span class="text-danger" id="warningText">Hari ini : <?php echo format_tanggal(date($data->date));?></span><br>Jam : <?= $data->time;?><br>
					<?php else:?>
						Hari/tgl : <span class="text-primary"><?php echo format_tanggal(date($data->date));?></span><br>
						Jam : <?= $data->time;?><br>
					<?php endif;?>
					Kegiatan : <?= $data->kegiatan;?><br>
					Lokasi : <?= $data->tempat;?>
					</div>
					<div class="col-sm-12 col-xl-2">
						<?php if ($data->status_pendadaran == 0):?>
							<label class="label label-mini label-warning">Belum pendadaran</label>
						<?php elseif($data->status_pendadaran == 1):?>
							<label class="label label-mini label-success">Sudah pendadaran</label>
						<?php elseif($data->status_pendadaran == 2):?>
							<label class="label label-mini label-primary">Sudah pengumuman</label>
						<?php else:?>
							<label class="label label-mini label-danger">Dalam proses revisi</label>
						<?php endif;?>
					</div>
					<div class="col-sm-12 col-xl-1">
						<?php if ($data->status_pendadaran == 0):?>
							<a href="<?= site_url('dsn/dashboard/detail-pelaksanaan-pendadaran/'.$data->id);?>" class="btn btn-mini btn-outline-primary">Ujian</a>
						<?php elseif($data->status_pendadaran == 1):?>
							<a href="<?= site_url('dsn/dashboard/detail-pelaksanaan-pendadaran/'.$data->id);?>" class="btn btn-mini btn-outline-primary">Edit hasil</a>
						<?php else:?>
							<a href="" class="btn btn-mini btn-outline-danger disabled"><i class="ti-na"></i>Done</a>
						<?php endif;?>
					</div>
					<div class="sub-title col-sm-12 col-xl-12"></div>
				<?php endforeach;?>
				<?php else:?>
				<div class="col-sm-12 col-xl-12 text-center">
					Data not availabel
				</div>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>

<style type="text/css">
	#warningText {
  animation: blinker2 0.6s cubic-bezier(1, 0, 0, 1) infinite alternate;  
}
@keyframes blinker2 { to { opacity: 0; } }
</style>