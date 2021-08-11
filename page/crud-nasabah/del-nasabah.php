<?php 

include('../../template/header.php');

$kode = $_GET['kode'];

$result = mysqli_query($conn, "DELETE FROM nasabah WHERE kode=".$kode);


if($result){
  echo "<script>alert('Data Berhasil Dihapus'); 
  window.location = 'nasabah.php';</script>";
  } else {
  echo "<script>alert('Data Gagal Dihapus'); 
  window.location = 'nasabah.php';</script>";
  }

 ?>