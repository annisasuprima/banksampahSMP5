<?php 

function GetSaldo ($kode) {
  $conn = mysqli_connect('localhost','root','','banksampahsmp5','3306');
  $kode = $kode;
   
	$result = mysqli_query($conn, "SELECT * FROM  tabungan WHERE kode=".$kode);
  $user_data = mysqli_fetch_array($result);
  
  // var_dump($user_data['saldo']);
  // die();
  return $user_data['saldo'];

 }

?>