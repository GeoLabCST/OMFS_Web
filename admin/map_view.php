<!DOCTYPE html>
<html>
<head>
    <?php 
        include('config.php');


?>   
	  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OMFS</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.0-rc.3/dist/leaflet.css" />
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="css/style.css" rel="stylesheet" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
    
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
	<style>
	h1 {
			font-family: "th sarabunpsk", Georgia, Serif;
			font-size : 30px;
		}

		.info {
			padding: 6px 8px;
			font: 14px/16px Arial, Helvetica, sans-serif;
			background: white;
			background: rgba(255,255,255,0.8);
			box-shadow: 0 0 15px rgba(0,0,0,0.2);
			border-radius: 5px;
		}
		.info h4 {
			margin: 0 0 5px;
			color: #777;
		}

		.legend {
			text-align: left;
			line-height: 30px;
			color: #555;
		}
		.legend i {
			width: 18px;
			height: 18px;
			float: left;
			margin-right: 8px;
			opacity: 0.9;
		}
	</style>




</head>
<body>

	<div class="col-md-12 ">
		<div id="map" style="width: 100%; height: 650px;" ></div>
    </div>


	<script src="https://unpkg.com/leaflet@1.0.0-rc.3/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://leaflet.github.io/Leaflet.markercluster/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://leaflet.github.io/Leaflet.markercluster/dist/MarkerCluster.Default.css" />
    <script src="https://leaflet.github.io/Leaflet.markercluster/dist/leaflet.markercluster-src.js"></script>


	<script type="text/javascript">

	var map = L.map('map');
    var OpenStreetMap_BlackAndWhite = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3']
    });

    OpenStreetMap_BlackAndWhite.addTo(map);
    map.setView([13.1610066,101.2644563], 5);


	var markers = new L.MarkerClusterGroup();

 
<?php
$result1 = pg_query($db, "select * from report where user_id = $id;");
while ($arr = pg_fetch_array($result1)) { ?>

markers.addLayer(L.marker([<?php
				 echo  $arr[lat],',',$arr[lon];?>]).bindPopup("<?php echo "<table class='table table-striped table-hover'><tbody><tr><td>ชื่อเรื่อง : </td><td>$arr[title]</td></tr><tr><td>คำอธิบาย : </td><td>$arr[description]</td></tr><tr><td>รายงาน : </td><td>$arr[reportor]</td></tr><tr><td>วัน/เดือน/ปี : </td><td>$arr[datereport]</td></tr></tbody></table><img src='http://119.59.125.189/service/uploads/$arr[img64]' width='300px'>" ?>") )

		
<?php } ?>
		


map.addLayer(markers);


	</script>
	

</body>
</html>
