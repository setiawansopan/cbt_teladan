<?php 
//fungsi untuk merubah nama kelompok
function kelompok($kelompok)
{
	if($kelompok == 'A')
		return 'Wajib A';
	else if($kelompok == 'B')
		return 'Wajib B';
	else
		return 'Peminatan / Lintas Minat';
}