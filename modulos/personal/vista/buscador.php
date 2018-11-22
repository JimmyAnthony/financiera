<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style type="text/css">

        </style>
    </head>
    <body>
        <script type="text/javascript">	
            Ext.ns("xim.estadistica.personal");
            xim.estadistica.personal = {
                div : 'Div_MANT_PER',
                url:'modulos/personal/capas/control.php',
                id:'xim',
                //chooser:{}, 
                ximModo:0,
                btn:'',
                init: function(){          			
                    //Ext.tip.QuickTips.init();  // enable tooltips
                    //creamos un formulario
                    var clock = new Ext.Toolbar.TextItem('');
                    var store = new Ext.data.JsonStore({
                        url:this.url,
                        autoLoad:true,
                        baseParams:{op:'get_personal'},
                        root:'data',
                        fields:['idper','nombre','dni','flag']
                    }); 
                    var chk_model = new Ext.grid.CheckboxSelectionModel({
                        singleSelect:false,
                        checkOnly:false,
                        injectCheckbox :false,
                    });

                    this.form = new Ext.form.FormPanel({
                        standardSubmit: true, // traditional submit
                        //url: 'submitform.php',
                        title:'Contenido',
                        //hidden:true,
                        region		: "west",
                        margins		: "3 3 3 3",
                        width		: 200,
                        anchor:'99%',
                        //split:'true',
                        collapsible:true,
                        store		: this.store,
                        bodyStyle	: "padding: 10px;",
                        //url			: "recursos_humanos/rrhh_valores/capas/control.php",
                        border		: false,
                        defaults	: {allowBlank: false},
                        items		: [
							

                        ]
                    });	
		
                    this.form2 = new Ext.form.FormPanel({
                        standardSubmit: true, // traditional submit
                        //url: 'submitform.php',
                        region		: "center",
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
                                xtype:'panel',
                                layout:'fit',
                                border:false,
                                //width:740,
                                anchor:'99%',
                                items:[								
                                    {
                                        xtype:'fieldset',
                                        title:'Listado del Personal',
                                        //height:340,
                                        anchor:'99%',
                                        //layout:'fit',
                                        items:[
                                            {
                                                xtype:'panel',
                                                border:false,
                                                //id:'mensajssero',
                                                width:619,
                                                height:45,
                                                items:[
                                                    {
                                                        xtype:'panel',
                                                        border:true,
                                                        height:42,
                                                        //id:'mensajssero',
                                                        //width:220,
                                                        //padding:5,
                                                        //height:125,
                                                        items:[
                                                            {
                                                                xtype:'fieldset',
                                                                //title:'Buscar Por',
                                                                border:false,
                                                                layout:'table',
                                                                layoutConfig:{
                                                                    columns:2
                                                                },
                                                                width:615,
                                                                items:[																		
                                                                    {
                                                                        xtype: 'radiogroup',
                                                                        fieldLabel: 'Auto Layout',
                                                                        width:150,
                                                                        items: [
                                                                            {boxLabel: 'Nombres', name: 'rb-auto', inputValue: 1, checked: true},
                                                                            {boxLabel: 'DNI', name: 'rb-auto', inputValue: 2}											
                                                                        ]
                                                                    },
                                                                    {
                                                                        xtype:'panel',
                                                                        border:false,
                                                                        width:442,
                                                                        items:[
                                                                            {
                                                                                xtype:'textfield',
                                                                                id:'_txt_nombres',
                                                                                autoCreate: {tag: 'input', type: 'text', size: '82', autocomplete: 'off', maxlength: '1000'},
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
                                                                    }
                                                                ]
                                                            }
                                                        ]
                                                    }
                                                ]
                                            },
                                            {
                                                xtype:'grid',
                                                store:store,
                                                layout:'fit',
                                                height:258,
                                                id:xim.estadistica.personal+'_grid_personal',
                                                columns:[
                                                    new Ext.grid.RowNumberer(),
                                                    {header:'ID',dataIndex:'idper',width:50},
                                                    {header:'Nombre',dataIndex:'nombre',width:250},
                                                    {header:'DNI',dataIndex:'dni',width:100},						
                                                    {header:'Estado',dataIndex:'flag',width:120},
                                                    chk_model                        ],
                                                bbar: new Ext.PagingToolbar({
                                                    id:xim.estadistica.personal+'_pager',
                                                    store:store,
                                                    displayInfo:true,
                                                    displayMsg:'{0} - {1} de {2} Personal.',
                                                    emptyMsg:'No hay Personal',
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
                                        ],
                                        listeners: {
                                            'afterrender':function(obj){
                                                //xim.estadistica.personal.cargaContenido();
                                            }
                                        }
                                    }
                                ]
                            }
                        ]	
                    });
                    var ventana = Ext.getCmp(this.div);
                    ventana.add({                
                        //title	: "LISTADO DE VALORES",
                        layout	: "border",
                        //margins		: "0 0 0 0",
                        /*width	: 600,
                                height	: 400,*/
                        items	: [this.form,this.form2],
                        listeners:{
                            'render':function(obj){
                                ximx.closep();
                            }
                        }
                        ,buttons:[
                            {
                                text : "Nuevo", 
                                iconCls:'nuevo',
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
                    ximx.close('MANT_PER');
                }
            }
            Ext.onReady(xim.estadistica.personal.init,xim.estadistica.personal);

        </script>
    </body>
</html>