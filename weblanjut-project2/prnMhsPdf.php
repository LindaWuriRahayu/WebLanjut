<?php
require "fungsi.php";

// Output as PDF is removed

// Your HTML code without MPDF

echo '
<!DOCTYPE html>
<html>
<head>
    <title>Sistem Informasi Akademik::Daftar Mahasiswa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/stylepdf.css">
    <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>

</head>
<body>
    <h1 class="text-center">Daftar Mahasiswa<br>
    <sub class="text-center">Sistem Informasi - Fakultas Ilmu Komputer - Universitas Dian Nuswantoro<sub><br>
    <small class="text-center" >Tahun Akademik 2020-2021</small></h1>

<table class="mt-5">	
<tr>
    <th>No.</th>
    <th>Nim</th>
    <th>Nama</th>
    <th>Email</th>
</tr>
';

$sql = "select * from mhs";		
$qry = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
$no = 0;

while ($row = mysqli_fetch_assoc($qry)) {
    $no++;
    echo '
    <tr>
        <td>' . $no . '</td>
        <td>' . $row["nim"] . '</td>
        <td>' . $row["nama"] . '</td>
        <td>' . $row["email"] . '</td>			
    </tr>
    ';
}

echo '</table>';
echo '</body></html>';

echo'
<script>

window.print()

</script>
';