
<!DOCTYPE html>
<html>
<head>	
	<title>map</title>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" integrity="sha512-M2wvCLH6DSRazYeZRIm1JnYyh22purTM+FDB5CsyxtQJYeKq83arPe5wgbNmcFXGqiSH2XR8dT/fJISVA1r/zQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js" integrity="sha512-lInM/apFSqyy1o6s89K4iQUKg6ppXEgsVxT35HbzUupEVRh2Eu9Wdl4tHj7dZO0s1uvplcYGmt3498TtHq+log==" crossorigin=""></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.2.0/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.2.0/dist/MarkerCluster.Default.css" />      
    <script type="text/javascript" src="http://calvinmetcalf.github.io/leaflet-ajax/dist/leaflet.ajax.js"></script>
    <script type="text/javascript" src="https://unpkg.com/leaflet.markercluster@1.2.0/dist/leaflet.markercluster.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1AO13H8MYTwPKioaW5qgGwdPXYpXbw4w"></script>
    <script src='https://unpkg.com/leaflet.gridlayer.googlemutant@latest/Leaflet.GoogleMutant.js'></script>    
    <script src="http://matchingnotes.com/javascripts/leaflet-google.js"></script>

  <body>

	<style>
		html, body {
			height: 100%;
			margin: 0;
		}
		#map {
			width: 100%;
			height: 100%;
		}
        #pano {
        height: 100%;
      }
	</style>
	
</head>

<?php
    if(isset($_GET['procode'])) {
        $code = $_GET['procode'];
        $lon = $_GET['lon'];        
        $lat = $_GET['lat'];        
        if($code == 'all'){
            echo "<script>var jsonUrl = 'http://cgi.uru.ac.th/service/hgis_accident_service.php'</script>";
            echo "<script>var chkLoc = 'all'; var lon = ".$lon."; var lat = ".$lat."; var zoom = 8;</script>";
        }else{
            echo "<script>var jsonUrl = 'http://cgi.uru.ac.th/service/hgis_accident_service.php?procode=".$code."'</script>";
            echo "<script>var chkLoc = '".$code."'; var lon = ".$lon."; var lat = ".$lat."; var zoom = 9; var cql='prov_code=".$code."';</script>";
        }
    }else if(isset($_GET['ampcode'])){
        $code = $_GET['ampcode'];
        $lon = $_GET['lon'];        
        $lat = $_GET['lat'];      
        
        echo "<script>var jsonUrl = 'http://cgi.uru.ac.th/service/hgis_accident_service.php?ampcode=".$code."'</script>";
        echo "<script>var chkLoc = '".$code."'; var lon = ".$lon."; var lat = ".$lat."; var zoom = 11; var cql='amp_code=".$code."';</script>";
        
    }else if(isset($_GET['tamcode'])){
        $code = $_GET['tamcode'];
        $lon = $_GET['lon'];        
        $lat = $_GET['lat'];   
        
        echo "<script>var jsonUrl = 'http://cgi.uru.ac.th/service/hgis_accident_service.php?tamcode=".$code."'</script>";
        echo "<script>var chkLoc = '".$code."'; var lon = ".$lon."; var lat = ".$lat."; var zoom = 12; var cql='tam_code=".$code."';</script>";
        
    }else{
        echo "<script>var jsonUrl = 'http://cgi.uru.ac.th/service/hgis_accident_service.php'</script>";
        echo "<script>var chkLoc = 'all'; var lon = 99.85; var lat = 16.8; var zoom = 8</script>";
    }

   
?>
<body>

<div id='map'></div>


