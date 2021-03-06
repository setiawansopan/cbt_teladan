<!DOCTYPE html>
<html>
<head>
	<title>Form Upload Nilai</title>
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
<h3 align="center">Format Upload Nilai <?php echo $identitas->ujian_nama ?></h3>
<table width="40%" border="1">
	<tr>
		<td>Mata Pelajaran</td>
		<td>:</td>
		<td><?php echo $identitas->mapel_nama; ?></td>
	</tr>
    <tr>
		<td>ID Mapel</td>
		<td>:</td>
		<td><font color=red>Replace tulisan ini dengan ID Mapel</font></td>
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
	 	<th>NIS</th>
	 	<th>Nama</th>
	 	<th>Kelas</th>
	 	<th>Nilai</th>
	 </tr>
	 <?php 
	 $no = 1;
	 foreach ($laporan as $value) { ?>
	 <tr>
	 	<td align="center"><?php echo $no; ?></td>
	 	<td align="center"><?php echo $value['peserta_nis']; ?></td>
	 	<td><?php echo strtoupper($value['peserta_nama']); ?></td>
	 	<td align="center"><?php echo $value['peserta_kelas']; ?></td>
	 	<td align="center"><?php echo $value['nilai']; ?></td>
	 </tr>
	 <?php $no++; } ?>
</table>

</body>
</html>