<?php $this->load->view('backend/partials_/alert_success.php');?>
<div class="col-xl-12">
	<div class="card">
		<div class="card-header" style="background-color: #FFE3C7;">
			<b>Note.</b> Data dibawah ini merupakan daftar mahasiswa yang sudah menyelesaikan masa sidang pendadaran dan di nyatakan <code>Lulus ujian pendadaran.</code>
		</div>
		<div class="card-block">
			<h6 class="sub-title">Data mahasiswa yudisium</h6>
			<div class="row">
				<div class="col-sm-12 col-xl-5 sub-title">
					# Profil
				</div>
				<div class="col-sm-12 col-xl-3 sub-title">
					Status daftar
				</div>
				<div class="col-sm-12 col-xl-2 sub-title">
					Progres dokumen
				</div>
				<div class="col-sm-12 col-xl-2 sub-title">
					Aksi
				</div>

				<!-- Data -->
				<?php if(!empty($DataNilai)):?>
					<?php $i=1; foreach($DataNilai as $row):?>
						<div class="col-sm-12 col-xl-5 sub-title">
							<div class="media">
								<label class="badge-top-right"><?=$i++;?>.</label>
								<?php if($row->image == null):?>
									<img class="img-radius img-40 align-top m-r-15"
									src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
								<?php else:?>
									<img src="<?php echo base_url('_uploads/profile/student/').$row->image;?>" alt="user image"
									class="img-radius img-40 align-top m-r-15">
								<?php endif;?>
								<div class="media-body">
									<h6 class="text-primary"><?= $row->fullname;?>/<?= $row->nim;?></h6>
									"<?= $row->title;?>"
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-xl-3 sub-title">
							<?php if($row->status_daftar_yudisium == null):?>
								<label class="label label-mini label-danger">Belum terdaftar yudisium</label>
							<?php else:?>
								<label class="label label-mini label-success">Sudah terdaftar yudisium</label>
							<?php endif;?>
						</div>
						<div class="col-sm-12 col-xl-2 sub-title">
							<?php $Progres = $this->db->select('*')->where('nim', $row->nim)->from('tb_uploadrequirementyudisium')->get()->result();?>
							<?php if(count($DataSyarat->result()) == 0):?>
								<label class="label label-mini label-danger">Document requirement yudisium is NULL</label>
							<?php else:?>
								<?php if(count($Progres) != count($DataSyarat->result())):?>
									Sudah upload : <label class="badge badge-success"><?= count($Progres)?></label>
									Belum upload : <label class="badge badge-danger"><?= count($DataSyarat->result())-count($Progres)?></label>
								<?php else:?>
									Sudah upload : <label class="badge badge-success"><?= count($Progres)?></label>
									Belum upload : <label class="badge badge-danger"><?= count($DataSyarat->result())-count($Progres)?></label>
									<label class="label label-mini label-success">Sudah upload dokumen</label>
								<?php endif;?>
							<?php endif;?>
						</div>
						<div class="col-sm-12 col-xl-2 sub-title">
							Aksi
						</div>
					<?php endforeach;?>
				<?php else:?>
					<div class="col-sm-12 col-xl-12 sub-title">
						<h6 class="text-center">Data not availabel</h6>
					</div>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>