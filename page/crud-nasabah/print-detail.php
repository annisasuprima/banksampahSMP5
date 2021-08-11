<!DOCTYPE html>
<html>
  <?php
  
  session_start();

  if (!isset($_SESSION['jenis'])) {
    header('Location: ../../login-nasabah.php');
  };
  
  include('../../template/header.php');
  // include('../../template/sidebar.php');
  
  
 ?>

<?php
		$kode = $_GET['kode'];
		$result = mysqli_query($conn, "SELECT * FROM  nasabah WHERE kode=".$kode);
		$user_data = mysqli_fetch_array($result);
	?>
  
	<!-- end navbar-->
	<div class="badan">	
	<!-- Ini SideBar  -->

  <!-- end SideBar-->	
  

      <form action="" method="post" enctype="multipart/form-data">
        <div class="content">
          <div class="page-inner">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Data Nasabah</div>
                  </div>
                  <div class="card-body">
                    <div class="row">

                      <div class="col-12 col-md-12">
                        <!-- <label class="mb-3"><b>Isi Data</b></label> -->
                        <div class="form-group form-group-default">
                          <label>Kode Nasabah</label>
                          <input id="kode" name="kode" type="text" class="form-control" placeholder="masukkan kode" value="<?php echo $user_data['kode'];?>" readonly>
                        </div>

                        <div class="form-group form-group-default">
                          <label>Nama Kelas</label>
                          <input id="nama_kelas" name="nama_kelas" type="text" class="form-control" placeholder="masukkan nama kelas" required value="<?php echo $user_data['nama_kelas'];?>">
                        </div>

                        <div class="form-group form-group-default">
                          <label>Jumlah Siswa</label>
                          <input id="jumlah_siswa" name="jumlah_siswa" type="text" class="form-control" placeholder="masukkan jumlah siswa" required value="<?php echo $user_data['jumlah_siswa'];?>">
                        </div>

                        <div class="form-group form-group-default">
                          <label>Angkatan</label>
                          <input id="angkatan" name="angkatan" type="text" class="form-control" placeholder="masukkan angkatan" required value="<?php echo $user_data['angkatan'];?>">
                        </div>

                        <div class="form-group form-group-default">
                          <label>Nama Wali Kelas</label>
                          <input id="nama_wali_kelas" name="nama_wali_kelas" type="text" class="form-control" placeholder="masukkan Nama wali Kelas" required value="<?php echo $user_data['nama_wali_kelas'];?>">
                        </div>


                        <div class="form-group form-group-default">
                          <label>Username</label>
                          <input id="username" name="username" type="text" class="form-control" placeholder="masukkan username" required value="<?php echo $user_data['username'];?>">
                        </div>

                        <div class="form-group form-group-default">
                          <label>Password</label>
                          <div style="display: flex; ">
                          <input id="password" name="password" type="text" class="form-control" placeholder="masukkan password" required value="<?php echo $user_data['password'];?>">
                          </div>
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


  <script>
    window.print();
  </script>


</body>
</html>