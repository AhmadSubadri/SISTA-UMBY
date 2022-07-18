<div class="col-xl-12">
	<?php $this->load->view('backend/partials_/alert_success.php');?>
	<div class="card">
		<div class="card-header">
			<h5>Data mahasiswa skripsi</h5>
			<div class="card-header-right">
				<a class="btn btn-mini btn-outline-primary" data-toggle="modal" data-target="#tambahlistmahasiswa">Tambah data mahasiswa</a>
            	<a class="btn btn-mini btn-outline-primary" data-toggle="modal" data-target="#importlistmahasiswa">Import data mahasiswa</a>
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
					Class
				</div>
				<div class="col-sm-12 col-xl-2 sub-title text-primary">
					Aksi
				</div>
				<!-- Data -->
				<?php $i=1; foreach($Data as $row):?>
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
							<div class="media-body align-middle">
								<!-- <h6 class="text-primary"></h6> -->
								<?= $row->fullname;?> / <?= $row->username;?><br>
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
						<?= $row->class;?>
					</div>
					<div class="col-sm-12 col-xl-2 sub-title">
						<a href="" class="btn btn-mini btn-outline-primary"><i class="ti-eye"></i></a>
						<a href="" class="btn btn-mini btn-outline-warning"><i class="ti-pencil"></i></a>
						<a href="<?= site_url('TU/dashboard/delete-data-mahasiswa/'.$row->id);?>" class="btn btn-mini btn-outline-danger"><i class="ti-trash"></i></a>
					</div>
				<?php endforeach;?>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="tambahlistmahasiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah data Mahasiswa</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!-- <form action="<?= site_url('TU/dashboard/import-data-dosen'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <i class="fa fa-file-excel"></i>
                        <a href="<?= site_url('dashboard/Format_datadsn')?>">Download Format Excel</a>
                    </div>
                    <div class="form-group">
                        <label>Upload File Excel</label>
                        <input type="file" name="fileExcel">
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-mini btn-outline-primary" type="submit"><i class="ti-upload"></i> Import</a>
                </div>
            </form> -->
        </div>
    </div>
</div>
<div class="modal fade" id="importlistmahasiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import data Mahasiswa</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= site_url('TU/dashboard/import-data-mahasiswa'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <i class="fa fa-file-excel"></i>
                        <a href="<?= site_url('TU/dashboard/export-format-mahasiswa')?>" class="text-primary"><u>Download Format Excel</u></a>
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