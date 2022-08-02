<?php $this->load->view('backend/partials_/alert_success.php');?>
<div class="col-xl-12">
	<div class="card">
		<?= form_open_multipart('About/SaveAbout'); ?>
		<div class="card-header">
			<h5>Setting's About</h5>
			<div class="card-header-right">
				<button type="submit" class="btn btn-mini btn-outline-primary"><b class="ti-save"></b> Save setting</button>
			</div>
		</div>
		<div class="card-block">
			<?php $dataA = $this->db->select('*')->where('type', 1)->from('about')->get();?>
			<?php if(count($dataA->result()) != 0):?>
				<?php foreach($dataA->result_array() as $j): $id = $j['id'];$judul = $j['judul'];$judulbiru=$j['judul_biru'];$subjudul=$j['sub_judul'];$des=$j['deskripsi'];$image=$j['image'];?>
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
							<textarea name="deskripsi" class="form-control"><?= $des;?></textarea>
							<span class="form-bar"></span>
							<label class="float-label text-primary">Deskripsi</label>
						</div>
						<div class="form-group form-default col-sm-4 form-static-label">
							<input type="file" name="file">
							<span class="form-bar"></span>
							<label class="float-label text-primary">Image</label><br>
							<?php if($image != null):?>
								<object data="<?=base_url('_uploads/frontend/'.$image);?>" width="80" height="80"></object>
							<?php else:?>
								<object data="<?=base_url('_uploads/frontend/no_image.jpg');?>" width="80" height="80"></object>
							<?php endif;?>
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
						<input type="file" name="file" class="form-control">
						<span class="form-bar"></span>
						<label class="float-label text-primary">Image</label><br>
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
			<h5>Setting's About Icon</h5>
			<a id="Modal-Tourist" data-toggle="modal" data-target="#pertanyaan" class="text-primary">?</a>
			<div class="card-header-right">
				<a href="" class="btn btn-mini btn-outline-primary" id="Modal-Tourist" data-toggle="modal" data-target="#iconadd">+ Data Icon Content</a>
			</div>
		</div>
		<div class="card-block">
			<?php $dataC = $this->db->select('*')->where('type', 2)->from('about')->get();?>
			<div class="row">
				<div class="col-sm-12 col-xl-2 sub-title text-primary"># Nama Icon</div>
				<div class="col-sm-12 col-xl-2 sub-title text-primary">Judul</div>
				<div class="col-sm-12 col-xl-6 sub-title text-primary">Deskripsi</div>
				<div class="col-sm-12 col-xl-2 sub-title text-primary">Aksi</div>
				<!-- Data -->
				<?php if(count($dataC->result()) != 0):?>
					<?php foreach($dataC->result() as $tst): $id = $tst->id;$icon = $tst->icon;$judul=$tst->judul;$deskripsi=$tst->deskripsi;?>
						<div class="col-sm-12 col-xl-2 sub-title"><?=$icon;?></div>
						<div class="col-sm-12 col-xl-2 sub-title"><?=$judul;?></div>
						<div class="col-sm-12 col-xl-6 sub-title"><?= $deskripsi;?></div>
						<div class="col-sm-12 col-xl-2 sub-title">
							<a class="btn btn-mini btn-outline-primary" id="Modal-Tourist" data-toggle="modal" data-target="#editicon<?= $id;?>"><i class="ti-pencil"></i>Edit</a>
							<a href="<?= site_url('About/DeleteIcon/'.$id);?>" class="btn btn-mini btn-outline-danger"><i class="ti-trash"></i>Delete</a>
						</div>
					<?php endforeach;?>
				<?php else:?>
					<div class="col-sm-12 col-xl-12 sub-title"><h6 class="text-center">Data not availabel</h6></div>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="iconadd" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah data icon konten</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open_multipart('About/SaveIconContent'); ?>
				<div class="form-group form-default row">
					<div class="form-group col-sm-6 form-default form-static-label">
						<input type="text" name="icon" class="form-control" placeholder="bx bx-store-alt" required>
						<span class="form-bar"></span>
						<label class="float-label text-primary">Icon</label>
					</div>
					<div class="form-group col-sm-6 form-default form-static-label">
						<input type="text" name="judul" class="form-control" placeholder="- -" required>
						<span class="form-bar"></span>
						<label class="float-label text-primary">Judul</label>
					</div>
				</div>
				<div class="form-group form-default row">
					<div class="form-group form-default col-sm-12 form-static-label">
						<textarea name="deskripsi" class="form-control" required></textarea>
						<span class="form-bar"></span>
						<label class="float-label text-primary">Deskripsi</label>
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
	$id = $cjk['id'];$icon = $cjk['icon'];$judul=$cjk['judul'];$deskripsi=$cjk['deskripsi'];
	?>
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
	id="editicon<?= $id;?>" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah data testimoni</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open_multipart('About/SaveIconContent'); ?>
					<div class="form-group form-default row">
						<input type="hidden" name="id" value="<?= $id;?>">
						<div class="form-group col-sm-6 form-default form-static-label">
							<input type="text" name="icon" class="form-control" value="<?= $icon;?>" placeholder="bx bx-store-alt">
							<span class="form-bar"></span>
							<label class="float-label text-primary">Icon</label>
						</div>
						<div class="form-group col-sm-6 form-default form-static-label">
							<input type="text" name="judul" class="form-control" placeholder="- -" value="<?= $judul;?>">
							<span class="form-bar"></span>
							<label class="float-label text-primary">Judul</label>
						</div>
					</div>
					<div class="form-group form-default row">
						<div class="form-group form-default col-sm-12 form-static-label">
							<textarea name="deskripsi" class="form-control"><?= $deskripsi;?></textarea>
							<span class="form-bar"></span>
							<label class="float-label text-primary">Deskripsi</label>
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

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="pertanyaan" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Pertanyaan mengenai referensi icon</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h6>Klik link <a href="https://boxicons.com/" target="_blank" class="text-primary">disini</a> untuk lihat referensi icon yang dapat di gunakan</h6>
				<p>1. Klik link kemudian klik kategori sisi kanan bagian regular</p>
				<p>2. Klik icon mana yang ingin digunakan</p>
				<p>3. Kemudian muncul ada pilihan <code>Web Component</code> dan <code>Font</code>, pilih bagian font</p>
				<p>4. kopi code dan masukan ke dalam form icon yang sudah di sediakan, perhatikan format penulisanya</p>
			</div>
		</div>
	</div>
