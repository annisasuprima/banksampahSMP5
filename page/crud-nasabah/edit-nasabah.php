<!DOCTYPE html>
<html>
<?php

session_start();

if (!isset($_SESSION['jenis'])) {
  header('Location: ../../login-nasabah.php');
};

include('../../template/header.php');
include('../../template/sidebar.php');



?>

<?php
$kode = $_GET['kode'];
$result = mysqli_query($conn, "SELECT * FROM  nasabah WHERE kode=" . $kode);
$user_data = mysqli_fetch_array($result);
?>

<?php

if (isset($_POST['edit'])) {
  $kode = $_POST['kode'];
  $nama_kelas = $_POST['nama_kelas'];
  $jumlah_siswa = $_POST['jumlah_siswa'];
  $angkatan = $_POST['angkatan'];
  $nama_wali_kelas = $_POST['nama_wali_kelas'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = mysqli_query($conn, "UPDATE nasabah SET nama_kelas='$nama_kelas', jumlah_siswa='$jumlah_siswa', angkatan='$angkatan', nama_wali_kelas='$nama_wali_kelas', username='$username', password='$password' WHERE kode='$kode'");


  // header('Location: nasabah.php');


  if ($query) {
    echo "<script>alert('Data Berhasil Diubah'); 
    window.location = 'nasabah.php';</script>";
  } else {
    echo "<script>alert('Data Gagal Diubah'); 
    window.location = 'edit-nasabah.php';</script>";
  }
};

?>

<!-- end navbar-->
<!-- Ini SideBar  -->
<!-- end SideBar-->

<div class="main-panel">
  <form action="" method="post">
    <div class="content">
      <div class="page-inner">
        <div class="page-header">
          <h4 class="page-title">Forms</h4>
          <ul class="breadcrumbs">
            <li class="nav-home">
              <a href="#">
                <i class="flaticon-home"></i>
              </a>
            </li>
            <li class="separator">
              <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
              <a href="#">Forms</a>
            </li>
            <li class="separator">
              <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
              <a href="#">Basic Form</a>
            </li>
          </ul>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="card-title">Edit Data Nasabah</div>
              </div>
              <div class="card-body">
                <div class="row">

                  <div class="col-12 col-md-12">
                    <!-- <label class="mb-3"><b>Isi Data</b></label> -->
                    <div class="form-group form-group-default">
                      <label>Kode Nasabah</label>
                      <input id="kode" name="kode" type="text" class="form-control" placeholder="masukkan kode" value="<?php echo $user_data['kode']; ?>" readonly>
                    </div>

                    <div class="form-group form-group-default">
                      <label>Nama Kelas</label>
                      <input id="nama_kelas" name="nama_kelas" type="text" class="form-control" placeholder="masukkan nama kelas" required value="<?php echo $user_data['nama_kelas']; ?>">
                    </div>

                    <div class="form-group form-group-default">
                      <label>Jumlah Siswa</label>
                      <input id="jumlah_siswa" name="jumlah_siswa" type="text" class="form-control" placeholder="masukkan jumlah siswa" required value="<?php echo $user_data['jumlah_siswa']; ?>">
                    </div>

                    <div class="form-group form-group-default">
                      <label>Angkatan</label>
                      <input id="angkatan" name="angkatan" type="text" class="form-control" placeholder="masukkan angkatan" required value="<?php echo $user_data['angkatan']; ?>">
                    </div>

                    <div class="form-group form-group-default">
                      <label>Nama Wali Kelas</label>
                      <input id="nama_wali_kelas" name="nama_wali_kelas" type="text" class="form-control" placeholder="masukkan Nama wali Kelas" required value="<?php echo $user_data['nama_wali_kelas']; ?>">
                    </div>


                    <div class="form-group form-group-default">
                      <label>Username</label>
                      <input id="username" name="username" type="text" class="form-control" placeholder="masukkan username" required value="<?php echo $user_data['username']; ?>">
                    </div>

                    <div class="form-group form-group-default">
                      <label>Password</label>
                      <div style="display: flex; ">
                        <input id="password" name="password" type="password" class="form-control" placeholder="masukkan password" required value="<?php echo $user_data['password']; ?>">
                        <span id=showPassword style="background-color:rgba(0,0,0,0.5); box-shadow:unset; background:unset;border:unset;" data-toggle="tooltip" title="Lihat Password"><i id="icon" class="fa fa-eye-slash"></i></span>
                      </div>
                    </div>

                    <div class="field" style="display: flex; justify-content: flex-end; padding: 1rem;">
                      <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
                    </div>


                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </form>
</div>
</div>


<script>
  var showPassword = document.getElementById('showPassword')
  var password = document.getElementById('password')
  var icon = document.querySelector('#showPassword i')


  showPassword.addEventListener('click', function(e) {
    if (password.type === 'password') {
      password.setAttribute('type', 'text')
      icon.classList.remove('fa-eye-slash')
      icon.classList.add('fa-eye')
    } else {
      password.setAttribute('type', 'password')
      icon.classList.remove('fa-eye')

      icon.classList.add('fa-eye-slash')

    }

  })
</script>

<!--   Core JS Files   -->
<script src="../../assets/js/core/jquery.3.2.1.min.js"></script>
<script src="../../assets/js/core/popper.min.js"></script>
<script src="../../assets/js/core/bootstrap.min.js"></script>
<!-- jQuery UI -->
<script src="../../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="../../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<!-- Datatables -->
<script src="../../assets/js/plugin/datatables/datatables.min.js"></script>
<!-- Atlantis JS -->
<script src="../../assets/js/atlantis.min.js"></script>
<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="../../assets/js/setting-demo2.js"></script>
</body>

</html>