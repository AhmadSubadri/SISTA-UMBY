<?php foreach($Data as $row):?>
	<?= $row->name;?>
<?php endforeach;?>

<div class="card">
	<div class="card-header">
		<?php foreach($Mahasiswa as $mhs):?>
			<div class="media">
				<?php if($mhs->image == null):?>
					<img class="img-radius img-40 align-top m-r-15"
					src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
				<?php else:?>
					<img src="<?php echo base_url('_uploads/profile/student/').$mhs->image;?>"
					alt="user image" class="img-radius img-40 align-top m-r-15">
				<?php endif;?>
				<div class="media-body">
					<h5 class="notification-user"><?= $mhs->fullname;?></h5>
					<p><?= $mhs->username;?></p>
				</div>
			</div>
			<div class="card-header-right">
				<p><?= $mhs->username;?></p>
			</div>
		<?php endforeach;?>
	</div>
	<div class="card-block" style="display:block; height:250px; overflow:auto;">
		ya kali<br>ya kali<br>ya kali<br>ya kali<br>ya kali<br>ya kali<br>ya kali<br>ya kali<br>ya kali<br>ya kali<br>ya kali<br>
		ya kali<br>
		ya kali<br>
		ya kali
		ya kali
		ya kali
		ya kali
		
	</div>
	<div class="card-footer">
		<form class="form-inline">
			<div class="form-group">
				<input name="file" class="form-bg-null" placeholder="name file..." hidden />
				<div class="fileUpload btn btn-sm btn-grd-inverse">
					<span><i class="ti-clip"></i> File</span>
					<input id="uploadBtn" type="file" name="file" class="upload" />
				</div>
			</div>
			<div class="form-group">
				<textarea class="form-control" id="uploadFile" name="message" class="form-control form-bg-default" required style="width: 540px"></textarea>
			</div>

			<button type="submit" class="btn btn-sm btn-grd-primary"><i class="ti-location-arrow"></i>Send</button>
		</form>
	</div>
</div>

<style>
	.fileUpload {
		position: relative;
		overflow: hidden;
		margin: 10px;
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