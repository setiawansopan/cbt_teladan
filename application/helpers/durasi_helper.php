<?php

function durasi($menit)
{
	if($menit == 45)
		return '00:45:00';
	else if($menit == 60)
		return '01:00:00';
	else if($menit == 90)
		return '01:30:00';
	else if($menit == 120)
		return '02:00:00';
}