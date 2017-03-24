<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET')
{
	$type = filterAlphanumeric($_GET["type"]);


	$scene = filterAlphanumeric($_GET["scene"]);

	if(!file_exists("./RunIDs/" . $type . "/" . $scene . "/run_data.txt"))
	{
		$newfile=fopen("./RunIDs/" . $type . "/" . $scene . "/run_data.txt", "w");
		fwrite($newfile,"1");
		fclose($newfile);
	}
	
	$datafile=fopen("./RunIDs/" . $type . "/" . $scene . "/run_data.txt", "r");
	$datacount=intval(fread($datafile,filesize("./RunIDs/" . $type . "/" . $scene . "/run_data.txt")));
	fclose($datafile);
	
	echo $datacount;
	
	$datacount=$datacount+1;
	
	$writefile=fopen("./RunIDs/" . $type . "/" . $scene . "/run_data.txt", "w");
	fwrite($writefile,strval($datacount));
	fclose($writefile);
	
}

function filterAlphanumeric($str) {
	return preg_replace("/[^a-zA-Z0-9]+/", "", $str);
}
?>