<div class="card col-sm-12">
    <div class="card-header">
        <h5>Detail seminar proposal</h5>
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
                            <?php if($row->tanggal == null):?>
                                <label class="label label-mini label-danger">Belum terjadwal</label>
                            <?php else:?>
                                <h6>
                                    <i class="icofont ti-hand-point-right text-success"></i> Hari/tgl : <?php echo format_tanggal(date($row->tanggal));?> / <?= $row->jam;?>
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

<div class="card col-sm-12">
    <div class="card-header">
        <h5>Pengumuman hasil seminar proposal</h5>
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
                                <label class="label label-mini label-danger">Judul dan proposal anda <b>diterima</b></label>
                            <?php elseif($row->status == 2):?>
                                <label class="label label-mini label-danger">Judul dan proposal anda diterima dengan revisi</label>
                            <?php else:?>
                                <label class="label label-mini label-danger">Judul dan proposal anda ditolak</label>
                            <?php endif;?>
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
</div>