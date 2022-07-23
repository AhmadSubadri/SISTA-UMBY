<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="main-menu-header">
            <?php if($this->session->userdata('foto') == null):?>
                <img class="img-80 img-radius" src="<?php echo base_url()?>_uploads/profile/profile.png" width="50px"
                height="60px" alt="User-Profile-Image">
            <?php else:?>
                <?php if($this->session->userdata('level') == '1'):?>
                    <img class="img-80 img-radius" width="50px" height="60px"
                    src="<?= base_url('_uploads/profile/staff/').$this->session->userdata('foto');?>"
                    alt="User-Profile-Image">
                <?php else:?>
                    <img class="img-80 img-radius" width="50px" height="60px"
                    src="<?= base_url('_uploads/profile/student/').$this->session->userdata('foto');?>"
                    alt="User-Profile-Image">
                <?php endif;?>
            <?php endif;?>
            <div class="user-details">
                <span id="more-details"><?= $this->session->userdata('name');?><i class="fa fa-caret-down"></i></span>
            </div>
        </div>

        <div class="main-menu-content">
            <ul>
                <li class="more-details">
                    <a href="user-profile.html"><i class="ti-user"></i>View Profile</a>
                    <a href="#!"><i class="ti-settings"></i>Settings</a>
                    <a href="#!" data-target="#logoutmodal" data-toggle="modal"><i
                        class="ti-layout-sidebar-left"></i>Logout</a>
                    </li>
                </ul>
            </div>

            <!-- Layout sidebar -->
            <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Home</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="<?php if($this->uri->uri_string() == 'Dashboard') { echo 'active'; } ?>">
                    <a href="<?= site_url('Dashboard');?>" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>

                <?php if($this->session->userdata('level') == '1'):?>
                    <!-- Menu sidebar Administartor / Prodi -->
                    <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Bimbingan</div>
                    <li class="<?php if($this->uri->uri_string() == 'dsn/dashboard/Bimbingan') { echo 'active'; } ?>">
                        <a href="<?= site_url('dsn/dashboard/Bimbingan');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-themify-favicon"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Bimbingan</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Component</div>
                    <li class="pcoded-hasmenu 
                        <?php if($this->uri->uri_string() == 'dsn/dashboard/data-pengajuan-skripsi' || $this->uri->uri_string() == 'dsn/dashboard/data-sempro-skripsi'|| $this->uri->uri_string() == 'dsn/dashboard/data-sempro-mahasiswa'|| $this->uri->uri_string() == 'dsn/dashboard/ploting-dosen-pembimbing') { echo 'active'; } ?>">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Skripsi</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="<?php if($this->uri->uri_string() == 'dsn/dashboard/data-pengajuan-skripsi') { echo 'active'; } ?>">
                                <a href="<?= site_url('dsn/dashboard/data-pengajuan-skripsi');?>"
                                    class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Data pengajuan tugas akhir</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="<?php if($this->uri->uri_string() == 'dsn/dashboard/data-sempro-skripsi') { echo 'active'; } ?>">
                                <a href="<?= site_url('dsn/dashboard/data-sempro-skripsi');?>" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Penentuan jadwal & pengumuman hasil</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="<?php if($this->uri->uri_string() == 'dsn/dashboard/data-sempro-mahasiswa') { echo 'active'; } ?>">
                                <a href="<?= site_url('dsn/dashboard/data-sempro-mahasiswa');?>"
                                    class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Pelaksanaan seminar proposal</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="<?php if($this->uri->uri_string() == 'dsn/dashboard/ploting-dosen-pembimbing') { echo 'active'; } ?>">
                                <a href="<?= site_url('dsn/dashboard/ploting-dosen-pembimbing');?>"
                                    class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Pemilihan dosen
                                    pembimbing</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="pcoded-hasmenu 
                    <?php if($this->uri->uri_string() == 'dsn/dashboard/syarat-pendadaran' || $this->uri->uri_string() == 'dsn/dashboard/mahasiswa-pendadaran'|| $this->uri->uri_string() == 'dsn/dashboard/penentuan-jadwal-pendadaran'|| $this->uri->uri_string() == 'dsn/dashboard/pelaksanaan-pendadaran') { echo 'active'; } ?>">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-write"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Pendadaran</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="<?php if($this->uri->uri_string() == 'dsn/dashboard/syarat-pendadaran') { echo 'active'; } ?>">
                                <a href="<?= site_url('dsn/dashboard/syarat-pendadaran');?>" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Syarat pendadaran</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="<?php if($this->uri->uri_string() == 'dsn/dashboard/mahasiswa-pendadaran') { echo 'active'; } ?>">
                                <a href="<?= site_url('dsn/dashboard/mahasiswa-pendadaran');?>" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Data mahasiswa pendadaran</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="<?php if($this->uri->uri_string() == 'dsn/dashboard/penentuan-jadwal-pendadaran') { echo 'active'; } ?>">
                                <a href="<?= site_url('dsn/dashboard/penentuan-jadwal-pendadaran');?>" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Penentuan jadwal & penguji sidang</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="<?php if($this->uri->uri_string() == 'dsn/dashboard/pelaksanaan-pendadaran') { echo 'active'; } ?>">
                                <a href="<?= site_url('dsn/dashboard/pelaksanaan-pendadaran');?>" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Pelaksanaan pendadaran</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="pcoded-hasmenu 
                    <?php if($this->uri->uri_string() == 'dsn/dashboard/syarat-yudisium' || $this->uri->uri_string() == 'dsn/dashboard/mahasiswa-yudisium') { echo 'active'; } ?>">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-cloud-up"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Yudisium</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="<?php if($this->uri->uri_string() == 'dsn/dashboard/syarat-yudisium') { echo 'active'; } ?>">
                                <a href="<?= site_url('dsn/dashboard/syarat-yudisium');?>" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Syarat yudisium</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="<?php if($this->uri->uri_string() == 'dsn/dashboard/mahasiswa-yudisium') { echo 'active'; } ?>">
                                <a href="<?= site_url('dsn/dashboard/mahasiswa-yudisium');?>" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Mahasiswa yudisium</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Progres</div>
                    <li class="<?php if($this->uri->uri_string() == 'dsn/dashboard/progres-bimbingan') { echo 'active'; } ?>">
                        <a href="<?= site_url('dsn/dashboard/progres-bimbingan');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-bar-chart"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Progres bimbingan</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($this->uri->uri_string() == 'dsn/dashboard/progres-upload-dokumen') { echo 'active'; } ?>">
                        <a href="<?= site_url('dsn/dashboard/progres-upload-dokumen');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-bar-chart"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Progres yudisium</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                <?php elseif($this->session->userdata('level') == '2'):?>
                    <!-- Layout sidebar -->
                    <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Bimbingan</div>
                    <li class="<?php if($this->uri->uri_string() == 'dsn/dashboard/Bimbingan') { echo 'active'; } ?>">
                        <a href="<?= site_url('dsn/dashboard/Bimbingan');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-themify-favicon"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Bimbingan</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Skripsi</div>
                    <li class="<?php if($this->uri->uri_string() == 'dsn/dashboard/pelaksanaan-sempro') { echo 'active'; } ?>">
                        <a href="<?= site_url('dsn/dashboard/pelaksanaan-sempro');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-user"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Pelaksanaan sempro</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Pendadaran</div>
                    <li class="<?php if($this->uri->uri_string() == 'dsn/dashboard/data-mahasiswa-pendadaran') { echo 'active'; } ?>">
                        <a href="<?= site_url('dsn/dashboard/data-mahasiswa-pendadaran');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-write"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Pelaksanaan pendadaran</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>

                    <!-- Tata usaha -->
                <?php elseif($this->session->userdata('level') == '3'):?>
                    <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Data master user</div>
                    <li class="<?php if($this->uri->uri_string() == 'TU/dashboard/data-tata-usaha') { echo 'active'; } ?>">
                        <a href="<?= site_url('TU/dashboard/data-tata-usaha');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-list"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Data tata usaha</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($this->uri->uri_string() == 'TU/dashboard/data-dosen') { echo 'active'; } ?>">
                        <a href="<?= site_url('TU/dashboard/data-dosen');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-list"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Data dosen</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($this->uri->uri_string() == 'TU/dashboard/data-mahasiswa') { echo 'active'; } ?>">
                        <a href="<?= site_url('TU/dashboard/data-mahasiswa');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-list"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Data mahasiswa skripsi</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Component</div>
                    <li>
                        <a href="<?= site_url('TU/dashboard/daftar-yudisium-mahasiswa');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-write"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Daftar yudisium</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Setting</div>
                    <li class="">
                        <a href="#" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-settings"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Setting jadwal</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>

                <?php else:?>
                    <!-- Menu sidebar Mahasiswa -->
                    <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Bimbingan</div>
                    <li class="<?php if($this->uri->uri_string() == 'mhs/dashboard/Bimbingan') { echo 'active'; } ?>">
                        <a href="<?= site_url('mhs/dashboard/Bimbingan');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-themify-favicon"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Bimbingan</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Component</div>
                    <li class="pcoded-hasmenu 
                    <?php if($this->uri->uri_string() == 'mhs/dashboard/pengajuan-judul-skripsi' || $this->uri->uri_string() == 'mhs/dashboard/data-sempro') { echo 'active'; } ?>">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Skripsi</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="<?php if($this->uri->uri_string() == 'mhs/dashboard/pengajuan-judul-skripsi') { echo 'active'; } ?>">
                                <a href="<?= site_url('mhs/dashboard/pengajuan-judul-skripsi');?>"
                                    class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Pengajuan judul &
                                    proposal</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="<?php if($this->uri->uri_string() == 'mhs/dashboard/data-sempro') { echo 'active'; } ?>">
                                <a href="<?= site_url('mhs/dashboard/data-sempro');?>" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Schedule &
                                    Pengumuman hasil seminar proposal</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="pcoded-hasmenu 
                    <?php if($this->uri->uri_string() == 'mhs/dashboard/syarat-pendadaran' || $this->uri->uri_string() == 'mhs/dashboard/jadwal-pendadaran'|| $this->uri->uri_string() == 'mhs/dashboard/pengumuman-pendadaran') { echo 'active'; } ?>">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-write"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Pendadaran</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="<?php if($this->uri->uri_string() == 'mhs/dashboard/syarat-pendadaran') { echo 'active'; } ?>">
                                <a href="<?= site_url('mhs/dashboard/syarat-pendadaran');?>" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Upload syarat pendadaran</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="<?php if($this->uri->uri_string() == 'mhs/dashboard/jadwal-pendadaran') { echo 'active'; } ?>">
                                <a href="<?= site_url('mhs/dashboard/jadwal-pendadaran');?>" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Jadwal pendadaran</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="<?php if($this->uri->uri_string() == 'mhs/dashboard/pengumuman-pendadaran') { echo 'active'; } ?>">
                                <a href="<?= site_url('mhs/dashboard/pengumuman-pendadaran');?>" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Pengumuman hasil pendadaran</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="pcoded-hasmenu 
                    <?php if($this->uri->uri_string() == 'mhs/dashboard/syarat-yudisium') { echo 'active'; } ?>">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-cloud-up"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Yudisium</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="<?php if($this->uri->uri_string() == 'mhs/dashboard/syarat-yudisium') { echo 'active'; } ?>">
                                <a href="<?= site_url('mhs/dashboard/syarat-yudisium');?>" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Upload syarat yudisium</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Progres</div>
                    <li class="<?php if($this->uri->uri_string() == 'mhs/dashboard/me-progres-bimbingan') { echo 'active'; } ?>">
                        <a href="<?= site_url('mhs/dashboard/me-progres-bimbingan');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-bar-chart"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Progres bimbingan</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="<?php if($this->uri->uri_string() == 'mhs/dashboard/me-progres-yudisium') { echo 'active'; } ?>">
                        <a href="<?= site_url('mhs/dashboard/me-progres-yudisium');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-bar-chart"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Progres yudisium</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                <?php endif;?>
            </ul>
            <!-- end layout sidebar -->
        </div>
    </nav>