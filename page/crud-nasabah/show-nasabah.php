
<?php
include('../../template/header.php');
include('../../template/sidebar.php');

		$kode = $_GET['kode'];
		$result = mysqli_query($conn, "SELECT * FROM  nasabah WHERE kode=".$kode);
    $user_data = mysqli_fetch_array($result);

    
    
	?>
  
