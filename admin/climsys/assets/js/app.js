var map, featureLayers = [], featureLayersName = [];

//Site specific variables...
//these probably should be abstrated out into an optional local config file and/or local values pulled in from the getcapabilities request

//Native projection from GeoServer WFS
var src = new Proj4js.Proj('EPSG:4326');
var dst = new Proj4js.Proj('EPSG:3857');

//Attribution, get from WMS?
var layerAttribution = 'Data &copy <a href=http://maps.gcc.tas.gov.au>GCC</a>, <a href="https://maps.gcc.tas.gov.au/licensing.html">CC-BY</a>';

//Define base layers
var LISTTopographic = new L.tileLayer("https://services.thelist.tas.gov.au/arcgis/rest/services/Basemaps/Topographic/ImageServer/tile/{z}/{y}/{x}", {
    attribution: "Basemap &copy The LIST",
    maxZoom: 20,
    maxNativeZoom: 18
});

var LISTAerial = new L.tileLayer("https://services.thelist.tas.gov.au/arcgis/rest/services/Basemaps/Orthophoto/ImageServer/tile/{z}/{y}/{x}", {
    attribution: "Basemap &copy The LIST",
    maxZoom: 20,
    maxNativeZoom: 19
});

var World_Navigation_Charts = new L.esri.tiledMapLayer({
    url: "//services.arcgisonline.com/ArcGIS/rest/services/Specialty/World_Navigation_Charts/MapServer",
    detectRetina: false,
    minZoom: 3,
    maxZoom: 10
});

var topo = new L.esri.imageMapLayer({
      url: '//gissvr.rtsd.mi.th/arcgis/rest/services/L7018/L7018/ImageServer'
});

//ESRI layers
//"Streets", "Topographic", "Oceans", "OceansLabels", "NationalGeographic", "Gray", "GrayLabels", "DarkGray", "DarkGrayLabels", "Imagery", "ImageryLabels", "ImageryTransportation", "ShadedRelief", "ShadedReliefLabels", "Terrain" or "TerrainLabels"

var ESRIroad = new L.esri.basemapLayer("Topographic", {
    attribution: "Basemap &copy The LIST",
    //maxZoom: 20,
    //maxNativeZoom: 18
});

var topo2 = new L.esri.imageMapLayer({
    url: "//gissvr.rtsd.mi.th/arcgis/rest/services/L7018/L7018/ImageServer",
    //detectRetina: false,
    //minZoom: 3,
    //maxZoom: 10
  });

var baseLayers = {
  //"LIST Basemap": LISTTopographic,
  //"LIST Imagery": LISTAerial,
  "ESRI Basemap": ESRIroad,
  "World_Navigation_Charts": World_Navigation_Charts,
  "topo": topo2
};

var startCenter = new L.LatLng(18.341,100.427);
var startZoom = 8;
var searchBounds = new google.maps.LatLngBounds(
    new google.maps.LatLng(13.112764, 100.915003),
    new google.maps.LatLng(11.877127, 102.815626));
	
	
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

if(!owsurl) {
  owsurl = "http://www.map.nu.ac.th/geoserver-hgis/hgis/ows";
}

$(document).on("click", ".feature-row", function(e) {
  sidebarClick(parseInt($(this).attr('id')),layerControl);
});

$("#about-btn").click(function() {
  $("#aboutModal").modal("show");
  $(".navbar-collapse.in").collapse("hide");
  return false;
});

$("#full-extent-btn").click(function() {
  map.setView(startCenter, startZoom);
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

$("#login-btn").click(function() {
  $("#loginModal").modal("show");
  $(".navbar-collapse.in").collapse("hide");
  return false;
})

$("#chart-btn").click(function() {
  $("#chartModal").modal("show");
  $(".navbar-collapse.in").collapse("hide");
  return false;
})

$("#list-btn").click(function() {
  $('#sidebar').toggle();
  map.invalidateSize();
  return false;
});

$("#nav-btn").click(function() {
  $(".navbar-collapse").collapse("toggle");
  return false;
});

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

//GeoServer Layers
var lOverlays = {};

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
				alert(name);
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

/*
function handleJson(data) {
    selectedFeature = L.geoJson(data, {
        style: function (feature) {
            return {color: 'yellow'};
        },
        onEachFeature: function (feature, layer) {
            var content = "";
            content = content + "<b><u>" + feature.id.split('.')[0] + "</b></u><br>";
            delete feature.properties.bbox;
			alert("da");
            for (var name in feature.properties) {content = content + "<b>" + name + ":</b> " + feature.properties[name] + "<br>"};
			
            var popup = L.popup()
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
*/
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

map = L.map("map", {
  zoom: startZoom,
  center: startCenter,
  layers: [ESRIroad],
  zoomControl: false,
  attributionControl: false
});

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
    
    var p = new Proj4js.Point(e.latlng.lng,e.latlng.lat);
    Proj4js.transform(src, dst, p);
    queryCoordinates = e.latlng;
    
    var defaultParameters = {
        service : 'WFS',
        version : '1.1.1',
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

    var parameters = L.Util.extend(defaultParameters, customParams);

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
  div.innerHTML = "<span class='hidden-xs'>Developed by <a href='http://bryanmcbride.com'>bmb</a> and <a href='http://agl.pw'>agl</a> | </span><a href='#' onclick='$(\"#attributionModal\").modal(\"show\"); return false;'>Attribution</a>";
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
      $("#feature-list tbody").append('<tr class="feature-row" id="'+layerIndex+'"><td style="vertical-align: middle;"><img width="16" height="18" src="assets/img/museum.png"></td><td class="feature-name">'+title+'</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
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
    map.setView(leafLocation, 18)
}); 
}

/* Larger screens get expanded layer control and visible sidebar */
if (document.body.clientWidth <= 767) {
  var isCollapsed = true;
} else {
  var isCollapsed = false;
}

var layerControl = L.control.layers(baseLayers, lOverlays, {
  collapsed: isCollapsed
}).addTo(map);

/* Highlight search box text on click */
$("#searchbox").click(function () {
  $(this).select();
});
$("#loading").hide();

