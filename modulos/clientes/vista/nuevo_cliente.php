<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style type="text/css">

        </style>
    </head>
    <body>
        <script type="text/javascript">
            Ext.ns("xim.estadistica.cliente_nuevo");
            xim.estadistica.cliente_nuevo = {
                div : 'Div_ESTADISTICA_CLIENTES_NUEVO',
                url:'modulos/clientes/capas/control.php',
                id:'xim',
                cod_cli:'<?php echo $cod_cli;?>',
				cod_est:'<?php echo $cod_est;?>',
				cod_pais:'<?php echo $cod_pais;?>',
				cod_pro:'<?php echo $cod_pro;?>',
				cod_garante:'<?php echo $cod_garante;?>',
				cod_laboral:'<?php echo $cod_laboral;?>',
				cod_prop:'<?php echo $cod_prop;?>',
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
					var storers = new Ext.data.JsonStore({
						url:this.url,
						autoLoad:true,
						baseParams:{op:'get_grid_pais'},
						root:'data',
						fields:['cod_pais','nombre','flag']
					});
					var storess = new Ext.data.JsonStore({
						url:this.url,
						autoLoad:false,
						baseParams:{op:'get_grid_provincias'},
						root:'data',
						fields:['cod_provincia','cod_pais','nombre','flag']
					});
					/****TAB***/
                    var home = new Ext.Panel({
                        title:'Garante',
                        iconCls: 'user',
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
                                    text:'Nombres:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:10
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.cliente_nuevo.id+'_txt_nombres_ga',
                                        autoCreate: {tag: 'input', type: 'text', size: '34', autocomplete: 'off', maxlength: '1000'},
                                        //fieldLabel:'Tramite',
										value:'<?php echo $nombre_ga;?>',
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
                                    xtype:'label',
                                    text:'Apellidos:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:12
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.cliente_nuevo.id+'_txt_apellidos_ga',
                                        autoCreate: {tag: 'input', type: 'text', size: '34', autocomplete: 'off', maxlength: '1000'},
                                        //fieldLabel:'Tramite',
										value:'<?php echo $apellido_ga;?>',
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
                                    text:'Telefono:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:12
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.cliente_nuevo.id+'_txt_telf_ga',
                                        autoCreate: {tag: 'input', type: 'text', size: '34', autocomplete: 'off', maxlength: '1000'},
                                        //fieldLabel:'Tramite',
										value:'<?php echo $telefono_ga;?>',
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
                                    xtype:'label',
                                    text:'Domicilio:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:12
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.cliente_nuevo.id+'_txt_domicilio_ga',
                                        autoCreate: {tag: 'input', type: 'text', size: '34', autocomplete: 'off', maxlength: '1000'},
                                        //fieldLabel:'Tramite',
										value:'<?php echo $domicilio_ga;?>',
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
                            columns:13
                            },
                            items:[
                                {
                                    xtype:'label',
                                    text:'Profesion:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:8
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.cliente_nuevo.id+'_txt_profesion_ga',
                                        autoCreate: {tag: 'input', type: 'text', size: '34', autocomplete: 'off', maxlength: '1000'},
                                        //fieldLabel:'Tramite',
										value:'<?php echo $profesion_ga;?>',
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
                                width:11
                                },
                                {
                                    xtype:'label',
                                    text:'Sueldo:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:12
                                },                               
								{
									xtype: 'spinnerfield',
									id:xim.estadistica.cliente_nuevo.id+'_txt_sueldo_ga',
									width:86,
									name: 'test',
									minValue: 0,
									maxValue: 99999999,
									allowDecimals: true,
									decimalPrecision: 2,
									incrementValue: 1,
									value:'<?php if(!empty($sueldo_ga)){echo $sueldo_ga;}else{echo 0;}?>',
									alternateIncrementValue: 3.10,
									accelerate: true
								},
                                {
                                xtype:'panel',
                                colspan:2,
                                border:false,
                                width:5
                                },
                                {
                                    xtype:'label',
                                    text:'DNI:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:12
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.cliente_nuevo.id+'_txt_dni_ga',
                                        autoCreate: {tag: 'input', type: 'text', size: '9', autocomplete: 'off', maxlength: '1000'},
                                        //fieldLabel:'Tramite',
										value:'<?php echo $dni_ga;?>',
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
                           }
                        ]
                    });
                    var home2 = new Ext.Panel({
                        title:'Laboral',
                        iconCls: 'empleo',
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
                                    text:'Profesion:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:14
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.cliente_nuevo.id+'_txt_prof',
                                        autoCreate: {tag: 'input', type: 'text', size: '34', autocomplete: 'off', maxlength: '1000'},
                                        //fieldLabel:'Tramite',
										value:'<?php echo $profesion;?>',
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
                                width:28
                                },
                                {
                                    xtype:'label',
                                    text:'Sueldo:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:12
                                },                               
								{
									xtype: 'spinnerfield',
									id:xim.estadistica.cliente_nuevo.id+'_txt_sueldo',
									width:86,
									name: 'test',
									minValue: 0,
									maxValue: 9999999999,
									allowDecimals: true,
									decimalPrecision: 2,
									incrementValue: 1,
									value:'<?php if(!empty($sueldo)){echo $sueldo;}else{echo 0;}?>',
									alternateIncrementValue: 4.10,
									accelerate: true
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
                                    text:'Empleador:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:9
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.cliente_nuevo.id+'_txt_empl',
                                        autoCreate: {tag: 'input', type: 'text', size: '34', autocomplete: 'off', maxlength: '1000'},
                                        //fieldLabel:'Tramite',
										value:'<?php echo $empleador;?>',
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
                                    xtype:'label',
                                    text:'Antiguedad:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:12
                                },                         
								{
									xtype: 'spinnerfield',
									id:xim.estadistica.cliente_nuevo.id+'_txt_ant',
									width:86,
									name: 'test',
									minValue: 0,
									maxValue: 100,
									allowDecimals: false,
									decimalPrecision: 2,
									incrementValue: 1,
									value:'<?php if(!empty($antiguedad)){echo $antiguedad;}else{echo 0;}?>',
									alternateIncrementValue: 1,
									accelerate: true
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
                            columns:13
                            },
                            items:[
                                {
                                    xtype:'label',
                                    text:'Telefono:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:17
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.cliente_nuevo.id+'_txt_telefono',
                                        autoCreate: {tag: 'input', type: 'text', size: '34', autocomplete: 'off', maxlength: '1000'},
                                        //fieldLabel:'Tramite',
										value:'<?php echo $telefono_empl;?>',
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
                                width:24
                                },
                                {
                                    xtype:'label',
                                    text:'Domicilio:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:8
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.cliente_nuevo.id+'_txt_domi_empre',
                                        autoCreate: {tag: 'input', type: 'text', size: '30', autocomplete: 'off', maxlength: '1000'},
                                        //fieldLabel:'Tramite',
										value:'<?php echo $domicilio_emple;?>',
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
                           }
                        ]
                    });
                    var home3 = new Ext.Panel({
                        title:'Propiedad',
                        iconCls: 'ubicaciones',
                        //width:200,
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
                                    text:'Tipo:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:14
                                },
                                {
								xtype:'combo',
								//fieldLabel:'',
								id:xim.estadistica.cliente_nuevo.id+'_cmb_tipo',
								width:251,
								forceSelection:true,
								emptyText:'Seleccione tipo de Propiedad...',
								store: new Ext.data.JsonStore({
									url:this.url,
									root:'data',
									autoLoad:true,
									totalProperty:'total',
									baseParams:{op:'get_combo_propiedad'},
									fields:['cod_prop','nombre']
								}),
								mode:'local',
								triggerAction:'all',
								lazyRender:true,
								editable:true,
								displayField:'nombre',
								valueField:'cod_prop',
								anchor:'99%',
								listeners:{
									'render':function(obj){
										obj.getStore().load({
											callback:function(){
												obj.setValue('<?php echo $cod_prop;?>');	
											}
										});								
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
							},//fin combo
							{
							xtype:'panel',
							colspan:3,
							border:false,
							height:5
							},
							 {
                                    xtype:'label',
                                    text:'Descripcion:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:14
                                },
								{
									xtype: 'textarea',
									fieldLabel: 'Ingrese una descripcion',
									id:xim.estadistica.cliente_nuevo.id+'_txt_descrip',
									value:'<?php echo $descripcionp;?>',
									width:450,
									hideLabel: true,
									name: 'msg',
									flex: 1
								}
                            ]
                           }
                        ]
                    });
					var home4 = new Ext.Panel({
                        title:'Observaciones',
                        iconCls: 'monitor_off',
                        //width:200,
                        items:[
						{
                            xtype:'panel',
                            //title:'Buscar Por',
                            border:false,
                            bodyStyle	: "padding: 5px;",
                            layout:'table',                            
                            layoutConfig:{
                            columns:1
                            },
                            items:[
							{
                                    xtype:'label',
                                    text:'Observaciones:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                height:7
                                },
								{
									xtype: 'textarea',
									fieldLabel: 'Ingrese una descripcion',
									id:xim.estadistica.cliente_nuevo.id+'_txt_obs',
									value:'<?php echo $descripcion;?>',
									width:520,
									height:75,
									hideLabel: true,
									name: 'msg',
									flex: 1
								}
                            ]
                           }
							]
						});
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
                        items:[home,home2,home3,home4]
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
                        id:xim.estadistica.cliente_nuevo.id+'_wind_cliente',
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
                                width:19
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.cliente_nuevo.id+'_txt_codigo',
                                        autoCreate: {tag: 'input', type: 'text', size: '15', autocomplete: 'off', maxlength: '1000'},
										disabled:true,
                                        //fieldLabel:'Tramite',
										value:'<?php echo $cod_cli;?>',
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
                                width:193
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
							   id:xim.estadistica.cliente_nuevo.id+'_fecha_registro',
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
                                    text:'Nombres:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:10
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.cliente_nuevo.id+'_txt_nombres',
                                        autoCreate: {tag: 'input', type: 'text', size: '45', autocomplete: 'off', maxlength: '1000'},
                                        //fieldLabel:'Tramite',
										value:'<?php echo $nombres;?>',
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
                                width:30
                                },
                                {
                                    xtype:'label',
                                    text:'Apellidos:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:12
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.cliente_nuevo.id+'_txt_apellidos',
                                        autoCreate: {tag: 'input', type: 'text', size: '45', autocomplete: 'off', maxlength: '1000'},
                                        //fieldLabel:'Tramite',
										value:'<?php echo $apellidos;?>',
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
                                    text:'Nacimiento:'
                                },
                                 {
								   xtype:'datefield',
								   id:xim.estadistica.cliente_nuevo.id+'_fecha_nacimiento',
								   format:'d/m/Y',
								   value:'<?php if(!empty($nacimiento)){echo $nacimiento;}else{echo date('d/m/Y');}?>',
								   },
                                {
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:13
                                },
                                {
                                    xtype:'label',
                                    text:'Edad:'
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.cliente_nuevo.id+'_txt_edad',
                                        autoCreate: {tag: 'input', type: 'text', size: '5', autocomplete: 'off', maxlength: '1000'},
                                        //fieldLabel:'Tramite',
										value:'<?php echo $edad;?>',
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
                                width:119
                                },
                                {
                                    xtype:'label',
                                    text:'DNI:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:12
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.cliente_nuevo.id+'_txt_dni',
                                        autoCreate: {tag: 'input', type: 'text', size: '10', autocomplete: 'off', maxlength: '1000'},
                                        //fieldLabel:'Tramite',
										value:'<?php echo $dni;?>',
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
                            columns:11
                            },
                            items:[
                                {
                                    xtype:'label',
                                    text:'Domicilio:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:11
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.cliente_nuevo.id+'_txt_domi',
                                        autoCreate: {tag: 'input', type: 'text', size: '45', autocomplete: 'off', maxlength: '1000'},
                                        //fieldLabel:'Tramite',
										value:'<?php echo $domicilio;?>',
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
                                width:38
                                },
                                {
                                    xtype:'label',
                                    text:'Pais:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:3
                                },
                                {
                                    xtype: 'tbbutton',									
									iconCls:'buscar',
									listeners:{
										click:function(obj, e){
												var chk_models = new Ext.grid.CheckboxSelectionModel({
													singleSelect:false,
													checkOnly:false,
													injectCheckbox :false
												});
											    var win = new Ext.Window({  
													title: 'Listado de Paises',
													id:xim.estadistica.cliente_nuevo.id+'win_paises',
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
                                                                id: 'filter-galeriesss',
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
														store:storers,
														//layout:'fit',				
														id:xim.estadistica.cliente_nuevo.id+'_grid_paises',
														height:284,
														columns:[
															new Ext.grid.RowNumberer(),
															{header:'Codigo',dataIndex:'cod_pais',width:50},
															{header:'Nombres',dataIndex:'nombre',width:170},
															chk_models],
														bbar: new Ext.PagingToolbar({
															id:'_pager',
															store:storers,
															displayInfo:true,
															displayMsg:'{0} - {1} de {2} Paises.',
															emptyMsg:'Paises',
															pageSize:80
														}),
														sm:chk_models,
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
																xim.estadistica.cliente_nuevo.select_pais();					
															}
														}
																	}//fin grid
													
													],buttons:[
													{
														text : "Aceptar",
														iconCls:'aceptar',
														scope : this,
														handler:xim.estadistica.cliente_nuevo.select_pais
													},
													{
														text : "Salir",
														scope : this,
														listeners:{
															click:function(obj, e){
																Ext.getCmp(xim.estadistica.cliente_nuevo.id+'win_paises').close();
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
                                width:3
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.cliente_nuevo.id+'_txt_pais',
                                        autoCreate: {tag: 'input', type: 'text', size: '45', autocomplete: 'off', maxlength: '1000'},
                                        //fieldLabel:'Tramite',
										value:'<?php echo $nombre_pais;?>',
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
                            columns:11
                            },
                            items:[
                                {
                                    xtype:'label',
                                    text:'Telefonos:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:5
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.cliente_nuevo.id+'_txt_telf',
                                        autoCreate: {tag: 'input', type: 'text', size: '31', autocomplete: 'off', maxlength: '1000'},
                                        //fieldLabel:'Tramite',
										value:'<?php echo $telefono?>',
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
                                width:83
                                },
                                {
                                    xtype:'label',
                                    text:'Provincia:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:3
                                },
                                {
                                    xtype: 'tbbutton',									
									iconCls:'buscar',
									listeners:{
										click:function(obj, e){
												var cod_pais = xim.estadistica.cliente_nuevo.cod_pais;
												if(cod_pais==0){
													Ext.Msg.show({
														title: 'MAC',
														msg: 'Seleccione un pais antes de elegir una provincia por favor!',
														buttons: Ext.Msg.OK,
														icon: Ext.Msg.WARNING
													});return;
												}			
												var chk_modelss = new Ext.grid.CheckboxSelectionModel({
													singleSelect:false,
													checkOnly:false,
													injectCheckbox :false
												});
											    var win = new Ext.Window({  
													title: 'Listado de Provincias',
													id:xim.estadistica.cliente_nuevo.id+'win_provincias',
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
                                                                id: 'filter-galeriessssdsd',
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
														store:storess,
														//layout:'fit',				
														id:xim.estadistica.cliente_nuevo.id+'_grid_provincia',
														height:284,
														columns:[
															new Ext.grid.RowNumberer(),
															{header:'Codigo',dataIndex:'cod_cli',width:50},
															{header:'Nombres',dataIndex:'nombre',width:170},
															chk_modelss],
														bbar: new Ext.PagingToolbar({
															id:'_pager_provincia',
															store:storess,
															displayInfo:true,
															displayMsg:'{0} - {1} de {2} Provincia.',
															emptyMsg:'Provincia',
															pageSize:80
														}),
														sm:chk_modelss,
														stripeRows:true,
														anchor:'99%',
														loadMask:true,
														listeners:{
															'render':function(){
																Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_grid_provincia').getStore().reload({
																	params:{
																		op:'get_grid_provincias',cod_pais:xim.estadistica.cliente_nuevo.cod_pais
																	}
																});		
															},
															rowdblclick:function(obj, index, e){
																xim.estadistica.cliente_nuevo.select_provincia();					
															}
														}
														,
														sm: new Ext.grid.RowSelectionModel({
															singleSelect:true,
															listeners:{
																rowselect:function(sm,row,rec){
																		
																}
															}
														})
																	}//fin grid
													
													],buttons:[
													{
														text : "Aceptar",
														iconCls:'aceptar',
														scope : this,
														handler:xim.estadistica.cliente_nuevo.select_provincia
													},
													{
														text : "Salir",
														scope : this,
														listeners:{
															click:function(obj, e){
																Ext.getCmp(xim.estadistica.cliente_nuevo.id+'win_provincias').close();
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
                                width:3
                                },
                                {
                                        xtype:'textfield',
                                        id:xim.estadistica.cliente_nuevo.id+'_txt_prov',
                                        autoCreate: {tag: 'input', type: 'text', size: '45', autocomplete: 'off', maxlength: '1000'},
                                        //fieldLabel:'Tramite',
										value:'<?php echo $nombre_provincia;?>',
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
                            columns:11
                            },
                            items:[
                                {
                                    xtype:'label',
                                    text:'L.Credito:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:7
                                },
                                {
									xtype: 'spinnerfield',
									id:xim.estadistica.cliente_nuevo.id+'_txt_limite_cred',
									width:182,
									name: 'test',
									minValue: 0,
									maxValue: 99999999,
									allowDecimals: true,
									decimalPrecision: 2,
									incrementValue: 1,
									value:<?php if(!empty($limite_credito)){echo $limite_credito;}else{echo 0;}?>,
									alternateIncrementValue: 3.10,
									accelerate: true
								},
                                {
                                xtype:'panel',
                                colspan:2,
                                border:false,
                                width:108
                                },
                                {
                                    xtype:'label',
                                    text:'Est. Civil:'
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:3
                                },
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:3
                                },
                               
							{
								xtype:'combo',
								//fieldLabel:'Aerolineas',
								id:xim.estadistica.cliente_nuevo.id+'_cmb_est',
								width:251,
								forceSelection:true,
								emptyText:'Seleccione tipo de estado...',
								store: new Ext.data.JsonStore({
									url:this.url,
									root:'data',
									autoLoad:true,
									totalProperty:'total',
									baseParams:{op:'get_combo_estado'},
									fields:['cod_estado','nombre']
								}),
								mode:'local',
								triggerAction:'all',
								lazyRender:true,
								editable:true,
								displayField:'nombre',
								valueField:'cod_estado',
								anchor:'99%',
								listeners:{
									'render':function(obj){
										obj.getStore().load({
											callback:function(){
												obj.setValue('<?php echo $cod_est;?>');		
											}
										});								
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
                            border:true,
							height:145,							
                            bodyStyle	: "padding: 5px;margin:5px;",
                            layout:'table',
                            layoutConfig:{
                            columns:11
                            },
                            items:[
								{
								xtype:'panel',
								width:100,
								height:133,
								html:'<div id="img_empre" style="width:100;heigth:130;"><img src="galeria/clientes/<?php echo $img;?>" id="img_empresa" name="img_empresa" width="100" height="130"/></div>'
								},
								{
                                xtype:'panel',
                                colspan:1,
                                border:false,
                                width:3
                                },
								{
								xtype:'panel',
								height:133,
								items:[
								this.tabs
								]
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
                                text : "Imagen",
                                iconCls:'imagen',
                                scope : this,
                                handler:this.imagen_cliente
                            },                           
                            {
                                text : "Guardar",
                                iconCls:'guardar',
                                scope : this,
                                handler:this.graba_actualiza_cliente
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
                    ximx.close('ESTADISTICA_CLIENTES_NUEVO');
                },
				select_pais:function(){
					var rec = Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_grid_paises').getSelectionModel().getSelected();
					if(rec==undefined){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Seleccione un pais por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}							
					xim.estadistica.cliente_nuevo.cod_pais = rec.get('cod_pais');
					Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_pais').setValue(rec.get('nombre'));
					xim.estadistica.cliente_nuevo.cod_pro = 0;
					Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_prov').setValue('');
					Ext.getCmp(xim.estadistica.cliente_nuevo.id+'win_paises').close();
				},
				select_provincia:function(){
					var rec = Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_grid_provincia').getSelectionModel().getSelected();
					if(rec==undefined){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Seleccione una provincia por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}							
					xim.estadistica.cliente_nuevo.cod_pro = rec.get('cod_provincia');
					Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_prov').setValue(rec.get('nombre'));
					Ext.getCmp(xim.estadistica.cliente_nuevo.id+'win_provincias').close();
				},
				graba_actualiza_cliente:function(){				
					/*******DATOS SOLOS***********/
					//var cod_est = xim.estadistica.cliente_nuevo.cod_est;//what da faq - O_o
					var cod_pais = xim.estadistica.cliente_nuevo.cod_pais;
					var cod_pro = xim.estadistica.cliente_nuevo.cod_pro;
					var cod_garante =xim.estadistica.cliente_nuevo.cod_garante;
					var cod_laboral =xim.estadistica.cliente_nuevo.cod_laboral;
					var cod_prop =xim.estadistica.cliente_nuevo.cod_prop;
					/*GARANTE*/								
					var nombre_garante =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_nombres_ga').getValue();
					var apellidos_garante =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_apellidos_ga').getValue();
					var telefono_garante =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_telf_ga').getValue();
					var domicilio_garante =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_domicilio_ga').getValue();
					var profesion_garante =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_profesion_ga').getValue();
					var sueldo_garante =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_sueldo_ga').getValue();
					var dni_garante =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_dni_ga').getValue();
					/*LABORAL*/
					var profesion =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_prof').getValue();
					var sueldo =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_sueldo').getValue();
					var empleador =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_empl').getValue();
					var antiguedad =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_ant').getValue();
					var telefono_lab =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_telefono').getValue();
					var domicilo_empresa =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_domi_empre').getValue();
					/*PROPIEDAD*/
					var tipo_propiedad =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_cmb_tipo').getValue();
					var descripcion_pro =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_descrip').getValue();
					/*OBSERVACIONES*/
					var observaciones =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_obs').getValue();
					/*FORMULARIO*/
					var cod_cli =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_codigo').getValue();
					var fecha_registro =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_fecha_registro').getValue();
					var nombres =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_nombres').getValue();
					var apellidos =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_apellidos').getValue();
					var fecha_nacimiento =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_fecha_nacimiento').getValue();
					var edad =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_edad').getValue();
					var dni =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_dni').getValue();
					var domicilio =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_domi').getValue();
					//var pasis =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_pais').getValue();
					var telefono =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_telf').getValue();
					//var provincia =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_prov').getValue();
					var limite_credito =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_limite_cred').getValue();
					var estado_civil =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_cmb_est').getValue();
					/*TRANSFORMACION DE FECHAS*/
					fecha_registro= fecha_registro.format('Y/m/d');
					fecha_nacimiento= fecha_nacimiento.format('Y/m/d');
					/*************VALIDACIONES*************/
					if(cod_pais== ''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Seleccione un pais por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					if(cod_pais== 0){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Seleccione un pais por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					if(cod_pro== ''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Seleccione una provincia por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					if(cod_pro== 0){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Seleccione una provincia por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					if(nombre_garante== ''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Ingrese nombre del garante por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					if(apellidos_garante== ''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Ingrese apellidos del garante por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					if(domicilio_garante==''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Ingrese el domicilio del garante por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					if(sueldo_garante==''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Ingrese sueldo del garante por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					if(dni_garante==''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Ingrese dni del garante por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					if(sueldo==''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Ingrese sueldo del cliente por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					if(nombres==''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Ingrese nombre del cliente por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					if(apellidos==''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Ingrese apellidos del cliente por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					if(fecha_nacimiento==''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Ingrese fecha de nacimiento del cliente por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					if(edad==''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Ingrese edad del cliente por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					if(dni==''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Ingrese dni del cliente por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					if(limite_credito==''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Ingrese limite de credito del cliente por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					if(limite_credito==0){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'El limite de credito del cliente debe ser mayor a cero, ingrese un monto mas elevado por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					if(estado_civil==''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Ingrese estado civil del cliente por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					if(tipo_propiedad==''){
					Ext.Msg.show({
						title: 'MAC',
						msg: 'Seleccione un tipo de propiedad del cliente por favor!',
						buttons: Ext.Msg.OK,
						icon: Ext.Msg.WARNING
					});return;
            		}
					if(!confirm('Desea ejecutar el proceso?')){return;}
					/*####################CHANGE##################*/
					var data = 'op=grabar_update_cliente&cod_pais='+cod_pais+'&cod_pro='+cod_pro+'&cod_garante='+cod_garante+'&cod_laboral='+cod_laboral+'&cod_prop='+cod_prop+'&nombre_garante='+nombre_garante+'&apellidos_garante='+apellidos_garante+'&telefono_garante='+telefono_garante+'&domicilio_garante='+domicilio_garante+'&profesion_garante='+profesion_garante+'&sueldo_garante='+sueldo_garante+'&dni_garant='+dni_garante+'&profesion='+profesion+'&sueldo='+sueldo+'&empleador='+empleador+'&antiguedad='+antiguedad+'&telefono_lab='+telefono_lab+'&domicilo_empresa='+domicilo_empresa+'&tipo_propiedad='+tipo_propiedad+'&descripcion_pro='+descripcion_pro+'&observaciones='+observaciones+'&cod_cli='+cod_cli+'&fecha_registro='+fecha_registro+'&nombres='+nombres+'&apellidos='+apellidos+'&fecha_nacimiento='+fecha_nacimiento+'&edad='+edad+'&dni='+dni+'&domicilio='+domicilio+'&telefono='+telefono+'&limite_credito='+limite_credito+'&estado_civil='+estado_civil;

					Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_wind_cliente').el.mask('Cargando...', 'x-mask-loading');	
					Ext.Ajax.request({
						url:xim.estadistica.cliente_nuevo.url,
						params:data,
						success:function(response,options){
							Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_wind_cliente').el.unmask();
							var msg = Ext.decode(response.responseText);
								if(parseInt(msg['est'])==1){
									Ext.Msg.show({
										title: 'MAC',
										msg: 'El proceso termino correctamente!',
										buttons: Ext.Msg.OK, 
										icon: Ext.Msg.INFO
									});		
									
										Ext.getCmp(xim.estadistica.clientes+'_grid_clientes').getStore().reload({
											params:{
												op:'get_grid_clientes'
											}
										});			
										ximx.close('ESTADISTICA_CLIENTES_NUEVO');				
								}else if(parseInt(msg['est'])==2){
									Ext.Msg.show({
										title: 'MAC',
										msg: 'NO SE LOGRO GENERAR LA ACCION, INTENTE OTRA VEZ POR FAVOR!',
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
				imagen_cliente:function(){
					var cod_cli =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_codigo').getValue();	
					if(cod_cli==''){
						Ext.Msg.show({
							title: 'MAC',
							msg: 'PARA INGRESAR UNA IMAGEN DEL CLIENTE PRIMERO DEBE GUARDAR SUS DATOS!',
							buttons: Ext.Msg.OK, 
							icon: Ext.Msg.WARNING
						});		
						return;
					}
					var win = new Ext.Window({  
					title: 'Imagen cliente',
					id:'win_imagen_cliente',
					closable:false,
					width: 300,
					modal:true,
					//layout:'fit',
					height:300,
					html:'<iframe name="iframeUpload" style="display:none; height:10px"></iframe><div id="divContenedor" style="border:1px solid;width:280px;height:210px;overflow:auto; clear:both;" align="center"><img src="galeria/clientes/<?php echo $img;?>" style=" padding-top:0px;"/></div><form method="post" action="upload/uploader.php" name="FomrM"  enctype="multipart/form-data" target="iframeUpload"><iframe name="iframeUpload" style="display:none; height:10px"></iframe><input  name="archivo-xim-img" type="file" class="casilla" onChange="mostrarImagen();" id="archivo-xim-img" size="17" style="float:left"/><input type="hidden" name="action" value="image" /><input type="hidden" name="opcion" id="opcion" value="ESTADISTICA_CLIENTES" /><input type="hidden" name="cod_cli" id="cod_cli" value="<?php echo $cod_cli;?>" /><input type="hidden" name="imagen_ok" id="imagen_ok" value="<?php echo $img;?>" /><input type="button" class="button"  value="guardar" onClick="return SubMit();" id="btn_guardar" name="btn_guardar" style="float:left"/></form></fieldset>',
					buttons:[						
						{
							text : "Salir",
							scope : this,
							listeners:{
								click:function(obj, e){									
									xim.estadistica.cliente_nuevo.recarga_img();
								}
							},
							iconCls:'salir'
						}
					]//botones del formulario
					});  					 
					win.show();
				},
				recarga_img:function(){
					Ext.getCmp('win_imagen_cliente').el.mask('Cargando...', 'x-mask-loading');		
					var cod_cli =Ext.getCmp(xim.estadistica.cliente_nuevo.id+'_txt_codigo').getValue();						
					var data = 'op=get_img&cod_cli='+cod_cli;
					Ext.Ajax.request({
						url:xim.estadistica.cliente_nuevo.url,
						params:data,
						success:function(response,options){
							Ext.getCmp('win_imagen_cliente').el.unmask();
							var resp = Ext.decode(response.responseText);
							document.getElementById("img_empre").innerHTML='<img src="galeria/clientes/'+resp['img']+'" id="img_empresa" name="img_empresa" width="100" height="130" />';	
							//document.getElementById("imagen_ok").value=resp['img'];  
							//document.getElementById("divContenedor").innerHTML='<img src="galeria/empresa/'+resp['img']+'"/>';							 
							Ext.getCmp('win_imagen_cliente').close();								
						}
					});
				}
            }
            Ext.onReady(xim.estadistica.cliente_nuevo.init,xim.estadistica.cliente_nuevo);

        </script>
    </body>
</html>