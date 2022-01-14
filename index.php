<!DOCTYPE html>
<html>
<head>
	<title>Toko Bangunan </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">

		body{
			background-color: #d9adad;
		}	
		.content{
			padding:2%;
		}
	</style>
</head>
<body>
	<a href="login.php" >[ADMIN BARANG]</a>
	<a href="caridgnama.php" >[CARI BARANG BY namaProduk]</a>
	<a href="caridgstok.php" >[CARI BARANG BY stok]</a>
	<h1 align="center"><b>TOKO BAHAN BANGUNAN</b></h1>

	<div class="content">
		<table class="table table-hover">
			<tr>
				<td><b>No.</b></td>
				<!-- <td><b>Gambar</b></td> -->
				<td><b>Nama Material</b></td>
				<td><b>Stok Toko</b></td>
				<td><b>Harga</b></td>
				<td><b></b></td>

			</tr>

		<?php 
			error_reporting(E_ERROR | E_PARSE);
			$c = new mysqli("localhost", "root", "", "kang_bangunan");
			if ($c->connect_errno) {
				echo json_encode(array('result' => 'ERROR', 'pesan' => 'Koneksi Error'));
				die();
			}

			$sql = "SELECT * from produk";
			$result = $c->query($sql);
			if ($result->num_rows > 0) {
				while ($obj = $result->fetch_assoc()) {
				
				?>
				<tr>
					<td><?=$obj['idProduk']?></td>
					
					<td><?=$obj['namaProduk']?></td>
					<td><?=$obj['stok']?> pcs</td>
					<td>Rp.<?=$obj['hargaJual']?></td>

					<td><form action="" method="post">
							<input type="hidden" name="idparam" value="<?=$obj['idProduk']?>">
							<button type="submit" name="beli" style="background: #F4E1E1; border: 0; borderradius: 10px;">BELI</button>
						</form>
					</td>
				</tr>

				<?php 

				}
			}

			if (isset($_POST['beli'])) {
				$idProduk = $_POST['idparam'];
				$kuanti = 1;

				$sql = "INSERT INTO penjualan (kuantitas, product_idProduk) values ($kuanti,$idProduk)";
				$result = $c->query($sql);

				$sql2 = "UPDATE produk set stok=stok-1 where idProduk=$idProduk";
					$result = $c->query($sql2);
					echo "Pembelian barang berhasil. Id barang=".$idProduk;


			}

		 ?>

		</table>
		<a href="json.php" >[json_produk]</a>
		<a href="xml.php" >[xml_produk]</a>
		<a href="getdataproduk.php" >[webbrowser]</a>
		<br>
	</div>
</body>
</html>