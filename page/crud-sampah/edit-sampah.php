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
		$kode_sampah = $_GET['kode_sampah'];
		$result = mysqli_query($conn, "SELECT * FROM  sampah WHERE kode_sampah=".$kode_sampah);
    $user_data = mysqli_fetch_array($result);

    
    $result2 = mysqli_query($conn, "SELECT * FROM  jenis_sampah");
  

	?>
  
<?php

if (isset($_POST['edit'])) {
  $kode_sampah = $_POST['kode_sampah'];
  $kode_jenis = $_POST['kode_jenis'];
  $nama_sampah = $_POST['nama_sampah'];
  $harga = $_POST['harga'];
  $satuan = $_POST['satuan'];
 

  $query = mysqli_query($conn, "UPDATE sampah SET nama_sampah='$nama_sampah', harga='$harga', satuan='$satuan' WHERE kode_sampah='$kode_sampah'");


// header('Location: nasabah.php');


  if($query){
    echo "<script>alert('Data Berhasil Diubah'); 
    window.location = 'sampah.php';</script>";
    } else {
    echo "<script>alert('Data Gagal Diubah'); 
    window.location = 'edit-sampah.php';</script>";
    }	
};

    ?>

  
  <div class="main-panel">
      <form action="" method="post" enctype="multipart/form-data">
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
                    <div class="card-title">Edit Data Sampah</div>
                  </div>
                  <div class="card-body">
                    <div class="row">

                      <div class="col-12 col-md-12">
                        <!-- <label class="mb-3"><b>Isi Data</b></label> -->
                        <div class="form-group form-group-default">
                          <label>Kode Sampah</label>
                          <input id="kode_sampah" name="kode_sampah" type="text" class="form-control"  value="<?php echo $user_data['kode_sampah'];?>" readonly>
                        </div>

                        <div class="form-group form-group-default">
                          <label>Kode Jenis</label>
                          <input id="kode_jenis" name="kode_jenis" type="text" class="form-control" value="<?php echo $user_data['kode_jenis'];?>" readonly>
                        </div>

                        <div class="form-group form-group-default">
                          <td><label>Jenis Sampah</label></td>
                          <td>
                            <select class="form-control" id="kode_jenis" name="kode_jenis" required>
                              <?php
                              while ($user_data2 = mysqli_fetch_array($result2)) {
                              ?>
                                <option value="<?php echo $user_data['kode_jenis'] ?>"><?php echo $user_data2['nama_jenis'] ?></option>

                              <?php
                              }
                              ?>
                            </select>
                          </td>
                        </div>

                        <div class="form-group form-group-default">
                          <label>Nama Sampah</label>
                          <input id="nama_sampah" name="nama_sampah" type="text" class="form-control" value="<?php echo $user_data['nama_sampah'];?>">
                        </div>

                        <div class="form-group form-group-default">
                          <label>Harga</label>
                          <input id="harga" name="harga" type="text" class="form-control" value="<?php echo $user_data['harga'];?>">
                        </div>

                        <div class="form-group form-group-default">
                          <label>Satuan (Kg)</label>
                          <input id="satuan" name="satuan" type="text" class="form-control" value="<?php echo $user_data['satuan'];?>">
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


  <?php 
include('../../template/footer.php') 
?>
</body>
</html>