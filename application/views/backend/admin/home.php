<?php $this->load->view('backend/partials_/alert_success.php');?>
<div class="col-xl-12">
	<div class="card">
		<?= form_open_multipart('Home/SaveHeroSection'); ?>
		<div class="card-header">
			<h5>Setting's Home Hero Section</h5>
			<div class="card-header-right">
				<button type="submit" class="btn btn-mini btn-outline-primary"><b class="ti-save"></b> Save setting</button>
			</div>
		</div>
		<div class="card-block">
			<?php $dataA = $this->db->select('*')->where('type', 1)->from('home')->get();?>
			<?php if(count($dataA->result()) != 0):?>
				<?php foreach($dataA->result_array() as $j): $id = $j['id'];$judul = $j['judul'];$judulbiru=$j['judul_biru'];$subjudul=$j['sub_judul'];?>
					<div class="form-group form-default row">
						<input type="hidden" name="id" value="<?= $id;?>">
						<div class="form-group col-sm-4 form-default form-static-label">
							<input type="text" name="judul_hitam" value="<?= $judul;?>" class="form-control" placeholder="- -">
							<span class="form-bar"></span>
							<label class="float-label text-primary">Judul hitam</label>
						</div>
						<div class="form-group col-sm-4 form-default form-static-label">
							<input type="text" name="judul_biru" value="<?= $judulbiru;?>" class="form-control" placeholder="- -">
							<span class="form-bar"></span>
							<label class="float-label text-primary">judul biru</label>
						</div>
						<div class="form-group col-sm-4 form-default form-static-label">
							<input type="text" name="sub_judul" value="<?= $subjudul;?>" class="form-control" placeholder="- -">
							<span class="form-bar"></span>
							<label class="float-label text-primary">Sub Judul</label>
						</div>
					</div>
				<?php endforeach;?>
			<?php else:?>
				<div class="form-group form-default row">
					<div class="form-group col-sm-4 form-default form-static-label">
						<input type="text" name="judul_hitam" class="form-control" placeholder="- -">
						<span class="form-bar"></span>
						<label class="float-label text-primary">Judul hitam</label>
					</div>
					<div class="form-group col-sm-4 form-default form-static-label">
						<input type="text" name="judul_biru" class="form-control" placeholder="- -">
						<span class="form-bar"></span>
						<label class="float-label text-primary">judul biru</label>
					</div>
					<div class="form-group col-sm-4 form-default form-static-label">
						<input type="text" name="sub_judul" class="form-control" placeholder="- -">
						<span class="form-bar"></span>
						<label class="float-label text-primary">Sub Judul</label>
					</div>
				</div>
			<?php endif;?>
		</div>
	</form>
