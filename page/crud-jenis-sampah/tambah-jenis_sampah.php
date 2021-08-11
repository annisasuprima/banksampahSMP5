<?php


session_start();

if (!isset($_SESSION['jenis'])) {
	header('Location: ../../login-nasabah.php');
};

include('../../template/header.php');
include('../../template/sidebar.php');




if (isset($_POST['tambah'])) {
  $kode_jenis = $_POST['kode_jenis'];
  $nama_jenis = $_POST['nama_jenis'];


  $query = mysqli_query($conn, "INSERT INTO jenis_sampah (kode_jenis,nama_jenis) VALUE ('$kode_jenis','$nama_jenis')");
  // header('Location: nasabah.php');


  if ($query) {
    echo "<script>alert('Data Berhasil Ditambahkan'); 
    window.location = 'jenis_sampah.php';</script>";
  } else {
    echo "<script>alert('Data Gagal Ditambahkan'); 
    window.location = 'tambah-jenis_sampah.php';</script>";
  }
};

?>
<!-- end navbar-->

<body>

  <div class="wrapper">
    <div class="main-panel">

    <form action="" method="post" enctype="multipart/form-data">
      <div class="content">
        <div class="page-inner">
          <div class="page-header">
            <h4 class="page-title">Data Jenis Sampah</h4>
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
                  <div class="card-title">Tambah Jenis Sampah</div>
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
                        <label>Jenis Sampah</label>
                        <input id="nama_jenis" name="nama_jenis" type="text" class="form-control" placeholder="masukkan jenis sampah" required>
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

<?php include('../../template/footer.php') ?>


</body>