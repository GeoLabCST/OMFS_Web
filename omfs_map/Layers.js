/*
                     *      .--.
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
    -'         Hello, GeoLab          '-
*/
Ext.namespace("Heron.options");
Ext.namespace("Heron.scratch");
Ext.namespace("Heron.examples");

OpenLayers.Util.onImageLoadErrorColor = "transparent";
OpenLayers.ProxyHost = "resources/proxy.php?url=";
//OpenLayers.ProxyHost = "/cgi-bin/proxy.cgi?url=";
OpenLayers.DOTS_PER_INCH = 25.4 / 0.28;

Ext.BLANK_IMAGE_URL = 'http://cdnjs.cloudflare.com/ajax/libs/extjs/3.4.1-1/resources/images/default/s.gif';

Ext.namespace("Heron.options.map");

Heron.options.map.settings = {
  projection: 'EPSG:3857',
  displayProjection: new OpenLayers.Projection("EPSG:4326"),
  //displayProjection1: new OpenLayers.Projection("EPSG:32647"),
  units: 'm',
  maxExtent: '-20037508.34, -20037508.34, 20037508.34, 20037508.34',
  center: '11141190.727,1458223.243',
  maxResolution: '156543.0339',//'0.17578125',
  xy_precision: 3,
  zoom: 6,
  theme: null,
  };

  Heron.options.map.statusbar = [
     // {type: "any", options:{xtype: 'tbtext', text: 'Baselayer'}},
     // {type: "baselayer"},
     // {type: "-"} ,
     // {type: "any", options:{xtype: 'tbtext', text: 'Scale'}},
     // {type: "scale"},
     // {type: "-"} ,
     // {type:"measurepanel"},
      {type: "->"} ,
      {type: "any", options:{xtype: 'tbtext', text: 'Mouse Position'}},
      {type: "xcoord"},
      {type: "ycoord"}
  ];

Ext.namespace("Heron.options.wfs");
Heron.options.wfs.downloadFormats = [
    {
        name: 'CSV',
        outputFormat: 'csv',
        fileExt: '.csv'
    }
];

Heron.scratch.urls = {
	OWS: 'http://119.59.125.189/geoserver/ows?',


};