</div>
</div>
<div class="col-xl-12">
	<div class="card">
		<?= form_open_multipart('Home/SaveCalendarAcademic'); ?>
		<div class="card-header">
			<h5>Setting's Home Component Calendar Academic</h5>
			<div class="card-header-right">
				<button type="submit" class="btn btn-mini btn-outline-primary"><b class="ti-save"></b> Save setting</button>
			</div>
		</div>
		<div class="card-block">
			<?php $dataB = $this->db->select('*')->where('type', 2)->from('home')->get();?>
			<?php if(count($dataB->result()) != 0):?>
				<?php foreach($dataB->result_array() as $i): $id = $i['id'];$judul = $i['judul'];$judulbiru=$i['judul_biru'];$subjudul=$i['sub_judul'];$deskripsi=$i['deskripsi'];$file=$i['file'];?>
					<div class="form-group form-default row">
						<input type="hidden" name="id" value="<?= $id;?>">
						<div class="form-group col-sm-4 form-default form-static-label">
							<input type="text" name="judul_hitam" value="<?= $judul;?>" class="form-control" placeholder="- -">
							<span class="form-bar"></span>
							<label class="float-label text-primary">Judul hitam</label>
						</div>
						<div class="form-group col-sm-4 form-default form-static-label">
							<input type="text" name="judul_biru" value="<?= $judulbiru;?>" class="form-control" placeholder="- -">
							<span class="form-bar"></span>
							<label class="float-label text-primary">judul biru</label>
						</div>
						<div class="form-group col-sm-4 form-default form-static-label">
							<input type="text" name="sub_judul" value="<?= $subjudul;?>" class="form-control" placeholder="- -">
							<span class="form-bar"></span>
							<label class="float-label text-primary">Sub Judul</label>
						</div>
					</div>
					<div class="form-group form-default row">
						<div class="form-group form-default col-sm-8 form-static-label">
							<textarea name="deskripsi" class="form-control"><?= $deskripsi;?></textarea>
							<span class="form-bar"></span>
							<label class="float-label text-primary">Deskripsi</label>
						</div>
						<div class="form-group form-default col-sm-4 form-static-label">
							<input type="file" name="file" value="<?= $file;?>">
							<span class="form-bar"></span>
							<label class="float-label text-primary">File calendar</label><i class="text-danger" style="font-size: 10px;">(pdf/jpg/JPG/PNG/png/jpeg/JPEG)</i><br>
							<a href="<?= base_url('_uploads/frontend/'.$file);?>" target="_blank" class="btn btn-mini btn-outline-primary"><?= $file;?></a>
						</div>
					</div>
				<?php endforeach;?>
			<?php else:?>
				<div class="form-group form-default row">
					<div class="form-group col-sm-4 form-default form-static-label">
						<input type="text" name="judul_hitam" class="form-control" placeholder="- -">
						<span class="form-bar"></span>
						<label class="float-label text-primary">Judul hitam</label>
					</div>
					<div class="form-group col-sm-4 form-default form-static-label">
						<input type="text" name="judul_biru" class="form-control" placeholder="- -">
						<span class="form-bar"></span>
						<label class="float-label text-primary">judul biru</label>
					</div>
					<div class="form-group col-sm-4 form-default form-static-label">
						<input type="text" name="sub_judul" class="form-control" placeholder="- -">
						<span class="form-bar"></span>
						<label class="float-label text-primary">Sub Judul</label>
					</div>
				</div>
				<div class="form-group form-default row">
					<div class="form-group form-default col-sm-8 form-static-label">
						<textarea name="deskripsi" class="form-control"></textarea>
						<span class="form-bar"></span>
						<label class="float-label text-primary">Deskripsi</label>
					</div>
					<div class="form-group form-default col-sm-4 form-static-label">
						<input type="file" name="file">
						<span class="form-bar"></span>
						<label class="float-label text-primary">File calendar</label><i class="text-danger" style="font-size: 10px;">(jpg/JPG/PNG/png/jpeg/JPEG)</i>
					</div>
				</div>
			<?php endif;?>
		</div>
	</form>
