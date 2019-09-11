<?php
require ("lib/fpdf/fpdf.php");
require("lib/lib-function.php");
Class Kwitansi extends FPDF
{
	/*Format Kwitansi oleh : OyanCresys -- www.facebook.com/oyancresys*/
	var $tanggal,$kwnums,$nama,$admins,$notevalid,$headerCo,$headerBuk,$headerAddr,$headerTel;
	/* Header Kwitansi */
	function Header(){
		$this->Image('tmz1.png',225,3,55,16);
		
		$this->SetFont('Arial','',13);
		$this->Cell(288,6,$this->headerCo,0,1,'L');
		$this->SetFont('Arial','',19);
		$this->Cell(288,6,$this->headerBuk,0,1,'L');
		$this->SetFont('Courier','',11);
		$this->Cell(200,6,$this->headerAddr,0,1,'L');
		$this->Cell(200,6,$this->headerTel,0,0,'L');
		$this->SetFillColor(95, 95, 95);
		$this->Rect(11, 30, 283, 1, 'FD');
	}
	/* Footer Kwitansi*/
	function Footer(){
		$this->SetY(-45);
		$this->SetFont('Courier','',11);
		$this->Cell(130);
		$this->Cell(0,6,'Y o g y a k a r t a, '.$this->tanggal,0,1,'C');
		$this->SetY(-40);
		$this->Ln(2);
		$this->SetFont('Courier','',11);
		$this->Cell(100,5,'P e n y e t o r:',0,1,'C');
		$this->SetY(-38);
		$this->SetFont('Courier','',11);
		$this->Cell(130);
		$this->Cell(0,5,'P e n e r i m a:',0,1,'C');
		$this->Ln(7);
		$this->SetFont('Courier','',11);
		$this->Cell(100,5,$this->nama,0,1,'C');
		$this->SetFont('Courier','',11);
		$this->Cell(130);
		$this->Cell(0,0,$this->admins,0,1,'C');
		$this->SetY(-16);
		$this->SetFont('Arial','',10);
		$this->Cell(0,2,$this->notevalid,0,1,'L');
	}
	function setHeaderParam($pt,$buk,$jl,$tel){
		$this->headerCo=$pt;
		$this->headerBuk=$buk;
		$this->headerAddr=$jl;
		$this->headerTel=$tel;
		}
	function setTanggal($tgl){$this->tanggal=$tgl;}
	function setNama($nama){$this->nama=$nama;}
	function setAdmins($admins){$this->admins=$admins;}
	function setKwtNums($kwnums){$this->kwnums=$kwnums;}
	function setValidasi($word){$this->notevalid=$word;}
}
/*Deklarasi variable untuk cetak*/
$pt='P O L T E K K E S  B H A K T I  S E T Y A  I N D O N E S I A  Y O G Y A K A R T A';
$buk='B U K T I  P E M B A Y A R A N';
$jl='Jl. J a n t i - G e d o n g k u n i n g No. 3 3 6 Y O G Y A K A R T A';
$tel='T e l p.( 0 2 7 4) 5 8 0 6 6 3,0 5 1 0 0 4 8 2 7 2 2 F a x.5 4 4 6 1 8';
$nama=$_POST['payee'];
$nim=$_POST['nim'];
$semester=$_POST['semester'];
$prodi=$_POST['prodi'];
$bujitul2=$_POST['bujitul2'];
$bujitul=$_POST['bujitul'];
$bujikes=$_POST['bujikes'];
$spptetapa=$_POST['spptetapa'];
$spptetap=$_POST['spptetap'];
$sppprakteka=$_POST['sppprakteka'];
$spppraktek=$_POST['spppraktek'];
$sppteoria=$_POST['sppteoria'];
$sppteori=$_POST['sppteori'];
$bpu=$_POST['bpu'];
$boa=$_POST['boa'];
$seragam=$_POST['seragam'];
$pps=$_POST['pps'];
$blain2=$_POST['blain2'];
$blain=$_POST['blain'];
$blain3=$_POST['blain3'];
$blain3a=$_POST['blain3a'];
$blain4=$_POST['blain4'];
$blain4a=$_POST['blain4a'];
$blain5=$_POST['blain5'];
$blain5a=$_POST['blain5a'];
$total=$_POST['total'];
$admins=$_POST['pic'];
$notevalid='           P u t i h:B a g.K e u a n g a n                          H i j a u:T A M Z I S                            K u n i n g:M a h a s i s w a                      M e r a h:Y a y a s a n';
/*parameter kertas*/
$pdf=new Kwitansi('L','mm','A5');
$fungsi=new Fungsi();
$tglCetak=$fungsi->Tanggal('tgl').' '.$fungsi->Tanggal('blnL').' '.$fungsi->Tanggal('THN');
/* Retrieve No. SERI*/
$KwtNum = $fungsi->KwNums();
/*Persiapan Parameter*/
$pdf->setTanggal($tglCetak);
$pdf->setNama($nama);
$pdf->setAdmins($admins);
$pdf->setKwtNums($KwtNum);
$pdf->setValidasi($notevalid);
$pdf->setHeaderParam($pt,$buk,$jl,$tel);
/* Bagian di mana inti dari kwitansi berada*/
$pdf->setMargins(10,6,10);
$pdf->AddPage();
$pdf->SetLineWidth(0,10);
$pdf->Ln(10);
$pdf->SetFont('Arial','',13);
$pdf->Cell(40,4,'I d e n t i t a s  C a l o n  M a h a s i s w a / M a h a s i s w a ',0,0,'L');
$pdf->SetFont('Arial','',13);
$pdf->Cell(90);
$pdf->Cell(30,5,'N O. S E R I	:',0,0,'L');
$pdf->SetFont('Courier','',14);
$pdf->Cell(30,5, $KwtNum,0,1,'L');

