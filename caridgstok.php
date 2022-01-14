<?php 
include 'koneksi.php';
?>
<h3>Form Pencarian DATA Produk Dengan Kata Kunci Stok </h3>
<form action="" method="get">
<label>Cari :</label>
<input type="text" name="cari">
<input type="submit" value="Cari">
</form>
<?php 
if(isset($_GET['cari'])){
$cari = $_GET['cari'];
echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>
<table border="1">
<tr>
<th>ID Produk</th>
<th>Nama Produk</th>
<th>Stok</th>
<th>HPP</th>
<th>Harga Jual</th>
</tr>
<?php 
if(isset($_GET['cari'])){
$cari = $_GET['cari'];
$sql="SELECT * from produk WHERE stok like '%".$cari."%'";
$tampil = mysqli_query($con,$sql);
}else{
$sql="SELECT * FROM produk";
$tampil = mysqli_query($con,$sql);
}
$no = 1;
while($r = mysqli_fetch_array($tampil)){
?>
<tr>
<td><?php echo $r['idProduk']; ?></td>
<td><?php echo $r['namaProduk']; ?></td>
<td><?php echo $r['stok']; ?></td>
<td><?php echo $r['HPP']; ?></td>
<td><?php echo $r['hargaJual']; ?></td>
</tr>
<?php } ?>
</table>