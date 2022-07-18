<div class="col-xl-12">
	<?php $this->load->view('backend/partials_/alert_success.php');?>
	<div class="card">
		<div class="card-header">
			<h5>Data dosen</h5>
			<div class="card-header-right">
				<a class="btn btn-mini btn-outline-primary" data-toggle="modal" data-target="#tambahlistdosen">Tambah data dosen</a>
            	<a class="btn btn-mini btn-outline-primary" data-toggle="modal" data-target="#importlistdosen">Import data dosen</a>
			</div>
		</div>
		<div class="card-block">
			<div class="row">
				<div class="col-sm-12 col-xl-4 sub-title text-primary">
					# Profil
				</div>
				<div class="col-sm-12 col-xl-3 sub-title text-primary">
					Hash password
				</div>
				<div class="col-sm-12 col-xl-2 sub-title text-primary">
					Program studi
				</div>
				<div class="col-sm-12 col-xl-1 sub-title text-primary">
					Level
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
								<?= $row->fullname;?><br><?= $row->username;?><br>
								<label class="text-primary"><?= $row->email;?></label>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-xl-3 sub-title">
						<?= $row->password;?>
					</div>
					<div class="col-sm-12 col-xl-2 sub-title">
						<?= $row->major;?>
					</div>
					<div class="col-sm-12 col-xl-1 sub-title">
						<?php $lv = $this->db->select('*')->where('role', $row->role_id)->from('tb_role')->get()->result();?>
						<?php foreach($lv as $val):?>
							<?= $val->level;?>
						<?php endforeach;?>
					</div>
					<div class="col-sm-12 col-xl-2 sub-title">
						<a href="" class="btn btn-mini btn-outline-warning" data-toggle="modal" data-target="#editlistdosen<?= $row->username;?>"><i class="ti-pencil"></i>Edit</a>
						<a href="<?= site_url('TU/dashboard/delete-data-dosen/'.$row->id);?>" class="btn btn-mini btn-outline-danger"><i class="ti-trash"></i>Delete</a>
					</div>
				<?php endforeach;?>
			</div>
		</div>
	</div>
</div>
<!-- Modal tambah data dosen -->
<div class="modal fade bd-example-modal-lg" id="tambahlistdosen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="exampleModalLabel">Tambah data Dosen</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= site_url('TU/dashboard/insert-data-dosen-master'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <i class="fa fa-file-excel sub-title text-primary">Form tambah data dosen</i>
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
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jurusan</label>
                            <div class="col-sm-4">
                                <select name="major" class="form-control" required>
                                    <option value="opt1">Select Jurusan</option>
                                    <?php foreach ($DataJurusan as $key):?>
                                    <option value="<?= $key->id;?>"><?= $key->major;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        <label class="col-sm-2 col-form-label">Level</label>
                            <div class="col-sm-4">
                                <select name="level" class="form-control" required>
                                    <option value="opt1">Select Level</option>
                                    <option value="1">Kepala program studi</option>
                                    <option value="2">Dosen pengajar</option>
                                </select>
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
<!-- Modal update data dosen -->
<?php foreach($Data->result_array() as $i):
        $nidn = $i['username'];
        $name = $i['fullname'];
        $email=$i['email'];
        $level =$i['role_id'];
        $major =$i['id_major'];
?>
<div class="modal fade bd-example-modal-lg" id="editlistdosen<?= $nidn;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="exampleModalLabel">Edit data Dosen</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= site_url('TU/dashboard/update-data-dosen-master/'.$nidn); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <i class="fa fa-file-excel sub-title text-primary">Form edit data dosen</i>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NIDN</label>
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
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jurusan</label>
                            <div class="col-sm-4">
                                <select name="major" class="form-control" required>
                                    <option value="opt1">Select Jurusan</option>
                                    <?php foreach ($DataJurusan as $key):?>
                                    <option value="<?= $key->id;?>"><?= $key->major;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        <label class="col-sm-2 col-form-label">Level</label>
                            <div class="col-sm-4">
                                <select name="level" class="form-control" required>
                                    <option value="opt1">Select Level</option>
                                    <option value="1">Kepala program studi</option>
                                    <option value="2">Dosen pengajar</option>
                                </select>
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
<!-- Modal import data dosen -->
<div class="modal fade" id="importlistdosen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import data Dosen</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= site_url('TU/dashboard/import-data-dosen'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <i class="fa fa-file-excel"></i>
                        <a href="<?= site_url('TU/dashboard/export-format-dosen')?>" class="text-primary"><u>Download Format Excel</u></a>
                    </div>
                    <div class="form-group">
                        <label>Upload File Excel</label>
                        <input type="file" name="fileExcel">
                    </div>
                </div>
                <div class="modal-footer">
                	<button class="btn btn-mini btn-outline-primary" type="submit"><i class="ti-upload"></i> Import</button>
                </div>
            </form>
        </div>
    </div>
</div>