$pdf->Ln(0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(20,5,'N a m a    :',0,0,'L');
$pdf->SetFont('Courier','',11);
$pdf->Cell(40,5, $nama,0,1,'L');
$pdf->SetFont('Arial','',11);
$pdf->Cell(20,5,'N i m	       :',0,0,'L');
$pdf->SetFont('Courier','',11);
$pdf->Cell(30,5,$nim,0,1,'L');

$pdf->SetY(-108);
$pdf->Cell(130);
$pdf->SetFont('Arial','',11);
$pdf->Cell(30,5,'S e m e s t e r	   :',0,0,'L');
$pdf->SetFont('Courier','',11);
$pdf->Cell(20,5,$semester,0,1,'L');
$pdf->Cell(130);
$pdf->SetFont('Arial','',11);
$pdf->Cell(30,5,'P r o d i	           :',0,0,'L');
$pdf->SetFont('Courier','',11);
$pdf->Cell(20,5,$prodi,0,1,'L');

$pdf->Ln(5);
$pdf->SetFont('Arial','',13);
$pdf->Cell(40,2,'J e n i s  P e m b a y a r a n ',0,0,'L');
$pdf->Ln(4);
$pdf->SetFont('Arial','',11);
$pdf->Cell(60,5,$bujitul2,0,0,'L');
$pdf->SetFont('Courier','',11);
$pdf->Cell(20,5,$fungsi->Ribuan($bujitul),0,1,'L');
$pdf->SetFont('Arial','',11);
$pdf->Cell(60,5,'B i a y a  U j i K e s e h a t a n		: ',0,0,'L');
$pdf->SetFont('Courier','',11);
$pdf->Cell(20,5,$fungsi->Ribuan($bujikes),0,1,'L');
$pdf->SetFont('Arial','',11);
$pdf->Cell(60,5,$spptetapa,0,0,'L');
$pdf->SetFont('Courier','',11);
$pdf->Cell(20,5,$fungsi->Ribuan($spptetap),0,1,'L');
$pdf->SetFont('Arial','',11);
$pdf->Cell(60,5,$sppprakteka,0,0,'L');
$pdf->SetFont('Courier','',11);
$pdf->Cell(20,5,$fungsi->Ribuan($spppraktek),0,1,'L');
$pdf->SetFont('Arial','',11);
$pdf->Cell(60,5,$sppteoria,0,0,'L');
$pdf->SetFont('Courier','',11);
$pdf->Cell(20,5,$fungsi->Ribuan($sppteori),0,1,'L');
$pdf->SetFont('Arial','',11);
$pdf->Cell(60,5,$blain2,0,0,'L');
$pdf->SetFont('Courier','',11);
$pdf->Cell(20,5,$fungsi->Ribuan($blain),0,1,'L');
$pdf->SetFont('Arial','',11);
$pdf->Cell(60,5,$blain3,0,0,'L');
$pdf->SetFont('Courier','',11);
$pdf->Cell(20,5,$fungsi->Ribuan($blain3a),0,1,'L');

$pdf->SetY(-92);
$pdf->Ln(3);
$pdf->SetFont('Arial','',11);
$pdf->Cell(130);
$pdf->Cell(80,5,'B i a y a  P e n g e m b a n g a n  U m u m	: ',0,0,'L');
$pdf->SetFont('Courier','',11);
$pdf->Cell(20,5,$fungsi->Ribuan($bpu),0,1,'L');
$pdf->SetFont('Arial','',11);
$pdf->Cell(130);
$pdf->Cell(80,5,'B i a y a  O p e r a s i o n a l  A k a d e m i k	: ',0,0,'L');
$pdf->SetFont('Courier','',11);
$pdf->Cell(20,5,$fungsi->Ribuan($boa),0,1,'L');
$pdf->SetFont('Arial','',11);
$pdf->Cell(130);
$pdf->Cell(80,5,'S e r a g a m			: ',0,0,'L');
$pdf->SetFont('Courier','',11);
$pdf->Cell(20,5,$fungsi->Ribuan($seragam),0,1,'L');
$pdf->SetFont('Arial','',11);
$pdf->Cell(130);
$pdf->Cell(80,5,'P P S				: ',0,0,'L');
$pdf->SetFont('Courier','',11);
$pdf->Cell(20,5,$fungsi->Ribuan($pps),0,1,'L');
$pdf->SetFont('Arial','',11);
$pdf->Cell(130);
$pdf->Cell(80,5,$blain4,0,0,'L');
$pdf->SetFont('Courier','',11);
$pdf->Cell(20,5,$fungsi->Ribuan($blain4a),0,1,'L');
$pdf->SetFont('Arial','',11);
$pdf->Cell(130);
$pdf->Cell(80,5,$blain5,0,0,'L');
$pdf->SetFont('Courier','',11);
$pdf->Cell(20,5,$fungsi->Ribuan($blain5a),0,1,'L');


$pdf->SetY(-53);
$pdf->SetFont('Arial','',11);
$pdf->Cell(60,5,'T o t a l  Y a n g  d i b a y a r		: ',0,0,'L');
$pdf->SetFont('Courier','',11);
$pdf->Cell(60,5,'Rp '.$fungsi->Ribuan($total),1,1,'L');

$pdf->SetFont('Courier','',10);
$pdf->Cell(130,5,'##'.$fungsi->Terbilang($total).' R U P I AH ##',0,'L');
/*$pdf->SetAuthor('http://www.tamzis.id',true);*/
$pdf->Output();
$fungsi->insertData($nama,$nim,$semester,$prodi,$bujitul2,$bujitul,$bujikes,$spptetapa,$spptetap,$sppprakteka,$spppraktek,$sppteoria,$sppteori,$bpu,$boa,$seragam,$pps,$blain2,$blain,$blain3,$blain3a,$blain4,$blain4a,$blain5,$blain5a,$total,$admins );
?>
