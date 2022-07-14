 <?php
 if($msg = $this->session->flashdata('msg')){
    $msg_class = $this->session->flashdata('msg_class');
    ?>
    <div class="card-block col-sm-12">
        <div class="alert <?php echo $msg_class; ?>" id="msg" data-from="top" data-align="text-center">
         <a href="#" class="close" data-dismiss="alert">&times;</a>
          <strong><?php echo $msg; ?></strong>
      </div>
  </div>
</div>
<?php } ?>