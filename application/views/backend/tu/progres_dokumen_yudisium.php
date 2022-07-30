<div class="col-xl-12">
	<div class="card">
		<div class="card-header" style="background-color: #75A8FE;">
			<h5 style="color: white;">DETAIL DATA UPLOAD SYARAT YUDISIUM</h5>
		</div>
		<div class="card-block table-border-style">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr class="text-primary">
							<th># Profil</th>
							<?php $i=1; foreach($DataSyarat->result() as $syarat):?>
								<th data-toggle="tooltip" data-placement="left" data-original-title="<?= $syarat->requirements;?>" class="text-center">S<?= $i++;?>
								</th>
							<?php endforeach;?>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; foreach($DataStudent->result() as $data):?>
							<tr>
								<th class="media">
									<label class="badge-top-right"><?=$i++;?>.</label>
									<?php if($data->image == null):?>
										<img class="img-radius img-40 align-top m-r-15" src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
									<?php else:?>
										<img src="<?php echo base_url('_uploads/profile/student/').$data->image;?>" alt="user image" class="img-radius img-40 align-top m-r-15" width="40px" height="40px">
									<?php endif;?>
									<div class="media-body align-middle">
										<?= $data->fullname;?> / <?= $data->username;?><br>
										<label class="text-primary"><?= $data->email;?></label>
									</div>
								</th>
								<?php foreach($DataSyarat->result() as $syarat):?>
									<?php $value = $this->db->select('*')->where('nim',$data->username)->where('id_requirement', $syarat->id)->from('tb_uploadrequirementyudisium')->get()->result();?>
									<?php if(count($value) == 0):?>
										<td class="align-middle text-center"><i class="ti-close text-danger text-mini"></i></td>
									<?php else:?>
										<?php foreach($value as $dt):?>
											<?php if($dt->status != 0):?>
												<td class="text-center align-middle"><i class="ti-check text-primary text-mini"></i></td>
											<?php else:?>
												<td class="text-center align-middle text-primary"><i class="ti-stats-up"></i></td>
											<?php endif;?>
										<?php endforeach;?>
									<?php endif;?>
								<?php endforeach;?>
								<th class="text-center align-middle">
									<a href="<?= site_url('TU/dashboard/cek-dokumen-yudisium/'.$data->username);?>" class="btn btn-mini btn-outline-primary"><i class="ti-settings"></i>Check document</a>
								</th>
							</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>