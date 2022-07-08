<div class="col-xl-12">
    <div id="popsuccess"></div>
    <div class="card">
        <div class="card-header">
            <div class="card-header-right">
                <a href="" class="btn btn-mini btn-outline-primary" id="Modal-Tourist" data-toggle="modal" data-target="#modalrequirement">+ Tambah persyaratan</a>
            </div>
        </div>
        <div class="card-block">
            <h4 class="sub-title text-center">PERSYARATAN PENDADARAN</h4>
            <div class="row">
                <div class="col-sm-12 col-xl-7 sub-title">
                    <h6># Syarat pendadaran</h6>
                </div>
                <div class="col-sm-12 col-xl-2 sub-title text-center">
                    <h6>Qty</h6>
                </div>
                <div class="col-sm-12 col-xl-3 sub-title">
                    <h6>Aksi</h6>
                </div>
                <?php if(!empty($Data->result())):?>
                <?php $i=1; foreach($Data->result() as $row):?>
                <div class="col-sm-12 col-xl-7 sub-title">
                    <h6><?= $i++;?>. <?= $row->requirements;?></h6>
                </div>
                <div class="col-sm-12 col-xl-2 sub-title text-center">
                    <h6><?= $row->qty;?></h6>
                </div>
                <div class="col-sm-12 col-xl-3 sub-title">
                    <a href="" class="btn btn-mini btn-outline-warning" id="Modal-Tourist" data-toggle="modal"
                        data-target="#modal_edit<?= $row->id;?>">Edit</a>
                    <a href="<?= site_url('dsn/dashboard/delete-syarat/'.$row->id);?>"
                        class="btn btn-mini btn-outline-danger">Delete</a>
                    <?php if ($row->status != 0) :?>
                    <a href="<?= site_url('unpublish-requirementexam/'.$row->id);?>"
                        class="btn btn-mini btn-outline-success">
                        <i class="ti-close"> Unpublish</i>
                    </a>
                    <?php else:?>
                    <a href="<?= site_url('publish-requirementexam/'.$row->id);?>"
                        class="btn btn-mini btn-outline-primary"><i class="ti-world"> Publish</i></a>
                    <?php endif;?>
                </div>
                <?php endforeach;?>
                <?php else:?>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>

<!-- Modal insert Requirements -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    id="modalrequirement" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create requirement's</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url("dsn/dashboard/insert-syarat")?>" method="post" id="savedata">
                <div class="modal-body">
                    <a class="waves-effect waves-light text-primary" id="newlist"><i class="ti-plus"></i> Create
                        table</a>
                    <table class="table table-bordered" id="tableLoop">
                        <input type="text" name="major" value="<?= $this->session->userdata("major")?>" hidden>
                        <input type="text" name="type" value="1" hidden>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary">Save requirement</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php foreach($Data->result_array() as $i):
        $id = $i['id'];
        $requirement = $i['requirements'];
        $qty=$i['qty'];
?>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    id="modal_edit<?= $id;?>" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit requirement's</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('dsn/dashboard/update-syarat');?>" method="post">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-10">
                            <input type="text" name="id" id="id" value="<?php echo $id;?>" hidden>
                            <input type="text" name="requirement" id="requirement" value="<?php echo $requirement;?>"
                                class="form-control" placeholder="Requirement">
                        </div>
                        <div class="col">
                            <input type="text" name="qty" id="qty" value="<?php echo $qty;?>" class="form-control"
                                placeholder="Jumlah Lembar...">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="ubah" class="btn btn-sm btn-primary">Update requirement</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo base_url()?>assets/js/modal-syarat.js"></script>