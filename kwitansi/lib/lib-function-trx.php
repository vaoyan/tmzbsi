<?php
/*
*Library untuk pemmbuatan aplikasi-aplikasi sederhana
*Oleh : Oyan Cresys
*www.facebook.com/oyancresys
*/
require('kwt-config-trx.php');
Class Fungsitrx extends KwtConfigtrx{	

			function Terbilang($satuan){
			$huruf = array("","S A T U","D U A","T I G A","E M P A T","L I M A","E N A M","T U J U H","D E L A P A N","S E M B I L A N","S E P U L U H","S E B E L A S");
			if($satuan<12)
			return " ".$huruf[$satuan];
			else if($satuan<20)
			return $this->Terbilang($satuan-10)." B E L A S";
			else if($satuan<100)
			return $this->Terbilang($satuan/10)." P U L U H".$this->Terbilang($satuan%10);
			elseif($satuan<200)
			return " S E R A T U S".$this->Terbilang($satuan-100);
			elseif($satuan<1000)
			return $this->Terbilang($satuan/100)." R A T U S".$this->Terbilang($satuan%100);
			elseif($satuan<2000)
			return "S E R I B U ".$this->Terbilang($satuan-1000);
			elseif($satuan<1000000)
			return $this->Terbilang($satuan/1000)." R I B U".$this->Terbilang($satuan%1000);
			elseif($satuan<1000000000)
			return $this->Terbilang($satuan/1000000)." J U T A".$this->Terbilang($satuan%1000000);
			elseif($satuan>=1000000000)
			echo "hasil terbilang tidak dapat di proses, nilai terlalu besar";
		}
		
		function Ribuan($angka){
			if($angka=='0')
		return '';
		 elseif($angka<100)
		return $angka.',-';
		else
		return number_format($angka,0,'','.').',-';
			}
		
		function Tanggal($param){
			$bulan=array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
			$bln=array('JAN','FEB','MAR','APR','MEI','JUN','JUL','AGU','SEP','OKT','NOV','DES');
			$blnRoma=array('I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
			switch($param){
				case 'tgl' : return date('d');//tanggal dengan 2 digit Angka
				break;
				case 'blnL' : return $bulan[date('m')-1];//nama bulan lengkap bahasa Indonesia
				break;
				case 'blnk' : return $bln[date('m')-1];//nama bulan singkat bahasa Indonesia
				break;
				case 'romawi' : return $blnRoma[date('m')-1];//bulan dalam angka romawi;
				break;
				case 'blnAngka' : return date('m'); // bulan dengan angka latin biasa, 2 digit;
				break;
				case 'THN' : return date('Y');//4 digit Tahun
				break;
				case 'th' : return date('y');//2 digit Tahun
				break;
				default: return '';
				}
			}
		function checkDB(){
			if($this->conn)
				if(mysql_select_db($this->dbName))
					return TRUE;
				else
					return FALSE;
		}
		function dbSetup(){
				if(mysql_query('CREATE DATABASE '.$this->dbName))
					echo "<b>Sukses!</b><br>Database berhasil dibuat, ";
				mysql_select_db($this->dbName);

				if(mysql_query("CREATE TABLE ".$this->dbName.".notatrx(
				`id` int(10) NOT NULL AUTO_INCREMENT,
                                `kwnumtrx` varchar(50) NOT NULL,
                                `payee` varchar(50) NOT NULL,
                                `nim` int(10) DEFAULT NULL,
                                `semester` int(10) DEFAULT NULL,
                                `prodi` varchar(20) DEFAULT NULL,
                                `bujitul2` varchar(40) NOT NULL,
                                `bujitul` int(12) DEFAULT NULL,
                                `bujikes` int(12) DEFAULT NULL,
                                `spptetapa` varchar(20) DEFAULT NULL,
                                `spptetap` int(12) DEFAULT NULL,
                                `sppprakteka` varchar(20) DEFAULT NULL,
                                `spppraktek` int(12) DEFAULT NULL,
                                `sppteoria` varchar(20) DEFAULT NULL,
                                `sppteori` int(12) DEFAULT NULL,
                                `bpu` int(12) DEFAULT NULL,
                                `boa` int(12) DEFAULT NULL,
                                `seragam` int(12) DEFAULT NULL,
                                `pps` int(12) DEFAULT NULL,
                                `blain2` varchar(40) DEFAULT NULL,
                                `blain` int(12) DEFAULT NULL,
                                `blain3` varchar(40) DEFAULT NULL,
                                `blain3a` int(12) DEFAULT NULL,
                                `blain4` varchar(30) DEFAULT NULL,
                                `blain4a` int(12) DEFAULT NULL,
                                `blain5` varchar(20) DEFAULT NULL,
                                `blain5a` int(12) DEFAULT NULL,
                                `total` int(12) DEFAULT NULL,
                                `pic` varchar(25) DEFAULT NULL,
                                `tglkw` varchar(20) NOT NULL,
                                `ket` varchar(20) NOT NULL,
                                PRIMARY KEY (`id`,`kwnum`),
  				KEY `id` (`id`)) ",$this->conn)){
					echo "Table Berhasi Dibuat<br>";
				}
				echo "Silakan Refresh atau tekan F5 di keyboard untuk menggunakan aplikasi <a class='btn btn-primary' href='index.html'>Refresh</a>";
				mysql_close($this->conn);
		}
		function ConnectDB(){
			if($this->conn )
				mysql_select_db($this->dbName);
		}
		function RetriveLastKwNums(){
			$LastKwNum='';
			$this->ConnectDB();
			$sql = 'SELECT kwnumtrx FROM notatrx';
			$retval = mysql_query($sql, $this->conn);
			while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
				$LastKwNum =  $row['kwnumtrx'];
			}

			if($LastKwNum=='')
				$LastKwNum = 0;
			return $LastKwNum;
			mysql_close($this->conn);
			}

		function tambahNol($x){
			$y=($x>9)?($x>99)?$x:'0'.$x:'00'.$x;
			return $y;
		}

		function KwNums(){
			$LastKwNum = explode('/',$this->RetriveLastKwNums());
			//mereset nomor jika
			if(count($LastKwNum)>1){
			if(intval($LastKwNum[3])!=$this->Tanggal('th'))
				$LastKwNum[0] = 1;
			else
			$LastKwNum[0]++;
	}
	else {$LastKwNum[0]++;}

			return $this->tambahNol($LastKwNum[0]).$this->kwNumPattern;
		}
		function insertData($nama,$nim,$semester,$prodi,$bujitul2,$bujitul,$bujikes,$spptetapa,$spptetap,$sppprakteka,$spppraktek,$sppteoria,$sppteori,$bpu,$boa,$seragam,$pps,$blain2,$blain,$blain3,$blain3a,$blain4,$blain4a,$blain5,$blain5a,$total,$pic,$ket){
			//insert nomor memo terbaru
			$this->ConnectDB();
			$kwnums = $this->KwNums();
			$tanggal = $this->Tanggal('tgl').' '.$this->Tanggal('blnL').' '.$this->Tanggal('THN');
			$sql = "INSERT INTO notatrx ( kwnumtrx, payee, nim, semester, prodi, bujitul2, bujitul, bujikes, spptetapa, spptetap, sppprakteka, spppraktek, sppteoria, sppteori, bpu, boa, seragam, pps, blain2, blain, blain3, blain3a, blain4, blain4a, blain5, blain5a, total, pic, tglkw, ket) VALUES ('$kwnums','$nama', '$nim','$semester','$prodi','$bujitul2','$bujitul','$bujikes','$spptetapa','$spptetap','$sppprakteka','$spppraktek','$sppteoria','$sppteori','$bpu','$boa','$seragam','$pps','$blain2','$blain','$blain3','$blain3a','$blain4','$blain4a','$blain5','$blain5a','$total','$pic','$tanggal','$ket')";
			if(! mysql_query($sql,$this->conn))
				echo "gagal -> ".mysql_error();
			else
				echo "berhasil";
		}
		function fetchData($query,$mode){
			$no=1;
			$this->ConnectDB();
			$sql = "SELECT * FROM notatrx WHERE kwnumtrx LIKE '%$query%' 
			OR payee LIKE '%$query%'
			OR nim LIKE '%$query%'
			OR semester LIKE '%$query%'
			OR prodi LIKE '%$query%'
			OR bujitul2 LIKE '%$query%'
			OR bujitul LIKE '%$query%'
			OR bujikes LIKE '%$query%'
			OR spptetap LIKE '%$query%'
			OR spptetapa LIKE '%$query%'
			OR sppprakteka LIKE '%$query%'
			OR spppraktek LIKE '%$query%'
			OR sppteoria LIKE '%$query%'
			OR sppteori LIKE '%$query%'
			OR bpu LIKE '%$query%'
			OR boa LIKE '%$query%'
			OR seragam LIKE '%$query%'
			OR pps LIKE '%$query%'
			OR blain2 LIKE '%$query%'
			OR blain LIKE '%$query%'
			OR blain3 LIKE '%$query%'
			OR blain3a LIKE '%$query%'
			OR blain4 LIKE '%$query%'
			OR blain4a LIKE '%$query%'
			OR blain5 LIKE '%$query%'
			OR blain5a LIKE '%$query%'
			OR total LIKE '%$query%'
			OR pic LIKE '%$query%'  
			OR tglkw LIKE '%$query%'
			OR ket LIKE '%$query%'";
			$retval = mysql_query($sql, $this->conn);
			//Pilih Modul Tabel atau Line
			if($mode == 'tab'){
			echo "<table width='150%' border='1' rules='all' class='arsip-hover'>";
			while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)){
				echo "<tr>
				<th width='2%'>No</th>
				<th width='3%'>NoSeri</th>
				<th width='3%'>Nama</th>
				<th width='2%'>Nim</th>
				<th width='2%'>Semester</th>
				<th width='2%'>Prodi</th>
				<th width='3%'>JenisBayar</th>
				<th width='2%'>Jumlah</th>
				<th width='3%'>B.Uji.Kes</th>
				<th width='3%'>JenisBayar</th>
				<th width='2%'>Jumlah</th>
				<th width='3%'>JenisBayar</th>
				<th width='2%'>Jumlah</th>
				<th width='3%'>JenisBayar</th>
				<th width='2%'>Jumlah</th>
				<th width='2%'>BPU</th>
				<th width='2%'>BOA</th>
				<th width='2%'>BiayaSeragam</th>
				<th width='2%'>BiayaPPS</th>
				<th width='3%'>JenisBayar</th>
				<th width='2%'>Jumlah</th>
				<th width='3%'>JenisBayar</th>
				<th width='2%'>Jumlah</th>
				<th width='3%'>JenisBayar</th>
				<th width='2%'>Jumlah</th>
				<th width='3%'>JenisBayar</th>
				<th width='2%'>Jumlah</th>
				<th width='3%'>Total</th>
				<th width='2%'>OPR</th>
				<th width='2%'>Tgl</th>
				<th width='3%'>Ket</th>
				</tr>";
				
				while ($row=mysql_fetch_array($retval)){
				
				echo "<tr>
				<td>".$no++."</td>
				<td>".$row['kwnumtrx']."</td>
				<td>".$row['payee']."</td>
				<td>".$row['nim']."</td>
				<td>".$row['semester']."</td>
				<td>".$row['prodi']."</td>
				<td>".$row['bujitul2']."</td>
				<td>".$row['bujitul']."</td>
				<td>".$row['bujikes']."</td>
				<td>".$row['spptetapa']."</td>
				<td>".$row['spptetap']."</td>
				<td>".$row['sppprakteka']."</td>
				<td>".$row['spppraktek']."</td>
				<td>".$row['sppteoria']."</td>
				<td>".$row['sppteori']."</td>
				<td>".$row['bpu']."</td>
				<td>".$row['boa']."</td>
				<td>".$row['seragam']."</td>
				<td>".$row['pps']."</td>
				<td>".$row['blain2']."</td>
				<td>".$row['blain']."</td>
				<td>".$row['blain3']."</td>
				<td>".$row['blain3a']."</td>
				<td>".$row['blain4']."</td>
				<td>".$row['blain4a']."</td>
				<td>".$row['blain5']."</td>
				<td>".$row['blain5a']."</td>
				<td>Rp ".$this->Ribuan($row['total'])."</td>
				<td>".$row['pic']."</td>
				<td>".$row['tglkw']."</td>
				<td>".$row['ket']."</td>
				</tr>";
				}
				 $no++;
				}
				
			echo "</table>";
			}
			if($mode == 'line'){
				while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)){
					echo "Nomor Kwitansi Transfer	: <h4>".$row['kwnumtrx']."</h4>";
					echo "Nama             		: ".$row['payee']."<br>";
					echo "Nim	       		: ".$row['nim']."<br>";
					echo "Semester	       		: ".$row['semester']."<br>";
					echo "Prodi          		: ".$row['prodi']."<br>";
					echo "Biaya Uji Tulis2      	: ".$row['bujitul2']."<br>";
					echo "Biaya Uji Tulis      	: ".$row['bujitul']."<br>";
					echo "Biaya Uji Kesehatan      	: ".$row['bujikes']."<br>";
					echo "SPP Tetapa      		: ".$row['spptetapa']."<br>";
					echo "SPP Tetap      		: ".$row['spptetap']."<br>";
					echo "SPP Prakteka      	: ".$row['sppprakteka']."<br>";
					echo "SPP Praktek      		: ".$row['spppraktek']."<br>";
					echo "SPP Teoria      		: ".$row['sppteoria']."<br>";
					echo "SPP Teori      		: ".$row['sppteori']."<br>";
					echo "Biaya Pengembangan Umum   : ".$row['bpu']."<br>";
					echo "Biaya Operasional Akademik: ".$row['boa']."<br>";
					echo "Seragam      		: ".$row['seragam']."<br>";
					echo "PPS      			: ".$row['pps']."<br>";
					echo "Biaya Lain2      		: ".$row['blain2']."<br>";
					echo "Biaya Lain      		: ".$row['blain']."<br>";
					echo "Biaya Lain3      		: ".$row['blain3']."<br>";
					echo "Biaya Lain3a      	: ".$row['blain3a']."<br>";
					echo "Biaya Lain4      		: ".$row['blain4']."<br>";
					echo "Biaya Lain4a      	: ".$row['blain4a']."<br>";
					echo "Biaya Lain5      		: ".$row['blain5']."<br>";
					echo "Biaya Lain5a      	: ".$row['blain5a']."<br>";
					echo "Total      		: ".$row['total']."<br>";
					echo "Tanggal Cetak    		: ".$row['tglkw']."<br>";
					echo "Keterangan    		: ".$row['ket']."<br>";
					echo "<hr>";
				}
			}
			
			if($mode == 'data'){
				while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)){
		
					
				}
			}
			
			mysql_close($this->conn);
		}       
    }               
?>                      