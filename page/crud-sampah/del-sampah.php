<?php 

include('../../template/header.php');

$kode_sampah = $_GET['kode_sampah'];

$result = mysqli_query($conn, "DELETE FROM sampah WHERE kode_sampah=".$kode_sampah);

if($result){
  echo "<script>alert('Data Berhasil Dihapus'); 
  window.location = 'sampah.php';</script>";
  } else {
  echo "<script>alert('Data Gagal Dihapus'); 
  window.location = 'sampah.php';</script>";
  }

 ?>