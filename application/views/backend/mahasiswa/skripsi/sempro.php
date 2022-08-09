<div class="col-xl-12">
    <div class="card">
    <div class="card-header" style="background-color: #75A8FE;">
        <h5 style="color: white;">DETAIL SEMINAR PROPOSAL</h5>
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
                    <?php foreach($DataDataSempro as $rowa):?>
                    <li>
                        <?php if($rowa->tempat != null):?>
                            <h6>
                            <i class="icofont ti-hand-point-right text-success"></i> 
                            <?php if(format_tanggal(date($rowa->tanggal)) == format_tanggal(date('Y-m-d'))):?>
                                <b class="text-danger" id="warningscheduleM">Hari ini : <?php echo format_tanggal(date($rowa->tanggal));?> / <?= $rowa->jam;?></b>
                            <?php else:?>
                                Hari/Tanggal : <?php echo format_tanggal(date($rowa->tanggal));?> / <?= $rowa->jam;?>
                            <?php endif;?>
                            </h6>
                            <h6>
                                <i class="icofont ti-hand-point-right text-success"></i> Tempat : <?= $rowa->tempat;?>
                            </h6>
                            <h6>
                                <i class="icofont ti-hand-point-right text-success"></i> Kegiatan : <?= $rowa->kegiatan;?>
                            </h6>
                        <?php else:?>
                            <label class="label label-mini label-danger">Belum terjadwal</label>
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
        <h5 style="color: white;">PENGUMUMAN HASIL SEMINAR PROPOSAL</h5>
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
                            <h4 class="sub-title">*Judul dan proposal anda
                                <label class="label label-mini label-success">diterima</label>
                            </h4>
                            Catatan : 
                            <?= $row->note;?>
                        </div>
                        <div style="background-color: #FFE3C7; font-size: 13px;">
                            <i><b>Note.</b> Tahap lanjutan ke Bimbingan skripsi setelah ploting dosen pembimbing skripsi sudah di sahkan</i>
                        </div>
                        <?php elseif($row->status == 2):?>
                        <div class="text-center">
                            <h4 class="sub-title text-center">*Judul dan proposal anda <label
                                    class="label label-mini label-success">diterima dengan revisi</label>
                                <?= $row->note;?>
                            </h4>
                        </div>
                        <div style="background-color: #FFE3C7; font-size: 13px;">
                            <i><b>Note.</b> Tahap lanjutan ke Bimbingan skripsi setelah ploting dosen pembimbing skripsi sudah di sahkan</i>
                        </div>
                        <?php else:?>
                        <div class="text-center">
                            <h4 class="sub-title text-center">*Judul dan proposal anda <label
                                    class="label label-mini label-danger">ditolak</label>
                                <?= $row->note;?>
                            </h4>
                        </div>
                        <div style="background-color: #FFE3C7; font-size: 13px;">
                            <i class=""><b>Note.</b> Tahap lanjutan ke Bimbingan skripsi belum bisa di
                                lanjutkan, silahkan ajukan judul dan proposal kembali</i>
                        </div>
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

<style type="text/css">
    #warningscheduleM {
  animation: blinker2 0.6s cubic-bezier(1, 0, 0, 1) infinite alternate;  
}
@keyframes blinker2 { to { opacity: 0; } }
</style>