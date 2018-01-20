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
/* Heron.examples.searchPanelConfig = {
    xtype: 'hr_multisearchcenterpanel',
    height: 600,
    hropts: [
        {
            searchPanel: {
                xtype: 'hr_searchbydrawpanel',
                name: __('ค้นหาโดยใช้เมาส์วาด'),
                header: false
            },
            resultPanel: {
                xtype: 'hr_featuregridpanel',
                id: 'hr-featuregridpanel',
                header: false,
                autoConfig: true,
                autoConfigMaxSniff: 100,
                exportFormats: ['XLS', 'GMLv2', 'GeoJSON', 'WellKnownText', 'Shapefile'],
                gridCellRenderers: Heron.options.gridCellRenderers,
                hropts: {
                    zoomOnRowDoubleClick: true,
                    zoomOnFeatureSelect: false,
                    zoomLevelPointSelect: 12,
                    zoomToDataExtent: false
                }
            }
        },{
            searchPanel: {
                xtype: 'hr_searchbyfeaturepanel',
                name: __('ค้นหาโดยใช้ขอบเขตชั้นข้อมูล'),
                description: 'Select feature-geometries from one layer and use these to perform a spatial search in another layer.',
                header: false,
                border: false,
                bodyStyle: 'padding: 6px',
                style: {
                    fontFamily: 'Verdana, Arial, Helvetica, sans-serif',
                    fontSize: '12px'
                }
            },
            resultPanel: {
                xtype: 'hr_featuregridpanel',
                id: 'hr-featuregridpanel',
                header: false,
                border: false,
                autoConfig: true,
                exportFormats: ['XLS', 'GMLv2', 'GeoJSON', 'WellKnownText', 'Shapefile'],
                gridCellRenderers: Heron.options.gridCellRenderers,
                hropts: {
                    zoomOnRowDoubleClick: true,
                    zoomOnFeatureSelect: false,
                    zoomLevelPointSelect: 12,
                    zoomToDataExtent: false
                }
            }
        },{
            searchPanel: {
                xtype: 'hr_gxpquerypanel',
                name: __('ค้นหาโดยกำหนดเงื่อนไข'),
                description: 'This search uses both search within Map extent and/or your own attribute criteria',
                header: false,
                border: false,
                caseInsensitiveMatch: true,
                autoWildCardAttach: true
            },
            resultPanel: {
                xtype: 'hr_featuregridpanel',
                id: 'hr-featuregridpanel',
                header: false,
                border: false,
                autoConfig: true,
                exportFormats: ['XLS', 'GMLv2', 'GeoJSON', 'WellKnownText', 'Shapefile'],
                gridCellRenderers: Heron.options.gridCellRenderers,
                hropts: {
                    zoomOnRowDoubleClick: true,
                    zoomOnFeatureSelect: false,
                    zoomLevelPointSelect: 12,
                    zoomToDataExtent: true
                }
            }
        }
    ]
}; */
/* 
Heron.options.map.toolbar = [    
    {type: "baselayer", options: {width: 150, listWidth: 160}},
    {type: "scale"},
	{type: "-"} ,
    {type: "featureinfo", options: {
        popupWindow: {
            width: 400,
            height: 340,
            featureInfoPanel: {
                showTopToolbar: true,
                //vertical feature info
                displayPanels: ['Detail', 'Table'],

                // Should column-names be capitalized? Default true.
                columnCapitalize: true,

                // Export to download file. Option values are 'CSV', 'XLS', or a Formatter object (see FeatureGridPanel) , default is no export (results in no export menu).
                exportFormats: ['CSV', 'XLS', 'GMLv2', 'Shapefile',
                    {
                        name: 'Esri Shapefile (WGS84)',
                        formatter: 'OpenLayersFormatter',
                        format: 'OpenLayers.Format.GeoJSON',
                        targetFormat: 'ESRI Shapefile',
                        targetSrs: 'EPSG:4326',
                        fileExt: '.zip',
                        mimeType: 'application/zip'
                    },{
                        // Try this with PDOK Streekpaden and Fietsroutes :-)
                         name: 'GPS File (GPX)',
                         formatter: 'OpenLayersFormatter',
                         format: 'OpenLayers.Format.GeoJSON',
                         targetSrs: 'EPSG:4326',
                         targetFormat: 'GPX',
                         fileExt: '.gpx',
                         mimeType: 'text/plain'
                     },
                    'GeoJSON', 'WellKnownText'],
                // Export to download file. Option values are 'CSV', 'XLS', default is no export (results in no export menu).
                // exportFormats: ['CSV', 'XLS'],
                maxFeatures: 50,

                // In case that the same layer would be requested more than once: discard the styles
                discardStylesForDups: true
            }
        }
    }},
    {type: "-"} ,
    {type: "pan"},
//    {type: "pan", options: {iconCls: "icon-hand"}},
    {type: "zoomin"},
    {type: "zoomout"},
    {type: "zoomvisible"},
    //{type: "coordinatesearch", options: {onSearchCompleteZoom: 8}},
    {type: "-"} ,
    {type: "zoomprevious"},
    {type: "zoomnext"},
    {type: "-"},
// Use "geodesic: true" for non-linear/Mercator projections like Google, Bing etc 
    {type: "measurelength", options: {geodesic: false}},
    {type: "measurearea", options: {geodesic: false}}
];
 */
