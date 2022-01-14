<?php 
	$c = new mysqli("localhost", "root", "", "kang_bangunan");
	if ($c->connect_errno) {
		echo json_encode(array('result' => 'ERROR', 'message' => 'Failed to connect DB'));
		die();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Toko bangunan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		.table_a{
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
			
			<?php

				if(isset($_POST['idparam'])){	
					$id = $_POST['idparam'];
					$namaProduk="";
					$stok =0;
					$hargaBeli = 0;
					$hargaJual = 0;
					$idpass=0;
					$sql = "SELECT * from produk where idProduk=$id";
					$result = $c->query($sql);
					if ($result->num_rows > 0) {
						while ($obj = $result->fetch_assoc()) {
							$namaProduk= $obj['namaProduk'];
							$stok= $obj['stok'];
							$hargaBeli= $obj['HPP'];
							$hargaJual= $obj['hargaJual'];
							$idpass = $obj['idProduk'];
						}
					}
					else{
						echo $sql;
					}
			 ?>
			 <td colspan="3" align="center"> <h3><b>FORM EDIT DATA BARANG</b></h3></td>
		</tr>

		<a href="admin.php">BACK</a>
		<input type="hidden" name="idp" value="<?=$idpass?>">
		<tr>
			<td width="75">Nama Barang</td>
			<td width="10">:</td>
			<td width="356"><input name="nama" size="50" value="<?=$namaProduk?>"></td>
		</tr>
		<tr>
			<td width="75">Stok</td>
			<td width="10">:</td>
			<td width="356"><input name="stok" type="number" size="50" value="<?=$stok?>"></td>
		</tr>
		<tr>
			<td width="75">Harga Beli</td>
			<td width="10">:</td>
			<td width="356"><input name="hpp" type="number"  size="50" value="<?=$hargaBeli?>"></td>
		</tr>
		<tr>
			<td width="75">Harga Jual</td>
			<td width="10">:</td>
			<td width="356"><input name="hargaJual" type="number" size="50" value="<?=$hargaJual?>"></td>
		</tr>
		

		<tr>
			<td colspan="6" align="center" style="padding-bottom:10px">
				<div>
					<button type="submit" name="submit" style="background: #F4E1E1; border: 0; borderradius: 10px;">Simpan</button>
					<button type="reset" style="background: #F4E1E1; border: 0; borderradius: 10px;">Reset</button>
				</div>
			</td>
		</tr>
	</table>


	<?php 
	}
		if(isset($_POST['submit'])){
			$nama = $_POST['nama'];
			$stok = $_POST['stok'];
			$hpp = $_POST['hpp'];
			$hargaJual = $_POST['hargaJual'];
			$id = $_POST['idp'];
			$query = " UPDATE produk SET namaProduk='$nama', stok=$stok, HPP=$hpp, hargaJual=$hargaJual WHERE idProduk=$id";
			
			if ($c->query($query) === TRUE) {
				echo "database berhasil diubah. klik <a href='admin.php'>ini</a> untuk melihat perubahan";
			}
			else
			{
				echo "error".$query;	
			}
		}
	 ?>

</body>
</html>