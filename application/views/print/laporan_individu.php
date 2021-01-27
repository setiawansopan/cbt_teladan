<!DOCTYPE html>
<html>
<head>
	<title>Laporan Penilaian Individu</title>
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

        
        }

    </style>
</head>
<body onload="window.print()">

<?php $this->load->view('dependen/kop');?>					

<h3 class="title" align="center"><strong>LAPORAN HASIL PENILAIAN</strong></h3>

	<h5 class="sub float-left">IDENTITAS</h5>

	<table width="70%">
		<tr>
			<td width="30%">Nama Peserta</td>
			<td width="5%">:</td>
			<td width="65%"><?php echo $identitas->peserta_nama; ?></td>
		</tr>
		<tr>
			<td >Kelas / NIS</td>
			<td >:</td>
			<td ><?php echo $identitas->peserta_kelas.' / '.$identitas->peserta_nis; ?></td>
		</tr>
		<tr>
			<td style="width: 30%">Penilaian</td>
			<td style="width: 1%">:</td>
			<td style="width: 60%"><?php echo $identitas->ujian_nama; ?></td>
		</tr>
		<tr>
			<td >Mata Pelajaran</td>
			<td >:</td>
			<td ><?php echo $identitas->mapel_nama; ?></td>
		</tr>
		<tr>
			<td >Tanggal</td>
			<td >:</td>
			<td ><?php
			$day = date('D', strtotime($identitas->ujian_tanggal)); 
			echo hari($day).', '.tanggal($identitas->ujian_tanggal); ?>
			</td>
		</tr>
		<tr>
			<td >Pukul</td>
			<td >:</td>
			<td ><?php 
			$mulai = explode(' ', $identitas->pu_mulai); echo $mulai[1]; ?> s/d
			<?php $selesai = explode(' ', $identitas->pu_selesai); echo $selesai[1];?> WIB 
		</td>
		</tr>				
	</table>	
	
<h5 class="text-uppercase mt-4 mb-3 fw-bold">
JAWABAN 
</h5>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
<?php
$no = 0;
foreach ($lembar_jawab as $value) {
$lj[] = $value['pj_jawaban'];
$lc[] = $value['soal_kunci'];
}

for ($i=1; $i<=10 ; $i++) { 
?>
<tr>
<?php
for ($j=$i; $j<=$jum_soal; $j+=10) { 
	?>
	<td width="10%" align="left"><?php echo $j ?>. <?php if(empty($lj[$j-1])) echo "-"; else echo $lj[$j-1]; ?> <?php if($lj[$j-1] == $lc[$j-1]) echo "(B)"; else echo "(S)";?></td>
<?php }
?>
</tr>

<?php }
?>
</table>

<p><font size="1" color="red">*Urutan soal <b>SESUAI</b> dengan urutan yang sebenarnya.</font></p>

<h5 class="text-uppercase mt-4 mb-3 fw-bold">HASIL KOREKSI </h5>
<table width="30%">
<tr>
	<td width="30%">Benar</td>
	<td width="5%">:</td>
	<td width="65%"><?php echo $koreksi->benar; ?> Soal</td>
</tr>
<tr>
	<td >Salah</td>
	<td >:</td>
	<td ><?php echo $koreksi->salah; ?> Soal</td>
</tr>
<tr>
	<td>Nilai</td>
	<td>:</td>
	<td><?php echo $koreksi->nilai; ?> / <?php echo $koreksi->max_skor; ?></td>
</tr>
</table>
<br><br>
<table align="right">
	<tr>
		<td>Yoyakarta, <?php echo tanggal($identitas->ujian_tanggal); ?></td>
	</tr>
	<tr><td>Guru Mata Pelajaran</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>.................</td></tr>
</table>
	

</body>
</html>