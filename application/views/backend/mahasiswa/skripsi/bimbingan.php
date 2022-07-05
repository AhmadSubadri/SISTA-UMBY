<!-- <div class="col-xl-12"> -->
<div class="card">
    <div class="card-block">
        <?php if( !empty($Data) ) :?>
        <div class="row">
            <div class="col-sm-12 col-xl-3">
                <h4 class="sub-title text-center">Bimbingan Skripsi</h4>
                <div class="pcoded-inner-navbar main-menu">
                    <?php foreach($Data as $data):?>
                    <div class="main-menu-header">
                        <?php if($data->image == null):?>
                        <img class="img-80 img-radius" src="<?php echo base_url()?>_uploads/profile/profile.png"
                            width="60px" height="60px" alt="User-Profile-Image">
                        <?php else:?>
                        <img class="img-80 img-radius" width="60px" height="60px"
                            src="<?= base_url('_uploads/profile/staff/').$data->image;?>" alt="User-Profile-Image">
                        <?php endif;?>
                        <div class="user-details">
                            <span><?= $data->fullname;?></span>
                            <span><?= $data->email;?></span>
                            <span><?= $data->username;?></span>
                            <span><?= $data->phone;?></span>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
            <div class="col-sm-12 col-xl-9">
                <div class="card">
                    <div class="card-header">
                        <?php foreach($Data as $dsn):?>
                        <div class="media">
                            <?php if($dsn->image == null):?>
                            <img class="img-radius img-40 align-top m-r-15"
                                src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
                            <?php else:?>
                            <img src="<?php echo base_url('_uploads/profile/staff/').$dsn->image;?>" alt="user image"
                                class="img-radius img-40 align-top m-r-15">
                            <?php endif;?>
                            <div class="media-body">
                                <h5 class="notification-user"><?= $dsn->fullname;?></h5>
                                <p><?= $dsn->username;?></p>
                            </div>
                        </div>
                        <div class="card-header-right">
                            <?php if($dsn->status_exam != 0):?>
                            <button class="btn btn-mini waves-effect waves-light btn-success disabled btn-disabled"
                                data-toggle="tooltip" data-placement="top"
                                title="Students have the right to register exam"><i
                                    class="ti-check-box"></i>Approved</button>
                            <?php else:?>
                            <button class="btn btn-mini waves-effect waves-light disabled btn-disabled"
                                data-toggle="tooltip" data-placement="top" title="Click to finished the guidance"><i
                                    class="ti-check-box text-primary"></i>On going</button>
                            <?php endif;?>
                        </div>
                        <?php endforeach;?>
                    </div>
                    <div class="card-block" style="display:block; height:307px; overflow:auto;" id="hijll">
                        <?php foreach($DataChat as $isi):?>
                        <?php if($isi->sender == $this->session->userdata('username')):?>
                        <div class="row justify-content-end">
                            <div class="col-6">
                                <p class="text-italic text-right"><?= $isi->created_at;?></p>
                                <div
                                    style="height:auto; width: auto; background: #AED6F1; border-radius: 10px 0px 10px;">
                                    <p style="padding: 12px;">
                                        <?= $isi->message;?>
                                        <?php if($isi->file != 0):?>
                                        <br><a href="" class="text-primary">Download file</a>
                                        <?php else:?>
                                        <?php endif;?>
                                    </p>
                                </div><br>
                            </div>
                        </div>
                        <?php else:?>
                        <div class="row justify-content-start">
                            <div class="col-6">
                                <div class="media">
                                    <?php if($isi->image == null):?>
                                    <img class="img-radius img-40 align-top m-r-15"
                                        src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
                                    <?php else:?>
                                    <img src="<?php echo base_url('_uploads/profile/student/').$isi->image;?>"
                                        alt="user image" class="img-radius img-40 align-top m-r-15">
                                    <?php endif;?>
                                    <div class="media-body">
                                        <p class="text-italic"><?= $isi->created_at;?></p>
                                        <div
                                            style="height:auto; width:auto; background:#AED6F1 ; border-radius: 0px 10px 0px;">
                                            <p style="padding: 12px;">
                                                <?= $isi->message;?>
                                                <?php if($isi->file != 0):?>
                                                <br><a href="" class="text-primary">Download file</a>
                                                <?php else:?>
                                                <?php endif;?>
                                            </p>
                                        </div><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif;?>
                        <?php endforeach;?>
                    </div>
                    <div class="card-footer">
                        <?= form_open_multipart('mhs/dashboard/save-bimbingan'); ?>
                        <div class="form-inline">
                            <?php foreach($Data as $dsn):?>
                            <input name="name" class="form-bg-null" value="<?= $dsn->name;?>" hidden />
                            <input name="receiver" class="form-bg-null" value="<?= $dsn->username;?>" hidden />
                            <input name="sender" class="form-bg-null"
                                value="<?= $this->session->userdata('username');?>" hidden />
                            <?php endforeach;?>
                            <?php foreach($Data as $mhs):?>
                            <div class="form-group">
                                <input type="file" name="file" class="form-bg-null" placeholder="name file..." hidden />
                                <div class="fileUpload btn btn-sm btn-grd-inverse">
                                    <span><i class="ti-clip"></i> File</span>
                                    <input id="uploadBtn" type="file" name="file" class="upload" />
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="uploadFile" name="message"
                                    class="form-control form-bg-default" required style="width: 560px"></textarea>
                            </div>
                            <button type="submit" class="btn btn-sm btn-grd-primary"><i
                                    class="ti-location-arrow"></i>Send</button>
                        </div>
                        <?php endforeach;?>
                        <?= form_close();?>
                    </div>
                </div>
            </div>
        </div>
        <?php else:?>
        abad
        <?php endif;?>
    </div>
</div>
<!-- </div> -->

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
<script type="text/javascript">
$("#hijll").scrollTop($("#hijll")[0].scrollHeight);
</script>