Heron.examples.searchPanelConfig = {
    xtype: 'hr_multisearchcenterpanel',
    height: 600,
    hropts: [
        {
            searchPanel: {
                xtype: 'hr_searchbydrawpanel',
                name: __('ค้นหาโดยใช้เมาส์วาด'),
                header: false
            },
            resultPanel: {
                xtype: 'hr_featuregridpanel',
                id: 'hr-featuregridpanel',
                header: false,
                autoConfig: true,
                autoConfigMaxSniff: 100,
                exportFormats: ['XLS', 'GMLv2', 'GeoJSON', 'WellKnownText', 'Shapefile'],
                gridCellRenderers: Heron.options.gridCellRenderers,
                hropts: {
                    zoomOnRowDoubleClick: true,
                    zoomOnFeatureSelect: false,
                    zoomLevelPointSelect: 12,
                    zoomToDataExtent: false
                }
            }
        }, {
            searchPanel: {
                xtype: 'hr_searchbyfeaturepanel',
                name: __('ค้นหาโดยใช้ขอบเขตชั้นข้อมูล'),
                description: 'เป็นการค้นหาข้อมูลโดยใช้หลักการสืบค้นเชิงพื้นที่(Spatial Query)',
                header: false,
                border: false,
                bodyStyle: 'padding: 6px',
                style: {
                    fontFamily: 'Verdana, Arial, Helvetica, sans-serif',
                    fontSize: '12px'
                }
            },
            resultPanel: {
                xtype: 'hr_featuregridpanel',
                id: 'hr-featuregridpanel',
                header: false,
                border: false,
                autoConfig: true,
                exportFormats: ['XLS', 'GMLv2', 'GeoJSON', 'WellKnownText', 'Shapefile'],
                gridCellRenderers: Heron.options.gridCellRenderers,
                hropts: {
                    zoomOnRowDoubleClick: true,
                    zoomOnFeatureSelect: false,
                    zoomLevelPointSelect: 12,
                    zoomToDataExtent: false
                }
            }
        }, {
            searchPanel: {
                xtype: 'hr_gxpquerypanel',
                name: __('ค้นหาโดยกำหนดเงื่อนไข'),
                description: 'This search uses both search within Map extent and/or your own attribute criteria',
                header: false,
                border: false,
                caseInsensitiveMatch: true,
                autoWildCardAttach: true
            },
            resultPanel: {
                xtype: 'hr_featuregridpanel',
                id: 'hr-featuregridpanel',
                header: false,
                border: false,
                autoConfig: true,
                exportFormats: ['XLS', 'GMLv2', 'GeoJSON', 'WellKnownText', 'Shapefile'],
                gridCellRenderers: Heron.options.gridCellRenderers,
                hropts: {
                    zoomOnRowDoubleClick: true,
                    zoomOnFeatureSelect: false,
                    zoomLevelPointSelect: 12,
                    zoomToDataExtent: true
                }
            }
        }
    ]
};

