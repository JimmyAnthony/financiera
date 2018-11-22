<script type="text/javascript">
Ext.chart.Chart.CHART_URL = 'Extjs/extjs/resources/charts.swf';
    Ext.ns('xim.estadistica.diagramas');xim.estadistica.diagramas={
        id:'xim.estadistica.diagramas',
        url:'modulos/diagramas/capas/control.php',
		cod_credito:0,
        init:function(){
            var clock = new Ext.Toolbar.TextItem('');
            var tab = Ext.getCmp('tab_panel');
            var chk_model = new Ext.grid.CheckboxSelectionModel({
                singleSelect:false,
                checkOnly:false,
                injectCheckbox :false
            });
            /*var store = new Ext.data.JsonStore({
				fields:['name', 'visits', 'views','xim'],
				data: [
					{name:'Jul 07', visits: 500, views: 1250, xim: 150},
					{name:'Aug 07', visits: 1300, views: 1350, xim: 202},
					{name:'Sep 07', visits: 1400, views: 1450, xim: 252},
					{name:'Oct 07', visits: 1500, views: 1550, xim: 123},
					{name:'Nov 07', visits: 1600, views: 1650, xim: 155},
					{name:'Dec 07', visits: 1700, views: 1750, xim: 477}
				]
			});*/
			var store = new Ext.data.JsonStore({
                url:this.url,
                autoLoad:true,
                baseParams:{op:'get_diagramas_data',cod_credito:xim.estadistica.diagramas.cod_credito},
                root:'data',
                fields:['cod_recibo','fecha','fecha_cuota','cod_cli','cod_cobrador','importe','mora','cobro','recibido','valor_cuota','nombres','flag','nro_cuota','interes','amortizacion','capital_vivo']
            });
			var stores = new Ext.data.JsonStore({
				url:this.url,
				autoLoad:true,
				baseParams:{op:'get_creditos'},
				root:'data',
				fields:['cod_cli','cod_cli_t','cod_credito_t','cod_credito','nombres','limite_credito']
			});
			
            var ESTADISTICA_DIAGRAMAS_EFREN_CORRO_VALLE = new Ext.Panel({
                //title:'PANEL DE ADMINISTRACION TRAVEL',
                layout:'border',
                //height:495,
                //frame:true,
                items:[
                    {
                        xtype:'panel',
                        border:false,
                        region: 'north',
                        height:60,
                        items:[
                            {
                                xtype:'fieldset',
                                //region: 'north',
                                title:'Buscar por',
                                //height:60,
                                layout:'table',
                                layoutConfig:{
                                    columns:5
                                },
                                items:[
                                    {
                                        xtype:'panel',
                                        border:false,
                                        width:900,
                                        id:'_busqueda',
                                        items:[
                                            {
                                                xtype:'panel',
                                                border:false,
                                                layout:'table',
                                                id:xim.estadistica.diagramas.id+'buscar_documentosss',
                                                layoutConfig:{
                                                    columns:10
                                                },
                                                items:[                                                   
                                                    {
                                                        xtype:'panel',
                                                        width:270,
                                                        layout:'form',
                                                        labelWidth:100,
                                                        border:false,
                                                        items:[
                                                            new Ext.ux.form.SearchField({
                                                                store: this.store,
                                                                fieldLabel:'Codigo Prestamo',
                                                                id:xim.estadistica.diagramas.id+'_xim_cod_credito',
                                                                emptyText:'Codigo Prestamo...',
                                                                enableKeyEvents:true,
                                                                width:150,
                                                                listeners:{
                                                                    keypress:function(obj,e){
                                                                       
                                                                    },
                                                                    keyup:function(obj,e){
                                                                       
                                                                    }
                                                                }
                                                            })
                                                        ]
                                                    },
													{
                                                        xtype:'panel',
                                                        width:390,
                                                        layout:'form',
                                                        labelWidth:100,
                                                        border:false,
                                                        items:[
                                                            new Ext.ux.form.SearchField({
                                                                store: this.store,
                                                                fieldLabel:'Nombre Cliente',
                                                                id:xim.estadistica.diagramas.id+'_xim_cliente',
                                                                emptyText:'Nombre Cliente...',
                                                                enableKeyEvents:true,
                                                                width:270,
                                                                listeners:{
                                                                    keypress:function(obj,e){
                                                                       
                                                                    },
                                                                    keyup:function(obj,e){
                                                                       
                                                                    }
                                                                }
                                                            })
                                                        ]
                                                    },
                                                    {
                                                        xtype:'panel',
                                                        border:false,
                                                        items:[
                                                            {
                                                                xtype:'button',
                                                                iconCls:'buscar',
                                                                text:'Buscar',
                                                                //width:80,
                                                                listeners:{
                                                                    click:function(obj,e){
                                                                       /*****CLIENTES-PRESTAMOS**/
																	   var chk_model = new Ext.grid.CheckboxSelectionModel({
																			singleSelect:false,
																			checkOnly:false,
																			injectCheckbox :false
																		});
																		var win = new Ext.Window({  
																			title: 'Listado de Clientes',
																			id:'win_clientes',
																			width: 400,
																			modal:true,
																			//layout:'fit',
																			height:400,
																			items:[
																			{
																			xtype:'panel',
																			//title:'Buscar Por',
																			border:false,
																			bodyStyle	: "padding: 5px;",
																			layout:'table',
																			layoutConfig:{
																			columns:5
																			},
																			items:[
																				{
																				xtype:'panel',
																				border:false,
																				height:40,
																				items:[
																				{
																					xtype:'label',
																					text:'Buscar:'
																				},
																				{
																				xtype:'panel',
																				colspan:1,
																				border:false,
																				width:3,
																				height:3
																				},
																				new Ext.ux.form.SearchField({
																						store: this.store,
																						fieldLabel:'Buscar Por',
																						id: 'filter-galeriessssdsdsdsdsd',
																						emptyText:'Ingrese Nombre a buscar...',
																						enableKeyEvents:true,
																						width:372,
																						listeners:{
																							keypress:function(obj,e){
																								if (e.keyCode == e.ENTER) {
																									/*Ext.getCmp( xim.estadistica.diagramas.id+'_cmb_documento').setValue('');
																									var sub = Ext.getCmp('filter-galeries').getValue();
																									Ext.getCmp(xim.estadistica.diagramas+'_grid_TRAVEL_VUELOS').getStore().reload({
																										params:{
																											op:'grid_travel_busqueda',subtitulo:sub,opcion:2
																										}
																									});}*/
																								}
																							},
																							keyup:function(obj,e){
																								//xim.com.sentencia.galeria.filter();
																							}
																						}
																					})
																				]
																				}]},
																				{
																				xtype:'grid',
																				store:stores,
																				//layout:'fit',				
																				id:xim.estadistica.diagramas.id+'_grid_clientes',
																				height:284,
																				columns:[
																					new Ext.grid.RowNumberer(),
																					{header:'Cod-credito',dataIndex:'cod_credito_t',width:70},
																					{header:'Cod-Cliente',dataIndex:'cod_cli_t',width:70},
																					{header:'Nombres',dataIndex:'nombres',width:180},
																					chk_model],
																				bbar: new Ext.PagingToolbar({
																					id:xim.estadistica.diagramas.id+'_pager_clientes',
																					store:stores,
																					displayInfo:true,
																					displayMsg:'{0} - {1} de {2} Clientes.',
																					emptyMsg:'Clientes',
																					pageSize:80
																				}),
																				sm:chk_model,
																				stripeRows:true,
																				anchor:'99%',
																				loadMask:true
																				,
																				sm: new Ext.grid.RowSelectionModel({
																					singleSelect:true,
																					listeners:{
																						rowselect:function(sm,row,rec){
																								
																						}
																					}
																				}),listeners:{
																					rowdblclick:function(obj, index, e){
																						xim.estadistica.diagramas.select_cli();															
																					}
																				}
																							}//fin grid
																			
																			],buttons:[
																			{
																				text : "Aceptar",
																				iconCls:'aceptar',
																				scope : this,
																				handler:xim.estadistica.diagramas.select_cli
																			},
																			{
																				text : "Salir",
																				scope : this,
																				listeners:{
																					click:function(obj, e){
																						Ext.getCmp('win_clientes').close();
																					}
																				},
																				iconCls:'salir'
																			}
																		]//botones del formulario
																		});  
																		 
																		win.show(); 
																	
																	   /**************************/
                                                                    }
                                                                }
                                                            }
                                                        ]
                                                    }
                                                ]
                                            }//fin
                                        ]
                                    }
                                ]
                            }]
                    },
					{xtype:'panel',
					//layout:'fit',
                     region:'center',
					 autoScroll:true,
					 items:[
                    {//panel GRID
                        xtype:'panel',
                        border:false,
                        layout:'fit',
                        //region:'center',
                        items:[
                            /**********CONTENIDO DEL DIAGRAMA********/
							new Ext.Panel({
							iconCls:'chart',
							title: 'Diagrama de total de cuotas generadas',
							frame:true,
							//renderTo: 'container',
							//width:500,
							height:200,
							layout:'fit',
					
							items: {
								xtype: 'columnchart',
								id:xim.estadistica.diagramas.id+'_xim_chart',
								store: store,
								url:'Extjs/extjs/resources/charts.swf',
								xField: 'nro_cuota',
								yAxis: new Ext.chart.NumericAxis({
									displayName: 'Visits',
									labelRenderer : Ext.util.Format.numberRenderer('0,0')
								}),
								tipRenderer : function(chart, record, index, series){
									if(series.yField == 'valor_cuota'){//Ext.util.Format.number(record.data.valor_cuota, '0,00');
										return  ' Cuota Nro ' + record.data.nro_cuota+' - Monto Estimado '+record.data.valor_cuota+ ' al ' + record.data.fecha_cuota;
									}else if(series.yField == 'mora'){
										return  ' Cuota Nro ' + record.data.nro_cuota+' - Valor Moratorio '+record.data.mora+ ' al ' + record.data.fecha_cuota;
									}else if(series.yField == 'interes'){
										return  ' Cuota Nro ' + record.data.nro_cuota+' - Valor Interes '+record.data.interes+ ' al ' + record.data.fecha_cuota;
									}else if(series.yField == 'amortizacion'){
										return  ' Cuota Nro ' + record.data.nro_cuota+' - Valor Amortizacion '+record.data.amortizacion+ ' al ' + record.data.fecha_cuota;
									}
								},
								chartStyle: {
									padding: 10,
									animationEnabled: true,
									font: {
										name: 'Tahoma',
										color: 0x444444,
										size: 11
									},
									dataTip: {
										padding: 5,
										border: {
											color: 0x99bbe8,
											size:1
										},
										background: {
											color: 0xDAE7F6,
											alpha: .9
										},
										font: {
											name: 'Tahoma',
											color: 0x15428B,
											size: 10,
											bold: true
										}
									},
									xAxis: {
										color: 0x69aBc8,
										majorTicks: {color: 0x69aBc8, length: 4},
										minorTicks: {color: 0x69aBc8, length: 2},
										majorGridLines: {size: 1, color: 0xeeeeee}
									},
									yAxis: {
										color: 0x69aBc8,
										majorTicks: {color: 0x69aBc8, length: 10},
										minorTicks: {color: 0x69aBc8, length: 5},
										majorGridLines: {size: 1, color: 0xdfe8f6}
									}
								},
								series: [{
									type: 'column',
									displayName: 'Paguinas vistas',
									yField: 'valor_cuota',
									style: {
										image:'bar.gif',
										mode: 'stretch',
										color:0x99BBE8
									}
								}/*,{
									type:'line',
									displayName: 'nro_cuota',
									yField: 'valor_cuota',
									style: {
										color: 0x15428B
									}
								}*/, 	
								{
									type: "line",
									displayName: 'mora',
									yField: 'mora',
									style: {
										color: 0x85428B
									}
								},
								{
									type: "line",
									displayName: 'interes',
									yField: 'interes',
									style: {
										color: 0x69889B
									}
								},
								{
									type: "line",
									displayName: 'amortizacion',
									yField: 'amortizacion',
									style: {
										color: 0x79889B
									}
								}/*,
								{
									type: "column",
									displayName: 'capital_vivo',
									yField: 'capital_vivo',
									style: {
										color: 0x99BBE8
									}
								}*/]
							}
						})

							/*****************FIN DIAGRAMA**********/
                               
                        ]},{//panel GRID
                        xtype:'panel',
                        border:true,
						//height:200,
                        layout:'fit',
                        //region:'center',*/
                        items:[
                            /**********CONTENIDO DEL DIAGRAMA********/
							new Ext.Panel({
							iconCls:'chart',
							title: 'Capital Vivo durante el periodo de las cuotas',
							frame:true,
							//renderTo: 'container',
							//width:500,
							height:200,
							layout:'fit',
					
							items: {
								xtype: 'columnchart',
								store: store,
								id:xim.estadistica.diagramas.id+'_xim_chart_2',
								url:'Extjs/extjs/resources/charts.swf',
								xField: 'nro_cuota',
								yAxis: new Ext.chart.NumericAxis({
									displayName: 'Visits',
									labelRenderer : Ext.util.Format.numberRenderer('0,0')
								}),
								tipRenderer : function(chart, record, index, series){
									if(series.yField == 'capital_vivo'){
										return 'Capital Vivo '+record.data.capital_vivo+ ' al ' + record.data.fecha_cuota;
									}
								},
								chartStyle: {
									padding: 10,
									animationEnabled: true,
									font: {
										name: 'Tahoma',
										color: 0x444444,
										size: 11
									},
									dataTip: {
										padding: 5,
										border: {
											color: 0x99bbe8,
											size:1
										},
										background: {
											color: 0xDAE7F6,
											alpha: .9
										},
										font: {
											name: 'Tahoma',
											color: 0x15428B,
											size: 10,
											bold: true
										}
									},
									xAxis: {
										color: 0x69aBc8,
										majorTicks: {color: 0x69aBc8, length: 4},
										minorTicks: {color: 0x69aBc8, length: 2},
										majorGridLines: {size: 1, color: 0xeeeeee}
									},
									yAxis: {
										color: 0x69aBc8,
										majorTicks: {color: 0x69aBc8, length: 10},
										minorTicks: {color: 0x69aBc8, length: 5},
										majorGridLines: {size: 1, color: 0xdfe8f6}
									}
								},
								series: [
								{
									type: "column",
									displayName: 'capital_vivo',
									yField: 'capital_vivo',
									style: {
										color: 0x99BBE8
									}
								}]
							}
						})

							/*****************FIN DIAGRAMA**********/
                               
                        ]}]}
                ],
                buttonAlign:'left',
                buttons:[
                    {
                        text:'Nuevo',
                        iconCls:'nuevo',
                        disabled:false,
                        listeners:{
                            click:function(obj,e){
                                var data = 'op=form_nuevo_recibo';
                                ximx.show({title:'Nuevo Recibo',vnombre:'ESTADISTICA_RECIBO_NUEVO',vfile:xim.estadistica.diagramas.url,data:data,moduleId:'from_nuevo',vwidth:'780',vheigth:'580'});
                            }
                        }
                    },
                    {
                        text:'Editar',
                        iconCls:'editar',
                        disabled:false,
                        listeners:{
                            click:function(obj,e){
								var data = 'op=form_nuevo_recibo';
                                ximx.show({title:'Nuevo Recibo',vnombre:'ESTADISTICA_RECIBO_NUEVO',vfile:xim.estadistica.diagramas.url,data:data,moduleId:'from_nuevo',vwidth:'780',vheigth:'580'});
								return;
                                var grid = Ext.getCmp(xim.estadistica.diagramas+'_grid_TRAVEL_VUELOS').getSelectionModel().getSelections();
                                if(grid.length <= 0){
                                    Ext.Msg.show({
                                        title: 'MULTIDESTIONS TRAVEL',
                                        msg: 'Selecciona un Registro!',
                                        buttons: Ext.Msg.OK,
                                        icon: Ext.Msg.WARNING
                                    });
                                }else{
                                    var id_vuelo = grid[0].get('id_vuelo');
                                    var data = 'op=form_nuevo&opcion=1&edic=edic&id_vuelo='+id_vuelo+'&id_xim=TRAVEL_VUELOS';
                                    ximx.show({vnombre:'TRAVEL_NUEVO',vfile:xim.estadistica.diagramas.url,data:data,moduleId:'from_nuevo',vwidth:'880',vheigth:'420'});
                                }
                            }
                        }
                    },
                    {
                        text:'Activar',
                        iconCls:'activar',
                        disabled:false,
                        listeners:{
                            click:function(obj,e){
                                xim.estadistica.diagramas.XimRecorre(0);
                            }
                        }
                    },
                    {
                        text:'Desactivar',
                        iconCls:'desactivar',
                        disabled:false,
                        listeners:{
                            click:function(obj,e){
                                xim.estadistica.diagramas.XimRecorre(1);
                            }
                        }
                    },
                    {
                        text:'Eliminar',
                        iconCls:'eliminar',
                        disabled:false,
                        listeners:{
                            click:function(obj,e){
                                xim.estadistica.diagramas.ximRecorreElimina('vuelos');
                            }
                        }
                    },
                    //////////////////////////////////////////////////
                    {
                        text:'Salir',
                        iconCls:'salir',
                        listeners:{
                            click:function(obj, e){
                                /*
                                tabs.remove(xim.estadistica.diagramas.id,true);*/
                            }
                        }
                    }                ]
            });
            tab.add({
                title: 'Diagramas',
                id:'ESTADISTICA_DIAGRAMA',//'XIM_VUELOS',
                iconCls:'calendario',
                autoScroll:true,
                layout:'fit',
                items:[
                    ESTADISTICA_DIAGRAMAS_EFREN_CORRO_VALLE                ],
                closable:true,
                listeners:{
                    'render':function(obj){
                        ximx.ximxx.close();
                        ximx.closep();
                    }
                }
            }).show();
        },
        ximRecorreElimina:function(opciones){
            var grid = Ext.getCmp(xim.estadistica.diagramas+'_grid_TRAVEL_VUELOS').getSelectionModel().getSelections();
            if(grid.length <= 0){
                Ext.Msg.show({
                    title: 'SIMI',
                    msg: 'Selecciona almenos un Registro!',
                    buttons: Ext.Msg.OK,
                    icon: Ext.Msg.WARNING
                });
            }else{

                if(!confirm('Desea ejecutar el proceso?')){return;}

                /*****************************/
                var myXIM = new Array();
                var myXIM2 = new Array();
                /****************************/
                
                Ext.getCmp(xim.estadistica.diagramas+'_grid_TRAVEL_VUELOS');
                Ext.Ajax.request({
                    url:xim.estadistica.diagramas.url,
                    params:data,
                    success:function(response,options){
                        Ext.getCmp(xim.estadistica.diagramas+'_grid_TRAVEL_VUELOS').el.unmask();
                        var msg = Ext.decode(response.responseText);
                        if(parseInt(msg['est'])==1){
                            Ext.Msg.show({
                                title: 'SIMI', //<- el t�tulo del di�logo
                                msg: 'El proceso termino correctamente!', //<- El mensaje
                                buttons: Ext.Msg.OK, //<- Botones de SI y NO
                                icon: Ext.Msg.INFO  // <- un �cono de error
                            });
                            
                        }else{//
                            Ext.Msg.show({
                                title: 'SIMI',
                                msg: 'Ocurrio un Error al tratar de almacenar la informacion, informe al Administrador del Sistema',
                                buttons: Ext.Msg.OK,
                                icon: Ext.Msg.ERROR
                            });

                        }
                    }
                });
            }
        }

        ,
        XimRecorre:function(flag){
            var xim = Ext.getCmp(xim.estadistica.diagramas+'_grid_TRAVEL_VUELOS').getSelectionModel().getSelections();
            if(xim.length <= 0){
                Ext.Msg.show({
                    title: 'SIMI',
                    msg: 'Selecciona almenos un Registro!',
                    buttons: Ext.Msg.OK,
                    icon: Ext.Msg.WARNING
                });
            }else{
                if(xim.length > 1){
                    if(!confirm('Desea ejecutar el proceso?')){return;}
                }
                /*****************************/
                var myXIM = new Array();
                /****************************/
                for(var ix=0;ix<xim.length;++ix){
                    myXIM[ix] = xim[ix].get('id_vuelo');
                }
                Ext.getCmp(xim.estadistica.diagramas+'_grid_TRAVEL_VUELOS').el.mask('Cargando...', 'x-mask-loading');
                var data = 'op=general_desactivaActiva&id_xim=TRAVEL_VUELOS&flag='+parseInt(flag)+'&id_vuelo='+myXIM;
                Ext.Ajax.request({
                    url:xim.estadistica.diagramas.url,
                    params:data,
                    success:function(response,options){
                        Ext.getCmp(xim.estadistica.diagramas+'_grid_TRAVEL_VUELOS').el.unmask();
                        var msg = Ext.decode(response.responseText);
                        if(parseInt(msg['est'])==1){
                            Ext.Msg.show({
                                title: 'SIMI', //<- el t�tulo del di�logo
                                msg: 'El proceso termino correctamente!', //<- El mensaje
                                buttons: Ext.Msg.OK, //<- Botones de SI y NO
                                icon: Ext.Msg.INFO  // <- un �cono de error
                            });
                            Ext.getCmp(xim.estadistica.diagramas+'_grid_TRAVEL_VUELOS').getStore().reload({
                                params:{
                                    op:'grid_travel'
                                }
                            });
                        }else{//
                            Ext.Msg.show({
                                title: 'SIMI',
                                msg: 'Ocurrio un Error al tratar de almacenar la informacion, informe al Administrador del Sistema',
                                buttons: Ext.Msg.OK,
                                icon: Ext.Msg.ERROR
                            });
                        }
                    }
                });
            }
        },
		select_cli:function(){
			var rec = Ext.getCmp(xim.estadistica.diagramas.id+'_grid_clientes').getSelectionModel().getSelected();
			if(rec==undefined){
				Ext.Msg.show({
					title: 'MAC',
					msg: 'Seleccione un credito de un cliente por favor!',
					buttons: Ext.Msg.OK,
					icon: Ext.Msg.WARNING
				});return;
			}
			Ext.getCmp(xim.estadistica.diagramas.id+'_xim_cod_credito').setValue(rec.get('cod_credito_t'));
			xim.estadistica.diagramas.cod_credito = rec.get('cod_credito');
			//alert(xim.estadistica.diagramas.cod_credito);
			Ext.getCmp(xim.estadistica.diagramas.id+'_xim_cliente').setValue(rec.get('nombres'));
			Ext.getCmp('win_clientes').close();
			//Ext.getCmp(xim.estadistica.diagramas.id+'_xim_chart').refresh();
			
			Ext.getCmp(xim.estadistica.diagramas.id+'_xim_chart').getStore().reload({
				params:{
					op:'get_diagramas_data'
				}
			});
			Ext.getCmp(xim.estadistica.diagramas.id+'_xim_chart').store.load(function(){
				Ext.getCmp(xim.estadistica.diagramas.id+'_xim_chart').refresh();
				Ext.getCmp(xim.estadistica.diagramas.id+'_xim_chart').redraw();
			
			});/*().reload({
				params:{
					op:'get_diagramas_data'
				}
			});*/
		}
    }
    Ext.onReady(xim.estadistica.diagramas.init,xim.estadistica.diagramas);
</script>
<style>
    .agregar{background: url(iconos/AddGreenButton.png) no-repeat !important;}
    .buscar{background: url(iconos/Binocular.png) no-repeat !important;}
</style>