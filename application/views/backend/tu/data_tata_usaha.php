<div class="col-xl-12">
	<?php $this->load->view('backend/partials_/alert_success.php');?>
	<div class="card">
		<div class="card-header" style="background-color: #75A8FE;">
			<h5 style="color: white;">Data mahasiswa skripsi</h5>
			<div class="card-header-right">
				<a class="btn btn-mini btn-outline-danger" data-toggle="modal" data-target="#tambahlistmahasiswa">Tambah data mahasiswa</a>
			</div>
		</div>
		<div class="card-block">
			<div class="row">
				<div class="col-sm-12 col-xl-4 sub-title text-primary">
					# Profil
				</div>
				<div class="col-sm-12 col-xl-4 sub-title text-primary">
					Hash password
				</div>
				<div class="col-sm-12 col-xl-2 sub-title text-primary">
					Fakultas
				</div>
				<div class="col-sm-12 col-xl-2 sub-title text-primary">
					Aksi
				</div>
				<!-- Data -->
				<?php $i=1; foreach($Data->result() as $row):?>
					<div class="col-sm-12 col-xl-4 sub-title">
						<div class="media">
							<label class="badge-top-right"><?=$i++;?>.</label>
							<?php if($row->image == null):?>
								<img class="img-radius img-40 align-top m-r-15"
								src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
							<?php else:?>
								<img src="<?php echo base_url('_uploads/profile/staff/').$row->image;?>" alt="user image"
								class="img-radius img-40 align-top m-r-15">
							<?php endif;?>
							<div class="media-body align-middle">
								<!-- <h6 class="text-primary"></h6> -->
								<?= $row->fullname;?> / <?= $row->username;?><br>
								<label class="text-primary"><?= $row->email;?></label>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-xl-4 sub-title">
						<?= $row->password;?>
					</div>
					<div class="col-sm-12 col-xl-2 sub-title">
						<?= $row->fac;?>
					</div>
					<div class="col-sm-12 col-xl-2 sub-title">
						<a class="btn btn-mini btn-outline-warning" data-toggle="modal" data-target="#editlistmahasiswa<?= $row->username;?>"><i class="ti-pencil"> Edit</i></a>
						<a href="<?= site_url('TU/dashboard/delete-data-tatausaha/'.$row->id);?>" class="btn btn-mini btn-outline-danger"><i class="ti-trash"></i>Delete</a>
					</div>
				<?php endforeach;?>
			</div>
		</div>
	</div>
</div>

<!-- Modal add data mahasiswa -->
<div class="modal fade bd-example-modal-lg" id="tambahlistmahasiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="exampleModalLabel">Tambah data Tata Usaha</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= site_url('TU/dashboard/insert-data-tatausaha-master'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <i class="fa fa-file-excel sub-title text-primary">Form tambah data Tata usaha</i>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NIDN</label>
                        <div class="col-sm-4">
                            <input type="text" name="nidn" class="form-control" maxlength="11" required>
                        </div>
                        <label class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-4">
                            <input type="text" name="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-4">
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <label class="col-sm-2 col-form-label">Fakultas</label>
                        <div class="col-sm-4">
                        	<?php $i=1; foreach($Data->result() as $row):?>
                            	<input type="text" name="fakultas" class="form-control" value="<?= $row->fac;?>" readonly>
                            	<input type="text" name="faculty" class="form-control" value="<?= $row->facid;?>" hidden>
                        	<?php endforeach;?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                	<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="ti-save"></i> Save data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal update data mahasiswa -->
<?php foreach($Data->result_array() as $i):
        $nidn = $i['username'];
        $name = $i['fullname'];
        $email=$i['email'];
        $fakultas=$i['id_faculty'];
?>
<div class="modal fade bd-example-modal-lg" id="editlistmahasiswa<?= $nidn;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="exampleModalLabel">Edit data Tata Usaha</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= site_url('TU/dashboard/update-data-tatausaha-master/'.$nidn); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <i class="fa fa-file-excel sub-title text-primary">Form edit data Tata usaha</i>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-4">
                            <input type="text" name="nidn" value="<?= $nidn;?>" class="form-control" maxlength="11" readonly>
                        </div>
                        <label class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-4">
                            <input type="text" name="name" value="<?= $name;?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" value="<?= $email;?>" class="form-control" required>
                            <input type="text" name="faculty" value="<?= $fakultas;?>" class="form-control" hidden>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                	<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="ti-save"></i> Update data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>