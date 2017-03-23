<?php
	$srt_ar = array();
	$file = fopen("./files/test.srt", "r");
	$nb;
	$buff;
	$i;

	while ($nb = fgets($file))
	{
		$nb = substr($nb, 0, strlen($nb) - 2);
		if (is_numeric($nb))
		{
		//	$nb = intval($nb) - 1;
			$i = 0;
		//	$srt_ar[$nb] = array();
			$buff = fgets($file);
			$key = substr($buff, 0, strlen($buff) - 2);
			while(($buff = fgets($file)) && strcmp($buff, "\r\n") !== 0)
				$srt_ar[$key][$i++] = utf8_encode(substr($buff, 0, strlen($buff) - 2));
		}
	}
	$JSONfile = fopen("db/project.json", "w+");
	fwrite($JSONfile, json_encode($srt_ar));
	fclose($file);
	fclose($JSONfile);
?>
