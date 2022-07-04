<?php $this->load->view('backend/partials_/alert_success.php');?>
<div class="col-xl-12">
    <div class="card">
        <div class="card-block table-border-style" style="display:block; height:400px; overflow:auto;">
            <h4 class="sub-title text-center">Daftar mahasiswa bimbingan</h4>
            <?php if( !empty($Data->result()) ) :?>
                <div class="row">
                    <div class="col-md-2">
                        <?php foreach($data->result() as $row):?>
                            
                        <?php endforeach;?>
                    </div>
                    <div class="col-md-10">
                        abad
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