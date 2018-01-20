<!--                      *      .--.
                           / /  `
          +               | |
                 '         \ \__,
             *          +   '--'  *
                 +   /\
    +              .'  '.   *
           *      /======\      +
                 ;:.  _   ;
                 |:. (_)  |
                 |:.  _   |
       +         |:. (_)  |          *
                 ;:.      ;
               .' \:.    / `.
              / .-'':._.'`-. \
              |/    /||\    \|
            _..--"""````"""--.._
      _.-'``                    ``'-._
    -'         Hello, GeoLab          '- -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <title>O-M-F-S</title>
	<!-- External lib: ExtJS -->
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/extjs/3.4.1-1/adapter/ext/ext-base.js"></script>
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/extjs/3.4.1-1/ext-all.js"></script>
	<link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/extjs/3.4.1-1/resources/css/ext-all.css"/>
    <link rel="stylesheet" type="text/css" title="gray" href="http://cdnjs.cloudflare.com/ajax/libs/extjs/3.4.1-1/resources/css/xtheme-gray.css" />

	<!-- External lib: Proj4JS (reproject lib) -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/proj4js/1.1.0/proj4js-compressed.js" type="text/javascript"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBe40XxCWIHdUwAjrF3eAo-jp7pxqoQEEI"></script>

	<!-- External lib: Proj4JS (reproject lib) -->
	<!--script src="http://cdnjs.cloudflare.com/ajax/libs/proj4js/1.1.0/proj4js-compressed.js" type="text/javascript"></script-->
	<script type="text/javascript" src="resources/proj4js/lib/proj4js-compressed.js"></script>
	<script type="text/javascript" src="resources/proj4js/lib/defs/EPSG3857.js"></script>
	<script type="text/javascript" src="resources/proj4js/lib/defs/EPSG4326.js"></script>
	<script type="text/javascript" src="resources/proj4js/lib/defs/EPSG32647.js"></script>

	<!-- External lib: OpenLayers -->
	<link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/openlayers/2.12/theme/default/style.css"/>
	<!--script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/openlayers/2.12/OpenLayers.debug.js"></script-->
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/openlayers/2.12/OpenLayers.debug.js"></script>

	<!-- External lib: GeoExt -->
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/geoext/1.1/script/GeoExt.js"></script>
	<script type="text/javascript" src="ux/gxp/gxp.js"></script>

	<!-- application -->
	<link rel="stylesheet" type="text/css" href="resources/css/default.css"/>  <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="resources/css/default-theme-gray.css"/>
    <link rel="stylesheet" type="text/css" href="ux/gxp/git/src/theme/all.css"/>
	<link rel="stylesheet" type="text/css" href="resources/css/portal.css"/>

	 <!-- OpenStreetMap base layer js -->
    <script src="http://www.openstreetmap.org/openlayers/OpenStreetMap.js"></script>

	<!-- Script and css resources for printpreview ux -->
	<script type="text/javascript" src="ux/printpreview/lib/GeoExt.ux/PrintPreview.js"></script>
	<script type="text/javascript" src="ux/printpreview/lib/locale/PrintPreview-en.js"></script>
	<link rel="stylesheet" type="text/css" href="ux/printpreview/resources/css/printpreview.css" />

	
	<!-- OpenStreetMap base layer js chai edit core map -->
	<script type="text/javascript" src="script/Coremap.js"></script>
	<script type="text/javascript" src="lib/i18n/en_US.js"></script>


</head>
<body>
<?php

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

$setDefault = '<script>var center = "11140015,1901789";
		var zoom = 8;
		var filter_pro = null;
		var filter_amp = null;
		var filter_tam = null;
		var lyrvisible_pro = true;
		var lyrvisible_amp = true;
		var lyrvisible_tam = true;
		var lyrvisible_vill = true;
		var lyrvisible_alr = true; </script>';

    require('../../lib/con_heron.php');
    $dbconn = pg_connect($conn_omfs) or die('Could not connect');

function getdat($getVal, $getFiedlName) {
    $getsql = '';
    if (strlen($getVal) == 2) {
        $getsql = "SELECT pv_tn as n, st_x(st_transform(st_centroid(geom),3857)) as x, st_y(st_transform(st_centroid(geom),3857)) as y, ST_Extent(geom) as b FROM province WHERE pv_code = '$getVal' group by n,x,y";
        $row = pg_fetch_array(pg_query($getsql));
        $sendname = $row[$getFiedlName];
        return $sendname;
    }
    elseif(strlen($getVal) == 4) {
        $getsql = "SELECT ap_tn as n, st_x(st_transform(st_centroid(geom),3857)) as x, st_y(st_transform(st_centroid(geom),3857)) as y, ST_Extent(geom) as b FROM amphoe WHERE ap_code = '$getVal' group by n,x,y";
        $row = pg_fetch_array(pg_query($getsql));
        $sendname = $row[$getFiedlName];
        return $sendname;
    }
    elseif(strlen($getVal) == 6) {
        $getsql = "SELECT tb_tn as n, st_x(st_transform(st_centroid(geom),3857)) as x, st_y(st_transform(st_centroid(geom),3857)) as y, ST_Extent(geom) as b FROM tambon WHERE tb_code = '$getVal' group by n,x,y";
        $row = pg_fetch_array(pg_query($getsql));
        $sendname = $row[$getFiedlName];
        return $sendname;
    }
};

