<!DOCTYPE html>
<html>
<head>
	<title> Review </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		.hasil{
			margin: 20px;
			background-color: #d9adad;
		}
		body{
			/*background-color: #ffc93c;*/
			background-image: url('bg2.jpeg');
		}
	</style>
</head>
<body>
	<h1 align="center"><b>LAPORAN</b></h1>
	<a href="admin.php">←BACK</a>
	<br><br>
	<div class="hasil">
		<table class="table table-condensed">
			<tr>
				<td>Nama Material</td>
				<td>Kuantitas Terjual</td>
				<td>Keuntungan per-buah</td>
				<td>Total Keuntungan</td>

			</tr>

		<?php 
			error_reporting(E_ERROR | E_PARSE);

			$c = new mysqli("localhost", "root", "", "kang_bangunan");
			if ($c->connect_errno) {
				echo json_encode(array('result' => 'ERROR', 'message' => 'Failed to connect DB'));
				die();
			}

			$sql = "SELECT k.namaProduk, sum(s.kuantitas) as totalTerjual, k.hargaJual-k.HPP as profit , sum(s.kuantitas)*(k.hargaJual-k.HPP) as totalprofit FROM penjualan s inner join produk k on s.Product_idProduk = k.idProduk GROUP BY s.Product_idProduk";
			$result = $c->query($sql);
			if ($result->num_rows > 0) {
				while ($obj = $result->fetch_assoc()) {
				?>
				<tr>
					<td><?=$obj['namaProduk']?></td>
					<td><?=$obj['totalTerjual']?> pcs</td>
					<td>Rp<?=$obj['profit']?></td>
					<td>Rp<?=$obj['totalprofit']?></td>
				</tr>

				<?php 

				}
			}


		 ?>

		</table>
	</div>
</body>
</html>