<?php 

class Print_Laporan extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('Order_Model');
        $this->load->model('Transaksi_Model');
    }

    public function index(){
        // instance object dan memberikan pengaturan halaman pdf
        $pdf = new FPDF('P','mm',[80,120]);
        // membuat halaman baru
        $pdf->AddPage();
        // Header Struk 
        $pdf->SetFont('Arial','B','14');
        $pdf->Cell(60,-10,'Kantin Mamiya',0,1,'C');
        $pdf->SetFont('Arial','','8');
        $pdf->Cell(60,20,'JL. SILIWANGI NO. 17 BALEENDAH KAB. BANDUNG',0,1,'C');
        $pdf->Cell(60,-13,'08912012001 - kantinmamiya@gmail.com',0,1,'C');
        $pdf->SetFont('Arial','','12');
        $pdf->Cell(60,18,'----------------------------------------------------',0,1,'C');
        $pdf->Cell(60,-8,'',0,1,'C');
        // Header tabel
        $pdf->Cell(-8);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(55,6,'Tanggal : '.date('Y-m-d'),0,0);
        foreach($this->Transaksi_Model->getTransaksiById() as $data){
            $pdf->Cell(30,6,'ID Order : '.$data->id_order,0,1);
        }
        $pdf->SetFont('Arial','','12');
        $pdf->Cell(0,0,'----------------------------------------------------',0,1,'C');
        $pdf->Cell(30,2,'',0,1);
        
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(-8);
        $pdf->Cell(28,6,'Nama Masakan',0,0);
        $pdf->Cell(15,6,'Jumlah',0,0);
        $pdf->Cell(18,6,'Harga (Rp)',0,0);
        $pdf->Cell(20,6,'Total (Rp)',0,1);
        // Isi Tabel
        foreach($this->Order_Model->getDataOrder() as $data ){
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(-8);
        $pdf->Cell(28,6,$data->nama_masakan,0,0);
        $pdf->Cell(15,6,$data->jumlah,0,0);
        $pdf->Cell(18,6,number_format($data->harga),0,0);
        $pdf->Cell(20,6,number_format($data->harga*$data->jumlah),0,1);
        }
        foreach($this->Transaksi_Model->getTransaksiById() as $data){
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(-8);
            $pdf->Cell(35,6,'------------------------------------',0,0);
            $pdf->Cell(26,6,'Total Harga (Rp)',0,0);
            $pdf->Cell(20,6,number_format($data->total_bayar),0,1);
            $pdf->Cell(-8);
            $pdf->Cell(35,6,'------------------------------------',0,0);
            $pdf->Cell(26,6,'Bayar (Rp)',0,0);
            $pdf->Cell(20,6,number_format($data->uang_masuk),0,1);
            $pdf->Cell(-8);
            $pdf->Cell(35,6,'------------------------------------',0,0);
            $pdf->Cell(26,6,'Kembali (Rp)',0,0);
            $pdf->Cell(20,6,number_format($data->uang_kembali),0,1);
            $pdf->Cell(20,8,'',0,1);   
        }
        // Footer
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(5);
        $pdf->Cell(50,2,'~ Terima Kasih Telah Berbelanja ~',0,1);
        $pdf->Cell(-8);
        $pdf->Cell(80,6,'-------------------------------------------------------------------------------',0,1);
        $pdf->Cell(-8);
        $pdf->Cell(80,0,'--  Copyright 2019 Hapid Moch Jamil. All Right Reserved  --',0,1);
        $pdf->Cell(-8);
        $pdf->Cell(80,6,'-------------------------------------------------------------------------------',0,1);
        
        

        $pdf->Output();
    }
}