<?php $this->load->view('backend/partials_/alert_success.php');?>
<div class="col-xl-12">
	<div class="card">
		<div class="card-header">
			<h5>Setting's Timeline Tugas Akhir</h5>
			<div class="card-header-right">
				<a href="" class="btn btn-mini btn-outline-primary" id="Modal-Tourist" data-toggle="modal" data-target="#modalTambahTM">+ Tambah timeline</a>
			</div>
		</div>
		<div class="card-block">
			<?php foreach($major->result() as $mjr):?>
				<?php $kr=$this->db->select('*')->where('major', $mjr->id)->from('tb_timeline')->get()->result();?>
				<div class="accordion-block">
					<div id="accordion" role="tablist" aria-multiselectable="true">
						<div class="accordion-panel">
							<div class="accordion-heading" role="tab" id="headingOne">
								<h3 class="card-title accordion-title">
									<a class="accordion-msg waves-effect waves-dark text-primary" data-toggle="collapse"
									data-parent="#accordion" href="#col<?= $mjr->id;?>"
									aria-expanded="true" aria-controls="collapseOne">Program Studi <?= $mjr->name;?></a>
								</h3>
							</div>
							<div id="col<?= $mjr->id;?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
								<div class="accordion-content accordion-desc">
									<div class="modal-body">
										<div class="row">
											<div class="col-sm-12 col-xl-3 sub-title text-primary">Judul</div>
											<div class="col-sm-12 col-xl-3 sub-title text-primary">Deskripsi</div>
											<div class="col-sm-12 col-xl-2 sub-title text-primary">Tanggal Mulai</div>
											<div class="col-sm-12 col-xl-2 sub-title text-primary">Tanggal berakhir</div>
											<div class="col-sm-12 col-xl-2 sub-title text-primary">Aksi</div>
											<!-- Data -->
											<?php if(count($kr) != 0):?>
												<?php foreach($kr as $timeline):?>
													<div class="col-sm-12 col-xl-3 sub-title"><?= $timeline->judul;?></div>
													<div class="col-sm-12 col-xl-3 sub-title"><?= $timeline->konten;?></div>
													<div class="col-sm-12 col-xl-2 sub-title"><?= $timeline->start_date;?></div>
													<div class="col-sm-12 col-xl-2 sub-title"><?= $timeline->end_date;?></div>
													<div class="col-sm-12 col-xl-2 sub-title text-primary">
														<a id="Modal-Tourist" data-toggle="modal" data-target="#edit<?= $timeline->id;?>" class="btn btn-mini btn-outline-primary"><i class="ti-pencil"></i>Edit</a>
														<a href="<?= site_url('TU/dashboard/Delete-timeline-id/'.$timeline->id);?>" class="btn btn-mini btn-outline-danger"><i class="ti-trash"></i>Del</a>
													</div>
													<!-- Modal insert Requirements -->
													<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="edit<?= $timeline->id;?>" aria-hidden="true">
														<div class="modal-dialog modal-lg">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLabel">Update requirement's</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<form action="<?= site_url("TU/dashboard/update-timeline")?>" method="post" id="savedata">
																	<div class="modal-body row">
																		<div class="form-group col-sm-3 form-default form-static-label">
																			<textarea name="judul"><?= $timeline->judul;?></textarea>
																		</div>
																		<div class="form-group col-sm-3 form-default form-static-label">
																			<textarea name="keterangan"><?= $timeline->konten;?></textarea>
																		</div>
																		<div class="form-group col-sm-3 form-default form-static-label">
																			<input type="date" name="start" value="<?= $timeline->start_date;?>">
																			<input type="hidden" name="id" value="<?= $timeline->id;?>">
																		</div>
																		<div class="form-group col-sm-3 form-default form-static-label">
																			<input type="date" name="end" value="<?= $timeline->end_date;?>">
																		</div>
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
																		<button type="submit" class="btn btn-sm btn-primary">Update timeline</button>
																	</div>
																</form>
															</div>
														</div>
													</div>
												<?php endforeach;?>
											<?php else:?>
												<div class="col-sm-12 col-xl-12 sub-title text-center">Date not availabel</div>
											<?php endif;?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach;?>
		</div>
	</div>
</div>

<!-- Modal insert Requirements -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modalTambahTM" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Create requirement's</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= site_url("TU/dashboard/insert-timeline")?>" method="post" id="savedata">
				<div class="modal-body">
					<a class="waves-effect waves-light text-primary" id="newlist"><i class="ti-plus"></i> Create
					table</a>
					<table class="table table-bordered" id="tableLoop">
						<tbody>
							<?php foreach($major->result() as $mjra):?>
								<div class="form-group col-sm-6">
									<input type="checkbox" name="major" value="<?= $mjra->id;?>">
									<label><?= $mjra->name;?></label>
								</div>
							<?php endforeach;?>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-sm btn-primary">Save timeline</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo base_url()?>assets/js/modal-timeline.js"></script>