<?php


session_start();

if (!isset($_SESSION['jenis'])) {
  header('Location: ../../login-nasabah.php');
};

include('../../template/header.php');
include('../../template/sidebar.php');


if (isset($_POST['tambah'])) {
  // $kode = $_POST['kode'];
  $nama_kelas = $_POST['nama_kelas'];
  $jumlah_siswa = $_POST['jumlah_siswa'];
  $angkatan = $_POST['angkatan'];
  $nama_wali_kelas = $_POST['nama_wali_kelas'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = mysqli_query($conn, "INSERT INTO nasabah (nama_kelas,jumlah_siswa,angkatan,nama_wali_kelas,username,password) VALUE ('$nama_kelas','$jumlah_siswa','$angkatan','$nama_wali_kelas','$username','$password')");
  $query = mysqli_query($conn, "INSERT INTO tabungan (kode,saldo) VALUE ('$conn->insert_id','0')");
  // header('Location: nasabah.php');


  if ($query) {
    echo "<script>alert('Data Berhasil Ditambahkan'); 
    window.location = 'nasabah.php';</script>";
  } else {
    echo "<script>alert('Data Gagal Ditambahkan'); 
    window.location = 'tambah-nasabah.php';</script>";
  }
};

?>
<!-- end navbar-->

<body>

  <div class="wrapper">
    <div class="main-panel">

      <form action="" method="post">
        <div class="content">
          <div class="page-inner">
            <div class="page-header">
              <h4 class="page-title">Data Nasabah</h4>
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
                  <a href="#">Tables</a>
                </li>
                <li class="separator">
                  <i class="flaticon-right-arrow"></i>
                </li>

              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Tambah Nasabah</div>
                  </div>
                  <div class="card-body">
                    <div class="row">

                      <div class="col-12 col-md-12">
                        <!-- <label class="mb-3"><b>Isi Data</b></label> -->
                        <!-- <div class="form-group form-group-default">
                        <label>Kode Nasabah</label>
                        <input id="kode" name="kode" type="text" class="form-control" placeholder="masukkan kode">
                      </div> -->

                        <div class="form-group form-group-default">
                          <label>Nama Kelas</label>
                          <input id="nama_kelas" name="nama_kelas" type="text" class="form-control" placeholder="masukkan nama kelas" required>
                        </div>

                        <div class="form-group form-group-default">
                          <label>Jumlah Siswa</label>
                          <input id="jumlah_siswa" name="jumlah_siswa" type="number" class="form-control" placeholder="masukkan jumlah siswa" required>
                        </div>

                        <div class="form-group form-group-default">
                          <label>Angkatan</label>
                          <input id="angkatan" name="angkatan" type="text" class="form-control" placeholder="masukkan angkatan" required>
                        </div>


                        <div class="form-group form-group-default">
                          <label>Nama Wali Kelas</label>
                          <input id="nama_wali_kelas" name="nama_wali_kelas" type="text" class="form-control" placeholder="masukkan Nama Wali Kelas" required>
                        </div>



                        <div class="form-group form-group-default">
                          <label>Username</label>
                          <input id="username" name="username" type="text" class="form-control" placeholder="masukkan username" required>
                        </div>

                        <div class="form-group form-group-default">
                          <label>Password</label>
                          <div style="display: flex; ">
                            <input id="password" name="password" type="password" class="form-control" placeholder="masukkan password" required>
                            <span id=showPassword style="background-color:rgba(0,0,0,0.5); box-shadow:unset; background:unset;border:unset;" data-toggle="tooltip" title="Lihat Password"><i id="icon" class="fa fa-eye-slash"></i></span>
                          </div>
                        </div>


                        <div class="field" style="display: flex; justify-content: flex-end; padding: 1rem;">
                          <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
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
<?php
include('../../template/footer.php');

?>
</body>

</html>
