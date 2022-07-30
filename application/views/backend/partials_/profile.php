<?php $level = $this->db->select('*')->where('id', $this->session->userdata('level'))->from('tb_role')->get()->row();?>
<?php $prodi = $this->db->select('*')->where('id', $this->session->userdata('major'))->from('tb_major')->get()->row();?>
<?php $fakultas = $this->db->select('*')->where('id', $this->session->userdata('faculty'))->from('tb_faculty')->get()->row();?>
<div class="col-xl-12">
	<div class="card">
		<div class="row">
			<div class="card-block col-sm-12 col-xl-6 main-menu-header" style="opacity: 10px; background-image: url(_uploads/profile/hero-bg.jpg); border: solid 2px; border-radius: 10px;">
				<div class="media">
					<?php if($this->session->userdata('foto') == null):?>
						<img class="img-60 align-top m-r-15"
						src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
					<?php else:?>
						<?php if($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2 || $this->session->userdata('level') == 3 || $this->session->userdata('level') == 5):?>
						<img src="<?php echo base_url('_uploads/profile/staff/').$this->session->userdata('foto');?>" alt="user image" class="img-60 align-top m-r-15">
					<?php else:?>
						<img src="<?php echo base_url('_uploads/profile/student/').$this->session->userdata('foto');?>" alt="user image" class="img-60 align-top m-r-15">
					<?php endif;?>
				<?php endif;?>
				<div class="media-body">
					<?php if($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2 || $this->session->userdata('level') == 4):?>
						<h5 class="notification-msg">SISTA UMBY.<br>Universitas Mercu Buana Yogyakarta<br>Program Studi <?= $prodi->name;?></h5>
					<?php elseif($this->session->userdata('level') == 3):?>
						<h5 class="notification-msg">SISTA UMBY.<br>Universitas Mercu Buana Yogyakarta<br><?= $fakultas->name;?></h5>
					<?php else:?>
						<br><h5 class="notification-msg">Universitas Mercu Buana Yogyakarta<br>SISTA UMBY</h5>
					<?php endif;?>
				</div>
			</div>
			<div class="col-sm-12 sub-title"></div>
			<div class="row">
				<div class="col-sm-12 col-xl-3">
					<h6>
						NIM/NIDN<br>
						Nama<br>
						e-mail<br>
						No. Hp<br>
						Status<br>
						<?php if($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2 || $this->session->userdata('level') == 4):?>
							Prodi
						<?php elseif($this->session->userdata('level') == 3):?>
							Fakultas
						<?php else:?>
							Role
						<?php endif;?>
					</h6>
				</div>
				<div class="col-sm-12 col-xl-9">
					<h6>
						: <?= $this->session->userdata('username');?><br>
						: <?= $this->session->userdata('name');?><br>
						: <?= $this->session->userdata('email');?><br>
						: <?= $this->session->userdata('phone');?><br>
						: <?= $level->level;?><br>
						<?php if($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2 || $this->session->userdata('level') == 4):?>
							: <?= $prodi->name;?>
						<?php elseif($this->session->userdata('level') == 3):?>
							: <?= $fakultas->name;?>
						<?php else:?>
							: Administrator
						<?php endif;?>
					</h6>
				</div>
			</div>
		</div>
		<div class="card-block col-sm-12 col-xl-6" style="opacity: 10px; background-image: url(_uploads/profile/hero-bg.jpg); border: solid 2px; border-radius: 10px;">
			<div class="media">
				<img class="img-80 align-top m-r-15" src="<?php echo base_url()?>assets/logo/sista51.png" alt="user image">
				<div class="media-body">
					<h5 class="notification-msg">Sistem Informasi Manajemen Tugas Akhir<br>Universitas Mercu Buana Yogyakarta</h5><hr size="10px">
				</div>
			</div>
			<div class="align-middle">
				<h6 class="text-center">
					<img class="img-100 align-top m-r-15" src="<?php echo base_url()?>assets/logo/sista2.png" alt="user image">
				</h6>
			</div>
		</div>
	</div>
</div>