// hide sidebar onload
/*$(function(){
    $("#sidebar").hide();
});
*/
var map, featureLayers = [], featureLayersName = [];

//Site specific variables...
//these probably should be abstrated out into an optional local config file and/or local values pulled in from the getcapabilities request

//Native projection from GeoServer WFS
var src = new Proj4js.Proj('EPSG:4326');
var dst = new Proj4js.Proj('EPSG:4326')

//Attribution, get from WMS?
var layerAttribution = 'Data &copy <a href=http://119.59.125.189>GeoLab</a>, <a href="http://119.59.125.189">CC-BY</a>';

var osm = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
// add bing
//var imagerySet = "AerialWithLabels"; //Aerial AerialWithLabels | Birdseye | BirdseyeWithLabels | Road
var bingSatt = new L.BingLayer("LfO3DMI9S6GnXD7d0WGs~bq2DRVkmIAzSOFdodzZLvw~Arx8dclDxmZA0Y38tHIJlJfnMbGq5GXeYmrGOUIbS2VLFzRKCK0Yv_bAl6oe-DOc", {type: "AerialWithLabels"});

//var imageryRoad = "Road"; //Aerial AerialWithLabels | Birdseye | BirdseyeWithLabels | Road
var bingRoad = new L.BingLayer("LfO3DMI9S6GnXD7d0WGs~bq2DRVkmIAzSOFdodzZLvw~Arx8dclDxmZA0Y38tHIJlJfnMbGq5GXeYmrGOUIbS2VLFzRKCK0Yv_bAl6oe-DOc", {type: "Road"});

var ESRIStreets = new L.esri.basemapLayer("Streets", {
    attribution: "ESRI Streets",
    //maxZoom: 20,
    //maxNativeZoom: 18
});

var ESRITopographic = new L.esri.basemapLayer("Topographic", {
    attribution: "ESRI Topographic",
    //maxZoom: 20,
    //maxNativeZoom: 18
});

var baseLayers = {
  "Aerial maps": bingSatt,
  "Road maps": bingRoad,
  "ESRI Topographic": ESRITopographic,
  "OpenStreetMap": osm,


};

var pteCenter = new L.LatLng(14.04251, 100.62468);
var pteZoom = 10;
var sriCenter = new L.LatLng(14.60833, 100.99420);
var sriZoom = 10;

var uttCenter = new L.LatLng(17.749565,100.516856);
var uttZoom = 10;
var plkCenter = new L.LatLng(16.982697, 100.542852);
var plkZoom = 10;
var pyoCenter = new L.LatLng(19.22918, 100.17626);
var pyoZoom = 11;

var plgCenter = new L.LatLng(7.52405, 100.04539);
var plgZoom = 9;
var kbiCenter = new L.LatLng(8.15531, 99.01768);
var kbiZoom = 9;

var rygCenter = new L.LatLng(12.85408,101.428612);
var rygZoom = 10;
var skwCenter = new L.LatLng(13.75960, 102.27017);
var skwZoom = 10;
var priCenter = new L.LatLng(14.09063, 101.62737);
var priZoom = 10;

var rbrCenter = new L.LatLng(13.52866, 99.55655);
var rbrZoom = 10;
var pknCenter = new L.LatLng(11.78501, 99.70667);
var pknZoom = 8;

var srnCenter = new L.LatLng(14.88354, 103.66740);
var srnZoom = 10;
var kknCenter = new L.LatLng(16.408715, 102.578544);
var kknZoom = 10;
var brmCenter = new L.LatLng(14.82581, 102.96301);
var brmZoom = 10;
var bknCenter = new L.LatLng(18.148834, 103.710285);
var bknZoom = 10;

//var startCenter = new L.LatLng(-42.8232,147.2555); //uddit 17.631549, 100.092170 //mg 12.4,102.5 //plk 16.941423, 100.427628
// Thailand View Extent
var startCenter = new L.LatLng(13.341,100.427);
var startZoom = 6;

