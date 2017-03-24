<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET')
{
        if (!isset($_GET['scene']) || empty($_GET['scene'])) {
                exit(0);
        }
        if (!isset($_GET['runid']) || empty($_GET['runid'])) {
                exit(0);
        }

	$type = filterAlphanumeric($_GET["type"]);
        $runID = filterAlphanumeric($_GET["runid"]);
        $scene = filterAlphanumeric($_GET["scene"]);
        $datafile=fopen("./heatmaps/" . $type . "/" . $scene . "/" . $runID . ".png", "rb");
        $data=fread($datafile,filesize("./heatmaps/" . $type . "/" . $scene . "/" . $runID . ".png"));
        fclose($datafile);
        
        echo $data;
        
}
// removes all non-alphanumeric characters
function filterAlphanumeric($str) {
        return preg_replace("/[^a-zA-Z0-9]+/", "", $str);
}
?>