function getbound($fetArr) {
    $arr = preg_split('/[\s,()]+/', $fetArr);
    $xyMin = $arr[1].','.$arr[2];
    $xyMax = $arr[3].','.$arr[4];
    $bbox = array($xyMin, $xyMax);
    return $bbox;
};

function dataLoad($prov_id, $amp_id, $tam_id){
    $prov_n = getdat($prov_id, 'n');
    $prov_x = getdat($prov_id, 'x');
    $prov_y = getdat($prov_id, 'y');
    $prov_b = getdat($prov_id, 'b');
    $prov_bb = getbound(getdat($prov_id, 'b'));

    $amp_n = getdat($amp_id, 'n');
    $amp_x = getdat($amp_id, 'x');
    $amp_y = getdat($amp_id, 'y');
    //$amp_bb = getbound(getdat('amp_4326','amp_nam_t', 'amp_code',$amp_id,'b'));

    $tam_n = getdat($tam_id, 'n');
    $tam_x = getdat($tam_id, 'x');
    $tam_y = getdat($tam_id, 'y');
    //$tam_bb = getbound(getdat('tam_4326','tam_nam_t', 'tam_code',$tam_id,'b'));

    //echo $prov_n.'-'.$prov_x.'-'.$prov_y.'-'.$prov_b.'-'.$prov_bb[0].'-'.$prov_bb[1];

    //echo '<script>var selectSource = "http://map.nu.ac.th/gs-alr2/ows?";</script>';
    // select area
    if ($tam_id > 0) {
        echo '<script>var filter_pro = "pv_code='.$prov_id.'";</script>';
        echo '<script>var filter_amp = "ap_code='.$amp_id.'";</script>';
        echo '<script>var filter_tam = "tb_code='.$tam_id.'";</script>';
        echo '<script>var center = "'.$tam_x.','.$tam_y.'";</script>';
        echo '<script>var zoom = 12;</script>';
        echo '<script>var lyrvisible_pro = false;</script>';
        echo '<script>var lyrvisible_amp = false;</script>';
        echo '<script>var lyrvisible_tam = true;</script>';
        echo '<script>var lyrvisible_vill = true;</script>';
        echo '<script>var lyrvisible_alr = true;</script>';
    }
    elseif($amp_id > 0) {
        echo '<script>var filter_pro = "pv_code='.$prov_id.'";</script>';
        echo '<script>var filter_amp = "ap_code='.$amp_id.'";</script>';
        echo '<script>var filter_tam = "ap_code='.$amp_id.'";</script>';
        echo '<script>var center = "'.$amp_x.','.$amp_y.'";</script>';
        echo '<script>var zoom = 11;</script>';
        echo '<script>var lyrvisible_pro = false;</script>';
        echo '<script>var lyrvisible_amp = true;</script>';
        echo '<script>var lyrvisible_tam = false;</script>';
        echo '<script>var lyrvisible_vill = true;</script>';
        echo '<script>var lyrvisible_alr = true;</script>';
    }
    elseif($prov_id > 0) {
        echo '<script>var filter_pro = "pv_code='.$prov_id.'";</script>';
        echo '<script>var filter_amp = "pv_code='.$prov_id.'";</script>';
        echo '<script>var filter_tam = "pv_code='.$prov_id.'";</script>';
        echo '<script>var center = "'.$prov_x.','.$prov_y.'";</script>';
        echo '<script>var zoom = 9;</script>';
        echo '<script>var lyrvisible_pro = true;</script>';
        echo '<script>var lyrvisible_amp = false;</script>';
        echo '<script>var lyrvisible_tam = false;</script>';
        echo '<script>var lyrvisible_vill = true;</script>';
        echo '<script>var lyrvisible_alr = true;</script>';
    } else {
        echo $setDefault;
    }
};

if (!isset($_GET) || empty($_GET)) {
    echo $setDefault;
}else{
	foreach($_GET as $key => $value) {
    	if($key == 'province'){

            if($value==0){
                echo $setDefault;
            }else{
                $prov_id = $_GET['province'];
                $amp_id = $_GET['amphoe'];
                $tam_id = $_GET['tambon'];
                //echo "$key: $value<br/>";
                dataLoad($prov_id,$amp_id,$tam_id);
            }

    	}elseif($key == 'province2'){

            if($value==0){
                echo $setDefault;
            }else{
                $prov_id = $_GET['province2'];
                $amp_id = $_GET['amphoe2'];
                $tam_id = $_GET['tambon2'];
                //echo "$key: $value<br/>";
                dataLoad($prov_id,$amp_id,$tam_id);
            }
    	}
	}
};


// Closing connection
pg_close($dbconn);
?>
	<!-- configuration: combine new layout with default map options -->
	<script type="text/javascript" src="staff_Layers.js"></script>
	<script type="text/javascript" src="staff_Toolbar.js"></script>
	<script type="text/javascript" src="Layout.js"></script>
</body>
</html>
