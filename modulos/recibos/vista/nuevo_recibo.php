<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style type="text/css">

        </style>
    </head>
    <body>
        <script type="text/javascript">
            Ext.ns("xim.estadistica.recibo_nuevo");
            xim.estadistica.recibo_nuevo = {
                div : 'Div_ESTADISTICA_RECIBO_NUEVO',
                url:'modulos/recibos/capas/control.php',
                id:'xim',
				myArray:new Array(),
                cod_credito:<?php echo $cod_credito;?>,
                ximModo:0,
				cod_cobra:<?php echo $cod_cobra;?>,
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
					 var chk_model2 = new Ext.grid.CheckboxSelectionModel({
                        singleSelect:false,
                        checkOnly:false,
                        injectCheckbox :false
                    });
                    var store = new Ext.data.JsonStore({
                        url:this.url,
                        autoLoad:<?php echo $load;?>,
                        baseParams:{<?php echo $paramer;?>},
                        root:'data',
                        fields:['nro_cuota','cod_det_credito','cod_credito','nro_cuota_cli','cod_credito_cli','fecha_cuota','cuota_total','interes_periodico','amortizacion','capital_vivo','mora','cuota_total','saldo_cuota','fecha_vence','flag','abonado','flag_x']
                    });
					var stores = new Ext.data.JsonStore({
                        url:this.url,
                        autoLoad:true,
                        baseParams:{op:'get_clientes'},
                        root:'data',
                        fields:['cod_cli','nombres','limite_credito']
                    });
					 var store2 = new Ext.data.JsonStore({
                        url:this.url,
                        autoLoad:<?php echo $load;?>,
                        baseParams:{<?php echo $paramer_cobrado;?>},
                        root:'data',
                        fields:['nro_cuota','cod_det_credito','cod_credito','nro_cuota_cli','cod_credito_cli','fecha_cuota','cuota_total','interes_periodico','amortizacion','capital_vivo','mora','cuota_total','saldo_cuota','fecha_vence','flag','abonado','flag_x']
                    });
					var store3 = new Ext.data.JsonStore({
						url:this.url,
						autoLoad:true,
						baseParams:{op:'grid_cobradores'},
						root:'data',
						fields:['cod_cobra','nombres','flag']
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
						id:xim.estadistica.recibo_nuevo.id+'_ventana_recibo',
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
                                        id:xim.estadistica.recibo_nuevo.id+'_txt_codigo',
                                        autoCreate: {tag: 'input', type: 'text', size: '15', autocomplete: 'off', maxlength: '1000'},
										disabled:true,
                                        value:'<?php echo $cod_recibo;?>',
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
                                width:292
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
							   id:xim.estadistica.recibo_nuevo.id+'_txt_fecha',
							   disabled:true,
							   format:'d/m/Y',
							   value:'<?php if(!empty($fecha)){echo $fecha;}else{echo date('d/m/Y');}?>',
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
                                        id:xim.estadistica.recibo_nuevo.id+'_txt_cod_cli',
                                        autoCreate: {tag: 'input', type: 'text', size: '15', autocomplete: 'off', maxlength: '1000'},
                                        readOnly:true,
                                        anchor:'99%',
                                        enableKeyEvents:true,
                                        selectOnFocus:true,
                                        value:'<?php echo $cod_cli;?>',
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
									disabled:<?php echo $load;?>,								
									iconCls:'buscar',
									listeners:{
										click:function(obj, e){
												var chk_model = new Ext.grid.CheckboxSelectionModel({
													singleSelect:false,
													checkOnly:false,
													injectCheckbox :false
												});
											    var win = new Ext.Window({
													title: 'Listado de Clientes',
													id:xim.estadistica.recibo_nuevo.id+'win_clientes',
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
                                                                store: this.stores,
                                                                fieldLabel:'Buscar Por',
                                                                id:xim.estadistica.recibo_nuevo.id+'filter-clientes',
                                                                emptyText:'Ingrese Nombre a buscar...',
                                                                enableKeyEvents:true,
                                                                width:272,
                                                                listeners:{
                                                                    keypress:function(obj,e){
                                                                        if (e.keyCode == e.ENTER) {
                                                                            Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_cmb_documento').setValue('');
                                                                            var sub = Ext.getCmp(xim.estadistica.recibo_nuevo.id+'filter-clientes').getValue();
                                                                            Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_grid_TRAVEL_VUELOS').getStore().reload({
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
														store:stores,
														//layout:'fit',				
														id:xim.estadistica.recibo_nuevo.id+'_grid_clientes',
														height:284,
														columns:[
															new Ext.grid.RowNumberer(),
															{header:'Codigo',dataIndex:'cod_cli',width:50},
															{header:'Nombres',dataIndex:'nombres',width:170},
															chk_model],
														bbar: new Ext.PagingToolbar({
															id:xim.estadistica.recibo_nuevo.id+'_pager_clientes',
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
																xim.estadistica.recibo_nuevo.select_cli();															
															}
														}
																	}//fin grid
													
													],buttons:[
													{
														text : "Aceptar",
														iconCls:'aceptar',
														scope : this,
														handler:xim.estadistica.recibo_nuevo.select_cli
													},
													{
														text : "Salir",
														scope : this,
														listeners:{
															click:function(obj, e){
																Ext.getCmp(xim.estadistica.recibo_nuevo.id+'win_clientes').close();
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
                                        id:xim.estadistica.recibo_nuevo.id+'_txt_nombres',
                                        autoCreate: {tag: 'input', type: 'text', size: '101', autocomplete: 'off', maxlength: '1000'},
                                        readOnly:true,
                                        anchor:'99%',
                                        enableKeyEvents:true,
                                        selectOnFocus:true,
                                        value:'<?php echo $nombres;?>',
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
                            columns:15
                            },
                            items:[
                                {
                                    xtype:'label',
                                    text:'Arrastre las cuotas pendientes hacia la lista de cuotas por cobrar:'
                                },
								
                                {
                                    xtype: 'tbbutton',	
									text:'Rastrear Saldos',		
									disabled:<?php echo $load;?>,						
									iconCls:'buscar',
									listeners:{
										click:function(obj, e){
										 	xim.estadistica.recibo_nuevo.rastrear_saldos();
										}		
									}
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:15
                                },
								{
                                    xtype:'label',
                                    text:'Cobrador:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
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
												
											    var win = new Ext.Window({  
													title: 'Listado de Cobradores',
													id:xim.estadistica.recibo_nuevo.id+'win_cobradores',
													width: 350,
													modal:true,
													layout:'fit',
													height:400,
													items:[
														{
														xtype:'grid',
														store:store3,
														layout:'fit',
				
														id:xim.estadistica.recibo_nuevo.id+'_grid_cobradores',
														columns:[
															new Ext.grid.RowNumberer(),
															{header:'Codigo',dataIndex:'cod_cobra',width:50},
															{header:'Nombres',dataIndex:'nombres',width:220},
															chk_model],
														bbar: new Ext.PagingToolbar({
															id:'_pager_clssi',
															store:store3,
															displayInfo:true,
															displayMsg:'{0} - {1} de {2} Clientes.',
															emptyMsg:'Clientes',
															pageSize:80
														}),
														sm:chk_model,
														stripeRows:true,
														anchor:'99%',
														loadMask:true,
														listeners:{
															rowdblclick:function(obj, index, e){
																xim.estadistica.recibo_nuevo.select_cobrador();					
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
													],buttons:[
													{
														text : "Aceptar",
														iconCls:'aceptar',
														scope : this,
														handler:xim.estadistica.recibo_nuevo.select_cobrador
													},
													{
														text : "Salir",
														scope : this,
														listeners:{
															click:function(obj, e){
																Ext.getCmp(xim.estadistica.recibo_nuevo.id+'win_cobradores').close();
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
                                        id:xim.estadistica.recibo_nuevo.id+'_txt_cobrador',
                                        autoCreate: {tag: 'input', type: 'text', size: '40', autocomplete: 'off', maxlength: '1000'},
                                        value:'<?php echo $cobrador;?>',
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
                            xtype:'fieldset',
                            title:'Cuotas Pendientes',
                            border:true,
							height:173,							
                            bodyStyle	: "padding: 0px;margin:0px;",
                            layout:'fit',
                            items:[
								{
									xtype:'grid',
									ddGroup:'secondGridDDGroup',
									enableDragDrop   : true,
        							stripeRows       : true,
									layout       : 'hbox',
									defaults     : { flex : 1 }, //auto stretch
									store:store,
									id:xim.estadistica.recibo_nuevo.id+'_grid_recibo_arriba',
									columns:[																		
										new Ext.grid.RowNumberer(),
										{header:'Nro Cuota',dataIndex:'nro_cuota_cli',width:80},
										{header:'Cod. Prest',dataIndex:'cod_credito_cli',width:70},
										{header:'Valor Cuota',dataIndex:'cuota_total',width:65},
										{header:'Interés',dataIndex:'interes_periodico',width:80},
										{header:'Capital Vivo',dataIndex:'capital_vivo',width:80},
										{header:'Mora',dataIndex:'mora',width:60},
										{header:'Total Cuota',dataIndex:'saldo_cuota',width:80},
										{header:'Vence',dataIndex:'fecha_vence',width:80},
										{header:'Estado',dataIndex:'flag',width:80},
										chk_model],
									bbar: new Ext.PagingToolbar({
										id:'_pager_nuevo_recibo_arriba',
										store:store,
										displayInfo:true,
										displayMsg:'{0} - {1} de {2} Cuotas.',
										emptyMsg:'Sin Cuotas',
										pageSize:80,
										items: ['',clock],
										listeners:{
											click:function(){
											alert('a');
											}
										}
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
                            xtype:'fieldset',
                            title:'Cuotas por Cobrar',
                            border:true,
							height:173,							
                            bodyStyle	: "padding: 0px;margin:0px;",
                            layout:'fit',
                            items:[
								{
									xtype:'grid',
									ddGroup:'firstGridDDGroup',
									enableDragDrop   : true,
        							stripeRows       : true,
									store:store2,
									layout       : 'hbox',
									defaults     : { flex : 1 }, //auto stretch
									id:xim.estadistica.recibo_nuevo.id+'_grid_recibo_abajo',
									columns:[
										new Ext.grid.RowNumberer(),
										{header:'Nro Cuota',dataIndex:'nro_cuota_cli',width:80},
										{header:'Cod. Prest',dataIndex:'cod_credito_cli',width:70},
										{header:'Valor Cuota',dataIndex:'cuota_total',width:65},
										{header:'Abonado',dataIndex:'abonado',width:80},
										{header:'Interés',dataIndex:'interes_periodico',width:80},
										{header:'Mora',dataIndex:'mora',width:60},
										{header:'Capital',dataIndex:'capital_vivo',width:80},
										{header:'Total Cuota',dataIndex:'saldo_cuota',width:80},
										{header:'Estado',dataIndex:'flag',width:80},
										chk_model2],
									bbar: new Ext.PagingToolbar({
										id:'_pager_recibo_abajo',
										store:store2,
										displayInfo:true,										
										displayMsg:'{0} - {1} de {2} Recibos.',
										emptyMsg:'Lisado de Recibos a Cobrar',
										pageSize:80,
										items: ['',clock]
									}),
									sm:chk_model2,
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
                            columns:17
                            },
                            items:[
                                {
                                    xtype:'label',
                                    text:'Importe:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:10
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.recibo_nuevo.id+'_txt_importe',
                                        autoCreate: {tag: 'input', type: 'text', size: '18', autocomplete: 'off', maxlength: '1000'},
                                        readOnly:true,
                                        anchor:'99%',
                                        enableKeyEvents:true,
                                        selectOnFocus:true,
                                        value:<?php if(!empty($importe)){echo $importe;}else{echo 0;}?>,
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
                                    xtype:'label',
                                    text:'Mora:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:12
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.recibo_nuevo.id+'_txt_mora',
                                        autoCreate: {tag: 'input', type: 'text', size: '18', autocomplete: 'off', maxlength: '1000'},
                                        readOnly:true,
                                        anchor:'99%',
                                        enableKeyEvents:true,
                                        selectOnFocus:true,
                                        value:<?php if(!empty($mora)){echo $mora;}else{echo 0;}?>,
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
                                    xtype:'label',
                                    text:'A Cobrar:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:12
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.recibo_nuevo.id+'_txt_cobrar',
                                        autoCreate: {tag: 'input', type: 'text', size: '18', autocomplete: 'off', maxlength: '1000'},
                                        readOnly:true,
                                        anchor:'99%',
                                        enableKeyEvents:true,
                                        selectOnFocus:true,
                                        value:<?php if(!empty($cobro)){echo $cobro;}else{echo 0;}?>,
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
                                    xtype:'label',
                                    text:'Recibido:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:12
                                },
                                {
                                        xtype:'spinnerfield',
                                        id:xim.estadistica.recibo_nuevo.id+'_txt_recibido',
                                        width:120,
										name: 'test',
										minValue: 0,
										//maxValue: 100,
										allowDecimals: true,
										decimalPrecision: 2,
										incrementValue: 1,
										value:<?php if(!empty($recibido)){echo $recibido;}else{echo 0;}?>,
										alternateIncrementValue: 3.10,
										accelerate: true,
										enableKeyEvents:true,
										listeners:{
												keypress:function(obj,e){
														setTimeout('xim.estadistica.recibo_nuevo.valida_cobro()',100);
												},
												'spin':{//spinUp-spinDown
													fn:function(){
														setTimeout('xim.estadistica.recibo_nuevo.valida_cobro()',100);
													}											
												}
										}
                                }
                            ]
                           }
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
                                handler:this.imprimir_recibo
                            },
                            {
                                text : "Grabar",
                                iconCls:'guardar',
                                scope : this,
                                handler:this.grabar_recibos
                            },
                            {
                                text : "Editar",
                                iconCls:'editar',
								hidden:true,
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
					/****
					* Setup Drop Targets
					***/
					// This will make sure we only drop to the  view scroller element
					var firstGridDropTargetEl =  Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_grid_recibo_arriba').getView().scroller.dom;
					var firstGridDropTarget = new Ext.dd.DropTarget(firstGridDropTargetEl, {
							ddGroup    : 'firstGridDDGroup',
							notifyDrop : function(ddSource, e, data){
							var rec = Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_grid_recibo_abajo').getSelectionModel().getSelected();
							var importe = Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_importe').getValue();
							if(importe!=''){
								importe = xim.estadistica.recibo_nuevo.redondear(parseFloat(importe) - parseFloat(rec.get('cuota_total')));
							}
							Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_importe').setValue(importe);
							
							var mora = Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_mora').getValue();
							if(mora!=''){
								mora = xim.estadistica.recibo_nuevo.redondear(parseFloat(mora) - parseFloat(rec.get('mora')));
							}
							Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_mora').setValue(mora);
							
							var datos = Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_cobrar').getValue();
							cobrar = xim.estadistica.recibo_nuevo.redondear(parseFloat(importe) + parseFloat(mora));
							datos = parseFloat(datos)  - parseFloat(cobrar);
							Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_cobrar').setValue(cobrar);
							
									var records =  ddSource.dragData.selections;
									Ext.each(records, ddSource.grid.store.remove, ddSource.grid.store);
									Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_grid_recibo_arriba').store.add(records);
									Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_grid_recibo_arriba').store.sort('name', 'ASC');
									return true;
							}
					});						
					// This will make sure we only drop to the view scroller element
					var secondGridDropTargetEl = Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_grid_recibo_abajo').getView().scroller.dom;
					var secondGridDropTarget = new Ext.dd.DropTarget(secondGridDropTargetEl, {
							ddGroup    : 'secondGridDDGroup',
							notifyDrop : function(ddSource, e, data){	
							/*'nro_cuota','cod_credito','nro_cuota_cli','cod_credito_cli','fecha_cuota','cuota_total','interes_periodico','amortizacion','capital_vivo','mora','cuota_total','fecha_vence','flag'*/
							var rec = Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_grid_recibo_arriba').getSelectionModel().getSelected();
							
							var importe = Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_importe').getValue();
							if(importe==''){
								importe = xim.estadistica.recibo_nuevo.redondear(parseFloat(0.00) + parseFloat(rec.get('cuota_total')));
							}else{
								importe = xim.estadistica.recibo_nuevo.redondear(parseFloat(importe) + parseFloat(rec.get('cuota_total')));
							}
							Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_importe').setValue(importe);
							
							var mora = Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_mora').getValue();
							if(mora==''){
								mora = xim.estadistica.recibo_nuevo.redondear(parseFloat(0.00) + parseFloat(rec.get('mora')));
							}else{
								mora = xim.estadistica.recibo_nuevo.redondear(parseFloat(mora) + parseFloat(rec.get('mora')));
							}
							Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_mora').setValue(mora);							
							
							cobrar = xim.estadistica.recibo_nuevo.redondear(parseFloat(importe) + parseFloat(mora));
							Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_cobrar').setValue(cobrar);
							
									var records =  ddSource.dragData.selections;
									Ext.each(records, ddSource.grid.store.remove, ddSource.grid.store);
									Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_grid_recibo_abajo').store.add(records);
									Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_grid_recibo_abajo').store.sort('name', 'ASC');												
									return true;
							}
					});
                },
                clos:function(){
                    ximx.close('ESTADISTICA_RECIBO_NUEVO');
                },
				select_cli:function(){
					var rec = Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_grid_clientes').getSelectionModel().getSelected();
					Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_cod_cli').setValue(rec.get('cod_cli'));
					Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_nombres').setValue(rec.get('nombres'));					
					//Ext.getCmp(xim.estadistica.credito_nuevo.id+'_txt_limite_cred').setValue(rec.get('limite_credito'));
					Ext.getCmp(xim.estadistica.recibo_nuevo.id+'win_clientes').close();
					Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_grid_recibo_arriba').getStore().removeAll();
					Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_grid_recibo_abajo').getStore().removeAll();
					Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_importe').setValue(0.00);
					Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_mora').setValue(0.00);
					Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_cobrar').setValue(0.00);
					Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_recibido').setValue(0.00);
					Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_codigo').setValue('');
				},
				rastrear_saldos:function(){
					var cod_cli = Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_cod_cli').getValue();
					if(cod_cli==''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Seleccione un cliente para rastrear saldos por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_grid_recibo_arriba').getStore().reload({
						params:{
							op:'get_cuotas',cod_cli:cod_cli
						},
						callback:function(){
						Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_grid_recibo_abajo').getStore().removeAll();
						Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_importe').setValue(0.00);
						Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_mora').setValue(0.00);
						Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_cobrar').setValue(0.00);
						Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_recibido').setValue(0.00);
						}
					});			
				},
				grabar_recibos:function(){
							var cod_det_credito = new Array();
							var mora = new Array();
							var i=0;
							var estado=1;
							Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_grid_recibo_abajo').getStore().each(function(record){
								cod_det_credito[i]=record.get('cod_det_credito');
								mora[i] = record.get('mora');//alert(record.get('flag_x'));
								if(parseInt(record.get('flag_x'))==0){estado=0;}
								i++;
							});
							/*if(parseInt(estado)==1){
								Ext.Msg.show({
									title: 'MAC',
									msg: 'No existe cuotas por cobrar pendientes, arrastre cuotas pendientes para cobrar por favor!',
									buttons: Ext.Msg.OK,
									icon: Ext.Msg.WARNING
								});
								return;
							}*/
							var recibido = Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_recibido').getValue();
							var cobrar = Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_cobrar').getValue();
							var total_mora = Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_mora').getValue();
							var importe =Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_importe').getValue();
							var cod_recibo =Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_codigo').getValue();
							var fecha =Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_fecha').getValue();
							var cod_cli =Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_cod_cli').getValue();
							var cod_cobra = xim.estadistica.recibo_nuevo.cod_cobra;
							if(cod_cli==''){
								Ext.Msg.show({
									title: 'MAC',
									msg: 'No a seleccionado ningun cliente!',
									buttons: Ext.Msg.OK,
									icon: Ext.Msg.WARNING
								});
								return;
							}
							if(recibido==''){
								Ext.Msg.show({
									title: 'MAC',
									msg: 'No a ingresado el monto recibido!',
									buttons: Ext.Msg.OK,
									icon: Ext.Msg.WARNING
								});
								return;
							}
							if(recibido!=cobrar){
								Ext.Msg.show({
									title: 'MAC',
									msg: 'El monto recibido no es igual monto a cobrar!',
									buttons: Ext.Msg.OK,
									icon: Ext.Msg.WARNING
								});
								return;
							}
							if(cobrar==''){
								Ext.Msg.show({
									title: 'MAC',
									msg: 'El monto a cobrar es igual o menor a cero!',
									buttons: Ext.Msg.OK,
									icon: Ext.Msg.WARNING
								});
								return;
							}
							if(cod_cobra==''){
								Ext.Msg.show({
									title: 'MAC',
									msg: 'Ingrese un cobrador por favor!',
									buttons: Ext.Msg.OK,
									icon: Ext.Msg.WARNING
								});
								return;
							}
							if(cod_cobra==0){
								Ext.Msg.show({
									title: 'MAC',
									msg: 'Ingrese un cobrador por favor!',
									buttons: Ext.Msg.OK,
									icon: Ext.Msg.WARNING
								});
								return;
							}
							if(!confirm('Desea generar el Recibo?')){return;}
							
							Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_ventana_recibo').el.mask('Cargando...', 'x-mask-loading');	
							
							var data='op=grabar_update_recibo&cod_det_credito='+cod_det_credito+'&recibido='+recibido+'&cobrar='+cobrar+'&total_mora='+total_mora+'&importe='+importe+'&cod_recibo='+cod_recibo+'&fecha='+fecha+'&cod_cli='+cod_cli+'&mora='+mora+'&cod_cobrador='+cod_cobra;
							Ext.Ajax.request({
								url:xim.estadistica.recibo_nuevo.url,
								params:data,
								success:function(response,options){
									Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_ventana_recibo').el.unmask();
									var msg = Ext.decode(response.responseText);
										if(parseInt(msg['est'])==1){
											Ext.Msg.show({
												title: 'MAC',
												msg: 'El proceso termino correctamente!',
												buttons: Ext.Msg.OK, 
												icon: Ext.Msg.INFO
											});		
											Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_codigo').setValue(msg['cod_recibo']);
											Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_grid_recibo_abajo').getStore().reload({
													params:{
														op:'get_cuotas_cobradas',cod_cli:cod_cli,cod_recibo:msg['cod_recibo']<?php //echo $paramer_cobrado;?>
													}
												});		
											Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_grid_recibo_arriba').getStore().reload({
													params:{
														op:'get_cuotas',cod_cli:cod_cli, <?php //echo $paramer;?>
													}
												});	
												Ext.getCmp(xim.estadistica.recibos+'_grid_recibos').getStore().reload({
													params:{
														op:'grid_recibos'
													}
												});			
											//Ext.getCmp('Div_ESTADISTICA_CREDITO_NUEVO').close();		
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
				saber_array:function(){
					Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_grid_recibo_abajo').getStore().each(function(record){
						alert(record.get('nro_cuota'));
					});
					
				},
				redondear:function(valor){
					return Math.round(valor*100)/100;
				},
				valida_cobro:function(){
					var recibido = Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_recibido').getValue();
					var cobrar = Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_cobrar').getValue();
					if(recibido>cobrar){
						Ext.Msg.show({
							title: 'MAC',
							msg: 'El monto recibido supera el monto a cobrar, se igualaran los montos!',
							buttons: Ext.Msg.OK,
							icon: Ext.Msg.WARNING
						});
						Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_recibido').setValue(cobrar);
					}
				},
				imprimir_recibo:function(){
					var cod_cli= Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_cod_cli').getValue();
					var cod_credito= xim.estadistica.recibo_nuevo.cod_credito;
					var cod_recibo= Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_codigo').getValue();
					if(cod_recibo==''){
						Ext.Msg.show({
							title: 'MAC',
							msg: 'Para imprimir el recibo primero debe guardar los cambios!',
							buttons: Ext.Msg.OK, 
							icon: Ext.Msg.WARNING
						});		
						return;
					}
					var file= 'modulos/recibos/reportes/imprime_recibo.php';
					var param='cod_cli='+cod_cli+'&cod_credito='+cod_credito+'&cod_recibo='+cod_recibo;
					var win = new Ext.Window({ 
					title: 'Reporte de Recibo',
					id:'win_reportes',
					width: 700,
					modal:true,
					//layout:'fit',
					height:500,
					html:"<iframe src='"+file+"?"+param+"' onload='xim.estadistica.recibo_nuevo.cargador()' width='100%' height='435px' style='border:0px' more attributes></iframe>",
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
				},
				select_cobrador:function(){
					var rec = Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_grid_cobradores').getSelectionModel().getSelected();
					if(rec==undefined){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Seleccione un cobrador por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}						
					xim.estadistica.recibo_nuevo.cod_cobra = rec.get('cod_cobra');
					Ext.getCmp(xim.estadistica.recibo_nuevo.id+'_txt_cobrador').setValue(rec.get('nombres'));
					Ext.getCmp(xim.estadistica.recibo_nuevo.id+'win_cobradores').close();
				}
            }
            Ext.onReady(xim.estadistica.recibo_nuevo.init,xim.estadistica.recibo_nuevo);

        </script>
    </body>
</html>