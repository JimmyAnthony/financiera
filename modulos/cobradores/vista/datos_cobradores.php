<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style type="text/css">

        </style>
    </head>
    <body>
        <script type="text/javascript">	
            Ext.ns("xim.estadistica.cobradores");
            xim.estadistica.cobradores = {
                div : 'Div_MANT_COBR',
                url:'modulos/cobradores/capas/control.php',
                id:'xim',
                cod_empresa:'<?php echo $cod_empresa;?>',
				cod_mora:'<?php echo $cod_mora;?>',
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
                        baseParams:{op:'get_grid_cobradores'},
                        root:'data',
                        fields:['cod_cobra','nombres','nombre','apellido','fecha','dni','telefono','flag']
                    }); 
                    
                    this.form = new Ext.form.FormPanel({
                        standardSubmit: true, // traditional submit
                        //url: 'submitform.php',
                        //region		: "center",
                        region:'center',
                        layout:'fit',
                        margins		: "3 3 3 3",
                        //width		: 750,
                        anchor:'99%',
                        store		: this.store,
                        bodyStyle	: "padding: 2px;",
                        //url			: "recursos_humanos/rrhh_valores/capas/control.php",
                        border		: false,
                        defaults	: {allowBlank: false},
                        items		: [							
                           {
                                    xtype:'grid',
                                    store:store,
                                    layout:'fit',
                                    //height:273,
                                    id:xim.estadistica.cobradores+'_grid_personal',
                                    columns:[
                                        new Ext.grid.RowNumberer(),
                                        {header:'DNI',dataIndex:'dni',width:80},
										{header:'Telefono',dataIndex:'telefono',width:70},
                                        {header:'Nombres',dataIndex:'nombres',width:240},
                                        {header:'Estado',dataIndex:'flag',width:80},
                                        chk_model                        ],
                                    bbar: new Ext.PagingToolbar({
                                        id:'_pager',
                                        store:store,
                                        displayInfo:true,
                                        displayMsg:'{0} - {1} de {2} Cobradores.',
                                        emptyMsg:'No hay cobradores en la lista',
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
                                }
                        ]	
                    });
                    var ventana = Ext.getCmp(this.div);
                    ventana.add({                
                        //title	: "LISTADO DE VALORES",
						id:xim.estadistica.cobradores+'ventana_cobradores',
                        layout	: "border",
                        //margins		: "0 0 0 0",
                        /*width	: 600,
                                height	: 400,*/
                        items	: [this.form],
                        listeners:{
                            'render':function(obj){
                                ximx.closep();
                            }
                        }
                        ,buttons:[
                            {
                                text : "Nuevo", 
								id:xim.estadistica.cobradores+'btn_nuevo',
                                iconCls:'nuevo',
								disabled:false,
                                scope : this, 
                                listeners:{
									click:function(a,b){
										xim.estadistica.cobradores.form_cobradores(1);
									}
								}
                            },
                            {
                                text : "Editar", 
                                iconCls:'editar',
								disabled:false,
								id:xim.estadistica.cobradores+'btn_editar',
                                scope : this, 
                                listeners:{
									click:function(a,b){
										xim.estadistica.cobradores.form_cobradores(2);
									}
								}
                            },							 
							{
                                text : "Activar", 
                                iconCls:'activar',
								disabled:false,
								id:xim.estadistica.cobradores+'btn_activar',
                                scope : this, 
                                listeners:{
									click:function(a,b){
										xim.estadistica.cobradores.XimRecorre(0);
									}
								}
                            },
							{
                                text : "Desactivar", 
                                iconCls:'desactivar',
								disabled:false,
								id:xim.estadistica.cobradores+'btn_desactivar',
                                scope : this, 
                                listeners:{
									click:function(a,b){
										xim.estadistica.cobradores.XimRecorre(1);
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
                    ximx.close('MANT_COBR');
                },				
				actulizar_datos:function(){
				var nombre = Ext.getCmp(xim.estadistica.cobradores+'_txt_empresa').getValue();
				var sub_titulo = Ext.getCmp(xim.estadistica.cobradores+'_txt_empresa_sub').getValue();
				var ciudad = Ext.getCmp(xim.estadistica.cobradores+'_txt_empresa_ciudad').getValue();
				var direccion = Ext.getCmp(xim.estadistica.cobradores+'_txt_empresa_direc').getValue();
				var telefono = Ext.getCmp(xim.estadistica.cobradores+'_txt_empresa_telf').getValue();
				var ruc = Ext.getCmp(xim.estadistica.cobradores+'_txt_empresa_ruc').getValue();
				var horario = Ext.getCmp(xim.estadistica.cobradores+'_txt_empresa_horario').getValue();
				var web = Ext.getCmp(xim.estadistica.cobradores+'_txt_empresa_web').getValue();
				var correo = Ext.getCmp(xim.estadistica.cobradores+'_txt_empresa_correo').getValue();
				var interes = Ext.getCmp(xim.estadistica.cobradores+'check_interes').getValue();
				var tasa = Ext.getCmp(xim.estadistica.cobradores+'spiner_tasa').getValue();
				var mora = Ext.getCmp(xim.estadistica.cobradores+'spiner_mora').getValue();
				var vencimiento = Ext.getCmp(xim.estadistica.cobradores+'spiner_vencimiento').getValue();
				interes=(interes)?1:0;
				if(nombre== ''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Ingrese un nombre por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});
            	}				
                if(!confirm('Desea ejecutar el proceso?')){return;}
				Ext.getCmp(xim.estadistica.cobradores+'ventana_cobradores').el.mask('Cargando...', 'x-mask-loading');	
							
                var data = 'op=set_empresa&nombre='+nombre+'&sub_titulo='+sub_titulo+'&ciudad='+ciudad+'&direccion='+direccion+'&telefono='+telefono+'&ruc='+ruc+'&horario='+horario+'&web='+web+'&correo='+correo+'&flag='+interes+'&tasa='+tasa+'&mora='+mora+'&vencimiento='+vencimiento;
                Ext.Ajax.request({
                    url:xim.estadistica.cobradores.url,
                    params:data,
                    success:function(response,options){
                        Ext.getCmp(xim.estadistica.cobradores+'ventana_cobradores').el.unmask();
                        var msg = Ext.decode(response.responseText);
                        if(parseInt(msg['est'])==1){
                            Ext.Msg.show({
                                title: 'MAC',
                                msg: 'El proceso termino correctamente!',
                                buttons: Ext.Msg.OK,
                                icon: Ext.Msg.INFO
                            });
                        }else{//
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
				form_cobradores:function(modo){
					var cod_cobra='';
					var titulo='';
					var dni='';
					var telefono='';
					var apellido='';
					var nombre='';
					if(modo==1){
						titulo = 'Nuevo cobrador';
					}else{
						titulo = 'Edicion del cobrador';
						var ximz = Ext.getCmp(xim.estadistica.cobradores+'_grid_personal').getSelectionModel().getSelections();
						if(ximz.length <= 0){
							Ext.Msg.show({
								title: 'MAC',
								msg: 'Selecciona almenos un Registro!',
								buttons: Ext.Msg.OK,
								icon: Ext.Msg.WARNING
							});
							return;
						}
						cod_cobra = ximz[0].get('cod_cobra');
						nombre = ximz[0].get('nombre');
						apellido = ximz[0].get('apellido');
						telefono = ximz[0].get('telefono');
						dni = ximz[0].get('dni');
					}
					
					var win = new Ext.Window({  
					title: titulo,
					id:'win_cobra',
					width: 300,
					modal:true,
					//layout:'fit',
					height:200,
					items:[
						{
						xtype:'panel',
						border:false,
						bodyStyle	: "padding: 5px;",
						items:[
							{
                            xtype:'panel',
                            //title:'Buscar Por',
                            border:false,
                            bodyStyle	: "padding: 5px;",
                            layout:'table',
                            layoutConfig:{
                            columns:3
                            },
                            items:[
							 	{
                                    xtype:'label',
                                    text:'Dni:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:20
                                },
								{
                                            xtype:'textfield',
                                            id:xim.estadistica.cobradores+'_txt_dni',
                                            width:100,
                                            autoCreate: {tag: 'input', type: 'text', size: '50', autocomplete: 'off', maxlength: '1000'},
                                            //fieldLabel:'Tramite',
                                            enableKeyEvents:true,
                                            selectOnFocus:true,
											value:dni,
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
                                colspan:3,
                                border:false,
                                height:10
                                },
                                {
                                    xtype:'label',
                                    text:'Nombre:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:20
                                },
								{
                                            xtype:'textfield',
                                            id:xim.estadistica.cobradores+'_txt_nombre',
                                            width:184,
                                            autoCreate: {tag: 'input', type: 'text', size: '82', autocomplete: 'off', maxlength: '1000'},
                                            //fieldLabel:'Tramite',
                                            enableKeyEvents:true,
                                            selectOnFocus:true,
											value:nombre,
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
                                colspan:3,
                                border:false,
                                height:10
                                },{
                                    xtype:'label',
                                    text:'Apellidos:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:20
                                },
								{
                                            xtype:'textfield',
                                            id:xim.estadistica.cobradores+'_txt_apellidos',
                                            width:184,
                                            autoCreate: {tag: 'input', type: 'text', size: '82', autocomplete: 'off', maxlength: '1000'},
                                            //fieldLabel:'Tramite',
                                            enableKeyEvents:true,
                                            selectOnFocus:true,
											value:apellido,
                                            //allowBlank:false,
                                            listeners:{
                                                    keypress:function(obj,e){
                                                            if(e.keyCode==13){

                                                            }
                                                    }
                                            }
                                    },{
                                xtype:'panel',
                                colspan:3,
                                border:false,
                                height:10
                                },{
                                    xtype:'label',
                                    text:'Telefono:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:20
                                },
								{
                                            xtype:'textfield',
                                            id:xim.estadistica.cobradores+'_txt_telefono',
                                            width:100,
                                            autoCreate: {tag: 'input', type: 'text', size: '50', autocomplete: 'off', maxlength: '1000'},
                                            //fieldLabel:'Tramite',
                                            enableKeyEvents:true,
                                            selectOnFocus:true,
											value:telefono,
                                            //allowBlank:false,
                                            listeners:{
                                                    keypress:function(obj,e){
                                                            if(e.keyCode==13){

                                                            }
                                                    }
                                            }
                                    }
                            ]
                           }
						]
						}
					],
					buttons:[
						{
							text : "Guadar",
							iconCls:'guardar',
							scope : this,
							listeners:{
								click:function(obj, e){
									xim.estadistica.cobradores.actualizar_cobrador(modo,cod_cobra);
								}
							}
						},
						{
							text : "Salir",
							scope : this,
							listeners:{
								click:function(obj, e){
									Ext.getCmp('win_cobra').close();
								}
							},
							iconCls:'salir'
						}
					]//botones del formulario
					});  					 
					win.show();
					if(parseInt(modo)==1)return;
					/*Ext.getCmp('win_dias_habiles').el.mask('Cargando...', 'x-mask-loading');								
					var data = 'op=get_dias_no_habiles&cod_dia='+cod_dia;
					Ext.Ajax.request({
						url:xim.estadistica.cobradores.url,
						params:data,
						success:function(response,options){
							Ext.getCmp('win_dias_habiles').el.unmask();
							var resp = Ext.decode(response.responseText);
							Ext.getCmp(xim.estadistica.cobradores+'fecha_dias').setValue(resp['fecha']);
							Ext.getCmp(xim.estadistica.cobradores+'_descripcion').setValue(resp['descripcion']);			
						}
					});*/

				},
				actualizar_cobrador:function(modo,cod_cobra){
					var dni = Ext.getCmp(xim.estadistica.cobradores+'_txt_dni').getValue();
					var nombres = Ext.getCmp(xim.estadistica.cobradores+'_txt_nombre').getValue();
					var aperllidos = Ext.getCmp(xim.estadistica.cobradores+'_txt_apellidos').getValue();
					var telefono = Ext.getCmp(xim.estadistica.cobradores+'_txt_telefono').getValue();
					
					if(dni== ''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Ingrese un numero de DNI por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});
					return;
            		}
					if(nombres== ''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Ingrese nombres del cobrador por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});
					return;
            		}
					if(aperllidos== ''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Ingrese apellidos del cobrador por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});
					return;
            		}
					if(!confirm('Desea ejecutar el proceso?')){return;}
					
					var data = 'op=set_cobrador&dni='+dni+'&nombres='+nombres+'&apellidos='+aperllidos+'&modo='+modo+'&telefono='+telefono+'&cod_cobra='+cod_cobra;
					Ext.getCmp('win_cobra').el.mask('Cargando...', 'x-mask-loading');	
					Ext.Ajax.request({
						url:xim.estadistica.cobradores.url,
						params:data,
						success:function(response,options){
							Ext.getCmp('win_cobra').el.unmask();
							var msg = Ext.decode(response.responseText);
							 	if(parseInt(msg['est'])==1){
									Ext.Msg.show({
										title: 'MAC',
										msg: 'El proceso termino correctamente!',
										buttons: Ext.Msg.OK, 
										icon: Ext.Msg.INFO
									});
									Ext.getCmp(xim.estadistica.cobradores+'_grid_personal').getStore().reload({
										params:{
											op:'get_grid_cobradores'
										}
									});
									Ext.getCmp('win_cobra').close();
								}else{//
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
				XimRecorre:function(flag){
					var ximz = Ext.getCmp(xim.estadistica.cobradores+'_grid_personal').getSelectionModel().getSelections();
					if(ximz.length <= 0){
						Ext.Msg.show({
							title: 'MAC',
							msg: 'Selecciona almenos un Registro!',
							buttons: Ext.Msg.OK,
							icon: Ext.Msg.WARNING
						});
					}else{
						if(!confirm('Desea ejecutar el proceso?')){return;}
						/*****************************/
						var myXIM = new Array();
						/****************************/
						for(var ix=0;ix<ximz.length;++ix){
							myXIM[ix] = ximz[ix].get('cod_cobra');
						}
						Ext.getCmp(xim.estadistica.cobradores+'ventana_cobradores').el.mask('Cargando...', 'x-mask-loading');
						var data = 'op=set_activa_desactiva_cobra&flag='+parseInt(flag)+'&cod_cobra='+myXIM;
						Ext.Ajax.request({
							url:xim.estadistica.cobradores.url,
							params:data,
							success:function(response,options){
								Ext.getCmp(xim.estadistica.cobradores+'ventana_cobradores').el.unmask();
								var msg = Ext.decode(response.responseText);
								if(parseInt(msg['est'])==1){
									Ext.Msg.show({
										title: 'MAC',
										msg: 'El proceso termino correctamente!',
										buttons: Ext.Msg.OK,
										icon: Ext.Msg.INFO
									});
									Ext.getCmp(xim.estadistica.cobradores+'_grid_personal').getStore().reload({
										params:{
											op:'get_grid_cobradores'
										}
									});
								}else{//
									Ext.Msg.show({
										title: 'MAC',
										msg: 'Ocurrio un Error al tratar de almacenar la informacion, informe al Administrador del Sistema',
										buttons: Ext.Msg.OK,
										icon: Ext.Msg.ERROR
									});
		
								}
							}
						});
					}
				},
				imagen_empresa:function(){
					var win = new Ext.Window({  
					title: 'Imagen Empresa',
					id:'win_imagen_empresa',
					closable:false,
					width: 300,
					modal:true,
					//layout:'fit',
					height:300,
					html:'<iframe name="iframeUpload" style="display:none; height:10px"></iframe><div id="divContenedor" style="border:1px solid;width:280px;height:210px;overflow:auto; clear:both;" align="center"><img src="galeria/empresa/<?php echo $img;?>" style=" padding-top:0px;"/></div><form method="post" action="upload/uploader.php" name="FomrM"  enctype="multipart/form-data" target="iframeUpload"><iframe name="iframeUpload" style="display:none; height:10px"></iframe><input  name="archivo-xim-img" type="file" class="casilla" onChange="mostrarImagen();" id="archivo-xim-img" size="17" style="float:left"/><input type="hidden" name="action" value="image" /><input type="hidden" name="opcion" id="opcion" value="ESTADISTICA_EMPRESA" /><input type="hidden" name="imagen_ok" id="imagen_ok" value="<?php echo $img;?>" /><input type="button" class="button"  value="guardar" onClick="return SubMit();" id="btn_guardar" name="btn_guardar" style="float:left"/></form></fieldset>',
					buttons:[						
						{
							text : "Salir",
							scope : this,
							listeners:{
								click:function(obj, e){
									xim.estadistica.cobradores.recarga_img();
								}
							},
							iconCls:'salir'
						}
					]//botones del formulario
					});  					 
					win.show();
				},
				recarga_img:function(){
					Ext.getCmp('win_imagen_empresa').el.mask('Cargando...', 'x-mask-loading');								
					var data = 'op=get_img';
					Ext.Ajax.request({
						url:xim.estadistica.cobradores.url,
						params:data,
						success:function(response,options){
							Ext.getCmp('win_imagen_empresa').el.unmask();
							var resp = Ext.decode(response.responseText);
							document.getElementById("img_empre").innerHTML='<img src="galeria/empresa/'+resp['img']+'" id="img_empresa" name="img_empresa" width="105" height="70" />';	
							//document.getElementById("imagen_ok").value=resp['img'];  
							//document.getElementById("divContenedor").innerHTML='<img src="galeria/empresa/'+resp['img']+'"/>';							 
							Ext.getCmp('win_imagen_empresa').close();								
						}
					});
				}
            }
            Ext.onReady(xim.estadistica.cobradores.init,xim.estadistica.cobradores);

        </script>
    </body>
</html>