Heron.scratch.layermap = {
  /*
   * ====================================================================
   *                               BASELAYERS
   * ====================================================================
   */

	// Google Base Layers
	gstr: new OpenLayers.Layer.Google(
			"Google Streets", // the default
			{type: google.maps.MapTypeId.ROADMAP, visibility: true},
			{singleTile: false, buffer: 0, isBaseLayer: true}
	),
	gsat: new OpenLayers.Layer.Google(
			"Google Satellite",
			{type: google.maps.MapTypeId.SATELLITE, visibility: false},
			{singleTile: false, buffer: 0, isBaseLayer: true}
	),
	ghyb: new OpenLayers.Layer.Google(
			"Google Hybrid",
			{type: google.maps.MapTypeId.HYBRID, visibility: false},
			{singleTile: false, buffer: 0, isBaseLayer: true}
	),
	gter: new OpenLayers.Layer.Google(
			"Google Terrain",
			{type: google.maps.MapTypeId.TERRAIN, visibility: false},
			{singleTile: false, buffer: 0, isBaseLayer: true}
	),
  // OSM Base Layers
	osm:  new OpenLayers.Layer.OSM("OpenStreetMap",null),

	// Bing Layers chai edit
	 bgr: new OpenLayers.Layer.Bing({
        name: "Bing Road",
        key: "Ai8NCnEOhBj22Uz9OIfrhCBxvjyDQJEDkBbTWzJCfuKdlyR_VyqFxMvQgbmgJ10z",
        type: "Road"
    }),
    bgh: new OpenLayers.Layer.Bing({
        name: "Bing Hybrid",
        key: "Ai8NCnEOhBj22Uz9OIfrhCBxvjyDQJEDkBbTWzJCfuKdlyR_VyqFxMvQgbmgJ10z",
        type: "AerialWithLabels"
    }),
    bgs: new OpenLayers.Layer.Bing({
        name: "Bing Aerial",
        key: "Ai8NCnEOhBj22Uz9OIfrhCBxvjyDQJEDkBbTWzJCfuKdlyR_VyqFxMvQgbmgJ10z",
        type: "Aerial"
    }),
  none: new OpenLayers.Layer.Image(
        "None",
        Ext.BLANK_IMAGE_URL,
        OpenLayers.Bounds.fromString(Heron.options.map.settings.maxExtent),

    new OpenLayers.Size(10, 10),
        {resolutions: Heron.options.map.settings.resolutions, isBaseLayer: true, visibility: false, displayInLayerSwitcher: true, transitionEffect: 'resize'}
    ),

    /*
     * ====================================================================
     *                                OVERLAYS
     * ====================================================================
     */

     reg: new OpenLayers.Layer.WMS(
               "เขตภาค",
               Heron.scratch.urls.OWS,
               {layers: "isnre:c01_region", transparent: true, format: 'image/png'},
               {singleTile: false, opacity: 0.9, isBaseLayer: false, visibility: false, noLegend: false,
   			featureInfoFormat: 'application/vnd.ogc.gml', transitionEffect: 'null', metadata: {
                   wfs: {
                       protocol: 'fromWMSLayer',
                       featurePrefix: 'isnre',
                       downloadFormats: Heron.options.wfs.downloadFormats
                   }
               }}
       ),

    	prov: new OpenLayers.Layer.WMS(
                "เขตจังหวัด",
                Heron.scratch.urls.OWS,
                {layers: "isnre:c02_province", transparent: true, format: 'image/png'},
                {singleTile: true, opacity: 0.9, isBaseLayer: false, visibility: true, noLegend: false,
    			featureInfoFormat: 'application/vnd.ogc.gml', transitionEffect: 'null', metadata: {
                    wfs: {
                        protocol: 'fromWMSLayer',
                        featurePrefix: 'fgds54_beta',
                        downloadFormats: Heron.options.wfs.downloadFormats
                    }
                }}
        ),
      amp: new OpenLayers.Layer.WMS(
                  "เขตอำเภอ",
                  Heron.scratch.urls.OWS,
                  {layers: "isnre:c03_district", transparent: true, format: 'image/png'},
                  {singleTile: true, opacity: 0.9, isBaseLayer: false, visibility: false, noLegend: false,
      			featureInfoFormat: 'application/vnd.ogc.gml', transitionEffect: 'null', metadata: {
                      wfs: {
                          protocol: 'fromWMSLayer',
                          downloadFormats: Heron.options.wfs.downloadFormats
                      }
                  }}
          ),
      tam: new OpenLayers.Layer.WMS(
                    "เขตตำบล",
                    Heron.scratch.urls.OWS,
                    {layers: "isnre:c04_subdistrict", transparent: true, format: 'image/png'},
                    {singleTile: true, opacity: 0.9, isBaseLayer: false, visibility: false, noLegend: false,
        			featureInfoFormat: 'application/vnd.ogc.gml', transitionEffect: 'null', metadata: {
                        wfs: {
                            protocol: 'fromWMSLayer',
                            downloadFormats: Heron.options.wfs.downloadFormats
                        }
                    }}
            ),

// forest wms layer
      frtyp: new OpenLayers.Layer.WMS(
                    "ขอบเขตชนิดของป่าไม้",
                    Heron.scratch.urls.OWS,
                    {layers: "isnre:c28_foresttype", transparent: true, format: 'image/png'},
                    {singleTile: true, opacity: 0.9, isBaseLayer: false, visibility: true, noLegend: false,
        			featureInfoFormat: 'application/vnd.ogc.gml', transitionEffect: 'null', metadata: {
                        wfs: {
                            protocol: 'fromWMSLayer',
                            downloadFormats: Heron.options.wfs.downloadFormats
                        }
                    }}
            ),
      nrf: new OpenLayers.Layer.WMS(
                    "ป่าสงวนแห่งชาติ",
                    Heron.scratch.urls.OWS,
                    {layers: "isnre:c29_nrf", transparent: true, format: 'image/png'},
                    {singleTile: true, opacity: 0.9, isBaseLayer: false, visibility: false, noLegend: false,
        			featureInfoFormat: 'application/vnd.ogc.gml', transitionEffect: 'null', metadata: {
                        wfs: {
                            protocol: 'fromWMSLayer',
                            downloadFormats: Heron.options.wfs.downloadFormats
                        }
                    }}
            ),
      nprk: new OpenLayers.Layer.WMS(
                    "อุทยานแห่งชาติ",
                    Heron.scratch.urls.OWS,
                    {layers: "isnre:c30_nprk", transparent: true, format: 'image/png'},
                    {singleTile: true, opacity: 0.9, isBaseLayer: false, visibility: false, noLegend: false,
        			featureInfoFormat: 'application/vnd.ogc.gml', transitionEffect: 'null', metadata: {
                        wfs: {
                            protocol: 'fromWMSLayer',
                            downloadFormats: Heron.options.wfs.downloadFormats
                        }
                    }}
            ),
      fprk: new OpenLayers.Layer.WMS(
                    "วนอุทยาน",
                    Heron.scratch.urls.OWS,
                    {layers: "isnre:c31_fprk", transparent: true, format: 'image/png'},
                    {singleTile: true, opacity: 0.9, isBaseLayer: false, visibility: false, noLegend: false,
        			featureInfoFormat: 'application/vnd.ogc.gml', transitionEffect: 'null', metadata: {
                        wfs: {
                            protocol: 'fromWMSLayer',
                            downloadFormats: Heron.options.wfs.downloadFormats
                        }
                    }}
            ),
      wlds: new OpenLayers.Layer.WMS(
                    "เขตรักษาพันธุ์สัตว์ป่า",
                    Heron.scratch.urls.OWS,
                    {layers: "isnre:c32_wldsshp", transparent: true, format: 'image/png'},
                    {singleTile: true, opacity: 0.9, isBaseLayer: false, visibility: false, noLegend: false,
        			featureInfoFormat: 'application/vnd.ogc.gml', transitionEffect: 'null', metadata: {
                        wfs: {
                            protocol: 'fromWMSLayer',
                            downloadFormats: Heron.options.wfs.downloadFormats
                        }
                    }}
            ),
      nhw: new OpenLayers.Layer.WMS(
                    "เขตห้ามล่าสัตว์ป่า",
                    Heron.scratch.urls.OWS,
                    {layers: "isnre:c33_nhw", transparent: true, format: 'image/png'},
                    {singleTile: true, opacity: 0.9, isBaseLayer: false, visibility: false, noLegend: false,
        			featureInfoFormat: 'application/vnd.ogc.gml', transitionEffect: 'null', metadata: {
                        wfs: {
                            protocol: 'fromWMSLayer',
                            downloadFormats: Heron.options.wfs.downloadFormats
                        }
                    }}
            ),
      frzn: new OpenLayers.Layer.WMS(
                    "การใช้ประโยชน์พื้นที่ป่าไม้",
                    Heron.scratch.urls.OWS,
                    {layers: "isnre:c34_forestzoning", transparent: true, format: 'image/png'},
                    {singleTile: true, opacity: 0.9, isBaseLayer: false, visibility: false, noLegend: false,
        			featureInfoFormat: 'application/vnd.ogc.gml', transitionEffect: 'null', metadata: {
                        wfs: {
                            protocol: 'fromWMSLayer',
                            downloadFormats: Heron.options.wfs.downloadFormats
                        }
                    }}
            ),
       alr: new OpenLayers.Layer.WMS(
                    "พื้นที่ ส.ป.ก.",
                    Heron.scratch.urls.OWS,
                    {layers: "isnre:c35_alro", transparent: true, format: 'image/png'},
                    {singleTile: true, opacity: 0.9, isBaseLayer: false, visibility: false, noLegend: false,
        			featureInfoFormat: 'application/vnd.ogc.gml', transitionEffect: 'null', metadata: {
                        wfs: {
                            protocol: 'fromWMSLayer',
                            downloadFormats: Heron.options.wfs.downloadFormats
                        }
                    }}
            ),
/*    dist: new OpenLayers.Layer.WMS(
          "_nddi",
         'http://129.174.131.10/cgi-bin/mapserv?',
        {map: '/media/gisiv01/mapfiles/drought/16days/2016/drought.2016.273.map',
          layers: 'drought.2016.273',
            srs: 'EPSG:900101',
            format: 'image/png',
            transparent: true,
            //singleTile: false,
            opacity: 0.9,
            visibility: false,
            isBaseLayer: false,
        }, {'reproject': true}
    ), */

};

