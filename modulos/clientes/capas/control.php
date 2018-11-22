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
            case "get_clientes":
                header("Content-Type: text/plain");
                $resultado = $this->accion->get_clientes($this->param);
                break;
            case "form_nuevo_cliente":
                header("Content-Type: text/plain");
                $resultado = $this->accion->form_nuevo_cliente($this->param);
                break;
			case "get_grid_clientes":
				header("Content-Type: text/plain");
                $resultado = $this->accion->get_grid_clientes($this->param);
                break;
			case "get_combo_estado":
				header("Content-Type: text/plain");
                $resultado = $this->accion->get_combo_estado($this->param);
                break;
			case "get_combo_propiedad":
				header("Content-Type: text/plain");
                $resultado = $this->accion->get_combo_propiedad($this->param);
                break;
			case "grabar_update_cliente":
				header("Content-Type: text/plain");
                $resultado = $this->accion->grabar_update_cliente($this->param);
				break;
			case "get_img":
                header("Content-Type: text/plain");
                $resultado = $this->accion->get_img($this->param);
                break;
			case "get_grid_pais":
                header("Content-Type: text/plain");
                $resultado = $this->accion->get_grid_pais($this->param);
                break;
			case "get_grid_provincias":
                header("Content-Type: text/plain");
                $resultado = $this->accion->get_grid_provincias($this->param);
                break;
			case "general_desactivaActiva":
                header("Content-Type: text/plain");
                $resultado = $this->accion->general_desactivaActiva($this->param);
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