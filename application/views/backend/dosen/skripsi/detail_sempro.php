<div class="col-xl-12">
    <a href="<?= site_url('dsn/dashboard/data-sempro-skripsi');?>" class="btn btn-mini"><i class="ti-back-left"></i>Kembali</a>
    <div class="card">
        <div class="card-header">
            <h5>Detail feedback dosen penguji seminar proposal</h5>
        </div>
        <div class="card-block">
            <div class="accordion-block  color-accordion-block">
                <div id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="accordion-panel">
                        <div class="accordion-heading" role="tab" id="headingOne">
                            <h3 class="card-title accordion-title">
                                <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse"
                                data-parent="#accordion" href="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                Diagram BAR hasil cek plagiat</a>
                            </h3>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="accordion-content accordion-desc">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-panel">
                        <div class="accordion-heading" role="tab" id="headingTwo">
                            <h3 class="card-title accordion-title">
                                <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse"
                                data-parent="#accordion" href="#collapseTwo"
                                aria-expanded="false"
                                aria-controls="collapseTwo">
                                5 Judul persentase tertinggi</a>
                            </h3>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="accordion-content accordion-desc"><br>
                                <div class="row">
                                    <?php $i = 1; foreach($resultTest as $row):?>
                                        <div class="col-md-6"><h6><?= $row->title;?></h6></div>
                                        <div class="col-md-4"><?= $row->name;?></div>
                                        <div class="col-md-2"><p class="text-danger"><?= number_format($row->result,2);?>%</p></div>
                                        <hr/>
                                        <br><br><br>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-4 sub-title"><h6># Dosen</h6></div>
                <div class="col-md-2 sub-title"><h6>Feedback</h6></div>
                <div class="col-md-6 sub-title"><h6>Catatan</h6></div><br><br>
                <?php if(count($Data) == null):?>
                    <div class="col text-center"><br>
                        <h6>Data not available</h6>
                    </div>
                <?php else:?>
                    <?php $i=1; foreach($Data as $row):?>
                    <div class="col-md-4 sub-title">
                        <h6><?= $i++;?>.&nbsp;&nbsp;<?= $row->name;?><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $row->nidn;?></h6>
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
                label:'Hasil ',
                backgroundColor: ['rgb(255, 99, 132)', 'rgb(253, 215, 3)', 'rgb(127, 255, 1)','rgb(43, 191, 254)', 'rgb(148, 0, 211)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlah;?>]
            }]
        },
        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>