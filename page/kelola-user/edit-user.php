<!DOCTYPE html>
<html>
  <?php
  
  session_start();

  if (!isset($_SESSION['jenis'])) {
    header('Location: ../../login-nasabah.php');
  };
  
  include('../../template/header.php');

  
 ?>
 
<?php
    $username = $_GET['username'];
    
		$result = mysqli_query($conn, "SELECT * FROM  admin WHERE username='".$username . "'");
		$user_data = mysqli_fetch_array($result);  
	?>
  
<?php

if (isset($_POST['edit'])) {
  
  $username = $_POST['username'];
  $password = $_POST['password'];
  $nama     = $_POST['nama'];
  

  $query = mysqli_query($conn, "UPDATE admin SET password='$password', nama='$nama' WHERE username='$username'");


// header('Location: nasabah.php');


  if($query){
    echo "<script>alert('Data Berhasil Diubah'); 
    window.location = 'kelola-user.php';</script>";
    } else {
    echo "<script>alert('Data Gagal Diubah'); 
    window.location = 'edit-user.php';</script>";
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
              <h4 class="page-title">Edit Admin</h4>
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
                    <div class="card-title">Edit Data Admin</div>
                  </div>
                  <div class="card-body">
                    <div class="row">

                      <div class="col-12 col-md-12">
                        <!-- <label class="mb-3"><b>Isi Data</b></label> -->
                  

                        <div class="form-group form-group-default">
                          <label>Username</label>
                          <input id="username" name="username" type="text" class="form-control" placeholder="masukkan username" readonly required value="<?php echo $user_data['username'];?> ">
                        </div>

                        <div class="form-group form-group-default">
                          <label>Password</label>
                          <div style="display: flex; ">
                          <input id="password" name="password" type="password" class="form-control" placeholder="masukkan password" required value="<?php echo $user_data['password'];?>">
                          <span id=showPassword style="background-color:rgba(0,0,0,0.5); box-shadow:unset; background:unset;border:unset;" data-toggle="tooltip" title="Lihat Password"><i id="icon" class="fa fa-eye-slash"></i></span>
                        </div>
                            </div>

                            <div class="form-group form-group-default">
                          <label>nama</label>
                          <input id="nama" name="nama" type="text" class="form-control" placeholder="masukkan nama admin" required value="<?php echo $user_data['nama'];?> ">
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

</body>
</html>