<div class="col-md-8">
    <!-- Label size card start -->
    <div class="card">
        <div class="card-header">
            <div class="card-header-left">
                <h5>Data pengajuan judul & proposal skripsi terbaru</h5>
            </div>
            <div class="card-header-right"> <i class="icofont icofont-spinner-alt-5"></i> </div>
        </div>
        <div class="card-block" style="display:block; height: 370px; overflow:auto;">
            <div class="row">
                <?php if(count($Data) == null):?>
                    <div class="col text-center"><br>
                        <h6>Data not available</h6>
                    </div>
                <?php else:?>
                    <?php $i=1; foreach($Data as $row):?>
                    <div class="col-md-2 text-center">
                        <div class="d-inline-block label-icon text-center">
                            <?php if($row->to_check == 0):?>
                                <input type="checkbox" class="form-check-input" name="nim[]" value="<?= $row->nim; ?>" disabled>
                            <?php else:?>
                                <input type="checkbox" class="form-check-input" name="nim[]" value="<?= $row->nim; ?>" checked disabled>
                            <?php endif;?>
                            <?php if($row->image == null):?>
                                <img class="img-radius img-40 align-top m-r-15"
                                src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
                            <?php else:?>
                                <img src="<?php echo base_url('_uploads/profile/student/').$row->image;?>"
                                alt="user image" class="img-radius img-40 align-top m-r-15">
                            <?php endif;?>
                            <label class="badge badge-primary badge-bottom-right"><?= $i++;?></label>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <h6><?= $row->title;?></h6>
                        <p class="font-italic">
                            <label class="label label-primary label-mini"><?= $row->name;?> <i class="ti-calendar"> <?= $row->date;?></i></label>
                            <a href="<?=base_url('_uploads/submission/'.$row->name.'/'.$row->file);?>" target="_blank" class="btn btn-mini btn-outline-info"><i class="ti-eye"></i>Lihat file</a>
                        </p>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>
</div>
<!-- Label size card end -->
</div>
<div class="col-md-4">
    <!-- Badge size card start -->
    <div class="card">
        <div class="card-header">
            <div class="card-header-left">
                <h5>Progres upload judul & proposal skripsi</h5>
            </div>
            <div class="card-header-right"> <i class="icofont icofont-spinner-alt-5"></i> </div>
        </div>
        <div class="card-block">
            <div class="col">
                <div class="card">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="text-c-green"><?= count($Data);?></h4>
                                <h6 class="text-muted m-b-0">Sudah upload</h6>
                            </div>
                            <div class="col-4 text-right">
                                <i class="fa fa-bar-chart f-28"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-c-green">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <?php foreach($Major as $mjr):?>
                                <p class="text-white m-b-0"><?= $mjr->name;?></p>
                            <?php endforeach;?>
                            </div>
                            <div class="col-3 text-right">
                                <i class="fa fa-line-chart text-white f-16"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="text-c-red"><?= count($AllDataMahasiswa)-count($Data) ;?></h4>
                                <h6 class="text-muted m-b-0">Belum upload</h6>
                            </div>
                            <div class="col-4 text-right">
                                <i class="fa fa-bar-chart f-28"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-c-red">
                        <div class="row align-items-center">
                            <div class="col-9">
                            <?php foreach($Major as $mjr):?>
                                <p class="text-white m-b-0"><?= $mjr->name;?></p>
                            <?php endforeach;?>
                            </div>
                            <div class="col-3 text-right">
                                <i class="fa fa-line-chart text-white f-16"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Badge size card end -->
</div>