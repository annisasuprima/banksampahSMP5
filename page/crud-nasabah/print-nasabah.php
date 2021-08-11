<!DOCTYPE html>
<html>

<?php 


session_start();

if (!isset($_SESSION['jenis'])) {
	header('Location: ../../login-nasabah.php');
};

include('../../template/header.php');




if (isset($_GET['kode'])) {
  $kode = $_GET['kode'];
  $result = mysqli_query($conn, "SELECT * FROM  nasabah WHERE kode=" . $kode);

  $user_data = mysqli_fetch_array($result);
}


?>

<head>
  <title>Data Nasabah di SMPN 5 Kubung</title>
</head>

<body>
  <fieldset>
    <legend>
      <h1><b>Data Nasabah di SMPN 5 Kubung</b></h1>
    </legend>
    <table border="1" >
      <tr>
        <th style="padding:5px">Kode</th>
        <th style="padding:5px">Nama Kelas</th>
        <th style="padding:5px">Jumlah Siswa</th>
        <th style="padding:5px">Angkatan</th>
        <th style="padding:5px">Nama Wali Kelas</th>
        <th style="padding:5px">Username</th>
        <th style="padding:5px">Password</th>

      </tr>
      <tr>
        <?php

        $conn = mysqli_connect("localhost", "root", "", "banksampahsmp5") or die("koneksi gagal");

        $hasil = mysqli_query($conn, "select * from nasabah");
        while ($user_data = $hasil->fetch_assoc()) {
        ?>
        <tr>
        <td><?php echo $user_data['kode']; ?></td>
        <td><?php echo $user_data['nama_kelas']; ?></td>
        <td><?php echo $user_data['jumlah_siswa']; ?></td>
        <td><?php echo $user_data['angkatan']; ?></td>
        <td><?php echo $user_data['nama_wali_kelas']; ?></td>
        <td><?php echo $user_data['username']; ?></td>
        <td><?php echo $user_data['password']; ?></td>

      <?php
        }
      ?>
    </table>
    <?php
    $data = mysqli_num_rows($hasil);
    echo "jumlah data : $data";
    ?>
  </fieldset>

  <script>
    window.print();
  </script>

</body>

</html>