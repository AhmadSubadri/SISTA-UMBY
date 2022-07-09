<?php $this->load->view('backend/partials_/alert_success.php');?>
<div class="card-block col-sm-12">
    <div class="card">
        <blockquote class="blockquote mb-0">
            <p class="text-c-red"><b>Note.</b> Sebelum melakukan pengajuan judul & proposal pastikan sudah anda siapkan
                dan anda konsultasikan ke dosen akademik anda.</p>
            <footer class="blockquote-footer"><cite title="Source Title">vital Records</cite></footer>
        </blockquote>
    </div>
</div>

<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            <h5>Form pengajuan judul dan proposal skripsi</h5>
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

<div class="col-md-8">
    <div class="card ">
        <div class="card-header">
            <h5>Riwayat pengajuan</h5>
            <div class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li><i class="fa fa fa-wrench open-card-option"></i></li>
                    <li><i class="fa fa-window-maximize full-card"></i></li>
                    <li><i class="fa fa-minus minimize-card"></i></li>
                    <li><i class="fa fa-refresh reload-card"></i></li>
                    <li><i class="fa fa-trash close-card"></i></li>
                </ul>
            </div>
        </div>
        <div class="card-block" style="display:block; height: 330px; overflow:auto;">
            <div class="row">
                <?php if(count($DataUpload) == null):?>
                <div class="col text-center"><br>
                    <h6>Data not available</h6>
                </div>
                <?php else:?>
                <?php foreach($DataUpload as $row):?>
                <div class="col-md-10">
                    <h6><?= $row->title;?></h6>
                    <p class="font-italic"><i class="ti-calendar"> Update : <?= $row->created_at;?></i></p>
                </div>
                <div class="col text-center">
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