/* var searchBounds = new google.maps.LatLngBounds(
    new google.maps.LatLng(13.112764, 100.915003),
    new google.maps.LatLng(11.877127, 102.815626)); */

// xMin,yMin 97.3437,5.61274 : xMax,yMax 105.637,20.4649

//get the url parameters
var QueryString = function () {
  // This function is anonymous, is executed immediately and
  // the return value is assigned to QueryString!
  var query_string = {};
  var query = window.location.search.substring(1);
  var vars = query.split("&");
  for (var i=0;i<vars.length;i++) {
    var pair = vars[i].split("=");
      // If first entry with this name
    if (typeof query_string[pair[0]] === "undefined") {
      query_string[pair[0]] = pair[1];
      // If second entry with this name
    } else if (typeof query_string[pair[0]] === "string") {
      var arr = [ query_string[pair[0]], pair[1] ];
      query_string[pair[0]] = arr;
      // If third or later entry with this name
    } else {
      query_string[pair[0]].push(pair[1]);
    }
  }
    return query_string;
} ();

//WMS Base URL
var owsurl = QueryString.owsurl;
var ipnow = '119.59.125.189';
var ip = 'www3.cgistln.nu.ac.th';
if(!owsurl) {
  owsurl = "http://" + ipnow +"/geoserver/isnre/ows";
}

$(document).on("click", ".feature-row", function(e) {
  sidebarClick(parseInt($(this).attr('id')),layerControl);
});

$("#full-extent-btn").click(function() {
  map.setView(startCenter, startZoom);
  return false;
});

$("#full-extent-pte").click(function() {
  map.setView(pteCenter, pteZoom);
  return false;
});
$("#full-extent-sri").click(function() {
  map.setView(sriCenter, sriZoom);
  return false;
});


$("#full-extent-utt").click(function() {
  map.setView(uttCenter, uttZoom);
  return false;
});
$("#full-extent-plk").click(function () {
  map.setView(plkCenter, plkZoom);
  return false;
});
$("#full-extent-pyo").click(function () {
  map.setView(pyoCenter, pyoZoom);
  return false;
});


$("#full-extent-plg").click(function () {
  map.setView(plgCenter, plgZoom);
  return false;
});
$("#full-extent-kbi").click(function () {
  map.setView(kbiCenter, kbiZoom);
  return false;
});


$("#full-extent-ryg").click(function () {
  map.setView(rygCenter, rygZoom);
  return false;
});
$("#full-extent-skw").click(function () {
  map.setView(skwCenter, skwZoom);
  return false;
});
$("#full-extent-pri").click(function () {
  map.setView(priCenter, priZoom);
  return false;
});


$("#full-extent-rbr").click(function() {
  map.setView(rbrCenter, rbrZoom);
  return false;
});
$("#full-extent-pkn").click(function () {
  map.setView(pknCenter, pknZoom);
  return false;
});


$("#full-extent-srn").click(function () {
  map.setView(srnCenter, srnZoom);
  return false;
});
$("#full-extent-kkn").click(function () {
  map.setView(kknCenter, kknZoom);
  return false;
});
$("#full-extent-brm").click(function () {
  map.setView(brmCenter, brmZoom);
  return false;
});
$("#full-extent-bkn").click(function () {
  map.setView(bknCenter, bknZoom);
  return false;
});

$("#legend-btn").click(function() {
  //TODO: add all the currently added layers here, not just one...
  var text = "";
  for (i = 0; i < intLayers.length; i++) {
	text += "<b>" + intLayers[i] + "</b><br><img src="+owsurl+"?service=wms&request=getlegendgraphic&layer=" + intLayers[i] + "&format=image/png><br>";
  }
  $("#legend").html(text);
  $('#legendModal').modal('show');
  return false;
});

$("#list-btn").click(function() {
  $('#sidebar').toggle();
  map.invalidateSize();
  return false;
});

