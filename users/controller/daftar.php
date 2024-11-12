<?php
include '../../admin/inc/connection.php';

$nama_lengkap = $_POST['nama_lengkap'];
$nik = $_POST['nik'];
$kartu_keluarga = $_POST['kartu_keluarga'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$pendidikan_terakhir = $_POST['pendidikan_terakhir'];
$nama_sekolah = $_POST['nama_sekolah'];
$nomor_hp = $_POST['nomor_hp'];
$email = $_POST['email'];
$aktivitas_saat_ini = $_POST['aktivitas_saat_ini'];
$jurusan = $_POST['jurusan'];
$id_gelombang = $_POST['aktif'];
$kejuruan = $_POST['kejuruan'];


$queryDaftar = mysqli_query($connection, "INSERT INTO peserta_pelatihan(kejuruan,id_gelombang,nama_lengkap,nik,kartu_keluarga,jenis_kelamin,tempat_lahir,tanggal_lahir,pendidikan_terakhir,nama_sekolah,id_jurusan,nomor_hp,email,aktivitas_saat_ini) VALUES ('$kejuruan','$id_gelombang','$nama_lengkap','$nik','$kartu_keluarga','$jenis_kelamin','$tempat_lahir','$tanggal_lahir','$pendidikan_terakhir','$nama_sekolah','$jurusan','$nomor_hp','$email','$aktivitas_saat_ini')");

header('location:../index.php?daftar=berhasil');
