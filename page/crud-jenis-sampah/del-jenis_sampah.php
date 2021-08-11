<?php 

include('../../template/header.php');

$kode_jenis = $_GET['kode_jenis'];

$result = mysqli_query($conn, "DELETE FROM jenis_sampah WHERE kode_jenis=".$kode_jenis);

if($result){
  echo "<script>alert('Data Berhasil Dihapus'); 
  window.location = 'jenis_sampah.php';</script>";
  } else {
  echo "<script>alert('Data Gagal Dihapus'); 
  window.location = 'jenis_sampah.php';</script>";
  }

 ?>