$("#nav-btn").click(function() {
  $(".navbar-collapse").collapse("toggle");
  return false;
});

/*
$("#chart-btn").click(function() {
  $("#chartModal").modal("show");
  return false;
})
*/

$("#measure-btn").click(function() {
  //$('#sidebar').toggle();
  measureControl.addTo(map);
  return false;
});


$("#about-btn").click(function() {
  $("#aboutModal").modal("show");
  $(".navbar-collapse.in").collapse("hide");
  return false;
})

$("#sidebar-toggle-btn").click(function() {
  $("#sidebar").toggle();
  map.invalidateSize();
  return false;
});

$("#sidebar-hide-btn").click(function() {
  $('#sidebar').hide();
  map.invalidateSize();
});

$('#search-form').submit(function(e) {
    alert("Working....");
});



//this is where I add the layer.
function sidebarClick(id) {
  var layer = featureLayers[id];
  var index = $.inArray(layer, intLayers);//intLayers.indexOf(layer);
  //only add the layer if it's not added already...
  if(index == -1) {
    addLayer(layer);
  }
}

function addLayer(layer) {
  var id = $.inArray(layer, featureLayers);
  if(id === -1) {
    return;
  }
  var newLayer = new L.TileLayer.WMS(owsurl + "?SERVICE=WMS&", {
          layers: layer,
          format: 'image/png',
          transparent: true,
          maxZoom: 20,
          attribution: layerAttribution
  });
  lOverlays[featureLayersName[id]] = newLayer;
  map.addLayer(newLayer);
  map.removeControl(layerControl);
  updateInteractiveLayers(layer);
  layerControl = L.control.layers(baseLayers, lOverlays, {
    collapsed: isCollapsed
  }).addTo(map);
  /* Hide sidebar and go to the map on small screens */

  if (document.body.clientWidth <= 767) {
    $("#sidebar").hide();
    map.invalidateSize();
  }
}

// overlay

var rainidw = L.tileLayer.wms("http://"+ip+"/geoserver/ows?", {
    layers: 'tmdservices:tmdrainfall',
    format: 'image/png',
    transparent: true,
    version: '1.1.0',
    attribution: "myattribution"
});

var tempidw = L.tileLayer.wms("http://"+ip+"/geoserver/ows?", {
    layers: 'tmdservices:geotiff_coverage',
    format: 'image/png',
    //opacity: 0.5,
    transparent: true,
    version: '1.1.0',
    attribution: "myattribution"
});

var lOverlays = {
	"ข้อมูลปริมาณน้ำฝน":	rainidw,
	"ข้อมูลอุณหภูมิเฉลี่ยรายวัน": tempidw
};

var intLayers = [];
var intLayersString = "";
function updateInteractiveLayers(layer) {
    var index = $.inArray(layer, intLayers);//intLayers.indexOf(layer);
    if(index > -1) {
        intLayers.splice(index,1);
    } else {
        intLayers.push(layer);
    }
    intLayersString = intLayers.join();
};

function handleJson(data) {
    selectedFeature = L.geoJson(data, {
        style: function (feature) {
            return {color: 'yellow'};
        },
        onEachFeature: function (feature, layer) {
            var content = "";
            content = content + "<b><u>" + feature.id.split('.')[0] + "</b></u><br>";
            delete feature.properties.bbox;
			//for (var name in feature.properties) {content = content + "<b>" + name + ":</b> " + feature.properties[name] + "<br>"};
            for (var name in feature.properties) {
				if(name=='img'){
					content = content + "<b>" + name + ":</b> " + feature.properties[name] + "<br>" + "<img src='http://"+ipnow+"/map/vmobile/uploads/"+feature.properties["img"]+"' height='142' />" + "<br>";
				}else{
					content = content + "<b>" + name + ":</b> " + feature.properties[name] + "<br>";
				//alert(name);
				}

				};
            var popup = L.popup({minWidth:240})
                .setLatLng(queryCoordinates)
                .setContent(content)
                .openOn(map);
            layer.bindPopup(content);
            layer.on({
                mouseover: highlightFeature,
                mouseout: resetHighlight
            });
        },
        pointToLayer: function (feature, latlng) {
            return L.circleMarker(latlng, {
                radius: 5,
                fillColor: "yellow",
                color: "#000",
                weight: 5,
                opacity: 0.6,
                fillOpacity: 0.2
            });
        }
    });
    selectedFeature.addTo(map);
}

