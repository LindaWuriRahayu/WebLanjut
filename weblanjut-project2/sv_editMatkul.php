<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$id=$_POST["id"];
$kode=$_POST["idmatkul"];
$namamatkul=$_POST["namamatkul"];
$sks=$_POST["sks"];
$jns=$_POST["jns"];
$smt=$_POST["smt"];
$uploadOk=1;

//membuat query
$sql="update matkul set
					 idmatkul='$kode',
					 namamatkul='$namamatkul',
					 sks='$sks',
					 jns='$jns',
                     smt='$smt'
                     
					 where id='$id'";
mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
header("location:updateMatkul.php");
?>