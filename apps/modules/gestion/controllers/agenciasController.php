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
        $this->view('asesor/form_index.php', $p);
    }

   public function get_list_client($p){
        $rs = $this->objDatos->get_list_client($p);
        //var_export($rs);
        $array = array();
        $lote = 0;
        foreach ($rs as $index => $value){
            $value_['shi_codigo'] = intval($value['shi_codigo']);
            $value_['shi_nombre'] = utf8_encode(trim($value['shi_nombre']));
            $value_['fec_ingreso'] = substr(trim($value['fec_ingreso']),0,10);
            //substr(trim($value['fec_ingreso']),0,10)
            $value_['shi_estado'] = trim($value['shi_estado']);
            $value_['id_user'] = trim($value['id_user']);
            $value_['fecact'] = utf8_encode(trim($value['fecact']));
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
            $value_['codigo'] = trim($value['codigo']);
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

}