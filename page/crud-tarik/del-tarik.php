<?php 

include('../../template/header.php');

$kode_tarik = $_GET['kode_tarik'];
$result2 = mysqli_query($conn, "SELECT * from tarik  JOIN tabungan ON tarik.kode_tabungan=tabungan.kode_tabungan where kode_tarik=".$kode_tarik);
$user_data = mysqli_fetch_array($result2);
  

$saldo = $user_data['saldo'];
$jumlah_tarik = $user_data['jumlah_tarik'];
$kode_tabungan = $user_data['kode_tabungan'];
$total = $saldo + ($jumlah_tarik);

$result3 = mysqli_query($conn, "UPDATE tabungan SET saldo='$total' WHERE kode_tabungan='$kode_tabungan'");


// $result3 = mysqli_query($conn, "UPDATE tabungan SET saldo='$total' WHERE kode_tabungan='$kode_tabungan'");
$result = mysqli_query($conn, "DELETE FROM tarik WHERE kode_tarik=".$kode_tarik);

if($result){
  echo "<script>alert('Data Berhasil Dihapus'); 
  window.location = 'tarik.php';</script>";
  } else {
  echo "<script>alert('Data Gagal Dihapus'); 
  window.location = 'tarik.php';</script>";
  }

 ?>