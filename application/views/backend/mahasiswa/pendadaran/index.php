<div class="col-xl-12">
    <?php $this->load->view('backend/partials_/alert_success.php');?>
    <div class="card">
        <div class="card-header">
            <h6>Unggah dokumen syarat pendadaran</h6>
        </div>
        <div class="card-block">
            <div class="row">
                <div class="col-sm-12 col-xl-8 sub-title">
                    #Jenis dokumen
                </div>
                <div class="col-sm-12 col-xl-2 sub-title text-center">
                    Status
                </div>
                <div class="col-sm-12 col-xl-2 sub-title text-center">
                    Aksi
                </div>
                <!-- Data -->
                <?php if(count($Data) != 0):?>
                    <?php $i=1; foreach($DataSyarat as $syarat):?>
                    <div class="col-sm-12 col-xl-8">
                        <b><?= $i++;?>. <?= $syarat->requirements;?><i class="text-danger">(wajib)</i></b>
                    </div>
                    <?php $Doc = $this->db->select('*')->where('id_requirement', $syarat->id)->where('nim', $this->session->userdata('username'))->from('tb_uploadrequirementexam')->get()->result();?>
                    <div class="col-sm-12 col-xl-2 text-center">
                        <?php if(!empty($Doc)):?>
                            <?php foreach($Doc as $doct):?>
                                <label class="label label-mini label-success">Sudah upload</label>
                            <?php endforeach;?>
                        <?php else:?>
                            <label class="label label-mini label-danger">Belum upload</label>
                        <?php endif;?>
                    </div>
                    <div class="col-sm-12 col-xl-2">
                        <?php if(!empty($Doc)):?>
                            <?php foreach($Doc as $docu):?>
                                <a href="" class="btn btn-mini btn-outline-success"><i class="ti-eye"></i> Lihat</a>
                                <a href="<?= site_url('mhs/dashboard/delete-document/'.$docu->id);?>" class="btn btn-mini btn-outline-danger"><i class="ti-trash"></i>Ubah</a>
                            <?php endforeach;?>
                        <?php else:?>
                            <?php echo form_open_multipart('mhs/dashboard/save-document');?>
                                <a href="" class="btn btn-mini btn-outline-success disabled"><i class="ti-na"></i> Lihat</a>
                                <input name="id_syarat" class="form-bg-null" value="<?= $syarat->id?>" hidden/>
                                <div class="fileUpload btn btn-mini btn-grd-inverse">
                                    <span><i class="ti-upload"></i>Upload</span>
                                    <input id="uploadBtna" type="file" name="file" class="upload" onchange="javascript:this.form.submit();" />
                                </div>
                            </form>
                        <?php endif;?>
                    </div>
                    <div class="sub-title col-sm-12 col-xl-12"></div>
                    <?php endforeach;?>
                <?php else:?>
                    <div class="sub-title col-sm-12 col-xl-12 text-center">Data not availabel</div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<!-- <form action="upload.php" method="post" enctype="multipart/form-data">
<input type="file" name="filename" onchange="javascript:this.form.submit();">
</form> -->
<style>
    .fileUpload {
        position: relative;
        overflow: hidden;
        /* margin: 10px; */
    }

    .fileUpload input.upload {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }
</style>