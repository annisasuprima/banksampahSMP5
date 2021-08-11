<?php 


include('template/header.php');
session_start();
$_SESSION['jenis'] = NULL;
session_destroy();


header('Location: login-nasabah.php');
exit;

?>