<?php
session_start();
//error_reporting(0);
require_once("accion.php");
require_once "../../../factory/Parameter.class.php";
require_once "../../../factory/DAOFactory.class.php";
class control {
    private $accion;
    private $param;
    private $op;
    public function __construct($op='', $datos='') {
        $this->accion = new actcion();
        $this->param = ($datos != "") ? $datos : $_REQUEST;
        $this->op = ($op != "") ? $op : $this->param["op"];
    }
    public function eventos(){
        switch (trim($this->op)) {
            case "get_compromisos":
                header("Content-Type: text/plain");
                $resultado = $this->accion->get_compromisos($this->param);
                break;
			case "get_calculo_generado":
                header("Content-Type: text/plain");
                $resultado = $this->accion->get_calculo_generado($this->param);
                break;
            case "form_nuevo_credito":
                header("Content-Type: text/plain");
                $resultado = $this->accion->form_nuevo_credito($this->param);
                break;
			case "get_combo_metodos":
                header("Content-Type: text/plain");
                $resultado = $this->accion->get_combo_metodos($this->param);
                break;
			case "get_combo_tipo_credito":
                header("Content-Type: text/plain");
                $resultado = $this->accion->get_combo_tipo_credito($this->param);
                break;
			case "get_clientes":
                header("Content-Type: text/plain");
                $resultado = $this->accion->get_clientes($this->param);
                break;
			case "get_calculo_prestamo":
                header("Content-Type: text/plain");
                $resultado = $this->accion->get_calculo_prestamo($this->param);
                break;
			case "get_combo_entrega":
                header("Content-Type: text/plain");
                $resultado = $this->accion->get_combo_entrega($this->param);
                break;	
			case "grabar_update_nuevo_recibo":
                header("Content-Type: text/plain");
                $resultado = $this->accion->grabar_update_nuevo_recibo($this->param);
                break;
			case "get_lista_creditos":
                header("Content-Type: text/plain");
                $resultado = $this->accion->get_lista_creditos($this->param);
                break;
			case "set_general_desactivaActiva":
                header("Content-Type: text/plain");
                $resultado = $this->accion->set_general_desactivaActiva($this->param);
                break;
			case "get_calculo_renova":
                header("Content-Type: text/plain");
                $resultado = $this->accion->get_calculo_renova($this->param);
                break;
			case "grabar_update_renueva_cuotas":
                header("Content-Type: text/plain");
                $resultado = $this->accion->grabar_update_renueva_cuotas($this->param);
                break;
            /** *************************************************** */
            ##code xim
        }
        if (is_array($resultado)) {
            return $resultado;
        } else {
            echo $resultado;
        }
    }
}
//fin class
$control = new control();
$control->eventos();
?>