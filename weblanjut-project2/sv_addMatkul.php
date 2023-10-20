<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$idmatkul=$_POST["idmatkul"];
$namamatakuliah=$_POST["namamatkul"];
$sks=$_POST["sks"];
$jns=$_POST["jns"];
$smt=$_POST["smt"];
$uploadOk=1;



// Check jika terjadi kesalahan
if ($uploadOk == 0) {
    echo "Maaf, file tidak dapat terupload<br>";
// jika semua berjalan lancar
} else {
//membuat query
$sql="insert matkul values('','$idmatkul','$namamatakuliah','$sks','$jns','$smt')";
 // Menjalankan query
 if (mysqli_query($koneksi, $sql)) {
        echo "Data berhasil disimpan<br>";
        // Mengalihkan pengguna kembali ke halaman sebelumnya
        header("Location: updateMatkul.php");
        exit; // Penting untuk menghentikan eksekusi lebih lanjut
} else {
    echo "Terjadi kesalahan saat menyimpan data: " . mysqli_error($koneksi);
}
}

?>