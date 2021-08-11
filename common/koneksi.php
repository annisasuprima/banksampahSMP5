<?php 
    
    $conn = mysqli_connect('localhost','root','','banksampahsmp5','3306');

    if (mysqli_connect_errno()) {
        echo "Koneksi Gagal :" . mysqli_connect_errno(); 
    } 