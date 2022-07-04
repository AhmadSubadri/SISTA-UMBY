<?php $this->load->view('backend/partials_/alert_success.php');?>
<div class="col-xl-12">
    <div class="card">
        <div class="card-header-right">
            <a data-toggle="modal" data-target="#staticBackdrop" class="btn btn-mini text-danger"><i
                    class="ti-help"></i>Help</a>
            <div class="card-header">
                <div class="accordion-block  color-accordion-block">
                    <div id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="accordion-panel">
                            <div class="accordion-heading" role="tab" id="headingOne">
                                <h3 class="card-title accordion-title">
                                    <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse"
                                        data-parent="#accordion" href="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        Form ploting dosen penguji seminar proposal</a>
                                </h3>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                aria-labelledby="headingOne">
                                <div class="accordion-content accordion-desc">
                                    <form action="<?php echo base_url('dsn/dashboard/ploting-dosen-sempro');?>"
                                        method="POST">
                                        <div class="form-group form-default">
                                            <div class="form-group form-default">
                                                <label for="nameMhs">Nama Mahasiswa</label>
                                                <input type="text" name="ididea" id="ididea" hidden>
                                                <input type="text" name="nim" id="nim" hidden>
                                                <input type="text" id="nameMhs" name="nameMhs" class="form-control"
                                                    placeholder="Nama Mahasiswa" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="examiner1">Dosen penguji</label><br>
                                                <?php foreach ($DataDosen->result() as $row) :?>
                                                <input type="checkbox" name="nidn[]" value="<?= $row->username; ?>">
                                                <label><?= $row->fullname;?></label><br>
                                                <?php endforeach;?>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-mini"><i class="ti-save">
                                                    Save</i></button>
                                        </div>
                                    </form>
                                </div>
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
            <h5>Ploting dan pelaksanaan sempro</h5>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table table-hover m-b-0 without-header">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>
                                <input type="checkbox" class="form-check-input" name="nim[]" onchange="checkAll(this)">
                                Profil
                            </th>
                            <th>Jadwal sempro</th>
                            <th>Status sempro</th>
                            <th width="10px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($DataDataSempro) == null):?>
                        <tr>
                            <td colspan="5" class="col text-center">
                                <h6>Data not available</h6>
                            </td>
                        </tr>
                        <?php else:?>
                        <?php $i=1; foreach($DataDataSempro as $row):?>
                        <tr>
                            <th scope="row"><?= $i++;?></th>
                            <td>
                                <div class="media">
                                    <?php if($row->status == 0):?>
                                    <input type="checkbox" class="form-check-input" name="nim[]"
                                        value="<?= $row->nim; ?>">
                                    <?php else:?>
                                    <input type="checkbox" class="form-check-input" name="nim[]"
                                        value="<?= $row->nim; ?>" checked disabled>
                                    <?php endif;?>
                                    <?php if($row->image == null):?>
                                    <img class="img-radius img-40 align-top m-r-15"
                                        src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
                                    <?php else:?>
                                    <img src="<?php echo base_url('_uploads/profile/student/').$row->image;?>"
                                        alt="user image" class="img-radius img-40 align-top m-r-15">
                                    <?php endif;?>
                                    <div class="media-body">
                                        <h5 class="notification-user"><?= $row->name;?></h5>
                                        <p class="notification-msg"><?= $row->nim;?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <?php if($row->tanggal == 0):?>
                                <label class="label label-mini label-danger">Belum terjadwal</label>
                                <?php else:?>
                                <h6>Hari/Tanggal : <?php echo format_tanggal(date($row->tanggal));?> /
                                    <?= $row->jam;?></h6>
                                <h6>Tempat : <?= $row->tempat;?></h6>
                                <h6>Kegiatan : <?= $row->kegiatan;?></h6>
                                <?php endif;?>
                            </td>
                            <td>
                                <?php if($row->status_sempro == 0):?>
                                <label class="label label-mini label-danger">Belum sempro</label>
                                <?php elseif($row->status_sempro == 1):?>
                                <label class="label label-mini label-success">Sudah sempro</label>
                                <?php else:?>
                                <label class="label label-mini label-info">Sudah pengumuman</label>
                                <?php endif;?>
                            </td>
                            <td>
                                <?php if($row->status_sempro == 0):?>
                                <a href="<?php echo base_url('dsn/dashboard/jadwal-sempro-skripsi/'.$row->nim);?>"
                                    class="btn btn-mini text-custom"><i class="ti-pencil"></i>Jadwal sempro</a>
                                <?php else:?>
                                <a href="#" class="btn btn-mini disabled"><i class="ti-na"></i>Jadwal sempro</a>
                                <?php endif;?>
                                <a href="<?php echo base_url('dsn/dashboard/detail-hasil-sempro/'.$row->nim);?>"
                                    class="btn btn-mini btn-grd-info btn-info btn-outline-info"><i
                                        class="ti-eye"></i>Detail hasil</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal ploting dosen sempro -->
<div class="modal fade" id="staticBackdrop" role="dialog" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Data mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php foreach($DataByToCheck as $row):?>
                <option value="<?= $row->nim;?>"><?php echo $row->name;?></option>
                <?php endforeach;?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-mini" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="<?php echo base_url('assets/autocom/css/jquery-ui.css')?>">
<script src="<?php echo base_url()?>assets/autocom/js/jquery-3.3.1.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/autocom/js/bootstrap.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/autocom/js/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#nameMhs').autocomplete({
        source: "<?php echo base_url('backend/dosen/Skripsi/getautocomplete');?>",

        select: function(event, ui) {
            $('[name="nameMhs"]').val(ui.item.label);
            $('[name="ididea"]').val(ui.item.description);
            $('[name="nim"]').val(ui.item.nim);
        },
        response: function(event, ui) {
            if (ui.content.length === 0) {
                console.log('No results loaded!');
            } else {
                console.log('success!');
            }
        }
    });
});
</script>
<!-- check all send schecule-->
<!-- <script type="text/javascript">
    function checkAll(ele) {
        var checkboxes = document.getElementsByTagName('input');
        if (ele.checked) {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = true;
                }
            }
        } else {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = false;
                }
            }
        }
    }
    </script> -->