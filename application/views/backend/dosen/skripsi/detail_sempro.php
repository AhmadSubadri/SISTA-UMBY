<?php $this->load->view('backend/partials_/alert_success.php');?>
<div class="col-xl-12">
    <a href="<?= site_url('dsn/dashboard/data-sempro-skripsi');?>" class="btn btn-mini"><i
        class="ti-back-left"></i>Kembali</a>
        <div class="card">
            <div class="card-header">
                <h5>Detail feedback dosen penguji seminar proposal</h5>
            </div>
            <div class="card-block">
                <div class="accordion-block  color-accordion-block">
                    <div id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="accordion-panel">
                            <div class="accordion-heading" role="tab" id="headingOne">
                                <h3 class="card-title accordion-title" style="background-color: #FFB6C1;">
                                    <?php foreach($DataTitle as $a):?>
                                    <?php if ($a->status_sempro == 2):?>
                                        <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse" data-parent="" href="" aria-expanded="true" aria-controls="collapseOne"> Form Sudah kirim pengumuman hasil seminar proposal</a>
                                    <?php else:?>
                                        <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Form pengumuman untuk mahasiswa hasil seminar proposal</a>
                                    <?php endif;?>
                                    <?php endforeach;?>
                                </h3>
                            </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                        aria-labelledby="headingOne">
                        <div class="accordion-content accordion-desc">
                            <form action="<?= site_url('dsn/dashboard/save-pengumuman-sempro');?>" class="form-material" method="post">
                                <div class="modal-body">
                                    <?php foreach($DataTitle as $row):?>
                                        <input type="hidden" name="title" id="title" value="<?= $row->title;?>">
                                        <input type="hidden" name="name" id="name" value="<?= $row->name;?>">
                                        <input type="hidden" name="id_major" id="id_major" value="<?= $row->id_major;?>">
                                        <input type="hidden" name="year" id="year" value="<?= date('Y');?>">
                                    <?php endforeach;?>
                                    <?php foreach($Data as $data):?>
                                        <input type="text" name="nim" id="nim" value="<?= $data->nim;?>" hidden>
                                    <?php endforeach;?>
                                    <!-- <label for="">Feedback</label> -->
                                    <div class="form-group form-default form-static-label">
                                        <select name="status" class="form-control">
                                            <option value="1">Diterima</option>
                                            <option value="2">Diterima dengan revisi</option>
                                            <option value="3">Ditolak</option>
                                        </select>
                                        <span class="form-bar"></span>
                                        <label class="float-label">Feedback</label>
                                    </div>
                                    <div class="form-group form-default form-static-label">
                                        <textarea name="note" id="ckeditor" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-sm btn-grd-primary btn-block"><i class="ti-save"></i>
                                    Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
        </div><br>
<div class="row">
    <div class="col-md-4 sub-title text-primary">
        <h6># Dosen</h6>
    </div>
    <div class="col-md-2 sub-title text-primary">
        <h6>Feedback</h6>
    </div>
    <div class="col-md-6 sub-title text-primary">
        <h6>Catatan</h6>
    </div><br><br>
    <?php if(count($Data) == null):?>
        <div class="col text-center"><br>
            <h6>Data not available</h6>
        </div>
    <?php else:?>
        <?php $i=1; foreach($Data as $row):?>
        <div class="col-md-4 sub-title">
            <h6><?= $i++;?>.&nbsp;&nbsp;<?= $row->name;?><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $row->nidn;?>
        </h6>
    </div>
    <div class="col-md-2 sub-title">
        <?php if($row->feedback == null):?>
            <label class="label label-mini label-warning">Feedback null</label>
        <?php elseif($row->feedback == 1):?>
            <h6><label class="label label-mini label-success">Diterima</label></h6>
        <?php elseif($row->feedback == 2):?>
            <label class="label label-mini label-success">Diterima dengan revisi</label>
        <?php else:?>
            <label class="label label-mini label-danger">Ditolak</label>
        <?php endif;?>
    </div>
    <div class="col-md-6 sub-title">
        <?php if($row->note == null):?>
            <label class="label label-mini label-warning">Note null</label>
        <?php else:?>
            <?= $row->note;?>
        <?php endif;?>
    </div>
<?php endforeach;?>
<?php endif;?>
</div>
</div>
</div>
</div>


<!-- Modal pengumuman -->
<div tabindex="-1" class="modal bs-example-modal-lg" id="modalpengumuman" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Pengumuman hasil akhir seminar proposal <i class="fa fa-lock"></i></h4>
            </div>
            <form action="<?= site_url('dsn/dashboard/save-pengumuman-sempro');?>" class="form-material" method="post">
                <div class="modal-body">
                    <?php foreach($DataTitle as $row):?>
                        <input type="hidden" name="title" id="title" value="<?= $row->title;?>">
                        <input type="hidden" name="name" id="name" value="<?= $row->name;?>">
                        <input type="hidden" name="id_major" id="id_major" value="<?= $row->id_major;?>">
                        <input type="hidden" name="rabin" id="rabin" value="<?= $row->rabin;?>">
                        <input type="hidden" name="year" id="year" value="<?= date('Y');?>">
                    <?php endforeach;?>
                    <?php foreach($Data as $data):?>
                        <input type="text" name="nim" id="nim" value="<?= $data->nim;?>" hidden>
                    <?php endforeach;?>
                    <!-- <label for="">Feedback</label> -->
                    <div class="form-group form-default form-static-label">
                        <select name="status" class="form-control">
                            <option value="1">Diterima</option>
                            <option value="2">Diterima dengan revisi</option>
                            <option value="3">Ditolak</option>
                        </select>
                        <span class="form-bar"></span>
                        <label class="float-label">Feedback</label>
                    </div>
                    <div class="form-group form-default form-static-label">
                        <textarea name="note" id="ckeditor" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-grd-primary btn-block"><i class="ti-save"></i>
                    Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<?php
    //Inisialisasi nilai variabel awal
$nama= "";
$jumlah=null;
foreach ($chart_data as $item)
{
    $name = $item->name;
    $nama .= "'$name'". ", ";
    $result=$item->result;
    $jumlah .= "$result". ", ";
}
?>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',
    // The data for our dataset
    data: {
        labels: [<?php echo $nama;?>],
        datasets: [{
            label: 'Hasil ',
            backgroundColor: ['rgb(255, 99, 132)', 'rgb(253, 215, 3)', 'rgb(127, 255, 1)',
            'rgb(43, 191, 254)', 'rgb(148, 0, 211)'
            ],
            borderColor: ['rgb(255, 99, 132)'],
            data: [<?php echo $jumlah;?>]
        }]
    },
    // Configuration options go here
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
<script src="<?php echo base_url('assets/js/jquery-3.3.1.js');?>"></script>
<script src="<?php echo base_url('assets/bootstrap/bootstrap.bundle.js');?>"></script>
<script src="<?php echo base_url('assets/ckeditor/ckeditor.js');?>"></script>
<script type="text/javascript">
    $(function() {
        CKEDITOR.replace('ckeditor', {
            filebrowserImageBrowseUrl: '<?php echo base_url('assets/kcfinder/browse.php');?>',
            height: '200px'
        });
    });
</script>