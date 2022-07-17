<div class="col-xl-12">
	<?php $this->load->view('backend/partials_/alert_success.php');?>
	<a href="<?= site_url('dsn/dashboard/mahasiswa-yudisium');?>" class="btn btn-mini"><i
		class="ti-back-left"></i>Kembali</a>
		<div class="card">
			<div class="card-header">
				<h5>Detail data upload syarat yudisium</h5>
			</div>
			<div class="card-block">
				<div class="accordion-block">
					<div id="accordion" role="tablist" aria-multiselectable="true">
						<div class="accordion-panel">
							<div class="accordion-heading" role="tab" id="headingOne">
								<h3 class="card-title accordion-title">
									<a class="accordion-msg waves-effect waves-dark text-primary" data-toggle="collapse"
									data-parent="#accordion" href="#collapseOne"
									aria-expanded="true" aria-controls="collapseOne"> Daftar syarat yudisium</a>
								</h3>
							</div>
							<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
								<div class="accordion-content accordion-desc">
									<div class="row">
										<div class="col-sm-12 col-xl-10 sub-title text-primary">
											<h6># Syarat yudisium</h6>
										</div>
										<div class="col-sm-12 col-xl-2 sub-title text-center text-primary">
											<h6>Qty</h6>
										</div>
										<!-- Data -->
										<?php $i=1; foreach($DataSyarat->result() as $syarat):?>
										<div class="col-sm-12 col-xl-10 sub-title">
											<div class="media">
												<label class="badge-top-right">S<?=$i++;?>. </label>
												<?= $syarat->requirements;?>
											</div>
										</div>
										<div class="col-sm-12 col-xl-2 sub-title text-center">
											<?= $syarat->qty;?>
										</div>
									<?php endforeach;?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-block table-border-style">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr class="text-primary">
								<th># Name</th>
								<?php $i=1; foreach($DataSyarat->result() as $syarat):?>
									<th data-toggle="tooltip" data-placement="left" data-original-title="<?= $syarat->requirements;?>">S<?= $i++;?></th>
								<?php endforeach;?>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php foreach($DataStudent->result() as $data):?>
									<th scope="row"><?= $data->fullname;?></th>
									<?php foreach($DataSyarat->result() as $syarat):?>
										<?php $value = $this->db->select('*')->where('nim',$data->username)->where('id_requirement', $syarat->id)->from('tb_uploadrequirementyudisium')->get()->result();?>
										<?php if(count($value) == 0):?>
											<td><i class="ti-close text-danger text-mini"></i></td>
										<?php else:?>
											<?php foreach($value as $dt):?>
												<td><i class="ti-check text-primary text-mini"></i></td>
											<?php endforeach;?>
										<?php endif;?>
									<?php endforeach;?>
								<?php endforeach;?>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>