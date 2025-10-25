<?php

include "koneksi.php";

$nik                = $_POST['nik'];
$nama               = $_POST['nama'];
$tempat_lahir       = $_POST['tempat_lahir'];
$tgl_lahir          = $_POST['tgl_lahir'];
$gol_darah          = $_POST['gol_darah'];
$jenis_kelamin      = $_POST['jenis_kelamin'];
$alamat             = $_POST['alamat'];
$rt                 = $_POST['rt'];
$rw                 = $_POST['rw'];
$kelurahan          = $_POST['kelurahan'];
$kecamatan          = $_POST['kecamatan'];
$agama              = $_POST['agama'];
$status_perkawinan  = $_POST['status']; 
$pekerjaan          = $_POST['pekerjaan'];
$kewarganegaraan    = $_POST['kewarganegaraan'];
$masa_berlaku       = $_POST['masa_berlaku'];

$sql = "INSERT INTO data_ktp 
        (nik, nama, tempat_lahir, tgl_lahir, jenis_kelamin, gol_darah, alamat, rt, rw, kelurahan, kecamatan, agama, status_perkawinan, pekerjaan, kewarganegaraan, masa_berlaku) 
        VALUES 
        (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, query: $sql);

if (!$stmt) {
    die("Query preparation failed: " . mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt, "ssssssssssssssss", 
    $nik, $nama, $tempat_lahir, $tgl_lahir, $jenis_kelamin, $gol_darah, 
    $alamat, $rt, $rw, $kelurahan, $kecamatan, $agama, 
    $status_perkawinan, $pekerjaan, $kewarganegaraan, $masa_berlaku
);
if (mysqli_stmt_execute($stmt)) {
    
    header("Location: tabel_ktp.php");
    exit(); 
} else {
    
    echo "Error: " . mysqli_stmt_error($stmt);
}
mysqli_stmt_close($stmt);
mysqli_close($conn);

?>