<?php

/**
 * @version 2.0
 */

class clientesController extends AppController {

    private $objDatos;
    private $arrayMenu;

    public function __construct(){
        /**
         * Solo incluir en caso se manejen sessiones
         */
        $this->valida();

        $this->objDatos = new clientesModels();
    }

    public function index($p){        
        $this->view('clientes/form_index.php', $p);
    }

    public function getSearchClient($p){        
        $this->view('clientes/form_search_client.php', $p);
    }

   public function SP_CLIENTES_LIST($p){
        $rs = $this->objDatos->SP_CLIENTES_LIST($p);
        //var_export($rs);
        $array = array();
        $lote = 0;
        foreach ($rs as $index => $value){
            $value_['cod_cli'] = intval($value['cod_cli']);
            $value_['nombres'] = utf8_encode(trim($value['nombres']));
            $value_['apellidos'] = utf8_encode(trim($value['apellidos']));
            $value_['fecha'] = utf8_encode(trim($value['fecha']));
            $value_['nacimiento'] = utf8_encode(trim($value['nacimiento']));
            $value_['edad'] = trim($value['edad']);
            $value_['dni'] = utf8_encode(trim($value['dni']));
            $value_['domicilio'] = utf8_encode(trim($value['domicilio']));
            $value_['cod_pais'] = trim($value['cod_pais']);
            $value_['cod_pro'] = trim($value['cod_pro']);
            $value_['telefonos'] = trim($value['telefonos']);
            $value_['limite_credito'] = trim($value['limite_credito']);
            $value_['cod_estado'] = trim($value['cod_estado']);
            $value_['cod_garante'] = trim($value['cod_garante']);
            $value_['cod_laboral'] = trim($value['cod_laboral']);
            $value_['cod_prop'] = trim($value['cod_prop']);
            $value_['descripcionp'] = utf8_encode(trim($value['descripcionp']));
            $value_['descripcion'] = utf8_encode(trim($value['descripcion']));
            $value_['img'] = trim($value['img']);
            $value_['fecha_creacion'] = trim($value['fecha_creacion']);
            $value_['flag'] = trim($value['flag']);
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