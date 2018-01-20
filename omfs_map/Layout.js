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
Ext.namespace("Heron.geoportal");
Heron.geoportal.menuItems = [
	{
		id: 'hr-menu-bar',
		xtype: 'toolbar',
		floating: false,
		items:[
			{
				xtype: 'tbspacer'},
			{
				xtype : 'tbseparator'
			},{
				xtype: 'tbbutton',
				text: 'แผนที่',
				tooltip: __('แสดงแผนที่'),
				icon: 'resources/css/images/silk/map.png',
				card: 'hr-geo-main',
				handler: Heron.widgets.MenuHandler.onSelect
			},
			{
				xtype : 'tbseparator'
			},{
				xtype: 'tbbutton',
				text: 'กราฟสรุปรายงานข้อมูลทรัพยากรป่าไม้',
				tooltip: __('กราฟสรุปรายงานข้อมูลทรัพยากรป่าไม้'),
				icon: 'resources/css/images/fam_silk/icons/chart_pie.png',
				menu: [{
						text: 'เนื้อที่ป่าในพื้นที่นำร่องทั้งหมด',
						card: 'hr-content-main',
						page: '_med',
						icon: 'resources/css/images/fam_silk/icons/chart_bar.png',
						handler: Heron.widgets.MenuHandler.onSelect
					},{
						text: 'ข้อมูลการบุกรุกป่าไม้ พื้นที่ 16 จังหวัดนำร่อง',
						card: 'hr-content-main',
						page: '_pha',
						icon: 'resources/css/images/fam_silk/icons/chart_bar.png',
						handler: Heron.widgets.MenuHandler.onSelect
					}]
			},{
				xtype : 'tbseparator'
			},{
				xtype: 'tbbutton',
				text: 'เอกสาร',
				tooltip: __('ดาวน์โหลดเอกสาร'),
				icon: 'resources/css/images/fam_silk/icons/page_white_go.png',
				menu: [{
						text: 'สมการการบุกรุกป่าไม้ AHP',
						card: 'hr-content-main',
						page: '_ahp',
						icon: 'resources/css/images/fam_silk/icons/page_white_acrobat.png',
						handler: Heron.widgets.MenuHandler.onSelect
					},{
						text: 'คำอธิบายระบบสนับสนุนการตัดสินใจ',
						card: 'hr-content-main',
						page: '_dss',
						icon: 'resources/css/images/fam_silk/icons/page_white_acrobat.png',
						handler: Heron.widgets.MenuHandler.onSelect
					},{
						text: 'คำอธิบายพื้นที่กันชน',
						card: 'hr-content-main',
						page: '_buffer',
						icon: 'resources/css/images/fam_silk/icons/page_white_acrobat.png',
						handler: Heron.widgets.MenuHandler.onSelect
					},{
						text: 'คำอธิบายให้ผู้ใช้งานได้ทราบอักษรย่อของชั้นข้อมูล',
						card: 'hr-content-main',
						page: '_dtc',
						icon: 'resources/css/images/fam_silk/icons/page_white_acrobat.png',
						handler: Heron.widgets.MenuHandler.onSelect
					}]
			},{
				xtype : 'tbseparator'
			}
		]
	}
];


Ext.namespace("Heron");
Ext.namespace("Heron.options");
Ext.namespace("Heron.options.layertree");
Heron.options.layertree.tree = treeTheme;

Heron.layout = {
	/** Top Panel: fills entire browser window. */
	xtype: 'panel',
	id: 'hr-container-main',
	layout: 'border',
	border: false,

	items :  [
		{
			/** North container: fixed banner plus Menu. */
			xtype: 'panel',
			id: 'hr-container-north',
			region: 'north',
			layout: 'border',
			width: '100%',
			height: 28, // Header close
			bodyBorder: false,
			border: false,
			items :  [
				{
					xtype: 'hr_htmlpanel',
					id: 'hr-logo-panel',
					region: 'center',
					bodyBorder: false,
					border: false,
					// autoLoad: {
					// 	url: 'img/head.html'
					// },
					//height: 55
				},{
					xtype: 'hr_menupanel',
					id: 'hr-menu-panel',
					region: 'south',
					bodyBorder: false,
					border: false,
					height: 28,
					/** Menu options, see widgets/MenuPanel */
					hropts: {
						pageRoot: 'content/',
						cardContainer: 'hr-container-center',
						pageContainer: 'hr-content-main',
						defaultCard: 'hr-geo-main',
						//defaultPage: 'inspire'
					},
					/** See above for the items. */
					items: Heron.geoportal.menuItems
				}
			]
		},{
			/**
			 * Content area: either map + navigation or plain (HTML) content driven by Menu.
			 * An ExtJS Card Layout is used to swap between Map view and HTML content views.
			 **/
			xtype: 'panel',
			id: 'hr-container-center',
			region: 'center',
			layout: 'card',
			border: false,
			header: false,
			activeItem: 'hr-content-main',
			width: '100%',

			items :  [
				{
					/** HTML content area in which HTML fragments from content/ dir are placed. */
					xtype: 'hr_htmlpanel',
					id: 'hr-content-main',
					layout: 'fit',
					autoScroll: true,
					height: '100%',
					width: '100%',
					preventBodyReset: true,
					bodyBorder: false,
					border: false
				},{
					/** "Geo" content area, i.e. the Map and the Accordion widgets on the left. */
					xtype: 'panel',
					id: 'hr-geo-main',
					layout: 'border',
					width: '100%',
					border: false,
					items: [
						{
							/** "Geo" navigation area, i.e. the left widgets in Accordion layout. */
							xtype: 'panel',
							id: 'hr-menu-left-container',
							title: 'Table of Content',
							layout: 'accordion',
							region: "west",
							width: 240,
							collapsible: true,
							border: false,
							split: true,
							items: [
								{
									xtype: 'hr_layertreepanel',
									id: 'gxplayerpanel',
									border: true,
									autoScroll: true,
									title: 'ชั้นข้อมูล',
									// The LayerTree tree nodes appearance: default is ugly ExtJS document icons
									// Other values are 'none' (no icons). May be overridden in specific 'gx_layer' type config.
									layerIcons : 'bylayertype',

									// Allow moving layers
									enableDD: true,

									// Right-mouse popoup menu
									contextMenu: [
										{
											xtype: 'hr_layernodemenulayerinfo'
										},{
											xtype: 'hr_layernodemenuzoomextent'
										},{
											xtype: 'hr_layernodemenustyle'
										},{
											xtype: 'hr_layernodemenuopacityslider'
										}
									],
									// Optional, use internal default if not set
									hropts: Heron.options.layertree
								},
								/*{
									xtype: 'hr_htmlpanel',
									id: 'hr-info-west',
									border: true,
									html: Heron.options.menu.html,
									preventBodyReset: true,
									title: 'Drought Monitor'
								},
								{
									xtype: 'hr_htmlpanel',
									id: 'hr-info-west',
									border: true,
									html: Heron.options.info.html,
									preventBodyReset: true,
									title: 'Drought Forecast'
								},*/

							]
						},{
							/** Map and Feature Info panel area. */
							xtype: 'panel',
							id: 'hr-map-and-info-container',
							layout: 'border',
							region: 'center',
							width: '100%',
							collapsible: false,
							split	: true,
							border: false,
							items: [
								{
									xtype: 'hr_mappanel',
									id: 'hr-map',
									title: 'ระบบสนับสนุนการตัดสินใจเชิงพื้นที่',
									region: 'center',
									collapsible : false,
									border: false,
									hropts: Heron.options.map
								}
							]
						}
					]
				}
			]
		}
	]
};
