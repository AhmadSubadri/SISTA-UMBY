<?php $this->load->view('backend/partials_/alert_success.php');?>
<div class="col-xl-12">
	<div class="card">
		<div class="card-header" style="background-color: #FFE3C7;">
			<b>Note.</b> Data dibawah ini merupakan daftar mahasiswa yang sudah menyelesaikan masa sidang pendadaran dan di nyatakan <code>Lulus ujian pendadaran.</code>
		</div>
		<div class="card-block">
			<h6 class="sub-title">Data mahasiswa yudisium</h6>
			<div class="row">
				<div class="col-sm-12 col-xl-4 sub-title text-primary">
					# Profil
				</div>
				<div class="col-sm-12 col-xl-2 sub-title text-primary">
					Nilai akhir
				</div>
				<div class="col-sm-12 col-xl-2 sub-title text-primary">
					Status daftar
				</div>
				<div class="col-sm-12 col-xl-2 sub-title text-primary">
					Dokumen
				</div>
				<div class="col-sm-12 col-xl-2 sub-title text-primary">
					Aksi
				</div>

				<!-- Data -->
				<?php if(!empty($DataNilai)):?>
					<?php $i=1; foreach($DataNilai as $row):?>
						<div class="col-sm-12 col-xl-4 sub-title">
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
						<div class="col-sm-12 col-xl-2 sub-title">
							<?php if($row->avarage >= "50"):?>
								Nilai akhir : <label class="badge badge-success"><?= $row->avarage;?></label> <?= $row->letter_value;?>
								<h6 class="text-primary"><u>Lulus</u></h6>
							<?php else:?>
								Nilai akhir : <label class="badge badge-danger"><?= $row->avarage;?></label> <?= $row->letter_value;?>
								<h6 class="text-danger"><u>Tidak Lulus</u></h6>
							<?php endif;?>
						</div>
						<div class="col-sm-12 col-xl-2 sub-title">
							<?php if($row->status_daftar_yudisium == null):?>
								<label class="label label-mini label-danger text-center">Belum terdaftar yudisium</label>
							<?php else:?>
								<label class="label label-mini label-success text-center">Sudah terdaftar yudisium</label>
							<?php endif;?>
						</div>
						<div class="col-sm-12 col-xl-2 sub-title">
							<?php $Progres = $this->db->select('*')->where('nim', $row->nim)->from('tb_uploadrequirementyudisium')->get()->result();?>
							<?php if($row->status_daftar_yudisium != null):?>
								<?php if(count($DataSyarat->result()) == 0):?>
									<label class="label label-mini label-danger">Document requirement yudisium is NULL</label>
								<?php else:?>
									<?php if(count($Progres) != count($DataSyarat->result())):?>
										Sudah upload : <label class="badge badge-success"><?= count($Progres)?></label>
										Belum upload : <label class="badge badge-danger"><?= count($DataSyarat->result())-count($Progres)?></label>
									<?php else:?>
										Sudah upload : <label class="badge badge-success"><?= count($Progres);?></label>
										Belum upload : <label class="badge badge-danger"><?= count($DataSyarat->result())-count($Progres);?></label>
										<label class="label label-mini label-success">Sudah upload dokumen</label>
									<?php endif;?>
								<?php endif;?>
							<?php else:?>
								<label class="label label-mini label-danger">Belum ada upload</label>
							<?php endif;?>
						</div>
						<div class="col-sm-12 col-xl-2 sub-title">
							<?php if($row->avarage >= "50"):?>
								<a href="<?= site_url('dsn/dashboard/detail-uploaded-yudisium/'.$row->nim);?>" class="btn btn-mini btn-outline-primary"><i class="ti-eye"> Detail</i></a>
							<?php else:?>
								<a href="<?= site_url('dsn/dashboard/delete-data-mhs-tidaklulus/'.$row->nim);?>" class="btn btn-mini btn-outline-danger"><i class="ti-trash"> Delete</i></a>
								<a class="btn btn-mini btn-outline-danger" data-toggle="tooltip" data-placement="left" data-original-title="Klik delete untuk hapus data skripsi dan persilahkan <?= $row->fullname;?> untuk mengulang skripsinya dari pengajuan judul dan proposal kembali.">?</a>
							<?php endif;?>
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