<?php
require_once("data.php");
class actcion{
	private $usuario; 
	private $data;
	public function __construct(){
		$this->data = new data();
	}
	/***********TREE**********/
	public function tree($param){		
		$tree = "[
                                        {
					text: 'Empresa', 
					iconCls: 'DirectionBoard',
					children: [{
						id:'ESTADISTICA_DATOS_EMP',
						text: 'Datos de Empresa',
						leaf: true
					},{
						id:'ESTADISTICA_DATOS_COBRADOR',
						text: 'Cobradores',
						leaf: true
					}]
					},{
					text: 'Clientes',
					iconCls: 'cog_edit',
					children: [{
						text: 'Listado de Clientes',
						id:'ESTADISTICA_CLIENTES',
						iconCls: 'user_suit',
						leaf: true
					}]
					},
					{
					text: 'Credito',
					iconCls: 'calculator',
					children: [{
						text: 'Listado de Creditos',
						id:'ESTADISTICA_CREDITOS',
						leaf: true
					}
					]
				},
                   {
					text: 'Recibos',
					iconCls: 'Contacts',
					children: [{
						text: 'Listados de Recibos',
						id:'ESTADISTICA_RECIBOS',
						leaf: true
					}	
					]},
                   {
					text: 'Compromisos',
					iconCls: 'Contacts',
					children: [{
						text: 'Compromisos Varios',
						id:'COMPROMISOS',
						leaf: true
					}]}				
				
				]";
				/*,{
					text: 'Reportes de Pagos',
					iconCls: 'example',
					children: [{
						text: 'Conformidad de Pago',
						leaf: true
					},{
						text: 'Boletas',
						leaf: true
					},{
						text: 'Planillas',
						leaf: true
					}]},
					{
					text: 'Evaluacion', 
					iconCls: 'DirectionBoard',
					children: [{
						id:'ESTADISTICA_SOLICITUDES',
						text: 'Solicitudes',
						leaf: true
					},
					{
						text: 'Evalua Prestamo',
						leaf: true
					}]
					},
					{
					text: 'Notificaciones',
					iconCls: 'comment',
					children: [{
						text: 'Recibo de Pago',
						leaf: true
					},{
						text: 'Adeudamiento',
						leaf: true
					},{
						text: 'Termino de contrato',
						leaf: true
					}]},
					{
					text: 'Maestros', 
					iconCls: 'user_gray',
					children: [{
						text: 'Formulas',
						leaf: true,
						iconCls:'Preferences'
					}]
					}*/

return $tree;
/*,
					{
					text: 'Deudas',
					iconCls: 'cmp',
					children: [{
						text: 'Consultar Deudas',
						id:'ESTADISTICA_DEUDAS',
						leaf: true
					}					
					]}*/
    }
	public function estadisticas($param){
	$tree = "[					
					{
					text: 'Diagramas',
					iconCls: 'calendario',
					children: [{
						text: 'Diagrama Prestamos',
						id:'ESTADISTICA_DIAGRAMA',
						leaf: true
					}]},
					{
					text: 'Ayuda',
					iconCls: 'comment',
					children: [{
						text: 'Empresa',
						leaf: true
					},{
						text: 'Clientes',
						leaf: true
					},{
						text: 'Credito',
						leaf: true
					},{
						text: 'Deudas',
						leaf: true
					},{
						text: 'Recibos',
						leaf: true
					}]}
				]";

return $tree;
	}
}//fin action
?>