//Query layer functionality.
var selectedFeature;
var queryCoordinates;

function highlightFeature(e) {
    var layer = e.target;
    layer.setStyle({
        fillColor: "yellow",
        color: "yellow",
        weight: 5,
        opacity: 1
    });

    if (!L.Browser.ie && !L.Browser.opera) {
        layer.bringToFront();
    }
}

function resetHighlight(e) {
    var layer = e.target;
    layer.setStyle({
        radius: 5,
        fillColor: "yellow",
        color: "yellow",
        weight: 5,
        opacity: 0.6,
        fillOpacity: 0.2
    });
}
// Add map
map = L.map("map", {
  zoom: startZoom,
  center: startCenter,
  layers: [bingRoad, rainidw],
  zoomControl: false,
  attributionControl: false,
  //measureControl: true
});

//add control
//mouse position
L.control.mousePosition().addTo(map);

//measure
var measureControl = L.control.measure({
	position: 'topleft'
});


//measureControl.addTo(map);

// add point
/*
map.on('click', function(e) {
    alert("Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng)
});
*/

//Set up trigger functions for adding layers to interactivity.
map.on('overlayadd', function(e) {
    updateInteractiveLayers(e.layer.options.layers);
});
map.on('overlayremove', function(e) {
    updateInteractiveLayers(e.layer.options.layers);
});

map.on('click', function(e) {

    if(intLayers.length === 0) {
      return;
    }
    if (selectedFeature) {
        map.removeLayer(selectedFeature);
    };
    //alert("ggggggggggggggg");
    var p = new Proj4js.Point(e.latlng.lat,e.latlng.lng);
    Proj4js.transform(src, dst, p);
    queryCoordinates = e.latlng;


    var defaultParameters = {
        service : 'WFS',
        version : '1.1.0',
        request : 'GetFeature',
        typeName : intLayersString,
        maxFeatures : 100,
        outputFormat : 'text/javascript',
        format_options : 'callback:getJson',
        SrsName : 'EPSG:4326'
    };

    var customParams = {
        cql_filter:'DWithin(geom, POINT(' + p.x + ' ' + p.y + '), 0.0009, meters)'
    };

    var parameters = L.Util.extend(defaultParameters,customParams);

    var url = owsurl + L.Util.getParamString(parameters)
	//prompt("test",url);
    $.ajax({
        url : owsurl + L.Util.getParamString(parameters),
        dataType : 'jsonp',
        jsonpCallback : 'getJson',
        success : handleJson
    });
});

/* Attribution control */
function updateAttribution(e) {
  var attributiontext = "";
  var attributions = []
  $.each(map._layers, function(index, layer) {
    if (layer.getAttribution) {
      if($.inArray(layer.getAttribution(), attributions) === -1) {
        attributiontext = attributiontext + layer.getAttribution() + '<br>'
        attributions.push(layer.getAttribution())
      }
    }
  });
  $("#attribution").html((attributiontext));
}
map.on("layeradd", updateAttribution);
map.on("layerremove", updateAttribution);

var attributionControl = L.control({
  position: "bottomright"
});
attributionControl.onAdd = function (map) {
  var div = L.DomUtil.create("div", "leaflet-control-attribution");
  div.innerHTML = "<span class='hidden-xs'>Developed by <a href='#'>GeoLab</a> | </span><a href='#' onclick='$(\"#attributionModal\").modal(\"show\"); return false;'>Attribution</a>";
  return div;
};
map.addControl(attributionControl);

