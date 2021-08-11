<?php


session_start();

if (!isset($_SESSION['jenis'])) {
	header('Location: ../../login-nasabah.php');
};

include('../../template/header.php');
include('../../template/sidebar.php');

$result = mysqli_query($conn, "SELECT * FROM  jenis_sampah");


if (isset($_POST['tambah'])) {
  // $kode_sampah = $_POST['kode_sampah'];
  $kode_jenis  = $_POST['kode_jenis'];
  $nama_sampah = $_POST['nama_sampah'];
  $harga = $_POST['harga'];
  $satuan = $_POST['satuan'];


  $query = mysqli_query($conn, "INSERT INTO sampah (kode_jenis,nama_sampah,harga,satuan) VALUE ('$kode_jenis','$nama_sampah','$harga','$satuan')");

  
  // header('Location: nasabah.php');


  if ($query) {
    echo "<script>alert('Data Berhasil Ditambahkan'); 
    window.location = 'sampah.php';</script>";
  } else {
    echo "<script>alert('Data Gagal Ditambahkan'); 
    window.location = 'tambah-sampah.php';</script>";
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
                    <div class="card-title">Tambah Data Sampah</div>
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
                          <td><label>Jenis Sampah</label></td>
                          <td>
                            <select class="form-control" id="kode_jenis" name="kode_jenis" required>
                              <?php
                              while ($user_data = mysqli_fetch_array($result)) {
                              ?>
                                <option value="<?php echo $user_data['kode_jenis'] ?>"><?php echo $user_data['nama_jenis'] ?></option>

                              <?php
                              }
                              ?>
                            </select>
                          </td>
                        </div>

                        <div class="form-group form-group-default">
                          <label>Nama Sampah</label>
                          <input id="nama_sampah" name="nama_sampah" type="text" class="form-control" placeholder="masukkan nama sampah" required>
                        </div>

                        <div class="form-group form-group-default">
                          <label>Harga</label>
                          <input id="harga" name="harga" type="text" class="form-control" placeholder="masukkan harga sampah" required>
                        </div>

                        <div class="form-group form-group-default">
                          <label>Satuan (Kg)</label>
                          <input id="satuan" name="satuan" type="text" class="form-control" placeholder="masukkan satauan sampah" required>
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

  <?php 
include('../../template/footer.php') 
?>


</body>