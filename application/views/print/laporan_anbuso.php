<!DOCTYPE html>
<html>
<head>
	<title>Laporan ANBUSO - <?php echo $kelas; ?> - <?php echo $ujian->mapel_nama; ?></title>
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

<?php $this->load->view('dependen/kop');?>					

<h3 class="title" align="center"><strong>ANALISIS BUTIR SOAL (ANBUSO)</strong></h3>
<table>
	<tr><td>Penilaian</td><td>: <?php echo $ujian->ujian_nama; ?></td></tr>
	<tr><td>Mata Pelajaran</td><td>: <?php echo $ujian->mapel_nama; ?> ( Penilaian <?php if($ujian->ujian_jenis == 'U') echo "Utama"; else if($ujian->ujian_jenis == 'S') echo "Susulan"; else echo "Remidi"; ?> ) </td></tr>
	<tr><td>Kelas</td><td>: <?php echo $kelas; ?></td></tr>
	<tr><td>Tanggal</td><td>: <?php  $day = date('D', strtotime($ujian->ujian_tanggal)); 
			 echo hari($day).', '.tanggal($ujian->ujian_tanggal); ?></td></tr>
	<tr><td>Pukul</td><td>: <?php echo $ujian->ujian_mulai.' s/d '.$ujian->ujian_selesai; ?> WIB</td></tr>
</table>
<br>
<table align="center" width="100%" border="1" cellpadding="4" cellspacing="3" >
	<thead>
	<tr>
		<th rowspan="2">No</th>
		<th rowspan="2">NIS</th>
		<th rowspan="2">Nama</th>
		<th colspan="<?php echo $jum_soal ?>">Nomor Soal</th>
		<th rowspan="2">BNR</th>
		<th rowspan="2">SLH</th>
		<th rowspan="2">KSG</th>
	</tr>
	<tr>

	<?php for($i=1;$i<=$jum_soal;$i++) { ?>
		<th><?php echo $i ?></th>
		<?php } ?> 	
	</tr>
	</thead>
	<tbody>
	<?php 
	$benar = array_fill(0, $jum_soal, 0);
	$salah = array_fill(0, $jum_soal, 0);
	$kosong = array_fill(0, $jum_soal, 0);
	$no = 1;
	foreach ($identitas as $value) {
	?>
	<tr>
		<td align="center"><?php echo $no; ?></td>
		<td align="center"><?php echo $value['peserta_nis']; ?></td>
		<td><?php echo strtoupper($value['peserta_nama']); ?></td>
		<?php 
		$index = 0;
		$jum_benar = 0;
		$jum_salah = 0;
		$jum_kosong = 0;
		foreach ($jawaban as $key) { 
		if($value['peserta_id'] == $key['pj_peserta_id']) {
			if($key['pj_jawaban'] == $key['soal_kunci']) 
			{
				$benar[$index] += 1; 
				$jum_benar += 1; 
			} 
			if($key['pj_jawaban'] != $key['soal_kunci']) 
			{
				$salah[$index] += 1; 
				$jum_salah += 1; 
			} 
			if($key['pj_jawaban'] == null) 
			{
				$kosong[$index] += 1; 
				$jum_kosong += 1; 
			} 
		?>
		<td align="center">	<?php echo $key['pj_jawaban']; ?>
		</td>
	    <?php $index++; }} ?>
	    <th><?php echo $jum_benar ?></th>
	    <th><?php echo $jum_salah ?></th>
	    <th><?php echo $jum_kosong ?></th>

	</tr>
	<?php $no++; } ?>
	<tr>
		<th colspan="3" align="right">Jumlah Benar</th>
		<?php for($i=0;$i<=$jum_soal-1;$i++) { ?>
		<th><?php echo $benar[$i] ?></th>
		<?php } ?>
	</tr>
	<tr>
		<th colspan="3" align="right">Jumlah Salah</th>
		<?php for($i=0;$i<=$jum_soal-1;$i++) { ?>
		<th><?php echo $salah[$i] ?></th>
		<?php } ?>
	</tr>
	<tr>
		<th colspan="3" align="right">Jumlah Tidak Menjawab</th>
		<?php for($i=0;$i<=$jum_soal-1;$i++) { ?>
		<th><?php echo $kosong[$i] ?></th>
		<?php } ?>
	</tr>
	</tbody>
</table>
<br>
<table>
	<tr><td>Peserta Hadir</td><td>: <?php $hadir = $no - 1; echo $hadir; ?> Siswa</td></tr>
</table>
<br>
<table align="right">
	<tr>
		<td>Yoyakarta, <?php echo tanggal($ujian->ujian_tanggal); ?></td>
	</tr>
	<tr><td>Guru Mata Pelajaran</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>.................</td></tr>
</table>
<div style="page-break-before:always;"></div>
<br>
<?php $this->load->view('dependen/kop');?>					
<h3 class="title" align="center"><strong>KESIMPULAN ANBUSO</strong></h3>
<table>
	<tr><td>Penilaian</td><td>: <?php echo $ujian->ujian_nama; ?></td></tr>
	<tr><td>Mata Pelajaran</td><td>: <?php echo $ujian->mapel_nama; ?></td></tr>
	<tr><td>Kelas</td><td>: <?php echo $kelas; ?></td></tr>
	<tr><td>Tanggal</td><td>: <?php  $day = date('D', strtotime($ujian->ujian_tanggal)); 
			 echo hari($day).', '.tanggal($ujian->ujian_tanggal); ?></td></tr>
	<tr><td>Pukul</td><td>: <?php echo $ujian->ujian_mulai.' s/d '.$ujian->ujian_selesai; ?> WIB</td></tr>
</table>
<br>
<table align="center" width="100%" border="1" cellpadding="4" cellspacing="3" >
	<thead>
	<tr>
		<th>No</th>
		<th>Nomor soal</th>
		<th>Benar</th>
		<th>Salah</th>
		<th>Kosong</th>
		<th>Prosentase Benar</th>
		<th>Kesimpulan</th>
	</tr>
	</thead>
	<?php 
	$n = 1;
	for ($no=0; $no < $jum_soal ; $no++) { 
	?>
	<tbody>
	<tr>
		<td align="center"><?php echo $n; ?></td>
		<td>Soal no - <?php echo $n; ?></td>
		<td align="center"><?php echo $benar[$no] ?></td>
		<td align="center"><?php echo $salah[$no] ?></td>
		<td align="center"><?php echo $kosong[$no] ?></td>
		<td align="center"><?php $persen = round(($benar[$no]/$hadir)*100); echo $persen; ?>%</td>
		<td><?php echo kesimpulan($persen) ?></td>
	</tr>
	<?php $n++; } ?> 
	</tbody>
</table>
</body>
</html>