<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sistem Informasi Akademik: Mata Kuliah</title>
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

$batas = 10;
$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi,"select * from matkul");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$cari = "";



// Jika form pencarian disubmit
if (isset($_POST['submit'])) {
    $cari = $_POST['cari'];
    // Query untuk mencari data berdasarkan kata kunci
    $sql = "SELECT * FROM matkul WHERE namamatkul LIKE '%$cari%' 
        limit $halaman_awal, $batas";
            $halAktif = 1;

} else {
    // Jika form tidak disubmit, tampilkan semua data
    $sql = "select * from matkul limit $halaman_awal, $batas";
}
    // Jika form tidak disubmit, tampilkan semua data

$data=mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));

$no = $halaman_awal+1;

?>

<div class="utama">
    <h2 class="text-center">Daftar Mata Kuliah</h2>
	<div class="text-center"><a href="prnMatkulPdf.php"><span class="fas fa-print">&nbsp;Print</span></a></div>
    <span class="float-left">

        <a href="addMatkul.php" class="btn btn-success">Tambah Data</a>
</span>
    <span class="float-right">
    <form method="POST" action="" class="form-inline">
        <button class="btn btn-success" type="submit" name="submit" value="Cari">Cari</button>
        <input class="form-control ml-2 mr-2" type="text" name="cari" placeholder="cari mata kuliah...">
    </form>
    </span>
    <br><br>


    <ul class="pagination">
    <?php
    if ($halaman > 1) {
        $back = $halaman - 1;
        echo "<li class='page-item'><a class='page-link' href='?halaman=$back'>&laquo;</a></li>";
    }
    ?>

    <?php
    $showPages = 7; // Jumlah halaman yang akan ditampilkan
    $half = floor($showPages / 2);
    $startPage = max(1, $halaman - $half);
    $endPage = min($total_halaman, $startPage + $showPages - 1);

    if ($startPage > 1) {
        echo "<li class='page-item'><a class='page-link' href='#'>...</a></li>";
    }

    for ($x = $startPage; $x <= $endPage; $x++) {
    ?>
        <li class="page-item">
            <a class="page-link <?php if ($x == $halaman) {
                                    echo 'text-danger font-weight-bold';
                                } ?>" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a>
        </li>
    <?php
    }

    if ($endPage < $total_halaman) {
        echo "<li class='page-item'><a class='page-link' href='#'>...</a></li>";
    }
    ?>

    <?php
    if ($halaman < $total_halaman) {
        $forward = $halaman + 1;
        echo "<li class='page-item'><a class='page-link' href='?halaman=$forward'>&raquo;</a></li>";
    }
    ?>
</ul>


	<table class="table table-hover">
	<thead class="thead-light">
            <tr>
                <th>No.</th>
                <th>Kode Mata Kuliah</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Jenis</th>
                <th>Semester</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
              
                while($row=mysqli_fetch_assoc($data)){
                    ?>
                    <tr>
                    <td><?php echo $no?></td>

                    <td><?php echo $row["idmatkul"]?></td>
                    <td><?php echo $row["namamatkul"]?></td>
                    <td><?php echo $row["sks"]?></td>
                    <td><?php echo $row["jns"]?></td>
                    <td><?php echo $row["smt"]?></td>
                    <td>
                    <a class="btn btn-outline-primary btn-sm" href="editMatkul.php?kode=<?php echo $row['id']?>">Edit</a>
                    <a class="btn btn-outline-danger btn-sm" href="hpsMatkul.php?kode=<?php echo $row["id"]?>" id="linkHps" onclick="return confirm('Anda ingin menghapus data ini?')">Hapus</a>
                    </td>

                    </tr>
                <?php
                $no++;

                }
            
            ?>
	
            
        </tbody>
    </table>
</div>


</div>


</body>
</html>