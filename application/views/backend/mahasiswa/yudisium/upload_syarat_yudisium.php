<div class="col-xl-12">
	<?php $this->load->view('backend/partials_/alert_success.php');?>
	<div class="card">
		<div class="card-header" style="background-color: #75A8FE;">
			<h5 style="color: white;">DATA UPLOAD SYARAT YUDISIUM</h5>
		</div>
		<div class="card-block">
			<?php if(count($DataNilai) != 0):?>
			<?php foreach($DataNilai as $statusYudisium):?>
				<?php if($statusYudisium->status_daftar_yudisium == 0):?>
					<div class="card-block" style="background-color: #FFE3C7;">Note. Anda belum terdaftar di yudisium, silahkan <code>konfirmasi ke pihak Tata Usaha (TU)</code> untuk daftar yudisium.</div>
				<?php else:?>
					<h6 class="title text-primary">Progres upload dokumen yudisium</h6>
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr class="text-primary">
									<th>#Progres</th>
									<?php $i=1; foreach($DataSyarat->result() as $syarat):?>
									<th data-toggle="tooltip" data-placement="left" data-original-title="<?= $syarat->requirements;?>">S<?= $i++;?></th>
									<?php endforeach;?>
								</tr>
							</thead>
							<tbody>
								<tr>
									<?php foreach($DataStudent->result() as $data):?>
										<td>
											<?php $i=1; foreach($DataNilai as $row):?>
											<?php $Progres = $this->db->select('*')->where('nim', $row->nim)->from('tb_uploadrequirementyudisium')->get()->result();?>
											<?php if($row->status_daftar_yudisium != null):?>
												<?php if(count($DataSyarat->result()) == 0):?>
													<label class="label label-mini label-danger">Document requirement yudisium is NULL</label>
												<?php else:?>
													<?php if(count($Progres) != count($DataSyarat->result())):?>
														Sudah upload : <label class="badge badge-success"><?= count($Progres)?></label><br>
														Belum upload : <label class="badge badge-danger"><?= count($DataSyarat->result())-count($Progres)?></label>
													<?php else:?>
														Sudah upload : <label class="badge badge-success"><?= count($Progres);?></label>
														Belum upload : <label class="badge badge-danger"><?= count($DataSyarat->result())-count($Progres);?></label>
														<label class="label label-mini label-success">Sudah upload dokumen</label>
													<?php endif;?>
												<?php endif;?>
											<?php else:?>
												<label class="label label-mini label-danger">Belum terdaftar</label>
											<?php endif;?>
											<?php endforeach;?>
										</td>
										<?php foreach($DataSyarat->result() as $syarat):?>
											<?php $value = $this->db->select('*')->where('nim', $data->username)->where('id_requirement', $syarat->id)->from('tb_uploadrequirementyudisium')->get()->result();?>
											<?php if(count($value) == 0):?>
												<td class="justify-content-center"><i class="ti-close text-danger text-mini"></i></td>
											<?php else:?>
												<?php foreach($value as $dt):?>
													<td class="justify-content-center"><i class="ti-check text-primary text-mini"></i></td>
												<?php endforeach;?>
											<?php endif;?>
										<?php endforeach;?>
									<?php endforeach;?>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col-sm-12 col-xl-12 sub-title"></div>
						<div class="col-sm-12 col-xl-8 sub-title text-primary">
							<h6># Syarat yudisium</h6>
						</div>
						<div class="col-sm-12 col-xl-2 sub-title text-center text-primary">
							<h6>Qty</h6>
						</div>
						<div class="col-sm-12 col-xl-2 sub-title text-center text-primary">
							<h6>Aksi</h6>
						</div>
						<!-- Data -->
						<?php $i=1; foreach($DataSyarat->result() as $syarat):?>
							<div class="col-sm-12 col-xl-8 sub-title">
								<div class="media">
									<label class="badge-top-right">S<?=$i++;?>. </label>
									<?= $syarat->requirements;?>
									<label class="text-italic text-danger" style="font-size: 8px;">(wajib)</label>
								</div>
							</div>
							<div class="col-sm-12 col-xl-2 sub-title text-center">
								<?= $syarat->qty;?>
							</div>
							<div class="col-sm-12 col-xl-2">
								<?php $dtsyarat = $this->db->select('*')->where('nim', $this->session->userdata('username'))->where('id_requirement', $syarat->id)->from('tb_uploadrequirementyudisium')->get();?>
								<?php if(count($dtsyarat->result()) == 0):?>
									<?php echo form_open_multipart('mhs/dashboard/save-document-yudisium');?>
									<a href="" class="btn btn-mini btn-outline-success disabled"><i class="ti-na"></i> Lihat</a>
									<input name="id_syarat" class="form-bg-null" value="<?= $syarat->id?>" hidden/>
									<div class="fileUpload btn btn-mini btn-grd-inverse">
										<span><i class="ti-upload"></i>Upload</span>
										<input id="uploadBtna" type="file" name="file" class="upload" onchange="javascript:this.form.submit();" />
									</div>
									</form>
								<?php else:?>
									<?php foreach($dtsyarat->result() as $docu):?>
										<a id="Modal-Tourist" data-toggle="modal" data-target="#modal_seeY<?= $docu->id;?>" class="btn btn-mini btn-outline-success"><i class="ti-eye"></i> Lihat</a>
										<a href="<?= site_url('mhs/dashboard/delete-document-yudisium/'.$docu->id);?>" class="btn btn-mini btn-outline-danger"><i class="ti-trash"></i>Ubah</a>
									<?php endforeach;?>
								<?php endif;?>
							</div>
							<?php foreach($dtsyarat->result_array() as $l): $idty = $l['id'];$file = $l['file'];?>
								<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modal_seeY<?= $idty;?>" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Document syarat yudisium</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<object data="<?=base_url('_uploads/yudisium/'.$this->session->userdata('name').'/'.$file);?>" width="100%" height="500"></object>
										</div>
									</div>
								</div>
							<?php endforeach;?>
						<?php endforeach;?>
					</div>
				<?php endif;?>
			<?php endforeach;?>
			<?php else:?>
				<label class="text-center sub-title col-xl-12">Data not availabel</label>
			<?php endif;?>
		</div>
	</div>
</div>

<style>
	.fileUpload {
		position: relative;
		overflow: hidden; 
	}

	.fileUpload input.upload {
		position: absolute;
		top: 0;
		right: 0;
		margin: 0;
		padding: 0;
		font-size: 20px;
		cursor: pointer;
		opacity: 0;
		filter: alpha(opacity=0);
	}

	.Uploadfile {
		position: relative;
		overflow: hidden; 
	}

	.Uploadfile input.upload {
		position: absolute;
		top: 0;
		right: 0;
		margin: 0;
		padding: 0;
		font-size: 20px;
		cursor: pointer;
		opacity: 0;
		filter: alpha(opacity=0);
	}
</style>