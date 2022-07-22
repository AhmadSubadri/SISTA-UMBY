<div class="col-xl-12">
    <a href="<?= site_url('dsn/dashboard/data-sempro-skripsi');?>" class="btn btn-mini btn-outline-primary"><i class="ti-back-left"></i>Kembali</a>
    <div class="card">
        <div class="card-block">
            <?php foreach($Data as $row):?>
                <div class="media">
                    <?php if($row->image == null):?>
                        <img class="img-radius img-40 align-top m-r-15"
                        src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
                    <?php else:?>
                        <img src="<?php echo base_url('_uploads/profile/student/').$row->image;?>"
                        alt="user image" class="img-radius img-40 align-top m-r-15">
                    <?php endif;?>
                    <div class="media-body">
                        <h5 class="notification-user"><?= $row->name;?> - <?= $row->nim;?></h5>
                        <h6 class="notification-msg font-italic">"<?= $row->title;?>"</h6>
                        <a href="" class="btn btn-mini btn-grd-info btn-info btn-outline-info"><i class="ti-download"></i>Download file</a>
                    </div>
                </div>
            <?php endforeach;?>
            <br>
            <div class="row">
                <div class="col-sm-12 col-xl-5">
                    <h4 class="sub-title">Penguji Seminar proposal</h4>
                    <ul>
                        <?php foreach($DataPengujiSempro as $row):?>
                        <li>
                            <i class="icofont ti-angle-double-right text-success"></i> <?= $row->name;?>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
            <br>
            <?= form_open_multipart('dsn/dashboard/save-jadwal-sempro'); ?>
            <div class="form-material">
                <?php foreach($Data as $row):?>
                    <input type="text" name="nim" value="<?= $row->nim;?>" class="form-control" hidden>
                <?php endforeach;?>
                <div class="form-group form-default row">
                    <div class="col-sm-6">
                        <input type="text" name="kegiatan" class="form-control" required="">
                        <span class="form-bar"></span>
                        <label class="float-label">Kegiatan</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" name="tempat" class="form-control" required="">
                        <span class="form-bar"></span>
                        <label class="float-label">Tempat</label>
                    </div>
                </div>
                <div class="form-group form-default row">
                    <div class="col-sm-6">
                        <input type="date" name="tanggal" class="form-control" required="">
                        <span class="form-bar"></span>
                    </div>
                    <div class="col-sm-6">
                        <input type="time" name="jam" class="form-control" required="">
                        <span class="form-bar"></span>
                    </div>
                </div>
                <button class="btn btn-mini waves-effect waves-light btn-grd-primary"><i class="ti-save"></i>Save jadwal</button>
            </div>
            <?= form_close();?>
        </div>
    </div>
</div>
