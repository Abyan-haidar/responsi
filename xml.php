<?php
include "koneksi.php"; 
header('Content-Type: text/xml');
$query = "SELECT * FROM produk";
$hasil = mysqli_query($con,$query);
$jumField = mysqli_num_fields($hasil);
echo "<?xml version='1.0'?>";
echo "<data>";
while ($data = mysqli_fetch_array($hasil))
{
 echo "<produk>";
 echo"<idProduk>",$data['idProduk'],"</idProduk>";
 echo"<namaProduk>",$data['namaProduk'],"</namaProduk>";
 echo"<stok>",$data['stok'],"</stok>";
 echo"<HPP>",$data['HPP'],"</HPP>";
 echo"<hargaJual>",$data['hargaJual'],"</hargaJual>";
 echo "</produk>";
}
echo "</data>";
?> 