<div class="col-xl-12">
	<?php $this->load->view('backend/partials_/alert_success.php');?>
	<a href="<?= site_url('dsn/dashboard/mahasiswa-yudisium');?>" class="btn btn-mini"><i
		class="ti-back-left"></i>Kembali</a>
	<div class="card">
		<div class="card-header">
			<h5>Detail data upload syarat yudisium</h5>
		</div>
		<div class="card-block">
			<h6 class="sub-title">Progres upload syarat yudisium</h6>
			<div class="accordion-block">
				<div id="accordion" role="tablist" aria-multiselectable="true">
					<div class="accordion-panel">
						<div class="accordion-heading" role="tab" id="headingOne">
							<h3 class="card-title accordion-title">
								<a class="accordion-msg waves-effect waves-dark" data-toggle="collapse"
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
											<?= $i++;?>. <?= $syarat->requirements;?>
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
			</div><br>
			<div class="card-block table-border-style">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th># Name</th>
								<?php $i=1; foreach($DataSyarat->result() as $syarat):?>
								<th>S<?= $i++;?></th>
								<?php endforeach;?>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">1</th>
								<td>Mark</td>
								<td>Otto</td>
								<td>@mdo</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>