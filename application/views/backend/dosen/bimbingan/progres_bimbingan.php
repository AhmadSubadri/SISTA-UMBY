<div class="col-xl-12">
	<div class="card">
		<div class="card-header" style="background-color: #75A8FE;">
			<h5 style="color: white;">Daftar progres bimbingan</h5>
		</div>
		<div class="card-block">
			<div class="row">
				<div class="col-sm-12 col-xl-4 sub-title text-primary">
					# Profil
				</div>
				<div class="col-sm-12 col-xl-3 sub-title text-primary">
					Total bimbingan
				</div>
				<div class="col-sm-12 col-xl-3 sub-title text-primary">
					Total feedback
				</div>
				<div class="col-sm-12 col-xl-2 sub-title text-primary">
					Aksi
				</div>
				<!-- Data -->
				<?php if(count($Data) != 0):?>
				<?php $j=1; foreach($Data as $user):?>
					<div class="col-sm-12 col-xl-4 sub-title text-primary">
						<div class="media">
							<label class="badge-top-right"><?=$j++;?>.</label>
							<?php if($user->image == null):?>
								<img class="img-radius img-40 align-top m-r-15"
								src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
							<?php else:?>
								<img src="<?php echo base_url('_uploads/profile/student/').$user->image;?>" alt="user image"
								class="img-radius img-40 align-top m-r-15">
							<?php endif;?>
							<div class="media-body align-middle">
								<h6 class="text-primary"></h6>
								<?= $user->fullname;?> / <?= $user->nim;?>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-xl-3 sub-title">
						<?php $totalBimbingan = $this->db->select('*')->where('sender', $user->nim)->from('tb_guidance')->get()->result();?>
						<?php if(count($totalBimbingan) >= 6):?>
							Total bimbingan : <label class="label label-success"><?= count($totalBimbingan);?> x</label>
						<?php else:?>
							Total bimbingan : <label class="label label-danger"><?= count($totalBimbingan);?> x</label>
							<br><i class="text-danger" style="font-size: 10px;">Total bimbingan kurang dari ketentuan</i>
						<?php endif;?>
					</div>
					<div class="col-sm-12 col-xl-3 sub-title">
						<?php $totalFeedback = $this->db->select('*')->where('receiver', $user->nim)->from('tb_guidancecard')->get()->result();?>
						<?php if(count($totalFeedback) >= 6):?>
							Total feedback : <label class="label label-success"><?= count($totalFeedback);?> x</label>
						<?php else:?>
							Total feedback : <label class="label label-danger"><?= count($totalFeedback);?> x</label>
							<br><i class="text-danger" style="font-size: 10px;">Total feedback kurang dari ketentuan</i>
						<?php endif;?>
					</div>
					<div class="col-sm-12 col-xl-2 sub-title">
						<a class="btn btn-mini btn-outline-primary" id="Modal-Tourist" data-toggle="modal" data-target="#modal_see_detail<?= $user->nim;?>" class="btn btn-mini btn-outline-success"><i class="ti-eye"></i>Detail</a>
					</div>
					<!-- Modal see detail -->
					<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modal_see_detail<?= $user->nim;?>" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Data bimbingan <?= $user->fullname;?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
	                                    <h6 class="sub-title text-primary">Data bimbingan mahasiswa</h6>
	                                    <?php $k=1; foreach($totalBimbingan as $bim):?>
	                                    <div class="media">
			                                &nbsp&nbsp&nbsp<label class="badge-top-right"><?=$k++;?>. </label>
			                                &nbsp<?= $bim->message;?>
			                            </div>
	                                    <?php endforeach;?>
	                                    <br><br><h6 class="sub-title text-primary">Data feedback pembimbing</h6>
	                                    <?php $l=1; foreach($totalFeedback as $feed):?>
	                                    	<div class="media">
				                                &nbsp&nbsp&nbsp<label class="badge-top-right"><?=$l++;?>. </label>
				                                &nbsp<?= $feed->message;?>
				                            </div>
	                                    <?php endforeach;?>
                                    </div>
                                </div>
                            </div>
                        </div>
				<?php endforeach;?>
				<?php else:?>
					<div class="col-sm-12 col-xl-12 sub-title text-center">
						Data not availabel
					</div>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>