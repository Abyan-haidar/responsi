<?php
$url = "https://pemrogramanwebdinamis2022.000webhostapp.com/produk.php";
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($client);
$result = json_decode($response);
foreach ($result as $r) {
 echo "<p>";
 echo "idProduk : " . $r->idProduk . "<br />";
 echo "namaProduk : " . $r->namaProduk . "<br />";
 echo "stok : " . $r->stok . "<br />";
 echo "HPP : " . $r->HPP . "<br />";
 echo "hargaJual : " . $r->hargaJual . "<br />";
 echo "</p>";
}
