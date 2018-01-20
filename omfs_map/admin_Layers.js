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
  //center: '11141190.727,1458223.243',
  center: center,
  maxResolution: '156543.0339',//'0.17578125',
  xy_precision: 3,
  //zoom: 6,
  zoom: zoom,
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
	OWS: 'http://119.59.125.191/geoserver/ows?',


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
    //กลุ่มข้อมูลขอบเขตการบริหาร
	prov: new OpenLayers.Layer.WMS(
                "เขตจังหวัด",
                Heron.scratch.urls.OWS,
                {layers: "omfs:province", cql_filter: filter_pro, transparent: true, format: 'image/png'},
                {singleTile: true, opacity: 0.9, isBaseLayer: false, visibility: true, noLegend: false,
    			featureInfoFormat: 'application/vnd.ogc.gml', transitionEffect: 'null', metadata: {
                    wfs: {
                        protocol: 'fromWMSLayer',
                        featurePrefix: 'omfs',
                        downloadFormats: Heron.options.wfs.downloadFormats
                    }
                }}
        ),
      amp: new OpenLayers.Layer.WMS(
                  "เขตอำเภอ",
                  Heron.scratch.urls.OWS,
                  {layers: "omfs:amphoe", cql_filter: filter_amp , transparent: true, format: 'image/png'},
                  {singleTile: true, opacity: 0.9, isBaseLayer: false, visibility: false, noLegend: false,
      			featureInfoFormat: 'application/vnd.ogc.gml', transitionEffect: 'null', metadata: {
                    wfs: {
                        protocol: 'fromWMSLayer',
                        featurePrefix: 'omfs',
                        downloadFormats: Heron.options.wfs.downloadFormats
                    }
                  }}
          ),
      tam: new OpenLayers.Layer.WMS(
                    "เขตตำบล",
                    Heron.scratch.urls.OWS,
                    {layers: "omfs:tambon", cql_filter:filter_tam , transparent: true, format: 'image/png'},
                    {singleTile: true, opacity: 0.9, isBaseLayer: false, visibility: false, noLegend: false,
        			featureInfoFormat: 'application/vnd.ogc.gml', transitionEffect: 'null', metadata: {
						wfs: {
							protocol: 'fromWMSLayer',
							featurePrefix: 'omfs',
							downloadFormats: Heron.options.wfs.downloadFormats
						}
                    }}
            ),
      c05_municipa: new OpenLayers.Layer.WMS(
                    "เขตเทศบาล",
                    Heron.scratch.urls.OWS,
                    {layers: "omfs:c05_municipa", cql_filter:filter_tam , transparent: true, format: 'image/png'},
                    {singleTile: true, opacity: 0.9, isBaseLayer: false, visibility: false, noLegend: false,
        			featureInfoFormat: 'application/vnd.ogc.gml', transitionEffect: 'null', metadata: {
						wfs: {
							protocol: 'fromWMSLayer',
							featurePrefix: 'omfs',
							downloadFormats: Heron.options.wfs.downloadFormats
						}
                    }}
            ),
      c06_village: new OpenLayers.Layer.WMS(
                    "ตำแหน่งหมู่บ้าน",
                    Heron.scratch.urls.OWS,
                    {layers: "omfs:c06_village", cql_filter:filter_tam , transparent: true, format: 'image/png'},
                    {singleTile: true, opacity: 0.9, isBaseLayer: false, visibility: false, noLegend: false,
        			featureInfoFormat: 'application/vnd.ogc.gml', transitionEffect: 'null', metadata: {
						wfs: {
							protocol: 'fromWMSLayer',
							featurePrefix: 'omfs',
							downloadFormats: Heron.options.wfs.downloadFormats
						}
                    }}
            ),			
      c07_ngo_prj: new OpenLayers.Layer.WMS(
          "ที่ตั้งโครงการ NGO",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c07_ngo_prj",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),
      c08_eia_prj: new OpenLayers.Layer.WMS(
          "ที่ตั้งโครงการ EIA",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c08_eia_prj",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),
      c09_urb_plan: new OpenLayers.Layer.WMS(
          "ผังเมือง",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c09_urb_plan",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),

   //กลุ่มข้อมูลลักษณะภูมิประเทศ
      c15_contour: new OpenLayers.Layer.WMS(
          "เส้นชั้นความสูง",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c15_contour",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),

   //กลุ่มข้อมูลทรัพยากรน้ำ
      c17_basin: new OpenLayers.Layer.WMS(
          "ลุ่มน้ำ",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c17_basin",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),
      c18_stream: new OpenLayers.Layer.WMS(
          "เส้นทางน้ำ",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c18_stream",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),
      c19_natural_wtr_body: new OpenLayers.Layer.WMS(
          "แหล่งน้ำธรรมชาติ",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c19_natural_wtr_body",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),
      c20_reservoir: new OpenLayers.Layer.WMS(
          "แหล่งน้ำที่มนุษย์สร้างขึ้น",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c20_reservoir",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),
      c21_strm_gage: new OpenLayers.Layer.WMS(
          "ตำแหน่งสถานีตรวจวัดระดับน้ำ",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c21_strm_gage",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),
      c22_wshd_cl: new OpenLayers.Layer.WMS(
          "ชั้นข้อมูลคุณภาพลุ่มน้ำ",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c22_wshd_cl",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),
      c23_vil_wtrsupply: new OpenLayers.Layer.WMS(
          "ประปาหมู่บ้าน ประปาสัมปทาน",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c23_vil_wtrsupply",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),

    //กลุ่มข้อมูลทรัพยากรน้ำบาดาล และธรณีวิทยา
       c24_hydrogeology: new OpenLayers.Layer.WMS(
           "อุทกธรณีวิทยา",
           Heron.scratch.urls.OWS, {
               layers: "omfs:c24_hydrogeology",
               cql_filter: filter_tam,
               transparent: true,
               format: 'image/png'
           }, {
               singleTile: true,
               opacity: 0.9,
               isBaseLayer: false,
               visibility: false,
               noLegend: false,
               featureInfoFormat: 'application/vnd.ogc.gml',
               transitionEffect: 'null',
               metadata: {
                   wfs: {
                       protocol: 'fromWMSLayer',
                       featurePrefix: 'omfs',
                       downloadFormats: Heron.options.wfs.downloadFormats
                   }
               }
           }
       ),
      c25_well: new OpenLayers.Layer.WMS(
          "บ่อน้ำบาดาล",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c25_well",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),
      c27_concession: new OpenLayers.Layer.WMS(
          "ประทานบัตรเหมืองแร่",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c27_concession",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),
      c28_fault: new OpenLayers.Layer.WMS(
          "รอยเลื่อนมีพลัง",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c28_fault",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),
      c29_conregeology: new OpenLayers.Layer.WMS(
          "แหล่งอนุรักษ์ทางธรณีวิทยา",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c29_conregeology",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),
      c30_hotspring: new OpenLayers.Layer.WMS(
          "น้ำพุร้อน",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c30_hotspring",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),

    //กลุ่มข้อมูลการใช้ที่ดิน
      c31_soil: new OpenLayers.Layer.WMS(
          "แผนที่ดิน",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c31_soil",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),
      c40_landuse: new OpenLayers.Layer.WMS(
          "การใช้ที่ดิน 2551",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c40_landuse",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),

    //กลุ่มข้อมูลทรัพยากรป่าไม้
      c32_foresttype: new OpenLayers.Layer.WMS(
                    "ขอบเขตชนิดป่าไม้ปี 51-55",
                    Heron.scratch.urls.OWS,
                    {
                        layers: "omfs:c32_foresttype",
                        cql_filter: filter_tam,
                        transparent: true,
                        format: 'image/png'
                    },
                    {singleTile: true, opacity: 0.9, isBaseLayer: false, visibility: false, noLegend: false,
        			featureInfoFormat: 'application/vnd.ogc.gml', transitionEffect: 'null', metadata: {
						wfs: {
						    protocol: 'fromWMSLayer',
						    featurePrefix: 'omfs',
						    downloadFormats: Heron.options.wfs.downloadFormats
						}
                    }}
            ),
      c33_nrf: new OpenLayers.Layer.WMS(
                    "อุทยานแห่งชาติ",
                    Heron.scratch.urls.OWS,
                    {
                        layers: "omfs:c33_nrf",
                        cql_filter: filter_tam,
                        transparent: true,
                        format: 'image/png'
                    },
                    {singleTile: true, opacity: 0.9, isBaseLayer: false, visibility: false, noLegend: false,
        			featureInfoFormat: 'application/vnd.ogc.gml', transitionEffect: 'null', metadata: {
						wfs: {
						    protocol: 'fromWMSLayer',
						    featurePrefix: 'omfs',
						    downloadFormats: Heron.options.wfs.downloadFormats
						}
                    }}
            ),
      c34_nprk: new OpenLayers.Layer.WMS(
                    "วนอุทยาน 53",
                    Heron.scratch.urls.OWS,
                    {
                        layers: "omfs:c34_nprk",
                        cql_filter: filter_tam,
                        transparent: true,
                        format: 'image/png'
                    },
                    {singleTile: true, opacity: 0.9, isBaseLayer: false, visibility: false, noLegend: false,
        			featureInfoFormat: 'application/vnd.ogc.gml', transitionEffect: 'null', metadata: {
						wfs: {
						    protocol: 'fromWMSLayer',
						    featurePrefix: 'omfs',
						    downloadFormats: Heron.options.wfs.downloadFormats
						}
                    }}
            ),
      c35_fprk: new OpenLayers.Layer.WMS(
                    "ป่าสงวนแห่งชาติ",
                    Heron.scratch.urls.OWS,
                    {
                        layers: "omfs:c35_fprk",
                        cql_filter: filter_tam,
                        transparent: true,
                        format: 'image/png'
                    },
                    {singleTile: true, opacity: 0.9, isBaseLayer: false, visibility: false, noLegend: false,
        			featureInfoFormat: 'application/vnd.ogc.gml', transitionEffect: 'null', metadata: {
						wfs: {
						    protocol: 'fromWMSLayer',
						    featurePrefix: 'omfs',
						    downloadFormats: Heron.options.wfs.downloadFormats
						}
                    }}
            ),
      c36_wlds: new OpenLayers.Layer.WMS(
                    "เขตรักษาพันธุ์สัตว์ป่า 53",
                    Heron.scratch.urls.OWS,
                    {
                        layers: "omfs:c36_wlds",
                        cql_filter: filter_tam,
                        transparent: true,
                        format: 'image/png'
                    },
                    {singleTile: true, opacity: 0.9, isBaseLayer: false, visibility: false, noLegend: false,
        			featureInfoFormat: 'application/vnd.ogc.gml', transitionEffect: 'null', metadata: {
						wfs: {
						    protocol: 'fromWMSLayer',
						    featurePrefix: 'omfs',
						    downloadFormats: Heron.options.wfs.downloadFormats
						}
                    }}
            ),
      c37_nhw: new OpenLayers.Layer.WMS(
                    "เขตห้ามล่าสัตว์ป่า 53",
                    Heron.scratch.urls.OWS,
                    {
                        layers: "omfs:c37_nhw",
                        cql_filter: filter_tam,
                        transparent: true,
                        format: 'image/png'
                    },
                    {singleTile: true, opacity: 0.9, isBaseLayer: false, visibility: false, noLegend: false,
        			featureInfoFormat: 'application/vnd.ogc.gml', transitionEffect: 'null', metadata: {
						wfs: {
						    protocol: 'fromWMSLayer',
						    featurePrefix: 'omfs',
						    downloadFormats: Heron.options.wfs.downloadFormats
						}
                    }}
            ),
      c38_forestzoning: new OpenLayers.Layer.WMS(
                    "ผลการจำแนกเขตการใช้ประโยชน์พื้นที่ป่า",
                    Heron.scratch.urls.OWS,
                    { layers: "omfs:c38_forestzoning", cql_filter: filter_tam, transparent: true, format: 'image/png'},
                    {singleTile: true, opacity: 0.9, isBaseLayer: false, visibility: false, noLegend: false,
        			featureInfoFormat: 'application/vnd.ogc.gml', transitionEffect: 'null', metadata: {
						wfs: {
						    protocol: 'fromWMSLayer',
						    featurePrefix: 'omfs',
						    downloadFormats: Heron.options.wfs.downloadFormats
						}
                    }}
            ),
       c39_alro: new OpenLayers.Layer.WMS(
                    "พื้นที่ สปก. 2551",
                    Heron.scratch.urls.OWS,
                    {
                        layers: "omfs:c39_alro",
                        cql_filter: filter_tam,
                        transparent: true,
                        format: 'image/png'
                    },
                    {singleTile: true, opacity: 0.9, isBaseLayer: false, visibility: false, noLegend: false,
        			featureInfoFormat: 'application/vnd.ogc.gml', transitionEffect: 'null', metadata: {
						wfs: {
						    protocol: 'fromWMSLayer',
						    featurePrefix: 'omfs',
						    downloadFormats: Heron.options.wfs.downloadFormats
						}
                    }}
            ),
//กลุ่มข้อมูลโครงสร้างพื้นฐานและสาธารณูปโภค
      c41_heritage: new OpenLayers.Layer.WMS(
          "แหล่งศิลปกรรม",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c41_heritage",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),
      c42_road: new OpenLayers.Layer.WMS(
          "เส้นทางคมนาคม",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c42_road",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),
      c43_mainroad: new OpenLayers.Layer.WMS(
          "เส้นทางคมนาคมสายหลัก",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c43_mainroad",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),
      c44_rail: new OpenLayers.Layer.WMS(
          "ทางรถไฟ",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c44_rail",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),
      c45_harbour: new OpenLayers.Layer.WMS(
          "ท่าเรือ",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c45_harbour",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),
      c46_airport: new OpenLayers.Layer.WMS(
          "ท่าอากาศยาน",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c46_airport",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),
      c47_electr: new OpenLayers.Layer.WMS(
          "ไฟฟ้า",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c47_electr",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),
      c48_watersupply: new OpenLayers.Layer.WMS(
          "ประปา",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c48_watersupply",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),
      c49_telephone: new OpenLayers.Layer.WMS(
          "โทรศัพท์",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c49_telephone",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),
      c50_hospital: new OpenLayers.Layer.WMS(
          "โรงพยาบาล",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c50_hospital",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),
      c51_school: new OpenLayers.Layer.WMS(
          "สถานศึกษา",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c51_school",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),
      c52_religious: new OpenLayers.Layer.WMS(
          "ศาสนสถาน",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c52_religious",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),
      c53_gasoline: new OpenLayers.Layer.WMS(
          "สถานีบริการเชื้อเพลิง",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c53_gasoline",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),
      c54_postoffice: new OpenLayers.Layer.WMS(
          "ไปรษณีย์",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c54_postoffice",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
      ),

//กลุ่มข้อมูลพื้นที่เสี่ยงภัย
      c55_hazard: new OpenLayers.Layer.WMS(
          "พื้นที่เสี่ยงภัยต่อสารอันตราย",
          Heron.scratch.urls.OWS, {
              layers: "omfs:c55_hazard",
              cql_filter: filter_tam,
              transparent: true,
              format: 'image/png'
          }, {
              singleTile: true,
              opacity: 0.9,
              isBaseLayer: false,
              visibility: false,
              noLegend: false,
              featureInfoFormat: 'application/vnd.ogc.gml',
              transitionEffect: 'null',
              metadata: {
                  wfs: {
                      protocol: 'fromWMSLayer',
                      featurePrefix: 'omfs',
                      downloadFormats: Heron.options.wfs.downloadFormats
                  }
              }
          }
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
    //กลุ่มข้อมูลขอบเขตการบริหาร
    Heron.scratch.layermap.prov,
    Heron.scratch.layermap.amp,
    Heron.scratch.layermap.tam,
	Heron.scratch.layermap.c05_municipa,
	Heron.scratch.layermap.c06_village,
    Heron.scratch.layermap.c07_ngo_prj,
    Heron.scratch.layermap.c08_eia_prj,
    Heron.scratch.layermap.c09_urb_plan,

    //กลุ่มข้อมูลลักษณะภูมิประเทศ
    Heron.scratch.layermap.c15_contour,

    //กลุ่มข้อมูลทรัพยากรน้ำ
    Heron.scratch.layermap.c17_basin,
    Heron.scratch.layermap.c18_stream,
	Heron.scratch.layermap.c19_natural_wtr_body,
	Heron.scratch.layermap.c20_reservoir,
    Heron.scratch.layermap.c21_strm_gage,
    Heron.scratch.layermap.c22_wshd_cl,
    Heron.scratch.layermap.c23_vil_wtrsupply,

    //กลุ่มข้อมูลทรัพยากรน้ำบาดาล และธรณีวิทยา
    Heron.scratch.layermap.c24_hydrogeology,
    Heron.scratch.layermap.c25_well,
	Heron.scratch.layermap.c27_concession,
	Heron.scratch.layermap.c28_fault,
    Heron.scratch.layermap.c29_conregeology,
    Heron.scratch.layermap.c30_hotspring,
    //กลุ่มข้อมูลการใช้ที่ดิน
    Heron.scratch.layermap.c31_soil,
    Heron.scratch.layermap.c40_landuse,

    //กลุ่มข้อมูลทรัพยากรป่าไม้
    Heron.scratch.layermap.c32_foresttype,
    Heron.scratch.layermap.c33_nrf,
	Heron.scratch.layermap.c34_nprk,
	Heron.scratch.layermap.c35_fprk,
    Heron.scratch.layermap.c36_wlds,
    Heron.scratch.layermap.c37_nhw,
    Heron.scratch.layermap.c38_forestzoning,
    Heron.scratch.layermap.c39_alro,

    //กลุ่มข้อมูลโครงสร้างพื้นฐานและสาธารณูปโภค
    Heron.scratch.layermap.c41_heritage,
    Heron.scratch.layermap.c42_road,
	Heron.scratch.layermap.c43_mainroad,
	Heron.scratch.layermap.c44_rail,
    Heron.scratch.layermap.c45_harbour,
    Heron.scratch.layermap.c46_airport,
    Heron.scratch.layermap.c47_electr,
    Heron.scratch.layermap.c48_watersupply,
    Heron.scratch.layermap.c49_telephone,
    Heron.scratch.layermap.c50_hospital,
	Heron.scratch.layermap.c51_school,
	Heron.scratch.layermap.c52_religious,
    Heron.scratch.layermap.c53_gasoline,
    Heron.scratch.layermap.c54_postoffice,

    //กลุ่มข้อมูลพื้นที่เสี่ยงภัย
    Heron.scratch.layermap.c55_hazard,

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
							{nodeType: "gx_layer", layer: "เขตจังหวัด", text: "เขตจังหวัด", legend: true},
							{nodeType: "gx_layer", layer: "เขตอำเภอ", text: "เขตอำเภอ", legend: true},
							{nodeType: "gx_layer", layer: "เขตตำบล", text: "เขตตำบล", legend: true},
							{nodeType: "gx_layer", layer: "เขตเทศบาล", text: "เขตเทศบาล", legend: true},
							{nodeType: "gx_layer", layer: "ตำแหน่งหมู่บ้าน", text: "ตำแหน่งหมู่บ้าน", legend: true},
                            {nodeType: "gx_layer", layer: "ที่ตั้งโครงการ NGO", text: "ที่ตั้งโครงการ NGO", legend: true},
                            {nodeType: "gx_layer", layer: "ที่ตั้งโครงการ EIA", text: "ที่ตั้งโครงการ EIA", legend: true},
                            {nodeType: "gx_layer", layer: "ผังเมือง", text: "ผังเมือง", legend: true},

						]
				},{
					text:'กลุ่มข้อมูลลักษณะภูมิประเทศ',
					expanded: true,
					children:
						[
							{nodeType: "gx_layer", layer: "เส้นชั้นความสูง", text: "เส้นชั้นความสูง", legend: true},
						]
				},{
					text:'กลุ่มข้อมูลทรัพยากรน้ำ',
					expanded: true,
					children:
						[   
                            {nodeType: "gx_layer", layer: "ประปาหมู่บ้าน ประปาสัมปทาน", text: "ประปาหมู่บ้าน ประปาสัมปทาน", legend: true},
                            {nodeType: "gx_layer", layer: "ตำแหน่งสถานีตรวจวัดระดับน้ำ", text: "ตำแหน่งสถานีตรวจวัดระดับน้ำ", legend: true},
							{nodeType: "gx_layer", layer: "เส้นทางน้ำ", text: "เส้นทางน้ำ", legend: true},
							{nodeType: "gx_layer", layer: "แหล่งน้ำธรรมชาติ", text: "แหล่งน้ำธรรมชาติ", legend: true},
							{nodeType: "gx_layer", layer: "แหล่งน้ำที่มนุษย์สร้างขึ้น", text: "แหล่งน้ำที่มนุษย์สร้างขึ้น", legend: true},	
							{nodeType: "gx_layer", layer: "ชั้นข้อมูลคุณภาพลุ่มน้ำ", text: "ชั้นข้อมูลคุณภาพลุ่มน้ำ", legend: true},   
                            {nodeType: "gx_layer", layer: "ลุ่มน้ำ", text: "ลุ่มน้ำ", legend: true},
						]
				},{
					text:'กลุ่มข้อมูลทรัพยากรน้ำบาดาล และธรณีวิทยา',
					expanded: true,
					children:
						[
							{nodeType: "gx_layer", layer: "บ่อน้ำบาดาล", text: "บ่อน้ำบาดาล", legend: true},
							{nodeType: "gx_layer", layer: "น้ำพุร้อน", text: "น้ำพุร้อน", legend: true},
							{nodeType: "gx_layer", layer: "แหล่งอนุรักษ์ทางธรณีวิทยา", text: "แหล่งอนุรักษ์ทางธรณีวิทยา", legend: true},
							{nodeType: "gx_layer", layer: "รอยเลื่อนมีพลัง", text: "รอยเลื่อนมีพลัง", legend: true},
							{nodeType: "gx_layer", layer: "อุทกธรณีวิทยา", text: "อุทกธรณีวิทยา", legend: true},
                            {nodeType: "gx_layer", layer: "ประทานบัตรเหมืองแร่", text: "ประทานบัตรเหมืองแร่", legend: true},
						]
				},{
					text: 'กลุ่มข้อมูลการใช้ที่ดิน',
					expanded: true,
					children:
						[
							{nodeType: "gx_layer", layer: "แผนที่ดิน", text: "แผนที่ดิน", legend: true},
							{nodeType: "gx_layer", layer: "การใช้ที่ดิน 2551", text: "การใช้ที่ดิน 2551", legend: true},
						]
				},{
					text: 'กลุ่มข้อมูลทรัพยากรป่าไม้',
					expanded: true,
					children:
						[
							{
							    nodeType: "gx_layer",
							    layer: "ขอบเขตชนิดป่าไม้ปี 51-55",
							    text: "ขอบเขตชนิดป่าไม้ปี 51-55",
							    legend: true
							},
							{
							    nodeType: "gx_layer",
							    layer: "อุทยานแห่งชาติ",
							    text: "อุทยานแห่งชาติ",
							    legend: true
							},
							{
							    nodeType: "gx_layer",
							    layer: "วนอุทยาน 53",
							    text: "วนอุทยาน 53",
							    legend: true
							},
							{
							    nodeType: "gx_layer",
							    layer: "ป่าสงวนแห่งชาติ",
							    text: "ป่าสงวนแห่งชาติ",
							    legend: true
							},
							{
							    nodeType: "gx_layer",
							    layer: "เขตรักษาพันธุ์สัตว์ป่า 53",
							    text: "เขตรักษาพันธุ์สัตว์ป่า 53",
							    legend: true
							},
                            {
                                nodeType: "gx_layer",
                                layer: "เขตห้ามล่าสัตว์ป่า 53",
                                text: "เขตห้ามล่าสัตว์ป่า 53",
                                legend: true
                            },
                            {
                                nodeType: "gx_layer",
                                layer: "ผลการจำแนกเขตการใช้ประโยชน์พื้นที่ป่า",
                                text: "ผลการจำแนกเขตการใช้ประโยชน์พื้นที่ป่า",
                                legend: true
                            },
                            {
                                nodeType: "gx_layer",
                                layer: "พื้นที่ สปก. 2551",
                                text: "พื้นที่ สปก. 2551",
                                legend: true
                            },

						]
				},{
					text: 'กลุ่มข้อมูลโครงสร้างพื้นฐานและสาธารณูปโภค',
					expanded: true,
					children:
						[
							{
							    nodeType: "gx_layer",
							    layer: "แหล่งศิลปกรรม",
							    text: "แหล่งศิลปกรรม",
							    legend: true
							},
							{
							    nodeType: "gx_layer",
							    layer: "เส้นทางคมนาคม",
							    text: "เส้นทางคมนาคม",
							    legend: true
							},
							{
							    nodeType: "gx_layer",
							    layer: "เส้นทางคมนาคมสายหลัก",
							    text: "เส้นทางคมนาคมสายหลัก",
							    legend: true
							},
							{
							    nodeType: "gx_layer",
							    layer: "ทางรถไฟ",
							    text: "ทางรถไฟ",
							    legend: true
							},
							{
							    nodeType: "gx_layer",
							    layer: "ท่าเรือ",
							    text: "ท่าเรือ",
							    legend: true
							},
                            {
                                nodeType: "gx_layer",
                                layer: "ท่าอากาศยาน",
                                text: "ท่าอากาศยาน",
                                legend: true
                            },
                            {
                                nodeType: "gx_layer",
                                layer: "ไฟฟ้า",
                                text: "ไฟฟ้า",
                                legend: true
                            },
                            {
                                nodeType: "gx_layer",
                                layer: "ประปา",
                                text: "ประปา",
                                legend: true
                            },
                            {
                                nodeType: "gx_layer",
                                layer: "โทรศัพท์",
                                text: "โทรศัพท์",
                                legend: true
                            },
                            {
                                nodeType: "gx_layer",
                                layer: "โรงพยาบาล",
                                text: "โรงพยาบาล",
                                legend: true
                            },
                            {
                                nodeType: "gx_layer",
                                layer: "สถานศึกษา",
                                text: "สถานศึกษา",
                                legend: true
                            },
                            {
                                nodeType: "gx_layer",
                                layer: "สถานีบริการเชื้อเพลิง",
                                text: "สถานีบริการเชื้อเพลิง",
                                legend: true
                            },
                            {
                                nodeType: "gx_layer",
                                layer: "ไปรษณีย์",
                                text: "ไปรษณีย์",
                                legend: true
                            },                    
                        ]
				},{
					text: 'กลุ่มข้อมูลพื้นที่เสี่ยงภัย',
					expanded: true,
					children:
						[
							{
							    nodeType: "gx_layer",
							    layer: "พื้นที่เสี่ยงภัยต่อสารอันตราย",
							    text: "พื้นที่เสี่ยงภัยต่อสารอันตราย",
							    legend: true
							}

						]
				}

			]
	}
];
