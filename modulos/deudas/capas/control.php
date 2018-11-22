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
            case "get_deudas":
                header("Content-Type: text/plain");
                $resultado = $this->accion->get_deudas($this->param);
                break;
            case "form_nuevo_credito":
                header("Content-Type: text/plain");
                $resultado = $this->accion->form_nuevo_credito($this->param);
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