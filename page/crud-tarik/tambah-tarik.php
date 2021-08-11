<?php


session_start();

if (!isset($_SESSION['jenis'])) {
	header('Location: ../../login-nasabah.php');
};

include('../../template/header.php');
include('../../template/sidebar.php');


$result = mysqli_query($conn, "SELECT * FROM  nasabah");



if (isset($_POST['tambah'])) {
  // $kode_sampah = $_POST['kode_sampah'];
  $kode  = $_POST['kode'];
  $tgl_tarik = $_POST['tgl_tarik'];
  $jumlah_tarik = $_POST['jumlah_tarik'];
  
  // $kode = $_GET['kode'];
  $result2 = mysqli_query($conn, "SELECT * from tabungan where kode=" . $kode);
  $user_data = mysqli_fetch_array($result2);
  $saldo = $user_data['saldo'];
  
  $kode_tabungan = $user_data['kode_tabungan'];
  $total = $saldo - ($jumlah_tarik);
  
  

$valid=false;

if($total >= 0){
  $valid=true;
}


if($valid){

  $query2 = mysqli_query($conn, "UPDATE tabungan SET saldo='$total' WHERE kode_tabungan='$kode_tabungan'");
  
  

  $query = mysqli_query($conn, "INSERT INTO tarik (kode,kode_tabungan,tgl_tarik,jumlah_tarik) VALUE ('$kode','$kode_tabungan','$tgl_tarik','$jumlah_tarik')");


}



  // header('Location: nasabah.php');


  if ($query2 && $valid) {
    echo "<script>alert('Penarikan Berhasil'); 
    window.location = 'tarik.php';</script>";
  } else {

    if($valid==false){
      echo "<script>alert('Saldo Tidak Mencukupi');
      window.location = 'tarik.php';</script>";
    }
    echo "<script>alert('Data Gagal Ditambahkan'); 
    window.location = 'tarik.php';</script>";
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
                    <div class="card-title">Tambah Data Penarikan</div>
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
                            <select class="form-control" id="kode" name="kode" onchange="handleChange(this.value)" required>
                            <option value="">Pilih Nasabah</option>
                              <?php
                              while ($user_data2 = mysqli_fetch_array($result)) {
                              ?>
                                <option value="<?php echo $user_data2['kode'] ?>"><?php echo $user_data2['nama_kelas'] ?></option>

                              <?php
                              }
                              ?>
                            </select>
                          </td>
                        </div>


                        <div class="form-group form-group-default">
                          <label>Saldo</label>

                          <?php
                       
                          // $result3 = mysqli_query($conn, "SELECT * FROM  tabungan ");
                          // $user_data = mysqli_fetch_array($result3);

                          ?>
                          <input id="saldo" name="saldo" type="text" class="form-control" onchange="handleChangeSaldo(this.value)" value="0" readonly>

                        </div>


                        <div class="form-group form-group-default">
                          <label>Tanggal Penarikan</label>
                          <input id="tgl_tarik" name="tgl_tarik" type="date" class="form-control" placeholder="masukkan tanggal penarikan" required>
                        </div>

                        <div class="form-group form-group-default">
                          <label>Jumlah Penarikan </label>
                          <input id="jumlah_tarik" name="jumlah_tarik" type="text" class="form-control" placeholder="masukkan jumlah yang ingin ditarik" required>
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
    const saldo = document.getElementById('saldo');
    const total = document.getElementById('total');

    function handleChange(val) {

      const xhttp = new XMLHttpRequest()
      xhttp.onload = function(a) {
        saldo.value = this.responseText
        // console.log(this.responseText)
        if (!val) {
          saldo.value=0
        }else{

        saldo.value=this.responseText

        }
      }

      // console.log(val)
      xhttp.open("GET", "get.php?kode=" + val, true);
      xhttp.send()
    }

    function handleChangeSaldo(val) {
      saldo.value= Number(val)

    }

  </script>

<?php 
include('../../template/footer.php') 
?>
</body>