<!DOCTYPE html>
<html>
<head>
	<title>Laporan Lembar Jawab</title>
	<style type="text/css">
        body, td, th {
            font-family: Arial, Helvetica, sans-serif;
            /*font-size: 13px;*/
        }

        table {
            border-collapse: collapse;
        }

        .kop p {
            margin: 0px !important;
        }

        .title h3, .title p {
            margin: 0px !important;
        }

        .identitas {
            margin: 10px 0px;
        }

        .hasil {
            font-style: italic;
        }

        .hasil h2 {
            margin: 10px 0px;
        }

        .nilai {
            font-size: 15px;
        }

        .nilai td {
            padding: 0px 10px;
            vertical-align: top;
        }

        .print-container {
            width: 95%;
            margin: auto;
        }

        .jawaban tr { height: 14px; }
        
        }

    </style>
</head>
<body >
<?php 
$urut = 1;
foreach ($identitas as $key) {
?>
<?php $this->load->view('dependen/kop');?>					

<h3 class="title" align="center"><strong>LEMBAR JAWAB</strong></h3>

	<h5 class="sub float-left">IDENTITAS</h5>

	<table width="70%">
		<tr>
			<td width="30%">Nama Peserta</td>
			<td width="5%">:</td>
			<td width="65%"><?php echo $key['peserta_nama']; ?></td>
		</tr>
		<tr>
			<td >Kelas / NIS</td>
			<td >:</td>
			<td ><?php echo $key['peserta_kelas'].' / '.$key['peserta_nis']; ?></td>
		</tr>
		<tr>
			<td style="width: 30%">Penilaian</td>
			<td style="width: 1%">:</td>
			<td style="width: 60%"><?php echo $key['ujian_nama']; ?></td>
		</tr>
		<tr>
			<td >Mata Pelajaran</td>
			<td >:</td>
			<td ><?php echo $key['mapel_nama']; ?></td>
		</tr>
		<tr>
			<td >Tanggal</td>
			<td >:</td>
			<td ><?php
			 $day = date('D', strtotime($key['ujian_tanggal'])); 
			 echo hari($day).', '.tanggal($key['ujian_tanggal']); ?>
			</td>
		</tr>
		<tr>
			<td >Pukul</td>
			<td >:</td>
			<td ><?php 
			$mulai = explode(' ', $key['pu_mulai']); echo $mulai[1]; ?> s/d
			<?php $selesai = explode(' ', $key['pu_selesai']); echo $selesai[1];?> WIB 
		</td>
		</tr>				
	</table>	
	
<h5 class="text-uppercase mt-4 mb-3 fw-bold">
JAWABAN 
</h5>
<table width="100%" border=0 cellspacing="5" cellpadding="5">
<tr><td valign="top"><table>
<?php
$n=1;$benar=0;$salah=0;$kosong=0;
foreach ($lembar_jawab as $value) {
if($key['peserta_id'] == $value['pj_peserta_id']) {

//koreksi
	if($value['pj_jawaban'] == $value['soal_kunci'])
	{ $ket = '(B)'; $benar += 1;}
	else if($value['pj_jawaban'] == null)
	{ $ket = '(K)'; $kosong += 1;}
	else 
	{ $ket = '(S)'; $salah += 1;}


if($n%10 == 0) {
echo "<tr height=15><td>".$n.". ".$value['pj_jawaban']." ".$ket."</td></tr></table></td><td valign='top'>";
echo "<table  class='jawaban'>"; 
}
if($n%10 != 0) {
echo "<tr height=15><td>".$n.". ".$value['pj_jawaban']." ".$ket."</td></tr>";
}

//skor soal
$skorpersoal = $value['soal_skor'];
$n++; 
}}?>
<!-- tutup tabel kecil -->
</td>
</tr>
</table>
<!-- tutup tabel besar -->
</td>
</tr>
</table>

<p><font size="1" color="red">*Urutan soal <b>SESUAI</b> dengan urutan yang sebenarnya.</font></p>
<h5 class="text-uppercase mt-4 mb-3 fw-bold">HASIL KOREKSI</h5>
<table width="20%">
	<tr>
		<td>Benar</td>
		<td>:</td>
		<td><?php echo $benar; ?></td>
	</tr>
	<tr>
		<td>Salah</td>
		<td>:</td>
		<td><?php echo $salah; ?></td>
	</tr>
	<tr>
		<td>Kosong</td>
		<td>:</td>
		<td><?php echo $kosong; ?></td>
	</tr>
	<tr>
		<td>Skor</td>
		<td>:</td>
		<td><?php echo $benar * $skorpersoal; ?> / <?php echo ($n-1) * $skorpersoal; ?></td>
	</tr>
</table>

<table align="right">
	<tr>
		<td>Yoyakarta, <?php echo tanggal($key['ujian_tanggal']); ?></td>
	</tr>
	<tr><td>Guru Mata Pelajaran</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>.................</td></tr>
</table>
<div style="page-break-before:always;"></div>
<?php  } ?>	

</body>
</html>