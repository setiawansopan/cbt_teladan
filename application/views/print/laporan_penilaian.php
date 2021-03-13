<!DOCTYPE html>
<html>
<head>
	<title>Laporan Penilaian</title>
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
<body>
		<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Daftar Nilai $identitas->ujian_nama Mapel $identitas->mapel_nama Kelas $identitas->ujian_tingkat.xls");
	?>
<h3 align="center">LAPORAN HASIL PENILAIAN</h3>
<table width="40%">
	<tr>
		<td>Mata Pelajaran</td>
		<td>:</td>
		<td><?php echo $identitas->mapel_nama; ?></td>
	</tr>
	<tr>
		<td>Tingkat Kelas</td>
		<td>:</td>
		<td><?php echo $identitas->ujian_tingkat; ?></td>
	</tr>
	<tr>
		<td>Hari/Tgl</td>
		<td>:</td>
		<td><?php 
		$day = date('D', strtotime($identitas->ujian_tanggal));
		echo hari($day).', '.tanggal($identitas->ujian_tanggal); ?></td>
	</tr>
</table>
<br>
<table width="100%" border="1" >
	 <tr>
	 	<th>No</th>
		<th>Jenis</th>
	 	<th>Tgl. Penilaian</th>
	 	<th>Wkt. Mulai</th>
	 	<th>NIS</th>
	 	<th>Nama</th>
	 	<th>Kelas</th>
	 	<th>Benar</th>
	 	<th>Salah</th>
	 	<th>Nilai</th>
	 	<th>Total Skor</th>
	 </tr>
	 <?php 
	 $no = 1;
	 foreach ($laporan as $value) { ?>
	 <tr>
	 	<td align="center"><?php echo $no; ?></td>
		<td align="center"><?php if($value['pu_jenis'] == 'U') echo "Utama"; else if($value['pu_jenis'] == 'S') echo "Susulan"; else if($value['pu_jenis'] == 'R') echo "Remidi"; else echo "-"; ?></td>
	 	<td align="center"><?php $tgl = explode(' ', $value['pu_mulai']); echo $tgl[0]; ?></td>
	 	<td align="center"><?php echo $tgl[1]; ?></td> 
	 	<td align="center"><?php echo $value['peserta_nis']; ?></td>
	 	<td><?php echo strtoupper($value['peserta_nama']); ?></td>
	 	<td align="center"><?php echo $value['peserta_kelas']; ?></td>
	 	<td align="center"><?php echo $value['benar']; ?></td>
	 	<td align="center"><?php echo $value['salah']; ?></td>
	 	<td align="center"><?php echo $value['nilai']; ?></td>
	 	<td align="center"><?php echo $value['max_skor']; ?></td>
	 </tr>
	 <?php $no++; } ?>
</table>

</body>
</html>