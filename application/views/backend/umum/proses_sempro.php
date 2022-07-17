<div class="col-xl-12">
    <a href="<?= site_url('dsn/dashboard/pelaksanaan-sempro');?>" class="btn btn-mini"><i
            class="ti-back-left"></i>Kembali</a>
    <div class="card">
        <div class="card-header">
            <h5 class="card-header-text">Hasil test plagiarisme</h5>
        </div>
        <div class="card-block accordion-block  color-accordion-block">
            <div id="accordion" role="tablist" aria-multiselectable="true">
                <div class="accordion-panel">
                    <div class="accordion-heading" role="tab" id="headingOne">
                        <h3 class="card-title accordion-title">
                            <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse"
                                data-parent="#accordion" href="#collapseOne" aria-expanded="true"
                                aria-controls="collapseOne">
                                Diagram BAR hasil cek plagiat</a>
                        </h3>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                        aria-labelledby="headingOne">
                        <div class="accordion-content accordion-desc">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="accordion-panel">
                    <div class="accordion-heading" role="tab" id="headingTwo">
                        <h3 class="card-title accordion-title">
                            <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse"
                                data-parent="#accordion" href="#collapseTwo" aria-expanded="false"
                                aria-controls="collapseTwo">
                                5 Judul persentase tertinggi</a>
                        </h3>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="accordion-content accordion-desc"><br>
                            <div class="row">
                                <?php $i = 1; foreach($resultTest as $row):?>
                                <div class="col-md-6">
                                    <h6><?= $row->title;?></h6>
                                </div>
                                <div class="col-md-4"><?= $row->name;?></div>
                                <div class="col-md-2">
                                    <p class="text-danger"><?= number_format($row->result,2);?>%</p>
                                </div>
                                <hr />
                                <br><br><br>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-header-text">Detail data mahasiswa</h5>
        </div>
        <div class="card-block">
            <div class="row">
                <div class="col-sm-12 col-xl-6">
                    <h4 class="sub-title">Data Mahasiswa</h4>
                    <ul>
                        <?php foreach($data as $row):?>
                        <li>
                            <div class="media">
                                <?php if($row->image == null):?>
                                <img class="img-radius img-40 align-top m-r-15"
                                    src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
                                <?php else:?>
                                <img src="<?php echo base_url('_uploads/profile/student/').$row->image;?>"
                                    alt="user image" class="img-radius img-40 align-top m-r-15">
                                <?php endif;?>
                                <div class="media-body">
                                    <h5 class="notification-user"><?= $row->nameStudent;?> / <?= $row->nim;?></h5><br>
                                    <h6>"<?= $row->title;?>"</h6>
                                </div>
                            </div><br>
                            <h4 class="sub-title text-center">File proposal diajukan</h4>
                            <ul class="text-center">
                                <?php if($row->file == 0):?>
                                <h6>Data not available</h6>
                                <?php else:?>
                                <object data="<?=base_url('_uploads/submission/'.$row->nameStudent.'/'.$row->file);?>"
                                    width="100%" height="500"></object>
                                <?php endif;?>
                            </ul>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
                <div class="col-sm-12 col-xl-6">
                    <h4 class="sub-title">Feedback hasil seminar proposal</h4>
                    <ul>
                        <li>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="<?php echo base_url('dsn/dashboard/save-feedback');?>"
                                            class="form-material" method="post">
                                            <?php foreach($DetailId as $row):?>
                                            <input type="hidden" name="nim" value="<?= $row->nim;?>">
                                            <input type="hidden" name="iddetail" value="<?= $row->id_detail;?>">
                                            <!-- <input type="text" name="iddetail" value="<?= $row->id_detail;?>"> -->
                                            <?php endforeach;?>
                                            <div class="form-group form-default form-static-label">
                                                <select name="feedback" class="form-control">
                                                    <option value="1">Diterima</option>
                                                    <option value="2">Diterima dengan revisi</option>
                                                    <option value="3">Ditolak</option>
                                                </select>
                                                <span class="form-bar"></span>
                                                <label class="float-label">Feedback</label>
                                            </div>
                                            <textarea name="note" id="ckeditor" required></textarea>
                                            <br>
                                            <button type="submit"
                                                class="btn btn-mini btn-grd-primary btn-round btn-block"><i
                                                    class="ti-save"></i> Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
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
        height: '300px'
    });
});
</script>