Heron.options.map.toolbar = [
    { type: "baselayer", options: { width: 120, listWidth: 120 } },
    { type: "scale" },
    { type: "-" },
    {
        type: "featureinfo", options: {
            popupWindow: {
                width: 400,
                height: 340,
                featureInfoPanel: {
                    showTopToolbar: true,
                    displayPanels: ['Detail', 'Table'],

                    // Should column-names be capitalized? Default true.
                    columnCapitalize: true,

                    // Export to download file. Option values are 'CSV', 'XLS', or a Formatter object (see FeatureGridPanel) , default is no export (results in no export menu).
                    exportFormats: ['CSV', 'XLS', 'GMLv2', 'Shapefile',
                        {
                            name: 'Esri Shapefile (WGS84)',
                            formatter: 'OpenLayersFormatter',
                            format: 'OpenLayers.Format.GeoJSON',
                            targetFormat: 'ESRI Shapefile',
                            targetSrs: 'EPSG:4326',
                            fileExt: '.zip',
                            mimeType: 'application/zip'
                        }, {
                            // Try this with PDOK Streekpaden and Fietsroutes :-)
                            name: 'GPS File (GPX)',
                            formatter: 'OpenLayersFormatter',
                            format: 'OpenLayers.Format.GeoJSON',
                            targetSrs: 'EPSG:4326',
                            targetFormat: 'GPX',
                            fileExt: '.gpx',
                            mimeType: 'text/plain'
                        },
                        'GeoJSON', 'WellKnownText'],
                    // Export to download file. Option values are 'CSV', 'XLS', default is no export (results in no export menu).
                    // exportFormats: ['CSV', 'XLS'],
                    maxFeatures: 50,

                    // In case that the same layer would be requested more than once: discard the styles
                    discardStylesForDups: true
                }
            }
        }
    },
    { type: "-" },
    { type: "pan" },
    //    {type: "pan", options: {iconCls: "icon-hand"}},
    { type: "zoomin" },
    { type: "zoomout" },
    { type: "zoomvisible" },
    { type: "-" },
    { type: "zoomprevious" },
    { type: "zoomnext" },
    { type: "-" },
    // Use "geodesic: true" for non-linear/Mercator projections like Google, Bing etc 
    { type: "measurelength", options: { geodesic: false } },
    { type: "measurearea", options: { geodesic: false } },
    { type: "-" },
    {
        type: "coordinatesearch",
        options: {

            // === Full demo configuration ===

            // see ToolbarBuilder.js
            formWidth: 420,
            formPageX: 400,
            formPageY: 100
            // see CoordSearchPanel.js
            // , title: 'My title'
            ,
            titleDescription: 'โปรดเลือกระบบเส้นโครงแผนที่ที่ต้องการ...<br><br>จากนั้นให้กรอกค่าพิกัด ลองจิจูด / ละติจูด หรือ<br>พิกัดยูทีเอ็มทางตะวันออก / พิกัดยูทีเอ็มทางทางเหนือ.<br>&nbsp;<br>',
            titleDescriptionStyle: 'font-size:11px; color:dimgrey;',
            bodyBaseCls: 'x-form-back',
            bodyItemCls: 'hr-html-panel-font-size-11',
            bodyCls: 'hr-html-panel-font-size-11',
            fieldMaxWidth: 250,
            fieldLabelWidth: 80,
            fieldStyle: 'color: blue;',
            fieldLabelStyle: 'color: darkblue'
            //, layerName: 'Location Thailand - Lon/Lat'
            ,
            onProjectionIndex: 1,
            onZoomLevel: -1,
            showProjection: true,
            showZoom: true,
            showAddMarkers: true,
            checkAddMarkers: true,
            showHideMarkers: true,
            checkHideMarkers: false,
            showResultMarker: true,
            fieldResultMarkerStyle: 'color: darkblue;' // green
            ,
            fieldResultMarkerText: 'Marker position: ',
            fieldResultMarkerSeparator: ' | ',
            fieldResultMarkerPrecision: 4,
            removeMarkersOnClose: true,
            showRemoveMarkersBtn: true,
            buttonAlign: 'center' // left, center, right
            /*
                http://spatialreference.org/ref/epsg/4326/
                EPSG:4326
                WGS 84
                WGS84 Bounds: -180.0000, -90.0000, 180.0000, 90.0000
                Projected Bounds: -180.0000, -90.0000, 180.0000, 90.0000

                http://spatialreference.org/ref/epsg/28992/    
                EPSG:28992
                Amersfoort / RD New
                WGS84 Bounds: 3.3700, 50.7500, 7.2100, 53.4700
                Projected Bounds: 12628.0541, 308179.0423, 283594.4779, 611063.1429
            */
            ,
            hropts: [{
                projEpsg: 'EPSG:4326',
                projDesc: 'EPSG:4326 - WGS 84',
                fieldLabelX: 'Lon [ลองจิจูด]',
                fieldLabelY: 'Lat [ละติจูด]',
                fieldEmptyTextX: 'กรุณาระบุพิกัดลองจิจูด...',
                fieldEmptyTextY: 'กรุณาระบุพิกัดละติจูด...',
                fieldMinX: -180,
                fieldMinY: -90,
                fieldMaxX: 180,
                fieldMaxY: 90,
                fieldDecPrecision: 6,
                iconWidth: 32,
                iconHeight: 32,
                localIconFile: 'bluepin.png',
                iconUrl: null
            }, {
                projEpsg: 'EPSG:32647',
                projDesc: 'EPSG:32647 - WGS 1984/UTM zone 47N',
                fieldLabelX: 'E [meters]',
                fieldLabelY: 'N [meters]',
                fieldEmptyTextX: 'กรุณาระบุพิกัดยูทีเอ็มทางตะวันออก...',
                fieldEmptyTextY: 'กรุณาระบุพิกัดยูทีเอ็มทางทางเหนือ...',
                fieldMinX: 166021.4431,
                fieldMinY: 0.0000,
                fieldMaxX: 833978.5569,
                fieldMaxY: 9329005.1825,
                fieldDecPrecision: 2,
                iconWidth: 32,
                iconHeight: 32,
                localIconFile: 'redpin.png',
                iconUrl: null

            }

                , {
                projEpsg: 'EPSG:32648',
                projDesc: 'EPSG:32648 - WGS 1984/UTM zone 48N',
                fieldLabelX: 'E [meters]',
                fieldLabelY: 'N [meters]',
                fieldEmptyTextX: 'กรุณาระบุพิกัดยูทีเอ็มทางตะวันออก...',
                fieldEmptyTextY: 'กรุณาระบุพิกัดยูทีเอ็มทางทางเหนือ...',
                fieldMinX: 166021.4431,
                fieldMinY: 0.0000,
                fieldMaxX: 833978.5569,
                fieldMaxY: 9329005.1825,
                fieldDecPrecision: 2,
                iconWidth: 32,
                iconHeight: 32,
                localIconFile: 'redpin.png',
                iconUrl: null

            }

            ]
        }
    },    
    //{ type: "addbookmark" },
    //{ type: "help", options: { tooltip: 'Help and info for this example', contentUrl: 'help.html' } },
    { type: "-" },
    {
        type: "searchcenter",
        // Options for SearchPanel window
        options: {
            show: false,

            searchWindow: {
                title: __('เครื่องมือค้นหา'),
                x: 100,
                y: undefined,
                width: 660,
                height: 440,
                items: [
                    Heron.examples.searchPanelConfig
                ]
            }
        }
    },
    { type: "-" },
/*     {
        type: "printdialog", options: {
            url: 'http://10.39.102.56:8080/geoserver/pdf'
            , showTitle: true
            , mapTitle: 'My Header - Print Dialog'
            , mapTitleYAML: "mapTitle"		// MapFish - field name in config.yaml - default is: 'mapTitle'
            , showComment: true
            , mapComment: 'My Comment - Print Dialog'
            , mapCommentYAML: "mapComment"	// MapFish - field name in config.yaml - default is: 'mapComment'
            , showFooter: true
            , mapFooter: 'My Footer - Print Dialog'
            , mapFooterYAML: "mapFooter"	// MapFish - field name in config.yaml - default is: 'mapFooter'
            , showRotation: true
            , showLegend: true
            , showLegendChecked: true
            , mapLimitScales: false
        }
    }, */
    {
        type: "printdirect", options: {
            url: 'http://www.gistnu.ltaxsmartgroup.com/geoserver/pdf',
            tooltip: __('Print Visible Map Area Directly') + ' JPEG'
            //, mapTitle: 'My Header - Direct Print'
            // , mapTitleYAML: "mapTitle"		// MapFish - field name in config.yaml - default is: 'mapTitle'
            , mapComment: 'My Comment - Direct Print, Output format JPEG'
            // , mapCommentYAML: "mapComment"	// MapFish - field name in config.yaml - default is: 'mapComment'
            // , mapFooter: 'My Footer - Direct Print'
            // , mapFooterYAML: "mapFooter"	    // MapFish - field name in config.yaml - default is: 'mapFooter'
            // , printAttribution: true         // Flag for printing the attribution
            // , mapAttribution: null           // Attribution text or null = visible layer attributions
            // , mapAttributionYAML: "mapAttribution" // MapFish - field name in config.yaml - default is: 'mapAttribution'
            // , mapPrintLayout: "A4"			// MapFish - 'name' entry of the 'layouts' array or Null (=> MapFish default)
            // , mapPrintDPI: "75"				// MapFish - 'value' entry of the 'dpis' array or Null (=> MapFish default)
            , mapPrintOutputFormat: 'jpeg' // By default uses PDF ('pdf'), but may use e.g. 'jpeg' or 'bmp' see your YAML File
            // , mapPrintLegend: true
            // , legendDefaults: {
            //     useScaleParameter : false,
            //     baseParams: {FORMAT: "image/png"}
            //   }
        }
    },
    {
        type: "printdialog", options: {
            url: 'http://www.gistnu.ltaxsmartgroup.com/geoserver/pdf'
            // , showTitle: true
            // , mapTitle: 'My Header - Print Dialog'
            // , mapTitleYAML: "mapTitle"		// MapFish - field name in config.yaml - default is: 'mapTitle'
            // , showComment: true
            // , mapComment: 'My Comment - Print Dialog'
            // , mapCommentYAML: "mapComment"	// MapFish - field name in config.yaml - default is: 'mapComment'
            // , showFooter: true
            // , mapFooter: 'My Footer - Print Dialog'
            // , mapFooterYAML: "mapFooter"	    // MapFish - field name in config.yaml - default is: 'mapFooter'
            // , printAttribution: true         // Flag for printing the attribution
            // , mapAttribution: null           // Attribution text or null = visible layer attributions
            // , mapAttributionYAML: "mapAttribution" // MapFish - field name in config.yaml - default is: 'mapAttribution'
            // , showOutputFormats: true
            // , showRotation: true
            // , showLegend: true
            // , showLegendChecked: true
            // , mapLimitScales: false
            , mapPreviewAutoHeight: true
            // , mapPreviewHeight: 400
        }
    } 
];

// The content of the HTML info panel.
Ext.namespace("Heron.options.info");
Heron.options.info.html =
        '<div class="hr-html-panel-body">' +
            '<p>การจัดการข้อมูลแผนที่</p>' +
                '<ul>' +
                '<li><a href="#" target="_new"><b>เพิ่มชั้นข้อมูล</b></a> : ทำการเพิ่มชั้นข้อมูล</li>' +
                '<li><a href="#" target="_new"><b>แก้ไขชั้นข้อมูล</b></a> : ทำการแก้ไขชั้นข้อมูล</li>' +
                '<li><a href="#" target="_new"><b>ลบชั้นข้อมูล</b></a> : ทำการลบชั้นข้อมูล</li>' +
                '</ul>' +
        '</div>';
	
Ext.namespace("Heron.options.menu");
Heron.options.menu.html =
   '<div class="hr-html-panel-body">' +
   '<iframe src="#" style="border:none; width: 100%; height: 100%"></iframe>'
	
   
    '</div>';
	
/*
 * Values for BookmarksPanel (bookmarks to jump to specific
 * layers/zoom/center on map. 
 */		