<?php 

function rubah($tanggal)
{
	$tanggals = explode('-', $tanggal);
	$tanggal = '"'.$tanggals[2].'/'.$tanggals[1].'"';
	return strval($tanggal);
}

?>