<?php 
include ("function.php");

  if (isset($_GET['kode_sampah'])) {
    if ($_GET['kode_sampah']) {
      echo GetHargaSampah($_GET['kode_sampah']);
    } else {
      echo 0;
    }
  } 

?>