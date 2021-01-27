<?php 

function kesimpulan($persen)
{
	if($persen >= 90)
		return 'Soal kategori mudah';
	else if($persen >= 75)
		return 'Soal kategori sedang';
	else if($persen >= 50)
		return 'Soal kategori sulit';
	else if($persen >= 10)
		return 'Soal kategori sangat sulit';
	else
		return 'Soal atau kunci jawaban salah';
}

?>