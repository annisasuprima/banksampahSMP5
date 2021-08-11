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
		$kode_jenis = $_GET['kode_jenis'];
		$result = mysqli_query($conn, "SELECT * FROM  jenis_sampah WHERE kode_jenis=".$kode_jenis);
		$user_data = mysqli_fetch_array($result);
	?>
  
<?php

if (isset($_POST['edit'])) {
  $kode_jenis = $_POST['kode_jenis'];
  $nama_jenis = $_POST['nama_jenis'];
  

  $query = mysqli_query($conn, "UPDATE jenis_sampah SET nama_jenis='$nama_jenis' WHERE kode_jenis='$kode_jenis'");


// header('Location: nasabah.php');


  if($query){
    echo "<script>alert('Data Berhasil Diubah'); 
    window.location = 'jenis_sampah.php';</script>";
    } else {
    echo "<script>alert('Data Gagal Diubah'); 
    window.location = 'edit-jenis_sampah.php';</script>";
    }	
};

    ?>
        
	<!-- end navbar-->
	<div class="badan">	
	<!-- Ini SideBar  -->
	<?php include('../../template/sidebar.php')?>
  <!-- end SideBar-->	
  
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
                    <div class="card-title">Edit Data Jenis Sampah</div>
                  </div>
                  <div class="card-body">
                    <div class="row">

                      <div class="col-12 col-md-12">
                        <!-- <label class="mb-3"><b>Isi Data</b></label> -->
                        <div class="form-group form-group-default">
                          <label>Kode Jenis</label>
                          <input id="kode_jenis" name="kode_jenis" type="text" class="form-control" placeholder="masukkan kode" value="<?php echo $user_data['kode_jenis'];?>" readonly>
                        </div>

                        <div class="form-group form-group-default">
                          <label>Nama Jenis Sampah</label>
                          <input id="nama_jenis" name="nama_jenis" type="text" class="form-control" value="<?php echo $user_data['nama_jenis'];?>">
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