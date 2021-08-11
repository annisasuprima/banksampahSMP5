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
$kode_setor = $_GET['kode_setor'];
$result = mysqli_query($conn, "SELECT * FROM  setor WHERE kode_setor=" . $kode_setor);
$user_data = mysqli_fetch_array($result);


$result2 = mysqli_query($conn, "SELECT * FROM  nasabah");
$result3 = mysqli_query($conn, "SELECT * FROM  sampah");
$result4 = mysqli_query($conn, "SELECT * FROM  tabungan");


?>

<?php

if (isset($_POST['edit'])) {
  // $kode_setor = $_POST['kode_setor'];
  $kode_sampah = $_POST['kode_sampah'];
  $kode = $_POST['kode'];
  // $kode_tabungan = $_POST['kode_tabungan'];
  $tgl_setor = $_POST['tgl_setor'];
  $quantity = $_POST['quantity'];
  $harga = $_POST['harga'];

  
  $result3 = mysqli_query($conn, "SELECT * from tabungan where kode=".$kode);
  $user_data = mysqli_fetch_array($result3);
  
  $saldo =$user_data['saldo'];
  $kode_tabungan =$user_data['kode_tabungan'];
 
  $query = mysqli_query($conn, "UPDATE setor SET tgl_setor='$tgl_setor', quantity='$quantity', harga='$harga' WHERE kode_setor='$kode_setor'");


  $total = $saldo - ($quantity * $harga) + ($quantity * $harga) ;
 
  $query2 = mysqli_query($conn, "UPDATE tabungan SET saldo='$total' WHERE kode_tabungan='$kode_tabungan'");




  // header('Location: nasabah.php');


  if ($query) {
    echo "<script>alert('Data Berhasil Diubah'); 
    window.location = 'setor.php';</script>";
  } else {
    echo "<script>alert('Data Gagal Diubah'); 
    window.location = 'edit-setor.php';</script>";
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
                        <td><label>Nama Kelas</label></td>
                        <td>
                          <select class="form-control" id="kode" name="kode" required>
                            <?php
                            while ($user_data1 = mysqli_fetch_array($result2)) {
                            ?>
                              <option value="<?php echo $user_data1['kode'] ?>"><?php echo $user_data1['nama_kelas'] ?></option>

                            <?php
                            }
                            ?>
                          </select>
                        </td>
                      </div>

                      <div class="form-group form-group-default">
                        <td><label>Nama Sampah</label></td>
                        <td>
                          <select class="form-control" id="kode_sampah" name="kode_sampah" required>
                            <?php
                            while ($user_data2 = mysqli_fetch_array($result3)) {
                            ?>
                              <option value="<?php echo $user_data2['kode_sampah'] ?>"><?php echo $user_data2['nama_sampah'] ?></option>

                            <?php
                            }
                            ?>
                          </select>
                        </td>
                      </div>

                      <div class="form-group form-group-default">
                        <label>Tanggal Setor</label>
                        <input id="tgl_setor" name="tgl_setor" type="date" class="form-control" value="<?php echo $user_data['tgl_setor']; ?>">
                      </div>

                      <div class="form-group form-group-default">
                        <label>Berat (Kg)</label>
                        <input id="quantity" name="quantity" type="text" class="form-control"  onkeyup="handleChangeBerat(this.value)" value="<?php echo $user_data['quantity']; ?>">
                      </div>

                      <div class="form-group form-group-default">
                        <label>Harga</label>
                        <input id="harga" name="harga" type="text" class="form-control" onkeyup="handleChangeHarga(this.value)" value="<?php echo $user_data['harga']; ?>">
                      </div>

                      <div class="form-group form-group-default">
                          <label>Total</label>
                          <input id="total" type="text" class="form-control" value="0" disabled>
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
    const harga = document.getElementById('harga');
    const total = document.getElementById('total');
    const quantity =document.getElementById('quantity');


    function handleChangeBerat(val) {
total.value= Number(val) * Number(harga.value)

    }

    function handleChangeHarga(val) {
      total.value= Number(val) * Number(quantity.value)

    }
  </script>


<?php 
include('../../template/footer.php') 
?>
</body>


</html>