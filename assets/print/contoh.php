<?php
// memanggil library pdf
require('fpdf.php');
// instance object dan memberikan pengaturan halaman pdf
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan 
$pdf->SetFont('Arial','B','16');
// mencetak string
$pdf->Cell(190,7,'RESTORAN RIZKI',0,1,'C');
$pdf->SetFont('Arial','B','12');
$pdf->cell(190,7,'DATA USER',0,1,'C');
// memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(18,6,'ID USER',1,0);
$pdf->Cell(60,6,'USERNAME',1,0);
$pdf->Cell(60,6,'PASSWORD',1,0);
$pdf->Cell(30,6,'NAMA USER',1,0);
$pdf->Cell(18,6,'ID LEVEL',1,1);


$pdf->SetFont('Arial','',10);

include 'koneksi.php';
$mahasiswa = mysqli_query($connect, "SELECT * FROM user");
while ($row = mysqli_fetch_array($mahasiswa)){
    $pdf->Cell(18,6,$row['id_user'],1,0);
    $pdf->Cell(60,6,$row['username'],1,0);
    $pdf->Cell(60,6,$row['password'],1,0);
    $pdf->Cell(30,6,$row['nama_user'],1,0);
    $pdf->Cell(18,6,$row['id_level'],1,1);
}

$pdf->Output();
?>