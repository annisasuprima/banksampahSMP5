<?php 
include ("function.php");

  if (isset($_GET['kode'])) {
    if ($_GET['kode']) {
      echo GetSaldo($_GET['kode']);
    } else {
      echo 0;
    }
  } 

?>