/*
 * ====================================================================
 *                                Layers tree
 * ====================================================================
 */
Heron.options.map.layers = [
   
// WFS Layers GeoServer
  new OpenLayers.Layer.Vector("ForestType", {
            strategies: [new OpenLayers.Strategy.BBOX()],
            styleMap: new OpenLayers.StyleMap({
                "default": new OpenLayers.Style(null, {
                    rules: [new OpenLayers.Rule({
                        title: 'ForestType',
                        symbolizer: {
                            "Polygon": {
                                'strokeColor': '#0b614b', 'fillColor': '#81f79f', graphicZIndex: 1, fillOpacity: 0.8
                            }
                        }
                    })]
                })}),
            projection: new OpenLayers.Projection("EPSG:3857"),
            visibility: false,
            protocol: new OpenLayers.Protocol.WFS({
            version: "1.1.0",
                url: 'http://119.59.125.189/geoserver/wfs',
                featureType: "c28_foresttype",
                featureNS: 'http://www.openplans.org/isnre'
            })
        }),
    
    new OpenLayers.Layer.Vector("NRF", {
        strategies: [new OpenLayers.Strategy.BBOX()],
        styleMap: new OpenLayers.StyleMap({
            "default": new OpenLayers.Style(null, {
                rules: [new OpenLayers.Rule({
                    title: 'NRF',
                    symbolizer: {
                        "Polygon": {
                            'strokeColor': '#df0174', 'fillColor': '#fa58ac', graphicZIndex: 1, fillOpacity: 0.8
                        }
                    }
                })]
            })
        }),
        visibility: false,
        protocol: new OpenLayers.Protocol.WFS({
            version: "1.1.0",
            url: 'http://119.59.125.189/geoserver/wfs',
            featureType: "c29_nrf",
            featureNS: 'http://www.openplans.org/isnre'
        })
    }),

    new OpenLayers.Layer.Vector("NPRK", {
        strategies: [new OpenLayers.Strategy.BBOX()],
        styleMap: new OpenLayers.StyleMap({
            "default": new OpenLayers.Style(null, {
                rules: [new OpenLayers.Rule({
                    title: 'NPRK',
                    symbolizer: {
                        "Polygon": {
                            'strokeColor': '#5f04b4', 'fillColor': '#d0a9f5', graphicZIndex: 1, fillOpacity: 0.8
                        }
                    }
                })]
            })
        }),
        visibility: false,
        protocol: new OpenLayers.Protocol.WFS({
            version: "1.1.0",
            url: 'http://119.59.125.189/geoserver/wfs',
            featureType: "c30_nprk",
            featureNS: 'http://www.openplans.org/isnre'
        })
    }),

    new OpenLayers.Layer.Vector("FPRK", {
        strategies: [new OpenLayers.Strategy.BBOX()],
        styleMap: new OpenLayers.StyleMap({
            "default": new OpenLayers.Style(null, {
                rules: [new OpenLayers.Rule({
                    title: 'FPRK',
                    symbolizer: {
                        "Polygon": {
                            'strokeColor': '#b43104', 'fillColor': '#fe9a2e', graphicZIndex: 1, fillOpacity: 0.8
                        }
                    }
                })]
            })
        }),
        visibility: false,
        protocol: new OpenLayers.Protocol.WFS({
            version: "1.1.0",
            url: 'http://119.59.125.189/geoserver/wfs',
            featureType: "c31_fprk",
            featureNS: 'http://www.openplans.org/isnre'
        })
    }),

    new OpenLayers.Layer.Vector("WLDSSHP", {
        strategies: [new OpenLayers.Strategy.BBOX()],
        styleMap: new OpenLayers.StyleMap({
            "default": new OpenLayers.Style(null, {
                rules: [new OpenLayers.Rule({
                    title: 'WLDSSHP',
                    symbolizer: {
                        "Polygon": {
                            'strokeColor': '#8a4b08', 'fillColor': '#f4fa58', graphicZIndex: 1, fillOpacity: 0.8
                        }
                    }
                })]
            })
        }),
        visibility: false,
        protocol: new OpenLayers.Protocol.WFS({
            version: "1.1.0",
            url: 'http://119.59.125.189/geoserver/wfs',
            featureType: "c32_wldsshp",
            featureNS: 'http://www.openplans.org/isnre'
        })
    }),

    new OpenLayers.Layer.Vector("NHW", {
        strategies: [new OpenLayers.Strategy.BBOX()],
        styleMap: new OpenLayers.StyleMap({
            "default": new OpenLayers.Style(null, {
                rules: [new OpenLayers.Rule({
                    title: 'NHW',
                    symbolizer: {
                        "Polygon": {
                            'strokeColor': '#0b614b', 'fillColor': '#00ffbf', graphicZIndex: 1, fillOpacity: 0.8
                        }
                    }
                })]
            })
        }),
        visibility: false,
        protocol: new OpenLayers.Protocol.WFS({
            version: "1.1.0",
            url: 'http://119.59.125.189/geoserver/wfs',
            featureType: "c33_nhw",
            featureNS: 'http://www.openplans.org/isnre'
        })
    }),

    new OpenLayers.Layer.Vector("ForestZoning", {
        strategies: [new OpenLayers.Strategy.BBOX()],
        styleMap: new OpenLayers.StyleMap({
            "default": new OpenLayers.Style(null, {
                rules: [new OpenLayers.Rule({
                    title: 'ForestZoning',
                    symbolizer: {
                        "Polygon": {
                            'strokeColor': '#5fb404', 'fillColor': '#c8fe2e', graphicZIndex: 1, fillOpacity: 0.8
                        }
                    }
                })]
            })
        }),
        visibility: false,
        protocol: new OpenLayers.Protocol.WFS({
            version: "1.1.0",
            url: 'http://119.59.125.189/geoserver/wfs',
            featureType: "c34_forestzoning",
            featureNS: 'http://www.openplans.org/isnre'
        })
    }),

    new OpenLayers.Layer.Vector("Alro", {
        strategies: [new OpenLayers.Strategy.BBOX()],
        styleMap: new OpenLayers.StyleMap({
            "default": new OpenLayers.Style(null, {
                rules: [new OpenLayers.Rule({
                    title: 'Alro',
                    symbolizer: {
                        "Polygon": {
                            'strokeColor': '#38610b', 'fillColor': '#298a08', graphicZIndex: 1, fillOpacity: 0.8
                        }
                    }
                })]
            })
        }),
        visibility: false,
        protocol: new OpenLayers.Protocol.WFS({
            version: "1.1.0",
            url: 'http://119.59.125.189/geoserver/wfs',
            featureType: "c35_alro",
            featureNS: 'http://www.openplans.org/isnre'
        })
    }),  
             
    //add overlay
    Heron.scratch.layermap.reg,
    Heron.scratch.layermap.prov,
    Heron.scratch.layermap.amp,
    Heron.scratch.layermap.tam,

    Heron.scratch.layermap.frtyp,
    Heron.scratch.layermap.nrf,
    Heron.scratch.layermap.nprk,
    Heron.scratch.layermap.fprk,
    Heron.scratch.layermap.wlds,
    Heron.scratch.layermap.nhw,
    Heron.scratch.layermap.frzn,
    Heron.scratch.layermap.alr,

	//BaseLayers	
    Heron.scratch.layermap.ghyb,
    Heron.scratch.layermap.gstr,
    Heron.scratch.layermap.gsat,
    Heron.scratch.layermap.gter,
    Heron.scratch.layermap.bgr,
    Heron.scratch.layermap.bgh,
    Heron.scratch.layermap.bgs,
    Heron.scratch.layermap.osm,
    Heron.scratch.layermap.none

];


