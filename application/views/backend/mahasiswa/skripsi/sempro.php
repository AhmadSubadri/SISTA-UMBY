<div class="col-xl-12">
    <div class="card">
    <div class="card-header" style="background-color: #75A8FE;">
        <h5 style="color: white;">Detail seminar proposal</h5>
    </div>
    <div class="card-block">
        <div class="row">
            <div class="col-sm-12 col-xl-4">
                <h4 class="sub-title">Penguji Seminar proposal</h4>
                <ul>
                    <?php foreach($DataPengujiSempro as $row):?>
                    <li>
                        <?php if($row->nim == 0):?>
                        <label class="label label-mini label-danger">Belum ada dosen penguji</label>
                        <?php else:?>
                        <i class="icofont ti-angle-double-right text-success"></i> <?= $row->name;?>
                        <?php endif;?>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class="col-sm-12 col-xl-4">
                <h4 class="sub-title">Jadwal seminar proposal</h4>
                <ul>
                    <?php foreach($DataDataSempro as $row):?>
                    <li>
                        <?php if($row->tanggal == 0):?>
                        <label class="label label-mini label-danger">Belum terjadwal</label>
                        <?php else:?>
                        <h6>
                            <i class="icofont ti-hand-point-right text-success"></i> Hari/tgl :
                            <?php echo format_tanggal(date($row->tanggal));?> / <?= $row->jam;?>
                        </h6>
                        <h6>
                            <i class="icofont ti-hand-point-right text-success"></i> Tempat : <?= $row->tempat;?>
                        </h6>
                        <h6>
                            <i class="icofont ti-hand-point-right text-success"></i> Kegiatan : <?= $row->kegiatan;?>
                        </h6>
                        <?php endif;?>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header" style="background-color: #75A8FE;">
        <h5 style="color: white;">Pengumuman hasil seminar proposal</h5>
    </div>
    <div class="card-block">
        <div class="row">
            <div class="col-sm-12 col-xl-12">
                <h4 class="sub-title text-center">Pengumuman hasil Seminar proposal</h4>
                <ul>
                    <?php foreach($DataDataSempro as $row):?>
                    <li>
                        <?php if($row->status == 0):?>
                        <div class="text-center">
                            <h6>Data not available</h6>
                        </div>
                        <?php elseif($row->status == 1):?>
                        <div class="sub-title">
                            <h4 class="sub-title text-center">*Judul dan proposal anda
                                <label class="label label-mini label-success">diterima,</label>
                            </h4>
                            <?= $row->note;?>
                        </div>
                        <blockquote class="blockquote mb-0">
                            <p class="text-c-red"><b>Note.</b> Tahap lanjutan ke Bimbingan skripsi setelah ploting dosen
                                pembimbing skripsi sudah di sahkan</p>
                            <footer class="blockquote-footer"><cite title="Source Title">vital Records</cite></footer>
                        </blockquote>
                        <?php elseif($row->status == 2):?>
                        <div class="text-center">
                            <h4 class="sub-title text-center">*Judul dan proposal anda <label
                                    class="label label-mini label-success">diterima dengan revisi</label>
                                <?= $row->note;?>
                            </h4>
                        </div>
                        <blockquote class="blockquote mb-0">
                            <p class="text-c-red"><b>Note.</b> Tahap lanjutan ke Bimbingan skripsi setelah ploting
                                dosen pembimbing skripsi sudah di sahkan</p>
                            <footer class="blockquote-footer"><cite title="Source Title">vital Records</cite>
                            </footer>
                        </blockquote>
                        <?php else:?>
                        <div class="text-center">
                            <h4 class="sub-title text-center">*Judul dan proposal anda <label
                                    class="label label-mini label-danger">ditolak</label>
                                <?= $row->note;?>
                            </h4>
                        </div>
                        <blockquote class="blockquote mb-0">
                            <p class="text-c-red"><b>Note.</b> Tahap lanjutan ke Bimbingan skripsi belum bisa di
                                lanjutkan, silahkan ajukan judul dan proposal kembali</p>
                            <footer class="blockquote-footer"><cite title="Source Title">vital Records</cite>
                            </footer>
                        </blockquote>
                        <?php endif;?>
                    </li>
                    <?php endforeach;?>
                    <br>
                    <li>
                        <div class="row">
                            <div class="col-md-4 sub-title">
                                <h6># Dosen penguji</h6>
                            </div>
                            <div class="col-md-8 sub-title">
                                <h6>Catatan</h6>
                            </div><br><br>
                            <?php $i=1; foreach($GetFeedbackSempro as $row):?>
                            <div class="col-md-4 sub-title">
                                <h6><?= $i++;?>.&nbsp;&nbsp;<?= $row->name;?></h6>
                            </div>
                            <div class="col-md-6 sub-title">
                                <?php if($row->note == null):?>
                                <label class="label label-mini label-warning">Note null</label>
                                <?php else:?>
                                <?= $row->note;?>
                                <?php endif;?>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>