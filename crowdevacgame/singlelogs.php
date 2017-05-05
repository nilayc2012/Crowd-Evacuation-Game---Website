<?php
	$scene = $_POST["scene"];
	$loa = $_POST["loa"];
	$los = $_POST["los"];
	$homo = $_POST["homo"];



	$xmlfile = fopen("./experimental/XMLDocs/sp/" . $scene . ".xml", "r");
	$xmlstring = fread($xmlfile,filesize("./experimental/XMLDocs/sp/" . $scene . ".xml"));
	

	$loadedxml=simplexml_load_file("./experimental/XMLDocs/sp/" . $scene . ".xml");
	
	$usertimearr=array();
	$timearr=array();
	$tempid="";
	
	$totalcount=1;
	$totalpos=0;

	$innercount=0;
	$innerpos=0;
	$content="";

	foreach ($loadedxml as $userdata):
		$pid=$userdata->{"Player-ID"};
		$tlos=$userdata->{"LevelOfService"};
		$thomo=$userdata->{"Homogeneity"};
		$tloa=$userdata->{"LevelOfAggression"};
		$checkH=$userdata->{"Checked-Heatmap"};
		$checkB=$userdata->{"Checked-BestHeatmap"};
		$telap=floatval($userdata->{"Time-Elapsed"});


		if($tempid == "")
		{
			$tempid=$pid;
			$lasttime=floatval($telap);
		}
		elseif(strcmp($tempid, $pid)!=0 && $tempid != "")
		{
			$tempid=$pid;
			$content=$content . $innerpos . ","; 
			if($innerpos>0)
			{
				$totalpos=$totalpos+1;
			}

			$lasttime=floatval($telap);
			$innercount=0;
			$innerpos=0;
		$totalcount=$totalcount+1;

		}
		elseif(strcmp($tempid, $pid)==0)
		{
        		$innercount=$innercount+1;
			$roundeddiff=round($telap-$lasttime,1);
			
			$value=$roundeddiff *10;
			if($roundeddiff <0.1)
			{
				$innerpos=$innerpos+1;
			}
			else
			{
				$innerpos=$innerpos-1;
			}

			$lasttime=floatval($telap);
		}

    endforeach;

	$newfile = fopen("file.txt", "w");
	fwrite($newfile,$content);
	fclose($newfile);
$output=$totalpos/$totalcount;
echo "The success probability is " . $output ;
?>