<?php


session_start();
if (!isset($_SESSION['jenis'])) {
	header('Location: ../../login-nasabah.php');
};

include('../../template/header.php');
include('../../template/sidebar.php');



$result = mysqli_query($conn, "SELECT * FROM  nasabah");
$result2 = mysqli_query($conn, "SELECT * FROM  sampah");

if (isset($_POST['tambah'])) {
  // $kode_sampah = $_POST['kode_sampah'];
  $kode  = $_POST['kode'];
  $kode_sampah = $_POST['kode_sampah'];
  $tgl_setor = $_POST['tgl_setor'];
  $quantity = $_POST['quantity'];
  $harga = $_POST['harga'];
  
  // $kode = $_GET['kode'];
  $result3 = mysqli_query($conn, "SELECT * from tabungan where kode=".$kode);
  $user_data = mysqli_fetch_array($result3);
  
  $saldo =$user_data['saldo'];
  $kode_tabungan =$user_data['kode_tabungan'];
  $query = mysqli_query($conn, "INSERT INTO setor (kode,kode_sampah,kode_tabungan,tgl_setor,quantity,harga) VALUE ('$kode','$kode_sampah','$kode_tabungan','$tgl_setor','$quantity','$harga')");
 
 
  $total = $saldo + ($quantity * $harga);
 
  $query2 = mysqli_query($conn, "UPDATE tabungan SET saldo='$total' WHERE kode_tabungan='$kode_tabungan'");




  // header('Location: nasabah.php');


  if ($query2) {
    echo "<script>alert('Penyetoran Berhasil'); 
    window.location = 'setor.php';</script>";
  } else {
    echo "<script>alert('Data Gagal Ditambahkan'); 
    window.location = 'tambah-setor.php';</script>";
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
              <h4 class="page-title">Data Setoran</h4>
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
                    <div class="card-title">Tambah Data Setoran</div>
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
                          <td><label>Nama Kelas</label></td>
                          <td>
                            <select class="form-control" id="kode" name="kode" required>
                              <?php
                              while ($user_data = mysqli_fetch_array($result)) {
                              ?>
                                <option value="<?php echo $user_data['kode'] ?>"><?php echo $user_data['nama_kelas'] ?></option>

                              <?php
                              }
                              ?>
                            </select>
                          </td>
                        </div>

                        <div class="form-group form-group-default">
                          <td><label>Nama sampah</label></td>
                          <td>
                            <select class="form-control" value="" id="kode_sampah" name="kode_sampah" onchange="handleChange(this.value)" required>
                              <option value="">Pilih sampah</option>
                              <?php
                              while ($user_data = mysqli_fetch_array($result2)) {
                              ?>
                                <option value="<?php echo $user_data['kode_sampah'] ?>"><?php echo $user_data['nama_sampah'] ?></option>

                              <?php
                              }
                              ?>
                            </select>
                          </td>
                        </div>

                        <div class="form-group form-group-default">
                          <label>Tanggal Setor</label>
                          <input id="tgl_setor" name="tgl_setor" type="date" class="form-control" placeholder="masukkan nama sampah" required>
                        </div>

                        <div class="form-group form-group-default">
                          <label>Berat(Kg) </label>
                          <input id="quantity" name="quantity" type="text" class="form-control" placeholder="masukkan harga sampah" onkeyup="handleChangeBerat(this.value)" required>
                        </div>

                        <div class="form-group form-group-default">
                          <label>harga</label>
                          <input id="harga" name="harga" type="text" class="form-control" onkeyup="handleChangeHarga(this.value)" required>
                        </div>

                        <div class="form-group form-group-default">
                          <label>Total</label>
                          <input id="total" type="text" class="form-control" value="0" disabled>
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
    const harga = document.getElementById('harga');
    const total = document.getElementById('total');
    const quantity =document.getElementById('quantity');

    function handleChange(val) {

      const xhttp = new XMLHttpRequest()
      xhttp.onload = function(a) {
        harga.value = this.responseText
        // console.log(this.responseText)
        if (!val) {
          quantity.value=0
          total.value=0
        }else{
        quantity.value=1
        total.value=this.responseText

        }
      }
      // console.log(val)
      xhttp.open("GET", "get.php?kode_sampah=" + val, true);
      xhttp.send()


    }

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