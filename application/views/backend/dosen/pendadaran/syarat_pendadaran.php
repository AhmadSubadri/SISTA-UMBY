<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <div class="card-header-right">
                <a href="" class="btn btn-mini btn-outline-primary">+ Tambah persyaratan</a>
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
                    <a href="" class="btn btn-mini btn-outline-danger">Delete</a>
                </div>
                <?php endforeach;?>
                <?php else:?>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>