<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik::Tambah Mata Kuliah</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>

</head>
<body>
	<?php
	require "head.html";
	?>
	<div class="utama">		
		<br><br><br>		
		<h3>TAMBAH DATA MATA KULIAH</h3>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>	
		<form method="post" action="sv_addMatkul.php" enctype="multipart/form-data">
		

			<div class="form-group">
					<div class="input-group">
					<label for="idmatkul" class="control-label mt-2 mr-2">Kode:</label>

						<select class="mr-4 col-md-1 form-control" id="idmatkul-selected" >
							<option value="">--- pilih ---</option>
							<option value="A10">A10</option>
							<option value="A11">A11</option>
							<option value="A12">A12</option>
							<option value="A13">A13</option>
							<option value="A14">A14</option>
							<option value="A15">A15</option>
						</select>
						<input type="text" class="form-control col-md-2" id="idmatkul-input">
						<input class="form-control" type="text" name="idmatkul" id="valueIdMatkul" style="display: none;">

					</div>
			</div>

			<div class="form-group">
				<label for="namadosen">Nama Mata Kuliah:</label>
				<input class="form-control" type="text" name="namamatkul" id="namamatkul">
			</div>
			<div class="form-group">
				<label for="homebase">SKS:</label>
				<select class="mr-4 col-md-1 form-control" name="sks" >
					<option value="">--- pilih ---</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
				</select>			
			</div>
            <div class="form-group">
				<label for="homebase">Jenis:</label>
				<select class="mr-4 col-md-1 form-control" name="jns" >
					<option value="">--- pilih ---</option>
					<option value="T">T</option>
					<option value="P">P</option>
					<option value="T/P">T/P</option>
				</select>			
			</div>
            <div class="form-group">
				<label for="homebase">Semester:</label>
				<select class="mr-4 col-md-1 form-control" name="smt" >
					<option value="">--- pilih ---</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
				</select>			
			</div>
			<div>		
				<button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
			</div>
		</form> 
	</div>
	
</body>
<script>
    // Mendapatkan elemen-elemen yang dibutuhkan
    const selectElement = document.querySelector('#idmatkul-selected');
    const inputElement = document.querySelector('#idmatkul-input');
    const valueInput = document.querySelector('#valueIdMatkul');

    // Mendengarkan perubahan pada elemen dropdown
    selectElement.addEventListener('change', updateIdMatkul);

    // Mendengarkan perubahan pada elemen input
    inputElement.addEventListener('input', updateIdMatkul);

    // Fungsi untuk menggabungkan nilai dari elemen dropdown dan elemen input
    function updateIdMatkul() {
        const selectValue = selectElement.value;
        const inputValue = inputElement.value;

        // Menggabungkan nilai dan memasukkannya ke dalam elemen input
        const combinedValue = selectValue + '.' + inputValue;

        // Memasukkan nilai gabungan ke dalam atribut name pada input
        valueInput.value = combinedValue;
    }
</script>

</html>