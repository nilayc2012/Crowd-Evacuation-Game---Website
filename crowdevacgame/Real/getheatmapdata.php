<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	//header('Content-Type: text/html');
	if (!isset($_POST['scene']) || empty($_POST['scene'])) {
		exit(0);
	}

	$type = filterAlphanumeric($_POST["type"]);
	$scene = filterAlphanumeric($_POST["scene"]);
	$loa=filterAlphanumeric($_POST["loa"]);
	$los=filterAlphanumeric($_POST["los"]);
	$homo=filterAlphanumeric($_POST["homo"]);
	// create XML file for current scvene if it doesn't yet exist
	if (!file_exists("./XMLDocs/". $type . "/" . $scene . ".xml"))	{
		createXMLFile($scene,$type);
	}
	$xmlfile = fopen("./XMLDocs/". $type . "/" . $scene . ".xml", "r");
	$xmlstring = fread($xmlfile,filesize("./XMLDocs/". $type . "/" . $scene . ".xml"));
	$mintime=PHP_INT_MAX;
	$leader="";
        $loadedxml=simplexml_load_file("./XMLDocs/". $type . "/" . $scene . ".xml");
	$minXML = "";
	foreach ($loadedxml as $userdata):
	        $telap=floatval($userdata->{"Time-Elapsed"});
		$tlos=$userdata->{"LevelOfService"};
		$thomo=$userdata->{"Homogeneity"};
		$tloa=$userdata->{"LevelOfAggression"};
		
		if($telap<=$mintime && $tloa==$loa && substr($tlos,0, 1)==substr($los,0, 1) && $homo==$thomo) {
			$mintime=$telap;
			$minXML = $userdata;
		}
	endforeach;
	if($mintime!=PHP_INT_MAX){
echo $minXML->asXML();}
}
// removes all non-alphanumeric characters
function filterAlphanumeric($str) {
	return preg_replace("/[^a-zA-Z0-9]+/", "", $str);
}
function createXMLFile($scene,$type) {
	$newfile = fopen("./XMLDocs/". $type . "/" . $scene . ".xml", "w");
	$writestring = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n<document>\n</document>";
	// write the data to the appropriate XML file
	fwrite($newfile,$writestring);
	fclose($newfile);
}
?>