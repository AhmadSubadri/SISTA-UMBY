<div class="col-xl-12">
	<div class="card">
		<div class="card-header" style="background-color: #75A8FE;">
			<h5 style="color: white;">PROGRES UPLOAD DOKUMEN YUDISIUM</h5>
		</div>
		<div class="card-block">
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
							<td>
								<?php $i=1; foreach($DataNilai as $row):?>
								<?php $Progres = $this->db->select('*')->where('nim', $this->session->userdata('username'))->from('tb_uploadrequirementyudisium')->get()->result();?>
								<?php if($row->status_daftar_yudisium != null):?>
									<?php if(count($DataSyarat->result()) == 0):?>
										<label class="label label-mini label-danger">Document requirement yudisium is NULL</label>
									<?php else:?>
										<?php if(count($Progres) != count($DataSyarat->result())):?>
										Sudah upload : <label class="badge badge-success"><?= count($Progres)?></label><br>
										Belum upload : <label class="badge badge-danger"><?= count($DataSyarat->result())-count($Progres)?></label>
										<?php else:?>
										Sudah upload : <label class="badge badge-success"><?= count($Progres);?></label><br>
										Belum upload : <label class="badge badge-danger"><?= count($DataSyarat->result())-count($Progres);?></label><br>
										<label class="label label-mini label-success">Sudah upload semua dokumen</label>
										<?php endif;?>
									<?php endif;?>
								<?php else:?>
									<label class="label label-mini label-danger">Belum terdaftar</label>
								<?php endif;?>
								<?php endforeach;?>
							</td>
							<?php foreach($DataSyarat->result() as $syarat):?>
								<?php $value = $this->db->select('*')->where('nim', $this->session->userdata('username'))->where('id_requirement', $syarat->id)->from('tb_uploadrequirementyudisium')->get()->result();?>
								<?php if(count($value) == 0):?>
									<td class="justify-content-center"><i class="ti-close text-danger text-mini"></i></td>
								<?php else:?>
									<?php foreach($value as $dt):?>
										<?php if($dt->status != 0):?>
											<td class="justify-content-center"><i class="ti-check text-primary text-mini"></i></td>
										<?php else:?>
											<td class="justify-content-center"><i class="ti-stats-up text-primary text-mini"></i></td>
										<?php endif;?>
									<?php endforeach;?>
								<?php endif;?>
							<?php endforeach;?>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>