<div class="col-xl-12">
	<div class="card">
		<div class="card-header" style="background-color: #75A8FE;">
			<h5 style="color: white;">Pengumuman hasil ujian pendadaran</h5>
		</div>
		<div class="card-block">
			<div class="row">
				<div class="col-sm-12 col-xl-12">
					<h4 class="sub-title text-center">Pengumuman hasil sidang pendadaran</h4>
					<?php foreach($DataHasil as $hasil):?>
						<?php if($hasil->avarage == null):?>
							<h4 class="sub-title text-center"><label class="label label-mini label-danger text-center">Belum ada pengumuman hasil ujian</label></h4>
						<?php else:?>
							<?php $values = $hasil->avarage ;?>
							<h4 class="sub-title text-center">
								Hasil sidang pendadaran anda dengan nilai rata-rata 
								<?php
								if(number_format($values,1) >= 50):
									echo "<label class='text-primary'>".number_format($values,1)."</label>";
								else:
									echo "<label class='text-danger'>".number_format($values,1)."</label>";
								endif;?> dengan nilai huruf  
									<?php if(number_format($values,1) >= 50):?>
										<label class="text-primary">(<?= $hasil->letter_value;?>)</label> dan di nyatakan <u class='text-primary'>LULUS</u>
									<?php else:?>
										<label class="text-danger">(<?= $hasil->letter_value;?>)</label> dan di nyatakan <u class='text-danger'>TIDAK LULUS</u>"
									<?php endif;?>
							</h4>
							<?php if($hasil->catatan_akhir != null):?>
								<h6><b>Catatan : <?= $hasil->catatan_akhir;?></b></h6>
							<?php else:?>
								<label class="label label-mini label-warning">Tidak ada catatan akhir</label>
							<?php endif;?>
						<?php endif;?>
						<?php if($hasil->status_pendadaran == 2):?>
							<div class="row">
								<div class="col-sm-12 col-xl-4 sub-title">
									# Penguji sidang
								</div>
								<div class="col-sm-12 col-xl-8 sub-title">
									Catatan
								</div>
								<!-- Data -->
								<?php $i=1; foreach($DataPenguji as $penguji):?>
								<div class="col-sm-12 col-xl-4 sub-title">
									<?= $i++;?>. <?= $penguji->nameLecturer;?>
								</div>
								<div class="col-sm-12 col-xl-8 sub-title">
									<?php if($penguji->note != null):?>
										<?= $penguji->note;?>
									<?php else:?>
										<label class="label label-mini label-warning">Belum ada catatan</label>
									<?php endif;?>
								</div>
								<?php endforeach;?>
							</div>
						<?php else:?>

						<?php endif;?>
					<?php endforeach;?>
				</div>
			</div>
		</div>
	</div>
</div>