</div>

<div class="col-xl-12">
	<div class="card">
		<?= form_open_multipart('About/SaveAbout2'); ?>
		<div class="card-header">
			<h5>Setting's About</h5>
			<div class="card-header-right">
				<button type="submit" class="btn btn-mini btn-outline-primary"><b class="ti-save"></b> Save setting</button>
			</div>
		</div>
		<div class="card-block">
			<?php $dataA = $this->db->select('*')->where('type', 3)->from('about')->get();?>
			<?php if(count($dataA->result()) != 0):?>
				<?php foreach($dataA->result_array() as $j): $id = $j['id'];$deskripsi=$j['deskripsi'];?>
					<div class="form-group form-default row">
						<input type="hidden" name="id" value="<?= $id;?>">
						<div class="form-group form-default col-sm-12 form-static-label">
							<textarea name="deskripsi" class="form-control"><?= $deskripsi;?></textarea>
							<span class="form-bar"></span>
							<label class="float-label text-primary">Deskripsi</label>
						</div>
					</div>
				<?php endforeach;?>
			<?php else:?>
				<div class="form-group form-default row">
					<div class="form-group form-default col-sm-12 form-static-label">
						<textarea name="deskripsi" class="form-control"></textarea>
						<span class="form-bar"></span>
						<label class="float-label text-primary">Deskripsi</label>
					</div>
				</div>
			<?php endif;?>
		</div>
		</form>
	</div>
</div>