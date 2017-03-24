<?php
	if(!file_exists("./update_data.txt"))
	{
		$newfile=fopen("./update_data.txt", "w");
		fwrite($newfile,"1.0");
		fclose($newfile);
	}
	
	$datafile=fopen("./update_data.txt", "r");
	$data=fread($datafile,filesize("./update_data.txt"));
	fclose($datafile);
	
	echo $data;

?>