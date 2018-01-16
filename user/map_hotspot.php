<!doctype html>
<html lang="en">
<?php
include('../../libs/config_omfs.php');

session_start();
$strpg = "SELECT * FROM user_profile  WHERE email_user = '".$_SESSION['email_user']."'   ";
    $objQuery = pg_query($db,$strpg);
    $objResult = pg_fetch_array($objQuery);

    $status = $objResult[status_user];


    if($_SESSION['email_user'] == "")
    {
        header('Location: ../');
        exit();
    }

    else if( $status != "register_web"  && $status != "register_app" && $status != "operational"   )
    {
        header('Location: ../');
        exit();
    }


?>
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />


    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />




    <!--  CSS LEAFLET     -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.1.0/dist/leaflet.css" integrity="sha512-wcw6ts8Anuw10Mzh9Ytw4pylW8+NAD4ch3lqm9lzAsTxg0GFeJgoAtxuCLREZSC5lUXdVyo/7yfsqFjQ4S+aKw==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.1.0/dist/leaflet.js" integrity="sha512-mNqn2Wg7tSToJhvHcqfzLMU6J4mkOImSPTxVZAdo+lcPlk+GhZmYgACEe0x35K7YzW1zJ7XyJV/TT1MrdXvMcA==" crossorigin=""></script>


    <style>
    #map {
        width: 800px;
        height: 500px;
    }

    .info {
        padding: 6px 8px;
        font: 14px/16px Arial, Helvetica, sans-serif;
        background: white;
        background: rgba(255, 255, 255, 0.8);
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
    }

    .info h4 {
        margin: 0 0 5px;
        color: #777;
    }

    .legend {
        text-align: left;
        line-height: 18px;
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

    <div class="wrapper">

        <div>
            <div class="content">
                <div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                </div>
                                <div class="content">
                                    <div id="map" style="width: 100%; height: 650px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="assets/js/bootstrap-checkbox-radio.js"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>


<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="assets/js/paper-dashboard.js"></script>

<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>


    
    <script type="text/javascript">
    var OBECData =    <?php
//-------------------------------------------------------------
// * Name: PHP-PostGIS2GeoJSON  
// * Purpose: GIST@NU (www.cgistln.nu.ac.th)
// * Date: 2016/10/13
// * Author: Chingchai Humhong (chingchaih@nu.ac.th)
// * Acknowledgement: 
//-------------------------------------------------------------
// Database connection settings


    // Retrieve start point
    // Connect to database

    $sql = "select *,ST_AsGeoJSON(geom) AS geojson from obec_data a full join province_sim b on a.prov_code = b.pv_code where re_royin like '%$reg' ; ";
   


   // Perform database query
   $query = pg_query($db,$sql);   
   //echo $sql;
    // Return route as GeoJSON
   $geojson = array(
      'type'      => 'FeatureCollection',
      'features'  => array()
   ); 
  
   // Add geom to GeoJSON array
   while($edge=pg_fetch_assoc($query)) {  
      $feature = array(
         'type' => 'Feature',
         'geometry' => json_decode($edge['geojson'], true),
         'crs' => array(
            'type' => 'EPSG',
            'properties' => array('code' => '4326')
         ),
            'properties' => array(
            'gid' => $edge['gid'],
            'pv_code' => $edge['pv_code'],
            'prov_nam_t' => $edge['pv_tn'],
            'value_sum' => $edge['std_ped'],
            'value' => number_format($edge['std_ped'])
         )
      );
      
      // Add feature array to feature collection array
      array_push($geojson['features'], $feature);
   }
   // Close database connection
   
   // Return routing result
   // header('Content-type: application/json',true);
  echo json_encode($geojson);

?>
    </script>
    

    <script type="text/javascript">

    <?php 
    $reg = $_GET['reg'];
    $sql2 = "select *,ST_AsGeoJSON(geom) AS geojson from fire_archive  limit 10 ; ";
    $query2 = pg_query($db,$sql2);
    $arr = pg_fetch_array($query2); 
    ?>


    var map = L.map('map');
    var OpenStreetMap_BlackAndWhite = L.tileLayer('http://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
	maxZoom: 17,
	attribution: 'Map data: &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
});
        
    OpenStreetMap_BlackAndWhite.addTo(map);
    map.setView([13.477466,101.587609],6);
    
    

        // control that shows state info on hover
        var info = L.control();

        info.onAdd = function (map) {
            this._div = L.DomUtil.create('div', 'info');
            this.update();
            return this._div;
        };

        
        info.update = function (props) {
            this._div.innerHTML = '<h5>แผนที่แสดงข้อมูล</h5>' +  (props ?
                '<b><center>' + props.prov_nam_t + '</b><br />' + props.value + ' คน'
                : '');
        };
        info.addTo(map);


        // get color depending on population PROV_CODE value



        function getColor(d) {
                    return  d > 1499 ? '#133926' :
                            d > 1199 ? '#206040' :
                            d > 999  ? '#2d8659' :
                            d > 799  ? '#39ac73' :
                            d > 599  ? '#53c68c' :
                            d > 399  ? '#79d2a6' :
                            d > 199  ? '#9fdfbf' :
                            d > 0    ? '#c6ecd9' :
                                        '#ecf9f2';
        }



        function style(feature) {
            return {
                weight: 2,
                opacity: 1,
                color: 'black',
                dashArray: '2',
                fillOpacity: 0.9,
                fillColor: getColor(feature.properties.value_sum)
            };
        }

        function highlightFeature(e) {
            var layer = e.target;

            layer.setStyle({
                weight: 5,
                color: 'white',
                dashArray: '',
                fillOpacity: 0.9
            });

            if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
                layer.bringToFront();
            }

            info.update(layer.feature.properties);
        }

        var geojson;

        function resetHighlight(e) {
            geojson.resetStyle(e.target);
            info.update();
        }

        function zoomToFeature(e) {
            map.fitBounds(e.target.getBounds());
        }

        function onEachFeature(feature, layer) {
             var popupContent = '<b>จังหวัด ' + feature.properties.prov_nam_t + '</b><br>' + feature.properties.value_sum + ' คน' ;
            layer.bindPopup(popupContent);
             layer.on({
                mouseover: highlightFeature,
                mouseout: resetHighlight,
				click : zoomToFeature
            });
        }

        geojson = L.geoJson(OBECData, {
            style: style,
            onEachFeature: onEachFeature
        }).addTo(map);



        var legend = L.control({position: 'bottomleft'});

        legend.onAdd = function (map) {
                var div = L.DomUtil.create('div', 'info legend'),
                      grades = [0, 200, 400, 600, 800, 1000, 1200, 1500],
                    labels = [],
                    from, to;


            for (var i = 0; i < grades.length; i++) {
                from = grades[i];
                to = grades[i + 1] - 1;

                labels.push(
                    '<i style="background:' + getColor(from + 1) + '"></i> ' +
                    from + (to ? '&ndash;' + to : '+')+ ' คน');
            }

            div.innerHTML = labels.join('<br>');
            return div;
        };

        legend.addTo(map);


        
    </script>
    

</html>