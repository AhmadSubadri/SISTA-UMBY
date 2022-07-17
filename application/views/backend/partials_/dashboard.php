<!-- task, page, download counter  start -->
<div class="col-xl-3 col-md-6">
    <div class="card">
        <div class="card-block">
            <div class="row align-items-center">
                <div class="col-8">
                    <?php if($this->session->userdata('level') == 3):?>
                        <?php $fakultas = $this->db->select('*')->where('id', $this->session->userdata('faculty'))->from('tb_faculty')->get()->result();?>
                        <?php $mhs = $this->db->select('*')->from('tb_student s')->join('tb_major m', 'm.id = s.id_major')->join('tb_faculty f', 'f.id = m.id_faculty')->get()->result();?>
                        <?php foreach($fakultas as $fac):?>
                            <h4 class="text-c-purple"><?php echo count($mhs);?></h4>
                            <h6 class="text-muted m-b-0">Mahasiswa skripsi</h6>
                        <?php endforeach;?>
                    <?php else:?>
                        <h4 class="text-c-purple"><?php echo count($data);?></h4>
                        <h6 class="text-muted m-b-0">Mahasiswa skripsi</h6>
                    <?php endif;?>
                </div>
                <div class="col-4 text-right">
                    <i class="fa fa-bar-chart f-28"></i>
                </div>
            </div>
        </div>
        <div class="card-footer bg-c-purple">
            <div class="row align-items-center">
                <div class="col-9">
                    <?php $prd = $this->db->select('*')->from('tb_major')->where('id', $this->session->userdata('major'))->get()->result();?>
                    <?php if($this->session->userdata('level') == 3):?>
                        <?php foreach($fakultas as $fac):?>
                            <p class="text-white m-b-0"><?= $fac->short_name;?></p>
                        <?php endforeach;?>
                    <?php else:?>
                        <?php foreach($prd as $pd):?>
                            <p class="text-white m-b-0"><?= $pd->name;?></p>
                        <?php endforeach;?>
                    <?php endif;?>
                </div>
                <div class="col-3 text-right">
                    <i class="fa fa-line-chart text-white f-16"></i>
                </div>
            </div>
            
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="card">
        <div class="card-block">
            <div class="row align-items-center">
                <div class="col-8">
                    <?php $allData = $this->db->select('*')->from('tb_student')->get()->result();?>
                    <h4 class="text-c-green"><?php echo count($allData);?></h4>
                    <h6 class="text-muted m-b-0">Semua data skripsi</h6>
                </div>
                <div class="col-4 text-right">
                    <i class="fa fa-file-text-o f-28"></i>
                </div>
            </div>
        </div>
        <div class="card-footer bg-c-green">
            <div class="row align-items-center">
                <div class="col-9">
                    <p class="text-white m-b-0">Semua program studi</p>
                </div>
                <div class="col-3 text-right">
                    <i class="fa fa-line-chart text-white f-16"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="card">
        <div class="card-block">
            <div class="row align-items-center">
                <div class="col-8">
                    <?php $tt = $this->db->select('*')->from('tb_thesisreceived t')->join('tb_major m', 'm.id = t.major')->join('tb_faculty f', 'f.id = m.id_faculty')->get()->result();?>
                    <?php $uu = $this->db->select('*')->where('major', $this->session->userdata('major'))->from('tb_thesisreceived t')->get()->result();?>
                    <?php if($this->session->userdata('level') == 3):?>
                        <h4 class="text-c-red"><?php echo count($tt);?></h4>
                        <h6 class="text-muted m-b-0">Bimbingan/Pendadaran</h6>
                    <?php else:?>
                        <h4 class="text-c-red"><?php echo count($uu);?></h4>
                        <h6 class="text-muted m-b-0">Bimbingan/Pendadaran</h6>
                    <?php endif;?>
                </div>
                <div class="col-4 text-right">
                    <i class="fa fa-calendar-check-o f-28"></i>
                </div>
            </div>
        </div>
        <div class="card-footer bg-c-red">
            <div class="row align-items-center">
                <div class="col-9">
                    <?php if($this->session->userdata('level') == 3):?>
                        <?php foreach($fakultas as $fac):?>
                            <p class="text-white m-b-0"><?= $fac->short_name;?></p>
                        <?php endforeach;?>
                    <?php else:?>
                        <?php foreach($prd as $pd):?>
                            <p class="text-white m-b-0"><?= $pd->name;?></p>
                        <?php endforeach;?>
                    <?php endif;?>
                </div>
                <div class="col-3 text-right">
                    <i class="fa fa-line-chart text-white f-16"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="card">
        <div class="card-block">
            <div class="row align-items-center">
                <div class="col-8">
                    <?php $tt = $this->db->select('*')->from('tb_thesisreceived t')->where('t.status_daftar_yudisium', "1")->join('tb_major m', 'm.id = t.major')->join('tb_faculty f', 'f.id = m.id_faculty')->get()->result();?>
                    <?php $uu = $this->db->select('*')->where('t.status_daftar_yudisium', "1")->where('major', $this->session->userdata('major'))->from('tb_thesisreceived t')->get()->result();?>
                    <?php if($this->session->userdata('level') == 3):?>
                        <h4 class="text-c-blue"><?php echo count($tt);?></h4>
                        <h6 class="text-muted m-b-0">Yudisium</h6>
                    <?php else:?>
                        <h4 class="text-c-blue"><?php echo count($uu);?></h4>
                        <h6 class="text-muted m-b-0">Yudisium</h6>
                    <?php endif;?>
                </div>
                <div class="col-4 text-right">
                    <i class="fa fa-hand-o-down f-28"></i>
                </div>
            </div>
        </div>
        <div class="card-footer bg-c-blue">
            <div class="row align-items-center">
                <div class="col-9">
                    <?php if($this->session->userdata('level') == 3):?>
                        <?php foreach($fakultas as $fac):?>
                            <p class="text-white m-b-0"><?= $fac->short_name;?></p>
                        <?php endforeach;?>
                    <?php else:?>
                        <?php foreach($prd as $pd):?>
                            <p class="text-white m-b-0"><?= $pd->name;?></p>
                        <?php endforeach;?>
                    <?php endif;?>
                </div>
                <div class="col-3 text-right">
                    <i class="fa fa-line-chart text-white f-16"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- task, page, download counter  end -->

