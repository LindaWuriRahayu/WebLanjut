
<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$npp=$_POST["npp"];
$namadosen=$_POST["namadosen"];
$homebase=$_POST["homebase"];
$uploadOk=1;



// Check jika terjadi kesalahan
if ($uploadOk == 0) {
    echo "Maaf, file tidak dapat terupload<br>";
// jika semua berjalan lancar
} else {
//membuat query
$sql="insert dosen values('$npp','$namadosen','$homebase','')";
 // Menjalankan query
 if (mysqli_query($koneksi, $sql)) {
        echo "Data berhasil disimpan<br>";
        // Mengalihkan pengguna kembali ke halaman sebelumnya
        header("Location: updateDosen.php");
        exit; // Penting untuk menghentikan eksekusi lebih lanjut
} else {
    echo "Terjadi kesalahan saat menyimpan data: " . mysqli_error($koneksi);
}
}

?>