var treeTheme = [
	{
		text:'Base Layers',
		expanded: true,
		children:
			[
				{
					text:'กลุ่มชั้นข้อมูลขอบเขตการบริหาร',
					expanded: true,
					children:
						[
							{nodeType: "gx_layer", layer: "เขตภาค", text: "เขตภาค", legend: true},
                            {nodeType: "gx_layer", layer: "เขตจังหวัด", text: "เขตจังหวัด", legend: true},
							{nodeType: "gx_layer", layer: "เขตอำเภอ", text: "เขตอำเภอ", legend: true},
							{nodeType: "gx_layer", layer: "เขตตำบล", text: "เขตตำบล", legend: true},


						]
				},{
					text:'กลุ่มชั้นข้อมูลทรัพยากรป่าไม้ (WMS)',
					expanded: true,
					children:
						[
							{nodeType: "gx_layer", layer: "ขอบเขตชนิดของป่าไม้", text: "ขอบเขตชนิดของป่าไม้", legend: true},
							{nodeType: "gx_layer", layer: "ป่าสงวนแห่งชาติ", text: "ป่าสงวนแห่งชาติ", legend: true},
							{nodeType: "gx_layer", layer: "อุทยานแห่งชาติ", text: "อุทยานแห่งชาติ", legend: true},
							{nodeType: "gx_layer", layer: "วนอุทยาน", text: "วนอุทยาน", legend: true},
							{nodeType: "gx_layer", layer: "เขตรักษาพันธุ์สัตว์ป่า", text: "เขตรักษาพันธุ์สัตว์ป่า", legend: true},
                            {nodeType: "gx_layer", layer: "เขตห้ามล่าสัตว์ป่า", text: "เขตห้ามล่าสัตว์ป่า", legend: true},
							{nodeType: "gx_layer", layer: "การใช้ประโยชน์พื้นที่ป่าไม้", text: "การใช้ประโยชน์พื้นที่ป่าไม้", legend: true},
                            { nodeType: "gx_layer", layer: "พื้นที่ ส.ป.ก.", text: "พื้นที่ ส.ป.ก.", legend: true},
						]
				},{
					text:'กลุ่มชั้นข้อมูลทรัพยากรป่าไม้ (WFS)',
					expanded: false,
					children:
                        [
                            {nodeType: "gx_layer", layer: "ForestType", text: "ขอบเขตชนิดของป่าไม้", legend: true},
                            {nodeType: "gx_layer", layer: "NRF", text: "ป่าสงวนแห่งชาติ", legend: true},
                            {nodeType: "gx_layer", layer: "NPRK", text: "อุทยานแห่งชาติ", legend: true},
                            {nodeType: "gx_layer", layer: "FPRK", text: "วนอุทยาน", legend: true},
                            {nodeType: "gx_layer", layer: "WLDSSHP", text: "เขตรักษาพันธุ์สัตว์ป่า", legend: true},
                            {nodeType: "gx_layer", layer: "NHW", text: "เขตห้ามล่าสัตว์ป่า", legend: true},
                            {nodeType: "gx_layer", layer: "ForestZoning", text: "การใช้ประโยชน์พื้นที่ป่าไม้", legend: true},
                            {nodeType: "gx_layer", layer: "Alro", text: "พื้นที่ ส.ป.ก.", legend: true},
						]
				}

			]
	}
];
