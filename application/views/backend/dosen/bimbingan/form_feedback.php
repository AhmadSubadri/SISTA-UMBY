<div class="card">
    <div class="card-header" id="klompok">
        <?php foreach($Mahasiswa as $mhs):?>
        <div class="media">
            <?php if($mhs->image == null):?>
            <img class="img-radius img-40 align-top m-r-15" src="<?php echo base_url()?>_uploads/profile/profile.png"
                alt="user image">
            <?php else:?>
            <img src="<?php echo base_url('_uploads/profile/student/').$mhs->image;?>" alt="user image"
                class="img-radius img-40 align-top m-r-15">
            <?php endif;?>
            <div class="media-body">
                <h5 class="notification-user"><?= $mhs->fullname;?></h5>
                <p><?= $mhs->username;?></p>
            </div>
        </div>
        <div class="card-header-right">
            <?php if($mhs->status_bimbingan != 0):?>
            <button class="btn btn-mini waves-effect waves-light btn-success disabled btn-disabled"
                data-toggle="tooltip" data-placement="top" title="Students have the right to register exam"><i
                    class="ti-check-box"></i>Approved</button>
            <?php else:?>
            <button class="btn btn-mini waves-effect waves-light" onclick="ConfirmDialog(<?= $mhs->username;?>)"
                data-toggle="tooltip" data-placement="top" title="Click to finished the guidance"><i
                    class="ti-check-box text-primary"></i>Finish</button>
            <?php endif;?>
        </div>
        <?php endforeach;?>
    </div>
    <div class="card-block" style="display:block; height:307px; overflow: auto;" id="jklm">
        <?php foreach($Data as $isi):?>
        <?php if($isi->sender == $this->session->userdata('username')):?>
        <div class="row justify-content-end">
            <div class="col-6">
                <p class="text-italic text-right"><?= $isi->created_at;?></p>
                <div style="height:auto; width: auto; background: #AED6F1; border-radius: 10px 0px 10px;">
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
                    <img src="<?php echo base_url('_uploads/profile/student/').$isi->image;?>" alt="user image"
                        class="img-radius img-40 align-top m-r-15">
                    <?php endif;?>
                    <div class="media-body">
                        <p class="text-italic"><?= $isi->created_at;?></p>
                        <div style="height:auto; width:auto; background:#AED6F1 ; border-radius: 0px 10px 0px;">
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
        <?= form_open_multipart('dsn/dashboard/save-feedback-bimbingan'); ?>
        <!-- <form class="form-inline"> -->

        <?php foreach($Mahasiswa as $mhs):?>
        <?php if($mhs->status_bimbingan != 0):?>
        <div class="form-inline" style="pointer-events: none; opacity: 0.4;">
            <input name="name" class="form-bg-null" value="<?= $mhs->fullname;?>" hidden />
            <input name="receiver" class="form-bg-null" value="<?= $mhs->username;?>" hidden />
            <input name="sender" class="form-bg-null" value="<?= $this->session->userdata('username');?>" hidden />
            <div class="form-group">
                <input type="file" name="file" class="form-bg-null" placeholder="name file..." hidden />
                <div class="fileUpload btn btn-sm btn-grd-inverse">
                    <span><i class="ti-clip"></i> File</span>
                    <input id="uploadBtn" type="file" name="file" class="upload" />
                </div>
            </div>
            <div class="form-group">
                <textarea class="form-control" id="uploadFile" name="message" class="form-control form-bg-default"
                    required style="width: 530px"></textarea>
            </div>
            <button type="submit" class="btn btn-sm btn-grd-primary"><i class="ti-location-arrow"></i>Send</button>
        </div>
        <?php else:?>
        <div class="form-inline">
            <div class="form-group">
                <input type="file" name="file" class="form-bg-null" placeholder="name file..." hidden />
                <div class="fileUpload btn btn-sm btn-grd-inverse">
                    <span><i class="ti-clip"></i> File</span>
                    <input id="uploadBtn" type="file" name="file" class="upload" />
                </div>
            </div>
            <div class="form-group">
                <textarea class="form-control" id="uploadFile" name="message" class="form-control form-bg-default"
                    required style="width: 530px"></textarea>
            </div>
            <button type="submit" class="btn btn-sm btn-grd-primary"><i class="ti-location-arrow"></i>Send</button>
        </div>
        <?php endif;?>
        <?php endforeach;?>
        <!-- </form> -->
        <?= form_close();?>
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
<script type="text/javascript">
$("#jklm").scrollTop($("#jklm")[0].scrollHeight);
</script>
<script>
function ConfirmDialog(id) {
    swal("Click ok untuk menyelesaikan bimbingan!")
        .then(
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: "POST",
                        url: '<?= site_url('dsn/dashboard/insertApprovelguidance')?>',
                        data: {
                            id: id
                        },
                        error: function() {
                            alert('Something is wrong');
                        },
                        success: function(data) {
                            swal(`NIM ${id} berhak daftar pendadaran dari sekarang`);
                            $(document.location.reload(true));
                        }
                    });
                } else {
                    swal(`Yakin Cancel progres ?`);
                }
            }
        );
}
</script>