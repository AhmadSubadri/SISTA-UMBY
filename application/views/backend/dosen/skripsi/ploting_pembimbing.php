<?php $this->load->view('backend/partials_/alert_success.php');?>
<div class="col-xl-12">
	<div class="card">
		<div class="card-block table-border-style">
			<h4 class="sub-title text-center">PLOTING DOSEN PEMBIMBING SKRIPSI</h4>
			<?= form_open_multipart('dsn/dashboard/save-ploting-dospem'); ?>
			<div class="form-group form-default form-static-label">
				<button type="submit" class="btn btn-grd-primary btn-mini waves-effect waves-light"><i class="ti-save"></i>Simpan ploting</button>
				<select name="nidn" class="form-control">
					<option value="opt1" class="disabled">- Pilih salah satu dosen pembimbing -</option>
					<?php foreach ($Datamentor->result() as $row):?>
						<option value="<?= $row->username;?>"><?= $row->fullname;?></option>
					<?php endforeach;?>
				</select>
			</div>
			<div class="row">
				<div class="col-sm-12 col-xl-10 sub-title">
					<h6># Profil</h6>
				</div>
				<div class="col-sm-12 col-xl-2 sub-title">
					<h6>Check box</h6>
				</div>
				<?php if(count($thesisFix->result()) == null):?>
					<div class="text-center">
						<h6>Data not available</h6>
					</div>
				<?php else:?>
					<?php $i=1; foreach($thesisFix->result_array() as $row):?>
					<div class="col-sm-12 col-xl-10 sub-title">
						<ul>
							<li>
								<div class="media">
									<?php if($row['image'] == null):?>
										<img class="img-radius img-40 align-top m-r-15"
										src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
									<?php else:?>
										<img src="<?php echo base_url('_uploads/profile/student/').$row->image;?>"
										alt="user image" class="img-radius img-40 align-top m-r-15">
									<?php endif;?>
									<div class="media-body">
										<h5 class=""><?= $row['nameStudent'];?> / <?= $row['nim'];?></h5><br>
										<h6>"<?= $row['title'];?>"</h6>
									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="col-sm-12 col-xl-2 text-center sub-title">
						<ul>
							<li>
								<input type="checkbox" class="filled-in" id="<?=$row['nim'];?>" name="id[ ]"
								value="<?=$row['nim'];?>" />
								<label for="<?=$row['nim'];?>"></label>
							</li>
						</ul>
					</div>
				<?php endforeach;?>
			<?php endif;?>
		</div>
		<?= form_close()?>
	</div>
</div>
</div>

<div class="col-xl-12">
	<div class="card">
		<div class="card-block table-border-style">
			<h4 class="sub-title text-center">DATA MAHASISWA DAN PEMBIMBING</h4>
			<div class="row">
				<div class="col-sm-12 col-xl-10 sub-title">
					<h6># Profil</h6>
				</div>
				<div class="col-sm-12 col-xl-2 sub-title">
					<h6>Pembimbing</h6>
				</div>
				<?php if(count($DataThesis->result()) == null):?>
					<div class="col-sm-12 col-xl-12 text-center">
						<h6>Data not available</h6>
					</div>
				<?php else:?>
					<?php $i=1; foreach($DataThesis->result_array() as $row):?>
					<div class="col-sm-12 col-xl-10 sub-title">
						<div class="media">
							<?php if($row['image'] == null):?>
								<img class="img-radius img-40 align-top m-r-15"
								src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
							<?php else:?>
								<img src="<?php echo base_url('_uploads/profile/student/').$row->image;?>"
								alt="user image" class="img-radius img-40 align-top m-r-15">
							<?php endif;?>
							<div class="media-body">
								<h5 class=""><?= $row['nameStudent'];?> / <?= $row['nim'];?></h5><br>
								<h6>"<?= $row['title'];?>"</h6>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-xl-2 sub-title">
						<h6 class=""><?= $row['nameLecturer'];?></h6>
					</div>
				<?php endforeach;?>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>