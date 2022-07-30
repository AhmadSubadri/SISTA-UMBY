<div class="col-xl-12">
	<div class="card">
		<div class="card-header" style="background-color: #75A8FE;">
			<h5 style="color: white;">PENGUMUMAN HASIL UJIAN PENDADARAN</h5>
		</div>
		<div class="card-block">
			<?php foreach($status as $data):?>
				<?php if($data->status_pendadaran == 3):?>
					<div class="text-center">
						<?php if ($data->status_pendadaran == 0):?>
							<label class="label label-mini label-warning">Belum pendadaran</label>
						<?php elseif($data->status_pendadaran == 1):?>
							<label class="label label-mini label-success">Sudah pendadaran</label>
						<?php elseif($data->status_pendadaran == 2):?>
							<label class="label label-mini label-primary">Sudah pengumuman</label>
						<?php else:?>
							<label class="label label-mini label-danger">Status anda Dalam proses revisi</label>
						<?php endif;?>
					</div><br><br>
					Catatan di bawah ini ada jika di beri catatan :
					<br>
					<br>
					<div class="row">
						<div class="col-sm-12 col-xl-4 sub-title text-primary">
							# Penguji
						</div>
						<div class="col-sm-12 col-xl-8 sub-title text-primary">
							Catatan
						</div>

						<!-- Data -->
						<?php foreach($DataPenguji as $hasil):?>
							<div class="col-sm-12 col-xl-4">
								<h6><i class="icofont ti-angle-double-right text-success"></i> <?= $hasil->nameLecturer;?></h6>
							</div>
							<div class="col-sm-12 col-xl-8">
								<h6><?= $hasil->note;?></h6>
							</div>
							<div class="col-sm-12 col-xl-12 sub-title"></div>

						<?php endforeach;?>
					</div>
				<?php elseif($data->status_pendadaran == 2):?>
					<div class="text-center">
						<?php if ($data->status_pendadaran == 0):?>
							<label class="label label-mini label-warning">Belum pendadaran</label>
						<?php elseif($data->status_pendadaran == 1):?>
							<label class="label label-mini label-success">Sudah pendadaran</label>
						<?php elseif($data->status_pendadaran == 2):?>
							<label class="label label-mini label-primary">Sudah pengumuman</label>
						<?php else:?>
							<label class="label label-mini label-danger">Status anda Dalam proses revisi</label>
						<?php endif;?>
					</div><br>
					<h6 class="sub-title">Hasil ujian pendadaran anda di nyatakan 
						<?php if($data->pernyataan == "Lulus"):?>
							<label class="label label-mini label-success"><?= $data->pernyataan;?></label>
						<?php else:?>
							<label class="label label-mini label-danger"><?= $data->pernyataan;?></label>
						<?php endif;?>
					</h6>
					Catatan di bawah ini ada jika di beri catatan :
					<br>
					<br>
					<div class="row">
						<div class="col-sm-12 col-xl-4 sub-title text-primary">
							# Penguji
						</div>
						<div class="col-sm-12 col-xl-8 sub-title text-primary">
							Catatan
						</div>

						<!-- Data -->
						<?php foreach($DataPenguji as $hasil):?>
							<div class="col-sm-12 col-xl-4">
								<h6><i class="icofont ti-angle-double-right text-success"></i> <?= $hasil->nameLecturer;?></h6>
							</div>
							<div class="col-sm-12 col-xl-8">
								<h6><?= $hasil->note;?></h6>
							</div>
							<div class="col-sm-12 col-xl-12 sub-title"></div>

						<?php endforeach;?>
					</div>
				<?php else:?>
					<h6 class="sub-title text-center text-danger">Belum ada pengumuman hasil ujian pendadaran</h6>
				<?php endif;?>
			<?php endforeach;?>
		</div>
	</div>
</div>