<?php
//panggil file fungsi
require "fungsi.php";

$id=$_POST['id'];
//Set lokasi dan nama file foto
$folderupload ="fotodosen/";
$time = time();
$namafoto = $time . basename($_FILES['foto']['name']);
$fileupload = $folderupload . $namafoto; // foto/A12.2018.05555.jpg
$filefoto = $namafoto;                  // A12.2018.0555.jpg
$uploadOk=1;

//ambil jenis file
$jenisfilefoto = strtolower(pathinfo($fileupload,PATHINFO_EXTENSION));

// Check jika file foto sudah ada
if (file_exists($fileupload)) {
	echo "Maaf, file foto sudah ada<br>";
	$uploadOk = 0;
}

// Check ukuran file
if ($_FILES["foto"]["size"] > 1000000) {
	echo "Maaf, ukuran file foto harus kurang dari 1 MB<br>";
	$uploadOk = 0;
}

// Hanya file tertentu yang dapat digunakan
if($jenisfilefoto != "jpg" && $jenisfilefoto != "png" && $jenisfilefoto != "jpeg"
&& $jenisfilefoto != "gif" ) {
	echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan<br>";
	$uploadOk = 0;
}

// Check jika terjadi kesalahan
if ($uploadOk == 0) {
	echo "Maaf, file tidak dapat terupload<br>";
// jika semua berjalan lancar
} else {
	if (move_uploaded_file($_FILES["foto"]["tmp_name"], $fileupload)) {
		//membuat query
		//echo $id." - ".$fileupload;exit;
		$sql="update dosen set foto='$filefoto' where id='$id'";
		mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
		header("location:homeadmin.php");
	} else {
		echo "Maaf, terjadi kesalahan saat mengupload file foto<br>";
	}
}

?>