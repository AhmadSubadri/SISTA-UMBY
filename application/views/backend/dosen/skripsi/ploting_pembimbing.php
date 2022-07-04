<?php $this->load->view('backend/partials_/alert_success.php');?>
<div class="col-xl-12">
	<div class="card">
		<div class="card-block table-border-style">
			<h4 class="sub-title text-center">PLOTING DOSEN PEMBIMBING SKRIPSI</h4>
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
					<h6>Profil</h6>
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
					<div class="col-sm-12 col-xl-10">
						<ul>
							<li>
								<div class="media sub-title">
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
					<div class="col-sm-12 col-xl-2 text-center">
						<ul>
							<li>
								<input type="checkbox" class="form-check-input" name="nim[]" value="<?= $row['nim']; ?>">
							</li>
						</ul>
					</div>
				<?php endforeach;?>
			<?php endif;?>
		</div>
	</div>
</div>
</div>

<div class="col-xl-12">
	<div class="card">
		<div class="card-block table-border-style">
			<h4 class="sub-title text-center">PLOTING DOSEN PEMBIMBING SKRIPSI</h4>
			<div class="table-responsive">
				<table class="table table-hover m-b-0 without-header">
					<div class="form-group form-default form-static-label">
						<select name="nidn" class="form-control">
							<option value="opt1" class="disabled">- Pilih salah satu dosen pembimbing -</option>
							<?php foreach ($Datamentor->result() as $row):?>
								<option value="<?= $row->username;?>"><?= $row->fullname;?></option>
							<?php endforeach;?>
						</select>
					</div>
					<thead>
						<tr class="text-center">
							<th>#</th>
							<th>Profil</th>
							<th>Jadwal sempro</th>
							<th>Status sempro</th>
							<th width="10px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php if(count($thesisFix->result()) == null):?>
							<tr>
								<td colspan="5" class="col text-center">
									<h6>Data not available</h6>
								</td>
							</tr>
						<?php else:?>
							<?php $i=1; foreach($thesisFix->result_array() as $row):?>
							<tr>
								<th scope="row"><?= $i++;?></th>
								<td>
									<div class="media">
										<?php if($row['image'] == null):?>
											<img class="img-radius img-40 align-top m-r-15"
											src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
										<?php else:?>
											<img src="<?php echo base_url('_uploads/profile/student/').$row['image'];?>"
											alt="user image" class="img-radius img-40 align-top m-r-15">
										<?php endif;?>
										<div class="media-body">
											<h5 class="notification-user"><?= $row['nameStudent'];?></h5>
											<p class="notification-msg"><?= $row['nim'];?></p>
										</div>
									</div>
								</td>
								<td>

								</td>
								<td>
									Belum ploting
								</td>
								<td>
									Nama pembimbing
								</td>
							</tr>
						<?php endforeach;?>
					<?php endif;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>