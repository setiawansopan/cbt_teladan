<!DOCTYPE html>
<html>
<head>
	<title>Laporan Daftar Hadir</title>
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
<body >
<?php 

foreach ($nilai as $val) {
$biji[]   = $val['nilai'];
$total[]  = $val['max_skor'];
}

$index = 0;
foreach ($kelas as $key) {
?>
<?php $this->load->view('dependen/kop');?>					

<h3 class="title" align="center"><strong>DAFTAR HADIR</strong></h3>
<table>
	<tr><td>Penilaian</td><td>: <?php echo $ujian->ujian_nama; ?></td></tr>
	<tr><td>Mata Pelajaran</td><td>: <?php echo $ujian->mapel_nama; ?> ( Penilaian <?php if($ujian->ujian_jenis == 'U') echo "Utama"; else if($ujian->ujian_jenis == 'S') echo "Susulan"; else echo "Remidi"; ?> ) </td></tr>
	<tr><td>Kelas</td><td>: <?php echo $key['peserta_kelas']; ?></td></tr>
	<tr><td>Tanggal</td><td>: <?php  $day = date('D', strtotime($ujian->ujian_tanggal)); 
			 echo hari($day).', '.tanggal($ujian->ujian_tanggal); ?></td></tr>
	<tr><td>Pukul</td><td>: <?php echo $ujian->ujian_mulai.' s/d '.$ujian->ujian_selesai; ?> WIB</td></tr>
</table>
<br>
<table align="center" width="100%" border="1" cellpadding="2" >
	<thead>
		<th>No</th>
		<th>NIS</th>
		<th>Nama</th>
		<th>Hadir</th>
		<th>Nilai</th>
	</thead>
	
	<?php 
	$no = 1;
	foreach ($identitas as $value) {
		if($value['peserta_kelas'] == $key['peserta_kelas']) {
	?>
	<tr>
		<td align="center"><?php echo $no; ?></td>
		<td align="center"><?php echo $value['peserta_nis']; ?></td>
		<td><?php echo strtoupper($value['peserta_nama']); ?></td>
		<!-- <td align="center"><?php //echo $value['peserta_kelas']; ?></td> -->
		<td align="center"><?php echo $value['mulai'].' - '.$value['selesai']; ?></td>
		<td align="center">
			<?php echo $biji[$index].'/'.$total[$index] ?>
		</td>
	</tr>
	<?php $no++; $index++;}} ?>
</table>
<br>
<table>
	<tr><td>Peserta Hadir</td><td>: <?php echo $no-1; ?> Siswa</td></tr>
</table>
<br>
<table align="right">
	<tr>
		<td>Yoyakarta, <?php //echo tanggal($key['ujian_tanggal']); ?></td>
	</tr>
	<tr><td>Guru Mata Pelajaran</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>.................</td></tr>
</table>
<div style="page-break-before:always;"></div>
<?php } ?>	

</body>
</html>