var zoomControl = L.control.zoom({
  position: "bottomright"
}).addTo(map);

/* GPS enabled geolocation control set to follow the user's location */
var locateControl = L.control.locate({
  position: "bottomright",
  drawCircle: true,
  follow: true,
  setView: true,
  keepCurrentZoomLevel: true,
  markerStyle: {
    weight: 1,
    opacity: 0.8,
    fillOpacity: 0.8
  },
  circleStyle: {
    weight: 1,
    clickable: false
  },
  icon: "icon-direction",
  metric: false,
  strings: {
    title: "My location",
    popup: "You are within {distance} {unit} from this point",
    outsideMapBoundsMsg: "You seem located outside the boundaries of the map"
  },
  locateOptions: {
    maxZoom: 18,
    watch: true,
    enableHighAccuracy: true,
    maximumAge: 10000,
    timeout: 10000
  }
}).addTo(map);

$.ajax({
    type: "GET",
    url: owsurl + "?SERVICE=WMS&request=getcapabilities",
    dataType: "xml",
    success: parseXml
  });

function parseXml(xml)
{
  var layerIndex = 0
  $(xml).find("Layer").find("Layer").each(function()
  {
    var title = $(this).find("Title").first().text();
    var name = $(this).find("Name").first().text();

    //Check for layer groups
    var patt = new RegExp("Group");
    var res = patt.test(title);
    if(!res) {
    featureLayers.push(name)
      featureLayersName.push(title)
	   $("#feature-list tbody").append('<tr class="feature-row" id="'+layerIndex+'"><td style="vertical-align: middle;"><img width="16" height="18" src="assets/img/map.png"></td><td class="feature-name">'+title+'</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      layerIndex = layerIndex + 1;
    }
  });

//Check for initial layers.
var layersString = QueryString.layers;
if(layersString) {
  var layersList = layersString.split(',')
  for (i = 0; i < layersList.length; i++) {
    addLayer(layersList[i].replace('/',''));
  }
}

//Ok, got to get the searching working...
$(document).ready(function () {
    (function ($) {
        $('#layerfilter').keyup(function () {
            var rex = new RegExp($(this).val(), 'i');
            $('.searchable tr').hide();
            $('.searchable tr').filter(function () {
                return rex.test($(this).text());
            }).show();
        })
    }(jQuery));
});
$("#searchclear").click(function(){
    $("#layerfilter").val('');
    $('.searchable tr').show();
});

var options = {
  bounds: searchBounds
};
var searchinput = document.getElementById("searchbox");
var autocomplete = new google.maps.places.Autocomplete(searchinput, options);
var leafMarker;
google.maps.event.addListener(autocomplete, 'place_changed', function() {
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      input.className = 'notfound';
      return;
    }
    if(leafMarker){
        map.removeLayer(leafMarker);
    }
    var leafLocation = new L.LatLng(place.geometry.location.lat(),place.geometry.location.lng())
    leafMarker = L.marker(leafLocation, {title: place.formatted_address}).bindPopup(place.formatted_address).addTo(map);
	//alert("da");
    map.setView(leafLocation, 18)
});
}

/* Larger screens get expanded layer control and visible sidebar */
if (document.body.clientWidth <= 767) {
  var isCollapsed = true;
} else {
  var isCollapsed = false;
}
/*
var groupedOverlays = {
  "Points of Interest": {
    "<img src='assets/img/theater.png' width='24' height='28'>&nbsp;Theaters": theaterLayer,
    "<img src='assets/img/museum.png' width='24' height='28'>&nbsp;Museums": museumLayer
  },
  "Reference": {
    "Boroughs": boroughs,
    "Subway Lines": subwayLines
  }
};
*/
var layerControl = L.control.layers(baseLayers, lOverlays, {
  collapsed: isCollapsed
}).addTo(map);

/* Highlight search box text on click */
$("#searchbox").click(function () {
  $(this).select();
});
$("#loading").hide();
