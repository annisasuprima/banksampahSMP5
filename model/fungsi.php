<?php 
    $koneksi = mysqli_connect("localhost","root","","bank_sampah");

    function lihat($query)
    {
        global $koneksi;
        
        $hasil = mysqli_query($koneksi,$query);
        $tampungData = [];
        while ( $data = mysqli_fetch_assoc($hasil) ) {
            $tampungData[] = $data;
        }
        return $tampungData;

    }
    
    // function tambah($data,$data_foto)
    // {

    //     global $koneksi;
    //     $nama = $data ["nama"];
    //     $total= $data["total"];
    //     $keterangan = $data["keterangan"];
    //     print_r(isset($data['uang_masuk']));

    //     if(!isset($data['uang_masuk'])) {
    //         $data_foto['lampiran']['name'] != null ?
    //         $Insertgambar = upload()
    //         : $Insertgambar = false;
    //     }
    //     $query = isset($data['uang_masuk']) ? "INSERT INTO uang_masuk VALUES ('','$nama','$total','$keterangan')" :
    //      "INSERT INTO uang_keluar VALUES ('','$total','$keterangan', '$Insertgambar')";

    //     mysqli_query($koneksi,$query);
    //     return mysqli_affected_rows($koneksi);
    // }

    // function tambah_iuran($data)
    // {

    //     global $koneksi;
    //     $nama_anggota = $data ["nama_anggota"];
    //     $bayar = $data["bayar"];
    //     $max_bayar = $data["max_bayar"];
    //     $minggu = $data["minggu"];
    //     $tanggal_bayar = $data["tanggal_bayar"];
    //     $Keterangan = $data["Keterangan"];
        
       
    //     $query = "INSERT INTO uang_iuran  VALUES ('','$nama_anggota','$bayar', '$max_bayar','$minggu','$tanggal_bayar', '$Keterangan')";
    //     mysqli_query($koneksi,$query);

        

    //     return mysqli_affected_rows($koneksi);
    // }
    // function tambah_telat ($data) {
        
    //     global $koneksi;
    //     $nama_anggota = $data ["nama_anggota"];
    //     $minggu = $data["minggu"];
    //     $keterangan = $data ["keterangan"];
    //     $minggu_bayar = $data["minggu_bayar"];
    //     $denda = $data["denda"];
    //     $tgl_bayar = $data["tgl_bayar"];
       
    //     $query = "INSERT INTO telat_bayar  VALUES ('','$nama_anggota','$minggu', '$keterangan','$minggu_bayar','$denda','$tgl_bayar')";
    //     mysqli_query($koneksi,$query);


    //     return mysqli_affected_rows($koneksi);
    // }

    // function upload()
    // {
    //     $nama = $_FILES['lampiran']['name'];
    //     $size = $_FILES['lampiran']['size'];
    //     $tmpName = $_FILES['lampiran']['tmp_name'];
    //     $error = $_FILES['lampiran']['error'];

    //     $extensionGambar = ['jpg','jpeg','png'];
    //     $extension = explode('.',$nama);
    //     $extension = strtolower(end($extension));

    //     if (!in_array($extension, $extensionGambar)) {
    //         echo 
    //         "
    //         <script>
    //             alert('bukan gambar');
    //         </script>
    //         ";
    //         return false;
    //     }

    //     move_uploaded_file($tmpName, '../foto/'.$nama);

    //     return $nama; 
    // }

    // function hapus ($data)
    // {
    //     global $koneksi;

    //     isset($data['uang_masuk']);


    //     $query = isset($data['uang_masuk']) ? "DELETE FROM uang_masuk WHERE id='$data' " :
    //     "DELETE FROM uang_keluar WHERE id='$data' ";        

    //     mysqli_query($koneksi,$query);
        
    //     return mysqli_affected_rows($koneksi);
    // }

    // function hapus_uangmasuk ($data)
    // {
    //     global $koneksi;

    //     $query =  "DELETE FROM uang_masuk WHERE id='$data' ";
        
    //     mysqli_query($koneksi,$query);
        
    //     return mysqli_affected_rows($koneksi);
    // }

    //  function hapus_uangkeluar ($data)
    // {
    //     global $koneksi;

    //     $query =  "DELETE FROM uang_keluar WHERE id='$data' ";
        
    //     mysqli_query($koneksi,$query);
        
    //     return mysqli_affected_rows($koneksi);
    // }

    //  function hapus_iuran ($data)
    // {
    //     global $koneksi;

    //     $query =  "DELETE FROM uang_iuran WHERE id='$data' ";
        
    //     mysqli_query($koneksi,$query);
        
    //     return mysqli_affected_rows($koneksi);
    // }

    // function hapus_telatbayar ($data)
    // {
    //     global $koneksi;

    //     $query =  "DELETE FROM telat_bayar WHERE id='$data' ";
        
    //     mysqli_query($koneksi,$query);
        
    //     return mysqli_affected_rows($koneksi);
    // }

    // function edit ($data)
    // {

    //     global $koneksi;
    //     $id = $data["id"];
    //     $nama = $data ["nama"];
    //     $total= $data["total"];
    //     $keterangan = $data["keterangan"];
        
    //     $query = $data["uang_masuk"] ? "UPDATE uang_masuk SET nama='$nama',total='$total',keterangan='$keterangan'WHERE id=$id" : "UPDATE uang_keluar SET nama='$nama',total='$total',keterangan='$keterangan', foto='$Insertgambar' WHERE id=$id";

    //     mysqli_query($koneksi,$query);

    //     return mysqli_affected_rows($koneksi);
    // }

    // function edit_uangmasuk ($data)
    // {
    //     global $koneksi;
        
    //     $id = $data["id"];
    //     $nama = $data ["nama"];
    //     $total= $data["total"];
    //     $keterangan = $data["keterangan"];
        
    //     $query = "UPDATE uang_masuk SET nama='$nama',total='$total',keterangan='$keterangan' WHERE id=$id" ;

    //     mysqli_query($koneksi,$query);

    //     return mysqli_affected_rows($koneksi); 
    // }

    // function edit_uangkeluar ($data)
    // {
    //     global $koneksi;
        
    //     $id = $data["id"];
    //     $total= $data["total"];
    //     $keterangan = $data["keterangan"];
    //     $Insertgambar = $data["lampiran"];
    //     $Insertgambar = upload();

        
    //     $query = "UPDATE uang_keluar SET total='$total',keterangan='$keterangan', lampiran='$Insertgambar' WHERE id=$id" ;

    //     mysqli_query($koneksi,$query);

    //     return mysqli_affected_rows($koneksi); 
    // }

    // function edit_telatbayar ($data,$id2)
    // {
    //     global $koneksi;
        
    //     // $id = $data["id"];
    //     $nama_anggota = $data ["nama_anggota"];
    //     $minggu = $data ["minggu"];
    //     $keterangan = $data ["keterangan"];
    //     $minggu_bayar= $data["minggu_bayar"];
    //     $denda = $data["denda"];
    //     $tgl_bayar = $data ["tgl_bayar"];
        
    //     $query = "UPDATE telat_bayar SET nama_anggota='$nama_anggota',minggu='$minggu',Keterangan='$keterangan', minggu_bayar='$minggu_bayar', denda='$denda', tgl_bayar='$tgl_bayar' WHERE id='$id2'" ;

    //     mysqli_query($koneksi,$query);
    //     // die();

    //     return mysqli_affected_rows($koneksi); 
    // }

    // function edit_iuran ($data)
    // {
    //     global $koneksi;
        
    //     $id = $data["id"];
    //     $nama_anggota = $data ["nama_anggota"];
    //     $bayar = $data ["bayar"];
    //     $max_bayar = $data ["max_bayar"];
    //     $tanggal_bayar= $data["tanggal_bayar"];
    //     $minggu = $data["minggu"];
    //     $Keterangan = $data ["Keterangan"];
        
    //     $query = "UPDATE uang_iuran SET nama_anggota='$nama_anggota',bayar='$bayar',max_bayar='$max_bayar', tanggal_bayar='$tanggal_bayar', minggu='$minggu', Keterangan='$Keterangan' WHERE id='$id'" ;

    //     mysqli_query($koneksi,$query);

    //     return mysqli_affected_rows($koneksi); 
    // }

?>