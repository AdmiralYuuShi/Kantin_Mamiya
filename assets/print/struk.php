<?php
// memanggil library pdf
require('fpdf.php');
// instance object dan memberikan pengaturan halaman pdf
$pdf = new FPDF('P','mm',[80,120]);
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan 
$pdf->SetFont('Arial','B','14');
$pdf->Cell(60,5,'Kantin Mamiya',0,1,'C');
$pdf->SetFont('Arial','','8');
$pdf->Cell(60,5,'JL. SILIWANGI NO. 17 BALEENDAH KAB. BANDUNG',0,1,'C');
$pdf->Cell(60,1,'08912012001 - kantinmamiya@gmail.com',0,1,'C');
$pdf->SetFont('Arial','B','12');
$pdf->cell(60,4,'----------------------------------------------------',0,1,'C');
$pdf->cell(60,0,'----------------------------------------------------',0,1,'C');
$pdf->cell(60,4,'',0,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->Cell(-8);
$pdf->Cell(30,6,'Nama Masakan',0,0);
$pdf->Cell(15,6,'Jumlah',0,0);
$pdf->Cell(15,6,'Harga',0,0);
$pdf->Cell(20,6,'Total',0,0);


$pdf->SetFont('Arial','',10);

// include 'koneksi.php';
// $mahasiswa = mysqli_query($connect, "SELECT * FROM user");
// while ($row = mysqli_fetch_array($mahasiswa)){
    // $pdf->Cell(18,6,$row['id_user'],1,0);
    // $pdf->Cell(60,6,$row['username'],1,0);
    // $pdf->Cell(60,6,$row['password'],1,0);
    // $pdf->Cell(30,6,$row['nama_user'],1,0);
    // $pdf->Cell(18,6,$row['id_level'],1,1);
// }

$pdf->Output();
?>