</div>
</div>
<div class="col-xl-12">
	<div class="card">	
		<div class="card-header">
			<h5>Setting's Home Testimoni</h5>
			<div class="card-header-right">
				<a href="" class="btn btn-mini btn-outline-primary" id="Modal-Tourist" data-toggle="modal" data-target="#testimoni">+ Data testimoni</a>
			</div>
		</div>
		<div class="card-block">
			<?php $dataC = $this->db->select('*')->where('type', 3)->from('home')->get();?>
			<div class="row">
				<div class="col-sm-12 col-xl-2 sub-title text-primary"># Nama/Pekerjaan</div>
				<div class="col-sm-12 col-xl-7 sub-title text-primary">Testimoni</div>
				<div class="col-sm-12 col-xl-1 sub-title text-primary">Foto</div>
				<div class="col-sm-12 col-xl-2 sub-title text-primary">Aksi</div>
				<!-- Data -->
				<?php if(count($dataC->result()) != 0):?>
					<?php foreach($dataC->result() as $tst): $id = $tst->id;$image = $tst->image;$pekerjaan=$tst->pekerjaan;$testi=$tst->testimoni;$nama=$tst->nama;?>
						<div class="col-sm-12 col-xl-2 sub-title"><?=$nama;?><br>> <?=$pekerjaan;?></div>
						<div class="col-sm-12 col-xl-7 sub-title"><?=$testi;?></div>
						<div class="col-sm-12 col-xl-1 sub-title">
							<?php if($image != null):?>
								<object data="<?=base_url('_uploads/frontend/'.$image);?>" width="80" height="80"></object>
							<?php else:?>
								<object data="<?=base_url('_uploads/frontend/no_image.jpg');?>" width="80" height="80"></object>
							<?php endif;?>
						</div>
						<div class="col-sm-12 col-xl-2 sub-title">
							<a class="btn btn-mini btn-outline-primary" id="Modal-Tourist" data-toggle="modal" data-target="#edittestimoni<?= $id;?>"><i class="ti-pencil"></i>Edit</a>
							<a href="<?= site_url('Home/DeleteTestimoni/'.$id);?>" class="btn btn-mini btn-outline-danger"><i class="ti-trash"></i>Delete</a>
						</div>
					<?php endforeach;?>
				<?php else:?>
					<div class="col-sm-12 col-xl-2 sub-title"><h6 class="text-center">Data not availabel</h6></div>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="testimoni" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah data testimoni</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open_multipart('Home/SaveTestimoni'); ?>
					<div class="form-group form-default row">
						<div class="form-group col-sm-6 form-default form-static-label">
							<input type="text" name="nama" class="form-control" placeholder="- -" required>
							<span class="form-bar"></span>
							<label class="float-label text-primary">Nama</label>
						</div>
						<div class="form-group col-sm-6 form-default form-static-label">
							<input type="text" name="pekerjaan" class="form-control" placeholder="- -" required>
							<span class="form-bar"></span>
							<label class="float-label text-primary">Pekerjaan</label>
						</div>
					</div>
					<div class="form-group form-default row">
						<div class="form-group form-default col-sm-8 form-static-label">
							<textarea name="testi" class="form-control"></textarea>
							<span class="form-bar"></span>
							<label class="float-label text-primary">Testimoni</label>
						</div>
						<div class="form-group form-default col-sm-4 form-static-label">
							<input type="file" name="file">
							<span class="form-bar"></span>
							<label class="float-label text-primary">Foto responden</label><i class="text-danger" style="font-size: 10px;">(jpg/JPG/PNG/png/jpeg/JPEG)</i>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-mini btn-outline-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-mini btn-outline-primary"><b class="ti-save"></b> Save setting</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php foreach($dataC->result_array() as $cjk):
	$id = $cjk['id'];$image = $cjk['image'];$pekerjaan=$cjk['pekerjaan'];$testi=$cjk['testimoni'];$nama=$cjk['nama'];;
	?>
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
	id="edittestimoni<?= $id;?>" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah data testimoni</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open_multipart('Home/SaveTestimoni'); ?>
				<div class="form-group form-default row">
					<input type="hidden" name="id" value="<?= $id;?>">
					<div class="form-group col-sm-6 form-default form-static-label">
						<input type="text" name="nama" value="<?= $nama;?>" class="form-control" placeholder="- -">
						<span class="form-bar"></span>
						<label class="float-label text-primary">Nama</label>
					</div>
					<div class="form-group col-sm-6 form-default form-static-label">
						<input type="text" name="pekerjaan" value="<?= $pekerjaan;?>" class="form-control" placeholder="- -">
						<span class="form-bar"></span>
						<label class="float-label text-primary">Pekerjaan</label>
					</div>
				</div>
				<div class="form-group form-default row">
					<div class="form-group form-default col-sm-8 form-static-label">
						<textarea name="testi" class="form-control"><?= $testi;?></textarea>
						<span class="form-bar"></span>
						<label class="float-label text-primary">Testimoni</label>
					</div>
					<div class="form-group form-default col-sm-4 form-static-label">
						<input type="file" name="file">
						<span class="form-bar"></span>
						<label class="float-label text-primary">Foto responden</label><br>
						<?php if($image != null):?>
							<object data="<?=base_url('_uploads/frontend/'.$image);?>" width="80" height="80"></object>
						<?php else:?>
							<object data="<?=base_url('_uploads/frontend/no_image.jpg');?>" width="80" height="80"></object>
						<?php endif;?>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-mini btn-outline-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-mini btn-outline-primary"><b class="ti-save"></b> Update setting</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
<?php endforeach;?>