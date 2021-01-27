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
            width: 90%;
            margin: auto;
        }

        
        }

    </style>
</head>
<body>
		<?php
	// header("Content-type: application/vnd-ms-excel");
	// header("Content-Disposition: attachment; filename=Daftar Nilai $identitas->ujian_nama Mapel $identitas->mapel_nama Kelas $identitas->ujian_tingkat.xls");
	?>
<?php $this->load->view('dependen/kop');?>
<br>
<h3 align="center">LAPORAN PRESENSI SISWA</h3>
<br>
<table>
	<tr>
		<td>Tanggal Penilaian </td>
		<td> : </td>
		<td><?php echo tanggal($tanggal) ?></td>
	</tr>
	<tr>
		<td>Waktu Penilaian </td>
		<td> : </td>
		<td><?php echo $mulai ?> WIB</td>
	</tr>
</table>
<br>
<table width="100%" border="1" >
	<thead>
	 <tr>
	 	<th>No</th>
	 	<th>NIS</th>
	 	<th>Nama</th>
	 	<th>Kelas</th>
	 	<th>Status</th>
	 	<th>Keterangan</th>
	 </tr>
	 </thead>
	 <?php 
	 $no = 1;
	 foreach ($laporan as $value) { ?>
	 <tr>
	 	<td align="center"><?php echo $no; ?></td>
	 	<td align="center"><?php echo $value['peserta_nis']; ?></td>
	 	<td><?php echo strtoupper($value['peserta_nama']); ?></td>
	 	<td align="center"><?php echo $value['peserta_kelas']; ?></td>
	 	<td align="center"><?php echo $status; ?></td>
	 	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	 </tr>
	 <?php $no++; } ?>
</table>
<br>
<p>Jumlah siswa yg <?php echo strtolower($status) ?> penilaian sebanyak : <b><?php echo $no-1; ?></b> Siswa</p>
</body>
</html>