<script>
    // $.get("http://cgi.uru.ac.th/service/hgis_accident_service.php", function(data, status){
    //     console.log("Data: " + data + "\nStatus: " + status);
    // });

	function onEachFeature(feature, layer) {
        //console.log(feature.properties.lon);
        var mrklon = feature.properties.lon;
        var mrklat = feature.properties.lat;
        var popupContent =             
            '<strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>'+
              '<p>'+feature.properties.ac_desc+'</p>'+
             ' <p>'+
                '<span class="label label-danger">lat: '+ feature.properties.lat +' lon: '+ feature.properties.lon +'</span>&nbsp;'+
                '<span class="label label-success">date: '+ feature.properties.ac_date +'</span>&nbsp;'+
                '<span class="label label-info">time: '+ feature.properties.ac_time +'</span>'+
                '<hr>'+
                '<img src="'+feature.properties.ac_img+'" width="400">'+
                '<hr>'+
                '<iframe src="streetview.php?lat='+mrklat+'&lon='+mrklon+'" width="400" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>'+
              '</p>';
    
        var widthPop = {
            minWidth: '400'
        };
        layer.bindPopup(popupContent, widthPop);
        //layer.bindPopup();
      };  
      
      var mbUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';
    
      var grayscale = L.tileLayer(mbUrl, {id: 'mapbox.light'});
      var streets = L.tileLayer(mbUrl, {id: 'mapbox.streets'});
      var roads = L.gridLayer.googleMutant({
            type: 'roadmap' // valid values are 'roadmap', 'satellite', 'terrain' and 'hybrid'
      });

      var satellite = L.gridLayer.googleMutant({
        type: 'satellite' // valid values are 'roadmap', 'satellite', 'terrain' and 'hybrid'
      });

      var terrain = L.gridLayer.googleMutant({
        type: 'terrain' // valid values are 'roadmap', 'satellite', 'terrain' and 'hybrid'
      }); 
    

      if(chkLoc=='all'){
        var pro = L.tileLayer.wms("http://map.nu.ac.th/geoserver-hgis/ows?", {
            layers: 'hgis:dpc9_province_4326',
            format: 'image/png',
            zIndex: 5,
            transparent: true
        });

        var amp = L.tileLayer.wms("http://map.nu.ac.th/geoserver-hgis/ows?", {
            layers: 'hgis:dpc9_amphoe_4326',
            format: 'image/png',
            zIndex: 5,
            transparent: true
        });

        var tam = L.tileLayer.wms("http://map.nu.ac.th/geoserver-hgis/ows?", {
            layers: 'hgis:dpc9_tambon_4326',
            format: 'image/png',
            zIndex: 5,
            transparent: true
        });

        var vill = L.tileLayer.wms("http://map.nu.ac.th/geoserver-hgis/ows?", {
            layers: 'hgis:dpc9_village_4326',
            format: 'image/png',
            zIndex: 5,
            transparent: true
        });
      }else{
        var pro = L.tileLayer.wms("http://map.nu.ac.th/geoserver-hgis/ows?", {
            layers: 'hgis:dpc9_province_4326',
            format: 'image/png',
            zIndex: 5,
            transparent: true,
            CQL_FILTER: cql
        });

        var amp = L.tileLayer.wms("http://map.nu.ac.th/geoserver-hgis/ows?", {
            layers: 'hgis:dpc9_amphoe_4326',
            format: 'image/png',
            zIndex: 5,
            transparent: true,
            CQL_FILTER: cql
        });

        var tam = L.tileLayer.wms("http://map.nu.ac.th/geoserver-hgis/ows?", {
            layers: 'hgis:dpc9_tambon_4326',
            format: 'image/png',
            zIndex: 5,
            transparent: true,
            CQL_FILTER: cql
        });

        var vill = L.tileLayer.wms("http://map.nu.ac.th/geoserver-hgis/ows?", {
            layers: 'hgis:dpc9_village_4326',
            format: 'image/png',
            zIndex: 5,
            transparent: true,
            CQL_FILTER: cql
        });
      }      
    
      var map = L.map('map', {
        center: [Number(lat), Number(lon)],
        zoom: Number(zoom),
        layers: []
      });
  
      var markers = L.markerClusterGroup();
  
      var accdent = new L.GeoJSON.AJAX(jsonUrl, {
        onEachFeature: onEachFeature,
        //style: lineStyle
      });
  
      accdent.on('data:loaded', function () {
        markers.addLayer(accdent);
      });            
    
      var baseLayers = {
        "แผนที่ขาวดำ": grayscale,
        "แผนที่ถนน(OSM)": streets,   
        "แผนที่ถนน(GoogleMaps)": roads.addTo(map),
        "แผนที่ภาพดาวเทียม": satellite,
        "แผนที่ภูมิประเทศ": terrain,
      };
    
      var overlays = {
        "ขอบเขตจังหวัด": pro.addTo(map),
        "ขอบเขตอำเภอ": amp.addTo(map),
        "ขอบเขตตำบล": tam.addTo(map),        
        "ตำแหน่งหมู่บ้าน": vill,
        "ตำแหน่งเกิดเหตุ": markers.addTo(map)
      };
    
      L.control.layers(baseLayers, overlays).addTo(map);

      
    
</script>



</body>
</html>

