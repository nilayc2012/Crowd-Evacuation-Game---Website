<?php
	$scene = $_POST["scene"];
	$loa = $_POST["loa"];
	$los = $_POST["los"];
	$homo = $_POST["homo"];



	$xmlfile = fopen("./experimental/XMLDocs/mp/" . $scene . ".xml", "r");
	$xmlstring = fread($xmlfile,filesize("./experimental/XMLDocs/mp/" . $scene . ".xml"));
	

	$loadedxml=simplexml_load_file("./experimental/XMLDocs/mp/" . $scene . ".xml");
	
	$timearr=array();

	foreach ($loadedxml as $userdata):
		$tlos=$userdata->{"LevelOfService"};
		$thomo=$userdata->{"Homogeneity"};
		$tloa=$userdata->{"LevelOfAggression"};
		$checkH=$userdata->{"Checked-Heatmap"};
		$checkB=$userdata->{"Checked-BestHeatmap"};
	if( $tloa==$loa && substr($tlos,0, 1)==substr($los,0, 1) && $homo==$thomo)
	{	
        	$telap=floatval($userdata->{"Time-Elapsed"});
		array_push($timearr,$telap);
	}
		
    endforeach;
$len = sizeof($timearr);

$datax = array();
for ($i = 1; $i <= len; $i++) {
    array_push($datax,$len);
}


?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
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

        var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>