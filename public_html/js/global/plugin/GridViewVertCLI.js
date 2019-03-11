/**
 * @class Ext.global.plugin.GridViewVertCLI
 * @extends Ext.form.Panel
 * @author Jim
 */
Ext.define('Ext.global.plugin.GridViewVertCLI',{
    extend: 'Ext.Container',
    xtype: 'GridViewVertCLI',
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
                        '<div class="list_grid_as__menu_line" style="width:75px;">',
                            '<div class="list_grid_as__menu_bar">',
                                '<div class="list_grid_as__menu_title_A">',
                                '<span>SOLICITUDES</span>',
                                '</div>',
                                '<div class="list_grid_as__menu_title">',
                                    '<span style="font-size:8px;text-align:center;">CANTIDAD:</span>',
                                    '<span style="font-size:14px;">{cantidad}</span>',
                                '</div>',
                            '</div>',
                        '</div>',
                        '<div class="list_grid_as__menu_line" style="width:75px;">',
                            '<div class="list_grid_as__menu_bar">',
   
                                '<div class="list_grid_as__menu_title">',
                                    '<span style="font-size:8px;text-align:center;">MONTO:</span>',
                                    '<span style="font-size:14px;">{monto}</span>',
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
                {name: 'id_per', type: 'string'},
                {name: 'nombres', type: 'string'},
                {name: 'ape_pat', type: 'string'},
                {name: 'ape_mat', type: 'string'},
                {name: 'doc_dni', type: 'string'},
                {name: 'cantidad', type: 'string'},
                {name: 'monto', type: 'string'}
            ],
            autoLoad:false,
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
                    //document.getElementById("menu_spinner").innerHTML = "";
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
                        id: config.id+'-list-clientes',
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
                        loadingText:'Cargando Lista de Clientes...',
                        emptyText: '<div class="list_grid_as__list_menu"><div class="list_grid_as__none_data" ></div><div class="list_grid_as__title_clear_data">NO TIENE NINGUN ASESOR</div></div>',
                        itemSelector: 'div.list_grid_as__list_menu_select',
                        trackOver: true,
                        overItemCls: 'list_grid_as__list_menu-hover',
                        listeners: {
                            //'itemdblclick': function(view, record, item, idx, event, opts) {
                            'itemclick': function(view, record, item, idx, event, opts) {
                                eval(config.id+'.getListaSolicitudes('+record.get('doc_dni')+')');
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
                                
                            }
                        }
                    }
                ],
                bbar: ['->',{
                            xtype: 'pagingtoolbar',
                            pageSize: 10,
                            store: store,
                            displayInfo: true,
                            displayMsg: '{0} - {1} de {2} Registros',
                            emptyMsg: 'No existe registros',
                            pageSize: 50
                            //plugins: new Ext.ux.ProgressBar()
                        },'->']
            }
        ];
        me.callParent();
    }
});

