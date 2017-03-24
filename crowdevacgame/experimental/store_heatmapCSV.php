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
	$row = filterAlphanumeric($_POST['row']);
	$col = filterAlphanumeric($_POST['col']);

	$data = $_POST['data'];
	
	$sceneFolder = "./heatmapCSVs/" . $type . "/" . $scene;
	if (!is_dir($sceneFolder)) {
    	mkdir($sceneFolder, 0777, true);
	}
	$myFile = $sceneFolder . "/" . $runid . ".csv";
	$fh = fopen($myFile, 'w') or die("can't open file");
	
	$data_arr = explode(',',$data);
	
	$streamArr = array(array());
	$count=0;
	for($m = 0; $m < $row; $m++)
	{ 	
		for($n = 0; $n < $col; $n++)
		{
			
			$streamArr[$m][$n]= $data_arr[$count++];

		}
	}

	foreach ($streamArr as $fields) {
    		fputcsv($fh, $fields);
	}
	fclose($fh);
	echo "done";
}
// removes all non-alphanumeric characters
function filterAlphanumeric($str) {
	return preg_replace("/[^a-zA-Z0-9]+/", "", $str);
}
?>