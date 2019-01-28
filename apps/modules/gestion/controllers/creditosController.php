<?php

/**
 * @version 2.0
 */

class creditosController extends AppController {

    private $objDatos;
    private $arrayMenu;

    public function __construct(){
        /**
         * Solo incluir en caso se manejen sessiones
         */
        $this->valida();

        $this->objDatos = new creditosModels();
    }

    public function index($p){        
        $this->view('creditos/form_index.php', $p);
    }

    public function index_keep($p){
        $this->view('creditos/form_keep.php', $p);
    }

    public function setSaveInfoCredito($p){
        $rs = $this->objDatos->SP_CREDITO_SAVE($p);
        $rs = $rs[0];
        $data = array(
            'success' => true,
            'error' => $rs['RESPONSE'],
            'msn' => utf8_encode(trim($rs['MESSAGE_TEXT'])),
            'cod_credito' => trim($rs['COD_CREDITO']),
            'id_dev' => $rs['id_dev']
        );
        header('Content-Type: application/json');
        return $this->response($data);
    }
    public function get_credit_list($p){
        $rs = $this->objDatos->get_credit_list($p);
        //var_export($rs);
        $array = array();
        $TOTAL_ROWS = 0;
        foreach ($rs as $index => $value){
            $value_['cod_credito'] = intval($value['cod_credito']);
            $value_['cod_cli'] = intval($value['cod_cli']);
            $value_['tasa_interes'] = intval($value['tasa_interes']);
            $value_['cod_metodo'] = intval($value['cod_metodo']);
            $value_['nombres'] = utf8_encode(trim($value['nombres']));
            $value_['dni'] = trim($value['dni']);
            $value_['prestamo'] = $value['prestamo'];
            $value_['cuotas'] = intval($value['cuotas']);
            $value_['cod_tipo'] = intval($value['cod_tipo']);
            $value_['valor_cuota'] = $value['valor_cuota'];
            $value_['fecha_calculo'] = utf8_encode(trim($value['fecha_calculo']));
            $value_['total_credito'] = $value['total_credito'];
            $value_['nota'] = utf8_encode(trim($value['nota']));
            $value_['cod_entrega'] = intval($value['cod_entrega']);
            $value_['fecha_creado'] = utf8_encode(trim($value['fecha_creado']));
            $value_['flag'] = utf8_encode(trim($value['flag']));
            $TOTAL_ROWS =intval($value['TOTAL_ROWS']);
            $array[]=$value_;
        }

        $data = array(
            'success' => true,
            'error'=>0,
            'total' => $TOTAL_ROWS,
            'data' => $array
        );
        header('Content-Type: application/json');
        return $this->response($data);
    }
    public function get_credit_record($p){
        $rs = $this->objDatos->get_credit_record($p);
        //var_export($rs);
        $array = array();
        $TOTAL_ROWS = 0;
        foreach ($rs as $index => $value){
            $value_['cod_credito'] = intval($value['cod_credito']);
            $value_['cod_cli'] = intval($value['cod_cli']);
            $value_['tasa_interes'] = intval($value['tasa_interes']);
            $value_['cod_metodo'] = intval($value['cod_metodo']);
            $value_['nombres'] = utf8_encode(trim($value['nombres']));
            $value_['dni'] = trim($value['dni']);
            $value_['fecha'] = trim($value['fecha']);
            $value_['prestamo'] = $value['prestamo'];
            $value_['cuotas'] = intval($value['cuotas']);
            $value_['cod_tipo'] = intval($value['cod_tipo']);
            $value_['valor_cuota'] = $value['valor_cuota'];
            $value_['fecha_calculo'] = utf8_encode(trim($value['fecha_calculo']));
            $value_['total_credito'] = $value['total_credito'];
            $value_['nota'] = utf8_encode(trim($value['nota']));
            $value_['cod_entrega'] = intval($value['cod_entrega']);
            $value_['fecha_creado'] = utf8_encode(trim($value['fecha_creado']));
            $value_['flag'] = utf8_encode(trim($value['flag']));
            $TOTAL_ROWS =1;
            $array[]=$value_;
        }

        $data = array(
            'success' => true,
            'error'=>0,
            'total' => $TOTAL_ROWS,
            'data' => $array
        );
        header('Content-Type: application/json');
        return $this->response($data);
    }
    public function SP_CREDITOS_DETALLE_LIST($p){
        $rs = $this->objDatos->SP_CREDITOS_DETALLE_LIST($p);
        //var_export($rs);
        $array = array();
        foreach ($rs as $index => $value){
            $value_['cod_det_credito'] = intval($value['cod_det_credito']);
            $value_['cod_credito'] = intval($value['cod_credito']);
            $value_['nro_cuota'] = intval($value['nro_cuota']);
            $value_['fecha_cuota'] = trim($value['fecha_cuota']);
            $value_['valor_cuota'] = trim($value['valor_cuota']);
            $value_['interes'] = trim($value['interes']);
            $value_['amortizacion'] = trim($value['amortizacion']);
            $value_['capital_vivo'] = trim($value['capital_vivo']);
            $value_['mora'] = trim($value['mora']);
            $value_['saldo_cuota'] = doubleval($value_['mora']) + doubleval($value['saldo_cuota']);
            $value_['vence'] = trim($value['vence']);
            $value_['estado'] = trim($value['estado']);
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
    public function SP_TIPO_CREDITO($p){
        $rs = $this->objDatos->SP_TIPO_CREDITO($p);
        //var_export($rs);
        $array = array();
        $TOTAL_ROWS = 0;
        foreach ($rs as $index => $value){
            $value_['cod_tipo'] = intval($value['cod_tipo']);
            $value_['nombre'] = utf8_encode(trim($value['nombre']));
            $value_['dias'] = intval($value['dias']);
            $value_['fecha'] = trim($value['fecha']);
            $value_['flag'] = utf8_encode(trim($value['flag']));
            $TOTAL_ROWS =intval($value['TOTAL_ROWS']);
            $array[]=$value_;
        }

        $data = array(
            'success' => true,
            'error'=>0,
            'total' => $TOTAL_ROWS,
            'data' => $array
        );
        header('Content-Type: application/json');
        return $this->response($data);
    }
    public function setSaveCredit($p){
        $rs = $this->objDatos->SP_CREDITOS_SAVE($p);
        $rs = $rs[0];
        $data = array(
            'success' => true,
            'error' => $rs['RESPONSE'],
            'msn' => utf8_encode(trim($rs['MESSAGE_TEXT'])),
            'cod_credito' => trim($rs['COD_CREDITO']),
            'id_dev' => $rs['id_dev']
        );
        header('Content-Type: application/json');
        return $this->response($data);
    }
    public function get_print($p){
        require APPPATH_VIEW . 'creditos/form_pdf.php';
    }
}