<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik::Edit Mata Kuliah</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>
</head>
<body>
	<?php
	require "fungsi.php";
	require "head.html";
	$id=$_GET['kode'];
	$sql="select * from matkul where id='$id'";
	$qry=mysqli_query($koneksi,$sql);
	$row=mysqli_fetch_assoc($qry);
	?>
	<div class="utama">
		<h2 class="mb-3 text-center">EDIT MATA KULIAH</h2>	
		<div class="row">
		<div class="col-sm-9">
			<form enctype="multipart/form-data" method="post" action="sv_editMatkul.php">
			


			<div class="form-group">
				<div class="input-group">
					<label for="idmatkul" class="control-label mt-2 mr-2">Kode:</label>
					<select class="mr-4 col-md-2 form-control" id="idmatkul-selected" >
						<option value="">--- pilih ---</option>
						<option value="A10" <?php if ($row['idmatkul'] == 'A10') echo 'selected'; ?>>A10</option>
						<option value="A11" <?php if ($row['idmatkul'] == 'A11') echo 'selected'; ?>>A11</option>
						<option value="A12" <?php if ($row['idmatkul'] == 'A12') echo 'selected'; ?>>A12</option>
						<option value="A13" <?php if ($row['idmatkul'] == 'A13') echo 'selected'; ?>>A13</option>
						<option value="A14" <?php if ($row['idmatkul'] == 'A14') echo 'selected'; ?>>A14</option>
						<option value="A15" <?php if ($row['idmatkul'] == 'A15') echo 'selected'; ?>>A15</option>
					</select>
					<input type="text" class="form-control col-md-2" id="idmatkul-input">
					<input class="form-control idmatkul" type="text" name="idmatkul" id="valueIdMatkul" value="<?php echo $row['idmatkul']?>" style="display: none">
				</div>
			</div>

			<div class="form-group">
				<label for="namadosen">Nama Mata Kuliah:</label>
				<input class="form-control" type="text" name="namamatkul" id="namamatkul" value="<?php echo $row['namamatkul']?>">
			</div>

			<div class="form-group">
				<label for="homebase">SKS:</label>
				<select class="mr-4 col-md-2 form-control" name="sks">
					<option value="">--- pilih ---</option>
					<option value="1" <?php if ($row['sks'] == '1') echo 'selected'; ?>>1</option>
					<option value="2" <?php if ($row['sks'] == '2') echo 'selected'; ?>>2</option>
					<option value="3" <?php if ($row['sks'] == '3') echo 'selected'; ?>>3</option>
					<option value="4" <?php if ($row['sks'] == '4') echo 'selected'; ?>>4</option>
					<option value="5" <?php if ($row['sks'] == '5') echo 'selected'; ?>>5</option>
					<option value="6" <?php if ($row['sks'] == '6') echo 'selected'; ?>>6</option>
				</select>
			</div>

			<div class="form-group">
				<label for="homebase">Jenis:</label>
				<select class="mr-4 col-md-2 form-control" name="jns">
					<option value="">--- pilih ---</option>
					<option value="T" <?php if ($row['jns'] == 'T') echo 'selected'; ?>>T</option>
					<option value="P" <?php if ($row['jns'] == 'P') echo 'selected'; ?>>P</option>
					<option value="T/P" <?php if ($row['jns'] == 'T/P') echo 'selected'; ?>>T/P</option>
				</select>
			</div>

			<div class="form-group">
				<label for="homebase">Semester:</label>
				<select class="mr-4 col-md-2 form-control" name="smt">
					<option value="">--- pilih ---</option>
					<option value="1" <?php if ($row['smt'] == '1') echo 'selected'; ?>>1</option>
					<option value="2" <?php if ($row['smt'] == '2') echo 'selected'; ?>>2</option>
					<option value="3" <?php if ($row['smt'] == '3') echo 'selected'; ?>>3</option>
					<option value="4" <?php if ($row['smt'] == '4') echo 'selected'; ?>>4</option>
					<option value="5" <?php if ($row['smt'] == '5') echo 'selected'; ?>>5</option>
					<option value="6" <?php if ($row['smt'] == '6') echo 'selected'; ?>>6</option>
					<option value="7" <?php if ($row['smt'] == '7') echo 'selected'; ?>>7</option>
					<option value="8" <?php if ($row['smt'] == '8') echo 'selected'; ?>>8</option>
				</select>
			</div>


			<div>		
				<button class="btn btn-primary" type="submit" id="submit">Simpan</button>
			</div>
			<input type="hidden" name="id" id="id" value="<?php echo $id?>">

			</form>
		</div>
		</div>
	</div>

	<script>
    // Mendapatkan elemen-elemen yang dibutuhkan
    const selectElement = document.querySelector('#idmatkul-selected');
    const inputElement = document.querySelector('#idmatkul-input');

    // Mengambil nilai dari PHP variable $row['idmatkul']
    const idmatkulValue = "<?php echo $row['idmatkul']; ?>";

    // Memisahkan data sebelum dan setelah titik "."
    const parts = idmatkulValue.split('.');
    const selectValue = parts[0];
    const inputValue = parts[1];

    // Mengatur nilai pada elemen <select> dan <input>
    selectElement.value = selectValue;
    inputElement.value = inputValue;

    // Mendengarkan perubahan pada elemen dropdown
    selectElement.addEventListener('change', updateIdMatkul);

    // Mendengarkan perubahan pada elemen input
    inputElement.addEventListener('input', updateIdMatkul);

    // Fungsi untuk menggabungkan nilai dari elemen dropdown dan elemen input
    function updateIdMatkul() {
        const selectValue = selectElement.value;
        const inputValue = inputElement.value;

        // Menggabungkan nilai dan memasukkannya ke dalam elemen input yang tersembunyi
        const combinedValue = selectValue + '.' + inputValue;

        // Memasukkan nilai gabungan ke dalam atribut value pada elemen input yang tersembunyi
        document.querySelector('#valueIdMatkul').value = combinedValue;
    }
</script>


	<script>
		$('#submit').on('click',function(){
			var id	= $('#id').val();
			var idmatkul	= $('#valueIdMatkul').val();
			var namamatakuliah	= $('#namamatakuliah').val();
			var sks 	= $('#sks').val();
            var jns 	= $('#jns').val();
            var smt 	= $('#smt').val();
			$.ajax({
				method	: "POST",
				url		: "sv_editMatkul.php",
				data	: {id:id, idmatkul:idmatkul, namamatkul:namamatkul, sks:sks, jns:jns, smt:smt}
			});
		});
	</script>
</body>
</html>