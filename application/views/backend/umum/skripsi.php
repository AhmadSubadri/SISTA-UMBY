<?php $this->load->view('backend/partials_/alert_success.php');?>
<div class="col-xl-12">
    <div class="card">
        <div class="card-header" style="background-color: #75A8FE;">
            <h5 style="color: white;">DATA MAHASISWA SEMINAR PROPOSAL</h5>
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
                                        alt="user image" class="img-radius img-40 align-top m-r-15" width="40px" height="40px">
                                    <?php endif;?>
                                    <div class="media-body">
                                        <h5 class="notification-user"><?= $row->name;?></h5>
                                        <p class="notification-msg"><?= $row->nim;?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <?php if($row->tanggal == 0):?>
                                <label class="label label-mini label-danger">Belum terjadwal</label>
                                <?php else:?>
                                    <?php if(format_tanggal(date($row->tanggal)) == format_tanggal(date('Y-m-d'))):?>
                                        <h6 class="text-danger" id="warningschedule">Hari ini : <?php echo format_tanggal(date($row->tanggal));?> / <?= $row->jam;?></h6>
                                    <?php else:?>
                                        <h6>Hari/Tanggal : <?php echo format_tanggal(date($row->tanggal));?> / <?= $row->jam;?></h6>
                                    <?php endif;?>
                                <h6>Tempat : <?= $row->tempat;?></h6>
                                <h6>Kegiatan : <?= $row->kegiatan;?></h6>
                                <?php endif;?>
                            </td>
                            <td>
                                <?php if($row->feedback == null):?>
                                <label class="label label-mini label-danger">Belum sempro</label>
                                <?php else:?>
                                <label class="label label-mini label-success">Sudah sempro</label>
                                <?php endif;?>
                            </td>
                            <td>
                                <?php if($row->feedback == 0):?>
                                <a href="#" class="btn btn-mini btn-grd-inverse btn-disabled disabled"><i
                                        class="ti-na"></i>Lihat</a>
                                <a href="<?= site_url('dsn/dashboard/proses-sempro/'.$row->ididea);?>"
                                    class="btn btn-mini btn-outline-info btn-info"><i class="ti-settings"></i>Proses
                                    sempro</a>
                                <?php else:?>
                                <a href="#" data-toggle="modal" data-target="#modal_lihata<?= $row->id;?>" class="btn btn-mini btn-outline-success" class="btn btn-mini btn-outline-primary"><i class="ti-eye"></i>Lihat</a>
                                <a href="#" class="btn btn-mini btn-outline-primary btn-disabled disabled"><i
                                        class="ti-na"></i>Sudah sempro</a>
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
<?php foreach($Data as $i):
        $id = $i->id;
        $feedback = $i->feedback;
        $note = $i->note;
?>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    id="modal_lihata<?= $id;?>" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Feedback seminar proposal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                <div class="col-sm-12 col-xl-10 sub-title">
                    <h6><?= $note;?></h6>
                </div>
                <div class="col-sm-12 col-xl-2 sub-title">
                    <?php if ($feedback == '0'): ?>
                    <label class="label label-md label-warning">Waiting</label>
                    <?php elseif ($feedback == '1'):?>
                    <label class="label label-md label-success">Diterima</label>
                    <?php elseif ($feedback == '2'):?>
                    <label class="label label-md label-success">Diterima dengan revisi</label>
                    <?php else:?>
                    <label class="label label-md label-danger">Ditolak</label>
                    <?php endif;?>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>
<style type="text/css">
    #warningschedule {
  animation: blinker2 0.6s cubic-bezier(1, 0, 0, 1) infinite alternate;  
}
@keyframes blinker2 { to { opacity: 0; } }
</style>