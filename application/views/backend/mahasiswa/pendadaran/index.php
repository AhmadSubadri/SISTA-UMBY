<div class="col-xl-12">
	<div class="card">
		<div class="card-header">
			<h6>Unggah dokumen syarat pendadaran</h6>
		</div>
		<div class="card-block">
			<div class="row">
				<div class="col-sm-12 col-xl-8 sub-title">
					#Jenis dokumen
				</div>
				<div class="col-sm-12 col-xl-2 sub-title text-center">
					Status
				</div>
				<div class="col-sm-12 col-xl-2 sub-title text-center">
					Aksi
				</div>
				<!-- Data -->
				<?php if(count($Data) != 0):?>
					<?php $i=1; foreach($DataSyarat as $syarat):?>
					<div class="col-sm-12 col-xl-8">
						<b><?= $i++;?>. <?= $syarat->requirements;?><i class="text-danger">(wajib)</i></b>
					</div>
					<div class="col-sm-12 col-xl-2 text-center">
						<label class="label label-mini label-danger">Belum upload</label>
						<label class="label label-mini label-danger"><i class="ti-alert"></i></label>
					</div>
					<div class="col-sm-12 col-xl-2">
						<a href="" class="btn btn-mini btn-outline-success"><i class="ti-eye"></i> Lihat</a>
						<input type="file" name="file" class="form-bg-null" placeholder="name file..."
						hidden />
						<div class="fileUpload btn btn-mini btn-outline-primary">
							<span><i class="ti-upload"></i> Upload</span>
							<input id="uploadBtn" type="file" name="file" class="upload" />
						</div>
					</div>
					<div class="sub-title col-sm-12 col-xl-12"></div>
					<?php endforeach;?>
				<?php else:?>
					<div class="sub-title col-sm-12 col-xl-12 text-center">Data not availabel</div>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>

<style>
	.fileUpload {
		position: relative;
		overflow: hidden;
		/*margin: 10px;*/
	}

	.fileUpload input.upload {
		position: absolute;
		top: 0;
		right: 0;
		margin: 0;
		padding: 0;
		font-size: 20px;
		cursor: pointer;
		opacity: 0;
		filter: alpha(opacity=0);
	}
</style>
<script type="text/javascript">
	document.getElementById("uploadBtn").onchange = function() {
		document.getElementById("uploadFile").value = this.value;
	};
</script>