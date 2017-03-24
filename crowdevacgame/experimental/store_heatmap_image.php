<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (!isset($_POST['scene']) || empty($_POST['scene'])){
		exit(0);
	}
	if (!isset($_POST['runid']) || empty($_POST['runid'])){
		exit(0);
	}

	$type = filterAlphanumeric($_POST['type']);
	$scene = filterAlphanumeric($_POST['scene']);
	$runid = filterAlphanumeric($_POST['runid']);
	$myFile = $_FILES["fileUpload"]["tmp_name"];
	$content = '';
	$fh = fopen($myFile, 'r') or die("can't open file");
	while (!feof($fh)) {
		$content .= fgets($fh);
	}
	fclose($fh);
	
	$sceneFolder = "./heatmaps/" . $type . "/" . $scene;
	if (!is_dir($sceneFolder)) {
    	mkdir($sceneFolder, 0777, true);
	}
	$myFile = $sceneFolder . "/" . $runid . ".png";
	$fh = fopen($myFile, 'w') or die("can't open file");
	$stringData = $content; //"START:\n" . join(',\n',headerCustom()) . ' \END';
	fwrite($fh, $stringData);
	fclose($fh);
	echo "done";
}
// removes all non-alphanumeric characters
function filterAlphanumeric($str) {
	return preg_replace("/[^a-zA-Z0-9]+/", "", $str);
}
?>