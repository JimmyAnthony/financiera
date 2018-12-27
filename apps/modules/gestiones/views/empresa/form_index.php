<script type="text/javascript">
	var tab = Ext.getCmp(inicio.id+'-tabContent');
	if(!Ext.getCmp('reorder-tab')){
		var reorder = {
			id:'reorder',
			id_menu:'<?php echo $p["id_menu"];?>',
			url:'/gestion/reorder/',
			opcion:'I',
			id_lote:'<?php echo $p["id_lote"];?>',
			shi_codigo:'<?php echo $p["shi_codigo"];?>',
			fac_cliente:'<?php echo $p["fac_cliente"];?>',
			callback:'<?php echo $p["callback"];?>',
			paramsStore:{
				hijo:0,
				padre:0,
				nivel:0
			},
			init:function(){
				Ext.Ajax.timeout = 180000;
            	Ext.QuickTips.init();
				Ext.tip.QuickTipManager.init();

				var store = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'estado', type: 'string'}
	                ],
	                autoLoad:false,
	                proxy:{
	                    type: 'ajax',
	                    url: reorder.url+'get_XX/',
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

				
				var panel = Ext.create('Ext.form.Panel',{
					id:reorder.id+'-form',
					bodyStyle: 'background: transparent',
					border:false,
					layout:'border',
					defaults:{
						border:false
					},
					//tbar:[],
					items:[
						{
							region:'center',
							//layout:'border',
							layout:'fit',
							border:false,
							items:[
								{
                                    region: 'center',
                                    xtype: 'tabpanel',
                                    id: reorder.id+'-tabContent',
                                    activeItem: 0,
                                    autoScroll: false,
                                    defaults:{
                                        closable: true,
                                        autoScroll: true
                                    },
                                    border: true,
                                    layout: 'fit',
                                    //tabPosition: 'left',
                                    // tabRotation: 0,
                                    items:[
                                        {
                                            title: 'Información Empresa',
                                            icon: '/images/icon/home.png',
                                            closable: false,
                                            layout: 'fit',
                                            items:[
                                                {
						                            xtype:'fieldset',
						                            //title:'Buscar Por',
						                            border:false,
													bodyStyle: 'background: transparent',
				                                    padding:'2px 1px 1px 1px',
						                            layout:'column',
						                            /*layoutConfig:{
						                            columns:2
						                            },*/
						                            //width:615,
						                            items:[
						                            	{
					                                        xtype:'textfield',
					                                        padding:'15px 15px 5px 5px',
					                                        columnWidth:1,
					                                        id:reorder.id+'_txt_empresa',
					                                        //autoCreate: {tag: 'input', type: 'text', size: '82', autocomplete: 'off', maxlength: '1000'},
					                                        fieldLabel:'Nombre Empresa',
															value:'<?php echo $nombre;?>',
					                                        labelWidth: 100,
						                                    labelAlign:'right',//,
					                                        listeners:{
				                                                keypress:function(obj,e){
			                                                        if(e.keyCode==13){

			                                                        }
				                                                }
					                                        }
						                                },
						                                {
					                                        xtype:'textfield',
					                                        padding:'15px 15px 5px 5px',
					                                        columnWidth:1,
					                                        id:reorder.id+'_txt_empresa_sub',
					                                        //autoCreate: {tag: 'input', type: 'text', size: '82', autocomplete: 'off', maxlength: '1000'},
					                                        fieldLabel:'Sub Titulo:',
															value:'<?php echo $sub_titulo;?>',
					                                        labelWidth: 100,
						                                    labelAlign:'right',//,
						                                    listeners:{
				                                                keypress:function(obj,e){
			                                                        if(e.keyCode==13){

			                                                        }
				                                                }
					                                        }
						                                },
						                                {
					                                        xtype:'textfield',
					                                        padding:'15px 15px 5px 5px',
					                                        columnWidth:1,
					                                        id:reorder.id+'_txt_empresa_ciudad',
					                                        //autoCreate: {tag: 'input', type: 'text', size: '82', autocomplete: 'off', maxlength: '1000'},
					                                        fieldLabel:'Ciudad',
															value:'<?php echo $cuidad;?>',
					                                        labelWidth: 100,
						                                    labelAlign:'right',//,
					                                        listeners:{
				                                                keypress:function(obj,e){
			                                                        if(e.keyCode==13){

			                                                        }
				                                                }
					                                        }
						                                },
						                                {
					                                        xtype:'textfield',
					                                        padding:'15px 15px 5px 5px',
					                                        columnWidth:1,
					                                        id:reorder.id+'_txt_empresa_direc',
					                                        //autoCreate: {tag: 'input', type: 'text', size: '82', autocomplete: 'off', maxlength: '1000'},
					                                        fieldLabel:'Dirección',
															value:'<?php echo $direccion;?>',
					                                        labelWidth: 100,
						                                    labelAlign:'right',//,
					                                        listeners:{
				                                                keypress:function(obj,e){
			                                                        if(e.keyCode==13){

			                                                        }
				                                                }
					                                        }
						                                },
						                                {
					                                        xtype:'textfield',
					                                        padding:'15px 15px 5px 5px',
					                                        columnWidth:1,
					                                        id:reorder.id+'_txt_empresa_telf',
					                                        //autoCreate: {tag: 'input', type: 'text', size: '82', autocomplete: 'off', maxlength: '1000'},
					                                        fieldLabel:'Telefono/Otros',
															value:'<?php echo $telefono;?>',
					                                        labelWidth: 100,
						                                    labelAlign:'right',//,
					                                        listeners:{
				                                                keypress:function(obj,e){
			                                                        if(e.keyCode==13){

			                                                        }
				                                                }
					                                        }
						                                },
						                                {
					                                        xtype:'textfield',
					                                        padding:'15px 15px 5px 5px',
					                                        columnWidth:1,
					                                        id:reorder.id+'_txt_empresa_ruc',
					                                        //autoCreate: {tag: 'input', type: 'text', size: '82', autocomplete: 'off', maxlength: '1000'},
					                                        fieldLabel:'Ruc',
															value:'<?php echo $ruc;?>',
					                                        labelWidth: 100,
						                                    labelAlign:'right',//,
					                                        listeners:{
				                                                keypress:function(obj,e){
			                                                        if(e.keyCode==13){

			                                                        }
				                                                }
					                                        }
						                                },
						                                {
					                                        xtype:'textfield',
					                                        padding:'15px 15px 5px 5px',
					                                        columnWidth:1,
					                                        id:reorder.id+'_txt_empresa_horario',
					                                        //autoCreate: {tag: 'input', type: 'text', size: '82', autocomplete: 'off', maxlength: '1000'},
					                                        fieldLabel:'Horario Atención',
															value:'<?php echo $horario;?>',
					                                        labelWidth: 100,
						                                    labelAlign:'right',//,
					                                        listeners:{
				                                                keypress:function(obj,e){
			                                                        if(e.keyCode==13){

			                                                        }
				                                                }
					                                        }
						                                },
						                                {
							                                xtype:'panel',
							                                layout:'column',
							                                padding:'5px 15px 5px 5px',
							                                border:false,
							                                columnWidth:1,
							                                //width:525,
							                                items:[
							                                	{
							                                        xtype:'textfield',
							                                        columnWidth:0.5,
							                                        id:reorder.id+'_txt_empresa_web',
							                                        //autoCreate: {tag: 'input', type: 'text', size: '82', autocomplete: 'off', maxlength: '1000'},
							                                        fieldLabel:'Web',
																	value:'<?php echo $web;?>',
							                                        labelWidth: 100,
						                                            labelAlign:'right',//,
							                                        listeners:{
						                                                keypress:function(obj,e){
					                                                        if(e.keyCode==13){

					                                                        }
						                                                }
							                                        }
								                                },
								                                {
							                                        xtype:'textfield',
							                                        columnWidth:0.5,
							                                        id:reorder.id+'_txt_empresa_correo',
							                                        //autoCreate: {tag: 'input', type: 'text', size: '82', autocomplete: 'off', maxlength: '1000'},
							                                        fieldLabel:'Correo',
																	value:'<?php echo $email;?>',
							                                        labelWidth: 55,
						                                            labelAlign:'right',//,
							                                        listeners:{
						                                                keypress:function(obj,e){
					                                                        if(e.keyCode==13){

					                                                        }
						                                                }
							                                        }
								                                }
							                                ]
							                            },
							                            {
			                                                xtype:'panel',
							                                layout:'column',
							                                padding:'5px 15px 5px 5px',
							                                border:false,
							                                columnWidth:1,
			                                                items:[
		                                                        {
		                                                            xtype:'panel',
		                                                            columnWidth:0.7,
		                                                            padding:'5px 15px 5px 104px',
		                                                            border:true,
		                                                            //width:110,
		                                                            height:100,
																	html:'<div id="img_empre" style="width:105;heigth:70;"><img src="galeria/empresa/<?php echo $img;?>" id="img_empresa" name="img_empresa" width="105" height="70"/></div>'
		                                                        },
		                                                        {
		                                                            xtype: 'button',
		                                                            width:140,
		                                                            text: 'Cargar Imagen',
		                                                            icon: '/images/icon/add.png',
																	iconCls:'imagen',
																	//handler:reorder.imagen_empresa
		                                                        }
			                                               	]
			                                            }
						                            ]
						                        }
                                            ],
                                            listeners:{
                                                afterrender: function(obj){
                                                    // win.show({vurl: '/inicio/index/demo_maps/'});
                                                }
                                            }
                                        },
                                        {
                                            title: 'Intereses por Mora',
                                            icon: '/images/icon/global_nov_.png',
                                            closable: false,
                                            padding:'15px 15px 15px 15px',
                                            //layout: 'fit',
                                            items:[
                                                {
					                                xtype:'fieldset',
					                                padding:'15px 15px 15px 15px',
					                                title:'Mora',
					                                border:true,
					                                layout:'column',
					                                /*layoutConfig:{
					                                	columns:2
					                                },*/
					                                //width:615,
					                                items:[
					                                	{
															xtype:'checkboxfield',
															padding:'15px 15px 5px 5px',
															labelWidth: 150,
					                                        columnWidth:1,
															fieldLabel:'¿Aplica Interes por Mora?',
															id:reorder.id+'check_interes',
															name:'estado',
															colspan:2,
															checked:'<?php echo $flag; ?>',
															listeners:{
																check:function(obj, est){
																	if(est){
																		Ext.getCmp(reorder.id+'spiner_tasa').setDisabled(false);
																		Ext.getCmp(reorder.id+'spiner_mora').setDisabled(false);
																	}else{
																		Ext.getCmp(reorder.id+'spiner_tasa').setDisabled(true);
																		Ext.getCmp(reorder.id+'spiner_mora').setDisabled(true);
																	}
																}
															}
														},
					                                    {
					                                        xtype: 'numberfield',
					                                        fieldLabel:'Taza por Mora %',
					                                        labelWidth: 150,
					                                        columnWidth:1,
					                                        //fieldLabel: 'Test',
															id:reorder.id+'spiner_tasa',
															padding:'5px 15px 5px 5px',
															//disabled:'<?php echo $flag2;?>',
					                                        //name: 'test',
					                                        minValue: 0,
					                                        maxValue: 100,
					                                        //allowDecimals: true,
					                                        //decimalPrecision: 2,
					                                        //incrementValue: 1,
					                                        value:'<?php echo $tasa;?>',
					                                        //alternateIncrementValue: 2.10,
					                                        //accelerate: true
					                                    },
					                                     {
					                                        xtype: 'numberfield',
					                                        fieldLabel:'Cobrar Mora a partir de',
					                                        labelWidth: 150,
					                                        columnWidth:1,
					                                        id:reorder.id+'spiner_mora',
					                                        padding:'5px 15px 5px 5px',
															//disabled:'<?php echo $flag2;?>',
					                                        minValue: 0,
					                                        maxValue: 100,
					                                        //allowDecimals: false,
					                                        //decimalPrecision: 1,
					                                        //incrementValue: 1,
					                                        value:'<?php echo $tiempo_mora;?>',
					                                        //alternateIncrementValue: 99,
					                                        //accelerate: true
					                                    },
					                                    {
					                                        xtype: 'numberfield',
					                                        fieldLabel:'Las cuotas vencen despues de :',
					                                        labelWidth: 150,
					                                        columnWidth:1,
					                                       	id:reorder.id+'spiner_vencimiento',
					                                       	padding:'5px 15px 5px 5px',
															//disabled:'<?php echo $flag2;?>',
					                                        minValue: 0,
        													//maxValue: 50
					                                        //allowDecimals: false,
					                                        //decimalPrecision: 1,
					                                        //incrementValue: 1,
					                                        value:'<?php echo $vencimiento;?>',
					                                        //alternateIncrementValue: 99,
					                                        //accelerate: true
					                                    },
					                                    {
					                                        xtype:'panel',
					                                        columnWidth:1,
					                                        padding:'15px 15px 5px 5px',
					                                        border:false,
					                                        //width:320,
					                                        html:'Las moras % se aplicarán a partir de los días que especifiques y se multiplicarán por la cantidad de días vencidos.<br>El vencimiento de las cuotas se aplicarán a partir de los dias que especiciques.'
					                                     }
					                                ]
					                            }
                                            ],
                                            listeners:{
                                                afterrender: function(obj){
                                                    // win.show({vurl: '/inicio/index/demo_maps/'});
                                                }
                                            }
                                        },
                                        {
                                            title: 'Días no Hábiles',
                                            icon: '/images/icon/Calendar.png',
                                            closable: false,
                                            layout: 'fit',
                                            items:[
                                                {
							                        xtype: 'grid',
							                        id: reorder.id + '_grid_personal',
							                        //disabled:true,
							                        store: store,
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
							                                    text: 'Fecha',
							                                    dataIndex: 'file',
							                                    //loocked : true,
							                                    width: 80,
							                                    align: 'center',
							                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
							                                        //console.log(record);
							                                        metaData.style = "padding: 0px; margin: 0px";
							                                        return '<div class="gk-column-icon"><img src="/tumblr/' + record.get('file') + '" class="link" data-qtip="Vista Previa" onclick=""/></div>';
							                                    }
							                                },
							                                {
							                                    text: 'Descripción',
							                                    dataIndex: 'file',
							                                    flex: 1
							                                },
							                                {
							                                    text: 'DLT',
							                                    dataIndex: 'estado',
							                                    //loocked : true,
							                                    width: 40,
							                                    align: 'center',
							                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
							                                        //console.log(record);
							                                        metaData.style = "padding: 0px; margin: 0px";
							                                        return global.permisos({
							                                            type: 'link',
							                                            id_menu: scanning.id_menu,
							                                            icons:[
							                                                {id_serv: 3, img: 'recicle_nov.ico', qtip: 'Click para Desactivar Lote.', js: "scanning.setRemoveFile("+rowIndex+",false)"}

							                                            ]
							                                        });
							                                    }
							                                }
							                            ],
							                            defaults:{
							                                menuDisabled: true
							                            }
							                        },
							                        trackMouseOver: false,
							                        listeners:{
							                            afterrender: function(obj){
							                            },
							                            beforeselect:function(obj, record, index, eOpts ){
							                            }
							                        }
							                    }
                                            ],
                                            listeners:{
                                                afterrender: function(obj){
                                                    // win.show({vurl: '/inicio/index/demo_maps/'});
                                                }
                                            }
                                        }
                                    ]
                                }
							]
						}
					]
				});

				
				var win = Ext.create('Ext.window.Window',{
					id:reorder.id+'-win',
					title:'TRASCENDER',
					height:530,
					width:500,
					resizable:false,
					//closable:false,
					//minimizable:true,
					plaint:true,
					constrain:true,
					constrainHeader:true,
					//renderTo:Ext.get(gtransporte.id+'cont_map'),
					header:true,
					border:false,
					layout:{
						type:'fit'
					},
					modal:true,
					items:[panel],
					bbar:[
						{
			                xtype:'button',
			                flex:1,
			                text: 'Grabar Orden',
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
			                    	reorder.setReorder();
			                    	//scanning.setLibera();
							        //scanning.getReloadGridscanning();
			                    }
			                }
			            },
			            {
			                xtype:'button',
			                flex:1,
			                text: 'Salir',
			                icon: '/images/icon/person.png',
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
			                    	Ext.getCmp(reorder.id+'-win').close();
			                    }
			                }
			            }
					],
					listeners:{
						show:function(window,eOpts){
							//window.alignTo(Ext.get(gtransporte.id+'Mapsa'),'bl-bl');
						},
						minimize:function(window,opts){
							/*window.collapse();
							window.setWidth(100);
							window.alignTo(Ext.get(gtransporte.id+'Mapsa'), 'bl-bl');*/
						},
						beforerender:function(obj,opts){
							//reorder.getReloadGridreorder();
						}
					}
				}).show();
			},
			getReloadGridreorder:function(){
				if(reorder.shi_codigo== null || reorder.shi_codigo==''){
		            global.Msg({msg:"Seleccione un Cliente por favor.",icon:2,fn:function(){}});
		            return false;
		        }
				if(reorder.fac_cliente== null || reorder.fac_cliente==''){
		            global.Msg({msg:"Seleccione un Contrato por favor.",icon:2,fn:function(){}});
		            return false;
		        }
		        //Ext.getCmp(reorder.id + '-grid-reorder').getStore().removeAll();
		        //Ext.getCmp(reorder.id + '-grid-reorder').getView().refresh();
		        reorder.paramsStore={vp_shi_codigo:reorder.shi_codigo,vp_fac_cliente:reorder.fac_cliente,vp_lote:reorder.id_lote,vp_lote_estado:'',vp_estado:''};
		        Ext.getCmp(reorder.id + '-grid-reorder').getStore().load(
	                {params: reorder.paramsStore,
	                callback:function(){
	                	//Ext.getCmp(reorder.id+'-form').el.unmask();
	                }
	            });
			},
			setReorder:function(){
				global.Msg({
                    msg: '¿Está seguro de actualizar los registros?',
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(reorder.id+'-win').el.mask('Actualizando Registros', 'x-mask-loading');

							var recordsToSend = [];
							Ext.getCmp(reorder.id + '-grid-reorder').getStore().each(function(record, idx) {
								//console.log(record.data);
								//console.log('padre',record.parentNode.data);
								var hijo= record.get('hijo');
								var padre= record.get('padre');
								//var nombre= record.get('nombre');
								var hijo= record.get('hijo');

								var nivel= record.get('nivel');
								if(nivel!=3){
									var nombre= record.get('nombre');
								}else{
									var nombre= record.get('img');
								}
								recordsToSend.push(Ext.apply({vp_id_lote:reorder.id_lote,vp_hijo:hijo,vp_padre:padre,vp_nivel:nivel,vp_nombre:nombre,vp_order:0},hijo));
							});

							var vp_recordsToSend = Ext.encode(recordsToSend);
							//console.log(recordsToSend);

					    	Ext.Ajax.request({
			                    url: reorder.url + 'set_reorder/',
			                    params:{
			                    	vp_id_lote:reorder.id_lote,
			                    	vp_recordsToSend:vp_recordsToSend
			                    },
			                    timeout: 300000,
			                    success: function(response, options){
			                    	Ext.getCmp(reorder.id+'-win').el.unmask();
			                    	//control.getLoader(false);
			                        var res = Ext.JSON.decode(response.responseText);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	reorder.getReloadGridreorder();
			                                	eval(reorder.callback);
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
			setChangeRecord:function(op){
				var nombre = Ext.getCmp(reorder.id+'-txt-scanning').getValue();
				if(nombre== null || nombre==''){
		            global.Msg({msg:"Ingrese un Nombre.",icon:2,fn:function(){}});
		            return false;
		        }
		        if(reorder.paramsStore.hijo== 0 || reorder.paramsStore.hijo==''){
		            global.Msg({msg:"Seleccione un registro.",icon:2,fn:function(){}});
		            return false;
		        }
		        if(reorder.paramsStore.padre== 0 || reorder.paramsStore.padre==''){
		            global.Msg({msg:"Seleccione un registro.",icon:2,fn:function(){}});
		            return false;
		        }
		        if(reorder.paramsStore.nivel== 0 || reorder.paramsStore.nivel==''){
		            global.Msg({msg:"Seleccione un registro.",icon:2,fn:function(){}});
		            return false;
		        }

				global.Msg({
                    msg: '¿Está seguro de actualizar el registro?',
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(reorder.id+'-win').el.mask('Actualizando Registro', 'x-mask-loading');

					    	Ext.Ajax.request({
			                    url: reorder.url + 'setChangeRecord/',
			                    params:{
			                    	vp_op:op,
			                    	vp_id_lote:reorder.id_lote,
			                    	vp_nombre:nombre,
			                    	vp_hijo:reorder.paramsStore.hijo,
			                    	vp_padre:reorder.paramsStore.padre,
			                    	vp_nivel:reorder.paramsStore.nivel
			                    },
			                    timeout: 300000,
			                    success: function(response, options){
			                    	Ext.getCmp(reorder.id+'-win').el.unmask();
			                    	//control.getLoader(false);
			                        var res = Ext.JSON.decode(response.responseText);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	reorder.getReloadGridreorder();
			                                	eval(reorder.callback);
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
			}
		}
		Ext.onReady(reorder.init,reorder);
	}else{
		tab.setActiveTab(reorder.id+'-tab');
	}
</script>