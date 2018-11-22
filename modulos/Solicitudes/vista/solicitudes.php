<script type="text/javascript">
	
	Ext.ns('xim.estadistica.solicitud');xim.estadistica.solicitud={        
		id:'xim.estadistica.solicitud',
        url:'bloque_consultas/travel/capas/Control.php',
        init:function(){
			var clock = new Ext.Toolbar.TextItem('');
            var tab = Ext.getCmp('tab_panel');
			var chk_model = new Ext.grid.CheckboxSelectionModel({
				singleSelect:false,
				checkOnly:false,
				injectCheckbox :false,
			});
            var store = new Ext.data.JsonStore({
                /*url:this.url,
				autoLoad:true,
                baseParams:{op:'grid_travel'},
                root:'data',
                fields:['id_vuelo','id_det','id_aero','id_pais','subtitulo','nota','precio','comentarios','puntos','fecha','aero','pais','flag']*/
         });    
		 var TRAVEL_VUELOS_PANEL = new Ext.Panel({
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
	id:xim.estadistica.solicitud.id+'_div_parent_bus',
	items:[
		{
			xtype:'panel',
			border:false,
			layout:'table',
			id:xim.estadistica.solicitud.id+'div_documento',
			layoutConfig:{
				columns:10
			},
			items:[
				{
					xtype:'panel',
					layout:'form',
					border:false,
					width:280,
					items:[
						{
							xtype:'combo',
							fieldLabel:'Aerolineas',
							id:xim.estadistica.solicitud.id+'_cmb_documento',
							forceSelection:true,
							emptyText:'Seleccione Aerolinea...',
							store: new Ext.data.JsonStore({
								/*url:this.url,
								root:'data',
								autoLoad:true,
								totalProperty:'total',
								baseParams:{op:'combo_aerolineas'},
								fields:['id_aero','subtitulo']*/
							}),
							mode:'local',
							triggerAction:'all',
							lazyRender:true,
							editable:true,
							displayField:'subtitulo',
							valueField:'id_aero',
							anchor:'99%',
							listeners:{
								'render':function(obj){
								},
								'select':function(cmb,rec,index){
                                Ext.getCmp('filter-galeries').setValue('');
            					Ext.getCmp(xim.estadistica.solicitud+'_grid_TRAVEL_VUELOS').getStore().reload({
                                    params:{
                                        op:'grid_travel_busqueda',id_aero:rec.get('id_aero'),opcion:1
                                    }
                                });
								}
							}
						}
					]
				},
				{
					xtype:'panel',
					width:380,
					layout:'form',
					labelWidth:40,
					border:false,
					items:[
						new Ext.ux.form.SearchField({
										store: this.store,
                                        fieldLabel:'Titulo',
										id: 'filter-galeries',
                                        emptyText:'Ingrese Titulo a buscar...',
										enableKeyEvents:true,
										width:320,
										listeners:{
											keypress:function(obj,e){
                                            if (e.keyCode == e.ENTER) {
                                             Ext.getCmp( xim.estadistica.solicitud.id+'_cmb_documento').setValue('');
                                            var sub = Ext.getCmp('filter-galeries').getValue();
														Ext.getCmp(xim.estadistica.solicitud+'_grid_TRAVEL_VUELOS').getStore().reload({
                                    params:{
                                        op:'grid_travel_busqueda',subtitulo:sub,opcion:2
                                    }
                                });}
											},
											keyup:function(obj,e){
												    //xim.com.sentencia.galeria.filter();
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
                                 Ext.getCmp( xim.estadistica.solicitud.id+'_cmb_documento').setValue('');
									var sub = Ext.getCmp('filter-galeries').getValue();
														Ext.getCmp(xim.estadistica.solicitud+'_grid_TRAVEL_VUELOS').getStore().reload({
                                    params:{
                                        op:'grid_travel_busqueda',subtitulo:sub,opcion:2
                                    }
                                });
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
                   {//panel GRID
					xtype:'panel',
					border:false,
					layout:'fit',
					region:'center',
					items:[
					 {
					xtype:'panel',
					border:false,
					listeners: {
								render:{
									fn: function(){
										Ext.fly(clock.getEl().parent()).addClass('x-status-text-panel').createChild({cls:'spacer'});
					
										// Kick off the clock timer that updates the clock el every second:
										Ext.TaskMgr.start({
											run: function(){
												Ext.fly(clock.getEl()).update(new Date().format('g:i:s A'));
											},
											interval: 1000
										});
									},
									delay: 100
								}
					},
					layout:'fit',
					//region:'center',
					items:[
                   		{
                        xtype:'grid',
                        store:store,
						layout:'fit',
						
                        id:xim.estadistica.solicitud+'_grid_TRAVEL_VUELOS',
                        columns:[
                           new Ext.grid.RowNumberer(),
				{header:'ID',dataIndex:'id_vuelo',width:50},
				{header:'Aerolinea',dataIndex:'aero',width:100},
				//{header:'Pais',dataIndex:'pais',width:100},
				{header:'Titulo',dataIndex:'subtitulo',width:200},
				{header:'Precio',dataIndex:'precio',width:100},
				{header:'Comentarios',dataIndex:'comentarios',width:70},
				{header:'T.Puntos',dataIndex:'puntos',width:60},
				{header:'Fecha',dataIndex:'fecha',width:120},
				{header:'Estado',dataIndex:'flag',width:120},
				chk_model                        ],
                        bbar: new Ext.PagingToolbar({
                            id:xim.estadistica.solicitud.id+'_pager',
                            store:store,
                            displayInfo:true,
                            displayMsg:'{0} - {1} de {2} Vuelos.',
                            emptyMsg:'Sin Vuelos',
                            pageSize:80,
							items: ['',clock]
                        }),
						sm:chk_model,
                        stripeRows:true,
                        anchor:'99%',
                        loadMask:true
                        /*,
                        sm: new Ext.grid.RowSelectionModel({
                            singleSelect:true,
                            listeners:{
                                rowselect:function(sm,row,rec){
                                    
                                }
                            }
                        })*/
                    }//fin grid
					]}
					]}
                ],
                buttonAlign:'left',
                buttons:[
					{
                        text:'Nuevo',
                        iconCls:'nuevo',
                        disabled:false,
                        listeners:{
                            click:function(obj,e){
                                var data = 'op=form_nuevo&opcion=1&id_xim=TRAVEL_VUELOS';
                                ximx.show({vnombre:'TRAVEL_NUEVO',vfile:xim.estadistica.solicitud.url,data:data,moduleId:'from_nuevo',vwidth:'880',vheigth:'420'});
                            }
                        }
                    },
                    {
                        text:'Editar',
                        iconCls:'editar',
                        disabled:false,
                        listeners:{
                            click:function(obj,e){
								var grid = Ext.getCmp(xim.estadistica.solicitud+'_grid_TRAVEL_VUELOS').getSelectionModel().getSelections();
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
                                ximx.show({vnombre:'TRAVEL_NUEVO',vfile:xim.estadistica.solicitud.url,data:data,moduleId:'from_nuevo',vwidth:'880',vheigth:'420'});
								}
                            }
                        }
                    },
					{
                        text:'Comentarios',
                        iconCls:'comentarios',
                        disabled:false,
                        listeners:{
                            click:function(obj,e){
								var grid = Ext.getCmp(xim.estadistica.solicitud+'_grid_TRAVEL_VUELOS').getSelectionModel().getSelections();
								if(grid.length <= 0){
									Ext.Msg.show({
										title: 'MULTIDESTIONS TRAVEL',
										msg: 'Selecciona un Registro!',
										buttons: Ext.Msg.OK,
										icon: Ext.Msg.WARNING
									});
								}else{
								var id_det = grid[0].get('id_det');
                                var data = 'op=form_comentarios&id_det='+id_det;
                                ximx.show({vnombre:'TRAVEL_COMENTARIOS',vfile:xim.estadistica.solicitud.url,data:data,moduleId:'from_comentarios',vwidth:'595',vheigth:'400'});
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
                                xim.estadistica.solicitud.XimRecorre(0);
                            }
                        }
                    },
                    {
                        text:'Desactivar',
                        iconCls:'desactivar',
                        disabled:false,
                        listeners:{
                            click:function(obj,e){
                               xim.estadistica.solicitud.XimRecorre(1);
                            }
                        }
                    },
					{
                        text:'Eliminar',
                        iconCls:'eliminar',
                        disabled:false,
                        listeners:{
                            click:function(obj,e){
                               xim.estadistica.solicitud.ximRecorreElimina('vuelos');
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
                                tabs.remove(xim.estadistica.solicitud.id,true);*/
                            }
                        }
                    }                ]
            });
            tab.add({
                title: 'Solicitudes',
                id:'ESTADISTICA_SOLICITUDES',//'XIM_VUELOS',
                iconCls:'Counter',
                autoScroll:true,
				layout:'fit',
                items:[
                    TRAVEL_VUELOS_PANEL                ],
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
		var grid = Ext.getCmp(xim.estadistica.solicitud+'_grid_TRAVEL_VUELOS').getSelectionModel().getSelections();
		if(grid.length <= 0){
			Ext.Msg.show({
				title: 'SIMI',
				msg: 'Selecciona almenos un Registro!',
				buttons: Ext.Msg.OK, 
				icon: Ext.Msg.WARNING ,
			});
		}else{
			
				if(!confirm('Desea ejecutar el proceso?')){return;}
			
		/*****************************/
		var myXIM = new Array();
		var myXIM2 = new Array();
		/****************************/
		switch(opciones){
			case 'vuelos':
			for(var ix=0;ix<grid.length;++ix){
					myXIM[ix] = grid[ix].get('id_vuelo');
					myXIM2[ix] = grid[ix].get('id_det');
			}
			var data = 'op=general_desactivaActivaElimina&opcion=8&id_det='+myXIM2+'&id_vuelo='+myXIM;
			break;
			case 'paquetes':
			for(var ix=0;ix<grid.length;++ix){
					myXIM[ix] = grid[ix].get('id_paquete');
					myXIM2[ix] = grid[ix].get('id_det_paquete');
			}
			var data = 'op=general_desactivaActivaElimina&opcion=9&id_det_paquete='+myXIM2+'&id_paquete='+myXIM;
			break;
			case 'hoteles':
			for(var ix=0;ix<grid.length;++ix){
					myXIM[ix] = grid[ix].get('id_hotel');
			}
			var data = 'op=general_desactivaActivaElimina&opcion=10&id_hotel='+myXIM;
			break;
			case 'cruceros':
			for(var ix=0;ix<grid.length;++ix){
					myXIM[ix] = grid[ix].get('id_crucero');
			}
			var data = 'op=general_desactivaActivaElimina&opcion=11&id_crucero='+myXIM;
			break;
			case 'tips':
			for(var ix=0;ix<grid.length;++ix){
					myXIM[ix] = grid[ix].get('id_tips');
			}
			var data = 'op=general_desactivaActivaElimina&opcion=12&id_tips='+myXIM;
			break;
			case 'aerolineas':
			for(var ix=0;ix<grid.length;++ix){
					myXIM[ix] = grid[ix].get('id_aero');
			}
			var data = 'op=general_desactivaActivaElimina&opcion=13&id_aero='+myXIM;
			break;
			case 'paises':
			for(var ix=0;ix<grid.length;++ix){
					myXIM[ix] = grid[ix].get('id_pais');
			}
			var data = 'op=general_desactivaActivaElimina&opcion=14&id_pais='+myXIM;
			break;
		}		
		Ext.getCmp(xim.estadistica.solicitud+'_grid_TRAVEL_VUELOS');
				Ext.Ajax.request({
					url:xim.estadistica.solicitud.url,
					params:data,
					success:function(response,options){
						Ext.getCmp(xim.estadistica.solicitud+'_grid_TRAVEL_VUELOS').el.unmask();
						var msg = Ext.decode(response.responseText);
						if(parseInt(msg['est'])==1){
							Ext.Msg.show({
							title: 'SIMI', //<- el t�tulo del di�logo
							msg: 'El proceso termino correctamente!', //<- El mensaje
							buttons: Ext.Msg.OK, //<- Botones de SI y NO
							icon: Ext.Msg.INFO , // <- un �cono de error
							});
							switch(opciones){
								case 'vuelos':
								Ext.getCmp(xim.estadistica.solicitud+'_grid_TRAVEL_VUELOS').getStore().reload({
									params:{
										op:'grid_travel'
									}
								});
								break;
								case 'paquetes':
								Ext.getCmp(xim.estadistica.solicitud+'_grid_TRAVEL_VUELOS').getStore().reload({
									params:{
										op:'grid_paquetes'
									}
								});
								break;
								case 'hoteles':
								Ext.getCmp(xim.estadistica.solicitud+'_grid_TRAVEL_VUELOS').getStore().reload({
									params:{
										op:'grid_hoteles'
									}
								});
								break;
								case 'cruceros':
								Ext.getCmp(xim.estadistica.solicitud+'_grid_TRAVEL_VUELOS').getStore().reload({
									params:{
										op:'grid_cruceros'
									}
								});
								break;
								case 'tips':
								Ext.getCmp(xim.estadistica.solicitud+'_grid_TRAVEL_VUELOS').getStore().reload({
									params:{
										op:'grid_tips'
									}
								});
								break;
								case 'aerolineas':
								Ext.getCmp(xim.estadistica.solicitud+'_grid_TRAVEL_VUELOS').getStore().reload({
									params:{
										op:'grid_aerolineas'
									}
								});
								break;
								case 'paises':
								Ext.getCmp(xim.estadistica.solicitud+'_grid_TRAVEL_VUELOS').getStore().reload({
									params:{
										op:'grid_paises'
									}
								});
								break;
							}
						}else{//
						Ext.Msg.show({
							title: 'SIMI',
							msg: 'Ocurrio un Error al tratar de almacenar la informacion, informe al Administrador del Sistema', 
							buttons: Ext.Msg.OK,
							icon: Ext.Msg.ERROR ,
						});
							
						}
					}
				});
		}
		}
		
						,
						XimRecorre:function(flag){
						var xim = Ext.getCmp(xim.estadistica.solicitud+'_grid_TRAVEL_VUELOS').getSelectionModel().getSelections();
							if(xim.length <= 0){
								Ext.Msg.show({
									title: 'SIMI',
									msg: 'Selecciona almenos un Registro!',
									buttons: Ext.Msg.OK, 
									icon: Ext.Msg.WARNING ,
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
							Ext.getCmp(xim.estadistica.solicitud+'_grid_TRAVEL_VUELOS').el.mask('Cargando...', 'x-mask-loading');
									var data = 'op=general_desactivaActiva&id_xim=TRAVEL_VUELOS&flag='+parseInt(flag)+'&id_vuelo='+myXIM;
									Ext.Ajax.request({
										url:xim.estadistica.solicitud.url,
										params:data,
										success:function(response,options){
											Ext.getCmp(xim.estadistica.solicitud+'_grid_TRAVEL_VUELOS').el.unmask();
											var msg = Ext.decode(response.responseText);
											if(parseInt(msg['est'])==1){
												Ext.Msg.show({
												title: 'SIMI', //<- el t�tulo del di�logo
												msg: 'El proceso termino correctamente!', //<- El mensaje
												buttons: Ext.Msg.OK, //<- Botones de SI y NO
												icon: Ext.Msg.INFO , // <- un �cono de error
												});
												Ext.getCmp(xim.estadistica.solicitud+'_grid_TRAVEL_VUELOS').getStore().reload({
													params:{
														op:'grid_travel'
													}
												});
											}else{//
											Ext.Msg.show({
												title: 'SIMI',
												msg: 'Ocurrio un Error al tratar de almacenar la informacion, informe al Administrador del Sistema', 
												buttons: Ext.Msg.OK,
												icon: Ext.Msg.ERROR ,
											});
												
											}
										}
									});
							}
					}
				    }
    Ext.onReady(xim.estadistica.solicitud.init,xim.estadistica.solicitud);
    </script>
<style>
.agregar{background: url(iconos/AddGreenButton.png) no-repeat !important;}
.buscar{background: url(iconos/Binocular.png) no-repeat !important;}
</style>