<div class="col-xl-12">
    <div class="card">
        <div class="card-block table-border-style" style="display:block; height:600px; overflow:auto;">
            <h4 class="sub-title text-center">Daftar mahasiswa bimbingan</h4>
            <?php if( !empty($Data) ) :?>
                <div class="row">
                    <div class="col-sm-12 col-xl-3">
                        <?php foreach($Data->result() as $row):?>
                            <div class="media sub-title" id="tabchat" onclick="idFunction(<?= $row->nim;?>)">
                                <?php if($row->image == null):?>
                                    <img class="img-radius img-40 align-top m-r-15"
                                    src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
                                <?php else:?>
                                    <img src="<?php echo base_url('_uploads/profile/student/').$row->image;?>"
                                    alt="user image" class="img-radius img-40 align-top m-r-15">
                                <?php endif;?>
                                <div class="media-body">
                                    <h6 class=""><?= $row->nameStudent;?></h6>
                                    <p><?= $row->nim;?></p>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                    <div class="col-sm-12 col-xl-9" id="formfedbackchat">
                        <div class="text-center">
                             <img class="img-200" src="<?php echo base_url()?>assets/images/chat.png" height="200px" alt="User-Profile-Image">
                        </div>
                    </div>
                </div>
            <?php else:?>
                <div class="text-center">
                     <img class="img-200" src="<?php echo base_url()?>assets/images/chat.png" height="200px" alt="User-Profile-Image"><br>
                     <h6>"Hallo <?= $this->session->userdata('name');?><br>belum ada mahasiswa bimbingan untuk anda, persiapkan diri anda untuk membimbing."</h6>
                </div>
             <?php endif;?>
         </div>
     </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
function idFunction(id) {
    $.ajax({
        type: "POST",
        url: '<?= site_url('dsn/dashboard/Form-Bimbingan')?>',
        data: {
            id: id
        },
        success: function(response) {
            $('#formfedbackchat').html(response);
        },
        error: function() {
            alert('error');
        }
    });
}
</script>