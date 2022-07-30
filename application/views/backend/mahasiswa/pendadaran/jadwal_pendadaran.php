<div class="col-xl-12">
	<div class="card">
		<div class="card-header" style="background-color: #75A8FE;">
			<h5 style="color: white;">JADWAL PENDADARAN</h5>
		</div>
		<div class="card-block">
			<div class="row sub-title">
				<div class="col-sm-12 col-xl-4">
					<p class="sub-title">Profil mahasiswa</p>
					<div class="media">
						<?php if($this->session->userdata('image') == null):?>
							<img class="img-radius img-40 align-top m-r-15"
							src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
						<?php else:?>
							<img src="<?php echo base_url('_uploads/profile/student/').$this->session->userdata('image');?>" alt="user image" class="img-radius img-40 align-top m-r-15" width="40px" height="40px">
						<?php endif;?>
						<div class="media-body">
							<h6 class="text-primary"><?= $this->session->userdata('name');?>/<?= $this->session->userdata('username');?></h6>
							Email : <?= $this->session->userdata('email');?><br>
							No : <?= $this->session->userdata('phone');?>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-xl-4">
					<p class="sub-title">Profil penguji pendadaran</p>
					<?php if(count($DataPenguji) != 0):?>
						<?php foreach($DataPenguji as $penguji):?>
	                       	<i class="icofont ti-angle-double-right text-success"></i> <?= $penguji->nameLecturer;?><br>
						<?php endforeach;?>
					<?php else:?>
						<label class="label label-mini label-danger">Belum ada dosen penguji</label>
					<?php endif;?>
				</div>
				<div class="col-sm-12 col-xl-4">
					<p class="sub-title">Jadwal pendadaran</p>
					
						<?php foreach($DataJadwal as $jadwal):?>
						<?php if($jadwal->date != 0):?>
							<?php if(format_tanggal(date($jadwal->date)) == format_tanggal(date('Y-m-d'))):?>
								<span class="text-danger" id="warningjadwal">Hari ini : <?php echo format_tanggal(date($jadwal->date));?></span><br>Jam : <?= $jadwal->time;?><br>
							<?php else:?>
								Hari/tgl : <span class="text-primary"><?php echo format_tanggal(date($jadwal->date));?></span><br>
								Jam : <?= $jadwal->time;?><br>
							<?php endif;?>
								Kegiatan : <?= $jadwal->kegiatan;?><br>
								Lokasi : <?= $jadwal->tempat;?>
						<?php else:?>
							<label class="label label-mini label-danger">Belum ada jadwal ujian</label>
						<?php endif;?>
						<?php endforeach;?>
					
				</div>
			</div>
		</div>
	</div>
</div>

<style type="text/css">
	#warningjadwal {
  animation: blinker2 0.6s cubic-bezier(1, 0, 0, 1) infinite alternate;  
}
@keyframes blinker2 { to { opacity: 0; } }
</style>