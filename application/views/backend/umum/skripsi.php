<?php $this->load->view('backend/partials_/alert_success.php');?>
<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h5>Data mahasiswa seminar proposal</h5>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table table-hover m-b-0 without-header">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Profil</th>
                            <th>Jadwal sempro</th>
                            <th>Status sempro</th>
                            <th width="10px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($Data) == null):?>
                            <tr>
                                <td colspan="4" class="col text-center">
                                    <h6>Data not available</h6>
                                </td>
                            </tr>
                        <?php else:?>
                            <?php $i=1; foreach($Data as $row):?>
                            <tr>
                                <th scope="row"><?= $i++;?></th>
                                <td>
                                    <div class="media">
                                        <?php if($row->image == null):?>
                                            <img class="img-radius img-40 align-top m-r-15"
                                            src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
                                        <?php else:?>
                                            <img src="<?php echo base_url('_uploads/profile/student/').$row->image;?>"
                                            alt="user image" class="img-radius img-40 align-top m-r-15">
                                        <?php endif;?>
                                        <div class="media-body">
                                            <h5 class="notification-user"><?= $row->name;?></h5>
                                            <p class="notification-msg"><?= $row->nim;?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <?php if($row->tanggal == null):?>
                                        <label class="label label-mini label-danger">Belum terjadwal</label>
                                    <?php else:?>
                                        <h6>Hari/Tanggal : <?php echo format_tanggal(date($row->tanggal));?> / <?= $row->jam;?></h6>
                                        <h6>Tempat : <?= $row->tempat;?></h6>
                                        <h6>Kegiatan : <?= $row->kegiatan;?></h6>
                                    <?php endif;?>
                                </td>
                                <td>
                                    <?php if($row->feedback == 0):?>
                                        <label class="label label-mini label-danger">Belum sempro</label>
                                    <?php else:?>
                                        <label class="label label-mini label-success">Sudah sempro</label>
                                    <?php endif;?>
                                </td>
                                <td>
                                    <?php if($row->feedback == 0):?>
                                        <a href="#" class="btn btn-mini btn-grd-inverse btn-disabled disabled"><i class="ti-na"></i>Lihat</a>
                                        <a href="<?= site_url('dsn/dashboard/proses-sempro/'.$row->ididea);?>" class="btn btn-mini btn-grd-info btn-info"><i class="ti-pencil"></i>Proses sempro</a>
                                    <?php else:?>
                                        <a href="#" class="btn btn-mini btn-grd-success"><i class="ti-eye"></i>Lihat</a>
                                        <a href="#" class="btn btn-mini btn-grd-info btn-disabled disabled"><i class="ti-na"></i>Sudah sempro</a>
                                    <?php endif;?>
                                </td>
                            </tr>
                        <?php endforeach;?>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>