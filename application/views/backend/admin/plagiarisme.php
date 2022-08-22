<div class="col-xl-12">
	<div class="card">
		<div class="card-header">
			<h5>Switch button hide or show plagiarism</h5>
			<div class="card-header-right">
				<a href="" class="btn btn-mini btn-outline-primary"></a>
			</div>
		</div>
		<div class="card-block">
			<div class="row">
				<div class="col-sm-12 col-xl-2 sub-title text-primary"># Profile</div>
				<div class="col-sm-12 col-xl-8 sub-title text-primary">Judul</div>
				<div class="col-sm-12 col-xl-2 sub-title text-primary">Status</div>

				<!-- Data -->
				<?php foreach($Data as $row):?>
					<div class="col-sm-12 col-xl-2 sub-title"><?= $row->fullname;?> / <?= $row->username;?></div>
					<div class="col-sm-12 col-xl-8 sub-title"><?= $row->title;?></div>
					<div class="col-sm-12 col-xl-2 sub-title">
						<div class="onoffswitch">
							<input type="hidden" value="<?php echo $row->id; ?>"/>
							<input type="checkbox" class="js-switch"<?php if ($row->key_plag == 1) {echo "checked";}?> disabled>
							<?php if ($row->key_plag == 1) {echo "<a href='".site_url('Web/Public-proses-plagiarism/'.$row->id)."' class='btn btn-mini btn-outline-primary'>Public process</a>";}else{echo "<a href='".site_url('Web/Unpublic-proses-plagiarism/'.$row->id)."' class='btn btn-mini btn-outline-danger'>Unpublic process</a>";}?>
						</div>
					</div>
				<?php endforeach;?>
			</div>
		</div>
	</div>
</div>