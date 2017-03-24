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

	foreach ($loadedxml as $userdata):
		$pid=$userdata->{"Player-ID"};
		$tlos=$userdata->{"LevelOfService"};
		$thomo=$userdata->{"Homogeneity"};
		$tloa=$userdata->{"LevelOfAggression"};
		$checkH=$userdata->{"Checked-Heatmap"};
		$checkB=$userdata->{"Checked-BestHeatmap"};
	if( $tloa==$loa && substr($tlos,0, 1)==substr($los,0, 1) && $homo==$thomo)
	{	
		$telap=floatval($userdata->{"Time-Elapsed"});
		
		if($tempid == "")
		{
			$tempid=$pid;
			$timearr=array();
		}
		elseif($tempid != $pid && $tempid != "")
		{
			array_push($usertimearr,$timearr);
			$tempid=$pid;
			$timearr=array();
			array_push($timearr,$telap);
		}
		elseif($tempid == $pid)
		{
        		array_push($timearr,$telap);
		}
		
	}
		
    endforeach;
echo sizeof($usertimearr);
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
<?php
$usercount=1;
foreach ($usertimearr as $timearr){
?>
        var data = google.visualization.arrayToDataTable([
          ['userplays', 'Evacuation Time'],
<?php
$count=1;
foreach ($timearr as &$value) {
?>
          [<?php echo $count ?>,     <?php echo $value ?>],
<?php
$count=$count+1;
}
?>
]);
        var options = {
          title: 'Userplay vs. Time comparison',
          hAxis: {title: 'Userplay Instances'},
          vAxis: {title: 'Evacuation Time'},
          legend: 'none'
        };

        var chart = new google.visualization.ScatterChart(document.getElementById('chart_div' + <?php echo $usercount ?>));

        chart.draw(data, options);
<?php
$usercount=$usercount+1;
}
?>
      }
    </script>
  </head>
  <body>
<?php
$usercount=1;
foreach ($usertimearr as &$timearr){
?>
    <div id="chart_div<?php echo $usercount ?>" style="width: 900px; height: 500px;"></div>
<?php
$usercount=$usercount+1;
}
?>
  </body>
</html>