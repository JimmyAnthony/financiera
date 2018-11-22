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
    public function eventos() {
        switch (trim($this->op)) {
            case "get_recibos":
                header("Content-Type: text/plain");
                $resultado = $this->accion->get_recibos($this->param);
                break;
            case "form_nuevo_recibo":
                header("Content-Type: text/plain");
                $resultado = $this->accion->form_nuevo_recibo($this->param);
                break;
			case "get_cuotas":
                header("Content-Type: text/plain");
                $resultado = $this->accion->get_cuotas($this->param);
                break;
			case "get_clientes":
                header("Content-Type: text/plain");
                $resultado = $this->accion->get_clientes($this->param);
                break;
			case "grabar_update_recibo":
                header("Content-Type: text/plain");
                $resultado = $this->accion->grabar_update_recibo($this->param);
                break;
			case "grid_recibos":
                header("Content-Type: text/plain");
                $resultado = $this->accion->grid_recibos($this->param);
                break;
			case "get_cuotas_cobradas":
                header("Content-Type: text/plain");
                $resultado = $this->accion->get_cuotas_cobradas($this->param);
                break;
			case "grid_cobradores":
                header("Content-Type: text/plain");
                $resultado = $this->accion->grid_cobradores($this->param);
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