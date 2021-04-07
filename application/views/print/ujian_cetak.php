<!DOCTYPE html>
<html>
<head>
	<title>Cetak Ujian</title>
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
<?php $this->load->view('dependen/kop');?>
<br>
<h3 align="center">LEMBAR SOAL</h3>
<br>
<table width="70%">
	<tr>
		<td>Nama </td>
		<td> : </td>
		<td><?php echo $identitas->ujian_nama; ?></td>
	</tr>
    <tr>
		<td>Mata Pelajaran </td>
		<td> : </td>
		<td><?php echo $identitas->mapel_nama; ?></td>
	</tr>
	<tr>
		<td>Tanggal </td>
		<td> : </td>
		<td><?php echo $identitas->ujian_tanggal; ?></td>
	</tr>
	<tr>
		<td>Waktu </td>
		<td> : </td>
		<td><?php echo $identitas->ujian_mulai." s/d ".$identitas->ujian_selesai; ?> WIB</td>
	</tr>
	<tr>
		<td>Kelas </td>
		<td> : </td>
		<td><?php echo $identitas->ujian_tingkat; ?></td>
	</tr>
</table>
<br>

<br>
<table width="100%" cellpadding="5" cellspacing="2" border="0">
	 <?php 
	 $no = 1;
	 foreach ($soal as $value) { ?>
	 <tr valign="top" >
	 	<td width="2%">&nbsp;<?php echo $no; ?>.</td>
	 	<td width="97%"><?php echo $value['soal_teks']; ?></td>
	 </tr>
     
	 <?php $no++; } ?>
     
</table>
<div style="page-break-before:always;"></div>
</body>
</html>