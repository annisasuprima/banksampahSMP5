<?php 

include('../../template/header.php');

$username = $_GET['username'];

$result = mysqli_query($conn, "DELETE FROM admin WHERE username='".$username . "'");


if($result){
  echo "<script>alert('Data Berhasil Dihapus'); 
  window.location = 'kelola-user.php';</script>";
  } else {
  echo "<script>alert('Data Gagal Dihapus'); 
  window.location = 'kelola-user.php';</script>";
  }

 ?>