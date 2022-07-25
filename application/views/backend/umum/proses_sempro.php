<div class="col-xl-12">
    <a href="<?= site_url('dsn/dashboard/pelaksanaan-sempro');?>" class="btn btn-mini btn-outline-primary"><i
            class="ti-back-left"></i>Kembali</a>
    <div class="card">
        <div class="card-header" style="background-color: #75A8FE;">
            <h5 class="card-header-text" style="color: white;">HASIL TEST PLAGIARISME</h5>
        </div>
        <div class="card-block accordion-block  color-accordion-block">
            <div id="accordion" role="tablist" aria-multiselectable="true">
                <div class="accordion-panel">
                    <div class="accordion-heading" role="tab" id="headingtoken">
                        <h3 class="card-title accordion-title"  style="background-color: #E0FFFF;">
                            <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse"
                                data-parent="#accordion" href="#collapsetoken" aria-expanded="false"
                                aria-controls="collapsetoken">
                                <b>Tokenizing K-Gram</b></a>
                        </h3>
                    </div>
                    <div id="collapsetoken" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtoken">
                        <div class="accordion-content accordion-desc"><br>
                            <div class="row">
                                <?php $kgram = "5";$basis = "3";?>
                                <div class="col-md-6 sub-title">
                                    <h6 class="text-primary">Judul yang di ajukan</h6>
                                    <?php $i=1; foreach($data as $dtpengajuan):?>
                                        <h6><?= $z= hapus_simbol($dtpengajuan->title);?></h6>
                                        <h6><?= kgram($z, $kgram);?></h6>
                                        <hr>
                                    <?php endforeach;?>
                                </div>
                                <?php $i=1; foreach($DataSource->result() as $dtpenguji):?>
                                    <div class="col-md-6 sub-title">
                                    <h6 class="text-primary">Judul pembanding (<?= $dtpenguji->id;?>)</h6>
                                        <h6><?= $i++; $x= hapus_simbol($dtpenguji->title);?></h6>
                                        <h6><?= kgram($x, $kgram);?></h6>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-panel">
                    <div class="accordion-heading" role="tab" id="headinghashing">
                        <h3 class="card-title accordion-title"  style="background-color: #FAFAD2;">
                            <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse"
                                data-parent="#accordion" href="#collapsehashing" aria-expanded="false"
                                aria-controls="collapsehashing">
                                <b>Hashing</b></a>
                        </h3>
                    </div>
                    <div id="collapsehashing" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headinghashing">
                        <div class="accordion-content accordion-desc"><br>
                            <div class="row">
                                <?php $kgram = "5";$basis = "3";?>
                                <div class="col-md-6">
                                    <h6 class="sub-title text-primary">Judul yang di ajukan</h6>
                                    <?php $i=1; foreach($data as $dtpengajuan):?>
                                    <h6><?= $i++;?>. <?= $c= hapus_simbol($dtpengajuan->title);?></h6>
                                        <h6><?= hasing($c, $kgram, $basis);?></h6>
                                        <hr>
                                    <?php endforeach;?>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="sub-title text-primary">Judul pembanding</h6>
                                    <?php foreach($DataSource->result() as $dtpenguji):?>
                                        <h6><?= $dtpenguji->id;?>. <?= $v= hapus_simbol($dtpenguji->title);?></h6>
                                        <h6><?= hasing($v, $kgram, $basis);?></h6>
                                        <hr>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-panel">
                    <div class="accordion-heading" role="tab" id="headingFinger">
                        <h3 class="card-title accordion-title"  style="background-color: #D3D3D3;">
                            <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse"
                                data-parent="#accordion" href="#collapsefinger" aria-expanded="false"
                                aria-controls="collapsefinger">
                                <b>Skema Hash yang sama antara judul diajukan ᴖ pembanding</b></a>
                        </h3>
                    </div>
                    <div id="collapsefinger" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFinger">
                        <div class="accordion-content accordion-desc"><br>
                            <div class="row">
                                <?php $kgram =5; $basis = 3;?>
                                <?php foreach($DataSource->result() as $dtpengujia):?>
                                    <div class='col-md-4'>
                                        <h6 class="text-primary sub-title">Skema hash sama antara judul diajukan dengan pembanding <?= $dtpengujia->id;?> (A ᴖ <?= $dtpengujia->id;?>)</h6>
                                        <?php $v_pmb = $this->db->select('source_pembanding.source, source_pembanding.id')->where('source_pembanding.id_pembanding', $dtpengujia->id)->from('source_pembanding')->group_by('source_pembanding.source')->group_by('source_pengajuan.source')->join('source_pengajuan','source_pengajuan.source = source_pembanding.source')->get()->result();?>
                                        <?php foreach($v_pmb as $pmb):?>
                                            <?= hasing($pmb->source, $kgram, $basis);?>
                                        <?php endforeach;?>
                                    </div>
                            <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-panel">
                    <div class="accordion-heading" role="tab" id="headingTotal">
                        <h3 class="card-title accordion-title"  style="background-color: #90EE90;">
                            <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse"
                                data-parent="#accordion" href="#collapseTotal" aria-expanded="false"
                                aria-controls="collapseTotal">
                                <b>Total schema hash masing-masing judul</b></a>
                        </h3>
                    </div>
                    <div id="collapseTotal" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTotal">
                        <div class="accordion-content accordion-desc"><br>
                            <div class="row">
                                <?php $kgram =5; $basis = 3; $d = array();?>
                                <div class='col-md-4'>
                                    <h6 class="text-danger">Judul di ajukan</h6>
                                    <?php $v_pnga = $this->db->select('*')->from('source_pengajuan')->group_by('source')->get()->result();?>
                                    <h6 class="text-primary sub-title">Total skema hash Text judul di ajukan = <?php echo count($v_pnga);?></h6>
                                    <h6>
                                        <?php foreach($v_pnga as $pnga):?>
                                            <?= hasing($pnga->source, $kgram, $basis);?>
                                        <?php endforeach;?>
                                    </h6>
                                </div>
                                <?php foreach($DataSource->result() as $dtpengujiaa):?>
                                    <div class="sub-title col-md-4">
                                    <h6 class="text-primary">Judul pembanding (<?= $dtpengujiaa->id;?>)</h6>
                                    <?php $v_pmba = $this->db->select('source, id')->where('id_pembanding', $dtpengujiaa->id)->from('source_pembanding')->group_by('source')->get()->result();?>
                                        <h6 class="text-primary sub-title">Total skema hash Text pembanding (<?= $dtpengujiaa->id;?>) = <?php echo count($v_pmba);?></h6>
                                        <h6>
                                            <?php foreach($v_pmba as $pmba):?>
                                                <?= hasing($pmba->source, $kgram, $basis);?>
                                            <?php endforeach;?>
                                        </h6>
                                        </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-panel">
                    <div class="accordion-heading" role="tab" id="headingSimilarity">
                        <h3 class="card-title accordion-title" style="background-color: #FFB6C1;">
                            <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse"
                                data-parent="#accordion" href="#collapseSimilarity" aria-expanded="false"
                                aria-controls="collapseSimilarity">
                                <i><b>Similarity / Hasil plagiarisme</b></i></a>
                        </h3>
                    </div>
                    <div id="collapseSimilarity" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSimilarity">
                        <div class="accordion-content accordion-desc"><br>
                            <div class="row">
                                <?php $kgram =5; $basis = 3; $d = array();?>
                                <div class='col-md-12'>
                                <?php foreach($DataSource->result() as $dtpengujiaaa):?>
                                    <?php $v_pmbaaaa = $this->db->select('source_pembanding.source, source_pembanding.id')->where('source_pembanding.id_pembanding', $dtpengujiaaa->id)->from('source_pembanding')->group_by('source_pembanding.source')->group_by('source_pengajuan.source')->join('source_pengajuan','source_pengajuan.source = source_pembanding.source')->get()->result();?>

                                    <?php $v_pmbabbb = $this->db->select('source, id')->where('id_pembanding', $dtpengujiaaa->id)->from('source_pembanding')->group_by('source')->get()->result();?>

                                    <?php $v_pngaff = $this->db->select('*')->from('source_pengajuan')->group_by('source')->get()->result();?>
                                    <?php $hasil = round((2*count($v_pmbaaaa)/(count($v_pngaff)+count($v_pmbabbb)))*100,2);?>
                                    <h6 class="text-primary">Hasil similarity dari judul diajukan dengan pembanding <?= $dtpengujiaaa->id;?></h6>
                                    <h6>Judul pembanding : "<?= $dtpengujiaaa->title;?>"</h6>
                                    <h6>Skema hash Text judul diajukan = <?= count($v_pngaff);?></h6>
                                    <h6>Skema hash Text judul pembanding = <?= count($v_pmbabbb);?></h6>
                                    <h6>Skema Hash sama Text diajukan dan Text pembanding (diajukan ᴖ pembanding) = <?= count($v_pmbaaaa);?></h6>
                                    <h6>Hasil Similarity (2 * <?= count($v_pmbaaaa);?> / (<?= count($v_pngaff);?> + <?= count($v_pmbabbb);?>)) * 100 = 
                                        <b class="text-primary"><?php echo $hasil;?> %</b>
                                        <?php $i=1; foreach($data as $dtpengajuan):?>
                                            <?php $dtal = array(
                                                'id_sourcetitle' => $dtpengujiaaa->id,
                                                'id_ideasubmission' => $dtpengajuan->id,
                                                'nim' => $dtpengajuan->nim,
                                                'title' => $dtpengujiaaa->title,
                                                'name' => $dtpengujiaaa->name,
                                                'result' => $hasil
                                            );
                                            $this->db->insert('tb_resultrabintest', $dtal);?>
                                        <?php endforeach;?>
                                    </h6><br><br>
                                <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-panel">
                    <div class="accordion-heading" role="tab" id="headingOne">
                        <h3 class="card-title accordion-title" style="background-color: #FFA07A;">
                            <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse"
                                data-parent="#accordion" href="#collapseOne" aria-expanded="true"
                                aria-controls="collapseOne">
                                <b>Diagram BAR hasil cek plagiat</b></a>
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
                        <h3 class="card-title accordion-title" style="background-color: #87CEFA;">
                            <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse"
                                data-parent="#accordion" href="#collapseTwo" aria-expanded="false"
                                aria-controls="collapseTwo">
                                <b>5 Judul persentase tertinggi</b></a>
                        </h3>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="accordion-content accordion-desc"><br>
                            <div class="row">
                                <div class="col-md-4 sub-title text-primary">
                                    #Judul pembanding
                                </div>
                                <div class="col-md-4 sub-title text-primary">
                                    Pemilik judul
                                </div>
                                <div class="col-md-2 sub-title text-primary">
                                    Total
                                </div>
                                <div class="col-md-2 sub-title text-primary">
                                    Hasil
                                </div>
                                <?php foreach($data as $dtpengajuan):?>
                                    <?php $v_dataresult = $this->db->select('*')->where('id_ideasubmission', $dtpengajuan->id)->from('tb_resultrabintest')->order_by('result', 'DESC')->limit(5)->get()->result();?>
                                    <?php foreach($v_dataresult as $ff):?>
                                        <div class="col-md-4">
                                            <h6><?= $ff->title;?></h6>
                                        </div>
                                        <div class="col-md-4"><?= $ff->name;?></div>
                                        <div class="col-md-2">
                                            <p class="text-danger"><?= $ff->result;?>%</p>
                                        </div>
                                        <div class="col-md-2">
                                            <?php if ($ff->result >= 70):?>
                                                <label class="label label-mini label-danger" id="blinkPlagiat">Plagiarisme berat</label>
                                            <?php elseif($ff->result >= 30 && $ff->result <= 69.99):?>
                                                <label class="label label-mini label-warning">Plagiarisme sedang</label>
                                            <?php else:?>
                                                 <label class="label label-mini label-success">Plagiarisme ringan</label>
                                            <?php endif;?>
                                        </div>
                                        <hr />
                                        <br><br><br>
                                    <?php endforeach;?>
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
                    <h4 class="sub-title text-primary">Data Mahasiswa</h4>
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
                            <h4 class="sub-title text-center text-primary">File proposal diajukan</h4>
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
                    <h4 class="sub-title text-primary">Feedback hasil seminar proposal</h4>
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
foreach($data as $dtpengajuan){
    $chartdata = $this->db->select('*')->from('tb_resultrabintest')->where('id_ideasubmission', $dtpengajuan->id)->order_by('result','DESC')->limit(5)->get()->result();
    $nama= "";
    $jumlah=null;
    foreach ($chartdata as $item)
    {
        $name = $item->name;
        $nama .= "'$name'". ", ";
        $result=$item->result;
        $jumlah .= "$result". ", ";
    }
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
            borderColor: ['rgb(128, 128, 128)'],
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

<style type="text/css">
    #blinkPlagiat {
  animation: blinker2 0.6s cubic-bezier(1, 0, 0, 1) infinite alternate;  
}
@keyframes blinker2 { to { opacity: 0; } }
</style>