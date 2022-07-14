<?php if($success = $this->session->flashdata('msg') && $this->session->flashdata('msg_class') == 'alert-success'){ ?>
    <div class="card-block col-sm-12">
        <div class="alert alert-success" id="msg" data-type="success" data-from="top" data-align="text-center">
           <a href="#" class="close" data-dismiss="alert">&times;</a>
           <strong>Success !</strong> <?php echo  $success; ?>
       </div>
   </div>
<?php } elseif($error = $this->session->flashdata('msg') && $this->session->flashdata('msg_class') == 'alert-danger') {?>
    <div class="card-block col-sm-12">
        <div class="alert alert-danger" id="msg" data-type="danger" data-from="top" data-align="text-center">
           <a href="#" class="close" data-dismiss="alert">&times;</a>
           <strong>Fail !</strong> <?php echo  $error; ?>
       </div>
   </div>
<?php }?>
