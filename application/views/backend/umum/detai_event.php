<div class="col-xl-12">
	<a href="<?= site_url('Dashboard');?>"><i class="ti-back-left"></i> Kembali</a>
	<div class="card">
		<div class="card-block">
			<?php foreach($Data as $dt):?>
				<h6><?= $dt->title;?></h6>
				<p align="justify"><?= $dt->description;?></p>
				<a href="<?= base_url('_uploads/announcement/'.$dt->file);?>" target="_blank" class="btn btn-mini btn-primary"><i class="ti-download"></i> Download</a>
			<?php endforeach;?>
		</div>
	</div>
</div>