<div class="col col-md-12">
    <div class="card table-card">
        <?php $prodi = $this->db->select('*')->from('tb_major')->where('id', $this->session->userdata('major'))->get()->row();?>
        <?php $fakultas = $this->db->select('*')->from('tb_faculty')->where('id', $this->session->userdata('faculty'))->get()->row();?>
        <?php if($this->session->userdata('level') == 3):?>
        <div class="card-header">
            <h5>Daftar mahasiswa skripsi periode <?= date('Y');?> <?= $fakultas->name;?></h5>
            <div class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li><i class="fa fa fa-wrench open-card-option"></i></li>
                    <li><i class="fa fa-window-maximize full-card"></i></li>
                    <li><i class="fa fa-minus minimize-card"></i></li>
                    <li><i class="fa fa-refresh reload-card"></i></li>
                    <li><i class="fa fa-trash close-card"></i></li>
                </ul>
            </div>
        </div>
        <div class="card-block">
            <div class="table-responsive">
                <table class="table table-hover m-b-0 without-header">
                    <tbody>
                        <?php foreach ($mhs as $row) :?>
                            <tr>
                                <td>
                                    <div class="d-inline-block align-middle">
                                        <?php if($row->image == null):?>
                                            <img class="img-radius img-40 align-top m-r-15"
                                            src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
                                        <?php else:?>
                                            <img src="<?php echo base_url('_uploads/profile/student/').$row->image;?>"
                                            alt="user image" class="img-radius img-40 align-top m-r-15">
                                        <?php endif;?>
                                        <div class="d-inline-block">
                                            <h6><?= $row->fullname;?></h6>
                                            <p class="text-muted m-b-0"><?= $row->username;?> / <?= $row->email;?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <h6 class="f-w-700"><b><i class="ti-check text-primary"></i></b></h6>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php else:?>
            <div class="card-header">
                <h5>Daftar mahasiswa skripsi periode <?= date('Y');?> Program studi <?= $prodi->name?></h5>
            <div class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li><i class="fa fa fa-wrench open-card-option"></i></li>
                    <li><i class="fa fa-window-maximize full-card"></i></li>
                    <li><i class="fa fa-minus minimize-card"></i></li>
                    <li><i class="fa fa-refresh reload-card"></i></li>
                    <li><i class="fa fa-trash close-card"></i></li>
                </ul>
            </div>
        </div>
        <div class="card-block">
            <div class="table-responsive">
                <table class="table table-hover m-b-0 without-header">
                    <tbody>
                        <?php foreach ($data as $row) :?>
                            <tr>
                                <td>
                                    <div class="d-inline-block align-middle">
                                        <?php if($row->image == null):?>
                                            <img class="img-radius img-40 align-top m-r-15"
                                            src="<?php echo base_url()?>_uploads/profile/profile.png" alt="user image">
                                        <?php else:?>
                                            <img src="<?php echo base_url('_uploads/profile/student/').$row->image;?>"
                                            alt="user image" class="img-radius img-40 align-top m-r-15">
                                        <?php endif;?>
                                        <div class="d-inline-block">
                                            <h6><?= $row->fullname;?></h6>
                                            <p class="text-muted m-b-0"><?= $row->username;?> / <?= $row->email;?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <h6 class="f-w-700"><b><i class="ti-check text-primary"></i></b></h6>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>

            </div>
        </div>
        <?php endif;?>
    </div>
</div>