<?php $this->load->view('backend/partials_/alert_success.php');?>
<div class="col-xl-12">
	<div class="card">
		<div class="card-block">
			<p class="text-danger"><b>Note.</b> Data dibawah ini merupakan daftar mahasiswa yang sudah melakukan<code>pendaftaran dan upload</code>syarat pendadaran.</p>
		</div>
	</div>
</div>
<div class="col-xl-12">
	<div class="card">
		<div class="card-header">
			<h6>Daftar mahasiswa siap ploting penguji</h6>
		</div>
		<div class="card-block">
			<div class="row sub-title">
				<div class="col-sm-12 col-xl-3 sub-title">
					# profil
				</div>
				<div class="col-sm-12 col-xl-3 sub-title">
					Jadwal
				</div>
				<div class="col-sm-12 col-xl-4 sub-title">
					Penguji
				</div>
				<div class="col-sm-12 col-xl-2 sub-title">
					Aksi
				</div>
				<!-- Data -->
				<?php if(!empty(count($Data->result()))):?>
					<?php $j=1; foreach($Data->result() as $data => $val):?>
						<div class="col-sm-12 col-xl-3">
							<div class="media">
								<label class="badge-top-right"><?=$j++;?>.</label>
								<?php if($val->image == null):?>
									<img class="img-radius img-40 align-top m-r-15"
									src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
								<?php else:?>
									<img src="<?php echo base_url('_uploads/profile/student/').$row->image;?>" alt="user image"
									class="img-radius img-40 align-top m-r-15">
								<?php endif;?>
								<div class="media-body align-middle">
									<h6 class="text-primary"></h6>
									<?= $val->nameStudent;?> / <?= $val->username;?>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-xl-3">
							<?php if($val->tempat == null):?>
								<label class="label label-mini label-danger">Belum ada jadwal</label>
							<?php else:?>
								<?php if(format_tanggal(date($val->date)) == format_tanggal(date('Y-m-d'))):?>
								<span class="text-danger" id="warningText">Hari ini : <?php echo format_tanggal(date($val->date));?></span><br>Jam : <?= $val->time;?><br>
								<?php else:?>
								Hari/tgl : <span class="text-primary"><?php echo format_tanggal(date($val->date));?></span><br>
								Jam : <?= $val->time;?><br>
								<?php endif;?>
								Kegiatan : <?= $val->kegiatan;?><br>
								Lokasi : <?= $val->tempat;?>
							<?php endif;?>
						</div>
						<div class="col-sm-12 col-xl-4">
							<?php
							$penguji = $this->db->select('l.fullname as nameLecturer, d.penguji')->where('d.id_thesisreceived', $val->id)->from('tb_detail_pendadaran d')->join('tb_lecturers l', 'l.username = d.penguji')->get()->result();
							?>
							<?php if (!empty(count($penguji))):?>
								<?php $i=1; foreach($penguji as $nama):?>
								<?= $i++;?>. <?= $nama->nameLecturer;?><br>
							<?php endforeach;?>
							<?php else:?>
								<label class="label label-mini label-danger">Belum ada penguji</label>
							<?php endif;?>
						</div>
						<div class="col-sm-12 col-xl-2">
							<?php if (!empty(count($penguji))):?>
								<a href="" class="btn btn-mini btn-outline-primary" id="Modal-Tourist" data-toggle="modal" data-target="#modalEditPendadaran<?=$val->id;?>">Edit ploting</a>
							<?php else:?>
								<a href="" class="btn btn-mini btn-outline-primary" id="Modal-Tourist" data-toggle="modal" data-target="#modalPendadaran<?=$val->id;?>">Ploting</a>
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

<?php foreach($Data->result_array() as $i):
        $id = $i['id'];
        $nim = $i['username'];
