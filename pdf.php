<?php
// memanggil library FPDF
require('fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,7,'Laporan Data Barang',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'DAFTAR BARANG YANG TERSEDIA DI WEBSITE TOKO BANGUNAN',0,1,'C');
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(21,6,'ID PRODUK',1,0);
$pdf->Cell(50,6,'NAMA PRODUK',1,0);
$pdf->Cell(25,6,'STOK',1,0);
$pdf->Cell(50,6,'HARGA BELI',1,0);
$pdf->Cell(30,6,'HARGA JUAL',1,1);
$pdf->SetFont('Arial','',10);
include 'koneksi.php';
$produk = mysqli_query($con, "select * from produk");
while ($row = mysqli_fetch_array($produk)){
 $pdf->Cell(21,6,$row['idProduk'],1,0);
 $pdf->Cell(50,6,$row['namaProduk'],1,0);
 $pdf->Cell(25,6,$row['stok'],1,0);
 $pdf->Cell(50,6,$row['HPP'],1,0);
 $pdf->Cell(30,6,$row['hargaJual'],1,1); 
}
$pdf->Output();
?>