<script type="text/javascript">
	var tab = Ext.getCmp(inicio.id+'-tabContent');
	if(!Ext.getCmp('centro_trabajo-tab')){
		var centro_trabajo = {
			id:'centro_trabajo',
			id_menu:'<?php echo $p["id_menu"];?>',
			url:'/gestion/centroTrabajo/',
			opcion:'I',
			id_per:'<?php echo $p["id_per"];?>',
			rollback:'<?php echo $p["rollback"];?>',
			paramsStore:{},
			back:'NONE',
			init:function(){
				Ext.tip.QuickTipManager.init();

				centro_trabajo.store_ubigeo = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'cod_ubi', type: 'string'},
	                    {name: 'Distrito', type: 'string'},
	                    {name: 'Provincia', type: 'string'},
	                    {name: 'Departamento', type: 'string'},                    
	                    {name: 'Poblacion', type: 'string'},
	                    {name: 'Superficie', type: 'string'},
	                    {name: 'Y', type: 'string'},
	                    {name: 'X', type: 'string'}
	                ],
	                autoLoad:false,
	                proxy:{
	                    type: 'ajax',
	                    url: centro_trabajo.url+'get_list_ubigeo/',
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

	            centro_trabajo.store_ubigeo2 = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'cod_ubi', type: 'string'},
	                    {name: 'Distrito', type: 'string'},
	                    {name: 'Provincia', type: 'string'},
	                    {name: 'Departamento', type: 'string'},                    
	                    {name: 'Poblacion', type: 'string'},
	                    {name: 'Superficie', type: 'string'},
	                    {name: 'Y', type: 'string'},
	                    {name: 'X', type: 'string'}
	                ],
	                autoLoad:false,
	                proxy:{
	                    type: 'ajax',
	                    url: centro_trabajo.url+'get_list_ubigeo/',
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

	            centro_trabajo.store_ubigeo3 = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'cod_ubi', type: 'string'},
	                    {name: 'Distrito', type: 'string'},
	                    {name: 'Provincia', type: 'string'},
	                    {name: 'Departamento', type: 'string'},                    
	                    {name: 'Poblacion', type: 'string'},
	                    {name: 'Superficie', type: 'string'},
	                    {name: 'Y', type: 'string'},
	                    {name: 'X', type: 'string'}
	                ],
	                autoLoad:false,
	                proxy:{
	                    type: 'ajax',
	                    url: centro_trabajo.url+'get_list_ubigeo/',
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
	            
		        var imageTplPointerDirecciones = new Ext.XTemplate(
		            '<tpl for=".">',
		                '<div class="list_grid_as__list_menu_select" >',
		                    '<div class="list_grid_as__list_menu" >',
		                        '<div class="list_grid_as__menu_bx" >',
		                            '<div class="">',
		                                '<img src="/images/icon/{icono}" />',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_as__menu_line" style="width:300px;">',
		                            '<div class="list_grid_as__menu_bar">',
		                                '<div class="list_grid_as__menu_title_A">',
		                                	'<span>Empresa:</span>',
		                                '</div>',
		                                '<div class="list_grid_as__menu_title" >',
		                                    '<span style="font-size:10px;">{nombre}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_as__menu_line" style="width:300px;margin-top: 10px;">',
		                            '<div class="list_grid_as__menu_bar">',
		                                '<div class="list_grid_as__menu_title_A">',
		                                	'<span>Rubro:</span>',
		                                '</div>',
		                                '<div class="list_grid_as__menu_title" >',
		                                    '<span style="font-size:10px;">{rubro}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_as__menu_line" style="width:300px;margin-top: 10px;">',
		                            '<div class="list_grid_as__menu_bar">',
		                                '<div class="list_grid_as__menu_title_A">',
		                                	'<span>Telefono:</span>',
		                                '</div>',
		                                '<div class="list_grid_as__menu_title" >',
		                                    '<span style="font-size:10px;">{telefono} </span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_as__menu_line" style="width:300px; display: inline-flex;margin-top: 10px;">',
		                            '<div class="list_grid_as__menu_bar">',
		                                '<div class="list_grid_as__menu_title_A">',
		                                	'<span>Dirección:</span>',
		                                '</div>',
		                                '<div class="list_grid_as__menu_title" >',
		                                    '<span style="font-size:10px;">{dir_direccion} N°:{dir_numero} Mz:{dir_mz} Lt:{dir_lt} Dpto:{dir_dpto} Int:{dir_interior}</span>',
		                                    '<span style="font-size:10px;">Urb:{dir_urb} Ref:{dir_referencia} </span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                        /*'<div class="list_grid_as__menu_line" style="width:10px;">',
		                            '<div class="list_grid_as__menu_bar">',
		                                
		                                '<div class="list_grid_as__menu_title">',
		                                    '<img src="/images/icon/Trash.png" onClick="centro_trabajo.setDeleteDir({id_dir});"/>',
		                                '</div>',
		                            '</div>',
		                        '</div>',*/
		                    '</div>',
		                '</div>',
		            '</tpl>'
		        );
		        

		        var store_direcciones = Ext.create('Ext.data.Store',{
		            fields: [
		            	{name: 'id_empresa', type: 'string'},
		                {name: 'nombre', type: 'string'},
		                {name: 'rubro', type: 'string'},
		                {name: 'telefono', type: 'string'},
		                {name: 'ruc', type: 'string'},
		                {name: 'img', type: 'string'},
		                {name: 'id_dir', type: 'string'},
		                {name: 'dir_direccion', type: 'string'},
		                {name: 'dir_numero', type: 'string'},
		                {name: 'dir_mz', type: 'string'},
		                {name: 'dir_lt', type: 'string'},
		                {name: 'dir_dpto', type: 'string'},
		                {name: 'dir_interior', type: 'string'},
		                {name: 'dir_urb', type: 'string'},
		                {name: 'dir_referencia', type: 'string'},
		                {name: 'cod_ubi', type: 'string'},
		                {name: 'flag', type: 'string'}
		            ],
		            autoLoad:false, 
		            proxy:{
		                type: 'ajax',
		                url: centro_trabajo.url+'getListEmpresa/',
		                reader:{
		                    type: 'json',
		                    rootProperty: 'data'
		                },
		                extraParams:{vp_op:'P',vp_id:0,vp_nombre:''}
		            },
		            listeners:{
		                load: function(obj, records, successful, opts){
		                    console.log(records);
		                    //document.getElementById("menu_spinner").innerHTML = "";
		                }
		            }
		        });


                Ext.create('Ext.window.Window',{
	                id:centro_trabajo.id+'-win-form',
	                plain: true,
	                title:'Empresa',
	                icon: '/images/icon/user_gray.png',
	                height: 580,
	                width: 700,
	                resizable:false,
	                modal: true,
	                border:false,
	                closable:true,
	                padding:5,
	                layout:'border',
	                items:[
	                	{
	                		region:'center',
	                		//width:350,
	                		//border:false,
	                		layout:'border',
	                		bodyStyle: 'background: transparent',
	                		items:[
	                			{
	                				region:'center',
	                				layout:'border',
	                				bodyStyle: 'background: transparent',
	                				border:false,
	                				items:[
	                					{
	                						//title:'Datos Empresa',
	                						region:'north',
	                						bodyStyle: 'background: transparent',
	                						height:130,
	                						border:false,
	                						items:[
	                							{
													layout:'hbox',
													bodyStyle: 'background: transparent',
													padding:'5px 5px 5px 5px',
													border:false,
													items:[
														{
								                            xtype: 'textfield',	
								                            fieldLabel: 'IDempresa',
								                            id:centro_trabajo.id+'-sol-txt-id-empresa',
								                            hidden:true,
								                            bodyStyle: 'background: transparent',
										                    //padding:'15px 5px 5px 25px',
								                            //id:centro_trabajo.id+'-txt-dni',
								                            labelWidth:50,
								                            //readOnly:true,
								                            labelAlign:'top',
								                            //width:120,
								                            //height:60,
								                            labelStyle: "font-size:17px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold',
								                            value:'0',
								                            //anchor:'100%',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                }
								                            }
								                        },
			                							{
								                            xtype: 'textfield',	
								                            id:centro_trabajo.id+'-sol-txt-nombre-empresa',
								                            fieldLabel: 'Nombre',
								                            bodyStyle: 'background: transparent',
										                    padding:'5px 5px 5px 5px',
								                            //id:centro_trabajo.id+'-txt-dni',
								                            labelWidth:55,
								                            //readOnly:true,
								                            //labelAlign:'top',
								                            //width:'50%',
								                            flex:1,
								                            //height:40,
								                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
								                            value:'',
								                            //anchor:'100%',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                }
								                            }
								                        }
								                    ]
								                },
								                {
													layout:'hbox',
													bodyStyle: 'background: transparent',
													padding:'5px 5px 5px 5px',
													border:false,
													items:[
								                        {
								                            xtype: 'textfield',	
								                            id:centro_trabajo.id+'-sol-txt-rubro-empresa',
								                            fieldLabel: 'Rubro',
								                            bodyStyle: 'background: transparent',
										                    padding:'5px 5px 5px 5px',
								                            //id:centro_trabajo.id+'-txt-dni',
								                            labelWidth:55,
								                            //readOnly:true,
								                            //labelAlign:'top',
								                            //width:'50%',
								                            flex:1,
								                            //height:40,
								                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
								                            value:'',
								                            //anchor:'100%',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                }
								                            }
								                        }
								                    ]
								                },
								                {
													layout:'hbox',
													bodyStyle: 'background: transparent',
													padding:'5px 5px 5px 5px',
													border:false,
													items:[
								                        {
								                            xtype: 'textfield',	
								                            id:centro_trabajo.id+'-sol-txt-telf-empresa',
								                            fieldLabel: 'Teléfonos',
								                            bodyStyle: 'background: transparent',
										                    padding:'5px 5px 5px 5px',
								                            //id:centro_trabajo.id+'-txt-dni',
								                            labelWidth:55,
								                            //readOnly:true,
								                            //labelAlign:'top',
								                            width:'70%',
								                            //flex:1,
								                            //height:40,
								                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
								                            value:'',
								                            //anchor:'100%',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                }
								                            }
								                        }
								                    ]
								                }
	                						]
	                					},
	                					{
	                						title:'Dirección',
	                						bodyStyle: 'background: transparent',
	                						region:'center',
	                						border:false,
	                						items:[
	                							{
													xtype:'panel',
													bodyStyle: 'background: transparent',
													//title:'Registro',
													border:false,
													items:[
														{
								                            xtype: 'textfield',	
								                            fieldLabel: 'IDdir',
								                            id:centro_trabajo.id+'-sol-txt-id-dir',
								                            hidden:true,
								                            bodyStyle: 'background: transparent',
										                    //padding:'15px 5px 5px 25px',
								                            //id:centro_trabajo.id+'-txt-dni',
								                            labelWidth:50,
								                            //readOnly:true,
								                            labelAlign:'top',
								                            //width:120,
								                            //height:60,
								                            labelStyle: "font-size:17px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:25px; text-align: center; font-weight: bold',
								                            value:'0',
								                            //anchor:'100%',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                }
								                            }
								                        },
										                {
								                            xtype: 'textfield',
								                            fieldLabel: 'Avenida/Calle/Jirón/Pasaje',
								                            id:centro_trabajo.id+'-sol-txt-dir-direccion',
								                            bodyStyle: 'background: transparent',
										                    padding:'5px 10px 5px 5px',
								                            //id:centro_trabajo.id+'-txt-dni',
								                            labelWidth:50,
								                            //readOnly:true,
								                            labelAlign:'top',
								                            width:'92%',
								                            flex:1,
								                            height:40,
								                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
								                            value:'',
								                            //anchor:'100%',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                },
								                                change: function(field, newValue, oldValue){
										                            field.setValue(newValue.toUpperCase());
										                        }
								                            }
								                        },
														{
															layout:'hbox',
															bodyStyle: 'background: transparent',
															padding:'5px 5px 5px 5px',
															border:false,
															items:[
										                        {
										                            xtype: 'textfield',
										                            id:centro_trabajo.id+'-sol-txt-dir-numero',
										                            fieldLabel: 'N°',
										                            bodyStyle: 'background: transparent',
												                    padding:'5px 10px 5px 5px',
										                            //id:centro_trabajo.id+'-txt-dni',
										                            labelWidth:50,
										                            //readOnly:true,
										                            labelAlign:'top',
										                            width:50,
										                            //flex:1,
										                            height:40,
										                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
										                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
										                            value:'',
										                            //anchor:'100%',
										                            listeners:{
										                                afterrender:function(obj, e){
										                                },
										                                change: function(field, newValue, oldValue){
												                            field.setValue(newValue.toUpperCase());
												                        }
										                            }
										                        },
										                        {
										                            xtype: 'textfield',
										                            id:centro_trabajo.id+'-sol-txt-dir-mz',
										                            fieldLabel: 'MZ',
										                            bodyStyle: 'background: transparent',
												                    padding:'5px 10px 5px 5px',
										                            //id:centro_trabajo.id+'-txt-dni',
										                            labelWidth:50,
										                            //readOnly:true,
										                            labelAlign:'top',
										                            width:50,
										                            //flex:1,
										                            height:40,
										                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
										                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
										                            value:'',
										                            //anchor:'100%',
										                            listeners:{
										                                afterrender:function(obj, e){
										                                },
										                                change: function(field, newValue, oldValue){
												                            field.setValue(newValue.toUpperCase());
												                        }
										                            }
										                        },
										                        {
										                            xtype: 'textfield',
										                            id:centro_trabajo.id+'-sol-txt-dir-lt',
										                            fieldLabel: 'LT',
										                            bodyStyle: 'background: transparent',
												                    padding:'5px 10px 5px 5px',
										                            //id:centro_trabajo.id+'-txt-dni',
										                            labelWidth:50,
										                            //readOnly:true,
										                            labelAlign:'top',
										                            width:50,
										                            //flex:1,
										                            height:40,
										                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
										                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
										                            value:'',
										                            //anchor:'100%',
										                            listeners:{
										                                afterrender:function(obj, e){
										                                },
										                                change: function(field, newValue, oldValue){
												                            field.setValue(newValue.toUpperCase());
												                        }
										                            }
										                        },
										                        {
										                            xtype: 'textfield',
										                            id:centro_trabajo.id+'-sol-txt-dir-dpto',
										                            fieldLabel: 'DPTO',
										                            bodyStyle: 'background: transparent',
												                    padding:'5px 10px 5px 5px',
										                            //id:centro_trabajo.id+'-txt-dni',
										                            labelWidth:50,
										                            //readOnly:true,
										                            labelAlign:'top',
										                            width:50,
										                            //flex:1,
										                            height:40,
										                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
										                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
										                            value:'',
										                            //anchor:'100%',
										                            listeners:{
										                                afterrender:function(obj, e){
										                                },
										                                change: function(field, newValue, oldValue){
												                            field.setValue(newValue.toUpperCase());
												                        }
										                            }
										                        },
																{
										                            xtype: 'textfield',
										                            id:centro_trabajo.id+'-sol-txt-dir-interior',
										                            fieldLabel: 'INT.',
										                            bodyStyle: 'background: transparent',
												                    padding:'5px 10px 5px 5px',
										                            //id:centro_trabajo.id+'-txt-dni',
										                            labelWidth:50,
										                            //readOnly:true,
										                            labelAlign:'top',
										                            width:50,
										                            //flex:1,
										                            height:40,
										                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
										                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
										                            value:'',
										                            //anchor:'100%',
										                            listeners:{
										                                afterrender:function(obj, e){
										                                },
										                                change: function(field, newValue, oldValue){
												                            field.setValue(newValue.toUpperCase());
												                        }
										                            }
										                        }
										                    ]
										                },
										                {
															layout:'hbox',
															bodyStyle: 'background: transparent',
															padding:'5px 5px 5px 5px',
															border:false,
															items:[
												                {
										                            xtype: 'textfield',
										                            id:centro_trabajo.id+'-sol-txt-dir-urb',
										                            fieldLabel: 'Urbanización/AA.HH/PJ/ASOC',
										                            bodyStyle: 'background: transparent',
												                    padding:'5px 10px 5px 5px',
										                            //id:centro_trabajo.id+'-txt-dni',
										                            labelWidth:50,
										                            //readOnly:true,
										                            labelAlign:'top',
										                            //width:'100%',
										                            flex:1,
										                            height:40,
										                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
										                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
										                            value:'',
										                            //anchor:'100%',
										                            listeners:{
										                                afterrender:function(obj, e){
										                                },
										                                change: function(field, newValue, oldValue){
												                            field.setValue(newValue.toUpperCase());
												                        }
										                            }
										                        }
										                    ]
										                },
								                        {
								                            xtype: 'textfield',
								                            id:centro_trabajo.id+'-sol-txt-dir-referencia',
								                            fieldLabel: 'Referencia',
								                            bodyStyle: 'background: transparent',
										                    padding:'5px 5px 5px 10px',
								                            //id:centro_trabajo.id+'-txt-dni',
								                            labelWidth:55,
								                            //readOnly:true,
								                            labelAlign:'top',
								                            width:'92%',
								                            flex:1,
								                            height:40,
								                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
								                            value:'',
								                            //anchor:'100%',
								                            listeners:{
								                                afterrender:function(obj, e){
								                                },
								                                change: function(field, newValue, oldValue){
										                            field.setValue(newValue.toUpperCase());
										                        }
								                            }
								                        },
										                {
				                                            xtype:'combo',
				                                            fieldLabel: 'Departamento',
				                                            id:centro_trabajo.id+'-sol-cmb-departamento',
				                                            store: centro_trabajo.store_ubigeo,
				                                            queryMode: 'local',
				                                            triggerAction: 'all',
				                                            valueField: 'cod_ubi',
				                                            displayField: 'Departamento',
				                                            emptyText: '[Seleccione]',
				                                            labelAlign:'right',
				                                            //allowBlank: false,
				                                            //labelAlign:'top',
								                            width:'92%',
								                            labelWidth:75,
								                            flex:1,
								                            //height:40,
								                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
				                                            anchor:'100%',
				                                            padding:'5px 5px 5px 10px',
				                                            //readOnly: true,
				                                            listeners:{
				                                                afterrender:function(obj, e){
				                                        			/*Ext.getCmp(centro_trabajo.id+'-sol-cmb-provincia').getStore().removeAll();
				                                        			Ext.getCmp(centro_trabajo.id+'-sol-cmb-Distrito').getStore().removeAll();
				                                                	centro_trabajo.getUbigeo({VP_OP:'D',VP_VALUE:''},obj,'100101');*/
				                                                },
				                                                select:function(obj, records, eOpts){
				                                        			var pro = Ext.getCmp(centro_trabajo.id+'-sol-cmb-provincia');
				                                        			Ext.getCmp(centro_trabajo.id+'-sol-cmb-provincia').setValue('');
				                                        			Ext.getCmp(centro_trabajo.id+'-sol-cmb-Distrito').getStore().removeAll();
				                                        			Ext.getCmp(centro_trabajo.id+'-sol-cmb-Distrito').setValue('');
				                                                	centro_trabajo.getUbigeo({VP_OP:'P',VP_VALUE:obj.getValue()},pro,'');
				                                                }
				                                            }
				                                        },
				                                        {
				                                            xtype:'combo',
				                                            fieldLabel: 'Provincia',
				                                            id:centro_trabajo.id+'-sol-cmb-provincia',
				                                            store: centro_trabajo.store_ubigeo2,
				                                            queryMode: 'local',
				                                            triggerAction: 'all',
				                                            valueField: 'cod_ubi',
				                                            displayField: 'Provincia',
				                                            emptyText: '[Seleccione]',
				                                            labelAlign:'right',
				                                            //allowBlank: false,
				                                            //labelAlign:'top',
								                            width:'92%',
								                            labelWidth:75,
								                            flex:1,
								                            //height:40,
								                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
				                                            anchor:'100%',
				                                            padding:'5px 5px 5px 10px',
				                                            //readOnly: true,
				                                            listeners:{
				                                                afterrender:function(obj, e){
				                                        			/*Ext.getCmp(centro_trabajo.id+'-sol-cmb-Distrito').getStore().removeAll();
				                                                	centro_trabajo.getUbigeo({VP_OP:'P',VP_VALUE:'100101'},obj,'100601');*/
				                                                },
				                                                select:function(obj, records, eOpts){
				                                        			var dis=Ext.getCmp(centro_trabajo.id+'-sol-cmb-Distrito');
				                                                	centro_trabajo.getUbigeo({VP_OP:'X',VP_VALUE:obj.getValue()},dis,'');
				                                                }
				                                            }
				                                        },
				                                        {
				                                            xtype:'combo',
				                                            fieldLabel: 'Distrito',
				                                            id:centro_trabajo.id+'-sol-cmb-Distrito',
				                                            store: centro_trabajo.store_ubigeo3,
				                                            queryMode: 'local',
				                                            triggerAction: 'all',
				                                            valueField: 'cod_ubi',
				                                            displayField: 'Distrito',
				                                            emptyText: '[Seleccione]',
				                                            labelAlign:'right',
				                                            //allowBlank: false,
				                                            //labelAlign:'top',
								                            width:'92%',
								                            labelWidth:75,
								                            flex:1,
								                            //height:40,
								                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
								                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
				                                            anchor:'100%',
				                                            padding:'5px 5px 5px 10px',
				                                            //readOnly: true,
				                                            listeners:{
				                                                afterrender:function(obj, e){
				                                                	//centro_trabajo.getUbigeo({VP_OP:'X',VP_VALUE:'100601'},obj,'100601');
				                                                },
				                                                select:function(obj, records, eOpts){
				                                        
				                                                }
				                                            }
				                                        },
				                                        {
									                        layout:'hbox',
									                        bodyStyle: 'background: transparent',
															padding:'5px 5px 5px 5px',
															height:70,
															border:false,
															items:[
										                        {
											                        xtype:'button',
											                        //margin:'20px 5px 5px 5px',
											                        height:30,
											                        //text: 'Grabar',
											                        icon: '/images/icon/save.png',
											                        listeners:{
											                            beforerender: function(obj, opts){
																		},
											                            click: function(obj, e){
											                            	centro_trabajo.setSaveDireccion();
											                            }
											                        }
											                    },
											                    {
											                        xtype:'button',
											                        height:30,
											                        //margin:'20px 5px 5px 5px',
											                        //text: 'Grabar',
											                        icon: '/images/icon/Document.png',
											                        listeners:{
											                            beforerender: function(obj, opts){
																		},
											                            click: function(obj, e){
											                            	centro_trabajo.setClearDireccion();
											                            }
											                        }
											                    },
											                    {
											                        xtype:'button',
											                        height:30,
											                        //margin:'20px 5px 5px 5px',
											                        //text: 'Grabar',
											                        icon: '/images/icon/Trash.png',
											                        listeners:{
											                            beforerender: function(obj, opts){
																		},
											                            click: function(obj, e){
											                            	centro_trabajo.setDeleteDir();
											                            }
											                        }
											                    }
										                    ]
										                }
													]
												}
	                						]
	                					}
	                				]
	                			},
	                			{
	                				region:'east',
	                				width:350,
	                				border:false,
	                				layout:'fit',
	                				bbar:[
					                	'-',
					                	'Nombre:',
					                	{
				                            xtype: 'textfield',	
				                            id:centro_trabajo.id+'-txt-dni',
				                            //fieldLabel: 'DNI',
				                            bodyStyle: 'background: transparent',
						                    padding:'5px 5px 5px 5px',
				                            //id:centro_trabajo.id+'-txt-dni',
				                            labelWidth:0,
				                            //readOnly:true,
				                            //labelAlign:'top',
				                            width:160,
				                            //height:40,
				                            labelStyle: "font-size:10px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
				                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
				                            value:'',
				                            //anchor:'100%',
				                            listeners:{
				                                afterrender:function(obj, e){
				                                }
				                            }
				                        },
				                        {
					                        xtype:'button',
					                        //height:30,
					                        margin:'5px 5px 5px 5px',
					                        //text: 'Grabar',
					                        icon: '/images/icon/search.png',
					                        listeners:{
					                            beforerender: function(obj, opts){
												},
					                            click: function(obj, e){
					                            	var nombre_empresa = Ext.getCmp(centro_trabajo.id+'-sol-txt-nombre-empresa').getValue();
					                            	var objd = Ext.getCmp(centro_trabajo.id+'-list-direcciones');
													centro_trabajo.getReload(objd,{vp_op:'N',vp_id:0,vp_nombre:nombre_empresa});
					                            }
					                        }
					                    }
					                ],
	                				items:[
	                					{
					                        xtype: 'dataview',
					                        id: centro_trabajo.id+'-list-direcciones',
					                        bodyStyle: 'background: transparent',
					                        bodyCls: 'transparent',
					                        layout:'fit',
					                        store: store_direcciones,
					                        autoScroll: true,
					                        loadMask:true,
					                        autoHeight: false,
					                        tpl: imageTplPointerDirecciones,
					                        multiSelect: false,
					                        singleSelect: false,
					                        loadingText:'Cargando Lista de Direcciones...',
					                        emptyText: '<div class="list_grid_as__list_menu"><div class="list_grid_as__none_data" ></div><div class="list_grid_as__title_clear_data">NO TIENE NINGUNA DIRECCIÓN</div></div>',
					                        itemSelector: 'div.list_grid_as__list_menu_select',
					                        trackOver: true,
					                        overItemCls: 'list_grid_as__list_menu-hover',
					                        listeners: {
					                            'itemdblclick': function(view, record, item, idx, event, opts) {
					                                /*me.idx=idx;
					                                var record = this.getStore().getAt(idx);
					                                var val =record.data;
					                                var menu_class = val.menu_class == null || val.menu_class == '' ? '' : val.menu_class;
					                                if(val.nivel!=0){
					                                    if(me.config_.mode==1){
					                                        win.show({vurl: val.url, id_menu: idx, class: menu_class});//obj.getItemId().split('-')[1]  
					                                    }else{
					                                        var tab=Ext.getCmp(me.config_.tab);
					                                        var active=Ext.getCmp(me.config_.id+val.url);
					                                        tab.setActiveTab(active);
					                                    }
					                                }*/
					                                var record = this.getStore().getAt(idx);
					                                var val =record.data;
					                                centro_trabajo.getDirecciones(val);
					                            }
					                        }
					                    }
	                				]
	                			}
	                		]
	                	}
	                ],/*
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
	                            	centro_trabajo.setSavecentro_trabajo(op);
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
	                                Ext.getCmp(centro_trabajo.id+'-win-form').close();
	                            }
	                        }
	                    },
	                    '-'
	                ],*/
	                listeners:{
	                    'afterrender':function(obj, e){
	                    	/*if(centro_trabajo.id_per!=0){
	                    		centro_trabajo.getcentro_trabajo();
	                    	}else{
	                    		centro_trabajo.getSelectUbi();
	                    	}*/
	                    	centro_trabajo.getSelectUbi();
	                    	var objd = Ext.getCmp(centro_trabajo.id+'-list-direcciones');
							centro_trabajo.getReload(objd,{vp_op:'N',vp_id:0,vp_nombre:''});
	                    },
	                    'close':function(){

	                    }
	                }
	            }).show().center();
			},
			getSelectUbi:function(){
				var obj=Ext.getCmp(centro_trabajo.id+'-sol-cmb-departamento');
				Ext.getCmp(centro_trabajo.id+'-sol-cmb-provincia').getStore().removeAll();
				Ext.getCmp(centro_trabajo.id+'-sol-cmb-Distrito').getStore().removeAll();
				centro_trabajo.getUbigeo({VP_OP:'D',VP_VALUE:''},obj,'100101');
				var objp=Ext.getCmp(centro_trabajo.id+'-sol-cmb-provincia');
				Ext.getCmp(centro_trabajo.id+'-sol-cmb-Distrito').getStore().removeAll();
				centro_trabajo.getUbigeo({VP_OP:'P',VP_VALUE:'100101'},objp,'100601');
				var objd=Ext.getCmp(centro_trabajo.id+'-sol-cmb-Distrito');
				centro_trabajo.getUbigeo({VP_OP:'X',VP_VALUE:'100601'},objd,'100601');
			},
			getDirecciones:function(data){

				Ext.getCmp(centro_trabajo.id+'-sol-txt-id-empresa').setValue(data.id_empresa);
				Ext.getCmp(centro_trabajo.id+'-sol-txt-nombre-empresa').setValue(data.nombre);
				Ext.getCmp(centro_trabajo.id+'-sol-txt-rubro-empresa').setValue(data.rubro);
				Ext.getCmp(centro_trabajo.id+'-sol-txt-telf-empresa').setValue(data.telefono);

				Ext.getCmp(centro_trabajo.id+'-sol-txt-id-dir').setValue(data.id_dir);
				Ext.getCmp(centro_trabajo.id+'-sol-txt-dir-direccion').setValue(data.dir_direccion);
				Ext.getCmp(centro_trabajo.id+'-sol-txt-dir-numero').setValue(data.dir_numero);
				Ext.getCmp(centro_trabajo.id+'-sol-txt-dir-mz').setValue(data.dir_mz);
				Ext.getCmp(centro_trabajo.id+'-sol-txt-dir-lt').setValue(data.dir_lt);
				Ext.getCmp(centro_trabajo.id+'-sol-txt-dir-dpto').setValue(data.dir_dpto);
				Ext.getCmp(centro_trabajo.id+'-sol-txt-dir-interior').setValue(data.dir_interior);
				Ext.getCmp(centro_trabajo.id+'-sol-txt-dir-urb').setValue(data.dir_urb);
				Ext.getCmp(centro_trabajo.id+'-sol-txt-dir-referencia').setValue(data.dir_referencia);

				/*DIRECCIONES*/
				var obj=Ext.getCmp(centro_trabajo.id+'-sol-cmb-departamento');
				Ext.getCmp(centro_trabajo.id+'-sol-cmb-provincia').getStore().removeAll();
				Ext.getCmp(centro_trabajo.id+'-sol-cmb-Distrito').getStore().removeAll();
				centro_trabajo.getUbigeo({VP_OP:'D',VP_VALUE:''},obj,data.cod_ubi_dep); 

				var objp=Ext.getCmp(centro_trabajo.id+'-sol-cmb-provincia');
				Ext.getCmp(centro_trabajo.id+'-sol-cmb-Distrito').getStore().removeAll();
				centro_trabajo.getUbigeo({VP_OP:'P',VP_VALUE:data.cod_ubi_dep},objp,data.cod_ubi_pro);

				var objd=Ext.getCmp(centro_trabajo.id+'-sol-cmb-Distrito');
				centro_trabajo.getUbigeo({VP_OP:'X',VP_VALUE:data.cod_ubi_pro},objd,data.cod_ubi);
			},
			setClearDireccion:function(){
				Ext.getCmp(centro_trabajo.id+'-sol-txt-id-empresa').setValue(0);
				Ext.getCmp(centro_trabajo.id+'-sol-txt-nombre-empresa').setValue('');
				Ext.getCmp(centro_trabajo.id+'-sol-txt-rubro-empresa').setValue('');
				Ext.getCmp(centro_trabajo.id+'-sol-txt-telf-empresa').setValue('');

				Ext.getCmp(centro_trabajo.id+'-sol-txt-id-dir').setValue(0);
				Ext.getCmp(centro_trabajo.id+'-sol-txt-dir-direccion').setValue('');
				Ext.getCmp(centro_trabajo.id+'-sol-txt-dir-numero').setValue('');
				Ext.getCmp(centro_trabajo.id+'-sol-txt-dir-mz').setValue('');
				Ext.getCmp(centro_trabajo.id+'-sol-txt-dir-lt').setValue('');
				Ext.getCmp(centro_trabajo.id+'-sol-txt-dir-dpto').setValue('');
				Ext.getCmp(centro_trabajo.id+'-sol-txt-dir-interior').setValue('');
				Ext.getCmp(centro_trabajo.id+'-sol-txt-dir-urb').setValue('');
				Ext.getCmp(centro_trabajo.id+'-sol-txt-dir-referencia').setValue('');
			},
			setSaveDireccion:function(){

				//var vp_sol_id_cli = Ext.getCmp(centro_trabajo.id+'-sol-txt-id-cli').getValue();
				//var vp_sol_id_per = Ext.getCmp(centro_trabajo.id+'-sol-txt-id-per').getValue();
				var id_empresa = Ext.getCmp(centro_trabajo.id+'-sol-txt-id-empresa').getValue();
				var nombre_empresa = Ext.getCmp(centro_trabajo.id+'-sol-txt-nombre-empresa').getValue();
				var rubro_empresa = Ext.getCmp(centro_trabajo.id+'-sol-txt-rubro-empresa').getValue();
				var telefonos = Ext.getCmp(centro_trabajo.id+'-sol-txt-telf-empresa').getValue();
				
				var vp_sol_id_dir = Ext.getCmp(centro_trabajo.id+'-sol-txt-id-dir').getValue();
				var vp_op = id_empresa==0?'I':'U';
				var sol_dir_direccion = Ext.getCmp(centro_trabajo.id+'-sol-txt-dir-direccion').getValue();
				var sol_dir_numero = Ext.getCmp(centro_trabajo.id+'-sol-txt-dir-numero').getValue();
				var sol_dir_mz = Ext.getCmp(centro_trabajo.id+'-sol-txt-dir-mz').getValue();
				var sol_dir_lt = Ext.getCmp(centro_trabajo.id+'-sol-txt-dir-lt').getValue();
				var sol_dir_dpto = Ext.getCmp(centro_trabajo.id+'-sol-txt-dir-dpto').getValue();
				var sol_dir_interior = Ext.getCmp(centro_trabajo.id+'-sol-txt-dir-interior').getValue();
				var sol_dir_urb = Ext.getCmp(centro_trabajo.id+'-sol-txt-dir-urb').getValue();
				var sol_dir_referencia = Ext.getCmp(centro_trabajo.id+'-sol-txt-dir-referencia').getValue();
				var sol_departamento = Ext.getCmp(centro_trabajo.id+'-sol-cmb-departamento').getValue();
				var sol_provincia = Ext.getCmp(centro_trabajo.id+'-sol-cmb-provincia').getValue();
				var sol_distrito = Ext.getCmp(centro_trabajo.id+'-sol-cmb-Distrito').getValue();


				global.Msg({
                    msg: '¿Seguro de guardar?',
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(centro_trabajo.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:centro_trabajo.url+'setSaveEmpresa/',
			                    params:{
			                    	vp_op:vp_op,
			                    	vp_id_empresa:id_empresa,
			                    	vp_nombre_empresa:nombre_empresa,
			                    	vp_rubro_empresa:rubro_empresa,
			                    	vp_telefonos:telefonos,
			                    	//vp_sol_id_cli:vp_sol_id_cli,
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
									vp_flag:'A'
			                    },
			                    timeout: 30000000,
			                    success: function(response, options){
			                        Ext.getCmp(centro_trabajo.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	//centro_trabajo.getHistory();
			                                	//Ext.getCmp(centro_trabajo.id+'-win-form').close();
			                                	Ext.getCmp(centro_trabajo.id+'-sol-txt-id-empresa').setValue(res.CODIGO);
												Ext.getCmp(centro_trabajo.id+'-sol-txt-id-dir').setValue(res.ID_DIR);
			                                	var objd = Ext.getCmp(centro_trabajo.id+'-list-direcciones');
												centro_trabajo.getReload(objd,{vp_op:'N',vp_id:0,vp_nombre:''});

												var obj = Ext.getCmp(centro_trabajo.id+'-sol-txt-centro-trabajo');
												centro_trabajo.getReload(obj,{vp_op:'N',vp_id:0,vp_nombre:''});
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
			setDeleteDir:function(){
				var id_empresa = Ext.getCmp(centro_trabajo.id+'-sol-txt-id-empresa').getValue(); 
				var vp_sol_id_dir = Ext.getCmp(centro_trabajo.id+'-sol-txt-id-dir').getValue();
				if(id_empresa==0){
					global.Msg({msg:"No es posible Eliminar, seleccione un registro del listado dando doble click.",icon:2,fn:function(){}});
					return false;
				}
				global.Msg({
                    msg: '¿Seguro de Eliminar?',
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(centro_trabajo.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:centro_trabajo.url+'setSaveEmpresa/',
			                    params:{
			                    	vp_op:'D',
			                    	vp_id_empresa:id_empresa,
									vp_sol_id_dir:vp_sol_id_dir
			                    },
			                    timeout: 30000000,
			                    success: function(response, options){
			                        Ext.getCmp(centro_trabajo.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	//centro_trabajo.getHistory();
			                                	//Ext.getCmp(centro_trabajo.id+'-win-form').close();
			                                	var objd = Ext.getCmp(centro_trabajo.id+'-list-direcciones');
												centro_trabajo.getReload(objd,{vp_op:'N',vp_id:0,vp_nombre:''});
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
			getUbigeo:function(json,obj,value){
				console.log(obj);
		    	obj.getStore().removeAll();
				obj.getStore().load(
	                {params: json,
	                callback:function(){
	                	//Ext.getCmp(centro_trabajo.id+'-form').el.unmask();
	                	obj.setValue(value);
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
			setBack:function(){
				var tab=Ext.getCmp(centro_trabajo.id+'-tabContent');
				var active=Ext.getCmp(centro_trabajo.id+centro_trabajo.back);
				tab.setActiveTab(active);
			},
			getcentro_trabajo:function(){
				var vp_op=Ext.getCmp(centro_trabajo.id+'-txt-estado-filter').getValue();
            	var vp_nombre=Ext.getCmp(centro_trabajo.id+'-txt-centro_trabajo').getValue();
		            Ext.getCmp(centro_trabajo.id+'-menu-view').getStore().removeAll();
				Ext.getCmp(centro_trabajo.id+'-menu-view').getStore().load(
	                {params: {vp_op:vp_op,vp_nombre:vp_nombre},
	                callback:function(){
	                	//Ext.getCmp(centro_trabajo.id+'-form').el.unmask();
	                }
	            });
			},
			getClientes:function(vp_id){
				var vp_op=Ext.getCmp(centro_trabajo.id+'-txt-estado-filter').getValue();
            	var vp_nombre=Ext.getCmp(centro_trabajo.id+'-txt-centro_trabajo').getValue();
		        Ext.getCmp(centro_trabajo.id+'-list-clientes').getStore().removeAll();
				Ext.getCmp(centro_trabajo.id+'-list-clientes').getStore().load(
	                {params: {vp_op:vp_op,vp_id:vp_id},
	                callback:function(){
	                	//Ext.getCmp(centro_trabajo.id+'-form').el.unmask();
	                }
	            });
			},
			getEdit:function(index){
				var rec = Ext.getCmp(centro_trabajo.id + '-grid-centro_trabajo').getStore().getAt(index);
				centro_trabajo.setForm('U',rec.data);
			},
			getNew:function(){
				centro_trabajo.setForm('I',{id_centro_trabajo:0,usr_codigo:'',usr_nombre:'',usr_perfil:1,usr_estado:1});
			},
			getUbigeo:function(json,obj,value){
				console.log(obj);
		    	obj.getStore().removeAll();
				obj.getStore().load(
	                {params: json,
	                callback:function(){
	                	//Ext.getCmp(agencias.id+'-form').el.unmask();
	                	obj.setValue(value);
	                }
	            });
			}
		}
		Ext.onReady(centro_trabajo.init,centro_trabajo);
	}else{
		tab.setActiveTab(centro_trabajo.id+'-tab');
	}
</script>