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
            case "datos_cobradores":
                header("Content-Type: text/plain");
                $resultado = $this->accion->datos_cobradores($this->param);
                break;
			 case "get_grid_cobradores":
                header("Content-Type: text/plain");
                $resultado = $this->accion->get_grid_cobradores($this->param);
                break;
			case "set_cobrador":
                header("Content-Type: text/plain");
                $resultado = $this->accion->set_cobrador($this->param);
                break;
			case "set_activa_desactiva_cobra":
                header("Content-Type: text/plain");
                $resultado = $this->accion->set_activa_desactiva_cobra($this->param);
                break;
            /*************************************************** */
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