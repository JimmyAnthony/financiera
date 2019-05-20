<script type="text/javascript">
	var tab = Ext.getCmp(inicio.id+'-tabContent');
	if(!Ext.getCmp('cobranza-tab')){
		var cobranza = {
			id:'cobranza',
			id_menu:'<?php echo $p["id_menu"];?>',
			url:'/gestion/cobranza/',
			url_ct:'/gestion/centroTrabajo/',
			opcion:'I',
			id_per:'<?php echo $p["id_per"];?>',
			id_id:'<?php echo $p["id_id"];?>',
			paramsStore:{},
			init:function(){
				Ext.tip.QuickTipManager.init();

				var store_creditos = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'id_creditos', type: 'string'},
	                    {name: 'nro_solicitud', type: 'string'},
	                    {name: 'id_age', type: 'string'},
	                    {name: 'id_per', type: 'string'},    
	                    {name: 'nombre', type: 'string'},                  
	                    {name: 'id_garante', type: 'string'},
	                    {name: 'id_asesor', type: 'string'},
	                    {name: 'moneda', type: 'string'},
	                    {name: 'monto_solicitado', type: 'string'},
	                    {name: 'tipo_cliente', type: 'string'},
	                    {name: 'excepcion', type: 'string'},
	                    {name: 'nro_cuotas', type: 'string'},

	                    {name: 'interes', type: 'string'},
	                    {name: 'mora', type: 'string'},
	                    {name: 'fecha_1ra_letra', type: 'string'},
	                    {name: 'monto_aprobado', type: 'string'},

	                    {name: 'tot_credito', type: 'string'},
	                    {name: 'tot_acumulado', type: 'string'},
	                    {name: 'tot_ganancia', type: 'string'},

	                    {name: 'tot_pagado', type: 'string'},
	                    {name: 'tot_interes', type: 'string'},
	                    {name: 'tot_mora', type: 'string'},
	                    {name: 'tot_saldo', type: 'string'},
	                    {name: 'id_motivo', type: 'string'},
	                    {name: 'estado', type: 'string'},
	                    {name: 'fecha_sol', type: 'string'},
	                    {name: 'nota', type: 'string'},

	                    {name: 'fecha_mod', type: 'string'},
	                    {name: 'enviado', type: 'string'},
	                    {name: 'flag', type: 'string'}
	                ],
	                autoLoad:false,
	                proxy:{
	                    type: 'ajax',
	                    url: cobranza.url+'get_list_creditos_asesor/',
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

	            var store_cobranza_detalle = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'id_det_credito', type: 'string'},
	                    {name: 'id_credito', type: 'string'},
	                    {name: 'nro_cuota', type: 'string'},
	                    {name: 'fecha_cuota', type: 'string'},                    
	                    {name: 'DIA', type: 'string'},
	                    {name: 'MES', type: 'string'},
	                    {name: 'ANO', type: 'string'},
	                    {name: 'valor_cuota', type: 'string'},
	                    {name: 'pagado', type: 'string'},
	                    {name: 'fecha_pago', type: 'string'},
	                    {name: 'PDIA', type: 'string'},

	                    {name: 'PMES', type: 'string'},
	                    {name: 'PANO', type: 'string'},
	                    {name: 'mora', type: 'string'},
	                    {name: 'dias', type: 'string'},
	                    {name: 'saldo_cuota', type: 'string'},
	                    {name: 'vence', type: 'string'},
	                    {name: 'estado', type: 'string'},
	                    {name: 'flag', type: 'string'}
	                ],
	                autoLoad:false,
	                proxy:{
	                    type: 'ajax',
	                    url: cobranza.url+'get_list_creditos_detalle/',
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

	            var myDataMoneda = [
					['SOL','SOLES'],
				    ['USD','DOLARES']
				];
				var store_moneda = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'estado',
			        autoLoad: true,
			        data: myDataMoneda,
			        fields: ['code', 'name']
			    });
				

				var myData = [
				    ['databox_interno_color','databox_interno_color','databox_interno_color','databox_interno_color','databox_interno_color','databox_interno_color']
				];
				var store_estados = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'estado',
			        autoLoad: false,
			        data: myData,
			        fields: ['clase_box1', 'clase_box2', 'clase_box3', 'clase_box4', 'clase_box5', 'clase_box6']
			    });

			    

			    var myDataLote = [
					['C','CÓDIGO'],
				    ['D','DNI'],
				    ['N','NOMBRE']
				];
				var store_filtro = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'estado',
			        autoLoad: true,
			        data: myDataLote,
			        fields: ['code', 'name']
			    });
				var myDataSearch = [
					['L','N° Lote'],
					['N','Nombre Lote'],
				    ['A','Nombre Archivo'],
				    ['G','Nombre Archivo Generado'],
				    ['O','Full Text OCR'],
				    ['T','Texto en Trazo OCR']
				];
				var store_search = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'search',
			        autoLoad: true,
			        data: myDataSearch,
			        fields: ['code', 'name']
			    });

			    var myDataEstadoCivil = [
					['S','Soltero'],
				    ['C','Casado'],
				    ['V','Viudo']
				];
				cobranza.store_estado_civil = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'estado',
			        autoLoad: true,
			        data: myDataEstadoCivil,
			        fields: ['code', 'name']
			    });

			    var myDataTipoTel = [
					['CE','Celular'],
				    ['FI','Fijo']
				];
				cobranza.store_tipo_tel = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'tel',
			        autoLoad: true,
			        data: myDataTipoTel,
			        fields: ['code', 'name']
			    });

			    var myDataLineaTel = [
					['CL','Claro'],
				    ['MO','Movistar'],
				    ['EN','Entel'],
				    ['BI','Bitel'],
				    ['FI','Fijo'],
				    ['OT','Otros']
				];
				cobranza.store_linea_tel = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'tel',
			        autoLoad: true,
			        data: myDataLineaTel,
			        fields: ['code', 'name']
			    });

			    cobranza.store_ubigeo = Ext.create('Ext.data.Store',{
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
	                    url: cobranza.url+'get_list_ubigeo/',
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

	            cobranza.store_ubigeo2 = Ext.create('Ext.data.Store',{
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
	                    url: cobranza.url+'get_list_ubigeo/',
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

	            cobranza.store_ubigeo3 = Ext.create('Ext.data.Store',{
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
	                    url: cobranza.url+'get_list_ubigeo/',
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

			    var myDatacobranza = [
					[1,'Activo'], 
				    [0,'Inactivo']
				];
				var store_estado_cobranza = Ext.create('Ext.data.ArrayStore', {
			        storeId: 'perfil',
			        autoLoad: true,
			        data: myDatacobranza,
			        fields: ['code', 'name']
			    });

			    var imageTplPointer = new Ext.XTemplate(
		            '<tpl for=".">',
		                '<div class="list_grid_as__list_menu_select" >',
		                    '<div class="list_grid_as__list_menu" >',
		                        '<div class="list_grid_as__menu_bx" >',
		                            '<div class="">',
		                                '<img src="/images/menu/{icono}" />',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_as__menu_line" style="width:180px;">',
		                            '<div class="list_grid_as__menu_bar">',
		                                '<div class="list_grid_as__menu_title_A">',
		                                '<span>Nombres:</span>',
		                                '</div>',
		                                '<div class="list_grid_as__menu_title">',
		                                    '<span>{nombres}, {ape_pat} {ape_mat}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_as__menu_line" style="width:80px;">',
		                            '<div class="list_grid_as__menu_bar">',
		                                '<div class="list_grid_as__menu_title_A">',
		                                '<span>DNI:</span>',
		                                '</div>',
		                                '<div class="list_grid_as__menu_title">',
		                                    '<span>{dni}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                    '</div>',
		                '</div>',
		            '</tpl>'
		        );

		        var imageTplTelefonos = new Ext.XTemplate(
		            '<tpl for=".">',
		                '<div class="list_grid_as__list_menu_select" >',
		                    '<div class="list_grid_as__list_menu" >',
		                        '<div class="list_grid_as__menu_bx" >',
		                            '<div class="">',
		                                '<img src="/images/icon/{icono}" />',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_as__menu_line" style="width:80px;">',
		                            '<div class="list_grid_as__menu_bar">',
		                                '<div class="list_grid_as__menu_title_A">',
		                                '<span>Número:</span>',
		                                '</div>',
		                                '<div class="list_grid_as__menu_title">',
		                                    '<span>{numero}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_as__menu_line" style="width:60px;">',
		                            '<div class="list_grid_as__menu_bar">',
		                                '<div class="list_grid_as__menu_title_A">',
		                                '<span>Tipo:</span>',
		                                '</div>',
		                                '<div class="list_grid_as__menu_title">',
		                                    '<span>{tnombre}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_as__menu_line" style="width:70px;">',
		                            '<div class="list_grid_as__menu_bar">',
		                                '<div class="list_grid_as__menu_title_A">',
		                                '<span>Operador:</span>',
		                                '</div>',
		                                '<div class="list_grid_as__menu_title">',
		                                    '<span>{toperador}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                    '</div>',
		                '</div>',
		            '</tpl>'
		        );
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
		                                    '<img src="/images/icon/Trash.png" onClick="cobranza.setDeleteDir({id_dir});"/>',
		                                '</div>',
		                            '</div>',
		                        '</div>',*/
		                    '</div>',
		                '</div>',
		            '</tpl>'
		        );
		        var imageTplPointerConyugue = new Ext.XTemplate(
		            '<tpl for=".">',
		                '<div class="list_grid_as__list_menu_select" >',
		                    '<div class="list_grid_as__list_menu" >',
		                        '<div class="list_grid_as__menu_bx" >',
		                            '<div class="" >',
		                                '<img src="/images/menu/default_user.png"  />',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_as__menu_line" style="width:200px;">',
		                            '<div class="list_grid_as__menu_bar">',
		                                '<div class="list_grid_as__menu_title_A">',
		                                '<span>Nombres:</span>',
		                                '</div>',
		                                '<div class="list_grid_as__menu_title">',
		                                    '<span>{nombres}, {ape_pat} {ape_mat}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_as__menu_line" style="width:70px;">',
		                            '<div class="list_grid_as__menu_bar">',
		                                '<div class="list_grid_as__menu_title_A">',
		                                '<span>DNI:</span>',
		                                '</div>',
		                                '<div class="list_grid_as__menu_title">',
		                                    '<span>{doc_dni}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_as__menu_line" style="width:100px;">',
		                            '<div class="list_grid_as__menu_bar">',
		                                '<div class="list_grid_as__menu_title_A">',
		                                '<span>Teléfonos:</span>',
		                                '</div>',
		                                '<div class="list_grid_as__menu_title">',
		                                    '<span>{numero}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_as__menu_line" style="width:350px; display: inline-flex;margin-top: 20px;">',
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
		                    '</div>',
		                '</div>',
		            '</tpl>'
		        );
				var store_conyugue = Ext.create('Ext.data.Store',{
		            fields: [
		                {name: 'id_per', type: 'string'},
		                {name: 'nombres', type: 'string'},
		                {name: 'ape_pat', type: 'string'},
		                {name: 'ape_mat', type: 'string'},
		                {name: 'doc_dni', type: 'string'},
		                {name: 'numero', type: 'string'},

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
		                {name: 'fecha', type: 'string'},
		                {name: 'clase', type: 'string'},
		                {name: 'flag', type: 'string'}
		            ],
		            autoLoad:false,
		            proxy:{
		                type: 'ajax',
		                url: cobranza.url+'getListPersona/',
		                reader:{
		                    type: 'json',
		                    rootProperty: 'data'
		                }//,
		                //extraParams:config.params
		            },
		            listeners:{
		                load: function(obj, records, successful, opts){
		                    console.log(records);
		                    //document.getElementById("menu_spinner").innerHTML = "";
		                }
		            }
		        });
		        var store_garante = Ext.create('Ext.data.Store',{
		            fields: [
		                {name: 'id_per', type: 'string'},
		                {name: 'nombres', type: 'string'},
		                {name: 'ape_pat', type: 'string'},
		                {name: 'ape_mat', type: 'string'},
		                {name: 'doc_dni', type: 'string'},
		                {name: 'numero', type: 'string'},

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
		                {name: 'fecha', type: 'string'},
		                {name: 'clase', type: 'string'},
		                {name: 'flag', type: 'string'}
		            ],
		            autoLoad:false,
		            proxy:{
		                type: 'ajax',
		                url: cobranza.url+'getListPersona/',
		                reader:{
		                    type: 'json',
		                    rootProperty: 'data'
		                }//,
		                //extraParams:config.params
		            },
		            listeners:{
		                load: function(obj, records, successful, opts){
		                    console.log(records);
		                    //document.getElementById("menu_spinner").innerHTML = "";
		                }
		            }
		        });
		        
		        var imageTplPointerSolicitudes = new Ext.XTemplate(
		            '<tpl for=".">',
		                '<div class="list_grid_sol__list_menu_select" >',
		                    '<div class="list_grid_sol__list_menu" >',
		                        '<div class="list_grid_sol__menu_line" style="width:80px;">',
		                            '<div class="list_grid_sol__menu_bar">',
		                                '<div class="list_grid_sol__menu_title_A">',
		                                '<span>N°Solicitud:</span>',
		                                '</div>',
		                                '<div class="list_grid_sol__menu_title" style="text-align:left;">',
		                                    '<span>{nro_solicitud}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_sol__menu_line" style="width:80px;">',
		                            '<div class="list_grid_sol__menu_bar">',
		                                '<div class="list_grid_sol__menu_title_A">',
		                                '<span>Fecha:</span>',
		                                '</div>',
		                                '<div class="list_grid_sol__menu_title" style="text-align:left;">',
		                                    '<span>{fecha_sol}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_sol__menu_line" style="width:67px;">',
		                            '<div class="list_grid_sol__menu_bar">',
		                                '<div class="list_grid_sol__menu_title_A" style="text-align:right;">',
		                                '<span>Moneda:</span>',
		                                '</div>',
		                                '<div class="list_grid_sol__menu_title" style="text-align:right;">',
		                                    '<span>{moneda}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_sol__menu_line" style="width:67px;">',
		                            '<div class="list_grid_sol__menu_bar">',
		                                '<div class="list_grid_sol__menu_title_A" style="text-align:right;">',
		                                '<span>Monto:</span>',
		                                '</div>',
		                                '<div class="list_grid_sol__menu_title" style="text-align:right;">',
		                                    '<span>{tot_credito}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                        '<div class="list_grid_sol__menu_line" style="width:67px;">',
		                            '<div class="list_grid_sol__menu_bar">',
		                                '<div class="list_grid_sol__menu_title_A" style="text-align:right;">',
		                                '<span>Cuotas:</span>',
		                                '</div>',
		                                '<div class="list_grid_sol__menu_title" style="text-align:right;">',
		                                    '<span>{nro_cuotas}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                        /*'<div class="list_grid_sol__menu_line" style="display: inline-flex;width:170px;">',
		                            '<div class="list_grid_sol__menu_bar" style="width:170px;">',
		                                '<div class="list_grid_sol__menu_title_A" style="text-align:right;">',
		                                '<span>Monto:</span>',
		                                '</div>',
		                                '<div class="list_grid_sol__menu_title" style="text-align:right;">',
		                                    '<span>{doc_dni}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',*/
		                    '</div>',
		                '</div>',
		            '</tpl>'
		        );
		        var imageTplPointerSolicitudesTotales = new Ext.XTemplate(
		            '<tpl for=".">',
		                '<div class="list_grid_sol__list_menu_select" >',
		                    '<div class="list_grid_sol__list_menu" >',
		                        '<div class="list_grid_sol__menu_line" style="width:180px;">',
		                            '<div class="list_grid_sol__menu_bar">',
		                                '<div class="list_grid_sol__menu_title_A" style="text-align:right;">',
		                                '<span style="text-align:right;">Total Solicitado:</span>',
		                                '</div>',
		                                '<div class="list_grid_sol__menu_title" style="text-align:right;">',
		                                    '<span >{doc_dni}</span>',
		                                '</div>',
		                            '</div>',
		                        '</div>',
		                    '</div>',
		                '</div>',
		            '</tpl>'
		        );
		        var store_telefonos = Ext.create('Ext.data.Store',{
		            fields: [
		                {name: 'id_per', type: 'string'},
		                {name: 'id_tel', type: 'string'},
		                {name: 'numero', type: 'string'},
		                {name: 'tipo', type: 'string'},
		                {name: 'tnombre', type: 'string'},
		                {name: 'operador', type: 'string'},
		                {name: 'toperador', type: 'string'},
		                {name: 'fecha', type: 'string'},
		                {name: 'flag', type: 'string'}
		            ],
		            autoLoad:false, 
		            proxy:{
		                type: 'ajax',
		                url: cobranza.url+'get_list_telefonos/',
		                reader:{
		                    type: 'json',
		                    rootProperty: 'data'
		                },
		                extraParams:{vp_op:'P',vp_id:0,vp_flag:'A'}
		            },
		            listeners:{
		                load: function(obj, records, successful, opts){
		                    console.log(records);
		                    //document.getElementById("menu_spinner").innerHTML = "";
		                }
		            }
		        });

		        var store_direcciones = Ext.create('Ext.data.Store',{
		            fields: [
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
		                url: cobranza.url+'getListDirecciones/',
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

		        var store_agencias = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'cod_age', type: 'string'},
	                    {name: 'nombre', type: 'string'},
	                    {name: 'descripcion', type: 'string'},
	                    {name: 'direccion', type: 'string'},                    
	                    {name: 'telefonos', type: 'string'},
	                    {name: 'cod_ubi', type: 'string'},
	                    {name: 'x', type: 'string'},
	                    {name: 'y', type: 'string'},
	                    {name: 'fecha', type: 'string'},
	                    {name: 'estado', type: 'string'},
	                    {name: 'Distrito', type: 'string'},
	                    {name: 'Provincia', type: 'string'},
	                    {name: 'Departamento', type: 'string'},
	                    {name: 'cod_ubi_pro', type: 'string'},
	                    {name: 'cod_ubi_dep', type: 'string'}
	                ],
	                autoLoad:true,
	                proxy:{
	                    type: 'ajax',
	                    url: cobranza.url+'get_list_agencias/',
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
	            

	            var store_asesores = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'id_asesor', type: 'int'},
	                    {name: 'id_per', type: 'int'},
	                    {name: 'id_per', type: 'int'},
	                    {name: 'id_age', type: 'int'},
	                    {name: 'nombre', type: 'string'}
	                ],
	                autoLoad:false,
	                proxy:{
	                    type: 'ajax',
	                    url: cobranza.url+'get_list_asesores/',
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

	            var store_motivos = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'id_mot', type: 'int'},
	                    {name: 'nombre', type: 'string'},
	                    {name: 'fecha', type: 'string'},
	                    {name: 'flag', type: 'string'}
	                ],
	                autoLoad:true,
	                proxy:{
	                    type: 'ajax',
	                    url: cobranza.url+'get_list_motivos/',
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

	            var store_documentos = Ext.create('Ext.data.Store',{
	                fields: [
	                    {name: 'id_doc', type: 'string'},
	                    {name: 'id_per', type: 'string'},
	                    {name: 'nombre', type: 'string'},
	                    {name: 'img', type: 'string'},
	                    {name: 'thumb', type: 'string'},
	                    {name: 'flag', type: 'string'},
	                    {name: 'fecha', type: 'string'},
	                    {name: 'id_user', type: 'string'}
	                ],
	                autoLoad:false,
	                proxy:{
	                    type: 'ajax',
	                    url: cobranza.url+'get_list_documentos/',
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
	            
	            var store_centro_trabajo = Ext.create('Ext.data.Store',{
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
		                url: cobranza.url_ct+'getListEmpresa/',
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

				tab.add({
					id:cobranza.id+'-win-form',
					border:false,
					autoScroll:true,
					closable:true,
					layout:'border',bodyStyle: 'background: #FFF;',
					items:[
						{
							layout:'fit',
				            //width: '40%',
				            border:true,
				            region:'center',bodyStyle: 'background: transparent',
				            items:[
				            	{
				            		layout:'border',
				            		bodyStyle: 'background: transparent',
				            		items:[
				            			{
											region:'north',
											layout:'border',
											height:260,
											border:false,
											//layout:'border',
											padding:10,
											bodyStyle: 'background: transparent',
											items:[
												{
													region:'north',
													xtype: 'fieldset',
													title: 'Filtros',
													padding:'5px 5px 5px 5px',
													//margin:'5px 5px 5px 5px',
													bodyStyle: 'background: transparent',
													//border:false,
													items:[
														{
															layout:'hbox',
															bodyStyle: 'background: transparent',
															border:false,
															padding:'5px 5px 5px 5px',
															items:[
																{
						                                            xtype:'combo',
						                                            fieldLabel: 'AGENCIA',
						                                            id:cobranza.id+'-sol-cmb-agencia-filtro',
						                                            store: store_agencias,
						                                            queryMode: 'local',
						                                            triggerAction: 'all',
						                                            valueField: 'cod_age',
						                                            displayField: 'nombre',
						                                            emptyText: '[Seleccione]',
						                                            labelAlign:'right',
						                                            //allowBlank: false,
						                                            //labelAlign:'top',
										                            //width:'92%',
										                            labelWidth:65,
										                            //flex:1,
										                            width:200,
										                            //height:40,
										                            labelStyle: "font-size:11px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
										                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
						                                            anchor:'100%',
						                                            
						                                            //readOnly: true,
						                                            listeners:{
						                                                afterrender:function(obj, e){
						                                                	//cobranza.getUbigeo({VP_OP:'X',VP_VALUE:'100601'},obj,'100601');
						                                                	obj.setValue(1);
						                                                },
						                                                select:function(obj, records, eOpts){
						                                        			var obja = Ext.getCmp(cobranza.id+'-sol-cmb-asesor');
				                        									cobranza.getReload(obja,{vp_cod_age:obj.getValue()});
						                                                }
						                                            }
						                                        },
						                                        {
				                                                    xtype:'combo',
				                                                    fieldLabel: 'BUSCAR POR',
				                                                    bodyStyle: 'background: transparent',
													                //labelStyle: "font-size:18px;font-weight:bold;padding:6px 0px 0px 0px;text-align: center;font-weight: bold",
											                        //fieldStyle: 'font-size:20px; text-align: center; font-weight: bold',
				                                                    id:cobranza.id+'-txt-estado-filter',
				                                                    store: store_filtro,
				                                                    queryMode: 'local',
				                                                    triggerAction: 'all',
				                                                    valueField: 'code',
				                                                    displayField: 'name',
				                                                    emptyText: '[Seleccione]',
				                                                    labelAlign:'right',
				                                                    //allowBlank: false,
				                                                    labelWidth: 85,
				                                                    //width:'95%',
				                                                    width:200,
				                                                    anchor:'100%',
				                                                    labelStyle: "font-size:11px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
										                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
				                                                    //readOnly: true,
				                                                    listeners:{
				                                                        afterrender:function(obj, e){
				                                                            // obj.getStore().load();
				                                                            Ext.getCmp(cobranza.id+'-txt-estado-filter').setValue('C');
				                                                        },
				                                                        select:function(obj, records, eOpts){
				                                                
				                                                        }
				                                                    }
				                                                },
				                                                {
				                                                    xtype: 'textfield',	
				                                                    fieldLabel: '',
				                                                    id:cobranza.id+'-txt-asesores',
				                                                    labelWidth:0,
				                                                    //readOnly:true,
				                                                    labelAlign:'right',
				                                                    //height:30,
										                            //labelStyle: "font-size:20px;font-weight:bold;padding:4px 0px 0px 0px;text-align: center;font-weight: bold",
										                            //fieldStyle: 'font-size:20px; text-align: center; font-weight: bold',
				                                                    //width:'100%',
				                                                    flex:1,
				                                                    anchor:'100%'
				                                                },
				                                                {
															        xtype: 'datefield',
															        id:cobranza.id+'-sol-date-fecha-cobranza',
															        //padding:'5px 5px 0px 5px',
															        //name: 'date1',
															        //labelAlign:'top',
															        format:'Y-m-d',
															        //flex:1,
															        //padding:'5px 5px 5px 5px',
															        labelWidth: 85,
															        width:180,
															        labelStyle: "font-size:11px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
										                            fieldStyle: 'font-size:10px; text-align: center; font-weight: bold',
										                            //height:40,
															        //labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
										                            //fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
															        fieldLabel: 'FECHA COBRO',
															        value:new Date()
															    },
				                                                {
											                        xtype:'button',
											                        width:50,
											                        //scale: 'medium',
											                        //text: 'Buscar',
											                        icon: '/images/icon/binocular.png',
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
											                            	cobranza.getCreditosGestionDiaria();
											                            }
											                        }
											                    }
						                                    ]
						                                }
													]
												},
												{
													region:'center',
													layout:'border',
													border:false,
													items:[
														{
					                						region:'north',
					                						height:40,
					                						//border:false,
					                						items:[
					                							{
																	//region:'north',
																	xtype:'panel',
																	layout:'hbox',
																	border:false,
																	height:40,
																	//bodyStyle: 'background: #F0EFEF;text-align:center;',
																	bodyStyle: 'background: #F0EFEF;text-align:center;',
																	//layout:'fit',
																	items:[
																		{
																	        xtype: 'label',
																	        //forId: 'myFieldId',
																	        text: 'COBRO ESPERADO',
																	        style: 'font: normal 15px Sans-serif;font-weight: bold;',
																	        padding:'10px 5px 5px 5px',
																	        width:'100%',
												                            anchor:'100%'
																	    }
																	]
																}
					                						]
					                					},
					                					{
					                						region:'center',
					                						//layout:'border',
					                						border:false,
					                						//layout:'hbox',
					                						items:[
					                							{
					                								layout:'hbox',
					                								border:false,
					                								items:[
												                        {
												                            xtype: 'textfield',	
												                            fieldLabel: 'Total Cuotas',
												                            id:cobranza.id+'-txt-esperado-cuotas',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:cobranza.id+'-txt-dni',
												                            labelWidth:50,
												                            readOnly:true,
												                            labelAlign:'top',
												                            //width:80,
												                            flex:1,
												                            //columnWidth: 0.2,
												                            height:50,
												                            labelStyle: "font-size:12px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:14px; text-align: right; font-weight: bold',
												                            value:'',
												                            maskRe: new RegExp("[0-9.]+"),
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
												                        {
												                            xtype: 'textfield',	
												                            fieldLabel: 'Valor Cuotas',
												                            id:cobranza.id+'-txt-esperado-valor-cuotas',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:cobranza.id+'-txt-dni',
												                            labelWidth:50,
												                            readOnly:true,
												                            labelAlign:'top',
												                            //width:80,
												                            flex:1,
												                            //columnWidth: 0.2,
												                            height:50,
												                            labelStyle: "font-size:12px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:14px; text-align: right; font-weight: bold',
												                            value:'',
												                            maskRe: new RegExp("[0-9.]+"),
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
												                        {
												                            xtype: 'textfield',	
												                            fieldLabel: 'Mora',
												                            id:cobranza.id+'-txt-esperado-mora',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:cobranza.id+'-txt-dni',
												                            labelWidth:50,
												                            readOnly:true,
												                            labelAlign:'top',
												                            //width:80,
												                            flex:1,
												                            //columnWidth: 0.2,
												                            height:50,
												                            labelStyle: "font-size:12px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:14px; text-align: right; font-weight: bold',
												                            value:'',
												                            maskRe: new RegExp("[0-9.]+"),
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
												                        {
												                            xtype: 'textfield',	
												                            fieldLabel: 'Monto Esperado',
												                            id:cobranza.id+'-txt-esperado-monto',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:cobranza.id+'-txt-dni',
												                            labelWidth:50,
												                            readOnly:true,
												                            labelAlign:'top',
												                            //width:80,
												                            flex:1,
												                            //columnWidth: 0.2,
												                            height:50,
												                            labelStyle: "font-size:12px;font-weight:bold;padding:17px 0px 0px 0px;color:green;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:14px; text-align: right; font-weight: bold',
												                            value:'',
												                            maskRe: new RegExp("[0-9.]+"),
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
					                								border:false,
					                								items:[
					                									{
												                            xtype: 'textfield',	
												                            fieldLabel: 'Cant.Solicitud',
												                            id:cobranza.id+'-txt-esperado-cant-solicitado',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:cobranza.id+'-txt-dni',
												                            labelWidth:50,
												                            readOnly:true,
												                            labelAlign:'top',
												                            //width:80,
												                            flex:1,
												                            //columnWidth: 0.2,
												                            height:50,
												                            labelStyle: "font-size:12px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:14px; text-align: right; font-weight: bold',
												                            value:'',
												                            maskRe: new RegExp("[0-9.]+"),
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
												                        {
												                            xtype: 'textfield',	
												                            fieldLabel: 'Total Crédito',
												                            id:cobranza.id+'-txt-esperado-monto-solicitado',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:cobranza.id+'-txt-dni',
												                            labelWidth:50,
												                            readOnly:true,
												                            labelAlign:'top',
												                            //width:80,
												                            flex:1,
												                            //columnWidth: 0.2,
												                            height:50,
												                            labelStyle: "font-size:12px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:14px; text-align: right; font-weight: bold',
												                            value:'',
												                            maskRe: new RegExp("[0-9.]+"),
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
												                        {
												                            xtype: 'textfield',	
												                            fieldLabel: 'Cuotas Cobradas',
												                            id:cobranza.id+'-txt-esperado-cuotas-cobradas',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:cobranza.id+'-txt-dni',
												                            labelWidth:50,
												                            readOnly:true,
												                            labelAlign:'top',
												                            //width:80,
												                            flex:1,
												                            //columnWidth: 0.2,
												                            height:50,
												                            labelStyle: "font-size:12px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:14px; text-align: right; font-weight: bold',
												                            value:'',
												                            maskRe: new RegExp("[0-9.]+"),
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
												                        {
												                            xtype: 'textfield',	
												                            fieldLabel: 'Total Cobrado',
												                            id:cobranza.id+'-txt-esperado-cobrado',
												                            bodyStyle: 'background: transparent',
														                    padding:'5px 5px 5px 5px',
												                            //id:cobranza.id+'-txt-dni',
												                            labelWidth:50,
												                            readOnly:true,
												                            labelAlign:'top',
												                            //width:80,
												                            flex:1,
												                            //columnWidth: 0.2,
												                            height:50,
												                            labelStyle: "font-size:12px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;color:red;font-weight: bold",
												                            fieldStyle: 'font-size:14px; text-align: right; font-weight: bold',
												                            value:'',
												                            maskRe: new RegExp("[0-9.]+"),
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
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
											region:'center',
											layout:'border',
											border:false,
											items:[
												{
			                						region:'north',
			                						height:40,
			                						//border:false,
			                						items:[
			                							{
															//region:'north',
															xtype:'panel',
															layout:'hbox',
															border:false,
															height:40,
															//bodyStyle: 'background: #F0EFEF;text-align:center;',
															bodyStyle: 'background: #F0EFEF;text-align:center;',
															//layout:'fit',
															items:[
																{
															        xtype: 'label',
															        //forId: 'myFieldId',
															        text: 'ASESORES',
															        style: 'font: normal 15px Sans-serif;font-weight: bold;',
															        padding:'10px 5px 5px 5px',
															        width:'100%',
										                            anchor:'100%'
															    }
															]
														}
			                						]
			                					},
			                					{
			                						region:'center',
			                						//layout:'border',
			                						border:false,
			                						layout:'fit',
			                						items:[
			                							/*{
								                            xtype:'GridViewVertAS',
								                            id:cobranza.id,
								                            mode:2,
								                            tab:cobranza.id+'-tabContent',
								                            url:cobranza.url+'getDataMenuView/',
								                            back:'-contentAsesores',
								                            params:{sis_id:2}
								                        }*/
								                        {
									                        xtype: 'grid',
									                        id: cobranza.id+'-grid-asesores', 
									                        store: Ext.create('Ext.data.Store',{
													            fields: [
													                {name: 'id_asesor', type: 'string'},
													                {name: 'nombre', type: 'string'},
													                {name: 'nombres', type: 'string'},
													                {name: 'ape_pat', type: 'string'},
													                {name: 'ape_mat', type: 'string'},
													                {name: 'dni', type: 'string'},
													                {name: 'monto_aprobado', type: 'string'},	
													                {name: 'solicitudes', type: 'string'},
													                {name: 'sol_monto', type: 'string'},
													                {name: 'tot_cuotas', type: 'string'},
													                {name: 'valor_cuota', type: 'string'},
													                {name: 'mora', type: 'string'},
													                {name: 'total', type: 'string'},
													                {name: 'pagado', type: 'string'},
													                {name: 'saldo_cuota', type: 'string'},
													                {name: 'efectivo', type: 'string'}
													            ],
													            autoLoad:false,
													            proxy:{
													                type: 'ajax',
													                url: cobranza.url+'getListAsesores/',
													                reader:{
													                    type: 'json',
													                    rootProperty: 'data'
													                }/*,
													                extraParams:config.params*/
													            },
													            listeners:{
													                load: function(obj, records, successful, opts){
													                    console.log(records);
													                    //document.getElementById("menu_spinner").innerHTML = "";
													                }
													            }
													        }), 
									                        columnLines: true,
									                        //layout:'fit',
									                        columns:{
									                            items:[
									                            	{
									                            		text: 'N°',
																	    xtype: 'rownumberer',
																	    width: 30,
																	    sortable: false,
																	    locked: true/*,
																	    renderer: function (value, metaData, record, rowIdx, colIdx, store) {
									                                        //console.log(record);
									                                        return store.indexOf(record);
									                                    }*/
																	},
																	{
									                                    text: 'Nombres',
									                                    dataIndex: 'nombre',
									                                    //loocked : true,
									                                    //width: 40,
									                                    flex:1,
									                                    align: 'left',
									                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
									                                        return value;
									                                    }
									                                },
																	{
																		text:'<div style="display: inline-flex;"><div style="width: 76px;">Créditos</div><div id="AnaEfect-1-EN" style="width:16px;"></div></div>',
																		align:'center',
																		//width: 100,
																		//flex:1,
																		menuDisabled:true,
																		columns:[
											                                {
											                                    text: 'Cantidad',
											                                    align:'center',
											                                    dataIndex: 'solicitudes',
											                                    width: 60,
											                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
											                                        metaData.style = "padding: 0px; margin: 0px";
											                                        return value;
											                                    }
											                                },
											                                {
											                                    text: 'Monto',
											                                    align:'right',
											                                    dataIndex: 'monto_aprobado',
											                                    width: 60,
											                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
											                                        metaData.style = "padding: 0px; margin: 0px";
											                                        return value;
											                                    }
											                                }
									                                	]
									                            	},
									                            	{
																		text:'<div style="display: inline-flex;"><div style="width: 76px;">Pendientes de Pago</div><div id="AnaEfect-1-EN" style="width:16px;"></div></div>',
																		align:'center',
																		//width: 100,
																		//flex:1,
																		menuDisabled:true,
																		columns:[
											                                {
											                                    text: 'Cuotas',
											                                    align:'center',
											                                    dataIndex: 'tot_cuotas',
											                                    width: 60,
											                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
											                                        metaData.style = "padding: 0px; margin: 0px";
											                                        return value;
											                                    }
											                                },
											                                {
											                                    text: 'Monto',
											                                    align:'right',
											                                    dataIndex: 'valor_cuota',
											                                    width: 60,
											                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
											                                        metaData.style = "padding: 0px; margin: 0px";
											                                        return value;
											                                    }
											                                },
											                                {
											                                    text: 'Mora',
											                                    align:'right',
											                                    dataIndex: 'mora',
											                                    width: 60,
											                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
											                                        metaData.style = "padding: 0px; margin: 0px";
											                                        return value;
											                                    }
											                                },
											                                {
											                                    text: 'Total',
											                                    align:'right',
											                                    dataIndex: 'total',
											                                    width: 60,
											                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
											                                        metaData.style = "padding: 0px; margin: 0px";
											                                        return value;
											                                    }
											                                },
									                                	]
									                            	},
									                            	/*{
																		text:'<div style="display: inline-flex;"><div style="width: 76px;">Cobrado</div><div id="AnaEfect-1-EN" style="width:16px;"></div></div>',
																		align:'center',
																		//width: 100,
																		//flex:1,
																		menuDisabled:true,
																		columns:[
											                                {
											                                    text: 'Cuotas',
											                                    align:'right',
											                                    dataIndex: 'cuotas_cobradas',
											                                    width: 60,
											                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
											                                        metaData.style = "padding: 0px; margin: 0px";
											                                        return value;
											                                    }
											                                },
											                                {
											                                    text: 'Monto',
											                                    align:'right',
											                                    dataIndex: 'pagado',
											                                    width: 60,
											                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
											                                        metaData.style = "padding: 0px; margin: 0px";
											                                        return value;
											                                    }
											                                }
									                                	]
									                            	},*/
									                            	{
									                                    text: 'Cobrado',
									                                    dataIndex: 'pagado',
									                                    //loocked : true,
									                                    //width: 40,
									                                    //flex:1,
									                                    width: 60,
									                                    align: 'right',
									                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
									                                    	metaData.style = "padding: 0px; margin: 0px";
									                                        return value;
									                                    }
									                                },
									                            	/*
									                            	{
																		text:'<div style="display: inline-flex;"><div style="width: 76px;">Pendiente</div><div id="AnaEfect-1-EN" style="width:16px;"></div></div>',
																		align:'center',
																		//width: 100,
																		//flex:1,
																		menuDisabled:true,
																		columns:[
											                                {
											                                    text: 'Cuotas',
											                                    align:'right',
											                                    dataIndex: 'coutas_pendientes',
											                                    width: 60,
											                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
											                                        metaData.style = "padding: 0px; margin: 0px";
											                                        return value;
											                                    }
											                                },
											                                {
											                                    text: 'Monto',
											                                    align:'right',
											                                    dataIndex: 'saldo_cuota',
											                                    width: 60,
											                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
											                                        metaData.style = "padding: 0px; margin: 0px";
											                                        return value;
											                                    }
											                                }
									                                	]
									                            	},*/
																	{
									                                    text: 'ST',
									                                    dataIndex: 'estado',
									                                    //loocked : true,
									                                    width: 40,
									                                    //flex:1,
									                                    align: 'center',
									                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
									                                        //console.log(record);
									                                        var estado = 'check-circle-green-16.png';
									                                        if(record.get('estado')=='P'){
									                                        	estado = 'check-circle-black-16.png';
									                                        }
									                                        if(record.get('estado')=='T'){
									                                        	estado = 'check-circle-yellow.png';
									                                        }
									                                        metaData.style = "padding: 0px; margin: 0px";
									                                        return global.permisos({
									                                            type: 'link',
									                                            id_menu: cobranza.id_menu,
									                                            icons:[
									                                                {id_serv: 4, img: estado, qtip: 'Estado.', js: ""}

									                                            ]
									                                        });
									                                    }
									                                }/*,
									                                {
									                                    text: 'EDT',
									                                    dataIndex: 'estado',
									                                    //loocked : true,
									                                    width: 40,
									                                    align: 'center',
									                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
									                                        //console.log(record);
									                                        var estado = 'panasonic.png';
									                                        var fun = "cobranza.setAsignar("+rowIndex+",'X')";
									                                        if(record.get('estado')=='X'){//pago parcial
									                                        	estado = 'padlock-closed.png';
									                                        	fun = "cobranza.setAsignar("+rowIndex+",'P')";
									                                        }
									                                        if(record.get('estado')=='T'){//terminado
									                                        	estado = '1348695561_stock_mail-send-receive.png';
									                                        	fun=''
									                                        }
									                                        metaData.style = "padding: 0px; margin: 0px";
									                                        return global.permisos({
									                                            type: 'link',
									                                            id_menu: cobranza.id_menu,
									                                            icons:[
									                                                {id_serv: 2, img: estado, qtip: 'Pagar.', js: fun}

									                                            ]
									                                        });
									                                    }
									                                }*/
									                                /*,
									                                {
					                                                    xtype: 'checkcolumn',
					                                                    dataIndex: 'chk',
					                                                    width: 30,
					                                                    listeners: {
					                                                        checkchange: function (value, rowIndex, checked, eOpts) {
					                                                            //callcenter.TotalRecursos();
					                                                        }
					                                                    }
					                                                }*/
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
									                            },
									                            select:function(obj, record, index, eOpts ){
									                            	//scanning.setImageFile(record.get('path'),record.get('file'));
									                            	cobranza.getListSolicitudes(record.get('id_asesor'),record.get('id_age'),record.get('fecha'));
									                            }
									                        }
									                    }
													]
												},
												{
			                						region:'south',
			                						height:'50%',
			                						//layout:'border',
			                						border:false,
			                						layout:'border',
			                						items:[
			                							/*{
								                            xtype:'GridViewVertAS',
								                            id:cobranza.id,
								                            mode:2,
								                            tab:cobranza.id+'-tabContent',
								                            url:cobranza.url+'getDataMenuView/',
								                            back:'-contentAsesores',
								                            params:{sis_id:2}
								                        }*/
								                        {
					                						region:'north',
					                						height:40,
					                						//border:false,
					                						items:[
					                							{
																	//region:'north',
																	xtype:'panel',
																	layout:'hbox',
																	border:false,
																	height:40,
																	//bodyStyle: 'background: #F0EFEF;text-align:center;',
																	bodyStyle: 'background: #F0EFEF;text-align:center;',
																	//layout:'fit',
																	items:[
																		{
																	        xtype: 'label',
																	        //forId: 'myFieldId',
																	        text: 'CRÉDITOS',
																	        style: 'font: normal 15px Sans-serif;font-weight: bold;',
																	        padding:'10px 5px 5px 5px',
																	        width:'100%',
												                            anchor:'100%'
																	    }
																	]
																}
					                						]
					                					},
								                        {
									                        xtype: 'grid',
									                        region:'center',
									                        id: cobranza.id+'-grid-solicitudes', 
									                        store: Ext.create('Ext.data.Store',{
													            fields: [
													            	{name: 'id_age', type: 'string'},
													            	{name: 'fecha', type: 'string'},
													            	{name: 'id_creditos', type: 'string'},
													                {name: 'id_asesor', type: 'string'},
													                {name: 'nombre', type: 'string'},
													                {name: 'nombres', type: 'string'},
													                {name: 'ape_pat', type: 'string'},
													                {name: 'ape_mat', type: 'string'},
													                {name: 'dni', type: 'string'},
													                {name: 'monto_aprobado', type: 'string'},
													                {name: 'solicitudes', type: 'string'},
													                {name: 'sol_monto', type: 'string'},
													                {name: 'tot_cuotas', type: 'string'},
													                {name: 'valor_cuota', type: 'string'},
													                {name: 'mora', type: 'string'},
													                {name: 'total', type: 'string'},
													                {name: 'pagado', type: 'string'},
													                {name: 'saldo_cuota', type: 'string'},
													                {name: 'efectivo', type: 'string'}
													            ],
													            autoLoad:false,
													            proxy:{
													                type: 'ajax',
													                url: cobranza.url+'getListAsesores/',
													                reader:{
													                    type: 'json',
													                    rootProperty: 'data'
													                }/*,
													                extraParams:config.params*/
													            },
													            listeners:{
													                load: function(obj, records, successful, opts){
													                    console.log(records);
													                    //document.getElementById("menu_spinner").innerHTML = "";
													                }
													            }
													        }), 
									                        columnLines: true,
									                        //layout:'fit',
									                        columns:{
									                            items:[
									                            	{
									                            		text: 'N°',
																	    xtype: 'rownumberer',
																	    width: 30,
																	    sortable: false,
																	    locked: true//,
																	    /*renderer: function (value, metaData, record, rowIdx, colIdx, store) {
									                                        //console.log(record);
									                                        return store.indexOf(record);
									                                    }*/
																	},
																	{
									                                    text: 'Nombres',
									                                    dataIndex: 'nombre',
									                                    //loocked : true,
									                                    //width: 40,
									                                    flex:1,
									                                    align: 'left',
									                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
									                                        return value;
									                                    }
									                                },
																	{
																		text:'<div style="display: inline-flex;"><div style="width: 76px;">Créditos</div><div id="AnaEfect-1-EN" style="width:16px;"></div></div>',
																		align:'center',
																		//width: 100,
																		//flex:1,
																		menuDisabled:true,
																		columns:[
											                                {
											                                    text: 'Cantidad',
											                                    align:'center',
											                                    dataIndex: 'solicitudes',
											                                    width: 60,
											                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
											                                        metaData.style = "padding: 0px; margin: 0px";
											                                        return value;
											                                    }
											                                },
											                                {
											                                    text: 'Monto',
											                                    align:'right',
											                                    dataIndex: 'monto_aprobado',
											                                    width: 60,
											                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
											                                        metaData.style = "padding: 0px; margin: 0px";
											                                        return value;
											                                    }
											                                }
									                                	]
									                            	},
									                            	{
																		text:'<div style="display: inline-flex;"><div style="width: 76px;">Pendientes de Pago</div><div id="AnaEfect-1-EN" style="width:16px;"></div></div>',
																		align:'center',
																		//width: 100,
																		//flex:1,
																		menuDisabled:true,
																		columns:[
											                                {
											                                    text: 'Cuotas',
											                                    align:'center',
											                                    dataIndex: 'tot_cuotas',
											                                    width: 60,
											                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
											                                        metaData.style = "padding: 0px; margin: 0px";
											                                        return value;
											                                    }
											                                },
											                                {
											                                    text: 'Monto',
											                                    align:'right',
											                                    dataIndex: 'valor_cuota',
											                                    width: 60,
											                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
											                                        metaData.style = "padding: 0px; margin: 0px";
											                                        return value;
											                                    }
											                                },
											                                {
											                                    text: 'Mora',
											                                    align:'right',
											                                    dataIndex: 'mora',
											                                    width: 60,
											                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
											                                        metaData.style = "padding: 0px; margin: 0px";
											                                        return value;
											                                    }
											                                },
											                                {
											                                    text: 'Total',
											                                    align:'right',
											                                    dataIndex: 'total',
											                                    width: 60,
											                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
											                                        metaData.style = "padding: 0px; margin: 0px";
											                                        return value;
											                                    }
											                                },
									                                	]
									                            	},
									                            	/*{
																		text:'<div style="display: inline-flex;"><div style="width: 76px;">Cobrado</div><div id="AnaEfect-1-EN" style="width:16px;"></div></div>',
																		align:'center',
																		//width: 100,
																		//flex:1,
																		menuDisabled:true,
																		columns:[
											                                {
											                                    text: 'Cuotas',
											                                    align:'right',
											                                    dataIndex: 'cuotas_cobradas',
											                                    width: 60,
											                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
											                                        metaData.style = "padding: 0px; margin: 0px";
											                                        return value;
											                                    }
											                                },
											                                {
											                                    text: 'Monto',
											                                    align:'right',
											                                    dataIndex: 'pagado',
											                                    width: 60,
											                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
											                                        metaData.style = "padding: 0px; margin: 0px";
											                                        return value;
											                                    }
											                                }
									                                	]
									                            	},*/
									                            	{
									                                    text: 'Cobrado',
									                                    dataIndex: 'pagado',
									                                    //loocked : true,
									                                    //width: 40,
									                                    //flex:1,
									                                    width: 60,
									                                    align: 'right',
									                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
									                                    	metaData.style = "padding: 0px; margin: 0px";
									                                        return value;
									                                    }
									                                },
									                            	/*{
																		text:'<div style="display: inline-flex;"><div style="width: 76px;">Cobrado</div><div id="AnaEfect-1-EN" style="width:16px;"></div></div>',
																		align:'center',
																		//width: 100,
																		//flex:1,
																		menuDisabled:true,
																		columns:[
											                                {
											                                    text: 'Cuotas',
											                                    align:'right',
											                                    dataIndex: 'cuotas_cobradas',
											                                    width: 60,
											                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
											                                        metaData.style = "padding: 0px; margin: 0px";
											                                        return value;
											                                    }
											                                },
											                                {
											                                    text: 'Monto',
											                                    align:'right',
											                                    dataIndex: 'sol_monto_cobrado',
											                                    width: 60,
											                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
											                                        metaData.style = "padding: 0px; margin: 0px";
											                                        return value;
											                                    }
											                                }
									                                	]
									                            	},*//*
									                            	{
																		text:'<div style="display: inline-flex;"><div style="width: 76px;">Pendiente</div><div id="AnaEfect-1-EN" style="width:16px;"></div></div>',
																		align:'center',
																		//width: 100,
																		//flex:1,
																		menuDisabled:true,
																		columns:[
											                                {
											                                    text: 'Cuotas',
											                                    align:'right',
											                                    dataIndex: 'coutas_pendientes',
											                                    width: 60,
											                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
											                                        metaData.style = "padding: 0px; margin: 0px";
											                                        return value;
											                                    }
											                                },
											                                {
											                                    text: 'Monto',
											                                    align:'right',
											                                    dataIndex: 'tot_saldo',
											                                    width: 60,
											                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
											                                        metaData.style = "padding: 0px; margin: 0px";
											                                        return value;
											                                    }
											                                }
									                                	]
									                            	},*/
																	{
									                                    text: 'ST',
									                                    dataIndex: 'estado',
									                                    //loocked : true,
									                                    width: 40,
									                                    //flex:1,
									                                    align: 'center',
									                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
									                                        //console.log(record);
									                                        var estado = 'check-circle-green-16.png';
									                                        if(record.get('estado')=='P'){
									                                        	estado = 'check-circle-black-16.png';
									                                        }
									                                        if(record.get('estado')=='T'){
									                                        	estado = 'check-circle-yellow.png';
									                                        }
									                                        metaData.style = "padding: 0px; margin: 0px";
									                                        return global.permisos({
									                                            type: 'link',
									                                            id_menu: cobranza.id_menu,
									                                            icons:[
									                                                {id_serv: 4, img: estado, qtip: 'Estado.', js: ""}

									                                            ]
									                                        });
									                                    }
									                                }/*,
									                                {
									                                    text: 'EDT',
									                                    dataIndex: 'estado',
									                                    //loocked : true,
									                                    width: 40,
									                                    align: 'center',
									                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
									                                        //console.log(record);
									                                        var estado = 'panasonic.png';
									                                        var fun = "cobranza.setAsignar("+rowIndex+",'X')";
									                                        if(record.get('estado')=='X'){//pago parcial
									                                        	estado = 'padlock-closed.png';
									                                        	fun = "cobranza.setAsignar("+rowIndex+",'P')";
									                                        }
									                                        if(record.get('estado')=='T'){//terminado
									                                        	estado = '1348695561_stock_mail-send-receive.png';
									                                        	fun=''
									                                        }
									                                        metaData.style = "padding: 0px; margin: 0px";
									                                        return global.permisos({
									                                            type: 'link',
									                                            id_menu: cobranza.id_menu,
									                                            icons:[
									                                                {id_serv: 2, img: estado, qtip: 'Pagar.', js: fun}

									                                            ]
									                                        });
									                                    }
									                                }*/
									                                /*,
									                                {
					                                                    xtype: 'checkcolumn',
					                                                    dataIndex: 'chk',
					                                                    width: 30,
					                                                    listeners: {
					                                                        checkchange: function (value, rowIndex, checked, eOpts) {
					                                                            //callcenter.TotalRecursos();
					                                                        }
					                                                    }
					                                                }*/
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
									                            },
									                            select:function(obj, record, index, eOpts ){
									                            	//scanning.setImageFile(record.get('path'),record.get('file'));
									                            	//cobranza.getListSolicitudes(record.get('id_asesor'));
									                            	//var data = record.data;
									                            	cobranza.index=index;
									                            	cobranza.setDataSolicitud(cobranza.index);
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
				        	//width:'50%',
				        	width:720,
				        	layout:'border',
				        	bodyStyle: 'background: #FFF;',
				        	border:false,
				        	items:[
				        		{
				         			layout:'border',
				         			region:'center',
				         			bodyStyle: 'background: transparent',
				         			border:false,
				         			items:[
				         				{
											region:'north',
											xtype:'panel',
											layout:'hbox',
											border:false,
											height:40,
											bodyStyle: 'background: #F0EFEF;text-align:center;',
											//layout:'fit',
											items:[
												{
											        xtype: 'label',
											        //forId: 'myFieldId',
											        text: 'INFORMACIÓN DEL CRÉDITO',
											        style: 'font: normal 18px Sans-serif;font-weight: bold;',
											        padding:'15px 5px 5px 25px',
											        width:'100%',
						                            anchor:'100%'
											    }
											]
										},
										{
											region:'center',
											layout:'border',
											bodyStyle: 'background: transparent',
											items:[
												{
													layout:'border',
													region:'north',
													bodyStyle: 'background: transparent',
													height:310,
													border:false,
													items:[
														{
															region:'north',
															layout:'hbox',
															bodyStyle: 'background: transparent',
															padding:'5px 5px 5px 5px',
															height:70,
															border:true,
															items:[
																{
										                            xtype: 'textfield',	
										                            fieldLabel: 'IDPER',
										                            id:cobranza.id+'-sol-txt-id-per',
										                            hidden:true,
										                            bodyStyle: 'background: transparent',
												                    padding:'15px 5px 5px 25px',
										                            //id:creditos.id+'-txt-dni',
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
															        xtype: 'datefield',
															        id:cobranza.id+'-sol-date-fecha-solicitud',
															        readOnly:true,
															        padding:'5px 5px 5px 5px',
															        //name: 'date1',
															        labelAlign:'top',
															        format:'Y-m-d',
															        //flex:1,
															        width:87,
										                            //height:40,
															        //labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
										                            //fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
															        fieldLabel: 'Solicitado',
															        value:''
															    },
																{
						                                            xtype:'combo',
						                                            fieldLabel: 'Agencia',
						                                            id:cobranza.id+'-sol-cmb-agencia',
						                                            readOnly:true,
						                                            store: store_agencias,
						                                            queryMode: 'local',
						                                            triggerAction: 'all',
						                                            valueField: 'cod_age',
						                                            displayField: 'nombre',
						                                            emptyText: '[Seleccione]',
						                                            labelAlign:'right',
						                                            //allowBlank: false,
						                                            labelAlign:'top',
										                            //width:'92%',
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
						                                                	//cobranza.getUbigeo({VP_OP:'X',VP_VALUE:'100601'},obj,'100601');
						                                                },
						                                                select:function(obj, records, eOpts){
						                                        			var obja = Ext.getCmp(cobranza.id+'-sol-cmb-asesor');
			                            									cobranza.getReload(obja,{vp_cod_age:obj.getValue()});
						                                                }
						                                            }
						                                        },
										                        {
						                                            xtype:'combo',
						                                            fieldLabel: 'Asesor',
						                                            id:cobranza.id+'-sol-cmb-asesor',
						                                            readOnly:true,
						                                            store: store_asesores,
						                                            queryMode: 'local',
						                                            triggerAction: 'all',
						                                            valueField: 'id_asesor',
						                                            displayField: 'nombre',
						                                            emptyText: '[Seleccione]',
						                                            labelAlign:'right',
						                                            //allowBlank: false,
						                                            labelAlign:'top',
										                            //width:'92%',
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
						                                                	//cobranza.getUbigeo({VP_OP:'X',VP_VALUE:'100601'},obj,'100601');
						                                                },
						                                                select:function(obj, records, eOpts){
						                                        
						                                                }
						                                            }
						                                        },
						                                        {
						                                            xtype:'combo',
						                                            fieldLabel: 'Motivo',
						                                            id:cobranza.id+'-sol-cmb-motivo',
						                                            store: store_motivos,
						                                            queryMode: 'local',
						                                            triggerAction: 'all',
						                                            valueField: 'id_mot',
						                                            displayField: 'nombre',
						                                            emptyText: '[Seleccione]',
						                                            labelAlign:'right',
						                                            readOnly:true,
						                                            //allowBlank: false,
						                                            labelAlign:'top',
										                            //width:'92%',
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
						                                                	//cobranza.getUbigeo({VP_OP:'X',VP_VALUE:'100601'},obj,'100601');
						                                                },
						                                                select:function(obj, records, eOpts){
						                                        
						                                                }
						                                            }
						                                        }
															]
														},
														{
															region:'center',
															bodyStyle: 'background: transparent',
															border:false,
															layout:'border',
															items:[
																{
																	region:'center',
																	bodyStyle: 'background: transparent',
																	//height:80,
																	//layout:'border',
																	//flex:1,
																	//padding:'5px 5px 5px 5px',
																	border:false,
																	items:[
																		{
																			layout:'column',
																			//region:'north',
																			//height:100,
																			//flex:1,
																			border:true,
																			padding:'5px 5px 5px 5px',
																			items:[
																				{
														                            xtype: 'textfield',	
														                            fieldLabel: 'N° Solicitud',
														                            id:cobranza.id+'-sol-txt-id-solicitud',
														                            bodyStyle: 'background: transparent',
																                    padding:'15px 5px 5px 25px',
														                            //id:cobranza.id+'-txt-dni',
														                            labelWidth:50,
														                            hidden:true,
														                            readOnly:true,
														                            labelAlign:'top',
														                            //flex:1,
														                            columnWidth: 0.2,
														                            //width:70,
														                            //height:60,
														                            //labelStyle: "font-size:17px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
														                            //fieldStyle: 'font-size:25px; text-align: center; font-weight: bold',
														                            value:'0',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        },
																				{
														                            xtype: 'textfield',	
														                            fieldLabel: 'N° Solicitud',
														                            id:cobranza.id+'-sol-txt-nro-solicitud',
														                            bodyStyle: 'background: transparent',
																                    padding:'15px 5px 5px 10px',
														                            //id:cobranza.id+'-txt-dni',
														                            labelWidth:50,
														                            readOnly:true,
														                            labelAlign:'top',
														                            maskRe: new RegExp("[0-9]+"),
														                            //width:70,
														                            columnWidth: 0.2,
														                            //flex:1,
														                            //height:60,
														                            //labelStyle: "font-size:17px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:12px; text-align: right; font-weight: bold',
														                            value:'0',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        },
																				{
														                            xtype:'combo',
														                            fieldLabel: 'Moneda',
														                            bodyStyle: 'background: transparent',
																                    padding:'15px 5px 5px 25px',
														                            id:cobranza.id+'-sol-cmb-moneda',
														                            store: store_moneda,
														                            queryMode: 'local',
														                            triggerAction: 'all',
														                            valueField: 'code',
														                            displayField: 'name',
														                            emptyText: '[Seleccione]',
														                            labelAlign:'right',
														                            //allowBlank: false,
														                            labelAlign:'top',
														                            labelWidth: 50,
														                            //width:80,
														                            columnWidth: 0.2,
														                            //flex:1,
														                            anchor:'100%',
														                            readOnly:true,
														                            //labelStyle: "font-size:17px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
														                            //fieldStyle: 'font-size:25px; text-align: center; font-weight: bold',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                    // obj.getStore().load();
														                                    obj.setValue('SOL');
														                                },
														                                select:function(obj, records, eOpts){
														                        
														                                }
														                            }
														                        },
																				{
														                            xtype: 'textfield',	
														                            fieldLabel: 'M.Solicitado',
														                            id:cobranza.id+'-sol-txt-monto',
														                            bodyStyle: 'background: transparent',
																                    padding:'15px 5px 5px 25px',
														                            //id:cobranza.id+'-txt-dni',
														                            labelWidth:50,
														                            readOnly:true,
														                            labelAlign:'top',
														                            //width:80,
														                            //flex:1,
														                            columnWidth: 0.2,
														                            //height:60,
														                            //labelStyle: "font-size:17px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:12px; text-align: right; font-weight: bold',
														                            value:'1444.40',
														                            maskRe: new RegExp("[0-9.]+"),
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        },
														                        {
														                            xtype:'combo',
														                            fieldLabel: 'Tipo de Cliente',
														                            bodyStyle: 'background: transparent',
																                    padding:'15px 5px 5px 25px',
														                            id:cobranza.id+'-sol-txt-tipo-cliente',
														                            store: Ext.create('Ext.data.ArrayStore', {
																				        storeId: 'estado',
																				        autoLoad: true,
																				        data: [
																							['F','Frecuente'],
																						    ['N','Nuevo']
																						],
																				        fields: ['code', 'name']
																				    }),
														                            queryMode: 'local',
														                            triggerAction: 'all',
														                            valueField: 'code',
														                            displayField: 'name',
														                            emptyText: '[Seleccione]',
														                            labelAlign:'right',
														                            //allowBlank: false,
														                            labelAlign:'top',
														                            labelWidth: 50,
														                            //width:100,
														                            //flex:1,
														                            columnWidth: 0.2,
														                            anchor:'100%',
														                            readOnly:true,
														                            //labelStyle: "font-size:17px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
														                            //fieldStyle: 'font-size:25px; text-align: center; font-weight: bold',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                    // obj.getStore().load();
														                                    obj.setValue('N');
														                                },
														                                select:function(obj, records, eOpts){
														                        
														                                }
														                            }
														                        },
														                        {
														                            xtype:'combo',
														                            fieldLabel: 'Excepcion',
														                            bodyStyle: 'background: transparent',
																                    padding:'15px 5px 5px 25px',
														                            id:cobranza.id+'-sol-cmb-excepcion',
														                            store: Ext.create('Ext.data.ArrayStore', {
																				        storeId: 'estado',
																				        autoLoad: true,
																				        data: [
																							['Y','SI'],
																						    ['N','NO']
																						],
																				        fields: ['code', 'name']
																				    }),
														                            queryMode: 'local',
														                            triggerAction: 'all',
														                            valueField: 'code',
														                            displayField: 'name',
														                            emptyText: '[Seleccione]',
														                            labelAlign:'right',
														                            //allowBlank: false,
														                            labelAlign:'top',
														                            labelWidth: 50,
														                            //width:100,
														                            //flex:1,
														                            columnWidth: 0.2,
														                            anchor:'100%',
														                            readOnly:true,
														                            //labelStyle: "font-size:17px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
														                            //fieldStyle: 'font-size:25px; text-align: center; font-weight: bold',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                    // obj.getStore().load();
														                                    obj.setValue('N');
														                                },
														                                select:function(obj, records, eOpts){
														                        
														                                }
														                            }
														                        },/*,
														                        {
																			        xtype: 'datefield',
																			        id:cobranza.id+'-sol-date-fecha',
																			        padding:'15px 5px 5px 25px',
																			        //name: 'date1',
																			        labelAlign:'top',
																			        width:100,
														                            //height:60,
																			        //labelStyle: "font-size:17px;font-weight:bold;padding:17px 0px 0px 0px;text-align: center;font-weight: bold",
												                            		//fieldStyle: 'font-size:25px; text-align: center; font-weight: bold',
																			        fieldLabel: 'Date Field',
																			        value:'22/01/2019'
																			    }*/	
																			]
																		},
																		{
																			layout:'hbox',
																			padding:'5px 5px 5px 5px',
																			//padding:'5px 5px 5px 5px',
																			//border:false,
																			//flex:1,
																			items:[
														                        {
														                            xtype: 'textfield',
														                            id:cobranza.id+'-sol-txt-import-aprobado',
														                            fieldLabel: 'M.Aprobado',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 10px',
														                            //id:cobranza.id+'-txt-dni',
														                            labelWidth:50,
														                            readOnly:true,
														                            labelAlign:'top',
														                            //columnWidth: 0.15,
														                            flex:1,
														                            //width:'100%',
														                            //flex:1,
														                            maskRe: new RegExp("[0-9.]+"),
														                            //height:40,
														                            //labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:12px; text-align: right; font-weight: bold',
														                            value:'0',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        },
														                        {
														                            xtype: 'textfield', 
														                            id:cobranza.id+'-sol-txt-numero-cuotas', 
														                            fieldLabel: 'Cuotas',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:cobranza.id+'-txt-dni',
														                            labelWidth:50,
														                            readOnly:true,
														                            labelAlign:'top',
														                            //width:'100%',
														                            //columnWidth: 0.1,
														                            flex:1,
														                            maskRe: new RegExp("[0-9]+"),
														                            height:40,
														                            //labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:12px; text-align: right; font-weight: bold',
														                            value:'0',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        },
														                        {
														                            xtype: 'textfield', 
														                            id:cobranza.id+'-sol-txt-interes', 
														                            fieldLabel: 'Interes',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:cobranza.id+'-txt-dni',
														                            labelWidth:50,
														                            readOnly:true,
														                            labelAlign:'top',
														                            //width:'100%',
														                            //columnWidth: 0.1,
														                            flex:1,
														                            maskRe: new RegExp("[0-9.]+"),
														                            height:40,
														                            //labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:12px; text-align: right; font-weight: bold',
														                            value:'0',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        },
														                        {
														                            xtype: 'textfield', 
														                            id:cobranza.id+'-sol-txt-mora', 
														                            fieldLabel: 'Mora',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:cobranza.id+'-txt-dni',
														                            labelWidth:50,
														                            readOnly:true,
														                            labelAlign:'top',
														                            //width:'100%',
														                            //columnWidth: 0.1,
														                            flex:1,
														                            maskRe: new RegExp("[0-9.]+"),
														                            height:40,
														                            //labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:12px; text-align: right; font-weight: bold',
														                            value:'0',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        },
														                        {
																			        xtype: 'datefield',
																			        id:cobranza.id+'-sol-date-fecha-1-letra',
																			        hidden:true,
																			        padding:'5px 5px 5px 5px',
																			        //name: 'date1',
																			        labelAlign:'top',
																			        format:'Y-m-d',
																			        //flex:1,
																			        //columnWidth: 0,
														                            height:40,
																			        //labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            //fieldStyle: 'font-size:15px; text-align: center; font-weight: bold',
																			        fieldLabel: '1° Letra',
																			        value:''
																			    },
																			    {
														                            xtype: 'textfield', 
														                            id:cobranza.id+'-sol-txt-tot_credito', 
														                            fieldLabel: 'Total Crédito',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:cobranza.id+'-txt-dni',
														                            labelWidth:50,
														                            readOnly:true,
														                            labelAlign:'top',
														                            //width:'100%',
														                            //columnWidth: 0.15,
														                            flex:1,
														                            maskRe: new RegExp("[0-9.]+"),
														                            height:40,
														                            //labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:12px; text-align: right; font-weight: bold',
														                            value:'0',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        },
														                        {
														                            xtype: 'textfield', 
														                            id:cobranza.id+'-sol-txt-tot_pagado', 
														                            fieldLabel: 'Total Pagado',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:cobranza.id+'-txt-dni',
														                            labelWidth:50,
														                            readOnly:true,
														                            labelAlign:'top',
														                            //width:'100%',
														                            //columnWidth: 0.15,
														                            flex:1,
														                            maskRe: new RegExp("[0-9.]+"),
														                            height:40,
														                            //labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:12px; text-align: right; font-weight: bold',
														                            value:'0',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        },
														                        {
														                            xtype: 'textfield', 
														                            id:cobranza.id+'-sol-txt-tot_saldo', 
														                            fieldLabel: 'Total Saldo',
														                            bodyStyle: 'background: transparent',
																                    padding:'5px 10px 5px 5px',
														                            //id:cobranza.id+'-txt-dni',
														                            labelWidth:50,
														                            readOnly:true,
														                            labelAlign:'top',
														                            //width:'100%',
														                            flex:1,
														                            //columnWidth: 0.15,
														                            maskRe: new RegExp("[0-9.]+"),
														                            height:40,
														                            //labelStyle: "font-size:15px;font-weight:bold;padding:5px 0px 0px 0px;text-align: center;font-weight: bold",
														                            fieldStyle: 'font-size:12px; text-align: right; font-weight: bold',
														                            value:'0',
														                            //anchor:'100%',
														                            listeners:{
														                                afterrender:function(obj, e){
														                                }
														                            }
														                        }
														                    ]
														                },
														                {
																			layout:'column',
																			xtype: 'fieldset',
																			title: 'Nota',
																			bodyStyle: 'background: transparent',
																			//region:'north',
																			//height:100,
																			//flex:1,
																			border:true,
																			padding:'5px 5px 5px 5px',
																			margin:'5px 5px 5px 5px',
																			items:[
																				{
																			        xtype: 'textareafield',
																			        readOnly:true,
																			        id: cobranza.id + '-txt-nota',
																			        columnWidth: 1,
																			        //name: 'textarea1',
																			        //iconAlign: 'top',
																			        //fieldLabel: 'Nota',
																			        value: ''
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
													region:'center',
													layout:'border',
													border:false,
													items:[
														/*{
															region:'north',
															xtype:'panel',
															layout:'hbox',
															border:false,
															height:40,
															bodyStyle: 'background: #9CC4DE;text-align:center;',
															//layout:'fit',
															items:[
																{
															        xtype: 'label',
															        //forId: 'myFieldId',
															        text: 'LISTADO DE CUOTAS',
															        style: 'font: normal 18px Sans-serif;font-weight: bold;',
															        padding:'15px 5px 5px 25px',
															        width:'100%',
										                            anchor:'100%'
															    }
															]
														},*/
														{
											            	region:'north',
											            	height:70,
											            	//layout:'border',
											            	items:[
											            		{
											            			layout:'hbox',
											            			//height:50,
											            			items:[
											            				{
																	        xtype: 'datefield',
																	        id:cobranza.id+'-sol-date-fecha-pago',
																	        //readOnly:true,
																	        padding:'10px 5px 5px 5px',
																	        //name: 'date1',
																	        labelAlign:'top',
																	        format:'Y-m-d',
																	        //flex:1,
																	        flex:1,
												                            height:25,
																	        labelStyle: "font-size:12px;font-weight:bold;padding:0px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:9px; text-align: right; font-weight: bold',
																	        fieldLabel: 'Fecha Pago',
																	        value:new Date(),
																	        maxValue:new Date()
																	    },
													            		{
												                            xtype: 'textfield',	
												                            fieldLabel: 'Cuotas',
												                            id:cobranza.id+'-sol-txt-cuotas-pago',
												                            bodyStyle: 'background: transparent',
														                    padding:'10px 5px 5px 5px',
												                            //id:cobranza.id+'-txt-dni',
												                            labelWidth:50,
												                            readOnly:true,
												                            labelAlign:'top',
												                            //width:80,
												                            flex:1,
												                            //columnWidth: 0.2,
												                            height:25,
												                            labelStyle: "font-size:12px;font-weight:bold;padding:0px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:11px; text-align: right; font-weight: bold',
												                            value:'',
												                            maskRe: new RegExp("[0-9.]+"),
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
												                        {
												                            xtype: 'textfield',	
												                            fieldLabel: 'Valor',
												                            id:cobranza.id+'-sol-txt-monto-pago',
												                            bodyStyle: 'background: transparent',
														                    padding:'10px 5px 5px 5px',
												                            //id:cobranza.id+'-txt-dni',
												                            labelWidth:65,
												                            readOnly:true,
												                            labelAlign:'top',
												                            //width:80,
												                            flex:1,
												                            //columnWidth: 0.2,
												                            height:25,
												                            labelStyle: "font-size:12px;font-weight:bold;padding:0px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:11px; text-align: right; font-weight: bold',
												                            value:'',
												                            maskRe: new RegExp("[0-9.]+"),
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
												                        {
												                            xtype: 'textfield',	
												                            fieldLabel: 'Mora',
												                            id:cobranza.id+'-sol-txt-monto-mora',
												                            bodyStyle: 'background: transparent',
														                    padding:'10px 5px 5px 5px',
												                            //id:cobranza.id+'-txt-dni',
												                            labelWidth:65,
												                            readOnly:true,
												                            labelAlign:'top',
												                            //width:80,
												                            flex:1,
												                            //columnWidth: 0.2,
												                            height:25,
												                            labelStyle: "font-size:12px;font-weight:bold;padding:0px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:11px; text-align: right; font-weight: bold',
												                            value:'',
												                            maskRe: new RegExp("[0-9.]+"),
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
												                        {
												                            xtype: 'textfield',	
												                            fieldLabel: 'Total',
												                            id:cobranza.id+'-sol-txt-monto-total',
												                            bodyStyle: 'background: transparent',
														                    padding:'10px 5px 5px 5px',
												                            //id:cobranza.id+'-txt-dni',
												                            labelWidth:65,
												                            readOnly:true,
												                            labelAlign:'top',
												                            //width:80,
												                            flex:1,
												                            //columnWidth: 0.2,
												                            height:25,
												                            labelStyle: "font-size:12px;font-weight:bold;padding:0px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:11px; text-align: right; font-weight: bold',
												                            value:'',
												                            maskRe: new RegExp("[0-9.]+"),
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                }
												                            }
												                        },
												                        {
												                            xtype: 'textfield',	
												                            fieldLabel: 'Pago',
												                            id:cobranza.id+'-sol-txt-monto-real-pago',	
												                            bodyStyle: 'background: transparent',
														                    padding:'10px 5px 5px 5px',
												                            //id:cobranza.id+'-txt-dni',
												                            labelWidth:65,
												                            //readOnly:true,
												                            labelAlign:'top',
												                            //width:80,
												                            flex:1,
												                            //columnWidth: 0.2,
												                            height:25,
												                            labelStyle: "font-size:12px;font-weight:bold;padding:0px 0px 0px 0px;text-align: center;font-weight: bold",
												                            fieldStyle: 'font-size:11px; text-align: right; font-weight: bold',
												                            value:'',
												                            maskRe: new RegExp("[0-9.]+"),
												                            //anchor:'100%',
												                            listeners:{
												                                afterrender:function(obj, e){
												                                },
												                                keypress:function(e) {
												                                	//cobranza.setPagarCuotas();
												                                }
												                            }
												                        },
												                        {
														                    xtype: 'button',
														                    margin:'5px 5px 5px 5px',
														                    icon: '/images/icon/1315404769_gear_wheel.png',
														                    //glyph: 72,
														                    //columnWidth: 0.1,
														                    width:70,
														                    text: 'PAGAR',
														                    scale: 'medium',
														                    iconAlign: 'top',
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
													                            	cobranza.setPagarCuotas('C');
													                            }
													                        }
														                },
														                {
														                    xtype: 'button',
														                    margin:'5px 5px 5px 5px',
														                    icon: '/images/icon/pdf.png',
														                    //glyph: 72,
														                    //columnWidth: 0.1,
														                    width:70,
														                    text: 'IMPRIMIR',
														                    scale: 'medium',
														                    iconAlign: 'top',
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
													                            	cobranza.setPagar(); 
													                            }
													                        }
														                }
											            			]
											            		}
											            	]
											            },
														{
															region:'center',
															layout:'fit',
															border:false,
															items:[
																{
											                        xtype: 'grid',
											                        id: cobranza.id + '-grid-cuotas',
											                        store: store_cobranza_detalle, 
											                        columnLines: true,
											                        //layout:'fit',
											                        columns:{
											                            items:[
											                            	{
											                            		text: 'N°',
																			    xtype: 'rownumberer',
																			    width: 40,
																			    sortable: false,
																			    locked: true,
																			    renderer: function (value, metaData, record, rowIdx, colIdx, store) {
											                                        //console.log(record);
											                                        return store.indexOf(record);
											                                    }
																			},
																			{
																				text:'<div style="display: inline-flex;"><div style="width: 76px;">FECHA</div><div id="AnaEfect-1-EN" style="width:16px;"></div></div>',
																				align:'center',
																				//width: 100,
																				//flex:1,
																				menuDisabled:true,
																				columns:[
													                                {
													                                    text: 'DIA',
													                                    align:'center',
													                                    dataIndex: 'DIA',
													                                    width: 50,
													                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
													                                        //console.log(record);
													                                        var DAT = value;
													                                        if(record.get('estado')=='S'){
													                                        	DAT = '';
													                                        }
													                                        metaData.style = "padding: 0px; margin: 0px";
													                                        return DAT;
													                                    }
													                                },
													                                {
													                                    text: 'MES',
													                                    align:'center',
													                                    dataIndex: 'MES',
													                                    width: 50,
													                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
													                                        //console.log(record);
													                                        var DAT = value;
													                                        if(record.get('estado')=='S'){
													                                        	DAT = '';
													                                        }
													                                        metaData.style = "padding: 0px; margin: 0px";
													                                        return DAT;
													                                    }
													                                }
											                                	]
											                            	},
											                            	{
																				text:'<div style="display: inline-flex;"><div style="width: 76px;">CUOTA</div><div id="AnaEfect-1-EN" style="width:16px;"></div></div>',
																				align:'center',
																				//flex:1,
																				menuDisabled:true,
																				columns:[
													                                {
													                                    text: 'DIARIA',
													                                    align:'right',
													                                    dataIndex: 'valor_cuota',
													                                    width: 80,
													                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
													                                        //console.log(record);
													                                        var DAT = value;
													                                        if(record.get('estado')=='S'){
													                                        	DAT = '';
													                                        }
													                                        metaData.style = "padding: 0px; margin: 0px";
													                                        return DAT;
													                                    }
													                                }
													                            ]
													                        },
													                        {
																				text:'<div style="display: inline-flex;"><div style="width: 76px;">MONTO</div><div id="AnaEfect-1-EN" style="width:16px;"></div></div>',
																				align:'center',
																				//flex:1,
																				menuDisabled:true,
																				columns:[
													                                {
													                                    text: 'PAGADO',
													                                    align:'right',
													                                    dataIndex: 'pagado',
													                                    width: 80,
													                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
													                                        //console.log(record);
													                                        var DAT = value;
													                                        if(record.get('estado')=='S'){
													                                        	DAT = '';
													                                        }
													                                        metaData.style = "padding: 0px; margin: 0px";
													                                        return DAT;
													                                    }
													                                }
													                            ]
													                        },
													                        {
																				text:'<div style="display: inline-flex;"><div style="width: 76px;">FECHA</div><div id="AnaEfect-1-EN" style="width:16px;"></div></div>',
																				align:'center',
																				//flex:1,
																				menuDisabled:true,
																				columns:[
													                                {
													                                    text: 'DIA',
													                                    align:'center',
													                                    dataIndex: 'PDIA',
													                                    width: 50,
													                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
													                                        //console.log(record);
													                                        var DAT = value;
													                                        if(record.get('estado')=='S'){
													                                        	DAT = '';
													                                        }
													                                        metaData.style = "padding: 0px; margin: 0px";
													                                        return DAT;
													                                    }
													                                },
													                                {
													                                    text: 'MES',
													                                    align:'center',
													                                    dataIndex: 'PMES',
													                                    width: 50,
													                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
													                                        //console.log(record);
													                                        var DAT = value;
													                                        if(record.get('estado')=='S'){
													                                        	DAT = '';
													                                        }
													                                        metaData.style = "padding: 0px; margin: 0px";
													                                        return DAT;
													                                    }
													                                }
											                                	]
											                            	},
											                            	{
																				text:'<div style="display: inline-flex;"><div style="width: 76px;">MORA</div><div id="AnaEfect-1-EN" style="width:16px;"></div></div>',
																				align:'center',
																				//flex:1,
																				menuDisabled:true,
																				columns:[
													                                {
													                                    text: 'S/.',
													                                    align:'right',
													                                    dataIndex: 'mora',
													                                    width: 60,
													                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
													                                        //console.log(record);
													                                        var DAT = value;
													                                        if(record.get('estado')=='S'){
													                                        	DAT = '';
													                                        }
													                                        metaData.style = "padding: 0px; margin: 0px";
													                                        return DAT;
													                                    }
													                                },
													                                {
													                                    text: 'DIAS',
													                                    align:'center',
													                                    dataIndex: 'dias',
													                                    width: 50,
													                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
													                                        //console.log(record);
													                                        var DAT = value;
													                                        if(record.get('estado')=='S'){
													                                        	DAT = '';
													                                        }
													                                        metaData.style = "padding: 0px; margin: 0px";
													                                        return DAT;
													                                    }
													                                }
											                                	]
											                            	},
											                                {
																				text:'<div style="display: inline-flex;"><div style="width: 76px;">SALDO A</div><div id="AnaEfect-1-EN" style="width:16px;"></div></div>',
																				align:'center',
																				//flex:1,
																				menuDisabled:true,
																				columns:[
													                                {
													                                    text: 'PAGAR',
													                                    align:'right',
													                                    dataIndex: 'saldo_cuota',
													                                    width: 80
													                                }
													                            ]
													                        },
																			{
											                                    text: 'ST',
											                                    dataIndex: 'estado',
											                                    //loocked : true,
											                                    //width: 40,
											                                    flex:1,
											                                    align: 'center',
											                                    renderer: function(value, metaData, record, rowIndex, colIndex, store, view){
											                                        //console.log(record);
											                                        var estado = 'check-circle-green-16.png';
											                                        if(record.get('estado')=='P'){
											                                        	estado = 'check-circle-black-16.png';
											                                        }
											                                        if(record.get('estado')=='T'){
											                                        	estado = 'check-circle-yellow.png';
											                                        }
											                                        metaData.style = "padding: 0px; margin: 0px";
											                                        return global.permisos({
											                                            type: 'link',
											                                            id_menu: cobranza.id_menu,
											                                            icons:[
											                                                {id_serv: 4, img: estado, qtip: 'Estado.', js: ""}

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
											                                        var estado = 'panasonic.png';
											                                        var qtip='Pagar.';
											                                        var fun = "cobranza.setAsignar("+rowIndex+",'X')";
											                                        if(record.get('estado')=='X'){//pago parcial
											                                        	estado = 'padlock-closed.png';
											                                        	fun = "cobranza.setAsignar("+rowIndex+",'P')";
											                                        }
											                                        if(record.get('estado')=='C'){//terminado
											                                        	estado = 'Lock.png';
											                                        	fun=''
											                                        	qtip='Pagado';
											                                        }
											                                        if(record.get('estado')=='S'){//terminado
											                                        	estado = 'blue_flag_G.png';
											                                        	fun=''
											                                        	qtip='Saldo Inicial';
											                                        }
											                                        metaData.style = "padding: 0px; margin: 0px";
											                                        return global.permisos({
											                                            type: 'link',
											                                            id_menu: cobranza.id_menu,
											                                            icons:[
											                                                {id_serv: 4, img: estado, qtip: qtip, js: fun}

											                                            ]
											                                        });
											                                    }
											                                }
											                                /*,
											                                {
							                                                    xtype: 'checkcolumn',
							                                                    dataIndex: 'chk',
							                                                    width: 30,
							                                                    listeners: {
							                                                        checkchange: function (value, rowIndex, checked, eOpts) {
							                                                            //callcenter.TotalRecursos();
							                                                        }
							                                                    }
							                                                }*/
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
											]
										}
				         			]
				         		}
				        	]
				        }
					],
					listeners:{
						beforerender: function(obj, opts){
	                        global.state_item_menu(cobranza.id_menu, true);
	                    },
	                    afterrender: function(obj, e){
	                    	//cobranza.getReloadGridcobranza('');
	                        tab.setActiveTab(obj);
	                        global.state_item_menu_config(obj,cobranza.id_menu);
	                        //Ext.getCmp(cobranza.id+'-txt-dni').focus();
	                        /*var obj = Ext.getCmp(cobranza.id+'-sol-txt-centro-trabajo');
							cobranza.getReload(obj,{vp_op:'N',vp_id:0,vp_nombre:''});
							cobranza.getSelectUbi();*/
							//cobranza.setCollapse();
	                    },
	                    beforeclose:function(obj,opts){
	                    	global.state_item_menu(cobranza.id_menu, false);
	                    }
					}

				}).show();
				/*Ext.EventManager.onWindowResize(function(){
					cobranza.setCollapse();
				});*/
			},
			setPagarCuotas:function(op){
				
				var vp_id_agencia 		= Ext.getCmp(cobranza.id+'-sol-cmb-agencia').getValue(); 
				var vp_id_asesor 		= Ext.getCmp(cobranza.id+'-sol-cmb-asesor').getValue();
				var vp_id_solicitud 	= Ext.getCmp(cobranza.id+'-sol-txt-id-solicitud').getValue();

				var fecha=Ext.getCmp(cobranza.id+'-sol-date-fecha-pago').getRawValue();
				var cuotas=Ext.getCmp(cobranza.id+'-sol-txt-cuotas-pago').getValue();
				var monto = Ext.getCmp(cobranza.id+'-sol-txt-monto-pago').getValue();
				var mora = Ext.getCmp(cobranza.id+'-sol-txt-monto-mora').getValue();
				var real=Ext.getCmp(cobranza.id+'-sol-txt-monto-real-pago').getValue();
				
				global.Msg({
                    msg: '¿Seguro de Pagar cuota(s)?',
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(cobranza.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:cobranza.url+'setSaveCuota/',
			                    params:{
			                    	vp_op 			:op,
			                    	vp_id_creditos 	:vp_id_solicitud,
			                    	vp_id_asesor	:vp_id_asesor,
			                    	vp_id_age 		:vp_id_agencia,
			                    	vp_fecha_pago	:fecha,
									vp_efectivo		:real
			                    },
			                    timeout: 30000000,
			                    success: function(response, options){
			                        Ext.getCmp(cobranza.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	cobranza.setDataSolicitud(cobranza.index);
			                                	//Ext.getCmp(cobranza.id+'-select-garante').setValue('');
			                                	//var objp = Ext.getCmp(cobranza.id+'-list-garante');
												//cobranza.getReload(objp,{vp_op:'G',vp_id:vp_sol_id_per,vp_dni:'',vp_nombres:'',vp_flag:'A'}); 
			                                }
			                            });
			                        }else{
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
			setAsignar: function (index,estado) {
                var grid = Ext.getCmp(cobranza.id + '-grid-cuotas');
                var store = grid.getStore();
                var cuotas=0,monto=0,mora=0;

                store.each(function (v, idx) {
                	var st=v.get('estado');
                	if(st=='X'){
	                	v.set('estado', 'P');
		                v.commit();
	            	}
                });
                grid.getView().refresh();


                store.each(function (v, idx) {
                    if (index >= idx) {
                    	var st=v.get('estado');
                    	if(st!='S'){
                    		if(st!='C'){
		                        v.set('estado', estado);
		                        v.commit();
	                        }
                        }
                    }
                });
                grid.getView().refresh();

                store.each(function (v, idx) {
                	var st=v.get('estado');
                	if(st=='X'){
	                	monto+=parseFloat(v.get('valor_cuota'));
	                	mora+=parseFloat(v.get('mora'));
	                	cuotas += 1;
	                	
	            	}
                });
                Ext.getCmp(cobranza.id+'-sol-txt-cuotas-pago').setValue(cuotas);
            	Ext.getCmp(cobranza.id+'-sol-txt-monto-pago').setValue(monto);

            	Ext.getCmp(cobranza.id+'-sol-txt-monto-mora').setValue(mora);
            	var total=monto+mora;
            	Ext.getCmp(cobranza.id+'-sol-txt-monto-total').setValue(total);

            	Ext.getCmp(cobranza.id+'-sol-txt-monto-real-pago').setValue(total);
            },
            setCalculaPagoCuotas:function(){
            	var grid = Ext.getCmp(cobranza.id + '-grid-cuotas');
                var store = grid.getStore();
                var cuotas=0,monto=0;
            	store.each(function (v, idx) {
                	var st=v.get('estado');
                	if(st=='X'){
	                	v.set('estado', 'P');
		                v.commit();
	            	}
                });
                grid.getView().refresh();
            },
			setPagar:function(){
				var vp_id_solicitud 	= Ext.getCmp(cobranza.id+'-sol-txt-id-solicitud').getValue();
				window.open(cobranza.url+'get_cuotas_print/?vp_id_solicitud='+vp_id_solicitud, '_blank');
				/*Ext.create('Ext.window.Window',{
	                id:cobranza.id+'-win-cobranza',
	                plain: true,
	                title:'Pagos',
	                icon: '/images/icon/1315404769_gear_wheel.png',
	                height: 150,
	                width: 360,
	                resizable:false,
	                modal: true,
	                border:false,
	                closable:true,
	                padding:20,
	                layout:'hbox',
	                items:[],
	                bbar:[       
	                    '->',
	                    '-',
	                    {
	                        xtype:'button',
	                        text: 'Pagar',
	                        icon: '/images/icon/1315404769_gear_wheel.png',
	                        listeners:{
	                            beforerender: function(obj, opts){
								},
	                            click: function(obj, e){
	                            	user.setSaveUser(op);
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
	                                Ext.getCmp(user.id+'-win-form-menu').close();
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
	            }).show().center();*/
			},
			getAsesores:function(){
				var vp_op=Ext.getCmp(cobranza.id+'-txt-estado-filter').getValue();
				var vp_id_age = Ext.getCmp(cobranza.id+'-sol-cmb-agencia-filtro').getValue();
				var vp_nombre='';
				var vp_id_asesor=0;
				var vp_fecha = Ext.getCmp(cobranza.id+'-sol-date-fecha-cobranza').getRawValue();
				var vp_doc_dni ='';
				if(vp_op=='C'){
					vp_id_asesor=Ext.getCmp(cobranza.id+'-txt-asesores').getValue();
				}
				if(vp_op=='N'){
            		vp_nombre=Ext.getCmp(cobranza.id+'-txt-asesores').getValue();
            	}
            	if(vp_op=='D'){
            		vp_doc_dni=Ext.getCmp(cobranza.id+'-txt-asesores').getValue();
            	}
		        Ext.getCmp(cobranza.id+'-grid-asesores').getStore().removeAll();
				Ext.getCmp(cobranza.id+'-grid-asesores').getStore().load(
	                {params: {vp_op:'A',vp_id_age:vp_id_age,vp_id_asesor:vp_id_asesor,vp_fecha:vp_fecha,vp_nombre:vp_nombre,vp_doc_dni:vp_doc_dni},
	                callback:function(){
	                	//Ext.getCmp(asesores.id+'-form').el.unmask();
	                }
	            });
			},
			getListSolicitudes:function(vp_id_asesor,vp_id_age,vp_fecha){
				//var vp_op=Ext.getCmp(cobranza.id+'-txt-estado-filter').getValue();
				cobranza.setClearSolicitud();
				Ext.getCmp(cobranza.id+'-grid-solicitudes').getStore().removeAll();
				Ext.getCmp(cobranza.id + '-grid-cuotas').getStore().removeAll();

		        Ext.getCmp(cobranza.id+'-grid-solicitudes').getStore().removeAll();
				Ext.getCmp(cobranza.id+'-grid-solicitudes').getStore().load(
	                {params: {vp_op:'C',vp_id_asesor:vp_id_asesor,vp_id_age:vp_id_age,vp_fecha:vp_fecha},
	                callback:function(){
	                	//Ext.getCmp(asesores.id+'-form').el.unmask();
	                }
	            });
	            //var objv = Ext.getCmp(cobranza.id+'-list-solicitudes');
				//cobranza.getReload(objv,{VP_T_DOC:'P',VP_ID_PER:data.id_per,VP_DOC:''});
			},
			getCreditosGestionDiaria:function(){
				cobranza.setClearSolicitud();
				Ext.getCmp(cobranza.id+'-grid-solicitudes').getStore().removeAll();
				Ext.getCmp(cobranza.id + '-grid-cuotas').getStore().removeAll();

				var vp_id_age = Ext.getCmp(cobranza.id+'-sol-cmb-agencia-filtro').getValue();
				var vp_fecha = Ext.getCmp(cobranza.id+'-sol-date-fecha-cobranza').getRawValue();

				Ext.getCmp(cobranza.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
                //scanning.getLoader(true);
                Ext.Ajax.request({
                    url:cobranza.url+'getCreditosGestionDiaria/',
                    params:{
						vp_id_age		:vp_id_age,
						vp_fecha 		:vp_fecha
                    },
                    timeout: 30000000,
                    success: function(response, options){
                        Ext.getCmp(cobranza.id+'-win-form').el.unmask();
                        var res = Ext.JSON.decode(response.responseText);
                        console.log(res);
                        //control.getLoader(false);
                        cobranza.getAsesores();
                        try{
                        	var data = res.data[0];
							Ext.getCmp(cobranza.id+'-txt-esperado-cuotas').setValue(data.tot_cuotas);
							Ext.getCmp(cobranza.id+'-txt-esperado-valor-cuotas').setValue(data.valor_cuota);
							Ext.getCmp(cobranza.id+'-txt-esperado-mora').setValue(data.mora);
							Ext.getCmp(cobranza.id+'-txt-esperado-monto').setValue(data.total);
							Ext.getCmp(cobranza.id+'-txt-esperado-cant-solicitado').setValue(data.solicitudes);
							Ext.getCmp(cobranza.id+'-txt-esperado-monto-solicitado').setValue(data.sol_monto);
							Ext.getCmp(cobranza.id+'-txt-esperado-cuotas-cobradas').setValue(data.tot_cuotas_cobradas);
							Ext.getCmp(cobranza.id+'-txt-esperado-cobrado').setValue(data.pagado);

                        }catch(a){

                        }
                    }
                });
			},
			setClearSolicitud:function(){
				Ext.getCmp(cobranza.id+'-sol-txt-id-per').setValue(0);
				Ext.getCmp(cobranza.id+'-sol-cmb-asesor').setValue('');

				Ext.getCmp(cobranza.id+'-sol-cmb-motivo').setValue('');
				Ext.getCmp(cobranza.id+'-sol-txt-id-solicitud').setValue('');
				Ext.getCmp(cobranza.id+'-sol-txt-nro-solicitud').setValue('');
				Ext.getCmp(cobranza.id+'-sol-cmb-moneda').setValue('');
				Ext.getCmp(cobranza.id+'-sol-txt-monto').setValue('');
				Ext.getCmp(cobranza.id+'-sol-txt-tipo-cliente').setValue('');
				Ext.getCmp(cobranza.id+'-sol-cmb-excepcion').setValue('');
				Ext.getCmp(cobranza.id+'-sol-txt-import-aprobado').setValue('');
				Ext.getCmp(cobranza.id+'-sol-txt-numero-cuotas').setValue('');
				Ext.getCmp(cobranza.id+'-sol-txt-interes').setValue('');
				Ext.getCmp(cobranza.id+'-sol-txt-mora').setValue('');

				Ext.getCmp(cobranza.id+'-sol-txt-tot_credito').setValue('');
				Ext.getCmp(cobranza.id+'-sol-txt-tot_pagado').setValue('');
				Ext.getCmp(cobranza.id+'-sol-txt-tot_saldo').setValue('');

				Ext.getCmp(cobranza.id+'-sol-date-fecha-1-letra').setValue('');
				Ext.getCmp(cobranza.id + '-txt-nota').setValue('');
			},
			setDataSolicitud:function(index){
				var grid= Ext.getCmp(cobranza.id+'-grid-solicitudes');
				var records = grid.getStore().getAt(index);
				var data =records.data;

				Ext.getCmp(cobranza.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
                //scanning.getLoader(true);
                Ext.Ajax.request({
                    url:cobranza.url+'getCreditoRecord/',
                    params:{
						vp_id_creditos		:data.id_creditos
                    },
                    timeout: 30000000,
                    success: function(response, options){
                        Ext.getCmp(cobranza.id+'-win-form').el.unmask();
                        var res = Ext.JSON.decode(response.responseText);
                        console.log(res);
                        //control.getLoader(false);

                        try{
                        	var data = res.data[0];
                        	Ext.getCmp(cobranza.id+'-sol-date-fecha-solicitud').setValue(data.fecha_sol);
							Ext.getCmp(cobranza.id+'-sol-cmb-agencia').setValue(data.id_age);
							
							var obja = Ext.getCmp(cobranza.id+'-sol-cmb-asesor');
							cobranza.getReload(obja,{vp_cod_age:data.id_age});

							Ext.getCmp(cobranza.id+'-sol-txt-id-per').setValue(data.id_per);
							Ext.getCmp(cobranza.id+'-sol-cmb-asesor').setValue(data.id_asesor);


							Ext.getCmp(cobranza.id+'-sol-cmb-motivo').setValue(data.id_motivo);
							Ext.getCmp(cobranza.id+'-sol-txt-id-solicitud').setValue(data.id_creditos);
							Ext.getCmp(cobranza.id+'-sol-txt-nro-solicitud').setValue(data.nro_solicitud);
							Ext.getCmp(cobranza.id+'-sol-cmb-moneda').setValue(data.moneda);
							Ext.getCmp(cobranza.id+'-sol-txt-monto').setValue(data.monto_solicitado);
							Ext.getCmp(cobranza.id+'-sol-txt-tipo-cliente').setValue(data.tipo_cliente);
							Ext.getCmp(cobranza.id+'-sol-cmb-excepcion').setValue(data.excepcion);
							Ext.getCmp(cobranza.id+'-sol-txt-import-aprobado').setValue(data.monto_aprobado);
							Ext.getCmp(cobranza.id+'-sol-txt-numero-cuotas').setValue(data.nro_cuotas);
							Ext.getCmp(cobranza.id+'-sol-txt-interes').setValue(data.interes);
							Ext.getCmp(cobranza.id+'-sol-txt-mora').setValue(data.mora);

							Ext.getCmp(cobranza.id+'-sol-txt-tot_credito').setValue(data.tot_credito);
							Ext.getCmp(cobranza.id+'-sol-txt-tot_pagado').setValue(data.tot_pagado);
							Ext.getCmp(cobranza.id+'-sol-txt-tot_saldo').setValue(data.tot_saldo);

							Ext.getCmp(cobranza.id+'-sol-date-fecha-1-letra').setValue(data.fecha_1ra_letra);
							Ext.getCmp(cobranza.id + '-txt-nota').setValue(data.nota);

							
							var objc = Ext.getCmp(cobranza.id + '-grid-cuotas');
							cobranza.getReload(objc,{VP_CODIGO:data.id_creditos});
                        }catch(a){

                        }
                    }
                });
			},
			setCollapse:function(){
				/*var W = Ext.getCmp(inicio.id + '-contenedor').getWidth();
				if(W<1680){
					Ext.getCmp(cobranza.id+'-panel-direccion').collapse();
				}else{
					Ext.getCmp(cobranza.id+'-panel-direccion').expand();
				}*/
			},
			getSelectUbi:function(){
				var obj=Ext.getCmp(cobranza.id+'-sol-cmb-departamento');
				Ext.getCmp(cobranza.id+'-sol-cmb-provincia').getStore().removeAll();
				Ext.getCmp(cobranza.id+'-sol-cmb-Distrito').getStore().removeAll();
				cobranza.getUbigeo({VP_OP:'D',VP_VALUE:''},obj,'100101');
				var objp=Ext.getCmp(cobranza.id+'-sol-cmb-provincia');
				Ext.getCmp(cobranza.id+'-sol-cmb-Distrito').getStore().removeAll();
				cobranza.getUbigeo({VP_OP:'P',VP_VALUE:'100101'},objp,'100601');
				var objd=Ext.getCmp(cobranza.id+'-sol-cmb-Distrito');
				cobranza.getUbigeo({VP_OP:'X',VP_VALUE:'100601'},objd,'100601');
			},
			setSaveSolicitud:function(op){
				/*DATOS DE SOLICITUD*/
				var vp_fecha_solicitud 	= Ext.getCmp(cobranza.id+'-sol-date-fecha-solicitud').getRawValue();
				var vp_id_agencia 		= Ext.getCmp(cobranza.id+'-sol-cmb-agencia').getValue();
				var vp_sol_id_per = Ext.getCmp(cobranza.id+'-sol-txt-id-per').getValue();
				var vp_id_asesor 		= Ext.getCmp(cobranza.id+'-sol-cmb-asesor').getValue();
				var vp_id_mot 			= Ext.getCmp(cobranza.id+'-sol-cmb-motivo').getValue();
				var vp_id_solicitud 	= Ext.getCmp(cobranza.id+'-sol-txt-id-solicitud').getValue();
				var vp_nro_solicitud 	= Ext.getCmp(cobranza.id+'-sol-txt-nro-solicitud').getValue();
				var vp_moneda 			= Ext.getCmp(cobranza.id+'-sol-cmb-moneda').getValue();
				var vp_monto 			= Ext.getCmp(cobranza.id+'-sol-txt-monto').getValue();
				var vp_tipo_cliente 	= Ext.getCmp(cobranza.id+'-sol-txt-tipo-cliente').getValue();
				var vp_excepcion 		= Ext.getCmp(cobranza.id+'-sol-cmb-excepcion').getValue();
				var vp_import_aprobado 	= Ext.getCmp(cobranza.id+'-sol-txt-import-aprobado').getValue();
				var vp_nro_cuotas 		= Ext.getCmp(cobranza.id+'-sol-txt-numero-cuotas').getValue();

				var vp_interes  		= Ext.getCmp(cobranza.id+'-sol-txt-interes').getValue();
				var vp_mora  	 		= Ext.getCmp(cobranza.id+'-sol-txt-mora').getValue();


				var vp_fecha_1ra_letra 	= Ext.getCmp(cobranza.id+'-sol-date-fecha-1-letra').getRawValue();
				var vp_nota 			= Ext.getCmp(cobranza.id + '-txt-nota').getValue();

				if(vp_moneda==''){
					global.Msg({msg:"Seleccione la Moneda.",icon:2,fn:function(){}});
					return false;
				}

				if(vp_monto==''){
					global.Msg({msg:"Ingrese el Monto Solicitado.",icon:2,fn:function(){}});
					return false;
				}

				if(vp_tipo_cliente==''){
					global.Msg({msg:"Seleccione el tipo de cliente.",icon:2,fn:function(){}});
					return false;
				}

				if(vp_import_aprobado==''){
					global.Msg({msg:"Ingrese Importe Aprobado.",icon:2,fn:function(){}});
					return false;
				}

				if(vp_fecha_1ra_letra==''){
					global.Msg({msg:"Ingrese Fecha 1ra Letra.",icon:2,fn:function(){}});
					return false;
				}

				if(vp_nro_cuotas==''){
					global.Msg({msg:"Ingrese El número de Cuotas.",icon:2,fn:function(){}});
					return false;
				}

				op=(vp_id_solicitud=='' || vp_id_solicitud==0)?'I':'U';

				var msn=op=='I'?'¿Seguro de generar el crédito?':'¿Seguro de actualizar el crédito?';
				global.Msg({
                    msg: msn,
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(cobranza.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:cobranza.url+'setSavecobranza/',
			                    params:{
			                    	vp_op 				:op,
			                    	vp_fecha_solicitud	:vp_fecha_solicitud,
									vp_id_agencia		:vp_id_agencia,
									vp_sol_id_per		:vp_sol_id_per,
									vp_id_asesor		:vp_id_asesor,
									vp_id_mot			:vp_id_mot,
									vp_id_solicitud		:vp_id_solicitud,
									vp_nro_solicitud	:vp_nro_solicitud,
									vp_moneda			:vp_moneda,
									vp_monto 			:vp_monto,
									vp_tipo_cliente		:vp_tipo_cliente,
									vp_excepcion		:vp_excepcion,
									vp_import_aprobado	:vp_import_aprobado,
									vp_nro_cuotas		:vp_nro_cuotas,
									vp_interes			:vp_interes,
									vp_mora 			:vp_mora,
									vp_fecha_1ra_letra	:vp_fecha_1ra_letra,
									vp_resena 			:vp_nota,
									vp_flag 			:'A'
			                    },
			                    timeout: 30000000,
			                    success: function(response, options){
			                        Ext.getCmp(cobranza.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	//Ext.getCmp(cobranza.id+'-select-garante').setValue('');
			                                	//var objp = Ext.getCmp(cobranza.id+'-list-garante');
												//cobranza.getReload(objp,{vp_op:'G',vp_id:vp_sol_id_per,vp_dni:'',vp_nombres:'',vp_flag:'A'});
			                                }
			                            });
			                        }else{
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
			setSavecobranza:function(forma){
				
				var vp_sol_id_cli = Ext.getCmp(cobranza.id+'-sol-txt-id-cli').getValue();
				var vp_sol_id_per = Ext.getCmp(cobranza.id+'-sol-txt-id-per').getValue();


				var sol_ape_pat = Ext.getCmp(cobranza.id+'-sol-txt-apellido-paterno').getValue();
				var sol_ape_mat = Ext.getCmp(cobranza.id+'-sol-txt-apellido-materno').getValue();
				var sol_nombres = Ext.getCmp(cobranza.id+'-sol-txt-nombres').getValue();
				var sol_sexo = Ext.getCmp(cobranza.id+'-sol-cmb-sexo').getValue();
				var sol_doc_dni = Ext.getCmp(cobranza.id+'-sol-txt-doc-dni').getValue();
				var sol_doc_ce = Ext.getCmp(cobranza.id+'-sol-txt-doc-ce').getValue();
				var sol_doc_cip = Ext.getCmp(cobranza.id+'-sol-txt-doc-cip').getValue();
				var sol_doc_ruc = Ext.getCmp(cobranza.id+'-sol-txt-doc-ruc').getValue();
				var sol_doc_cm = Ext.getCmp(cobranza.id+'-sol-txt-doc-cm').getValue();
				var sol_estado_civil = Ext.getCmp(cobranza.id+'-sol-cmb-estado-civil').getValue();
				var sol_fecha_nac = Ext.getCmp(cobranza.id+'-sol-date-fecha-nac').getRawValue();

				/*var sol_domi_propio = Ext.getCmp(cobranza.id+'-sol-chk-domi-propio').getValue();
				sol_domi_propio = sol_domi_propio?'S':'N';
				var sol_domi_pagando = Ext.getCmp(cobranza.id+'-sol-chk-domi-pagando').getValue();
				sol_domi_pagando = sol_domi_pagando?'S':'N';
				var sol_domi_alquilado = Ext.getCmp(cobranza.id+'-sol-chk-domi-alquilado').getValue();
				sol_domi_alquilado = sol_domi_alquilado?'S':'N';
				var sol_domi_familiar = Ext.getCmp(cobranza.id+'-sol-chk-domi-familiar').getValue();
				sol_domi_familiar = sol_domi_familiar?'S':'N';*/

				var sol_domicilio = Ext.getCmp(cobranza.id+'-sol-cmb-domicilio').getValue();
				var sol_estudios = Ext.getCmp(cobranza.id+'-sol-cmb-estudios').getValue();
				var sol_profesion = Ext.getCmp(cobranza.id+'-sol-txt-profesion').getValue();
				var sol_laboral = Ext.getCmp(cobranza.id+'-sol-cmb-laboral').getValue();
				var sol_cargo = Ext.getCmp(cobranza.id+'-sol-txt-cargo').getValue();
				var sol_centro_trabajo = Ext.getCmp(cobranza.id+'-sol-txt-centro-trabajo').getValue();
				var sol_fecha_ingreso = Ext.getCmp(cobranza.id+'-sol-date-fecha-ingreso').getRawValue();


				var vp_sol_id_tel = Ext.getCmp(cobranza.id+'-sol-txt-id-tel').getValue();
				var vp_sol_id_dir = Ext.getCmp(cobranza.id+'-sol-txt-id-dir').getValue();

				var op =forma;
				if(op!='D'){
					op = vp_sol_id_cli!=0?'U':'I';

					if(sol_ape_pat==''){
						global.Msg({msg:"Ingrese el Apellido Paterno.",icon:2,fn:function(){}});
						return false;
					}

					if(sol_ape_mat==''){
						global.Msg({msg:"Ingrese el Apellido Materno.",icon:2,fn:function(){}});
						return false;
					}

					if(sol_nombres==''){
						global.Msg({msg:"Ingrese el Nombre.",icon:2,fn:function(){}});
						return false;
					}

					if(sol_sexo==''){
						global.Msg({msg:"Ingrese el Sexo.",icon:2,fn:function(){}});
						return false;
					}

					if(sol_doc_dni==''){
						global.Msg({msg:"Ingrese el DNI.",icon:2,fn:function(){}});
						return false;
					}
					if(sol_estado_civil==''){
						global.Msg({msg:"Ingrese el Estado Civil.",icon:2,fn:function(){}});
						return false;
					}
					if(sol_fecha_nac==''){
						global.Msg({msg:"Ingrese la fecha de nacimiento.",icon:2,fn:function(){}});
						return false;
					}

					if(vp_sol_id_tel==''){
						vp_sol_id_tel = 0;
					}

					if(vp_sol_id_dir==''){
						vp_sol_id_dir = 0;
					}

				}else{
					if(vp_sol_id_cli==0){
						global.Msg({msg:"No es posible Eliminar, aun no existe un registro en la base datos.",icon:2,fn:function(){}});
						return false;
					}
					if(vp_sol_id_per==0){
						global.Msg({msg:"No es posible Eliminar, aun no existe un registro en la base datos.",icon:2,fn:function(){}});
						return false;
					}
				}

				cobranza.setSaveDatacobranza(op=='D'?'¿Seguro de Eliminar?':'¿Seguro de guardar?',
					{
                    	vp_op:op,
                    	vp_sol_id_cli:vp_sol_id_cli,
						vp_sol_id_per:vp_sol_id_per,
						vp_sol_ape_pat:sol_ape_pat,
						vp_sol_ape_mat:sol_ape_mat,
						vp_sol_nombres:sol_nombres,
						vp_sol_sexo:sol_sexo,
						vp_sol_doc_dni:sol_doc_dni,
						vp_sol_doc_ce:sol_doc_ce,
						vp_sol_doc_cip:sol_doc_cip,
						vp_sol_doc_ruc:sol_doc_ruc,
						vp_sol_doc_cm:sol_doc_cm,
						vp_sol_estado_civil:sol_estado_civil,
						vp_sol_fecha_nac:sol_fecha_nac,

						vp_sol_domicilio:sol_domicilio,
						vp_sol_estudios:sol_estudios,
						vp_sol_profesion:sol_profesion,
						vp_sol_laboral:sol_laboral,
						vp_sol_cargo:sol_cargo,
						vp_sol_centro_trabajo:sol_centro_trabajo,
						vp_sol_fecha_ingreso:sol_fecha_ingreso,

						vp_id_tel:vp_sol_id_tel,
						vp_id_dir:vp_sol_id_dir,

						vp_sol_img:'',
						vp_flag:'A'
                    }
				);
			},
			setSavecobranzaConyugue:function(forma){
				var vp_sol_id_per = Ext.getCmp(cobranza.id+'-sol-txt-id-per').getValue();

				var sol_doc_dni = Ext.getCmp(cobranza.id+'-select-conyugue').getValue();
				/*var sol_doc_ce = Ext.getCmp(cobranza.id+'-sol-txt-doc-ce').getValue();
				var sol_doc_cip = Ext.getCmp(cobranza.id+'-sol-txt-doc-cip').getValue();
				var sol_doc_ruc = Ext.getCmp(cobranza.id+'-sol-txt-doc-ruc').getValue();
				var sol_doc_cm = Ext.getCmp(cobranza.id+'-sol-txt-doc-cm').getValue();*/

				var op =forma;
				if(vp_sol_id_per==0){
					global.Msg({msg:"No es posible Eliminar, aun no existe un registro en la base datos.",icon:2,fn:function(){}});
					return false;
				}
				if(sol_doc_dni==''){
					global.Msg({msg:"Ingrese el DNI.",icon:2,fn:function(){}});
					return false;
				}

				var msn=op=='Z'?'¿Seguro de quitar relación?':'¿Seguro de Relacionar cobranza?';
				global.Msg({
                    msg: msn,
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(cobranza.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:cobranza.url+'setSavecobranza/',
			                    params:{
			                    	vp_op:op,
									vp_sol_id_per:vp_sol_id_per,
									vp_sol_doc_dni:sol_doc_dni,
									vp_flag:'A'
			                    },
			                    timeout: 30000000,
			                    success: function(response, options){
			                        Ext.getCmp(cobranza.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	Ext.getCmp(cobranza.id+'-select-conyugue').setValue('');
			                                	var objp = Ext.getCmp(cobranza.id+'-list-Conyugues');
												cobranza.getReload(objp,{vp_op:'Y',vp_id:vp_sol_id_per,vp_dni:'',vp_nombres:'',vp_flag:'A'});
			                                }
			                            });
			                        }else{
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
			setSavecobranzaGarante:function(forma){
				var vp_sol_id_per = Ext.getCmp(cobranza.id+'-sol-txt-id-per').getValue();

				var sol_doc_dni = Ext.getCmp(cobranza.id+'-select-garante').getValue();
				/*var sol_doc_ce = Ext.getCmp(cobranza.id+'-sol-txt-doc-ce').getValue();
				var sol_doc_cip = Ext.getCmp(cobranza.id+'-sol-txt-doc-cip').getValue();
				var sol_doc_ruc = Ext.getCmp(cobranza.id+'-sol-txt-doc-ruc').getValue();
				var sol_doc_cm = Ext.getCmp(cobranza.id+'-sol-txt-doc-cm').getValue();*/

				var op =forma;
				if(vp_sol_id_per==0){
					global.Msg({msg:"No es posible Eliminar, aun no existe un registro en la base datos.",icon:2,fn:function(){}});
					return false;
				}
				if(sol_doc_dni==''){
					global.Msg({msg:"Ingrese el DNI.",icon:2,fn:function(){}});
					return false;
				}

				var msn=op=='G'?'¿Seguro de quitar relación?':'¿Seguro de Relacionar cobranza?';
				global.Msg({
                    msg: msn,
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(cobranza.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:cobranza.url+'setSavecobranza/',
			                    params:{
			                    	vp_op:op,
									vp_sol_id_per:vp_sol_id_per,
									vp_sol_doc_dni:sol_doc_dni,
									vp_flag:'A'
			                    },
			                    timeout: 30000000,
			                    success: function(response, options){
			                        Ext.getCmp(cobranza.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	Ext.getCmp(cobranza.id+'-select-garante').setValue('');
			                                	var objp = Ext.getCmp(cobranza.id+'-list-garante');
												cobranza.getReload(objp,{vp_op:'G',vp_id:vp_sol_id_per,vp_dni:'',vp_nombres:'',vp_flag:'A'});
			                                }
			                            });
			                        }else{
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
			setSaveDatacobranza:function(msn,params){
				global.Msg({
                    msg: msn,
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(cobranza.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:cobranza.url+'setSavecobranza/',
			                    params:params,
			                    timeout: 30000000,
			                    success: function(response, options){
			                        Ext.getCmp(cobranza.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	//cobranza.getHistory();
			                                	if(params.vp_op!='D'){
				                                	Ext.getCmp(cobranza.id+'-sol-txt-id-cli').setValue(res.CODIGO);
				                                	Ext.getCmp(cobranza.id+'-sol-txt-id-per').setValue(res.ID_PER);
				                            	}else{
				                            		Ext.getCmp(cobranza.id+'-win-form').close();
				                            	}
				                            	var obj = Ext.getCmp(cobranza.id+'-list-telefonos');
					                            cobranza.getReload(obj,{vp_op:'P',vp_id:res.ID_PER,vp_flag:'A'});
			                                	//callback
			                                }
			                            });
			                        }else{
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
			getListaSolicitudes:function(dato){ 
				//cobranza.setClearcobranza();
				Ext.Ajax.request({
                    url:cobranza.url+'getListPersona/',
                    params:{
                    	vp_op:'D',
						vp_id:0,
						vp_dni:dato,
						vp_nombres:''
                    },
                    timeout: 30000000,
                    success: function(response, options){
                        Ext.getCmp(cobranza.id+'-win-form').el.unmask();
                        var res = Ext.JSON.decode(response.responseText);
                        console.log(res.data[0]);
                        var data = res.data[0];
                        //Ext.getCmp(cobranza.id+'-sol-txt-id-cli').setValue(cobranza.id_id);
                        //Ext.getCmp(cobranza.id+'-sol-txt-id-per').setValue(data.id_per);
						/*Ext.getCmp(cobranza.id+'-sol-txt-apellido-paterno').setValue(data.ape_pat);
						Ext.getCmp(cobranza.id+'-sol-txt-apellido-materno').setValue(data.ape_mat);
						Ext.getCmp(cobranza.id+'-sol-txt-nombres').setValue(data.nombres);
						Ext.getCmp(cobranza.id+'-sol-cmb-sexo').setValue(data.sexo);
						Ext.getCmp(cobranza.id+'-sol-txt-doc-dni').setValue(data.doc_dni);
						Ext.getCmp(cobranza.id+'-sol-txt-doc-ce').setValue(data.doc_ce);
						Ext.getCmp(cobranza.id+'-sol-txt-doc-cip').setValue(data.doc_cip);
						Ext.getCmp(cobranza.id+'-sol-txt-doc-ruc').setValue(data.doc_ruc);
						Ext.getCmp(cobranza.id+'-sol-txt-doc-cm').setValue(data.doc_cm);
						Ext.getCmp(cobranza.id+'-sol-cmb-estado-civil').setValue(data.estado_civil);
						Ext.getCmp(cobranza.id+'-sol-date-fecha-nac').setValue(data.fecha_nac);*/

						
						/*Ext.getCmp(cobranza.id+'-sol-chk-domi-propio').setValue(data.domi_propio=='S'?true:false);
						Ext.getCmp(cobranza.id+'-sol-chk-domi-pagando').setValue(data.domi_pagando=='S'?true:false);
						Ext.getCmp(cobranza.id+'-sol-chk-domi-alquilado').setValue(data.domi_alquilado=='S'?true:false);
						Ext.getCmp(cobranza.id+'-sol-chk-domi-familiar').setValue(data.domi_familiar=='S'?true:false);*/

						/*Ext.getCmp(cobranza.id+'-sol-cmb-domicilio').setValue(data.domicilio);
						Ext.getCmp(cobranza.id+'-sol-cmb-estudios').setValue(data.estudios);
						Ext.getCmp(cobranza.id+'-sol-txt-profesion').setValue(data.profesion);
						Ext.getCmp(cobranza.id+'-sol-cmb-laboral').setValue(data.laboral);
						Ext.getCmp(cobranza.id+'-sol-txt-cargo').setValue(data.cargo);
						Ext.getCmp(cobranza.id+'-sol-txt-centro-trabajo').setValue(data.id_empresa);
						Ext.getCmp(cobranza.id+'-sol-date-fecha-ingreso').setValue(data.fecha_ingreso);*/

						//Ext.getCmp(cobranza.id+'-sol-txt-id-tel').setValue(data.id_tel);
						/*Ext.getCmp(cobranza.id+'-sol-txt-id-dir').setValue(data.id_dir);
						var obj = Ext.getCmp(cobranza.id+'-list-telefonos');
						cobranza.getReload(obj,{vp_op:'P',vp_id:data.id_per,vp_flag:'A'});*/

						

						//var obj = Ext.getCmp(cobranza.id+'-sol-documentos-adjuntos');
						//cobranza.getReload(obj,{vp_sol_id_per:data.id_per,vp_flag:'A'}); 
						//win.getGalery({container:'contenedor-documentos',forma:'L',url:cobranza.url+'get_list_documentos/',params:{vp_sol_id_per:data.id_per,vp_flag:'A'} });

						/*if(data.id_dir!=0){
							cobranza.getDirecciones(data.id_dir);
						}else{
							cobranza.getSelectUbi();
						}*/
						//var objd = Ext.getCmp(cobranza.id+'-list-direcciones');
						//cobranza.getReload(objd,{vp_op:'R',vp_id:data.id_per,vp_nombre:''});

						/*if(data.img!==''){
							var img = '/persona/'+data.id_per+'/PHOTO/'+data.img;
							cobranza.setPhotoForm(img,data.ape_pat+' '+data.ape_mat +', '+data.nombres);
						}*/

						/*var objp = Ext.getCmp(cobranza.id+'-list-Conyugues');
						cobranza.getReload(objp,{vp_op:'Y',vp_id:data.id_per,vp_dni:'',vp_nombres:'',vp_flag:'A'});

						var objg = Ext.getCmp(cobranza.id+'-list-garante');
						cobranza.getReload(objg,{vp_op:'G',vp_id:data.id_per,vp_dni:'',vp_nombres:'',vp_flag:'A'});
						*/
						var objv = Ext.getCmp(cobranza.id+'-list-solicitudes');
						cobranza.getReload(objv,{VP_T_DOC:'P',VP_ID_PER:data.id_per,VP_DOC:''});
                    }
                });
			},
			getDirecciones:function(id){
				Ext.Ajax.request({
                    url:cobranza.url+'getListDirecciones/',
                    params:{
                    	vp_op:'C',
						vp_id:id,
						vp_nombres:''
                    },
                    timeout: 30000000,
                    success: function(response, options){
                        Ext.getCmp(cobranza.id+'-win-form').el.unmask();
                        var res = Ext.JSON.decode(response.responseText);
                        console.log(res.data[0]);
                        var data = res.data[0];

                        Ext.getCmp(cobranza.id+'-sol-txt-id-dir').setValue(data.id_dir);
						Ext.getCmp(cobranza.id+'-sol-txt-dir-direccion').setValue(data.dir_direccion);
						Ext.getCmp(cobranza.id+'-sol-txt-dir-numero').setValue(data.dir_numero);
						Ext.getCmp(cobranza.id+'-sol-txt-dir-mz').setValue(data.dir_mz);
						Ext.getCmp(cobranza.id+'-sol-txt-dir-lt').setValue(data.dir_lt);
						Ext.getCmp(cobranza.id+'-sol-txt-dir-dpto').setValue(data.dir_dpto);
						Ext.getCmp(cobranza.id+'-sol-txt-dir-interior').setValue(data.dir_interior);
						Ext.getCmp(cobranza.id+'-sol-txt-dir-urb').setValue(data.dir_urb);
						Ext.getCmp(cobranza.id+'-sol-txt-dir-referencia').setValue(data.dir_referencia);

						/*DIRECCIONES*/
						var obj=Ext.getCmp(cobranza.id+'-sol-cmb-departamento');
						Ext.getCmp(cobranza.id+'-sol-cmb-provincia').getStore().removeAll();
						Ext.getCmp(cobranza.id+'-sol-cmb-Distrito').getStore().removeAll();
						cobranza.getUbigeo({VP_OP:'D',VP_VALUE:''},obj,data.cod_ubi_dep); 

						var objp=Ext.getCmp(cobranza.id+'-sol-cmb-provincia');
						Ext.getCmp(cobranza.id+'-sol-cmb-Distrito').getStore().removeAll();
						cobranza.getUbigeo({VP_OP:'P',VP_VALUE:data.cod_ubi_dep},objp,data.cod_ubi_pro);

						var objd=Ext.getCmp(cobranza.id+'-sol-cmb-Distrito');
						cobranza.getUbigeo({VP_OP:'X',VP_VALUE:data.cod_ubi_pro},objd,data.cod_ubi);

						//Ext.getCmp(cobranza.id+'-sol-cmb-departamento').setValue(data.cod_ubi_dep);
						//Ext.getCmp(cobranza.id+'-sol-cmb-provincia').setValue(data.cod_ubi_pro);
						//Ext.getCmp(cobranza.id+'-sol-cmb-Distrito').setValue(data.cod_ubi);
                    }
                });
			},
			setClearcobranza:function(){
				//Ext.getCmp(cobranza.id+'-sol-txt-id-per').setValue(0);
				Ext.getCmp(cobranza.id+'-sol-txt-apellido-paterno').setValue('');
				Ext.getCmp(cobranza.id+'-sol-txt-apellido-materno').setValue('');
				Ext.getCmp(cobranza.id+'-sol-txt-nombres').setValue('');
				Ext.getCmp(cobranza.id+'-sol-cmb-sexo').setValue('M');
				Ext.getCmp(cobranza.id+'-sol-txt-doc-dni').setValue('');
				Ext.getCmp(cobranza.id+'-sol-txt-doc-ce').setValue('');
				Ext.getCmp(cobranza.id+'-sol-txt-doc-cip').setValue('');
				Ext.getCmp(cobranza.id+'-sol-txt-doc-ruc').setValue('');
				Ext.getCmp(cobranza.id+'-sol-txt-doc-cm').setValue('');
				Ext.getCmp(cobranza.id+'-sol-cmb-estado-civil').setValue('S');
				Ext.getCmp(cobranza.id+'-sol-txt-centro-trabajo').setValue('0');
				Ext.getCmp(cobranza.id+'-sol-date-fecha-nac').setValue('');

				
				/*Ext.getCmp(cobranza.id+'-sol-chk-domi-propio').setValue(false);
				Ext.getCmp(cobranza.id+'-sol-chk-domi-pagando').setValue(false);
				Ext.getCmp(cobranza.id+'-sol-chk-domi-alquilado').setValue(false);
				Ext.getCmp(cobranza.id+'-sol-chk-domi-familiar').setValue(false);*/
			},
			setSavecobranzaIMG:function(){
				var vp_sol_id_cli = Ext.getCmp(cobranza.id+'-sol-txt-id-cli').getValue();
				var vp_sol_id_per = Ext.getCmp(cobranza.id+'-sol-txt-id-per').getValue();



			},
			setClearTelefono:function(){
				Ext.getCmp(cobranza.id+'-sol-txt-id-tel').setValue(0);
				Ext.getCmp(cobranza.id+'-sol-cmb-tipo-tel').setValue('CE');
				Ext.getCmp(cobranza.id+'-sol-cmb-line-tel').setValue('CL');
				Ext.getCmp(cobranza.id+'-sol-txt-tel-cel').setValue('');
				Ext.getCmp(cobranza.id+'-sol-cmb-tel-estado').setValue('A');
			},
			setSaveTelefono:function(forma){
				var vp_sol_id_cli = Ext.getCmp(cobranza.id+'-sol-txt-id-cli').getValue();
				var vp_sol_id_per = Ext.getCmp(cobranza.id+'-sol-txt-id-per').getValue();
				var vp_sol_id_tel = Ext.getCmp(cobranza.id+'-sol-txt-id-tel').getValue();

				if(vp_sol_id_per=='' || vp_sol_id_per == 0){
					global.Msg({msg:"Debe guardar los datos de la cobranza antes.",icon:2,fn:function(){}});
					return false;
				}

				var vp_sol_tipo_tel = Ext.getCmp(cobranza.id+'-sol-cmb-tipo-tel').getValue();
				var vp_sol_line_tel = Ext.getCmp(cobranza.id+'-sol-cmb-line-tel').getValue();
				var vp_flag = Ext.getCmp(cobranza.id+'-sol-cmb-tel-estado').getValue();
				var sol_tel_cel = Ext.getCmp(cobranza.id+'-sol-txt-tel-cel').getValue();

				var op =forma;
				if(op!='D'){
					var op = vp_sol_id_tel!=0?'U':'I';

					if(vp_sol_tipo_tel==''){
						global.Msg({msg:"Ingrese un tipo de teléfono.",icon:2,fn:function(){}});
						return false;
					}

					if(vp_sol_line_tel==''){
						global.Msg({msg:"Ingrese un operador de teléfono.",icon:2,fn:function(){}});
						return false;
					}

					if(sol_tel_cel==''){
						global.Msg({msg:"Ingrese un número de teléfono.",icon:2,fn:function(){}});
						return false;
					}
				}else{
					if(vp_sol_id_tel==''){
						global.Msg({msg:"Seleccione un teléfono a eliminar dando doble Click en la lista.",icon:2,fn:function(){}});
						return false;
					}
				}

				

				cobranza.setSaveTelefonoData({vp_op:op,vp_sol_id_per:vp_sol_id_per,vp_sol_id_tel:vp_sol_id_tel,vp_sol_tel_cel:sol_tel_cel,vp_sol_tipo_tel:vp_sol_tipo_tel,vp_sol_line_tel:vp_sol_line_tel,vp_flag:vp_flag},'¿Seguro de guardar?');
			},
			setSaveTelefonoData:function(params,msn){
				global.Msg({
                    msg: msn,
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(cobranza.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:cobranza.url+'setSavePhone/',
			                    params:params,
			                    timeout: 30000000,
			                    success: function(response, options){
			                        Ext.getCmp(cobranza.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	//cobranza.getHistory();
			                                	//Ext.getCmp(cobranza.id+'-sol-txt-id-tel').setValue(res.CODIGO);
			                                	cobranza.setClearTelefono();
			                                	var obj = Ext.getCmp(cobranza.id+'-list-telefonos');
				                            	cobranza.getReload(obj,{vp_op:'P',vp_id:params.vp_sol_id_per,vp_flag:'A'});
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
			setClearDireccion:function(){
				Ext.getCmp(cobranza.id+'-sol-txt-id-dir').setValue(0);
				Ext.getCmp(cobranza.id+'-sol-txt-dir-direccion').setValue('');
				Ext.getCmp(cobranza.id+'-sol-txt-dir-numero').setValue('');
				Ext.getCmp(cobranza.id+'-sol-txt-dir-mz').setValue('');
				Ext.getCmp(cobranza.id+'-sol-txt-dir-lt').setValue('');
				Ext.getCmp(cobranza.id+'-sol-txt-dir-dpto').setValue('');
				Ext.getCmp(cobranza.id+'-sol-txt-dir-interior').setValue('');
				Ext.getCmp(cobranza.id+'-sol-txt-dir-urb').setValue('');
				Ext.getCmp(cobranza.id+'-sol-txt-dir-referencia').setValue('');
			},
			setSaveDireccion:function(){

				var vp_sol_id_cli = Ext.getCmp(cobranza.id+'-sol-txt-id-cli').getValue();
				var vp_sol_id_per = Ext.getCmp(cobranza.id+'-sol-txt-id-per').getValue();
				
				var vp_sol_id_dir = Ext.getCmp(cobranza.id+'-sol-txt-id-dir').getValue();
				var vp_op = vp_sol_id_dir==0?'I':'U';
				var sol_dir_direccion = Ext.getCmp(cobranza.id+'-sol-txt-dir-direccion').getValue();
				var sol_dir_numero = Ext.getCmp(cobranza.id+'-sol-txt-dir-numero').getValue();
				var sol_dir_mz = Ext.getCmp(cobranza.id+'-sol-txt-dir-mz').getValue();
				var sol_dir_lt = Ext.getCmp(cobranza.id+'-sol-txt-dir-lt').getValue();
				var sol_dir_dpto = Ext.getCmp(cobranza.id+'-sol-txt-dir-dpto').getValue();
				var sol_dir_interior = Ext.getCmp(cobranza.id+'-sol-txt-dir-interior').getValue();
				var sol_dir_urb = Ext.getCmp(cobranza.id+'-sol-txt-dir-urb').getValue();
				var sol_dir_referencia = Ext.getCmp(cobranza.id+'-sol-txt-dir-referencia').getValue();
				var sol_departamento = Ext.getCmp(cobranza.id+'-sol-cmb-departamento').getValue();
				var sol_provincia = Ext.getCmp(cobranza.id+'-sol-cmb-provincia').getValue();
				var sol_distrito = Ext.getCmp(cobranza.id+'-sol-cmb-Distrito').getValue();

				if(vp_sol_id_per=='' || vp_sol_id_per == 0){
					global.Msg({msg:"Debe guardar los datos de la cobranza antes.",icon:2,fn:function(){}});
					return false;
				}

				global.Msg({
                    msg: '¿Seguro de guardar?',
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(cobranza.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:cobranza.url+'setSaveDireccion/',
			                    params:{
			                    	vp_op:vp_op,
			                    	vp_sol_id_cli:vp_sol_id_cli,
			                    	vp_sol_id_per:vp_sol_id_per,
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
			                        Ext.getCmp(cobranza.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	//cobranza.getHistory();
			                                	//Ext.getCmp(cobranza.id+'-win-form').close();
			                                	var objd = Ext.getCmp(cobranza.id+'-list-direcciones');
												cobranza.getReload(objd,{vp_op:'R',vp_id:vp_sol_id_per,vp_nombre:''});
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
			setDeleteDir:function(id_dir){
				var vp_sol_id_per = Ext.getCmp(cobranza.id+'-sol-txt-id-per').getValue();
				global.Msg({
                    msg: '¿Seguro de Eliminar?',
                    icon: 3,
                    buttons: 3,
                    fn: function(btn){
                    	if (btn == 'yes'){
                    		Ext.getCmp(cobranza.id+'-win-form').el.mask('Salvando Información…', 'x-mask-loading');
	                        //scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:cobranza.url+'setSaveDireccion/',
			                    params:{
			                    	vp_op:'D',
			                    	vp_sol_id_per:vp_sol_id_per,
									vp_sol_id_dir:id_dir
			                    },
			                    timeout: 30000000,
			                    success: function(response, options){
			                        Ext.getCmp(cobranza.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	//cobranza.getHistory();
			                                	//Ext.getCmp(cobranza.id+'-win-form').close();
			                                	var objd = Ext.getCmp(cobranza.id+'-list-direcciones');
												cobranza.getReload(objd,{vp_op:'R',vp_id:vp_sol_id_per,vp_nombre:''});
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
	                	//Ext.getCmp(cobranza.id+'-form').el.unmask();
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
				var tab=Ext.getCmp(cobranza.id+'-tabContent');
				var active=Ext.getCmp(cobranza.id+cobranza.back);
				tab.setActiveTab(active);
			},
			getcobranza:function(){
				var vp_op=Ext.getCmp(cobranza.id+'-txt-estado-filter').getValue();
            	var vp_nombre=Ext.getCmp(cobranza.id+'-txt-cobranza').getValue();
		            Ext.getCmp(cobranza.id+'-grid-asesores').getStore().removeAll();
				Ext.getCmp(cobranza.id+'-grid-asesores').getStore().load(
	                {params: {vp_op:vp_op,vp_nombre:vp_nombre},
	                callback:function(){
	                	//Ext.getCmp(cobranza.id+'-form').el.unmask();
	                }
	            });
			},
			getEdit:function(index){
				var rec = Ext.getCmp(cobranza.id + '-grid-cobranza').getStore().getAt(index);
				cobranza.setForm('U',rec.data);
			},
			getNew:function(){
				cobranza.setForm('I',{id_cobranza:0,usr_codigo:'',usr_nombre:'',usr_perfil:1,usr_estado:1});
			},
			setForm:function(op,data){

                
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
			},
			setSavecobranza:function(op){

		    	var codigo = Ext.getCmp(cobranza.id+'-txt-codigo').getValue();
		    	var usuario = Ext.getCmp(cobranza.id+'-txt-usuario-cobranza').getValue();
		    	var clave = Ext.getCmp(cobranza.id+'-txt-clave').getValue();
		    	var nombre = Ext.getCmp(cobranza.id+'-txt-nombre-cobranza').getValue();
		    	var perfil = Ext.getCmp(cobranza.id+'-cmb-perfil').getValue();
		    	var estado = Ext.getCmp(cobranza.id+'-cmb-estado-cobranza').getValue();

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
                    		Ext.getCmp(cobranza.id+'-win-form').el.mask('Elinando Páginas…', 'x-mask-loading');
	                        scanning.getLoader(true);
			                Ext.Ajax.request({
			                    url:control.url+'set_save/',
			                    params:{
			                    	vp_op:op,
			                    	vp_id_cobranza:codigo,
			                    	vp_usr_codigo:usuario,
			                    	vp_usr_passwd:clave,
			                    	vp_usr_nombre:nombre,
			                    	vp_usr_perfil:perfil,
			                    	vp_usr_estado:estado
			                    },
			                    timeout: 300000,
			                    success: function(response, options){
			                        Ext.getCmp(cobranza.id+'-win-form').el.unmask();
			                        var res = Ext.JSON.decode(response.responseText);
			                        //control.getLoader(false);
			                        if (res.error == 'OK'){
			                            global.Msg({
			                                msg: res.msn,
			                                icon: 1,
			                                buttons: 1,
			                                fn: function(btn){
			                                	cobranza.getHistory();
			                                	Ext.getCmp(cobranza.id+'-win-form').close();
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
		    	var vp_op = Ext.getCmp(cobranza.id+'-txt-estado-filter').getValue();
				var nombre = Ext.getCmp(cobranza.id+'-txt-cobranza').getValue();

		    	Ext.getCmp(cobranza.id + '-grid-cobranza').getStore().removeAll();
				Ext.getCmp(cobranza.id + '-grid-cobranza').getStore().load(
	                {params: {vp_op:vp_op,vp_nombre:nombre},
	                callback:function(){
	                	//Ext.getCmp(cobranza.id+'-form').el.unmask();
	                }
	            });
	            
		    },
			getImagen:function(param){
				win.getGalery({container:'GaleryFull',width:390,height:250,params:{forma:'F',img_path:'/cobranza/icon/'+param}});///cobranza/
			},
			getContratos:function(shi_codigo){
				Ext.getCmp(cobranza.id+'-cbx-contrato').getStore().removeAll();
				Ext.getCmp(cobranza.id+'-cbx-contrato').getStore().load(
	                {params: {vp_shi_codigo:shi_codigo},
	                callback:function(){
	                	//Ext.getCmp(cobranza.id+'-form').el.unmask();
	                }
	            });
			},
			getAddMagicRefresh:function(url){
			    var symbol = '?';//url.indexOf('?') == -1 ? '?' : '&';
			    var magic = Math.random()*999999;
			    return url + symbol + 'magic=' + magic;
			},
			setPhotoForm:function(img,nombre){
				var img = cobranza.getAddMagicRefresh(img);
				win.getGalery({container:'imagen-contenedor',forma:'F',width:170,height:200,params:{img_path:img,title:nombre}});
				/*
				var panel = Ext.getCmp(cobranza.id + '-photo-person');
				panel.removeAll();
				panel.add({
                    html: '<img id="imagen-cobranza" src="'+img+'" style="width:100%; height:"100%;overflow: scroll;" />',
                    border:false,
                    bodyStyle: 'background: transparent;text-align:center;'//style=""
                });

                panel.doLayout();

                var image = document.getElementById('imagen-cobranza');
				var downloadingImage = new Image();
				downloadingImage.onload = function(){
				    image.src = this.src;
	                Ext.getCmp(cobranza.id + '-photo-person').doLayout();
				};
				downloadingImage.src = img;
				console.log(img);*/
			},
			getCentroTrabajo:function(){
				win.show({vurl: cobranza.url_ct+'get_centro_trabajo/?rollback=cobranza.getReloadCentroTrabajo();', id_menu: clientes.id_menu, class: ''});
			},
			getReloadCentroTrabajo:function(){
				
			}
		}
		Ext.onReady(cobranza.init,cobranza);
	}else{
		tab.setActiveTab(cobranza.id+'-win-form');
	}
</script>