<!DOCTYPE html>
<html>
<head>
	<title>Toko Bangunan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		.listkue{
			border-color: #ebbd34;
			align-content: center;
			padding: 5;
			word-spacing: 10;
		}
		body{
			background-color: #d9adad;
		}
	</style>

</head>
<body>
	<form action="" method="post">
		<table class="table_a"  align="center" cellpadding="3" cellspacing="10">
		<tr>
			<td colspan="3" align="center"> <h3><b>FORM TAMBAH BARANG</b></h3></td>
		</tr>
		<a href="admin.php">← BACK</a>
		<tr>
			<td width="75">Nama Barang</td>
			<td width="10">:</td>
			<td width="356"><input name="nama" size="50"></td>
		</tr>
		<tr>
			<td width="75">Stok</td>
			<td width="10">:</td>
			<td width="356"><input name="stok" type="number" size="50"></td>
		</tr>
		<tr>
			<td width="75">Harga Produksi</td>
			<td width="10">:</td>
			<td width="356"><input name="hpp" type="number"  size="50"></td>
		</tr>
		<tr>
			<td width="75">Harga Jual</td>
			<td width="10">:</td>
			<td width="356"><input name="hargajual" type="number" size="50"></td>
		</tr>

		<tr>
			<td colspan="6" align="center" style="padding-bottom:10px">
				<div>
					<button type="submit" name="submit" style="background: #F4E1E1; border: 0; borderradius: 10px;">Simpan</button>
					<button type="reset" style="background: #F4E1E1; border: 0; borderradius: 10px;">Ulangi</button>
				</div>
			</td>
		</tr>
	</table>
	</form>


</body>
</html>


<?php 
	$c = new mysqli("localhost", "root", "", "kang_bangunan");
		if ($c->connect_errno) {
			echo json_encode(array('result' => 'ERROR', 'message' => 'Failed to connect DB'));
			die();
		}

	if (isset($_POST['submit'])) {
			
			$nama = $_POST['nama'];
			$stok = $_POST['stok'];
			$hpp = $_POST['hpp'];
			$hargajual = $_POST['hargajual'];
			 // echo $nama."+".$stok."+".$hpp."+".$hargajual."+".$gambar;
			$sql = "INSERT INTO produk (namaProduk, stok, HPP, hargaJual) VALUES(?,?,?,?)";
			$stmt = $c->prepare($sql);
			$stmt->bind_param("siii", $nama, $stok, $hpp, $hargajual);
			$stmt->execute();
			if ($stmt->affected_rows > 0){
				echo "Barang berhasil ditambahkan. klik <a href='admin.php'>ini</a> untuk kembali ke admin";
			}
			
			else{
				echo "ada error ".$sql;
			}
		}

 ?>