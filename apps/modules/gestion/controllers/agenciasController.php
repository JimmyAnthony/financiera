<?php

/**
 * @version 2.0
 */

class agenciasController extends AppController {

    private $objDatos;
    private $arrayMenu;

    public function __construct(){
        /**
         * Solo incluir en caso se manejen sessiones
         */
        $this->valida();

        $this->objDatos = new agenciasModels();
    }

    public function index($p){        
        $this->view('agencias/form_index.php', $p);
    }

   public function get_list_agencias($p){
        $rs = $this->objDatos->get_list_agencias($p);
        //var_export($rs);
        $array = array();
        $lote = 0;
        foreach ($rs as $index => $value){
            $value_['cod_age'] = intval($value['cod_age']);
            $value_['nombre'] = utf8_encode(trim($value['nombre']));
            $value_['descripcion'] = utf8_encode(trim($value['descripcion']));
            //substr(trim($value['fec_ingreso']),0,10)
            $value_['direccion'] = utf8_encode(trim($value['direccion']));
            $value_['telefonos'] = trim($value['telefonos']);
            $value_['cod_ubi'] = utf8_encode(trim($value['cod_ubi']));
            $value_['x'] = utf8_encode(trim($value['x']));
            $value_['y'] = utf8_encode(trim($value['y']));
            $value_['fecha'] = utf8_encode(trim($value['fecha']));
            $value_['estado'] = utf8_encode(trim($value['estado']));
            $value_['Distrito'] = utf8_encode(trim($value['Distrito']));
            $value_['Provincia'] = utf8_encode(trim($value['Provincia']));
            $value_['Departamento'] = utf8_encode(trim($value['Departamento']));
            $array[]=$value_;
        }

        $data = array(
            'success' => true,
            'error'=>0,
            'total' => count($array),
            'data' => $array
        );
        header('Content-Type: application/json');
        return $this->response($data);
    }

    public function get_list_ubigeo($p){
        $rs = $this->objDatos->SP_UBIGEO_LIST($p);
        //var_export($rs);
        $array = array();
        $lote = 0;
        foreach ($rs as $index => $value){
            $value_['cod_ubi'] = trim($value['cod_ubi']);
            $value_['Distrito'] = utf8_encode(trim($value['Distrito']));
            $value_['Provincia'] = utf8_encode(trim($value['Provincia']));
            $value_['Departamento'] = utf8_encode(trim($value['Departamento']));
            $value_['Poblacion'] = trim($value['Poblacion']);
            $value_['Superficie'] = trim($value['Superficie']);
            $value_['Y'] = trim($value['Y']);
            $value_['X'] = trim($value['X']);
            $array[]=$value_;
        }

        $data = array(
            'success' => true,
            'error'=>0,
            'total' => count($array),
            'data' => $array
        );
        header('Content-Type: application/json');
        return $this->response($data);
    }

    public function get_man_agencias($p){
        $rs = $this->objDatos->get_man_agencias($p);
        $rs = $rs[0];
        $data = array(
            'success' => true,
            'error' => $rs['RESPONSE'],
            'msn' => utf8_encode(trim($rs['MESSAGE_TEXT'])),
            'CODIGO' => trim($rs['CODIGO'])
        );
        header('Content-Type: application/json');
        return $this->response($data);
    }

}