?>
<!-- Modal insert Requirements -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modalPendadaran<?=$id;?>" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="exampleModalLabel">Ploting penguji pedadaran</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="form-material" action="<?= site_url('dsn/dashboard/insert-penguji-pendadaran')?>" method="post" id="savedata">
				<div class="card">
					<div class="card-block">
						<div class="modal-body">
							<div class="form-group form-default row">
								<input type="text" name="nim" value="<?= $nim;?>" hidden>
								<input type="text" name="id_Thesis" value="<?= $id;?>" hidden>
								<input type="text" name="kegiatan" value="Sidang pendadaran" hidden>
								<input type="text" name="major" value="<?= $this->session->userdata("major")?>" hidden>
								<div class="form-group col-sm-6 form-default form-static-label">
		                            <input type="date" name="tanggal" class="form-control" required="">
		                            <span class="form-bar"></span>
		                            <label class="float-label text-primary">Tanggal pelaksanaan</label>
		                        </div>
		                        <div class="form-group col-sm-6 form-default form-static-label">
		                            <input type="time" name="jam" class="form-control" required="">
		                            <span class="form-bar"></span>
		                            <label class="float-label text-primary">Jam pelaksanaan</label>
		                        </div>
							</div>
							<label class="text-primary">Dosen penguji</label>
							<div class="form-group row">
								<div class="form-group col-sm-6 form-default form-static-label">
		                            <?php foreach($DataDosen as $dosen):?>
									<input type="checkbox" name="penguji[]" value="<?=$dosen->username;?>">
									<label><?= $dosen->fullname;?></label><br>
									<?php endforeach;?>
		                        </div>
		                        <div class="form-group col-sm-6 form-default form-static-label">
		                            <input type="text" name="tempat" class="form-control" required="" placeholder="Ruang 152">
		                            <span class="form-bar"></span>
		                            <label class="float-label text-primary">Tempat</label>
		                        </div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-mini btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-mini btn-primary">Save penjadwalan</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach;?>

<?php foreach($Data->result_array() as $i):
        $id = $i['id'];
        $nim = $i['username'];
        $tempat = $i['tempat'];
        $tanggal = $i['date'];
        $jam = $i['time'];
?>
<!-- Modal insert Requirements -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modalEditPendadaran<?=$id;?>" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="exampleModalLabel">Update ploting penguji pedadaran</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="form-material" action="<?= site_url('dsn/dashboard/update-penguji-pendadaran')?>" method="post" id="savedata">
				<div class="card">
					<div class="card-block">
						<div class="modal-body">
							<div class="form-group form-default row">
								<input type="text" name="nim" value="<?= $nim;?>" hidden>
								<input type="text" name="id_Thesis" value="<?= $id;?>" hidden>
								<input type="text" name="kegiatan" value="Sidang pendadaran" hidden>
								<input type="text" name="major" value="<?= $this->session->userdata("major")?>" hidden>
								<div class="form-group col-sm-6 form-default form-static-label">
		                            <input type="date" name="tanggal" class="form-control" value="<?= $tanggal;?>" required="">
		                            <span class="form-bar"></span>
		                            <label class="float-label text-primary">Tanggal pelaksanaan</label>
		                        </div>
		                        <div class="form-group col-sm-6 form-default form-static-label">
		                            <input type="time" name="jam" class="form-control" value="<?= $jam;?>" required="">
		                            <span class="form-bar"></span>
		                            <label class="float-label text-primary">Jam pelaksanaan</label>
		                        </div>
							</div>
							<label class="text-primary">Dosen penguji</label>
							<div class="form-group row">
								<div class="form-group col-sm-6 form-default form-static-label">
			                            <?php foreach($DataDosen as $all):?>
										<?php $uji = $this->db->select('penguji')->from('tb_detail_pendadaran')->where('penguji', $all->username)->where('nim', $nim)->get()->row_array();?>
											<input type="checkbox" name="penguji[]" value="<?=$all->username;?>" <?php if($all->username == $uji['penguji']){echo "checked";}?>>
											<label><?= $all->fullname;?></label><br>
										<?php endforeach;?>
		                        </div>
		                        <div class="form-group col-sm-6 form-default form-static-label">
		                            <input type="text" name="tempat" class="form-control" required="" value="<?= $tempat;?>">
		                            <span class="form-bar"></span>
		                            <label class="float-label text-primary">Tempat</label>
		                        </div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-mini btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-mini btn-primary">Update penjadwalan</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach;?>

<style type="text/css">
	#warningText {
  animation: blinker2 0.6s cubic-bezier(1, 0, 0, 1) infinite alternate;  
}
@keyframes blinker2 { to { opacity: 0; } }
</style>
<!-- <span class="berkedip">TEKS BERKEDIP</span> -->