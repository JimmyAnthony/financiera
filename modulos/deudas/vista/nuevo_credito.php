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
                url:'modulos/credito/capas/control.php',
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
                        baseParams:{op:'get_personal'},
                        root:'data',
                        fields:['idper','nombre','dni','flag']
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
                        //margins		: "0 0 0 0",
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
                            columns:8
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
                                        id:'_txt_codigo',
                                        autoCreate: {tag: 'input', type: 'text', size: '15', autocomplete: 'off', maxlength: '1000'},
										disabled:true,
                                        //fieldLabel:'Tramite',
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
                                width:252
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
							   format:'d/m/Y',
							   value:new Date()
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
                                        id:'_txt_nombres',
                                        autoCreate: {tag: 'input', type: 'text', size: '15', autocomplete: 'off', maxlength: '1000'},
                                        //fieldLabel:'Tramite',
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
									listeners:{
										click:function(obj, e){
												var chk_model = new Ext.grid.CheckboxSelectionModel({
													singleSelect:false,
													checkOnly:false,
													injectCheckbox :false
												});
												var store = new Ext.data.JsonStore({
													/*url:this.url,
																	autoLoad:true,
													baseParams:{op:'grid_travel'},
													root:'data',
													fields:['id_vuelo','id_det','id_aero','id_pais','subtitulo','nota','precio','comentarios','puntos','fecha','aero','pais','flag']*/
												});
											    var win = new Ext.Window({  
													title: 'Listado de Clientes',
													id:'win_clientes',
													width: 300,
													modal:true,
													layout:'fit',
													height:400,
													items:[
														{
														xtype:'grid',
														store:store,
														layout:'fit',
				
														id:'_grid_cli',
														columns:[
															new Ext.grid.RowNumberer(),
															{header:'Codigo',dataIndex:'cod_cli',width:50},
															{header:'Nombres',dataIndex:'nombre',width:170},
															chk_model],
														bbar: new Ext.PagingToolbar({
															id:'_pager_cli',
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
														/*,
														sm: new Ext.grid.RowSelectionModel({
															singleSelect:true,
															listeners:{
																rowselect:function(sm,row,rec){
								
																}
															}
														})*/
																	}//fin grid
													],buttons:[
													{
														text : "Aceptar",
														iconCls:'aceptar',
														scope : this,
														handler:this.new_reg_xim
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
                                        id:'_txt_apellidos',
                                        autoCreate: {tag: 'input', type: 'text', size: '101', autocomplete: 'off', maxlength: '1000'},
                                        //fieldLabel:'Tramite',
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
									id:'_txt_tasa_int',
									width:100,
									name: 'test',
									minValue: 0,
									maxValue: 99999999,
									allowDecimals: true,
									decimalPrecision: 2,
									incrementValue: 1,
									value:0,
									alternateIncrementValue: 3.10,
									accelerate: true
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
								//fieldLabel:'Aerolineas',
								id:'_cmb_metodo',
								width:268,
								forceSelection:true,
								emptyText:'Seleccione Metodo de Calculo...',
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
										/*Ext.getCmp('filter-galeries').setValue('');
										Ext.getCmp(ex.estudio.multidestinostravel.xim.TRAVEL_VUELOS+'_grid_TRAVEL_VUELOS').getStore().reload({
											params:{
												op:'grid_travel_busqueda',id_aero:rec.get('id_aero'),opcion:1
											}
										});*/
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
									id:'_txt_prestamos_monto',
									width:100,
									name: 'test',
									minValue: 0,
									maxValue: 99999999,
									allowDecimals: true,
									decimalPrecision: 2,
									incrementValue: 1,
									value:0,
									alternateIncrementValue: 3.10,
									accelerate: true
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
									id:'_txt_cuotas_num',
									width:80,
									name: 'test',
									minValue: 0,
									maxValue: 99999999,
									allowDecimals: false,
									decimalPrecision: 0,
									incrementValue: 1,
									value:0,
									alternateIncrementValue: 1,
									accelerate: true
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
								id:'_cmb_tipo_credito',
								width:268,
								forceSelection:true,
								emptyText:'Seleccione Tipo de Credito...',
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
										/*Ext.getCmp('filter-galeries').setValue('');
										Ext.getCmp(ex.estudio.multidestinostravel.xim.TRAVEL_VUELOS+'_grid_TRAVEL_VUELOS').getStore().reload({
											params:{
												op:'grid_travel_busqueda',id_aero:rec.get('id_aero'),opcion:1
											}
										});*/
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
                                        id:'_txt_valor_cuotas',
                                        autoCreate: {tag: 'input', type: 'text', size: '14', autocomplete: 'off', maxlength: '1000'},
                                        //fieldLabel:'Tramite',
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
							   format:'d/m/Y',
							   value:new Date()
							   },
							   {
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:50
                                },
                                {
                                    xtype: 'tbbutton',	
									text:'Generar Cuotas',								
									iconCls:'buscar',
									listeners:{
										click:function(obj, e){
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
									store:store,
									layout:'fit',

									id:'_grid_credito_nuevo',
									columns:[
										new Ext.grid.RowNumberer(),
										{header:'Fecha',dataIndex:'nombres',width:80},
										{header:'Valor Cuota',dataIndex:'apellidos',width:70},
										{header:'Interés',dataIndex:'precio',width:60},
										{header:'Amortización',dataIndex:'comentarios',width:80},
										{header:'Capital Vivo',dataIndex:'puntos',width:80},
										{header:'Mora',dataIndex:'fecha',width:60},
										{header:'Saldo Cuota',dataIndex:'fecha',width:80},
										{header:'Vence',dataIndex:'fecha',width:80},
										{header:'Estado',dataIndex:'flag',width:80},
										chk_model],
									bbar: new Ext.PagingToolbar({
										id:'_pager_nuevo_credito',
										store:store,
										displayInfo:true,
										displayMsg:'{0} - {1} de {2} Cuotas.',
										emptyMsg:'Sin Cuotas',
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
								id:'_cmb_entrega',
								width:268,
								forceSelection:true,
								emptyText:'Seleccione modo de entrega...',
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
										/*Ext.getCmp('filter-galeries').setValue('');
										Ext.getCmp(ex.estudio.multidestinostravel.xim.TRAVEL_VUELOS+'_grid_TRAVEL_VUELOS').getStore().reload({
											params:{
												op:'grid_travel_busqueda',id_aero:rec.get('id_aero'),opcion:1
											}
										});*/
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
                                        id:'_txt_total_cred',
                                        autoCreate: {tag: 'input', type: 'text', size: '15', autocomplete: 'off', maxlength: '1000'},
										disabled:true,
                                        //fieldLabel:'Tramite',
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
									id:'_txt_obs',
									width:680,
									height:42,
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
                                handler:this.new_reg_xim
                            },
                            {
                                text : "Grabar",
                                iconCls:'guardar',
                                scope : this,
                                handler:this.new_reg_xim
                            },
                            {
                                text : "Editar",
                                iconCls:'editar',
                                scope : this,
                                handler:this.new_reg_xim
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
                }
            }
            Ext.onReady(xim.estadistica.credito_nuevo.init,xim.estadistica.credito_nuevo);

        </script>
    </body>
</html>