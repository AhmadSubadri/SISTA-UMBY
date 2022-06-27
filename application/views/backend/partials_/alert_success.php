<?php if($error = $this->session->flashdata('msg')){ ?>
    <div class="card-block col-sm-12">
        <div class="alert alert-success" id="msg" data-type="success" data-from="top" data-align="text-center">
           <a href="#" class="close" data-dismiss="alert">&times;</a>
           <strong>Success !</strong> <?php echo  $error; ?>
       </div>
   </div>
<?php } ?>
