<?php $this->load->view('backend/partials_/alert_success.php');?>
<div class="col-xl-12">
	<div class="card">
		<div class="card-header">
			<h5 class="text-primary">Setting profile</h5>
		</div>
		<div class="card-block">
			<?php echo form_open_multipart('update-profile');?>
				<div class="modal-body">
					<div class="form-group form-default row">
						<div class="form-group col-sm-6 form-default form-static-label">
							<input type="text" name="username" class="form-control" value="<?= $this->session->userdata('username');?>" required="" readonly>
							<span class="form-bar"></span>
							<label class="float-label text-primary">NIM/NID</label>
						</div>
						<div class="form-group col-sm-6 form-default form-static-label">
							<input type="text" name="nama" class="form-control" value="<?= $this->session->userdata('name');?>">
							<span class="form-bar"></span>
							<label class="float-label text-primary">Name</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="form-group col-sm-6 form-default form-static-label">
							<input type="email" name="email" class="form-control" value="<?= $this->session->userdata('email');?>">
							<span class="form-bar"></span>
							<label class="float-label text-primary">Email</label>
						</div>
						<div class="form-group col-sm-6 form-default form-static-label">
							<input type="password" name="password" class="form-control" required>
							<span class="form-bar"></span>
							<label class="float-label text-primary">Password</label><label class="text-danger font-italic">(wajib isi meskipun isinya masih sama dengan password lama)</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="form-group col-sm-4 form-default form-static-label">
							<input type="text" name="gender" class="form-control" value="<?= $this->session->userdata('gender');?>">
							<span class="form-bar"></span>
							<label class="float-label text-primary">Jenis kelamin</label>
						</div>
						<div class="form-group col-sm-4 form-default form-static-label">
							<input type="text" name="phone" class="form-control" value="<?= $this->session->userdata('phone');?>" maxlength="13">
							<span class="form-bar"></span>
							<label class="float-label text-primary">No. Hp</label>
						</div>
						<div class="form-group col-sm-4 form-default form-static-label">
							<input type="file" name="file" class="form-control" placeholder="Ruang 152">
							<span class="form-bar"></span>
							<label class="float-label text-primary">Image</label> <label class="text-danger font-italic">(kosongkan jika tidak perlu)</label><br>allowed type : jpg/png/JPG/PNG/JPEG/jpeg
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-mini btn-primary">Update Profile</button>
				</div>
			</form>
		</div>
	</div>
</div>