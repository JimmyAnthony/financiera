/**
 * @class Ext.global.plugin.GridViewVertAS
 * @extends Ext.form.Panel
 * @author Jim
 */
Ext.define('Ext.global.plugin.GridViewVertAS',{
    extend: 'Ext.Container',
    xtype: 'GridViewVertAS',
    config: {
        layout: 'border',
        autoScroll:false,
        border:false,
        bodyStyle: 'background: transparent',
        bodyCls: 'transparent',
    },
    id_nov:0,
    idx:-1,
    config_:'',
    datafirst:{},
    bodyStyle: 'background: transparent',
    bodyCls: 'transparent',
    constructor: function(config){
        var me = this;
        me.config_=config;
        //console.log(config);
        var imageTplPointer = new Ext.XTemplate(
            '<tpl for=".">',
                '<div class="list_grid_as__list_menu_select" >',
                    '<div class="list_grid_as__list_menu" >',
                        '<div class="list_grid_as__menu_bx" >',
                            '<div class="">',
                                '<img src="/images/menu/{icono}" />',
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
                        '<div class="list_grid_as__menu_line" style="width:130px;">',
                            '<div class="list_grid_as__menu_bar">',
                                '<div class="list_grid_as__menu_title_A">',
                                '<span>Teléfonos:</span>',
                                '</div>',
                                '<div class="list_grid_as__menu_title">',
                                    '<span>{numero}</span>',
                                '</div>',
                            '</div>',
                        '</div>',
                        '<div class="list_grid_as__menu_line" style="width:400px;">',
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
                        '<div class="list_grid_as__menu_line" style="width:75px;">',
                            '<div class="list_grid_as__menu_bar">',
                                '<div class="list_grid_as__menu_title_A">',
                                '<span>SOLICITUDES</span>',
                                '</div>',
                                '<div class="list_grid_as__menu_title">',
                                    '<span style="font-size:8px;text-align:center;">CANTIDAD:</span>',
                                    '<span style="font-size:14px;">{solicitudes}</span>',
                                '</div>',
                            '</div>',
                        '</div>',
                        '<div class="list_grid_as__menu_line" style="width:75px;">',
                            '<div class="list_grid_as__menu_bar">',
   
                                '<div class="list_grid_as__menu_title">',
                                    '<span style="font-size:8px;text-align:center;">MONTO:</span>',
                                    '<span style="font-size:14px;">{sol_monto}</span>',
                                '</div>',
                            '</div>',
                        '</div>',
                        '<div class="list_grid_as__menu_line" style="width:75px;">',
                            '<div class="list_grid_as__menu_bar">',
                                '<div class="list_grid_as__menu_title_A">',
                                '<span>CLIENTES</span>',
                                '</div>',
                                '<div class="list_grid_as__menu_title">',
                                    '<span style="font-size:8px;text-align:center;">CANTIDAD:</span>',
                                    '<span style="font-size:14px;">{solicitudes}</span>',
                                '</div>',
                            '</div>',
                        '</div>',
                        '<div class="list_grid_as__menu_line" style="width:75px;">',
                            '<div class="list_grid_as__menu_bar">',
   
                                '<div class="list_grid_as__menu_title">',
                                    '<span style="font-size:8px;text-align:center;">MONTO:</span>',
                                    '<span style="font-size:14px;">{solicitudes}</span>',
                                '</div>',
                            '</div>',
                        '</div>',
                    '</div>',
                '</div>',
            '</tpl>'
        );
        var store = Ext.create('Ext.data.Store',{
            fields: [
                {name: 'id_asesor', type: 'string'},
                {name: 'nombres', type: 'string'},
                {name: 'ape_pat', type: 'string'},
                {name: 'ape_mat', type: 'string'},
                {name: 'dni', type: 'string'},
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
            autoLoad:true,
            proxy:{
                type: 'ajax',
                url: config.url,
                reader:{
                    type: 'json',
                    rootProperty: 'data'
                },
                extraParams:config.params
            },
            listeners:{
                load: function(obj, records, successful, opts){
                    console.log(records);
                    document.getElementById("menu_spinner").innerHTML = "";
                }
            }
        });

        me.items=[
            {
                region:'center',
                layout:'fit',
                frame:true,
                border:false,
                //bodyCls: 'white_bg',
                bodyStyle: 'background: transparent',
                bodyCls: 'transparent',
                items:[
                    {
                        xtype: 'dataview',
                        id: config.id+'-menu-view',
                        bodyStyle: 'background: transparent',
                        bodyCls: 'transparent',
                        layout:'fit',
                        store: store,
                        autoScroll: true,
                        loadMask:true,
                        autoHeight: false,
                        tpl: imageTplPointer,
                        multiSelect: false,
                        singleSelect: false,
                        loadingText:'Cargando Lista de Asesores...',
                        emptyText: '<div class="list_grid_as__list_menu"><div class="list_grid_as__none_data" ></div><div class="list_grid_as__title_clear_data">NO TIENE NINGUN ASESOR</div></div>',
                        itemSelector: 'div.list_grid_as__list_menu_select',
                        trackOver: true,
                        overItemCls: 'list_grid_as__list_menu-hover',
                        listeners: {
                            'itemdblclick': function(view, record, item, idx, event, opts) {
                                eval(config.id+'.back="'+config.back+'"');
                                eval(config.id+'.getClientes('+record.get('id_asesor')+')');
                                me.idx=idx;
                                var record = this.getStore().getAt(idx);
                                var val =record.data;
                                var menu_class = val.menu_class == null || val.menu_class == '' ? '' : val.menu_class;
                                if(val.nivel!=0){
                                    if(me.config_.mode==1){
                                        win.show({vurl: val.url, id_menu: idx, class: menu_class});//obj.getItemId().split('-')[1]  
                                    }else{
                                        var tab=Ext.getCmp(me.config_.tab);
                                        var active=Ext.getCmp(me.config_.id+val.tab);
                                        tab.setActiveTab(active);
                                    }
                                }
                                
                            }
                        }
                    }
                ]
            }
        ];
        me.callParent();
    }
});

