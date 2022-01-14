<?php
include "koneksi.php";
$sql="select * from produk";
$tampil = mysqli_query($con,$sql);
if (mysqli_num_rows($tampil) > 0) {
$no=1;
$response = array();
 $response["data"] = array();
while ($r = mysqli_fetch_array($tampil)) {
 $h['idProduk'] = $r['idProduk'];
 $h['namaProduk'] = $r['namaProduk'];
 $h['stok'] = $r['stok'];
 $h['HPP'] = $r['HPP'];
 $h['hargaJual'] = $r['hargaJual'];
 array_push($response["data"], $h);
 }
 echo json_encode($response);
}
else {
 $response["message"]="tidak ada data";
 echo json_encode($response);
 }
?>