<?php $this->load->view('backend/partials_/alert_success.php');?>
<div class="col-xl-12">
    <div class="card">
        <div class="card-header" style="background-color: #FFE3C7;">
            <b>Note.</b> Sebelum melakukan pengajuan judul & proposal pastikan sudah anda siapkan
                dan anda konsultasikan ke dosen akademik anda.
        </div>
    </div>
</div>
<div class="col-md-5">
    <div class="card">
        <div class="card-header" style="background-color: #75A8FE;">
            <h5 style="color: white;">Form pengajuan judul dan proposal skripsi</h5>
        </div>
        <?php if (count($CountThesisAcc) > 0):?>
        <div class="card-block" style="pointer-events: none; opacity: 0.4;">
            <form class="form-material">
                <input type="text" name="nim" value="<?= $this->session->userdata('username');?>" required="" hidden>
                <input type="text" name="major" value="<?= $this->session->userdata('major');?>" required="" hidden>
                <input type="text" name="name" value="<?= $this->session->userdata('name');?>" required="" hidden>
                <div class="form-group form-default">
                    <textarea class="form-control" name="title" required=""></textarea>
                    <span class="form-bar"></span>
                    <label class="float-label">Judul area Input</label>
                </div>
                <div class="form-group form-default">
                    <select name="nidn" class="form-control">
                        <?php foreach ($DataDosen as $row):?>
                        <option value="<?= $row->username;?>"><?= $row->fullname;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Upload File</label>
                    <div class="">
                        <input type="file" name="file" class="form-control">
                    </div>
                </div>
                <button class="btn btn-sm waves-effect waves-light btn-primary"><i class="ti-save"></i>Upload
                    pengajuan</button>
            </form>
        </div>
        <?php else:?>
        <div class="card-block">
            <?= form_open_multipart('mhs/dashboard/upload-pengajuan'); ?>
            <div class="form-material">
                <input type="text" name="nim" value="<?= $this->session->userdata('username');?>" required="" hidden>
                <input type="text" name="major" value="<?= $this->session->userdata('major');?>" required="" hidden>
                <input type="text" name="name" value="<?= $this->session->userdata('name');?>" required="" hidden>
                <div class="form-group form-default">
                    <textarea class="form-control" name="title" required=""></textarea>
                    <span class="form-bar"></span>
                    <label class="float-label">Judul area Input</label>
                </div>
                <div class="form-group form-default">
                    <select name="nidn" class="form-control">
                        <?php foreach ($DataDosen as $row):?>
                        <option value="<?= $row->username;?>"><?= $row->fullname;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <input id="uploadFile" name="file" class="form-bg-null" placeholder="name file..." disabled />
                    <div class="fileUpload btn btn-mini btn-grd-inverse">
                        <span>Choose file</span>
                        <input id="uploadBtn" type="file" name="file" class="upload" />
                    </div>
                </div>
                <button class="btn btn-mini waves-effect waves-light btn-grd-primary"><i class="ti-save"></i>Upload pengajuan</button>
            </div>
            <?= form_close();?>
        </div>
        <?php endif; ?>
    </div>
</div>

<div class="col-md-7">
    <div class="card ">
        <div class="card-header" style="background-color: #75A8FE;">
            <h5 style="color: white;">Daftar pengajuan</h5>
        </div>
        <div class="card-block" style="display:block; height: 330px; overflow:auto;">
            <div class="row">
                <?php if(count($DataUpload) == null):?>
                <div class="col text-center"><br>
                    <h6>Data not available</h6>
                </div>
                <?php else:?>
                <?php foreach($DataUpload as $row):?>
                <div class="col-sm-10">
                    <h6><?= $row->title;?></h6>
                    <p class="font-italic"><i class="ti-calendar"> Update : <?= $row->created_at;?></i></p>
                </div>
                <div class="col-sm-2 text-center">
                    <?php if ($row->status == '0'): ?>
                    <label class="label label-md label-warning">Waiting</label>
                    <?php elseif ($row->status == '1'):?>
                    <label class="label label-md label-success">Diterima</label>
                    <?php elseif ($row->status == '2'):?>
                    <label class="label label-md label-success">Diterima dengan revisi</label>
                    <?php else:?>
                    <label class="label label-md label-danger">Ditolak</label>
                    <?php endif;?>
                </div>
                <?php endforeach;?>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-12">
<div class="card">
    <div class="card-header" style="background-color: #75A8FE;">
        <h5 style="color: white;">Riwayat pengajuan</h5>
    </div>
    <div class="card-block">
        <div class="row">
            <div class="col-sm-12 col-xl-10 sub-title text-primary">
                # Judul
            </div>
            <div class="col-sm-12 col-xl-2 sub-title text-primary">
                Catatan
            </div>
            <?php if(count($DataCard) != 0):?>
            <?php $k=1; foreach($DataCard as $card):?>
                <div class="col-sm-12 col-xl-10 sub-title">
                    <h6><?= $k++;?>. <?= $card->title;?></h6>
                </div>
                <div class="col-sm-12 col-xl-2 sub-title">
                    <?php if ($card->status == '0'): ?>
                    <label class="label label-md label-warning">Waiting</label>
                    <?php elseif ($card->status == '1'):?>
                    <label class="label label-md label-success">Diterima</label>
                    <?php elseif ($card->status == '2'):?>
                    <label class="label label-md label-success">Diterima dengan revisi</label>
                    <?php else:?>
                    <label class="label label-md label-danger">Ditolak</label>
                    <?php endif;?>
                </div>
            <?php endforeach;?>
            <?php else:?>
                 <div class="col-sm-12 col-xl-12 text-center sub-title">
                    Data not availabel
                 </div>
            <?php endif;?>
        </div>
    </div>
</div>
</div>

<style>
.fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
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
<script type="text/javascript">
document.getElementById("uploadBtn").onchange = function() {
    document.getElementById("uploadFile").value = this.value;
};
</script>