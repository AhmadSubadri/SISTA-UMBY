<div class="col-xl-12">
    <?php $this->load->view('backend/partials_/alert_success.php');?>
    <div class="card">
        <div class="card-header" style="background-color: #FFE3C7;">
            <b>Note.</b> Pastikan semua dokumen sudah anda upload sesuai dengan ketentuan, agar tombol <code>Daftar pendadaran sekarang</code> di pojok kanan atas di bawah ini bisa aktif. <code>Setelah aktif</code> silahkan di klik agar anda terdaftar. Tanda anda sudah terdaftar jika tombol berubah menjadi <code>Sudah terdaftar di pendadaran</code>.
        </div>
    </div>
    <div class="card">
        <div class="card-header" style="background-color: #75A8FE;">
            <h5 style="color: white;">Daftar pendadaran sekarang</h5>
            <div class="card-header-right">
                <?php if(count($Data) != 0):?>
                    <?php $Document = $this->db->select('*')->where('nim', $this->session->userdata('username'))->from('tb_uploadrequirementexam')->get()->result();?>
                    <?php if(count($DataSyarat) == count($Document)):?>
                        <?php $thesis = $this->db->select('*')->where('nim', $this->session->userdata('username'))->from('tb_thesisreceived')->get()->result();?>
                        <?php foreach($thesis as $ths):?>
                            <?php if($ths->status_daftar == null):?>
                                <a href="<?= site_url('mhs/dashboard/daftar-pendadaran-sekarang/'.$this->session->userdata('username'));?>" class="btn btn-mini btn-outline-primary" data-toggle="tooltip" data-placement="left" data-original-title="Klik Daftar pendadaran sekarang">Daftar pendadaran sekarang</a>
                            <?php else:?>
                                <a href="" class="btn btn-mini btn-outline-warning disabled" data-toggle="tooltip" data-placement="left" data-original-title="Anda sudah daftar pendadaran sekarang">Sudah terdaftar di pendadaran</a>
                            <?php endif;?>
                        <?php endforeach;?>
                    <?php else:?>
                        <a href="" class="btn btn-mini btn-outline-danger disabled">Belum bisa daftar pendadaran</a>
                    <?php endif;?>
                <?php else:?>
                    
                <?php endif;?>
            </div>
        </div>
        <div class="card-block">
        <h6 class="sub-title">Unggah dokumen syarat pendadaran</h6>
        <div class="row">
            <div class="col-sm-12 col-xl-8 sub-title text-primary">
                #Jenis dokumen
            </div>
            <div class="col-sm-12 col-xl-2 sub-title text-center text-primary">
                Status
            </div>
            <div class="col-sm-12 col-xl-2 sub-title text-center text-primary">
                Aksi
            </div>
            <!-- Data -->
            <?php if(count($Data) != 0):?>
                <?php foreach($DataDokumenAkhir as $dda):?>
                    <?php if($dda->laporan_akhir == 0):?>
                        <div class="col-sm-12 col-xl-8 sub-title">
                            Upload dokumen laporan akhir skripsi yang sudah di acc oleh pembimbing untuk daftar pendadaran.<label class="text-italic text-danger" style="font-size: 8px;">(wajib .pdf)</label>
                        </div>
                        <div class="col-sm-12 col-xl-2 sub-title text-center">
                            <label class="label label-mini label-danger">Belum upload</label>
                        </div>
                        <div class="col-sm-12 col-xl-2 sub-title text-center">
                            <?php echo form_open_multipart('mhs/dashboard/save-laporan-akhir');?>
                            <div class="Uploadfile btn btn-mini btn-grd-inverse">
                                <span><i class="ti-upload"></i>Upload</span>
                                <input id="uploadBtnb" type="file" name="file" class="upload" onchange="javascript:this.form.submit();" />
                            </div>
                        </form>
                    </div>
                <?php else:?>
                    <div class="col-sm-12 col-xl-8 sub-title">
                        # Dokumen laporan akhir skripsi yang sudah di acc oleh pembimbing untuk daftar pendadaran.<i class="text-danger" style="font-size: 8px;">(*wajib)</i>
                    </div>
                    <div class="col-sm-12 col-xl-2 sub-title text-center">
                        <label class="label label-mini label-success">Sudah upload</label>
                    </div>
                    <div class="col-sm-12 col-xl-2 sub-title text-center">
                        <a id="Modal-Tourist" data-toggle="modal" data-target="#modal_see_laporanakhir<?= $dda->id;?>" class="btn btn-mini btn-outline-success"><i class="ti-eye"></i> Lihat</a>
                        <a href="<?= site_url('mhs/dashboard/delete-document-laporan-akhir/'.$dda->id);?>" class="btn btn-mini btn-outline-danger"><i class="ti-trash"></i>Ubah</a>
                    </div>
                    <!-- modal modal_see_laporanakhir -->
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modal_see_laporanakhir<?= $dda->id;?>" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Dokumen laporan akhir skripsi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <object data="<?=base_url('_uploads/laporanakhir/'.$this->session->userdata('name').'/'.$dda->laporan_akhir);?>" width="100%" height="500"></object>
                            </div>
                        </div>
                    </div>
                
                    <?php $i=1; foreach($DataSyarat as $syarat):?>
                    <div class="col-sm-12 col-xl-8">
                        <div class="media">
                            <label class="badge-top-right">S<?=$i++;?>. </label>
                            <?= $syarat->requirements;?><i class="text-danger" style="font-size: 8px;">(*wajib)</i>
                        </div>
                    </div>
                    <?php $Doc = $this->db->select('*')->where('id_requirement', $syarat->id)->where('nim', $this->session->userdata('username'))->from('tb_uploadrequirementexam')->get();?>
                    <div class="col-sm-12 col-xl-2 text-center">
                        <?php if(!empty($Doc->result())):?>
                            <?php foreach($Doc->result() as $doct):?>
                                <label class="label label-mini label-success">Sudah upload</label>
                            <?php endforeach;?>
                        <?php else:?>
                            <label class="label label-mini label-danger">Belum upload</label>
                        <?php endif;?>
                    </div>
                    <div class="col-sm-12 col-xl-2 text-center">
                        <?php if(!empty($Doc->result())):?>
                            <?php foreach($Doc->result() as $docu):?>
                                <a id="Modal-Tourist" data-toggle="modal" data-target="#modal_see<?= $docu->id;?>" class="btn btn-mini btn-outline-success"><i class="ti-eye"></i> Lihat</a>
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
                <?php foreach($Doc->result_array() as $l): $idty = $l['id'];$file = $l['file'];?>
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modal_see<?= $idty;?>" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Document syarat pendadaran</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <object data="<?=base_url('_uploads/pendadaran/'.$this->session->userdata('name').'/'.$file);?>" width="100%" height="500"></object>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
                <?php endforeach;?>
            <?php endif;?>
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

    .Uploadfile {
        position: relative;
        overflow: hidden; 
    }

    .Uploadfile input.upload {
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