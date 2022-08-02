<?php $this->load->view('backend/partials_/alert_success.php');?>
<div class="col-xl-12">
	<div class="card">
		<?= form_open_multipart('Contact/SaveContact'); ?>
		<div class="card-header">
			<h5>Setting's contact</h5>
			<div class="card-header-right">
				<button type="submit" class="btn btn-mini btn-outline-primary"><b class="ti-save"></b> Save setting</button>
			</div>
		</div>
		<div class="card-block">
			<?php $dataA = $this->db->select('*')->from('contact')->get();?>
			<?php if(count($dataA->result()) != 0):?>
				<?php foreach($dataA->result_array() as $j): $id = $j['id'];$email = $j['email'];$alamat=$j['alamat'];$fax=$j['fax'];$maps=$j['maps'];$phone=$j['phone'];?>
					<div class="form-group form-default row">
						<input type="hidden" name="id" value="<?= $id;?>">
						<div class="form-group col-sm-4 form-default form-static-label">
							<textarea name="alamat" class="form-control"><?= $alamat;?></textarea>
							<span class="form-bar"></span>
							<label class="float-label text-primary">Alamat</label>
						</div>
						<div class="form-group col-sm-4 form-default form-static-label">
							<input type="text" name="email" value="<?= $email;?>" class="form-control" placeholder="- -">
							<span class="form-bar"></span>
							<label class="float-label text-primary">E-mail</label>
						</div>
						<div class="form-group col-sm-4 form-default form-static-label">
							<input type="text" name="fax" value="<?= $fax;?>" class="form-control" placeholder="- -">
							<span class="form-bar"></span>
							<label class="float-label text-primary">Fax</label>
						</div>
					</div>
					<div class="form-group form-default row">
						<div class="form-group col-sm-10 form-default form-static-label">
							<textarea name="maps" class="form-control"><?= $maps;?></textarea>
							<span class="form-bar"></span>
							<label class="float-label text-primary">Maps link</label><br>
							<iframe class="mb-4 mb-lg-0" src="<?= $maps;?>" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
						</div>
						<div class="form-group col-sm-2 form-default form-static-label">
							<input type="text" name="phone" class="form-control" value="<?= $phone;?>">
							<span class="form-bar"></span>
							<label class="float-label text-primary">Phone</label>
						</div>
					</div>
				<?php endforeach;?>
			<?php else:?>
				<div class="form-group form-default row">
					<div class="form-group col-sm-4 form-default form-static-label">
						<textarea name="alamat" class="form-control"></textarea>
						<span class="form-bar"></span>
						<label class="float-label text-primary">Alamat</label>
					</div>
					<div class="form-group col-sm-4 form-default form-static-label">
						<input type="email" name="email" class="form-control" placeholder="" required>
						<span class="form-bar"></span>
						<label class="float-label text-primary">E-mail</label>
					</div>
					<div class="form-group col-sm-4 form-default form-static-label">
						<input type="numerix" name="fax" class="form-control" maxlength="15" required>
						<span class="form-bar"></span>
						<label class="float-label text-primary">Fax</label>
					</div>
				</div>
				<div class="form-group form-default row">
					<div class="form-group col-sm-8 form-default form-static-label">
						<textarea name="maps" class="form-control"></textarea>
						<span class="form-bar"></span>
						<label class="float-label text-primary">Maps link</label>
					</div>
					<div class="form-group col-sm-4 form-default form-static-label">
						<input type="text" name="phone" class="form-control" required maxlength="15">
						<span class="form-bar"></span>
						<label class="float-label text-primary">Phone</label>
					</div>
				</div>
			<?php endif;?>
		</div>
		</form>
	</div>
</div>