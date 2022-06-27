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

// Skripsi Dosen
$route['dsn/dashboard/data-pengajuan-skripsi'] = 'backend/dosen/Skripsi';
$route['dsn/dashboard/ploting-dosen-sempro'] = 'backend/dosen/Skripsi/PlotingDosenSempro';
$route['dsn/dashboard/data-sempro-skripsi'] = 'backend/dosen/Skripsi/DataSemproSkripsi';
$route['dsn/dashboard/jadwal-sempro-skripsi/(:any)'] = 'backend/dosen/Skripsi/JadwalSempro/$1';
$route['dsn/dashboard/save-jadwal-sempro'] = 'backend/dosen/Skripsi/SaveJadwalSempro';
$route['dsn/dashboard/detail-hasil-sempro/(:any)'] = 'backend/dosen/Skripsi/DetailHasilSempro/$1';
$route['dsn/dashboard/autocom'] = 'backend/dosen/Skripsi/get_autocomplete';


// skripsi umum
$route['dsn/dashboard/pelaksanaan-sempro'] = 'backend/umum/Skripsi';
$route['dsn/dashboard/proses-sempro/(:any)'] = 'backend/umum/Skripsi/ProsesSempro/$1';
$route['dsn/dashboard/save-feedback'] = 'backend/umum/Skripsi/SaveFeedbackSubmission';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
