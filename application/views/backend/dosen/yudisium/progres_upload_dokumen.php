<div class="col-xl-12">
	<div class="card">
		<div class="card-header">
			<h5>Data progres upload dokumen yudisium mahasiswa</h5>
		</div>
		<div class="card-block">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr class="text-primary">
							<th># Profil</th>
							<?php $i=1; foreach($DataSyarat->result() as $syarat):?>
								<th data-toggle="tooltip" data-placement="left" data-original-title="<?= $syarat->requirements;?>">S<?= $i++;?></th>
							<?php endforeach;?>
						</tr>
					</thead>
					<tbody>
						<?php $j=1; foreach($DataStudent as $data):?>
							<tr>
								<th>
									<div class="media">
										<label class="badge-top-right"><?=$j++;?>.</label>
										<?php if($data->image == null):?>
											<img class="img-radius img-40 align-top m-r-15"
											src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
										<?php else:?>
											<img src="<?php echo base_url('_uploads/profile/student/').$data->image;?>" alt="user image"
											class="img-radius img-40 align-top m-r-15">
										<?php endif;?>
										<div class="media-body align-middle">
											<h6 class="text-primary"></h6>
											<?= $data->fullname;?> / <?= $data->nim;?>
										</div>
									</div>
								</th>
								<?php foreach($DataSyarat->result() as $syarat):?>
									<?php $value = $this->db->select('*')->where('nim',$data->nim)->where('id_requirement', $syarat->id)->from('tb_uploadrequirementyudisium')->get()->result();?>
									<?php if(count($value) == 0):?>
										<td><i class="ti-close text-danger text-mini"></i></td>
									<?php else:?>
										<?php foreach($value as $dt):?>
											<td><i class="ti-check text-primary text-mini"></i></td>
										<?php endforeach;?>
									<?php endif;?>
								<?php endforeach;?>
							</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>