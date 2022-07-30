<div class="col-xl-12">
	<?php $this->load->view('backend/partials_/alert_success.php');?>
	<a href="<?= site_url('TU/dashboard/progres-yudisium-mahasiswa');?>" class=""><i class="ti-back-left"></i> Kembali</a>
	<div class="card">
		<div class="card-header" style="background-color: #75A8FE;">
			<h5 style="color: white;">Detail data dokumen pengajuan yudisium mahasiswa</h5>
		</div>
		<div class="card-block">
			<div class="row">
				<div class="col-sm-12 col-xl-6 sub-title text-primary">
					Profil Mahasiswa
				</div>
				<div class="col-sm-12 col-xl-6 sub-title text-primary">
					
				</div>
				<?php foreach($DataMhs as $mhs):?>
					<div class="col-sm-12 col-xl-12 sub-title">
						<div class="media">
							<?php if($mhs->image == null):?>
								<img class="img-radius img-40 align-top m-r-15"
								src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
							<?php else:?>
								<img src="<?php echo base_url('_uploads/profile/student/').$mhs->image;?>" alt="user image"
								class="img-radius img-40 align-top m-r-15">
							<?php endif;?>
							<div class="media-body">
								<h6 class="text-primary"><?= $mhs->fullname;?>/<?= $mhs->username;?></h6>
								<?= $mhs->email;?><br>
								<?= $mhs->phone;?>
							</div>
						</div>
					</div>
				<?php endforeach;?>
				<div class="col-sm-12 col-xl-6 sub-title text-primary">
					# Jenis dokumen
				</div>
				<div class="col-sm-12 col-xl-3 sub-title text-center text-primary">
					Dokumen
				</div>
				<div class="col-sm-12 col-xl-3 sub-title text-center text-primary">
					Aksi
				</div>
				<?php if(count($DataDokumen->result()) != 0):?>
					<?php foreach($DataDokumen->result() as $dock):?>
						<div class="col-sm-12 col-xl-6 sub-title">
							<?= $dock->requirements;?>
						</div>
						<div class="col-sm-12 col-xl-3 sub-title text-center">
							<a id="Modal-Tourist" data-toggle="modal" data-target="#modal_seea<?= $dock->idoc;?>" class="btn btn-mini btn-outline-success"><i class="ti-eye"></i> Lihat</a>
						</div>
						<div class="col-sm-12 col-xl-3 sub-title text-center text-primary">
							<?php if($dock->status == 0):?>
								<a onclick="fungsiAppA(<?= $dock->idoc;?>)" class="btn btn-mini btn-outline-primary"><i class="ti-check"></i>Approved</a>
								<a href="" class="btn btn-mini btn-outline-danger" id="Modal-Tourist" data-toggle="modal" data-target="#modal_revisi_yudisium<?= $dock->idoc;?>"><i class="ti-marker-alt"></i>Revisi</a>
							<?php else:?>
								<a href="" class="btn btn-mini btn-outline-success disabled"><i class="ti-check"></i>Dokumen approved</a>
							<?php endif;?>
						</div>
						<!-- modal see document -->
						<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modal_seea<?= $dock->idoc;?>" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Document syarat yudisium</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<object data="<?=base_url('_uploads/yudisium/'.$dock->fullname.'/'.$dock->file);?>" width="100%" height="500"></object>
								</div>
							</div>
						</div>

						<!-- modal revisi document -->
						<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modal_revisi_yudisium<?= $dock->idoc;?>" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Revisi document syarat yudisium</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form action="<?= site_url('TU/dashboard/kirim-revisi-dokumen-yudisium');?>" method="post">
										<div class="modal-body">
											<input type="text" name="penerima" value="<?= $dock->username;?>" hidden>
											<input type="text" name="namamhs" value="<?= $dock->fullname;?>" hidden>
											<input type="text" name="id" value="<?= $dock->idoc;?>" hidden>
											<input type="text" name="pengirim" value="<?= $this->session->userdata('name');?>" hidden>
											<input type="text" name="pesan" class="form-control" placeholder="pesan revisi dokumen">
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-mini btn-outline-primary"><i class="ti-save"></i>Kirim revisi</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					<?php endforeach;?>
				<?php else:?>
					<div class="col-sm-12 col-xl-12 sub-title text-center">
						<h6>Data not availabel</h6>
					</div>
				<?php endif;?>
			</div>
		</div>
	</div>	
</div>

<script type="text/javascript">
	function fungsiAppA(id) {
		$.ajax({
			type: "POST",
			url: '<?= site_url("TU/dashboard/approved-dokumen-yudisium")?>',
			data: {
				id: id
			},
			error: function(data) {
				alert("Something is wrong");
			},
			success: function(data) {
				$(document.location.reload(true));
			}
		});
	}
</script>