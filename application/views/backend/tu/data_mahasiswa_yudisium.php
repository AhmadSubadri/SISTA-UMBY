<div class="col-xl-12">
	<?php $this->load->view('backend/partials_/alert_success.php');?>
	<div class="card">
		<div class="card-header">
			<h5>Daftar mahasiswa skripsi periode <?= date('Y');?></h5>
		</div>
		<div class="card-block">
			<div class="row">
				<div class="col-sm-12 col-xl-7 sub-title text-primary">
					# Profil
				</div>
				<div class="col-sm-12 col-xl-2 sub-title text-primary">
					Program studi
				</div>
				<div class="col-sm-12 col-xl-1 sub-title text-primary">
					Class
				</div>
				<div class="col-sm-12 col-xl-2 sub-title text-primary">
					Aksi
				</div>

				<?php $i=1; foreach($Data->result() as $row):?>
					<div class="col-sm-12 col-xl-7 sub-title">
						<div class="media">
							<label class="badge-top-right"><?=$i++;?>.</label>
							<?php if($row->image == null):?>
								<img class="img-radius img-40 align-top m-r-15"
								src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
							<?php else:?>
								<img src="<?php echo base_url('_uploads/profile/student/').$row->image;?>" alt="user image"
								class="img-radius img-40 align-top m-r-15">
							<?php endif;?>
							<div class="media-body align-middle">
								<!-- <h6 class="text-primary"></h6> -->
								<?= $row->fullname;?> / <?= $row->username;?><br>
								<label class="text-primary"><?= $row->email;?></label>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-xl-2 sub-title">
						<?= $row->major;?>
					</div>
					<div class="col-sm-12 col-xl-1 sub-title">
						<?= $row->class;?>
					</div>
					<div class="col-sm-12 col-xl-2 sub-title">
						<?php $thesis = $this->db->select('*')->where('nim', $row->username)->from('tb_thesisreceived')->get()->result();?>
						<?php foreach($thesis as $t):?>
							<?php if($t->status_daftar_yudisium == 0):?>
							<a href="<?= site_url('TU/dashboard/daftarkan-yudisium-mahasiswa/'.$row->username);?>" class="btn btn-mini btn-outline-primary"><i class="ti-settings"></i>Daftar yudisium</a>
							<?php else:?>
								<a href="<?= site_url('TU/dashboard/batal-daftarkan-yudisium-mahasiswa/'.$row->username);?>" class="btn btn-mini btn-outline-danger"><i class="ti-settings"></i>Batalkan Daftar</a>
							<?php endif;?>
						<?php endforeach;?>
					</div>
				<?php endforeach;?>
			</div>
		</div>
	</div>
</div>