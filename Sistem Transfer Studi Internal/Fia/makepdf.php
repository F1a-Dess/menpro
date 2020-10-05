<?php
require_once __DIR__ . '/vendor/autoload.php';


$nama = $_POST['nama'];
$nim = $_POST['nim'];
$alamat = $_POST['alamat'];
$kota = $_POST['kota'];
$nohp = $_POST['nohp'];
$takademik = $_POST['takademik'];

$semester = $_POST['ganjil'];
$semester = $_POST['genap'];

$pasal = $_POST['SI'];
$pasal = $_POST['GT'];
$pasal = $_POST['TI'];
$pasal = $_POST['ASKI'];

$ptujuan = $_POST['SI'];
$ptujuan = $_POST['GT'];
$ptujuan = $_POST['TI'];
$ptujuan = $_POST['AKSI'];

$mpdf = new \Mpdf\Mpdf();



$data ='';


$data .= '<h2>Data Anda</h2>';


$data .= '<strong>Nama</strong> ' . $nama . '<br />';
$data .= '<strong>NIM</strong> ' . $nim . '<br />';
$data .= '<strong>Alamat(KTP)</strong> ' . $alamat . '<br />';
$data .= '<strong>Kota</strong> ' . $kota . '<br />';
$data .= '<strong>No Handphone</strong> ' . $nohp . '<br />';
$data .= '<strong>Tahun Akademik</strong> ' . $takademik . '<br />';

$data .= '<strong>Semester</strong> ' . $semester . '<br />';

$data .= '<strong>Prodgi Asal</strong> ' . $pasal . '<br />';

$data .= '<strong>Prodgi Tujuan</strong> ' . $ptujuan . '<br />';


$mpdf->WriteHTML($data);

$mpdf->Output('test.pdf', 'D'); 