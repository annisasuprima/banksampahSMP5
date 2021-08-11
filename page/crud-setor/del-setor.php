<?php 

include('../../template/header.php');

$kode_setor = $_GET['kode_setor'];
$result2 = mysqli_query($conn, "SELECT * from setor  JOIN tabungan ON setor.kode_tabungan=tabungan.kode_tabungan where kode_setor=".$kode_setor);
$user_data = mysqli_fetch_array($result2);
  

$saldo = $user_data['saldo'];
$quantity =$user_data['quantity'];
$harga =$user_data['harga'];
$kode_tabungan = $user_data['kode_tabungan'];
$total = $saldo - ($quantity * $harga);

$result3 = mysqli_query($conn, "UPDATE tabungan SET saldo='$total' WHERE kode_tabungan='$kode_tabungan'");
$result = mysqli_query($conn, "DELETE FROM setor WHERE kode_setor=".$kode_setor);

if($result){
  echo "<script>alert('Data Berhasil Dihapus'); 
  window.location = 'setor.php';</script>";
  } else {
  echo "<script>alert('Data Gagal Dihapus'); 
  window.location = 'setor.php';</script>";
  }

 ?>