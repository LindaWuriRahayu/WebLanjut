<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sistem Informasi Akademik: Kuliah Tawar</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <title>Document</title>
    <style>
        .kontent{
            margin-left: 170px
        }
    </style>
</head>
<body>
    
<?php
include "head.html"
?>

<?php
include "fungsi.php";
?>




<div class="utama">
    <h2 class="text-center">Daftar Kuliah Tawar</h2>
	<div class="text-center"><a href="prnkultawarPdf.php"><span class="fas fa-print">&nbsp;Print</span></a></div>
    <span class="float-left">

        <a href="addKultawar.php" class="btn btn-success">Tambah Data</a>
</span>
    <span class="float-right">
    <form method="POST" action="" class="form-inline">
        <button class="btn btn-success" type="submit" name="submit" value="Cari">Cari</button>
        <input class="form-control ml-2 mr-2" type="text" name="cari" placeholder="cari kuliah tawar...">
    </form>
    </span>
    <br><br>