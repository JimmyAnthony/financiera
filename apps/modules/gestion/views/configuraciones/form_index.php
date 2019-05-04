<script type="text/javascript">
	var tab = Ext.getCmp(inicio.id+'-tabContent');
	if(!Ext.getCmp('reportes-tab')){
		var reportes = {
			id:'reportes',
			id_menu:'<?php echo $p["id_menu"];?>',
			url:'/gestion/configuraciones/',
			opcion:'I',
			id_lote:0,
			shi_codigo:0,
			fac_cliente:0,
			lote:0,
			paramsStore:{},
			init:function(){
				Ext.tip.QuickTipManager.init();

				
				var store_dias_laborables = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'cod_dias_no_hab', type: 'string'},
	                    {name: 'dia', type: 'string'},
	                    {name: 'mes', type: 'string'},
	                    {name: 'year', type: 'string'},                    
	                    {name: 'descripcion', type: 'string'},
	                    {name: 'tipo', type: 'string'},
	                    {name: 'flag', type: 'string'}
	                ],
	                autoLoad:true,
	                proxy:{
	                    type: 'ajax',
	                    url: reportes.url+'get_list_no_laborables/',
	                    reader:{
	                        type: 'json',
	                        rootProperty: 'data'
	                    }
	                },
	                listeners:{
	                    load: function(obj, records, successful, opts){
	                        
	                    }
	                }
	            });

				Ext.create('Ext.window.Window',{
	                //id:reportes.id+'-win-form',
	                plain: true,
	                title:'CONFIGURACIONES',
	                icon: '/images/icon/1315404769_gear_wheel.png',
	                height: 500,
	                width: 1000,
	                resizable:false,
	                modal: true,
	                border:false,
	                closable:true,
	                padding:5,
	                layout:'border',
	                items:[
		                
							{
								region:'west',
								layout:'fit',
								//hidden:true,
								width:200,
								border:false,
								items:[
									{
						                //id:reportes.id+'-contentMenuClient',
						                layout:'fit',
						                floatable: false,
						                collapsible: false,
						                //split: true,
						                border:false,
						                //bodyPadding: 10,
						                //margin: '5 0 0 0',
						                //width: 0,
						                //hidden:true,
						                //cls: 'cmp_menu',
						                //bodyCls: 'cmp_menu',
						                html:'<div id="menu_spinner" class="spinner"><div class="cube1"></div><div class="cube2"></div></div>',
						                items:[
						                        {
						                            xtype:'MenuViewVert',
						                            id:reportes.id,
						                            mode:2,
						                            tab:reportes.id+'-tabContent',
						                            url:inicio.url+'getDataMenuView/',
						                            params:{sis_id:4}
						                        }
						                    ]
					                }
								]
							},
							{
								xtype: 'tabpanel',
								region:'center',
	                            id: reportes.id+'-tabContent',
	                            activeItem: 0,
	                            autoScroll: false,
	                            defaults:{
	                                closable: true,
	                                autoScroll: true
	                            },
	                            border: false,
	                            layout: 'fit',
	                            tabPosition: 'left',
	                            bodyCls: 'transparent',
								items:[
									{
										xtype:'panel',
										id: reportes.id+'-tab-calendario',
										border:false,
										layout:'border',
										bodyCls: 'white_fondo',
										items:[
											{
												region:'west',
												title:'Días Laborables',
												width:150,
												border:false,
												bodyCls: 'transparent',
												//padding:10,
												items:[
													{
											            xtype: 'checkboxgroup',
											            //flex: 1,
											            title: 'Días de la Semana Laborables',
											            defaultType: 'checkbox', // each item will be a checkbox
											            layout: 'vbox',
											            items: [
													        {boxLabel: 'Lunes', name: 'cb-auto-1',checked: true,padding:10},
											                {boxLabel: 'Martes', name: 'cb-auto-2', checked: true,padding:10},
											                {boxLabel: 'Miercoles', name: 'cb-auto-3',checked: true,padding:10},
											                {boxLabel: 'Jueves', name: 'cb-auto-4',checked: true,padding:10},
											                {boxLabel: 'Viernes', name: 'cb-auto-5',checked: true,padding:10},
											                {boxLabel: 'Sábado', name: 'cb-auto-6',checked: true,padding:10},
											                {boxLabel: 'Domingo', name: 'cb-auto-7',padding:10}
													    ]
													}
												],
												bbar:[
													{
								                        xtype:'button',
								                        text: 'Guardar',
								                        icon: '/images/icon/save.png',
								                        listeners:{
								                            beforerender: function(obj, opts){
								                                /*global.permisos({
								                                    id: 15,
								                                    id_btn: obj.getId(), 
								                                    id_menu: gestion_devolucion.id_menu,
								                                    fn: ['panel_asignar_gestion.limpiar']
								                                });*/
								                            },
								                            click: function(obj, e){	             	
	                               					            //agencias.getNew();
								                            }
								                        }
								                    }
												]
											},
											{
												region:'center',
												title:'Días No Laborables',
												border:false,
												layout:'border',
												bbar:[],
												items:[
													{
														region:'center',
														border:false,
														items:[
															{
										                        xtype: 'grid',
										                        id: reportes.id + '-grid-reportes',
										                        store: store_dias_laborables, 
										                        columnLines: true,
										                        columns:{
										                            items:[
										                            	{
										                            		text: 'N°',
																		    xtype: 'rownumberer',
																		    width: 40,
																		    sortable: false,
																		    locked: true
																		},
										                                {
										                                    text: 'Día',
										                                    dataIndex: 'dia',
										                                    width: 50
										                                },
										                                {
										                                    text: 'Mes',
										                                    dataIndex: 'mes',
										                                    width: 50
										                                },
										                                {
										                                    text: 'Año',
										                                    dataIndex: 'year',
										                                    width: 50
										                                },
										                                {
										                                    text: 'Descripción',
										                                    dataIndex: 'descripcion',
										                                    flex: 1
										                                },
																		{
										                                    text: 'ST',
										                                    dataIndex: 'estado',
										                                    //loocked : true,
										                                    width: 40,
										                                    align: 'center',
										                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
										                                        //console.log(record);
										                                        var estado = 'check-circle-green-16.png';
										                                        if(record.get('estado')=='I'){
										                                        	estado = 'check-circle-black-16.png';
										                                        }
										                                        metaData.style = "padding: 0px; margin: 0px";
										                                        return global.permisos({
										                                            type: 'link',
										                                            id_menu: reportes.id_menu,
										                                            icons:[
										                                                {id_serv: 8, img: estado, qtip: 'Estado.', js: ""}

										                                            ]
										                                        });
										                                    }
										                                },
										                                {
										                                    text: 'EDT',
										                                    dataIndex: 'estado',
										                                    //loocked : true,
										                                    width: 40,
										                                    align: 'center',
										                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
										                                        //console.log(record);
										                                        metaData.style = "padding: 0px; margin: 0px";
										                                        return global.permisos({
										                                            type: 'link',
										                                            id_menu: reportes.id_menu,
										                                            icons:[
										                                                {id_serv: 8, img: 'edit.png', qtip: 'Editar.', js: "reportes.getEdit("+rowIndex+")"}

										                                            ]
										                                        });
										                                    }
										                                }
										                            ],
										                            defaults:{
										                                menuDisabled: true
										                            }
										                        },
										                        multiSelect: true,
										                        trackMouseOver: false,
										                        listeners:{
										                            afterrender: function(obj){
										                                
										                            },
										                            beforeselect:function(obj, record, index, eOpts ){
										                            	//scanning.setImageFile(record.get('path'),record.get('file'));
										                            }
										                        }
										                    }
														]
													},
													{
														region:'south',
														border:false,
														height:100,
														items:[]
													}
												]
											}
										]
									},
									/*PRINCIPAL*/
									{
										xtype:'panel',
										id: reportes.id+'-tab-interes',
										border:false,
										layout:'border',
										bodyCls: 'white_fondo',
										items:[
											{
												region:'west',
												layout:'border',
												width:'50%',
												//border:false,
												bodyCls: 'transparent',
												padding:10,
												items:[
													{
														region:'north',
														//layout:'border',
														height:'50%',
														border:false,
														bodyCls: 'transparent',
														padding:10,
														items:[
															{
													            xtype: 'fieldset',
													            //flex: 1,
													            title: 'Interés',
													            defaultType: 'checkbox', // each item will be a checkbox
													            layout: 'anchor',
													            defaults: {
													                //anchor: '100%',
													                hideEmptyLabel: false
													            },
													            items: [
																	{
																        xtype: 'numberfield',
																        labelWidth: 30,
																        name: 'numberfield1',
																        fieldLabel: '%',
																        value: 5,
																        minValue: 0,
																        maxValue: 100
																    }
														        ]
														    },
														    {
													            xtype: 'fieldset',
													            //flex: 1,
													            title: 'Mora',
													            defaultType: 'checkbox', // each item will be a checkbox
													            layout: 'anchor',
													            defaults: {
													                //anchor: '100%',
													                hideEmptyLabel: false
													            },
													            items: [
																	{
																        xtype: 'numberfield',
																        labelWidth: 30,
																        name: 'numberfield1',
																        fieldLabel: '%',
																        value: 5,
																        minValue: 0,
																        maxValue: 100
																    },
																    {
																        xtype: 'numberfield',
																        labelWidth: 30,
																        name: 'numberfield1',
																        fieldLabel: 'Días',
																        value: 5,
																        minValue: 0,
																        maxValue: 100
																    }
														        ]
														    }
														]
													},
													{
														region:'center',
														//border:false,
														//layout:'fit',
														//bbar:[],
														padding:10,
														items:[
															
														]
													}
												]
											},
											{
												region:'center',
												//border:false,
												layout:'fit',
												//bbar:[],
												padding:10,
												items:[
													
												]
											}
										]
									},
									{
										xtype:'panel',
										id: reportes.id+'-tab-motivos',
										border:false,
										layout:'border',
										bodyCls: 'white_fondo',
										items:[
											{
												region:'center',
												border:false,
												layout:'fit',
												bbar:[],
												items:[
													{
								                        xtype: 'grid',
								                        id: reportes.id + '-grid-motivos',
								                        store: store_dias_laborables, 
								                        columnLines: true,
								                        columns:{
								                            items:[
								                            	{
								                            		text: 'N°',
																    xtype: 'rownumberer',
																    width: 40,
																    sortable: false,
																    locked: true
																},
								                                {
								                                    text: 'Nombre',
								                                    dataIndex: 'nombre',
								                                    width: 200
								                                },
								                                {
								                                    text: 'Descripción',
								                                    dataIndex: 'descripcion',
								                                    flex: 1
								                                },
																{
								                                    text: 'ST',
								                                    dataIndex: 'estado',
								                                    //loocked : true,
								                                    width: 40,
								                                    align: 'center',
								                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
								                                        //console.log(record);
								                                        var estado = 'check-circle-green-16.png';
								                                        if(record.get('estado')=='I'){
								                                        	estado = 'check-circle-black-16.png';
								                                        }
								                                        metaData.style = "padding: 0px; margin: 0px";
								                                        return global.permisos({
								                                            type: 'link',
								                                            id_menu: reportes.id_menu,
								                                            icons:[
								                                                {id_serv: 8, img: estado, qtip: 'Estado.', js: ""}

								                                            ]
								                                        });
								                                    }
								                                },
								                                {
								                                    text: 'EDT',
								                                    dataIndex: 'estado',
								                                    //loocked : true,
								                                    width: 40,
								                                    align: 'center',
								                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
								                                        //console.log(record);
								                                        metaData.style = "padding: 0px; margin: 0px";
								                                        return global.permisos({
								                                            type: 'link',
								                                            id_menu: reportes.id_menu,
								                                            icons:[
								                                                {id_serv: 8, img: 'edit.png', qtip: 'Editar.', js: "reportes.getEdit("+rowIndex+")"}

								                                            ]
								                                        });
								                                    }
								                                }
								                            ],
								                            defaults:{
								                                menuDisabled: true
								                            }
								                        },
								                        multiSelect: true,
								                        trackMouseOver: false,
								                        listeners:{
								                            afterrender: function(obj){
								                                
								                            },
								                            beforeselect:function(obj, record, index, eOpts ){
								                            	//scanning.setImageFile(record.get('path'),record.get('file'));
								                            }
								                        }
								                    }
												]
											}
										]
									},
									{
										xtype:'panel',
										id: reportes.id+'-tab-cargos',
										border:false,
										layout:'border',
										bodyCls: 'white_fondo',
										items:[
											{
												region:'center',
												border:false,
												layout:'fit',
												bbar:[],
												items:[
													{
								                        xtype: 'grid',
								                        id: reportes.id + '-grid-cargos',
								                        store: store_dias_laborables, 
								                        columnLines: true,
								                        columns:{
								                            items:[
								                            	{
								                            		text: 'N°',
																    xtype: 'rownumberer',
																    width: 40,
																    sortable: false,
																    locked: true
																},
								                                {
								                                    text: 'Nombre',
								                                    dataIndex: 'nombre',
								                                    width: 200
								                                },
								                                {
								                                    text: 'Descripción',
								                                    dataIndex: 'descripcion',
								                                    flex: 1
								                                },
																{
								                                    text: 'ST',
								                                    dataIndex: 'estado',
								                                    //loocked : true,
								                                    width: 40,
								                                    align: 'center',
								                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
								                                        //console.log(record);
								                                        var estado = 'check-circle-green-16.png';
								                                        if(record.get('estado')=='I'){
								                                        	estado = 'check-circle-black-16.png';
								                                        }
								                                        metaData.style = "padding: 0px; margin: 0px";
								                                        return global.permisos({
								                                            type: 'link',
								                                            id_menu: reportes.id_menu,
								                                            icons:[
								                                                {id_serv: 8, img: estado, qtip: 'Estado.', js: ""}

								                                            ]
								                                        });
								                                    }
								                                },
								                                {
								                                    text: 'EDT',
								                                    dataIndex: 'estado',
								                                    //loocked : true,
								                                    width: 40,
								                                    align: 'center',
								                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
								                                        //console.log(record);
								                                        metaData.style = "padding: 0px; margin: 0px";
								                                        return global.permisos({
								                                            type: 'link',
								                                            id_menu: reportes.id_menu,
								                                            icons:[
								                                                {id_serv: 8, img: 'edit.png', qtip: 'Editar.', js: "reportes.getEdit("+rowIndex+")"}

								                                            ]
								                                        });
								                                    }
								                                }
								                            ],
								                            defaults:{
								                                menuDisabled: true
								                            }
								                        },
								                        multiSelect: true,
								                        trackMouseOver: false,
								                        listeners:{
								                            afterrender: function(obj){
								                                
								                            },
								                            beforeselect:function(obj, record, index, eOpts ){
								                            	//scanning.setImageFile(record.get('path'),record.get('file'));
								                            }
								                        }
								                    }
												]
											}
										]
									}
								],
								listeners:{
	                                afterrender: function(obj){
	                                    obj.getTabBar().hide();
	                                }
	                            }
							}
							
					],
					listeners:{
						beforerender: function(obj, opts){
	                        global.state_item_menu(reportes.id_menu, true);
	                    },
	                    afterrender: function(obj, e){
	                    	//reportes.getReloadGridreportes('');
	                        //tab.setActiveTab(obj);
	                        global.state_item_menu_config(obj,reportes.id_menu);
	                        //reportes.getchartsAno();
	                    },
	                    beforeclose:function(obj,opts){
	                    	global.state_item_menu(reportes.id_menu, false);
	                    }
					}
				}).show();
			},
			getchartsAno:function(){
                var ANIOS =[];
                var MONTOS =[];
                var TOT_CREDITO =[];
                var TOT_ACU =[];
                var TOT_GANA =[];
                var PAGADO =[];
                var INTERES =[];
                var MORA =[];
                var SALDO =[];

				Ext.getCmp(reportes.id + '-grid-anos').getStore().each(function(record, idx) {
					ANIOS.push({"label":record.get('ano')});
		            MONTOS.push({"value":record.get('monto')});
		            TOT_CREDITO.push({"value":record.get('total_credito')});
		            TOT_ACU.push({"value":record.get('tot_acumulado')});
		            TOT_GANA.push({"value":record.get('tot_ganancia')});
		            PAGADO.push({"value":record.get('pagado')});
		            INTERES.push({"value":record.get('interes')});
		            MORA.push({"value":record.get('mora')});
		            SALDO.push({"value":record.get('saldo')});
		        });

				const dataSource = {
				  "chart": {
				    "caption": "Consolidado Por Año",
				    "subcaption": "Total Créditos,Saldos,Intereses,Mora,Ganancias",
				    "yaxisname": "Montos",
				    "syaxisname": "Porcentajes",
				    "snumbersuffix": "%",
				    "drawcustomlegendicon": "0",
				    "showvalues": "0",
				    "rotatelabels": "0",
				    "theme": "fusion"
				  },
				  "categories": [
				    {
				      "category": eval(JSON.stringify(ANIOS))
				    }
				  ],
				  "dataset": [
				    {
				      "seriesname": "Total Crédito",
				      "data": eval(JSON.stringify(TOT_CREDITO))
				    },
				    {
				      "seriesname": "Saldos",
				      "data": eval(JSON.stringify(SALDO))
				    },
				    {
				      "seriesname": "Interes",
				      "data": eval(JSON.stringify(INTERES))
				    },
				    {
				      "seriesname": "Mora",
				      "data": eval(JSON.stringify(MORA))
				    },
				    {
				      "seriesname": "Ganancias",
				      "data": eval(JSON.stringify(TOT_GANA))
				    }/*,
				    {
				      "seriesname": "% Unit Share",
				      "renderas": "line",
				      "parentyaxis": "S",
				      "data": eval(JSON.stringify(INTERES))
				    }*/
				  ]
				};

				FusionCharts.ready(function() {
				   var myChart = new FusionCharts({
				      type: "mscolumn3dlinedy",
				      renderAt: "chart-container",
				      width: "100%",
				      height: "100%",
				      dataFormat: "json",
				      dataSource
				   }).render();
				});
			},
			getchartsMes:function(){
                var ANIOS =[];
                var MONTOS =[];
                var TOT_CREDITO =[];
                var TOT_ACU =[];
                var TOT_GANA =[];
                var PAGADO =[];
                var INTERES =[];
                var MORA =[];
                var SALDO =[];

				Ext.getCmp(reportes.id + '-grid-meses').getStore().each(function(record, idx) {
					ANIOS.push({"label":record.get('ano')});
		            MONTOS.push({"value":record.get('monto')});
		            TOT_CREDITO.push({"value":record.get('total_credito')});
		            TOT_ACU.push({"value":record.get('tot_acumulado')});
		            TOT_GANA.push({"value":record.get('tot_ganancia')});
		            PAGADO.push({"value":record.get('pagado')});
		            INTERES.push({"value":record.get('interes')});
		            MORA.push({"value":record.get('mora')});
		            SALDO.push({"value":record.get('saldo')});
		        });

				const dataSource = {
				  "chart": {
				    "caption": "Consolidado Por Meses",
				    "subcaption": "Total Créditos,Saldos,Intereses, Mora,Ganancias",
				    "yaxisname": "Montos",
				    "syaxisname": "Porcentajes",
				    "snumbersuffix": "%",
				    "drawcustomlegendicon": "0",
				    "showvalues": "0",
				    "rotatelabels": "0",
				    "theme": "fusion"
				  },
				  "categories": [
				    {
				      "category": eval(JSON.stringify(ANIOS))
				    }
				  ],
				  "dataset": [
				    {
				      "seriesname": "Total Crédito",
				      "data": eval(JSON.stringify(TOT_CREDITO))
				    },
				    {
				      "seriesname": "Saldos",
				      "data": eval(JSON.stringify(SALDO))
				    },
				    {
				      "seriesname": "Interes",
				      "data": eval(JSON.stringify(INTERES))
				    },
				    {
				      "seriesname": "Mora",
				      "data": eval(JSON.stringify(MORA))
				    },
				    {
				      "seriesname": "Ganancias",
				      "data": eval(JSON.stringify(TOT_GANA))
				    }/*,
				    {
				      "seriesname": "% Unit Share",
				      "renderas": "line",
				      "parentyaxis": "S",
				      "data": eval(JSON.stringify(INTERES))
				    }*/
				  ]
				};

				FusionCharts.ready(function() {
				   var myChart = new FusionCharts({
				      type: "mscolumn3dlinedy",
				      renderAt: "chart-container-meses",
				      width: "100%",
				      height: "100%",
				      dataFormat: "json",
				      dataSource
				   }).render();
				});
			},
			getchartsAsesores:function(){
                var ANIOS =[];
                var MONTOS =[];
                var TOT_CREDITO =[];
                var TOT_ACU =[];
                var TOT_GANA =[];
                var PAGADO =[];
                var INTERES =[];
                var MORA =[];
                var SALDO =[];

				Ext.getCmp(reportes.id + '-grid-asesores').getStore().each(function(record, idx) {
					ANIOS.push({"label":record.get('ano')});
		            MONTOS.push({"value":record.get('monto')});
		            TOT_CREDITO.push({"value":record.get('total_credito')});
		            TOT_ACU.push({"value":record.get('tot_acumulado')});
		            TOT_GANA.push({"value":record.get('tot_ganancia')});
		            PAGADO.push({"value":record.get('pagado')});
		            INTERES.push({"value":record.get('interes')});
		            MORA.push({"value":record.get('mora')});
		            SALDO.push({"value":record.get('saldo')});
		        });

				const dataSource = {
				  "chart": {
				    "caption": "Consolidado Por Asesores",
				    "subcaption": "Total Créditos,Saldos,Intereses, Mora,Ganancias",
				    "yaxisname": "Montos",
				    "syaxisname": "Porcentajes",
				    "snumbersuffix": "%",
				    "drawcustomlegendicon": "0",
				    "showvalues": "0",
				    "rotatelabels": "0",
				    "theme": "fusion"
				  },
				  "categories": [
				    {
				      "category": eval(JSON.stringify(ANIOS))
				    }
				  ],
				  "dataset": [
				    {
				      "seriesname": "Total Crédito",
				      "data": eval(JSON.stringify(TOT_CREDITO))
				    },
				    {
				      "seriesname": "Saldos",
				      "data": eval(JSON.stringify(SALDO))
				    },
				    {
				      "seriesname": "Interes",
				      "data": eval(JSON.stringify(INTERES))
				    },
				    {
				      "seriesname": "Mora",
				      "data": eval(JSON.stringify(MORA))
				    },
				    {
				      "seriesname": "Ganancias",
				      "data": eval(JSON.stringify(TOT_GANA))
				    }/*,
				    {
				      "seriesname": "% Unit Share",
				      "renderas": "line",
				      "parentyaxis": "S",
				      "data": eval(JSON.stringify(INTERES))
				    }*/
				  ]
				};

				FusionCharts.ready(function() {
				   var myChart = new FusionCharts({
				      type: "mscolumn3dlinedy",
				      renderAt: "chart-container-asesores",
				      width: "100%",
				      height: "100%",
				      dataFormat: "json",
				      dataSource
				   }).render();
				});
			},
			getchartsreportes:function(){
                var ANIOS =[];
                var MONTOS =[];
                var TOT_CREDITO =[];
                var TOT_ACU =[];
                var TOT_GANA =[];
                var PAGADO =[];
                var INTERES =[];
                var MORA =[];
                var SALDO =[];

				Ext.getCmp(reportes.id + '-grid-reportes').getStore().each(function(record, idx) {
					ANIOS.push({"label":record.get('ano')});
		            MONTOS.push({"value":record.get('monto')});
		            TOT_CREDITO.push({"value":record.get('total_credito')});
		            TOT_ACU.push({"value":record.get('tot_acumulado')});
		            TOT_GANA.push({"value":record.get('tot_ganancia')});
		            PAGADO.push({"value":record.get('pagado')});
		            INTERES.push({"value":record.get('interes')});
		            MORA.push({"value":record.get('mora')});
		            SALDO.push({"value":record.get('saldo')});
		        });

				const dataSource = {
				  "chart": {
				    "caption": "Consolidado Por reportes",
				    "subcaption": "Total Créditos,Saldos,Intereses, Mora,Ganancias",
				    "yaxisname": "Montos",
				    "syaxisname": "Porcentajes",
				    "snumbersuffix": "%",
				    "drawcustomlegendicon": "0",
				    "showvalues": "0",
				    "rotatelabels": "0",
				    "theme": "fusion"
				  },
				  "categories": [
				    {
				      "category": eval(JSON.stringify(ANIOS))
				    }
				  ],
				  "dataset": [
				    {
				      "seriesname": "Total Crédito",
				      "data": eval(JSON.stringify(TOT_CREDITO))
				    },
				    {
				      "seriesname": "Saldos",
				      "data": eval(JSON.stringify(SALDO))
				    },
				    {
				      "seriesname": "Interes",
				      "data": eval(JSON.stringify(INTERES))
				    },
				    {
				      "seriesname": "Mora",
				      "data": eval(JSON.stringify(MORA))
				    },
				    {
				      "seriesname": "Ganancias",
				      "data": eval(JSON.stringify(TOT_GANA))
				    }/*,
				    {
				      "seriesname": "% Unit Share",
				      "renderas": "line",
				      "parentyaxis": "S",
				      "data": eval(JSON.stringify(INTERES))
				    }*/
				  ]
				};

				FusionCharts.ready(function() {
				   var myChart = new FusionCharts({
				      type: "mscolumn3dlinedy",
				      renderAt: "chart-container-reportes",
				      width: "100%",
				      height: "100%",
				      dataFormat: "json",
				      dataSource
				   }).render();
				});
			},
			getchartsMotivos:function(){
                var ANIOS =[];
                var MONTOS =[];
                var TOT_CREDITO =[];
                var TOT_ACU =[];
                var TOT_GANA =[];
                var PAGADO =[];
                var INTERES =[];
                var MORA =[];
                var SALDO =[];

				Ext.getCmp(reportes.id + '-grid-motivo').getStore().each(function(record, idx) {
					ANIOS.push({"label":record.get('ano')});
		            MONTOS.push({"value":record.get('monto')});
		            TOT_CREDITO.push({"value":record.get('total_credito')});
		            TOT_ACU.push({"value":record.get('tot_acumulado')});
		            TOT_GANA.push({"value":record.get('tot_ganancia')});
		            PAGADO.push({"value":record.get('pagado')});
		            INTERES.push({"value":record.get('interes')});
		            MORA.push({"value":record.get('mora')});
		            SALDO.push({"value":record.get('saldo')});
		        });

				const dataSource = {
				  "chart": {
				    "caption": "Consolidado Por Motivos",
				    "subcaption": "Total Créditos,Saldos,Intereses, Mora,Ganancias",
				    "yaxisname": "Montos",
				    "syaxisname": "Porcentajes",
				    "snumbersuffix": "%",
				    "drawcustomlegendicon": "0",
				    "showvalues": "0",
				    "rotatelabels": "0",
				    "theme": "fusion"
				  },
				  "categories": [
				    {
				      "category": eval(JSON.stringify(ANIOS))
				    }
				  ],
				  "dataset": [
				    {
				      "seriesname": "Total Crédito",
				      "data": eval(JSON.stringify(TOT_CREDITO))
				    },
				    {
				      "seriesname": "Saldos",
				      "data": eval(JSON.stringify(SALDO))
				    },
				    {
				      "seriesname": "Interes",
				      "data": eval(JSON.stringify(INTERES))
				    },
				    {
				      "seriesname": "Mora",
				      "data": eval(JSON.stringify(MORA))
				    },
				    {
				      "seriesname": "Ganancias",
				      "data": eval(JSON.stringify(TOT_GANA))
				    }/*,
				    {
				      "seriesname": "% Unit Share",
				      "renderas": "line",
				      "parentyaxis": "S",
				      "data": eval(JSON.stringify(INTERES))
				    }*/
				  ]
				};

				FusionCharts.ready(function() {
				   var myChart = new FusionCharts({
				      type: "mscolumn3dlinedy",
				      renderAt: "chart-container-motivos",
				      width: "100%",
				      height: "100%",
				      dataFormat: "json",
				      dataSource
				   }).render();
				});
			},
			getchartsAvances:function(){
                var SEMANA =[
                	{"label":"Lunes"},
                	{"label":"Martes"},
                	{"label":"Miercoles"},
                	{"label":"Jueves"},
                	{"label":"Viernes"},
                	{"label":"Sábado"},
                	{"label":"Domingo"},
                	//{"label":"Totales"}
                ];

                var VL_SOLICITADO_LU =0;
                var VL_SOLICITADO_MA =0;
                var VL_SOLICITADO_MI =0;
                var VL_SOLICITADO_JU =0;
                var VL_SOLICITADO_VI =0;
                var VL_SOLICITADO_SA =0;
                var VL_SOLICITADO_DO =0;

                var VL_MONTOS_LU =0;
                var VL_MONTOS_MA =0;
                var VL_MONTOS_MI =0;
                var VL_MONTOS_JU =0;
                var VL_MONTOS_VI =0;
                var VL_MONTOS_SA =0;
                var VL_MONTOS_DO =0;

                var VL_NO_MONTOS_LU =0;
                var VL_NO_MONTOS_MA =0;
                var VL_NO_MONTOS_MI =0;
                var VL_NO_MONTOS_JU =0;
                var VL_NO_MONTOS_VI =0;
                var VL_NO_MONTOS_SA =0;
                var VL_NO_MONTOS_DO =0;



                var VL_CANT_LU =0;
				var VL_CANT_MA =0;
				var VL_CANT_MI =0;
				var VL_CANT_JU =0;
				var VL_CANT_VI =0;
				var VL_CANT_SA =0;
				var VL_CANT_DO =0;

				var VL_CANT_COBRO_LU =0;
				var VL_CANT_COBRO_MA =0;
				var VL_CANT_COBRO_MI =0;
				var VL_CANT_COBRO_JU =0;
				var VL_CANT_COBRO_VI =0;
				var VL_CANT_COBRO_SA =0;
				var VL_CANT_COBRO_DO =0;

				var VL_CANT_NO_COBRO_LU =0;
				var VL_CANT_NO_COBRO_MA =0;
				var VL_CANT_NO_COBRO_MI =0;
				var VL_CANT_NO_COBRO_JU =0;
				var VL_CANT_NO_COBRO_VI =0;
				var VL_CANT_NO_COBRO_SA =0;
				var VL_CANT_NO_COBRO_DO =0;

                var VL_TOTAL_SOL =0;
                var VL_TOTAL =0;
                /**/
                var SOLICITADO=[];
                var MONTOS_LU =[];
                var MONTOS_NO_LU =[];
                var CANT_LU =[];
                var CANT_COBRO_LU =[];
                var CANT_NO_COBRO_LU =[];

                var TOTAL_SOL =[];
                var TOTAL =[];

				Ext.getCmp(reportes.id + '-grid-avances').getStore().each(function(record, idx) {
					
					if(record.get('detalle')=='SOLICITADO'){
						VL_SOLICITADO_LU =VL_SOLICITADO_LU + parseInt(record.get('monto_lu'));
						VL_SOLICITADO_MA =VL_SOLICITADO_MA + parseInt(record.get('monto_ma'));
						VL_SOLICITADO_MI =VL_SOLICITADO_MI + parseInt(record.get('monto_mi'));
						VL_SOLICITADO_JU =VL_SOLICITADO_JU + parseInt(record.get('monto_ju'));
						VL_SOLICITADO_VI =VL_SOLICITADO_VI + parseInt(record.get('monto_vi'));
						VL_SOLICITADO_SA =VL_SOLICITADO_SA + parseInt(record.get('monto_sa'));
						VL_SOLICITADO_DO =VL_SOLICITADO_DO + parseInt(record.get('monto_do'));
						
						VL_CANT_LU =VL_CANT_LU + parseInt(record.get('cant_lu'));
						VL_CANT_MA =VL_CANT_MA + parseInt(record.get('cant_ma'));
						VL_CANT_MI =VL_CANT_MI + parseInt(record.get('cant_mi'));
						VL_CANT_JU =VL_CANT_JU + parseInt(record.get('cant_ju'));
						VL_CANT_VI =VL_CANT_VI + parseInt(record.get('cant_vi'));
						VL_CANT_SA =VL_CANT_SA + parseInt(record.get('cant_sa'));
						VL_CANT_DO =VL_CANT_DO + parseInt(record.get('cant_do'));
					}
					

	                if(record.get('detalle')=='CARTILLA COBRADA'){
	                	VL_MONTOS_LU =VL_MONTOS_LU + parseFloat(record.get('monto_lu'));
	                	VL_MONTOS_MA =VL_MONTOS_MA + parseFloat(record.get('monto_ma'));
	                	VL_MONTOS_MI =VL_MONTOS_MI + parseFloat(record.get('monto_mi'));
	                	VL_MONTOS_JU =VL_MONTOS_JU + parseFloat(record.get('monto_ju'));
	                	VL_MONTOS_VI =VL_MONTOS_VI + parseFloat(record.get('monto_vi'));
	                	VL_MONTOS_SA =VL_MONTOS_SA + parseFloat(record.get('monto_sa'));
	                	VL_MONTOS_DO =VL_MONTOS_DO + parseFloat(record.get('monto_do'));

	                	VL_CANT_COBRO_LU =VL_CANT_COBRO_LU + parseInt(record.get('cant_lu'));
						VL_CANT_COBRO_MA =VL_CANT_COBRO_MA + parseInt(record.get('cant_ma'));
						VL_CANT_COBRO_MI =VL_CANT_COBRO_MI + parseInt(record.get('cant_mi'));
						VL_CANT_COBRO_JU =VL_CANT_COBRO_JU + parseInt(record.get('cant_ju'));
						VL_CANT_COBRO_VI =VL_CANT_COBRO_VI + parseInt(record.get('cant_vi'));
						VL_CANT_COBRO_SA =VL_CANT_COBRO_SA + parseInt(record.get('cant_sa'));
						VL_CANT_COBRO_DO =VL_CANT_COBRO_DO + parseInt(record.get('cant_do'));
	                }

	                if(record.get('detalle')=='CARTILLA NO COBRADA'){
	                	VL_NO_MONTOS_LU =VL_NO_MONTOS_LU + parseFloat(record.get('monto_lu'));
	                	VL_NO_MONTOS_MA =VL_NO_MONTOS_MA + parseFloat(record.get('monto_ma'));
	                	VL_NO_MONTOS_MI =VL_NO_MONTOS_MI + parseFloat(record.get('monto_mi'));
	                	VL_NO_MONTOS_JU =VL_NO_MONTOS_JU + parseFloat(record.get('monto_ju'));
	                	VL_NO_MONTOS_VI =VL_NO_MONTOS_VI + parseFloat(record.get('monto_vi'));
	                	VL_NO_MONTOS_SA =VL_NO_MONTOS_SA + parseFloat(record.get('monto_sa'));
	                	VL_NO_MONTOS_DO =VL_NO_MONTOS_DO + parseFloat(record.get('monto_do'));

	                	VL_CANT_NO_COBRO_LU =VL_CANT_NO_COBRO_LU + parseInt(record.get('cant_lu'));
						VL_CANT_NO_COBRO_MA =VL_CANT_NO_COBRO_MA + parseInt(record.get('cant_ma'));
						VL_CANT_NO_COBRO_MI =VL_CANT_NO_COBRO_MI + parseInt(record.get('cant_mi'));
						VL_CANT_NO_COBRO_JU =VL_CANT_NO_COBRO_JU + parseInt(record.get('cant_ju'));
						VL_CANT_NO_COBRO_VI =VL_CANT_NO_COBRO_VI + parseInt(record.get('cant_vi'));
						VL_CANT_NO_COBRO_SA =VL_CANT_NO_COBRO_SA + parseInt(record.get('cant_sa'));
						VL_CANT_NO_COBRO_DO =VL_CANT_NO_COBRO_DO + parseInt(record.get('cant_do'));
	                }

	                VL_TOTAL_SOL =VL_TOTAL_SOL + record.get('total_sol');
	                VL_TOTAL =VL_TOTAL + record.get('total');

		        });

				SOLICITADO.push(
		        	{"value":VL_SOLICITADO_LU},
		        	{"value":VL_SOLICITADO_MA},
		        	{"value":VL_SOLICITADO_MI},
		        	{"value":VL_SOLICITADO_JU},
		        	{"value":VL_SOLICITADO_VI},
		        	{"value":VL_SOLICITADO_SA},
		        	{"value":VL_SOLICITADO_DO},
		        	//{"value":VL_TOTAL}
		        	);

		        MONTOS_LU.push(
		        	{"value":VL_MONTOS_LU},
		        	{"value":VL_MONTOS_MA},
		        	{"value":VL_MONTOS_MI},
		        	{"value":VL_MONTOS_JU},
		        	{"value":VL_MONTOS_VI},
		        	{"value":VL_MONTOS_SA},
		        	{"value":VL_MONTOS_DO},
		        	//{"value":VL_TOTAL}
		        	);

		        MONTOS_NO_LU.push(
		        	{"value":VL_NO_MONTOS_LU},
		        	{"value":VL_NO_MONTOS_MA},
		        	{"value":VL_NO_MONTOS_MI},
		        	{"value":VL_NO_MONTOS_JU},
		        	{"value":VL_NO_MONTOS_VI},
		        	{"value":VL_NO_MONTOS_SA},
		        	{"value":VL_NO_MONTOS_DO},
		        	//{"value":VL_TOTAL}
		        	);

	            CANT_LU.push(
	            	{"value":VL_CANT_LU},
	            	{"value":VL_CANT_MA},
	            	{"value":VL_CANT_MI},
	            	{"value":VL_CANT_JU},
	            	{"value":VL_CANT_VI},
	            	{"value":VL_CANT_SA},
	            	{"value":VL_CANT_DO},
	            	//{"value":VL_TOTAL_SOL}
	            	);

	            CANT_COBRO_LU.push(
	            	{"value":VL_CANT_COBRO_LU},
	            	{"value":VL_CANT_COBRO_MA},
	            	{"value":VL_CANT_COBRO_MI},
	            	{"value":VL_CANT_COBRO_JU},
	            	{"value":VL_CANT_COBRO_VI},
	            	{"value":VL_CANT_COBRO_SA},
	            	{"value":VL_CANT_COBRO_DO}
	            	//{"value":VL_TOTAL_SOL}
	            	);

	           	CANT_NO_COBRO_LU.push(
	            	{"value":VL_CANT_NO_COBRO_LU},
	            	{"value":VL_CANT_NO_COBRO_MA},
	            	{"value":VL_CANT_NO_COBRO_MI},
	            	{"value":VL_CANT_NO_COBRO_JU},
	            	{"value":VL_CANT_NO_COBRO_VI},
	            	{"value":VL_CANT_NO_COBRO_SA},
	            	{"value":VL_CANT_NO_COBRO_DO}
	            	//{"value":VL_TOTAL_SOL}
	            	);


				const dataSource = {
				  "chart": {
				    "caption": "Cuadro de Avances Semanal por Montos",
				    "subcaption": "SOLICITADO,CARTILLAS COBRADAS,CARTILLAS NO COBRADAS",
				    "yaxisname": "Montos",
				    "syaxisname": "Porcentajes",
				    "snumbersuffix": "%",
				    "drawcustomlegendicon": "0",
				    "showvalues": "0",
				    "rotatelabels": "0",
				    "theme": "fusion"
				  },
				  "categories": [
				    {
				      "category": SEMANA
				    }
				  ],
				  "dataset": [
				  	{
				      "seriesname": "SOLICITADO",
				      "data": eval(JSON.stringify(SOLICITADO))
				    },
				    {
				      "seriesname": "CARTILLA COBRADA",
				      "data": eval(JSON.stringify(MONTOS_LU))
				    },
				    {
				      "seriesname": "CARTILLA NO COBRADA",
				      "data": eval(JSON.stringify(MONTOS_NO_LU))
				    },/*,
				    {
				      "seriesname": "% Unit Share",
				      "renderas": "line",
				      "parentyaxis": "S",
				      "data": eval(JSON.stringify(INTERES))
				    }*/
				  ]
				};

				const dataSource2 = {
				  "chart": {
				    "caption": "Cuadro de Avances Semanal por Cantidades",
				    "subcaption": "SOLICITADO,CARTILLAS COBRADAS,CARTILLAS NO COBRADAS",
				    "yaxisname": "Montos",
				    "syaxisname": "Porcentajes",
				    "snumbersuffix": "%",
				    "drawcustomlegendicon": "0",
				    "showvalues": "0",
				    "rotatelabels": "0",
				    "theme": "fusion"
				  },
				  "categories": [
				    {
				      "category": SEMANA
				    }
				  ],
				  "dataset": [
				    {
				      "seriesname": "SOLICITADO",
				      "data": eval(JSON.stringify(CANT_LU))
				    },
				    {
				      "seriesname": "CARTILLA COBRADA",
				      "data": eval(JSON.stringify(CANT_COBRO_LU))
				    },
				    {
				      "seriesname": "CARTILLA NO COBRADA",
				      "data": eval(JSON.stringify(CANT_NO_COBRO_LU))
				    },/*,
				    {
				      "seriesname": "% Unit Share",
				      "renderas": "line",
				      "parentyaxis": "S",
				      "data": eval(JSON.stringify(INTERES))
				    }*/
				  ]
				};

				FusionCharts.ready(function() {
				   var myChart = new FusionCharts({
				      type: "mscolumn3dlinedy",
				      renderAt: "chart-container-avances",
				      width: "100%",
				      height: "100%",
				      dataFormat: "json",
				      dataSource:dataSource
				   }).render();

				   var myChart2 = new FusionCharts({
				      type: "mscolumn3dlinedy",
				      renderAt: "chart-container-avances-cantidades",
				      width: "100%",
				      height: "100%",
				      dataFormat: "json",
				      dataSource:dataSource2
				   }).render();

				});
			},
			getSearchByYear(){
				var age = Ext.getCmp(reportes.id+'-sol-cmb-agencia').getValue();
				var ase = Ext.getCmp(reportes.id+'-sol-cmb-asesor').getValue();
				var mot = Ext.getCmp(reportes.id+'-sol-cmb-motivo').getValue();
				var mon = Ext.getCmp(reportes.id+'-sol-cmb-moneda').getValue();
				var obj = Ext.getCmp(reportes.id + '-grid-anos');

				obj.getStore().removeAll();
				obj.getStore().load(
	                {params: {VP_OP:'Y',VP_ID_AGE:age,VP_ASESOR:ase,VP_MOTIVO:mot,VP_MONEDA:mon},
	                callback:function(){
	                	reportes.getchartsAno();
	                }
	            });
			},
			getSearchByMonth(){
				var age = Ext.getCmp(reportes.id+'-sol-cmb-agencia-mes').getValue();
				var ase = Ext.getCmp(reportes.id+'-sol-cmb-asesor-mes').getValue();
				var mot = Ext.getCmp(reportes.id+'-sol-cmb-motivo-mes').getValue();
				var mon = Ext.getCmp(reportes.id+'-sol-cmb-moneda-mes').getValue();
				var obj = Ext.getCmp(reportes.id + '-grid-meses');

				obj.getStore().removeAll();
				obj.getStore().load(
	                {params: {VP_OP:'M',VP_ID_AGE:age,VP_ASESOR:ase,VP_MOTIVO:mot,VP_MONEDA:mon},
	                callback:function(){
	                	reportes.getchartsMes();
	                }
	            });
			},
			getSearchByAgencia(){
				var age = Ext.getCmp(reportes.id+'-sol-cmb-agencia-age').getValue();
				var ase = Ext.getCmp(reportes.id+'-sol-cmb-asesor-age').getValue();
				var mot = Ext.getCmp(reportes.id+'-sol-cmb-motivo-age').getValue();
				var mon = Ext.getCmp(reportes.id+'-sol-cmb-moneda-age').getValue();
				var obj = Ext.getCmp(reportes.id + '-grid-reportes');

				obj.getStore().removeAll();
				obj.getStore().load(
	                {params: {VP_OP:'A',VP_ID_AGE:age,VP_ASESOR:ase,VP_MOTIVO:mot,VP_MONEDA:mon},
	                callback:function(){
	                	reportes.getchartsreportes();
	                }
	            });
			},
			getSearchByAsesores(){
				var age = Ext.getCmp(reportes.id+'-sol-cmb-agencia-asesor').getValue();
				var ase = Ext.getCmp(reportes.id+'-sol-cmb-asesor-asesor').getValue();
				var mot = Ext.getCmp(reportes.id+'-sol-cmb-motivo-asesor').getValue();
				var mon = Ext.getCmp(reportes.id+'-sol-cmb-moneda-asesor').getValue();
				var obj = Ext.getCmp(reportes.id + '-grid-asesores');

				obj.getStore().removeAll();
				obj.getStore().load(
	                {params: {VP_OP:'S',VP_ID_AGE:age,VP_ASESOR:ase,VP_MOTIVO:mot,VP_MONEDA:mon},
	                callback:function(){
	                	reportes.getchartsAsesores();
	                }
	            });
			},
			getSearchByMotivos(){
				var age = Ext.getCmp(reportes.id+'-sol-cmb-agencia-mot').getValue();
				var ase = Ext.getCmp(reportes.id+'-sol-cmb-asesor-mot').getValue();
				var mot = Ext.getCmp(reportes.id+'-sol-cmb-motivo-mot').getValue();
				var mon = Ext.getCmp(reportes.id+'-sol-cmb-moneda-mot').getValue();
				var obj = Ext.getCmp(reportes.id + '-grid-motivo');

				obj.getStore().removeAll();
				obj.getStore().load(
	                {params: {VP_OP:'O',VP_ID_AGE:age,VP_ASESOR:ase,VP_MOTIVO:mot,VP_MONEDA:mon},
	                callback:function(){
	                	reportes.getchartsMotivos();
	                }
	            });
			},
			getSearchByAvances(){
				var data = Ext.getCmp(reportes.id+'-filtro-semanas').getSelectedRecord().data;
				var age = Ext.getCmp(reportes.id+'-sol-cmb-agencia-ava').getValue();
				var ase = Ext.getCmp(reportes.id+'-sol-cmb-asesor-ava').getValue();
				var mot = Ext.getCmp(reportes.id+'-sol-cmb-motivo-ava').getValue();
				var mon = Ext.getCmp(reportes.id+'-sol-cmb-moneda-ava').getValue();
				var obj = Ext.getCmp(reportes.id + '-grid-avances');

				var week_start 	= data.week_start;
				var week_end 	= data.week_end;

				obj.getStore().removeAll();
				obj.getStore().load(
	                {params: {VP_OP:'V',VP_ID_AGE:age,VP_ASESOR:ase,VP_MOTIVO:mot,VP_MONEDA:mon,week_start:week_start,week_end:week_end},
	                callback:function(){
	                	
	                }
	            });
			},
			getReload:function(obj,json){
		    	obj.getStore().removeAll();
				obj.getStore().load(
	                {params: json,
	                callback:function(){
	                }
	            });
			},
			getUbigeo:function(json,obj,value){
				console.log(obj);
		    	obj.getStore().removeAll();
				obj.getStore().load(
	                {params: json,
	                callback:function(){
	                	//Ext.getCmp(reportes.id+'-form').el.unmask();
	                	obj.setValue(value);
	                }
	            });
			},
			getEdit:function(index){
				var rec = Ext.getCmp(reportes.id + '-grid-credit').getStore().getAt(index);
				reportes.setForm('U',rec.data);
			},
			getNew:function(){
				reportes.setForm('I',{id_reportes:0,usr_codigo:'',usr_nombre:'',usr_perfil:1,usr_estado:1});
			},
			setForm:function(op,data){

                var myDataPerfil = [
					[1,'Básico'], 
				    [2,'Consultor'],
				    [3,'Intermedio'],
				    [4,'Supervisor'],
				    [5,'Administrador']
				];
				var store_perfil = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'perfil',
			        autoLoad: true,
			        data: myDataPerfil,
			        fields: ['code', 'name']
			    });

			    var myDatareportes = [
					[1,'Activo'], 
				    [0,'Inactivo']
				];
				var store_estado_reportes = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'perfil',
			        autoLoad: true,
			        data: myDatareportes,
			        fields: ['code', 'name']
			    });

                Ext.create('Ext.window.Window',{
	                id:reportes.id+'-win-form',
	                plain: true,
	                title:'Mantenimiento Usuario',
	                icon: '/images/icon/default-avatar_man.png',
	                height: 300,
	                width: 400,
	                resizable:false,
	                modal: true,
	                border:false,
	                closable:true,
	                padding:20,
	                //layout:'fit',
	                items:[
	                	{
                            xtype: 'textfield',	
                            disabled:true,
                            bodyStyle: 'background: transparent',
		                    padding:'5px 5px 5px 5px',
                            fieldLabel: 'Código',
                            id:reportes.id+'-txt-codigo',
                            labelWidth:50,
                            //readOnly:true,
                            labelAlign:'right',
                            width:'50%',
                            anchor:'100%',
                            listeners:{
                                afterrender:function(obj, e){
                                    // obj.getStore().load();
                                    obj.setValue(data.id_reportes);
                                }
                            }
                        },
                        {
                            xtype: 'textfield',	
                            fieldLabel: 'Usuario',
                            bodyStyle: 'background: transparent',
		                    padding:'5px 5px 5px 5px',
                            id:reportes.id+'-txt-usuario-reportes',
                            labelWidth:50,
                            //readOnly:true,
                            labelAlign:'right',
                            width:'90%',
                            anchor:'100%',
                            listeners:{
                                afterrender:function(obj, e){
                                    // obj.getStore().load();
                                    obj.setValue(data.usr_codigo);
                                }
                            }
                        },
                        {
                            xtype: 'textfield',	
                            fieldLabel: 'Clave',
                            bodyStyle: 'background: transparent',
		                    padding:'5px 5px 5px 5px',
                            inputType: 'password',
                            id:reportes.id+'-txt-clave',
                            labelWidth:50,
                            //readOnly:true,
                            labelAlign:'right',
                            width:'90%',
                            anchor:'100%'
                        },
                        {
                            xtype: 'textfield',
                            bodyStyle: 'background: transparent',
		                    padding:'5px 5px 5px 5px',
                            fieldLabel: 'Nombre',
                            id:reportes.id+'-txt-nombre-reportes',
                            labelWidth:50,
                            //readOnly:true,
                            labelAlign:'right',
                            width:'90%',
                            anchor:'100%',
                            listeners:{
                                afterrender:function(obj, e){
                                    // obj.getStore().load();
                                    obj.setValue(data.usr_nombre);
                                }
                            }
                        },
                        {
                            xtype:'combo',
                            fieldLabel: 'Perfil',
                            bodyStyle: 'background: transparent',
		                    padding:'5px 5px 5px 5px',
                            id:reportes.id+'-cmb-perfil',
                            store: store_perfil,
                            queryMode: 'local',
                            triggerAction: 'all',
                            valueField: 'code',
                            displayField: 'name',
                            emptyText: '[Seleccione]',
                            labelAlign:'right',
                            //allowBlank: false,
                            labelWidth: 50,
                            width:'90%',
                            anchor:'100%',
                            //readOnly: true,
                            listeners:{
                                afterrender:function(obj, e){
                                    // obj.getStore().load();
                                    Ext.getCmp(reportes.id+'-cmb-perfil').setValue(data.usr_perfil);
                                },
                                select:function(obj, records, eOpts){
                        
                                }
                            }
                        },
                        {
                            xtype:'combo',
                            fieldLabel: 'Estado',
                            bodyStyle: 'background: transparent',
		                    padding:'5px 5px 5px 5px',
                            id:reportes.id+'-cmb-estado-reportes',
                            store: store_estado_reportes,
                            queryMode: 'local',
                            triggerAction: 'all',
                            valueField: 'code',
                            displayField: 'name',
                            emptyText: '[Seleccione]',
                            labelAlign:'right',
                            //allowBlank: false,
                            labelWidth: 50,
                            width:'90%',
                            anchor:'100%',
                            //readOnly: true,
                            listeners:{
                                afterrender:function(obj, e){
                                    // obj.getStore().load();
                                    Ext.getCmp(reportes.id+'-cmb-estado-reportes').setValue(data.usr_estado);
                                },
                                select:function(obj, records, eOpts){
                        
                                }
                            }
                        }
	                ],
	                bbar:[       
	                    '->',
	                    '-',
	                    {
	                        xtype:'button',
	                        text: 'Grabar',
	                        icon: '/images/icon/save.png',
	                        listeners:{
	                            beforerender: function(obj, opts){
								},
	                            click: function(obj, e){
	                            	reportes.setSavereportes(op);
	                            }
	                        }
	                    },
	                    '-',
	                    {
	                        xtype:'button',
	                        text: 'Salir',
	                        icon: '/images/icon/get_back.png',
	                        listeners:{
	                            beforerender: function(obj, opts){
	                            },
	                            click: function(obj, e){
	                                Ext.getCmp(reportes.id+'-win-form').close();
	                            }
	                        }
	                    },
	                    '-'
	                ],
	                listeners:{
	                    'afterrender':function(obj, e){ 

	                    },
	                    'close':function(){

	                    }
	                }
	            }).show().center();
			},
			setSaveSolicitud:function(op){
				var sol_id_sol = Ext.getCmp(reportes.id+'-sol-txt-nro-solicitud').getValue(); 
				var sol_moneda = Ext.getCmp(reportes.id+'-sol-cmb-moneda').getValue();
				var sol_monto = Ext.getCmp(reportes.id+'-sol-txt-monto').getValue();
				var sol_tipo_cliente = Ext.getCmp(reportes.id+'-sol-txt-tipo-cliente').getValue();

				var sol_excep_si = Ext.getCmp(reportes.id+'-sol-chk-excepcion-si').getValue();
				var sol_excep_no = Ext.getCmp(reportes.id+'-sol-chk-excepcion-no').getValue();
				
				var vp_sol_excep =  sol_excep_si?'S':'N';

				var sol_fecha = Ext.getCmp(reportes.id+'-sol-date-fecha').getRawValue();
				var vp_sol_id_cli = Ext.getCmp(reportes.id+'-sol-txt-id-cli').getValue();
				var sol_ape_pat = Ext.getCmp(reportes.id+'-sol-txt-apellido-paterno').getValue();
				var sol_ape_mat = Ext.getCmp(reportes.id+'-sol-txt-apellido-materno').getValue();
				var sol_nombres = Ext.getCmp(reportes.id+'-sol-txt-nombres').getValue();
				var sol_doc_dni = Ext.getCmp(reportes.id+'-sol-txt-doc-dni').getValue();
				var sol_doc_ce = Ext.getCmp(reportes.id+'-sol-txt-doc-ce').getValue();
				var sol_doc_cip = Ext.getCmp(reportes.id+'-sol-txt-doc-cip').getValue();
				var sol_doc_ruc = Ext.getCmp(reportes.id+'-sol-txt-doc-ruc').getValue();
				var sol_doc_cm = Ext.getCmp(reportes.id+'-sol-txt-doc-cm').getValue();
				var sol_estado_civil = Ext.getCmp(reportes.id+'-sol-cmb-estado-civil').getValue();
				var sol_fecha_nac = Ext.getCmp(reportes.id+'-sol-date-fecha-nac').getRawValue();

				var vp_sol_id_tel = Ext.getCmp(reportes.id+'-sol-txt-id-tel').getValue();
				var sol_tel_cel = Ext.getCmp(reportes.id+'-sol-txt-tel-cel').getValue();
				var sol_domi_propio = Ext.getCmp(reportes.id+'-sol-chk-domi-propio').getValue();
				sol_domi_propio = sol_domi_propio?'S':'N';
				var sol_domi_pagando = Ext.getCmp(reportes.id+'-sol-chk-domi-pagando').getValue();
				sol_domi_pagando = sol_domi_pagando?'S':'N';
				var sol_domi_alquilado = Ext.getCmp(reportes.id+'-sol-chk-domi-alquilado').getValue();
				sol_domi_alquilado = sol_domi_alquilado?'S':'N';
				var sol_domi_familiar = Ext.getCmp(reportes.id+'-sol-chk-domi-familiar').getValue();
				sol_domi_familiar = sol_domi_familiar?'S':'N';

				var vp_sol_id_dir = Ext.getCmp(reportes.id+'-sol-txt-id-dir').getValue();
				var sol_dir_direccion = Ext.getCmp(reportes.id+'-sol-txt-dir-direccion').getValue();
				var sol_dir_numero = Ext.getCmp(reportes.id+'-sol-txt-dir-numero').getValue();
				var sol_dir_mz = Ext.getCmp(reportes.id+'-sol-txt-dir-mz').getValue();
				var sol_dir_lt = Ext.getCmp(reportes.id+'-sol-txt-dir-lt').getValue();
				var sol_dir_dpto = Ext.getCmp(reportes.id+'-sol-txt-dir-dpto').getValue();
				var sol_dir_interior = Ext.getCmp(reportes.id+'-sol-txt-dir-interior').getValue();
				var sol_dir_urb = Ext.getCmp(reportes.id+'-sol-txt-dir-urb').getValue();
				var sol_dir_referencia = Ext.getCmp(reportes.id+'-sol-txt-dir-referencia').getValue();
				var sol_departamento = Ext.getCmp(reportes.id+'-sol-cmb-departamento').getValue();
				var sol_provincia = Ext.getCmp(reportes.id+'-sol-cmb-provincia').getValue();
				var sol_distrito = Ext.getCmp(reportes.id+'-sol-cmb-Distrito').getValue();


				var vp_lab_id_dir = Ext.getCmp(reportes.id+'-lab-txt-id-dir').getValue();
				var lab_dir_direccion = Ext.getCmp(reportes.id+'-lab-txt-dir-direccion').getValue();
				var lab_dir_numero = Ext.getCmp(reportes.id+'-lab-txt-dir-numero').getValue();
				var lab_dir_mz = Ext.getCmp(reportes.id+'-lab-txt-dir-mz').getValue();
				var lab_dir_lt = Ext.getCmp(reportes.id+'-lab-txt-dir-lt').getValue();
				var lab_dir_dpto = Ext.getCmp(reportes.id+'-lab-txt-dir-dpto').getValue();
				var lab_dir_interior = Ext.getCmp(reportes.id+'-lab-txt-dir-interior').getValue();
				var lab_dir_urb = Ext.getCmp(reportes.id+'-lab-txt-dir-urb').getValue();
				var lab_dir_referencia = Ext.getCmp(reportes.id+'-lab-txt-dir-referencia').getValue();
				var lab_departamento = Ext.getCmp(reportes.id+'-lab-cmb-departamento').getValue();
				var lab_provincia = Ext.getCmp(reportes.id+'-lab-cmb-provincia').getValue();
				var lab_distrito = Ext.getCmp(reportes.id+'-lab-cmb-Distrito').getValue();

				var vp_lab_id_negocio = Ext.getCmp(reportes.id+'-lab-txt-id-neg').getValue();
				var lab_negocio = Ext.getCmp(reportes.id+'-lab-txt-giro-negocio').getValue();
				var lab_ant_negocio = Ext.getCmp(reportes.id+'-lab-txt-ant-negocio').getValue();
				var lab_obs = Ext.getCmp(reportes.id+'-lab-txt-obs').getValue();

				var vp_conyu_id_cli = Ext.getCmp(reportes.id+'-conyu-txt-id-cli').getRawValue();
				var conyu_ape_pater = Ext.getCmp(reportes.id+'-conyu-txt-apellido-paterno').getValue();
				var conyu_ape_mater = Ext.getCmp(reportes.id+'-conyu-txt-apellido-materno').getValue();
				var conyu_nombres = Ext.getCmp(reportes.id+'-conyu-txt-nombres').getValue();
				var conyu_dni = Ext.getCmp(reportes.id+'-conyu-txt-dni').getValue();
				var conyu_ce = Ext.getCmp(reportes.id+'-conyu-txt-ce').getValue();
				var conyu_cip = Ext.getCmp(reportes.id+'-conyu-txt-cip').getValue();
				var conyu_ruc = Ext.getCmp(reportes.id+'-conyu-txt-ruc').getValue();
				var conyu_cm = Ext.getCmp(reportes.id+'-conyu-txt-cm').getValue();
				var conyu_estado_civil = Ext.getCmp(reportes.id+'-conyu-cmb-estado-civil').getValue();
				var conyu_fecha_nacimiento = Ext.getCmp(reportes.id+'-conyu-date-fecha-nacimiento').getRawValue();

				var vp_conyu_id_tel = Ext.getCmp(reportes.id+'-conyu-txt-id-cel').getValue();
				var conyu_telefonos = Ext.getCmp(reportes.id+'-conyu-txt-telefonos').getValue();

				var conyu_contratado = Ext.getCmp(reportes.id+'-conyu-chk-sts-contratado').getValue();
				conyu_contratado = conyu_contratado?'S':'N';
				var conyu_dependiente = Ext.getCmp(reportes.id+'-conyu-chk-sts-dependiente').getValue();
				conyu_dependiente = conyu_dependiente?'S':'N';
				var conyu_independiente = Ext.getCmp(reportes.id+'-conyu-chk-sts-independiente').getValue();
				conyu_independiente = conyu_independiente?'S':'N';
				var conyu_otros = Ext.getCmp(reportes.id+'-conyu-chk-sts-otros').getValue();
				conyu_otros = conyu_otros?'S':'N';
				var conyu_bachiller = Ext.getCmp(reportes.id+'-conyu-chk-estu-bachiller').getValue();
				conyu_bachiller = conyu_bachiller?'S':'N';
				var conyu_tecnologia = Ext.getCmp(reportes.id+'-conyu-chk-estu-tecnologia').getValue();
				conyu_tecnologia = conyu_tecnologia?'S':'N';
				var conyu_titulado = Ext.getCmp(reportes.id+'-conyu-chk-estu-titulado').getValue();
				conyu_titulado = conyu_titulado?'S':'N';
				var conyu_magister = Ext.getCmp(reportes.id+'-conyu-chk-estu-magister').getValue();
				conyu_magister = conyu_magister?'S':'N';

				var vp_conyu_id_lab = Ext.getCmp(reportes.id+'-conyu-txt-id-lab').getValue();
				var vp_conyu_sueldo =0;
				var conyu_profesion = Ext.getCmp(reportes.id+'-conyu-txt-profesion').getValue();
				var conyu_centro_trab = Ext.getCmp(reportes.id+'-conyu-txt-centro-trab').getValue();
				var conyu_cargo = Ext.getCmp(reportes.id+'-conyu-txt-cargo').getValue();
				var conyu_fecha_ingreso = Ext.getCmp(reportes.id+'-conyu-date-fecha-ingreso').getRawValue();

				var vp_garan_id_cli= Ext.getCmp(reportes.id+'-garan-txt-id-cli').getValue();
				var garan_ape_pate = Ext.getCmp(reportes.id+'-garan-txt-apellido-paterno').getValue();
				var garan_ape_mate = Ext.getCmp(reportes.id+'-garan-txt-apellido-materno').getValue();
				var garan_ape_nombres = Ext.getCmp(reportes.id+'-garan-txt-nombres').getValue();
				var garan_doc_dni = Ext.getCmp(reportes.id+'-garan-txt-doc-dni').getValue();
				var garan_doc_ce = Ext.getCmp(reportes.id+'-garan-txt-doc-ce').getValue();
				var garan_doc_cip = Ext.getCmp(reportes.id+'-garan-txt-doc-cip').getValue();
				var garan_doc_ruc = Ext.getCmp(reportes.id+'-garan-txt-doc-ruc').getValue();
				var garan_doc_cm = Ext.getCmp(reportes.id+'-garan-txt-doc-cm').getValue();
				var garan_estado_civil = Ext.getCmp(reportes.id+'-garan-cmb-estado-civil').getValue();
				var garan_fecha_nac = Ext.getCmp(reportes.id+'-garan-date-fecha-nacimiento').getRawValue();

				var vp_garan_id_tel = Ext.getCmp(reportes.id+'-garan-txt-id-tel').getValue();
				var garan_telefonos = Ext.getCmp(reportes.id+'-garan-cmb-telefonos').getValue();

				var garan_domi_propio = Ext.getCmp(reportes.id+'-garan-chk-domi-propio').getValue();
				garan_domi_propio = garan_domi_propio?'S':'N';
				var garan_domi_pagando = Ext.getCmp(reportes.id+'-garan-chk-domi-pagando').getValue();
				garan_domi_pagando = garan_domi_pagando?'S':'N';
				var garan_domi_alquilado = Ext.getCmp(reportes.id+'-garan-chk-domi-alquilado').getValue();
				garan_domi_alquilado = garan_domi_alquilado?'S':'N';
				var garan_domi_familiar = Ext.getCmp(reportes.id+'-garan-chk-domi-familiar').getValue();
				garan_domi_familiar = garan_domi_familiar?'S':'N';
				var garan_profesion = Ext.getCmp(reportes.id+'-garan-txt-profesion').getValue();

				var vp_garan_id_lab = Ext.getCmp(reportes.id+'-garan-txt-id-lab').getValue();
				var garan_centro_lab = Ext.getCmp(reportes.id+'-garan-txt-centro-trab').getValue();
				var garan_cargo = Ext.getCmp(reportes.id+'-garan-txt-cargo').getValue();
				var garan_fecha_ingreso = Ext.getCmp(reportes.id+'-garan-date-fecha-ingreso').getRawValue();

				var vp_garan_id_dir = Ext.getCmp(reportes.id+'-garan-txt-id-dir').getValue();
				var garan_dir_direccion = Ext.getCmp(reportes.id+'-garan-txt-dir-direccion').getValue();
				var garan_dir_numero = Ext.getCmp(reportes.id+'-garan-txt-dir-numero').getValue();
				var garan_dir_mz = Ext.getCmp(reportes.id+'-garan-txt-dir-mz').getValue();
				var garan_dir_lt = Ext.getCmp(reportes.id+'-garan-txt-dir-lt').getValue();
				var garan_dir_dpto = Ext.getCmp(reportes.id+'-garan-txt-dir-dpto').getValue();
				var garan_dir_interior = Ext.getCmp(reportes.id+'-garan-txt-dir-interior').getValue();
				var garan_dir_ubr = Ext.getCmp(reportes.id+'-garan-txt-dir-urb').getValue();
				var garan_dir_ref = Ext.getCmp(reportes.id+'-garan-txt-dir-ref').getValue();
				var garan_departamento = Ext.getCmp(reportes.id+'-garan-cmb-departamento').getValue();
				var garan_provincia = Ext.getCmp(reportes.id+'-garan-cmb-provincia').getValue();
				var garan_distrito = Ext.getCmp(reportes.id+'-garan-cmb-Distrito').getValue();

				var garan_reportesl = Ext.getCmp(reportes.id+'-ref-txt-reportesl').getValue();
				var garan_reportesl_telf_1 = Ext.getCmp(reportes.id+'-ref-txt-reportesl-telefono-1').getValue();
				var garan_reportesl_telf_2 = Ext.getCmp(reportes.id+'-ref-txt-reportesl-telefono-2').getValue();
				var garan_comercial = Ext.getCmp(reportes.id+'-ref-txt-comercial').getValue();
				var garan_comercial_telf_1 = Ext.getCmp(reportes.id+'-ref-txt-comercial-telefono-1').getValue();
				var garan_comercial_telf_2 = Ext.getCmp(reportes.id+'-ref-txt-comercial-telefono-2').getValue();

				var rese_resena = Ext.getCmp(reportes.id+'-res-txt-resena').getValue();

				var sol_moneda = Ext.getCmp(reportes.id+'-sol-info-cmb-moneda').getValue();
				var sol_nro_cuota = Ext.getCmp(reportes.id+'-sol-txt-numero-cuotas').getValue();
				var sol_fecha_1_letra = Ext.getCmp(reportes.id+'-sol-date-fecha-1-letra').getRawValue();
				var sol_importe_aprobado = Ext.getCmp(reportes.id+'-sol-txt-import-aprobado').getValue();

				var mot_adqui_merca = Ext.getCmp(reportes.id+'-mot-chk-adqui-merca').getValue();
				mot_adqui_merca = mot_adqui_merca?'S':'N';
				var mot_ampliar_neg = Ext.getCmp(reportes.id+'-mot-chk-ampliar-neg').getValue();
				mot_ampliar_neg = mot_ampliar_neg?'S':'N';
				var mot_compra_acc_insu = Ext.getCmp(reportes.id+'-mot-chk-compra-acc-insu').getValue();
				mot_compra_acc_insu = mot_compra_acc_insu?'S':'N';
				var mot_otros = Ext.getCmp(reportes.id+'-mot-chk-otros').getValue();
				mot_otros = mot_otros?'S':'N';
				var mot_fecha = Ext.getCmp(reportes.id+'-mot-date-fecha').getRawValue();
				var mot_cod_asesor = Ext.getCmp(reportes.id+'-mot-cmb-promotor').getValue();
				var mot_cod_agencia = Ext.getCmp(reportes.id+'-mot-cmb-agencia').getValue();

				var ana_serv_luz = Ext.getCmp(reportes.id+'-ana-chk-serv-luz').getValue();
				ana_serv_luz = ana_serv_luz?'S':'N';
				var ana_serv_agua = Ext.getCmp(reportes.id+'-ana-chk-serv-agua').getValue();
				ana_serv_agua = ana_serv_agua?'S':'N';
				var ana_serv_cable = Ext.getCmp(reportes.id+'-ana-chk-serv-cable').getValue();
				ana_serv_cable = ana_serv_cable?'S':'N';
				var ana_serv_internet = Ext.getCmp(reportes.id+'-ana-chk-serv-internet').getValue();
				ana_serv_internet = ana_serv_internet?'S':'N';
				var ana_descripcion = Ext.getCmp(reportes.id+'-ana-txt-descripcion').getValue();
				var ana_apro_aprobado = Ext.getCmp(reportes.id+'-ana-chk-apro-aprobado').getValue();
				ana_apro_aprobado = ana_apro_aprobado?'S':'N';
				var ana_apro_asesor = Ext.getCmp(reportes.id+'-ana-chk-apro-asesor-comercial').getValue();
				ana_apro_asesor = ana_apro_asesor?'S':'N';


				global.Msg({
                    msg: '¿Seguro de guardar?',
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(reportes.id+'-tabContent').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:reportes.url+'setSaveInfoCredito/',
			                    params:{
			                    	vp_op:op,
			                    	vp_sol_id_sol:sol_id_sol,
			                    	vp_sol_moneda:sol_moneda,
									vp_sol_monto:sol_monto,
									vp_sol_tipo_cliente:sol_tipo_cliente,
									vp_sol_excep:vp_sol_excep,
									vp_sol_fecha:sol_fecha,
									vp_sol_id_cli:vp_sol_id_cli,
									vp_sol_ape_pat:sol_ape_pat,
									vp_sol_ape_mat:sol_ape_mat,
									vp_sol_nombres:sol_nombres,
									vp_sol_doc_dni:sol_doc_dni,
									vp_sol_doc_ce:sol_doc_ce,
									vp_sol_doc_cip:sol_doc_cip,
									vp_sol_doc_ruc:sol_doc_ruc,
									vp_sol_doc_cm:sol_doc_cm,
									vp_sol_estado_civil:sol_estado_civil,
									vp_sol_fecha_nac:sol_fecha_nac,
									vp_sol_id_tel:vp_sol_id_tel,
									vp_sol_tel_cel:sol_tel_cel,
									vp_sol_domi_propio:sol_domi_propio,
									vp_sol_domi_pagando:sol_domi_pagando,
									vp_sol_domi_alquilado:sol_domi_alquilado,
									vp_sol_domi_familiar:sol_domi_familiar,

									vp_sol_img:'',

									vp_sol_id_dir:vp_sol_id_dir,
									vp_sol_dir_direccion:sol_dir_direccion,
									vp_sol_dir_numero:sol_dir_numero,
									vp_sol_dir_mz:sol_dir_mz,
									vp_sol_dir_lt:sol_dir_lt,
									vp_sol_dir_dpto:sol_dir_dpto,
									vp_sol_dir_interior:sol_dir_interior,
									vp_sol_dir_urb:sol_dir_urb,
									vp_sol_dir_referencia:sol_dir_referencia,
									vp_sol_departamento:sol_departamento,
									vp_sol_provincia:sol_provincia,
									vp_sol_distrito:sol_distrito,

									vp_lab_id_dir:vp_lab_id_dir,
									vp_lab_dir_direccion:lab_dir_direccion,
									vp_lab_dir_numero:lab_dir_numero,
									vp_lab_dir_mz:lab_dir_mz,
									vp_lab_dir_lt:lab_dir_lt,
									vp_lab_dir_dpto:lab_dir_dpto,
									vp_lab_dir_interior:lab_dir_interior,
									vp_lab_dir_urb:lab_dir_urb,
									vp_lab_dir_referencia:lab_dir_referencia,
									vp_lab_departamento:lab_departamento,
									vp_lab_provincia:lab_provincia,
									vp_lab_distrito:lab_distrito,

									vp_lab_id_negocio:vp_lab_id_negocio,
									vp_lab_negocio:lab_negocio,
									vp_lab_ant_negocio:lab_ant_negocio,
									vp_lab_obs:lab_obs,

									vp_conyu_id_cli:vp_conyu_id_cli,
									vp_conyu_ape_pater:conyu_ape_pater,
									vp_conyu_ape_mater:conyu_ape_mater,
									vp_conyu_nombres:conyu_nombres,
									vp_conyu_dni:conyu_dni,
									vp_conyu_ce:conyu_ce,
									vp_conyu_cip:conyu_cip,
									vp_conyu_ruc:conyu_ruc,
									vp_conyu_cm:conyu_cm,
									vp_conyu_estado_civil:conyu_estado_civil,
									vp_conyu_fecha_nacimiento:conyu_fecha_nacimiento,

									vp_conyu_id_tel:vp_conyu_id_tel,
									vp_conyu_telefonos:conyu_telefonos,
									vp_conyu_img:'',

									vp_conyu_contratado:conyu_contratado,
									vp_conyu_dependiente:conyu_dependiente,
									vp_conyu_independiente:conyu_independiente,
									vp_conyu_otros:conyu_otros,
									vp_conyu_bachiller:conyu_bachiller,
									vp_conyu_tecnologia:conyu_tecnologia,
									vp_conyu_titulado:conyu_titulado,
									vp_conyu_magister:conyu_magister,
									vp_conyu_profesion:conyu_profesion,

									vp_conyu_id_lab:vp_conyu_id_lab,
									vp_conyu_sueldo:vp_conyu_sueldo,
									vp_conyu_centro_trab:conyu_centro_trab,
									vp_conyu_antiguedad:0,
									vp_conyu_cargo:conyu_cargo,
									vp_conyu_fecha_ingreso:conyu_fecha_ingreso,

									vp_garan_id_cli:vp_garan_id_cli,
									vp_garan_ape_pate:garan_ape_pate,
									vp_garan_ape_mate:garan_ape_mate,
									vp_garan_ape_nombres:garan_ape_nombres,
									vp_garan_doc_dni:garan_doc_dni,
									vp_garan_doc_ce:garan_doc_ce,
									vp_garan_doc_cip:garan_doc_cip,
									vp_garan_doc_ruc:garan_doc_ruc,
									vp_garan_doc_cm:garan_doc_cm,
									vp_garan_estado_civil:garan_estado_civil,
									vp_garan_fecha_nac:garan_fecha_nac,

									vp_garan_id_tel:vp_garan_id_tel,
									vp_garan_telefonos:garan_telefonos,

									vp_garan_domi_propio:garan_domi_propio,
									vp_garan_domi_pagando:garan_domi_pagando,
									vp_garan_domi_alquilado:garan_domi_alquilado,
									vp_garan_domi_familiar:garan_domi_familiar,
									vp_garan_profesion:garan_profesion,

									vp_garan_id_lab:vp_garan_id_lab,
									vp_garan_sueldo:0,
									vp_garan_centro_lab:garan_centro_lab,
									vp_garan_cargo:garan_cargo,
									vp_garan_fecha_ingreso:garan_fecha_ingreso,

									vp_garan_id_dir:vp_garan_id_dir,
									vp_garan_dir_direccion:garan_dir_direccion,
									vp_garan_dir_numero:garan_dir_numero,
									vp_garan_dir_mz:garan_dir_mz,
									vp_garan_dir_lt:garan_dir_lt,
									vp_garan_dir_dpto:garan_dir_dpto,
									vp_garan_dir_interior:garan_dir_interior,
									vp_garan_dir_ubr:garan_dir_ubr,
									vp_garan_dir_ref:garan_dir_ref,
									vp_garan_departamento:garan_departamento,
									vp_garan_provincia:garan_provincia,
									vp_garan_distrito:garan_distrito,

									vp_garan_reportesl:garan_reportesl,
									vp_garan_reportesl_telf_1:garan_reportesl_telf_1,
									vp_garan_reportesl_telf_2:garan_reportesl_telf_2,
									vp_garan_comercial:garan_comercial,
									vp_garan_comercial_telf_1:garan_comercial_telf_1,
									vp_garan_comercial_telf_2:garan_comercial_telf_2,

									vp_rese_resena:rese_resena,

									vp_sol_moneda:sol_moneda,
									vp_sol_nro_cuota:sol_nro_cuota,
									vp_sol_fecha_1_letra:sol_fecha_1_letra,
									vp_sol_importe_aprobado:sol_importe_aprobado,

									vp_mot_adqui_merca:mot_adqui_merca,
									vp_mot_ampliar_neg:mot_ampliar_neg,
									vp_mot_compra_acc_insu:mot_compra_acc_insu,
									vp_mot_otros:mot_otros,
									vp_mot_fecha:mot_fecha,
									vp_mot_cod_asesor:mot_cod_asesor,
									vp_mot_cod_agencia:mot_cod_agencia,

									vp_ana_serv_luz:ana_serv_luz,
									vp_ana_serv_agua:ana_serv_agua,
									vp_ana_serv_cable:ana_serv_cable,
									vp_ana_serv_internet:ana_serv_internet,
									vp_ana_descripcion:ana_descripcion,
									vp_ana_apro_aprobado:ana_apro_aprobado,
									vp_ana_apro_asesor:ana_apro_asesor,
									vp_flag:'A'
			                    },
			                    timeout: 30000000,
			                    success: function(response, options){
			                        Ext.getCmp(reportes.id+'-tabContent').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	//reportes.getHistory();
			                                	Ext.getCmp(reportes.id+'-win-form').close();
			                                }
			                            });
			                        } else{
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 0,
			                                buttons: 1,
			                                fn: function(btn){
			                                	 
			                                }
			                            });
			                        }
			                    }
			                });
						}
					}
				});

			},
			setSavereportes:function(op){

		    	var codigo = Ext.getCmp(reportes.id+'-txt-codigo').getValue();
		    	var usuario = Ext.getCmp(reportes.id+'-txt-usuario-reportes').getValue();
		    	var clave = Ext.getCmp(reportes.id+'-txt-clave').getValue();
		    	var nombre = Ext.getCmp(reportes.id+'-txt-nombre-reportes').getValue();
		    	var perfil = Ext.getCmp(reportes.id+'-cmb-perfil').getValue();
		    	var estado = Ext.getCmp(reportes.id+'-cmb-estado-reportes').getValue();

				if(usuario==''){ 
					global.Msg({msg:"Ingrese Usuario.",icon:2,fn:function(){}});
					return false;
				}
				if(clave==''){ 
					global.Msg({msg:"Ingrese Clave.",icon:2,fn:function(){}});
					return false;
				}
				if(nombre==''){ 
					global.Msg({msg:"Ingrese Nombre.",icon:2,fn:function(){}});
					return false;
				}
				if(perfil==''){ 
					global.Msg({msg:"Seleccione Perfil.",icon:2,fn:function(){}});
					return false;
				}
				if(estado==''){ 
					global.Msg({msg:"Seleccione Estado.",icon:2,fn:function(){}});
					return false;
				}

				
				global.Msg({
                    msg: '¿Seguro de guardar?',
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(reportes.id+'-tab').el.mask('Elinando Páginas…', 'x-mask-loading');
	                        scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:control.url+'set_save/',
			                    params:{
			                    	vp_op:op,
			                    	vp_id_reportes:codigo,
			                    	vp_usr_codigo:usuario,
			                    	vp_usr_passwd:clave,
			                    	vp_usr_nombre:nombre,
			                    	vp_usr_perfil:perfil,
			                    	vp_usr_estado:estado
			                    },
			                    timeout: 300000,
			                    success: function(response, options){
			                        Ext.getCmp(reportes.id+'-tab').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	reportes.getHistory();
			                                	Ext.getCmp(reportes.id+'-win-form').close();
			                                }
			                            });
			                        } else{
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 0,
			                                buttons: 1,
			                                fn: function(btn){
			                                	 
			                                }
			                            });
			                        }
			                    }
			                });
						}
					}
				});
			},
		    getHistory:function(){
		    	var vp_op = Ext.getCmp(reportes.id+'-txt-estado-filter').getValue();
				var nombre = Ext.getCmp(reportes.id+'-txt-reportes').getValue();

		    	Ext.getCmp(reportes.id + '-grid-credit').getStore().removeAll();
				Ext.getCmp(reportes.id + '-grid-credit').getStore().load(
	                {params: {vp_op:vp_op,vp_nombre:nombre},
	                callback:function(){
	                	//Ext.getCmp(reportes.id+'-form').el.unmask();
	                }
	            });
	            
		    },
			getImagen:function(param){
				win.getGalery({container:'GaleryFull',width:390,height:250,params:{forma:'F',img_path:'/images/icon/'+param}});///reportes/
			},
			getContratos:function(shi_codigo){
				Ext.getCmp(reportes.id+'-cbx-contrato').getStore().removeAll();
				Ext.getCmp(reportes.id+'-cbx-contrato').getStore().load(
	                {params: {vp_shi_codigo:shi_codigo},
	                callback:function(){
	                	//Ext.getCmp(reportes.id+'-form').el.unmask();
	                }
	            });
			},
			y2k:function(number) { return (number < 1000) ? number + 1900 : number; },
			getWeek:function(year,month,day) {
			    var when = new Date(year,month,day);
			    var newYear = new Date(year,0,1);
			    var modDay = newYear.getDay();
			    if (modDay == 0) modDay=6; else modDay--;

			    var daynum = ((Date.UTC(reportes.y2k(year),when.getMonth(),when.getDate(),0,0,0) -
			                 Date.UTC(reportes.y2k(year),0,1,0,0,0)) /1000/60/60/24) + 1;

			    if (modDay < 4 ) {
			        var weeknum = Math.floor((daynum+modDay-1)/7)+1;
			    }
			    else {
			        var weeknum = Math.floor((daynum+modDay-1)/7);
			        if (weeknum == 0) {
			            year--;
			            var prevNewYear = new Date(year,0,1);
			            var prevmodDay = prevNewYear.getDay();
			            if (prevmodDay == 0) prevmodDay = 6; else prevmodDay--;
			            if (prevmodDay < 4) weeknum = 53; else weeknum = 52;
			        }
			    }

			    return + weeknum;
			},
			getCurrentWeek:function(){
				var now = new Date();
				return reportes.getWeek(reportes.y2k(now.getYear()),now.getMonth(),now.getDate());
			}
		}
		Ext.onReady(reportes.init,reportes);
	}else{
		tab.setActiveTab(reportes.id+'-tab');
	}
</script>