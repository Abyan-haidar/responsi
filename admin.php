<!DOCTYPE html>
<html>
<head>
	<title>Toko bangunan </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		body{
			background-color: #d9adad;
			/*background-image: url('bg2.jpg');*/
		}
		.content{
			padding: 3%;
		}
	</style>
</head>
<body>
	<h1 align="center"><b>TOKO BAHAN BANGUNAN</b></h1>
	<p align="center">halaman admin</p>
	
	<a href="tambahBarang.php">[Tambah Produk+]</a> 
	<a href="logout.php">[Logout Admin]</a>
	<a href="report.php">[Review Data]</a>
	<a href="pdf.php">[Cetak Data]</a>
	

	<div class="content">
		<table class="table table-hover">
			<tr>
				<td><b>No.</b></td>
				<td><b>Varian Barang</b></td>
				<td><b>Stock</b></td>
				<td><b>Harga Satuan</b></td>
				<td><b></b></td>

			</tr>

		<?php 
			error_reporting(E_ERROR | E_PARSE);

			$c = new mysqli("localhost", "root", "", "kang_bangunan");
			if ($c->connect_errno) {
				echo json_encode(array('message' => 'Failed to connect DB'));
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

					<td><form action="edit_produk.php" method="post">
							<input type="hidden" name="idparam" value="<?=$obj['idProduk']?>">
							<button type="submit" name="edit" style="background: #f6ecf0; border: 0; borderradius: 10px; text-decoration-color: white;">Edit</button>
						</form>
					<form action="" method="post">
							<input type="hidden" name="idparam" value="<?=$obj['idProduk']?>">
							<button type="submit" name="delete"  style="background: #f6ecf0; border: 0; borderradius: 10px;">Hapus</button>
						</form>
					</td>
				</tr>

				<?php 
				}
			}

			if (isset($_POST['edit'])) {
				echo "id=".$_POST['idparam']; //debug
			}

			else if (isset($_POST['delete'])) {
				$id = $_POST['idparam'];
				$sql5 = "DELETE FROM produk WHERE idProduk=(?)";
				//pakai sql injection
				$stmt = $c->prepare($sql5);
				$stmt->bind_param("i", $id);
				$stmt->execute();

				if ($stmt->affected_rows > 0) {
					echo "hapus barang berhasil. <a href='admin.php' >refresh</a>";
				}
				else{
					echo "ada yang salah. id=".$id;
				}
			}
		 ?>
		</table>
	</div>
</body>
</html>