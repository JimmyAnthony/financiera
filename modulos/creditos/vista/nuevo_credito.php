<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style type="text/css">

        </style>
    </head>
    <body>
        <script type="text/javascript">
            Ext.ns("xim.estadistica.credito_nuevo");
            xim.estadistica.credito_nuevo = {
                div : 'Div_ESTADISTICA_CREDITO_NUEVO',
                url:'modulos/creditos/capas/control.php',
                id:'xim',
                //chooser:{},
                ximModo:0,
                btn:'',
                init: function(){
                    //Ext.tip.QuickTips.init();  // enable tooltips
                    //creamos un formulario
                    var clock = new Ext.Toolbar.TextItem('');
                    var chk_model = new Ext.grid.CheckboxSelectionModel({
                        singleSelect:false,
                        checkOnly:false,
                        injectCheckbox :false
                    });
                    var store = new Ext.data.JsonStore({
                        url:this.url,
                        autoLoad:true,
                        baseParams:{op:'get_clientes'},
                        root:'data',
                        fields:['cod_cli','nombres','limite_credito']
                    });
					 var stores = new Ext.data.JsonStore({
                        url:this.url,
                        autoLoad:<?php echo $load;?>,
                        baseParams:{<?php echo $proc;?>},
                        root:'data',
                        fields:['fecha_cuota','fecha_cuota_tiempo','cuota_total','cuota_total_t','interes_periodico','amortizacion','capital_vivo','mora','cuota_total','fecha_vence','flag','estado','estado_muestra','nro_cuota','cod_credito','cod_det_credito','cod_tipo','saldo_cuota']
                    });
					/****TAB***/
                    this.tabs = new Ext.TabPanel({
                        id:'tab_panel_empresa',
                        border: false,
                        //tbar:[{iconCls:'save-icons'}],
                        activeTab: 0,
                        activeItem:0,
                        region:'center',
                        resizeTabs:true,
                        minTabWidth: 70,
                        height:390,
                        enableTabScroll:true,
                        items:[]
                    });
                    /**FIN TAB**/
                    this.form = new Ext.form.FormPanel({
                        standardSubmit: true, // traditional submit
                        //url: 'submitform.php',
                        region		: "center",
                        layout:'border',
                        //layout:'fit',
                        margins		: "3 3 3 3",
                        //width		: 750,
                        anchor:'99%',
                        //store		: this.store,
                        bodyStyle	: "padding: 2px;",
                        //url			: "recursos_humanos/rrhh_valores/capas/control.php",
                        border		: false,
                        defaults	: {allowBlank: false},
                        items		: [
                           
                        ]
                    });
                    var ventana = Ext.getCmp(this.div);
                    ventana.add({
                        //title	: "LISTADO DE VALORES",
                        layout	: "border",
						id:xim.estadistica.credito_nuevo+'_ventana_credito',
                        /*margins: "0 0 0 0",
                        /*width	: 600,
                         height	: 400,*/
                        items	: [
                        {
                        xtype:'panel',
                        region:'center',
                        items:[
                        {
                            xtype:'panel',
                            //title:'Buscar Por',
                            border:false,
                            bodyStyle	: "padding: 5px;",
                            layout:'table',
                            layoutConfig:{
                            columns:11
                            },
                            items:[
                                {
                                    xtype:'label',
                                    text:'Codigo:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:40
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.credito_nuevo.id+'_txt_codigo',
                                        autoCreate: {tag: 'input', type: 'text', size: '15', autocomplete: 'off', maxlength: '1000'},
										disabled:true,
                                        value:'<?php echo $cod_credito;?>',
                                        anchor:'99%',
                                        enableKeyEvents:true,
                                        selectOnFocus:true,
                                        //allowBlank:false,
                                        listeners:{
                                                keypress:function(obj,e){
                                                        if(e.keyCode==13){

                                                        }
                                                }
                                        }
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:16
                                },
								{
                                    xtype:'label',
                                    text:'Limite Credito:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:10
                                },
								{
                                        xtype:'textfield',										
                                        id:xim.estadistica.credito_nuevo.id+'_txt_limite_cred',
                                        autoCreate: {tag: 'input', type: 'text', size: '15', autocomplete: 'off', maxlength: '1000'},
                                        value:'<?php echo $limite_credito;?>',
										readOnly:true,
                                        anchor:'99%',
                                        enableKeyEvents:true,
                                        selectOnFocus:true,
                                        //allowBlank:false,
                                        listeners:{
                                                keypress:function(obj,e){
                                                        if(e.keyCode==13){

                                                        }
                                                }
                                        }
                                },
                                {
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:200
                                },
                                {
                                    xtype:'label',
                                    text:'Fecha:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:12
                                },
                               {
							   xtype:'datefield',
							   id:xim.estadistica.credito_nuevo.id+'_fecha_cred',
							   format:'d/m/Y',
							   value:'<?php if(!empty($fecha)){echo $fecha;}else{echo date('d/m/Y');}?>'
							   }
                            ]
                           },//panel
                           {
                            xtype:'panel',
                            //title:'Buscar Por',
                            border:false,
                            bodyStyle	: "padding: 5px;",
                            layout:'table',                            
                            layoutConfig:{
                            columns:9
                            },
                            items:[
                                {
                                    xtype:'label',
                                    text:'Cliente:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:40
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.credito_nuevo.id+'_txt_cod_cli',
                                        autoCreate: {tag: 'input', type: 'text', size: '15', autocomplete: 'off', maxlength: '1000'},
                                        value:'<?php echo $cod_cli;?>',
										readOnly:true,
                                        anchor:'99%',
                                        enableKeyEvents:true,
                                        selectOnFocus:true,
                                        //allowBlank:false,
                                        listeners:{
                                                keypress:function(obj,e){
                                                        if(e.keyCode==13){

                                                        }
                                                }
                                        }
                                },								
                                {
                                xtype:'panel',
                                colspan:2,
                                border:false,
                                width:5
                                },
                                {
                                    xtype: 'tbbutton',									
									iconCls:'buscar',
									disabled:<?php echo $load;?>,
									listeners:{
										click:function(obj, e){
												var chk_model = new Ext.grid.CheckboxSelectionModel({
													singleSelect:false,
													checkOnly:false,
													injectCheckbox :false
												});
											    var win = new Ext.Window({  
													title: 'Listado de Clientes',
													id:'win_clientes',
													width: 300,
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
                                                                width:272,
                                                                listeners:{
                                                                    keypress:function(obj,e){
                                                                        if (e.keyCode == e.ENTER) {
                                                                            Ext.getCmp( xim.estadistica.clientes.id+'_cmb_documento').setValue('');
                                                                            var sub = Ext.getCmp('filter-galeries').getValue();
                                                                            Ext.getCmp(xim.estadistica.clientes+'_grid_TRAVEL_VUELOS').getStore().reload({
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
														}]},
														{
														xtype:'grid',
														store:store,
														//layout:'fit',				
														id:xim.estadistica.credito_nuevo.id+'_grid_clientes',
														height:284,
														columns:[
															new Ext.grid.RowNumberer(),
															{header:'Codigo',dataIndex:'cod_cli',width:50},
															{header:'Nombres',dataIndex:'nombres',width:170},
															chk_model],
														bbar: new Ext.PagingToolbar({
															id:'_pager_clientes',
															store:store,
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
																xim.estadistica.credito_nuevo.select_cli();															
															}
														}
																	}//fin grid
													
													],buttons:[
													{
														text : "Aceptar",
														iconCls:'aceptar',
														scope : this,
														handler:xim.estadistica.credito_nuevo.select_cli
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
										}
									}
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:5
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.credito_nuevo.id+'_txt_nombres',
                                        autoCreate: {tag: 'input', type: 'text', size: '101', autocomplete: 'off', maxlength: '1000'},
                                        value:'<?php echo $nombres;?>',
										readOnly:true,
                                        anchor:'99%',
                                        enableKeyEvents:true,
                                        selectOnFocus:true,
                                        //allowBlank:false,
                                        listeners:{
                                                keypress:function(obj,e){
                                                        if(e.keyCode==13){

                                                        }
                                                }
                                        }
                                }
                            ]
                           },// panel
                           {
                            xtype:'panel',
                            //title:'Buscar Por',
                            border:false,
                            bodyStyle	: "padding: 5px;",
                            layout:'table',
                            layoutConfig:{
                            columns:9
                            },
                            items:[
                                {
                                    xtype:'label',
                                    text:'Tasa de Interés:'
                                },
                                 {
									xtype: 'spinnerfield',
									id:xim.estadistica.credito_nuevo.id+'_txt_tasa_int',
									width:100,
									name: 'test',
									minValue: 0,
									maxValue: 100,
									allowDecimals: true,
									decimalPrecision: 2,
									incrementValue: 1,
									value:<?php if(!empty($tasa_interes)){echo $tasa_interes;}else{echo 0;}?>,
									alternateIncrementValue: 3.10,
									accelerate: true,
									enableKeyEvents:true,
									listeners:{
											keypress:function(obj,e){
													setTimeout('xim.estadistica.credito_nuevo.generar_calculo()',100);
											},
											'spin':{//spinUp-spinDown
												fn:function(){
													setTimeout('xim.estadistica.credito_nuevo.generar_calculo()',100);
												}											
											}
									}
								},
                                {
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:245
                                },
                                {
                                    xtype:'label',
                                    text:'Metodo:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:12
                                },
                                {
								xtype:'combo',
								//fieldLabel:'',
								id:xim.estadistica.credito_nuevo.id+'_cmb_metodo',
								width:268,
								forceSelection:true,
								emptyText:'Seleccione Metodo de Calculo...',
								store: new Ext.data.JsonStore({
									url:this.url,
									root:'data',
									autoLoad:true,
									totalProperty:'total',
									baseParams:{op:'get_combo_metodos'},
									fields:['cod_metodo','nombre']
								}),
								mode:'local',
								triggerAction:'all',
								lazyRender:true,
								editable:true,
								displayField:'nombre',
								valueField:'cod_metodo',
								anchor:'99%',
								listeners:{
									'render':function(obj){
										obj.getStore().load({
											callback:function(){
												obj.setValue('<?php echo $cod_metodo;?>');		
											}
										});								
									},
									'select':function(cmb,rec,index){
										xim.estadistica.credito_nuevo.generar_calculo();
									}
								}//fin lis
							}
                            ]
                           },// panel
                           {
                            xtype:'panel',
                            //title:'Buscar Por',
                            border:false,
                            bodyStyle	: "padding: 5px;",
                            layout:'table',
                            layoutConfig:{
                            columns:20
                            },
                            items:[
                                {
                                    xtype:'label',
                                    text:'Prestamo:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:29
                                },
                                 {
									xtype: 'spinnerfield',
									id:xim.estadistica.credito_nuevo.id+'_txt_prestamos_monto',
									width:100,
									name: 'test',
									minValue: 1,
									maxValue: 99999999999999,
									allowDecimals: true,
									//decimalPrecision: 2,
									incrementValue: 1,
									value:'<?php if(!empty($prestamo)){echo $prestamo;}else{echo 1;}?>',
									//alternateIncrementValue: 3.10,
									accelerate: true,
									enableKeyEvents:true,
									listeners:{
											keypress:function(obj,e){
													setTimeout('xim.estadistica.credito_nuevo.generar_calculo()',100);
											},
											'spin':{//spinUp-spinDown
												fn:function(){
													setTimeout('xim.estadistica.credito_nuevo.generar_calculo()',100);
												}											
											}
									}
								},
                                {
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:13
                                },
                                {
                                    xtype:'label',
                                    text:'Cuotas #:'
                                },
                                {
									xtype: 'spinnerfield',
									id:xim.estadistica.credito_nuevo.id+'_txt_cuotas_num',
									width:80,
									name: 'test',
									minValue: 1,
									allowDecimals: false,
									decimalPrecision: 0,
									incrementValue: 1,
									value:<?php if(!empty($cuotas)){echo $cuotas;}else{echo 1;}?>,
									alternateIncrementValue: 1,
									accelerate: true,
									enableKeyEvents:true,
									//enableKeyEvents:true,
									listeners:{
											keypress:function(obj,e){
													setTimeout('xim.estadistica.credito_nuevo.generar_calculo()',100);
											},
											'change':function(obj,e){
													setTimeout('xim.estadistica.credito_nuevo.generar_calculo()',100);
											},
											'spin':{//spinUp-spinDown
												fn:function(){
													setTimeout('xim.estadistica.credito_nuevo.generar_calculo()',100);
												}											
											}
									}
								},
                                {
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:80
                                },
                                {
                                    xtype:'label',
                                    text:'Tipo Credito:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:12
                                },
                                {
								xtype:'combo',
								//fieldLabel:'Aerolineas',
								id:xim.estadistica.credito_nuevo.id+'_cmb_tipo_credito',
								width:268,
								forceSelection:true,
								emptyText:'Seleccione Tipo de Credito...',
								store: new Ext.data.JsonStore({
									url:this.url,
									root:'data',
									autoLoad:true,
									totalProperty:'total',
									baseParams:{op:'get_combo_tipo_credito'},
									fields:['cod_tipo','nombre']
								}),
								mode:'local',
								triggerAction:'all',
								lazyRender:true,
								editable:true,
								displayField:'nombre',
								valueField:'cod_tipo',
								anchor:'99%',
								listeners:{
									'render':function(obj){
										obj.getStore().load({
											callback:function(){
												obj.setValue('<?php echo $cod_tipo;?>');		
											}
										});								
									},
									'select':function(cmb,rec,index){
										xim.estadistica.credito_nuevo.generar_calculo();
									}
								}//fin lis
							}
                            ]
                           },//panel
                           {
                            xtype:'panel',
                            //title:'Buscar Por',
                            border:false,
                            bodyStyle	: "padding: 5px;",
                            layout:'table',
                            layoutConfig:{
                            columns:11
                            },
                            items:[
                                {
                                    xtype:'label',
                                    text:'Valor Cuotas:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:12
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.credito_nuevo.id+'_txt_valor_cuotas',
                                        autoCreate: {tag: 'input', type: 'text', size: '14', autocomplete: 'off', maxlength: '1000'},
                                        value:'<?php echo $valor_cuota;?>',
										readOnly:true,
                                        anchor:'99%',
                                        enableKeyEvents:true,
                                        selectOnFocus:true,
                                        //allowBlank:false,
                                        listeners:{
                                                keypress:function(obj,e){
                                                        if(e.keyCode==13){

                                                        }
                                                }
                                        }
                                },
                                {
                                xtype:'panel',
                                colspan:2,
                                border:false,
                                width:15
                                },
                                {
                                    xtype:'label',
                                    text:'Fecha de Cálculo:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:3
                                },
								{
							   xtype:'datefield',
							   id:xim.estadistica.credito_nuevo.id+'_fecha_calculo',
							   format:'d/m/Y',
							   value:'<?php if(!empty($fecha_calculo)){echo $fecha_calculo;}else{echo date('d/m/Y');}?>'
							   },
							   {
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:50
                                },
                                {
                                    xtype: 'tbbutton',	
									text:'Previsualisar Cuotas',								
									iconCls:'Preferences',
									listeners:{
										click:function(obj, e){
											xim.estadistica.credito_nuevo.generar_cuotas();
										}		
									}
                                }
                            ]
                           },//panel
                           {
                            xtype:'panel',
                            //title:'Buscar Por',
                            border:true,
							height:173,							
                            bodyStyle	: "padding: 5px;margin:5px;",
                            layout:'fit',
                            items:[
								{
									xtype:'grid',
									store:stores,
									layout:'fit',

									id:xim.estadistica.credito_nuevo.id+'_grid_credito_nuevo',
									columns:[
										new Ext.grid.RowNumberer(),
										{header:'Fecha',dataIndex:'fecha_cuota',width:80},
										{header:'Valor Cuota',dataIndex:'cuota_total',width:70},
										{header:'Interés',dataIndex:'interes_periodico',width:60},
										{header:'Amortización',dataIndex:'amortizacion',width:80},
										{header:'Capital Vivo',dataIndex:'capital_vivo',width:80},
										{header:'Mora',dataIndex:'mora',width:60},
										{header:'Total Cuota',dataIndex:'saldo_cuota',width:80},
										{header:'Vence',dataIndex:'fecha_vence',width:80},
										{header:'Estado',dataIndex:'estado_muestra',width:80},
										chk_model],
									bbar: new Ext.PagingToolbar({
										id:xim.estadistica.credito_nuevo.id+'_pager_nuevo_credito',
										store:stores,
										displayInfo:true,
										displayMsg:'{0} - {1} de {2} Cuotas.',
										emptyMsg:'Sin Cuotas',
										pageSize:80,
										items: ['',clock]
									}),
									sm:chk_model,
									stripeRows:true,
									anchor:'99%',
									loadMask:true,
									listeners:{
										'render':function(obj){
											obj.getStore().load({
												callback:function(){
													var total_credito=0;
													Ext.getCmp(xim.estadistica.credito_nuevo.id+'_grid_credito_nuevo').getStore().each(function(record){
														total_credito += record.get('saldo_cuota');
													});
													Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_total_cred').setValue(xim.estadistica.credito_nuevo.redondear(total_credito));
												}
											});		
											
										}
									}
									/*,
									sm: new Ext.grid.RowSelectionModel({
										singleSelect:true,
										listeners:{
											rowselect:function(sm,row,rec){
			
											}
										}
									})*/
								}//fin grid
							  ]
							},//panel
							{
                            xtype:'panel',
                            //title:'Buscar Por',
                            border:false,
                            bodyStyle	: "padding: 5px;",
                            layout:'table',
                            layoutConfig:{
                            columns:8
                            },
                            items:[
                                {
                                    xtype:'label',
                                    text:'Entrega en:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:10
                                },
                                {
								xtype:'combo',
								//fieldLabel:'Aerolineas',
								id:xim.estadistica.credito_nuevo.id+'_cmb_entrega',
								width:268,
								forceSelection:true,
								emptyText:'Seleccione modo de entrega...',
								store: new Ext.data.JsonStore({
									url:this.url,
									root:'data',
									autoLoad:true,
									totalProperty:'total',
									baseParams:{op:'get_combo_entrega'},
									fields:['nombre','cod_entrega']
								}),
								mode:'local',
								triggerAction:'all',
								lazyRender:true,
								editable:true,
								displayField:'nombre',
								valueField:'cod_entrega',
								anchor:'99%',
								listeners:{
									'render':function(obj){
										obj.getStore().load({
											callback:function(){
												obj.setValue('<?php echo $cod_entrega;?>');		
											}
										});		
									},
									'select':function(cmb,rec,index){

									}
								}//fin lis
							},
                                {
                                xtype:'panel',
                                colspan:2,
                                border:false,
                                width:70
                                },
                                {
                                    xtype:'label',
                                    text:'Total Crédito:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:12
                                },
                               {
                                        xtype:'textfield',
                                        id:xim.estadistica.credito_nuevo.id+'_txt_total_cred',
                                        autoCreate: {tag: 'input', type: 'text', size: '15', autocomplete: 'off', maxlength: '1000'},
										readOnly:true,
                                        value:'<?php echo $total_credito;?>',
                                        anchor:'99%',
                                        enableKeyEvents:true,
                                        selectOnFocus:true,
                                        //allowBlank:false,
                                        listeners:{
                                                keypress:function(obj,e){
                                                        if(e.keyCode==13){

                                                        }
                                                }
                                        }
                                }
                            ]
                           },//panel
							{
                            xtype:'panel',
                            //title:'Buscar Por',
                            border:false,
                            bodyStyle	: "padding: 5px;",
                            layout:'table',
                            layoutConfig:{
                            columns:8
                            },
                            items:[
                                {
                                    xtype:'label',
                                    text:'Nota:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:40
                                },
                                {
									xtype: 'textarea',
									fieldLabel: 'Ingrese una descripcion',
									id:xim.estadistica.credito_nuevo.id+'_txt_obs',
									width:680,
									height:42,
									value:'<?php echo $nota;?>',
									hideLabel: true,
									name: 'msg',
									flex: 1
								}
                            ]
                           }//panel
                        ]}//fin panel
                        ],
                        listeners:{
                            'render':function(obj){
                                ximx.closep();
                            }
                        }
                        ,buttons:[
							{
                                text : "Imprimir",
                                iconCls:'imprimir',
                                scope : this,
                                handler:this.imprimir_credito
                            },
							{
                                text : "Renovar Cuota",
                                iconCls:'calendario',
                                scope : this,
								listeners:{
									click:function(){
										xim.estadistica.credito_nuevo.adelantar_cuotas();
									}
								}
                            },
                            {
                                text : "Grabar",
                                iconCls:'guardar',
								hidden:<?php echo $load;?>,
                                scope : this,
								listeners:{
									click:function(){
										xim.estadistica.credito_nuevo.grabar_update_nuevo_recibo(1);
									}
								}
                            },
                            {
                                text : "Actualizar",
                                iconCls:'actualizar',
								hidden:<?php echo $hidden;?>,
                                scope : this,
                               listeners:{
									click:function(){
										xim.estadistica.credito_nuevo.grabar_update_nuevo_recibo(2);
									}
								}
                            },
                            {
                                text : "Salir",
                                scope : this,
                                handler:this.clos,
                                iconCls:'salir'
                            }
                        ]//botones del formulario
                    });
                    ventana.doLayout();
                    //this.tree.getRootNode().expand();
                },
                clos:function(){
                    ximx.close('ESTADISTICA_CREDITO_NUEVO');
                },
				select_cli:function(){
					var rec = Ext.getCmp(xim.estadistica.credito_nuevo.id+'_grid_clientes').getSelectionModel().getSelected();
					if(rec==undefined){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Seleccione un cliente por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_cod_cli').setValue(rec.get('cod_cli'));
					Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_nombres').setValue(rec.get('nombres'));
					Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_limite_cred').setValue(rec.get('limite_credito'));
					Ext.getCmp('win_clientes').close();
				},
				generar_calculo:function(){					
					var tasa = Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_tasa_int').getValue();
					var metodo =Ext.getCmp(xim.estadistica.credito_nuevo.id+'_cmb_metodo').getValue();
					var prestamo =Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_prestamos_monto').getValue();
					var cuotas =Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_cuotas_num').getValue();
					var tipo_credito =Ext.getCmp(xim.estadistica.credito_nuevo.id+'_cmb_tipo_credito').getValue();
					if(metodo=='')return;
					var resp = 0;
					switch(parseInt(metodo)){
						case 1://simple
							//resp = prestamo * (((Math((1+(tasa/100))^cuotas))*(tasa/100))/(((1+(tasa/100))^cuotas)-1));
							var valor = (1+(tasa/100));
							ext = Math.pow(valor,cuotas);
							resp = prestamo * ((ext*(tasa/100))/(ext-1));
							resp = Math.round(resp*100)/100;
						break;
						case 2://frances
						    var i =  (tasa/100);
							var forma = (1+i);
							ext = Math.pow(forma,cuotas);
							if(i>0){
								cuota_total = parseFloat(prestamo * ((ext*i)/(ext-1)));
								resp = xim.estadistica.credito_nuevo.redondear(cuota_total);//redondeo
							}else{
								cuota_total = parseFloat(prestamo/cuotas);
								resp = xim.estadistica.credito_nuevo.redondear(cuota_total);//redondeo
							}
							
							var amortizacion = cuota_total - (prestamo*i);
							amortizacion = xim.estadistica.credito_nuevo.redondear(amortizacion);
							interes_periodico= prestamo*i;
							var capital_vivo = (prestamo - cuota_total) + interes_periodico;
							capital_vivo = xim.estadistica.credito_nuevo.redondear(capital_vivo);
							var totales = cuota_total;
							for(var o=1;o<cuotas;o++){
								amortizacion = cuota_total - (capital_vivo*i);
								amortizacion = xim.estadistica.credito_nuevo.redondear(amortizacion);
								interes_periodico = capital_vivo*i;
								capital_vivo = (capital_vivo - cuota_total) + interes_periodico;
								capital_vivo = xim.estadistica.credito_nuevo.redondear(capital_vivo);								
								//alert(interes_periodico+'<->'+amortizacion+'<->'+capital_vivo+'--->'+cuota_total);
								totales += cuota_total;
							}
							Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_total_cred').setValue(xim.estadistica.credito_nuevo.redondear(totales));
						break;
						case 3://aleman
							resp = prestamo*tasa/2;
						break;
					}
					Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_valor_cuotas').setValue(resp);
				},
				redondear:function(valor){
					return Math.round(valor*100)/100;
				},
				generar_cuotas:function(){
					var tasa = Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_tasa_int').getValue();
					var metodo =Ext.getCmp(xim.estadistica.credito_nuevo.id+'_cmb_metodo').getValue();
					var prestamo =Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_prestamos_monto').getValue();
					var cuotas =Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_cuotas_num').getValue();
					var tipo_credito =Ext.getCmp(xim.estadistica.credito_nuevo.id+'_cmb_tipo_credito').getValue();
					var fecha_calculo =Ext.getCmp(xim.estadistica.credito_nuevo.id+'_fecha_calculo').getValue();
					var cod_cli =Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_cod_cli').getValue();
					fecha_calculo = fecha_calculo.format('Y/m/d');
					/*if(cod_cli== ''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Seleccione un cliente por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}*/
					if(metodo== ''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Seleccione un metodo por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					if(tipo_credito== ''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Seleccione un tipo de credito por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					if(prestamo< 1){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'El monto a prestar deber ser mayor a cero!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					Ext.getCmp(xim.estadistica.credito_nuevo.id+'_grid_credito_nuevo').getStore().reload({
						params:{
							op:'get_calculo_prestamo',metodo:metodo,tasa:tasa,prestamo:prestamo,cuotas:cuotas,tipo_credito:tipo_credito,fecha_calculo:fecha_calculo
						},
						callback:function(){
							var total_credito=0;
							Ext.getCmp(xim.estadistica.credito_nuevo.id+'_grid_credito_nuevo').getStore().each(function(record){
								total_credito += record.get('saldo_cuota');
							});
							Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_total_cred').setValue(xim.estadistica.credito_nuevo.redondear(total_credito));				
						}
					});
				},
				grabar_update_nuevo_recibo:function(op){
					var cod_credito = Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_codigo').getValue();
					var fecha = Ext.getCmp(xim.estadistica.credito_nuevo.id+'_fecha_cred').getValue();
					var tasa = Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_tasa_int').getValue();
					var metodo =Ext.getCmp(xim.estadistica.credito_nuevo.id+'_cmb_metodo').getValue();
					var prestamo =Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_prestamos_monto').getValue();
					var cuotas =Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_cuotas_num').getValue();
					var tipo_credito =Ext.getCmp(xim.estadistica.credito_nuevo.id+'_cmb_tipo_credito').getValue();
					var fecha_calculo =Ext.getCmp(xim.estadistica.credito_nuevo.id+'_fecha_calculo').getValue();
					var cod_cli =Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_cod_cli').getValue();
					var limite_cred=Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_limite_cred').getValue();
					var valor_cuota=Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_valor_cuotas').getValue();
					var cod_entrega=Ext.getCmp(xim.estadistica.credito_nuevo.id+'_cmb_entrega').getValue();
					var total_credito=Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_total_cred').getValue();
					var nota=Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_obs').getValue();
					
					fecha_calculo = fecha_calculo.format('Y/m/d');
					fecha= fecha.format('Y/m/d');
					if(cod_cli== ''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Seleccione un cliente por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					if(metodo== ''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Seleccione un metodo por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					if(tipo_credito== ''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Seleccione un tipo de credito por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					if(cod_entrega== ''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Seleccione un tipo de entrega por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					if(prestamo< 1){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'El monto a prestar deber ser mayor a cero!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					if(prestamo>limite_cred){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'El monto a prestar deber ser menor o igual al limite de credito del cliente!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					if(!confirm('Desea ejecutar el proceso?')){return;}
					var data = 'op=grabar_update_nuevo_recibo&fecha='+fecha+'&tasa_interes='+tasa+'&cod_metodo='+metodo+'&prestamo='+prestamo+'&cuotas='+cuotas+'&cod_tipo='+tipo_credito+'&valor_cuota='+valor_cuota+'&fecha_calculo='+fecha_calculo+'&total_credito='+total_credito+'&cod_cli='+cod_cli+'&limite_cred='+limite_cred+'&nota='+nota+'&cod_entrega='+cod_entrega+'&opcion='+op+'&cod_credito='+cod_credito;
					Ext.getCmp(xim.estadistica.credito_nuevo+'_ventana_credito').el.mask('Cargando...', 'x-mask-loading');	
					Ext.Ajax.request({
						url:xim.estadistica.credito_nuevo.url,
						params:data,
						success:function(response,options){
							Ext.getCmp(xim.estadistica.credito_nuevo+'_ventana_credito').el.unmask();
							var msg = Ext.decode(response.responseText);
								if(parseInt(msg['est'])==1){
									Ext.Msg.show({
										title: 'MAC',
										msg: 'El proceso termino correctamente!',
										buttons: Ext.Msg.OK, 
										icon: Ext.Msg.INFO
									});		
									
										Ext.getCmp(xim.estadistica.creditos+'_grid_clientes').getStore().reload({
											params:{
												op:'get_lista_creditos'
											}
										});			
										Ext.getCmp('Div_ESTADISTICA_CREDITO_NUEVO').close();				
								}else if(parseInt(msg['est'])==2){
									Ext.Msg.show({
										title: 'MAC',
										msg: 'NO SE PUEDE ACTUALIZAR EL CREDITO POR QUE TIENE ALMENOS UNA CUOTA COBRADA!',
										buttons: Ext.Msg.OK, 
										icon: Ext.Msg.WARNING
									});		
											
								}else{
									Ext.Msg.show({
										title: 'MAC',
										msg: 'Ocurrio un Error al tratar de almacenar la informacion, informe al Administrador del Sistema',
										buttons: Ext.Msg.OK,
										icon: Ext.Msg.ERROR
									});
		
								}		
						}
					});				
				},
				adelantar_cuotas:function(){
					var rec = Ext.getCmp(xim.estadistica.credito_nuevo.id+'_grid_credito_nuevo').getSelectionModel().getSelected();
					if(rec==undefined){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Seleccione a desde que punto se renovara la cuota!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					var capital_vivo = parseFloat(rec.get('capital_vivo'));
					var cuota = parseFloat(rec.get('cuota_total_t'));
					var iteres_o = parseFloat(rec.get('interes_periodico'));
					var credito = Ext.getCmp(xim.estadistica.creditos+'_grid_clientes').getSelectionModel().getSelected();
					var tasa_interes = credito.get('tasa_interes');		
					//var cod_metodo = credito.get('cod_metodo');	
					var cod_metodo = Ext.getCmp(xim.estadistica.credito_nuevo.id+'_cmb_metodo').getValue();	
					var fecha_calculo = rec.get('fecha_cuota_tiempo');
					
					if(rec.get('estado')== true){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'No se puede renovar esta cuota porque ya esta cancelada!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					
					capital_vivo = xim.estadistica.credito_nuevo.redondear((capital_vivo + cuota) -	iteres_o);		
					/***********calculo previo**********/
					//falta un case para saber que metodo utilizar
					var cuota_total=0;
					var i =  (tasa_interes/100);
					var forma = (1+i);
					var ext = Math.pow(forma,1);
					if(i>0){
						cuota_total = parseFloat(capital_vivo * ((ext*i)/(ext-1)));
						cuota_total = xim.estadistica.credito_nuevo.redondear(cuota_total);//redondeo
					}else{
						cuota_total = parseFloat(capital_vivo/1);
						cuota_total = xim.estadistica.credito_nuevo.redondear(cuota_total);//redondeo
					}									
					/***********************************/
					var storese = new Ext.data.JsonStore({
                        url:this.url,
                        autoLoad:false,
                        baseParams:{op:'get_calculo_renova'},
                        root:'data',
                        fields:['fecha_cuota','cuota_total','interes_periodico','amortizacion','capital_vivo','mora','cuota_total','fecha_vence','flag','estado','estado_muestra']
                    });
					var chk_model4 = new Ext.grid.CheckboxSelectionModel({
                        singleSelect:false,
                        checkOnly:false,
                        injectCheckbox :false
                    });
					var win = new Ext.Window({  
					title: 'RENOVAR CUOTAS',
					id:'win_adelantar_pagos',
					width: 750,
					modal:true,
					//layout:'fit',
					height:300,
					items:[
					{
					xtype:'panel',
					//title:'Buscar Por',
					border:false,
					bodyStyle	: "padding: 5px;",
					layout:'table',
					layoutConfig:{
					columns:14
					},
					items:[
						{
							xtype:'label',
							text:'Interés:'
						},
						{
							xtype: 'spinnerfield',
							id:xim.estadistica.credito_nuevo.id+'_txt_interes',
							width:50,
							name: 'test',
							minValue: 0,
							maxValue: 100,
							allowDecimals: false,
							decimalPrecision: 0,
							incrementValue: 1,
							value:tasa_interes,
							alternateIncrementValue: 1,
							accelerate: true,
							enableKeyEvents:true,
							//enableKeyEvents:true,
							listeners:{
									keypress:function(obj,e){
											setTimeout('xim.estadistica.credito_nuevo.recalculo_cuotas_frances()',100);
									},
									'change':function(obj,e){
											setTimeout('xim.estadistica.credito_nuevo.recalculo_cuotas_frances()',100);
									},
									'spin':{//spinUp-spinDown
										fn:function(){
											setTimeout('xim.estadistica.credito_nuevo.recalculo_cuotas_frances()',100);
										}											
									}
							}
						},
						{
							xtype:'panel',
							border:false,
							width:10
						},
						{
							xtype:'label',
							text:'Capital Actual:'
						},
						{
								xtype:'textfield',
								id:xim.estadistica.credito_nuevo.id+'_txt_capital_vivo',
								autoCreate: {tag: 'input', type: 'text', size: '12', autocomplete: 'off', maxlength: '1000'},
								value:capital_vivo,
								readOnly:true,
								anchor:'99%',
								enableKeyEvents:true,
								selectOnFocus:true,								
								listeners:{
										keypress:function(obj,e){
												if(e.keyCode==13){

												}
										}
								}
						},
						{
							xtype:'panel',
							border:false,
							width:10
						},
						{
							xtype:'label',
							text:'Cuotas #:'
						},
						{
							xtype: 'spinnerfield',
							id:xim.estadistica.credito_nuevo.id+'_txt_cuotas_num_ade',
							width:80,
							name: 'test',
							minValue: 1,
							allowDecimals: false,
							decimalPrecision: 0,
							incrementValue: 1,
							value:1,
							alternateIncrementValue: 1,
							accelerate: true,
							enableKeyEvents:true,
							//enableKeyEvents:true,
							listeners:{
									keypress:function(obj,e){
											setTimeout('xim.estadistica.credito_nuevo.recalculo_cuotas_frances()',100);
									},
									'change':function(obj,e){
											setTimeout('xim.estadistica.credito_nuevo.recalculo_cuotas_frances()',100);
									},
									'spin':{//spinUp-spinDown
										fn:function(){
											setTimeout('xim.estadistica.credito_nuevo.recalculo_cuotas_frances()',100);
										}											
									}
							}
						},
						{
							xtype:'panel',
							border:false,
							width:10
						},
						{
							xtype:'label',
							text:'Valor Cuotas:'
						},
						{
						xtype:'panel',
						colspan:1,
						border:false,
						width:12
						},
						{
								xtype:'textfield',
								id:xim.estadistica.credito_nuevo.id+'_txt_valor_cuotas_ade',
								autoCreate: {tag: 'input', type: 'text', size: '14', autocomplete: 'off', maxlength: '1000'},
								value:cuota_total,
								readOnly:true,
								anchor:'99%',
								enableKeyEvents:true,
								selectOnFocus:true,
								//allowBlank:false,
								listeners:{
										keypress:function(obj,e){
												if(e.keyCode==13){

												}
										}
								}
						},
						{
						xtype:'panel',
						colspan:1,
						border:false,
						width:12
						},
						{
							xtype: 'tbbutton',	
							text:'Previsualisar Cuotas',								
							iconCls:'Preferences',
							listeners:{
								click:function(obj, e){
									xim.estadistica.credito_nuevo.generar_cuotas_ade(tasa_interes,cod_metodo,fecha_calculo);
								}		
							}
						}
						]},
						{
						xtype:'grid',
						store:storese,
						//layout:'fit',				
						id:xim.estadistica.credito_nuevo.id+'_grid_adelantar_pagos',
						height:204,
						columns:[
							new Ext.grid.RowNumberer(),
							{header:'Fecha',dataIndex:'fecha_cuota',width:80},
							{header:'Valor Cuota',dataIndex:'cuota_total',width:70},
							{header:'Interés',dataIndex:'interes_periodico',width:60},
							{header:'Amortización',dataIndex:'amortizacion',width:80},
							{header:'Capital Vivo',dataIndex:'capital_vivo',width:80},
							{header:'Mora',dataIndex:'mora',width:60},
							{header:'Saldo Cuota',dataIndex:'cuota_total',width:80},
							{header:'Vence',dataIndex:'fecha_vence',width:80},
							{header:'Estado',dataIndex:'estado_muestra',width:80},
							chk_model4],
						bbar: new Ext.PagingToolbar({
							id:'_pager_adelantar_pagos',
							store:storese,
							displayInfo:true,
							displayMsg:'{0} - {1} de {2} Cuotas.',
							emptyMsg:'Cuotas',
							pageSize:80
						}),
						sm:chk_model4,
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
								xim.estadistica.credito_nuevo.select_cli();															
							}
						}
									}//fin grid
					
					],buttons:[					
					{
						text : "Actualizar",
						iconCls:'actualizar',
						scope : this,
						handler:xim.estadistica.credito_nuevo.renovar_actualizar_cuotas
					},
					{
						text : "Salir",
						scope : this,
						listeners:{
							click:function(obj, e){
								Ext.getCmp('win_adelantar_pagos').close();
							}
						},
						iconCls:'salir'
					}
				]//botones del formulario
				});  
				 
				win.show();
				},
				generar_cuotas_ade:function(tasa_interes,cod_metodo,fecha_calculo){
					var capital_vivo = Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_capital_vivo').getValue();
					var nro_cuotas = Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_cuotas_num_ade').getValue();
					var valor_cuotas = Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_valor_cuotas_ade').getValue();
					var interes = Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_interes').getValue();
					var rex = Ext.getCmp(xim.estadistica.creditos+'_grid_clientes').getSelectionModel().getSelected();
					var tipo_credito = rex.get('cod_tipo');
					Ext.getCmp(xim.estadistica.credito_nuevo.id+'_grid_adelantar_pagos').getStore().reload({
						params:{
							op:'get_calculo_renova',capital_vivo:capital_vivo,nro_cuotas:nro_cuotas,valor_cuotas:valor_cuotas,tasa_interes:interes,cod_metodo:cod_metodo,fecha_calculo:fecha_calculo,tipo_credito:tipo_credito
						}
					});
				},
				recalculo_cuotas_frances:function(){
					/***********calculo previo**********/
					//var credito = Ext.getCmp(xim.estadistica.creditos+'_grid_clientes').getSelectionModel().getSelected();
					var interes = Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_interes').getValue();
					var tasa_interes = interes;//credito.get('tasa_interes');		
					var capital_vivo = Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_capital_vivo').getValue();
					var nro_cuotas = Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_cuotas_num_ade').getValue();
					var cod_metodo = Ext.getCmp(xim.estadistica.credito_nuevo.id+'_cmb_metodo').getValue();
					//falta un case para saber que metodo aplicar
						var cuota_total=0;
						var i =  (tasa_interes/100);
						var forma = (1+i);
						var ext = Math.pow(forma,nro_cuotas);
						if(i>0){
							cuota_total = parseFloat(capital_vivo * ((ext*i)/(ext-1)));
							cuota_total = xim.estadistica.credito_nuevo.redondear(cuota_total);//redondeo
						}else{
							cuota_total = parseFloat(capital_vivo/nro_cuotas);
							cuota_total = xim.estadistica.credito_nuevo.redondear(cuota_total);//redondeo
						}		
						Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_valor_cuotas_ade').setValue(cuota_total);		
					/***********************************/					
				},
				renovar_actualizar_cuotas:function(){
					var rec = Ext.getCmp(xim.estadistica.credito_nuevo.id+'_grid_credito_nuevo').getSelectionModel().getSelected();
					var nro_cuota =rec.get('nro_cuota'); 
					var cod_credito =rec.get('cod_credito');
					var cod_det_credito =rec.get('cod_det_credito'); 
					var cod_metodo = Ext.getCmp(xim.estadistica.credito_nuevo.id+'_cmb_metodo').getValue();
					var interes = Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_interes').getValue();
					var capital_vivo = Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_capital_vivo').getValue();
					var nro_cuotas = Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_cuotas_num_ade').getValue();
					var valor_cuotas = Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_valor_cuotas_ade').getValue();
					var nota=Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_obs').getValue();
					var fecha_calculo = rec.get('fecha_cuota_tiempo');
					var rex = Ext.getCmp(xim.estadistica.creditos+'_grid_clientes').getSelectionModel().getSelected();
					var tipo_credito = rex.get('cod_tipo');
					if(capital_vivo==''){
						Ext.Msg.show({
							title: 'MAC',
							msg: 'No Existe capital vivo!',
							buttons: Ext.Msg.OK,
							icon: Ext.Msg.WARNING
						});return;
            		}
					if(capital_vivo==0){
						Ext.Msg.show({
							title: 'MAC',
							msg: 'Capital vivo esta en cero, no se puede renovar cuotas desde este punto!',
							buttons: Ext.Msg.OK,
							icon: Ext.Msg.WARNING
						});return;
            		}
					if(cod_credito==''){
						Ext.Msg.show({
							title: 'MAC',
							msg: 'Antes de renovar, primero guarde las cuotas por favor!',
							buttons: Ext.Msg.OK,
							icon: Ext.Msg.WARNING
						});return;
            		}
					if(cod_det_credito==''){
						Ext.Msg.show({
							title: 'MAC',
							msg: 'No existe una cuota generada desde este punto, guarde y intente otra vez!',
							buttons: Ext.Msg.OK,
							icon: Ext.Msg.WARNING
						});return;
            		}
					//alert(nro_cuota+'<->'+interes+'<->'+capital_vivo+'<->'+nro_cuotas+'<->'+valor_cuotas+'<->'+cod_metodo+'<->'+cod_credito+'<->'+cod_det_credito);
					if(!confirm('Desea ejecutar el proceso? , recuerde que las cuotas apartir en adelante del registro seleccionado se remplazarán por las nuevas cuotas')){return;}
					
					var data = 'op=grabar_update_renueva_cuotas&interes='+interes+'&capital_vivo='+capital_vivo+'&nro_cuotas='+nro_cuotas+'&valor_cuotas='+valor_cuotas+'&opcion=1&cod_metodo='+cod_metodo+'&cod_credito='+cod_credito+'&cod_det_credito='+cod_det_credito+'&nro_cuota='+nro_cuota+'&fecha_calculo='+fecha_calculo+'&nota='+nota+'&tipo_credito='+tipo_credito;
					Ext.getCmp('win_adelantar_pagos').el.mask('Cargando...', 'x-mask-loading');	
					Ext.Ajax.request({
						url:xim.estadistica.credito_nuevo.url,
						params:data,
						success:function(response,options){
							Ext.getCmp('win_adelantar_pagos').el.unmask();
							var msg = Ext.decode(response.responseText);
								if(parseInt(msg['est'])==1){
									Ext.Msg.show({
										title: 'MAC',
										msg: 'El proceso termino correctamente!',
										buttons: Ext.Msg.OK, 
										icon: Ext.Msg.INFO
									});		
									
										Ext.getCmp(xim.estadistica.creditos+'_grid_clientes').getStore().reload({
											params:{
												op:'get_lista_creditos'
											}
										});			
										Ext.getCmp('win_adelantar_pagos').close();
										Ext.getCmp('Div_ESTADISTICA_CREDITO_NUEVO').close();				
								}else if(parseInt(msg['est'])==2){
									Ext.Msg.show({
										title: 'MAC',
										msg: 'No existen cuotas generadas ni recibo apartir de este punto!',
										buttons: Ext.Msg.OK, 
										icon: Ext.Msg.WARNING
									});		
									
										Ext.getCmp(xim.estadistica.creditos+'_grid_clientes').getStore().reload({
											params:{
												op:'get_lista_creditos'
											}
										});			
										Ext.getCmp('win_adelantar_pagos').close();
										Ext.getCmp('Div_ESTADISTICA_CREDITO_NUEVO').close();				
								}else{
									Ext.Msg.show({
										title: 'MAC',
										msg: 'Ocurrio un Error al tratar de almacenar la informacion, informe al Administrador del Sistema',
										buttons: Ext.Msg.OK,
										icon: Ext.Msg.ERROR
									});
		
								}		
						}
					});	
				},
				imprimir_credito:function(){
					var cod_cli= Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_cod_cli').getValue();
					var cod_credito= Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_codigo').getValue();
					if(cod_credito==''){
						Ext.Msg.show({
							title: 'MAC',
							msg: 'Para imprimir el reporte de credito primero debe guardar los cambios!',
							buttons: Ext.Msg.OK, 
							icon: Ext.Msg.WARNING
						});		
						return;
					}
					var file= 'modulos/creditos/reportes/imprime_credito.php';
					var param='cod_cli='+cod_cli+'&cod_credito='+cod_credito;
					var win = new Ext.Window({  
					title: 'Reporte de credito',
					id:'win_reportes',
					width: 700,
					modal:true,
					//layout:'fit',
					height:500,
					html:"<iframe src='"+file+"?"+param+"' onload='xim.estadistica.credito_nuevo.cargador()' width='100%' height='435px' style='border:0px' more attributes></iframe>",
					buttons:[
					{
						text : "Salir",
						scope : this,
						listeners:{
							click:function(obj, e){
								Ext.getCmp('win_reportes').close();
							}
						},
						iconCls:'salir'
					}
				]//botones del formulario
				});  
				 
				win.show(); 
				Ext.getCmp('win_reportes').el.mask('Cargando...', 'x-mask-loading');	
					/*var visor= 'modulos/creditos/reportes/visor_reportes.php';
					
					CargarVentana('REPORTE PLANILLON','REPORTE PLANILLON',visor,'900','550',false,false,'',1,'',10,10,10,10,'rrhh_Reporte(1)');*/
				},
				cargador:function(){
				Ext.getCmp('win_reportes').el.unmask();
				}
            }
            Ext.onReady(xim.estadistica.credito_nuevo.init,xim.estadistica.credito_nuevo);			
        </script>
    </body>
</html>