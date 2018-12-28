<?php

/**
 * @version 2.0
 */

class recibosController extends AppController {

    private $objDatos;
    private $arrayMenu;

    public function __construct(){
        /**
         * Solo incluir en caso se manejen sessiones
         */
        $this->valida();

        $this->objDatos = new recibosModels();
    }

    public function index($p){        
        $this->view('recibos/form_index.php', $p);
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


}