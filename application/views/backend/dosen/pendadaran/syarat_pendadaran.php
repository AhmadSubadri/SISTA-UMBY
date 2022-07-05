<div class="col-xl-12">
    <div id="popsuccess"></div>
    <div class="card">
        <div class="card-header">
            <div class="card-header-right">
                <a href="" class="btn btn-mini btn-outline-primary" id="Modal-Tourist" data-toggle="modal"
                    data-target="#modalrequirement">+ Tambah persyaratan</a>
            </div>
        </div>
        <div class="card-block">
            <h4 class="sub-title text-center">PERSYARATAN PENDADARAN</h4>
            <div class="row">
                <div class="col-sm-12 col-xl-8 sub-title">
                    <h6># Syarat pendadaran</h6>
                </div>
                <div class="col-sm-12 col-xl-2 sub-title">
                    <h6>Qty</h6>
                </div>
                <div class="col-sm-12 col-xl-2 sub-title">
                    <h6>Aksi</h6>
                </div>
                <?php if(!empty($Data)):?>
                <?php $i=1; foreach($Data as $row):?>
                <div class="col-sm-12 col-xl-8 sub-title">
                    <h6><?= $i++;?>. <?= $row->requirements;?></h6>
                </div>
                <div class="col-sm-12 col-xl-2 sub-title">
                    <h6><?= $row->qty;?></h6>
                </div>
                <div class="col-sm-12 col-xl-2 sub-title">
                    <a href="" class="btn btn-mini btn-outline-warning">Edit</a>
                    <a href="<?= site_url('dsn/dashboard/delete-syarat/'.$row->id);?>"
                        class="btn btn-mini btn-outline-danger">Delete</a>
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
            <form action="<?= site_url('dsn/dashboard/insert-syarat')?>" method="post" id="savedata">
                <div class="modal-body">
                    <a class="waves-effect waves-light text-primary" id="newlist"><i class="ti-plus"></i> Create
                        table</a>
                    <table class="table table-bordered" id="tableLoop">
                        <input type="text" name="major" value="<?= $this->session->userdata('major')?>" hidden>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo base_url()?>assets/js/modal-syarat.js"></script>