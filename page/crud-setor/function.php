<?php 

function GetHargaSampah ($kode) {
  $conn = mysqli_connect('localhost','root','','banksampahsmp5','3306');
  $kode_sampah = $kode;
   
	$result = mysqli_query($conn, "SELECT * FROM  sampah WHERE kode_sampah=".$kode_sampah);
  $user_data = mysqli_fetch_array($result);

  return $user_data['harga'];
 }

 

?>