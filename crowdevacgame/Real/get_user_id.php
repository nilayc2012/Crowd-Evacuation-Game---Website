<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET')
{
	$type = filterAlphanumeric($_GET["type"]);
	if(!file_exists("./UserIDs/" . $type . "/user_id.txt"))
	{
		$newfile=fopen("./UserIDs/" . $type . "/user_id.txt", "w");
		fwrite($newfile,"1");
		fclose($newfile);
	}
	
	$datafile=fopen("./UserIDs/" . $type . "/user_id.txt", "r");
	$datacount=intval(fread($datafile,filesize("./UserIDs/" . $type . "/user_id.txt")));
	fclose($datafile);
	
	echo $datacount;
	
	$datacount=$datacount+1;
	
	$writefile=fopen("./UserIDs/" . $type . "/user_id.txt", "w");
	fwrite($writefile,strval($datacount));
	fclose($writefile);
	
}

function filterAlphanumeric($str) {
	return preg_replace("/[^a-zA-Z0-9]+/", "", $str);
}
?>