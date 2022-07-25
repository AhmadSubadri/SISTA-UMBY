<div class="col-xl-12">
	<?php $this->load->view('backend/partials_/alert_success.php');?>
	<div class="card">
		<div class="card-header" style="background-color: #75A8FE;">
			<h5 style="color: white;">Mahasiswa daftar pendadaran periode <?= date('Y');?></h5>
		</div>
		<div class="card-block">
			<input type="text" id="InputSearchpendadaran" class="form-control" onkeyup="myFunctions()" placeholder="Search for names.." title="Type in a name">
			<div class="table-border-style">
				<div class="table-responsive">
					<table class="table table-hover" id="tabelfilterPendadaran">
						<thead>
							<tr class="text-primary">
								<th># Profil</th>
								<th>Program studi</th>
								<th>Angkatan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach($Data->result() as $row):?>
							<tr class="sub-title">
								<td>
									<div class="media">
										<label class="badge-top-right"><?=$i++;?>.</label>
										<?php if($row->image == null):?>
											<img class="img-radius img-40 align-top m-r-15"
											src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
										<?php else:?>
											<img src="<?php echo base_url('_uploads/profile/student/').$row->image;?>" alt="user image" class="img-radius img-40 align-top m-r-15">
										<?php endif;?>
										<div class="media-body align-middle">
											<?= $row->fullname;?> / <?= $row->username;?><br>
											<label class="text-primary"><?= $row->email;?></label>
										</div>
									</div>
								</td>
								<td class="align-middle"><?= $row->major;?></td>
								<td class="align-middle"><?= $row->class;?></td>
								<td>
									<?php $thesis = $this->db->select('*')->where('nim', $row->username)->from('tb_thesisreceived')->get()->result();?>
									<?php foreach($thesis as $t):?>
										<?php if($t->status_daftar_yudisium == 0):?>
											<a href="<?= site_url('TU/dashboard/daftarkan-yudisium-mahasiswa/'.$row->username);?>" class="btn btn-mini btn-outline-primary"><i class="ti-settings"></i>Daftar yudisium</a>
										<?php else:?>
											<a href="<?= site_url('TU/dashboard/batal-daftarkan-yudisium-mahasiswa/'.$row->username);?>" class="btn btn-mini btn-outline-danger"><i class="ti-settings"></i>Batalkan Daftar</a>
										<?php endif;?>
									<?php endforeach;?>
								</td>
							</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>

<script>
	function myFunctions() {
		var input, filter, table, tr, td, i, txtValue;
		input = document.getElementById("InputSearchpendadaran");
		filter = input.value.toUpperCase();
		table = document.getElementById("tabelfilterPendadaran");
		tr = table.getElementsByTagName("tr");
		for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[0];
			if (td) {
				txtValue = td.textContent || td.innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				}
			}       
		}
	}
</script>