<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['Authentication'] = 'backend/Authentication';
$route['login_verify'] = 'backend/Authentication/DoLogin';
$route['Logout'] = 'backend/Authentication/Logout';
$route['Dashboard'] = 'backend/Dashboard';


// Skripsi mahasiswa
$route['mhs/dashboard/pengajuan-judul-skripsi'] = 'backend/mahasiswa/Skripsi';
$route['mhs/dashboard/upload-pengajuan'] = 'backend/mahasiswa/Skripsi/UploadPengajuan';
$route['mhs/dashboard/data-sempro'] = 'backend/mahasiswa/Skripsi/Sempro';
$route['mhs/dashboard/Bimbingan'] = 'backend/mahasiswa/Bimbingan';
$route['mhs/dashboard/save-bimbingan'] = 'backend/mahasiswa/Bimbingan/GuidanceSave';

// Skripsi Dosen
$route['dsn/dashboard/data-pengajuan-skripsi'] = 'backend/dosen/Skripsi';
$route['dsn/dashboard/ploting-dosen-sempro'] = 'backend/dosen/Skripsi/PlotingDosenSempro';
$route['dsn/dashboard/data-sempro-skripsi'] = 'backend/dosen/Skripsi/DataSemproSkripsi';
$route['dsn/dashboard/jadwal-sempro-skripsi/(:any)'] = 'backend/dosen/Skripsi/JadwalSempro/$1';
$route['dsn/dashboard/save-jadwal-sempro'] = 'backend/dosen/Skripsi/SaveJadwalSempro';
$route['dsn/dashboard/detail-hasil-sempro/(:any)'] = 'backend/dosen/Skripsi/DetailHasilSempro/$1';
$route['dsn/dashboard/autocom'] = 'backend/dosen/Skripsi/getautocomplete';
$route['dsn/dashboard/save-pengumuman-sempro'] = 'backend/dosen/Skripsi/SavePengumumansempro';
$route['dsn/dashboard/data-sempro-mahasiswa'] = 'backend/dosen/Skripsi/Sempro';
$route['dsn/dashboard/ploting-dosen-pembimbing'] = 'backend/dosen/Skripsi/PlotingDosesnPembimbing';
$route['dsn/dashboard/save-ploting-dospem'] = 'backend/dosen/Skripsi/SavePlotingDospem';

//persyaratan
$route['dsn/dashboard/syarat-pendadaran'] = 'backend/dosen/Pendadaran';
$route['dsn/dashboard/delete-syarat/(:any)'] = 'backend/dosen/Pendadaran/deleterequirementexam/$1';
$route['dsn/dashboard/insert-syarat'] = 'backend/dosen/Pendadaran/insertrequirementexam';
$route['dsn/dashboard/update-syarat'] = 'backend/dosen/Pendadaran/updateRequirementexam';
$route['publish-requirementexam/(:any)'] = 'backend/dosen/Pendadaran/publishrequirement/$1';
$route['unpublish-requirementexam/(:any)'] = 'backend/dosen/Pendadaran/unpublishrequirement/$1';

// Bimbingan
$route['dsn/dashboard/Bimbingan'] = 'backend/dosen/Bimbingan';
$route['dsn/dashboard/Form-Bimbingan'] = 'backend/dosen/Bimbingan/formfedbackGuidance';
$route['dsn/dashboard/insertApprovelguidance'] = 'backend/dosen/Bimbingan/insertApprovelguidance';
$route['dsn/dashboard/save-feedback-bimbingan'] = 'backend/dosen/Bimbingan/formfedbackGuidanceSave';

//Pendadaran
$route['dsn/dashboard/mahasiswa-pendadaran'] = 'backend/dosen/Pendadaran/GetPendadaran';
$route['dsn/dashboard/penentuan-jadwal-pendadaran'] = 'backend/dosen/Pendadaran/PenjadwalanPendadaran';
$route['dsn/dashboard/detail-data-pendadaran/(:any)'] = 'backend/dosen/Pendadaran/DetailDataPendadaran/$1';
$route['dsn/dashboard/insert-penguji-pendadaran'] = 'backend/dosen/Pendadaran/InsertPengujiPendadaran';
$route['dsn/dashboard/update-penguji-pendadaran'] = 'backend/dosen/Pendadaran/UpdatePengujiPendadaran';

// skripsi umum
$route['dsn/dashboard/pelaksanaan-sempro'] = 'backend/umum/Skripsi';
$route['dsn/dashboard/proses-sempro/(:any)'] = 'backend/umum/Skripsi/ProsesSempro/$1';
$route['dsn/dashboard/save-feedback'] = 'backend/umum/Skripsi/SaveFeedbackSubmission';
$route['dsn/dashboard/Bimbingan'] = 'backend/umum/Skripsi/Bimbingan';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;