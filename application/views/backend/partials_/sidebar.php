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
                <li class="active">
                    <a href="<?= site_url('Dashboard');?>" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>

                <?php if($this->session->userdata('level') == '1'):?>
                    <!-- Menu sidebar Administartor / Prodi -->
                    <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Bimbingan</div>
                    <li>
                        <a href="<?= site_url('dsn/dashboard/Bimbingan');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-themify-favicon"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Bimbingan</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Component</div>
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Skripsi</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class=" ">
                                <a href="<?= site_url('dsn/dashboard/data-pengajuan-skripsi');?>"
                                    class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Data pengajuan judul &
                                    proposal</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="<?= site_url('dsn/dashboard/data-sempro-skripsi');?>" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Schedule &
                                    pengumuman hasil sempro</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="<?= site_url('dsn/dashboard/data-sempro-mahasiswa');?>"
                                    class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Data mahasiswa seminar
                                    proposal</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="<?= site_url('dsn/dashboard/ploting-dosen-pembimbing');?>"
                                    class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Ploting dosen
                                    pembimbing</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-write"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Pendadaran</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class=" ">
                                <a href="<?= site_url('dsn/dashboard/syarat-pendadaran');?>" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Syarat pendadaran</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="<?= site_url('dsn/dashboard/mahasiswa-pendadaran');?>" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Mahasiswa pendadaran</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="<?= site_url('dsn/dashboard/penentuan-jadwal-pendadaran');?>" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Penentuan jadwal & penguji</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="<?= site_url('dsn/dashboard/pelaksanaan-pendadaran');?>" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Pelaksanaan pendadaran</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-cloud-up"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Yudisium</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class=" ">
                                <a href="<?= site_url('dsn/dashboard/syarat-yudisium');?>" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Syarat yudisium</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="<?= site_url('dsn/dashboard/mahasiswa-yudisium');?>" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Mahasiswa yudisium</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Progres</div>
                    <li>
                        <a href="<?= site_url('dsn/dashboard/progres-bimbingan');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-bar-chart"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Progres bimbingan</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('dsn/dashboard/progres-upload-dokumen');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-bar-chart"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Progres yudisium</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                <?php elseif($this->session->userdata('level') == '2'):?>
                    <!-- Layout sidebar -->
                    <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Bimbingan</div>
                    <li>
                        <a href="<?= site_url('dsn/dashboard/Bimbingan');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-themify-favicon"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Bimbingan</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Skripsi</div>
                    <li>
                        <a href="<?= site_url('dsn/dashboard/pelaksanaan-sempro');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-user"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Mahasiswa sempro</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Pendadaran</div>
                    <li>
                        <a href="<?= site_url('dsn/dashboard/data-mahasiswa-pendadaran');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-write"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Mahasiswa pendadaran</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>

                    <!-- Tata usaha -->
                <?php elseif($this->session->userdata('level') == '3'):?>
                    <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Data master user</div>
                    <li>
                        <a href="<?= site_url('TU/dashboard/data-tata-usaha');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-list"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Data tata usaha</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('TU/dashboard/data-dosen');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-list"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Data dosen</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('TU/dashboard/data-mahasiswa');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-list"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Data mahasiswa skripsi</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Component</div>


                <?php else:?>
                    <!-- Menu sidebar Mahasiswa -->
                    <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Bimbingan</div>
                    <li>
                        <a href="<?= site_url('mhs/dashboard/Bimbingan');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-themify-favicon"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Bimbingan</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Component</div>
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Skripsi</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class=" ">
                                <a href="<?= site_url('mhs/dashboard/pengajuan-judul-skripsi');?>"
                                    class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Pengajuan judul &
                                    proposal</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="<?= site_url('mhs/dashboard/data-sempro');?>" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Schedule &
                                    Pengumuman hasil seminar proposal</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-write"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Pendadaran</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class=" ">
                                <a href="<?= site_url('mhs/dashboard/syarat-pendadaran');?>" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Upload syarat pendadaran</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="<?= site_url('mhs/dashboard/jadwal-pendadaran');?>" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Jadwal pendadaran</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="<?= site_url('mhs/dashboard/pengumuman-pendadaran');?>" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Pengumuman hasil pendadaran</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-cloud-up"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Yudisium</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class=" ">
                                <a href="<?= site_url('mhs/dashboard/syarat-yudisium');?>" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Upload syarat yudisium</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Progres</div>
                    <li>
                        <a href="<?= site_url('mhs/dashboard/me-progres-bimbingan');?>" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-bar-chart"></i><b>FC</b></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Progres bimbingan</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li>
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