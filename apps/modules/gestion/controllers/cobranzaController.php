<?php

/**
 * @version 2.0
 */

set_time_limit(0);
ini_set("memory_limit", "-1");
class cobranzaController extends AppController {

    private $objDatos;
    private $arrayMenu;

    public function __construct(){
        /**
         * Solo incluir en caso se manejen sessiones
         */
        $this->valida();

        $this->objDatos = new cobranzaModels();
    }

    public function index($p){        
        $this->view('cobranza/form_index.php', $p);
    }
    public function get_cuotas_print($p){        
        require APPPATH_VIEW . 'creditos/form__cuotas_pdf.php';
    }
    public function get_list_creditos_asesor($p){
        $rs = $this->objDatos->SP_CREDITOS_ASESORES_LIST($p);
        //var_export($rs);
        $array = array();
        $lote = 0;
        foreach ($rs as $index => $value){
            $value_['id_creditos'] = intval($value['id_creditos']);
            $value_['nro_solicitud'] = trim($value['nro_solicitud']);
            $value_['id_age'] = trim($value['id_age']);
            //substr(trim($value['fec_ingreso']),0,10)
            $value_['id_per'] = trim($value['id_per']);
            $value_['nombre'] =utf8_encode(trim($value['nombres'])).', '.utf8_encode(trim($value['ape_pat'])).' '.utf8_encode(trim($value['ape_mat']));
            $value_['id_garante'] = trim($value['id_garante']);
            $value_['id_asesor'] =trim($value['id_asesor']);
            $value_['moneda'] = trim($value['moneda']);
            $value_['monto_solicitado'] = trim($value['monto_solicitado']);
            $value_['tipo_cliente'] = trim($value['tipo_cliente']);
            $value_['excepcion'] = trim($value['excepcion']);
            $value_['nro_cuotas'] = trim($value['nro_cuotas']);
            $value_['interes'] = trim($value['interes']);
            $value_['mora'] = trim($value['mora']);
            $value_['fecha_1ra_letra'] = trim($value['fecha_1ra_letra']);
            $value_['monto_aprobado'] = trim($value['monto_aprobado']);
            $value_['tot_credito'] = trim($value['tot_credito']);
            $value_['tot_acumulado'] = trim($value['tot_acumulado']);
            $value_['tot_ganancia'] = trim($value['tot_ganancia']);
            $value_['tot_pagado'] = trim($value['tot_pagado']);
            $value_['tot_interes'] = trim($value['tot_interes']);
            $value_['tot_mora'] = trim($value['tot_mora']);
            $value_['tot_neto'] = trim($value['tot_neto']);
            $value_['tot_saldo'] = trim($value['tot_saldo']);
            $value_['id_motivo'] = trim($value['id_motivo']);
            $value_['estado'] = trim($value['estado']);
            $value_['fecha_sol'] = trim($value['fecha_sol']);
            $value_['nota'] = utf8_encode(trim($value['nota']));
            $value_['fecha_mod'] = trim($value['fecha_mod']);
            $value_['enviado'] = trim($value['enviado']);
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
    
    public function getCreditoRecord($p){
        $rs = $this->objDatos->SP_CREDITOS_RECORD($p);
        //var_export($rs);
        $array = array();
        $lote = 0;
        foreach ($rs as $index => $value){
            $value_['id_creditos'] = intval($value['id_creditos']);
            $value_['nro_solicitud'] = trim($value['nro_solicitud']);
            $value_['id_age'] = trim($value['id_age']);
            //substr(trim($value['fec_ingreso']),0,10)
            $value_['id_per'] = trim($value['id_per']);
            $value_['nombre'] =utf8_encode(trim($value['nombres'])).', '.utf8_encode(trim($value['ape_pat'])).' '.utf8_encode(trim($value['ape_mat']));
            $value_['id_garante'] = trim($value['id_garante']);
            $value_['id_asesor'] =trim($value['id_asesor']);
            $value_['moneda'] = trim($value['moneda']);
            $value_['monto_solicitado'] = trim($value['monto_solicitado']);
            $value_['tipo_cliente'] = trim($value['tipo_cliente']);
            $value_['excepcion'] = trim($value['excepcion']);
            $value_['nro_cuotas'] = trim($value['nro_cuotas']);
            $value_['interes'] = trim($value['interes']);
            $value_['mora'] = trim($value['mora']);
            $value_['fecha_1ra_letra'] = trim($value['fecha_1ra_letra']);
            $value_['monto_aprobado'] = trim($value['monto_aprobado']);
            $value_['tot_credito'] = trim($value['tot_credito']);
            $value_['tot_acumulado'] = trim($value['tot_acumulado']);
            $value_['tot_ganancia'] = trim($value['tot_ganancia']);
            $value_['tot_pagado'] = trim($value['tot_pagado']); 
            $value_['tot_interes'] = trim($value['tot_interes']);
            $value_['tot_mora'] = trim($value['tot_mora']);
            $value_['tot_neto'] = trim($value['tot_neto']);
            $value_['tot_saldo'] = trim($value['tot_saldo']);
            $value_['id_motivo'] = trim($value['id_motivo']);
            $value_['estado'] = trim($value['estado']);
            $value_['fecha_sol'] = trim($value['fecha_sol']);
            $value_['nota'] = utf8_encode(trim($value['nota']));
            $value_['fecha_mod'] = trim($value['fecha_mod']);
            $value_['enviado'] = trim($value['enviado']);
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
    public function get_list_creditos_detalle($p){
        $rs = $this->objDatos->SP_CREDITOS_DETALLE_LIST($p);
        //var_export($rs);
        $array = array();
        $lote = 0;
        foreach ($rs as $index => $value){
            $value_['id_det_credito'] = intval($value['id_det_credito']);
            $value_['id_credito'] = intval($value['id_credito']);
            $value_['nro_cuota'] = trim($value['nro_cuota']);
            $value_['fecha_cuota'] = trim($value['fecha_cuota']);
            //substr(trim($value['fec_ingreso']),0,10)
            $value_['DIA'] = trim($value['DIA']);
            $value_['MES'] = trim($value['MES']);
            $value_['ANO'] =trim($value['ANO']);
            $value_['valor_cuota'] = trim($value['valor_cuota']);
            $value_['pagado'] = trim($value['pagado']);
            $value_['fecha_pago'] = trim($value['fecha_pago']);
            $value_['PDIA'] = trim($value['PDIA']);
            $value_['PMES'] = trim($value['PMES']);
            $value_['PANO'] = trim($value['PANO']);
            $value_['mora'] = trim($value['mora']);
            $value_['dias'] = trim($value['dias']);
            $value_['saldo_cuota'] = trim($value['saldo_cuota']);
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
    public function get_list_asesores($p){
        $rs = $this->objDatos->get_list_asesores($p);
        //var_export($rs);
        $array = array();
        $lote = 0;
        foreach ($rs as $index => $value){
            $value_['id_asesor'] = intval($value['id_asesor']);
            $value_['id_per'] = intval($value['id_per']);
            $value_['id_age'] = intval($value['id_age']);
            $value_['icono'] = 'if_person_3_1376034.png';
            $value_['nombres'] =utf8_encode(trim($value['nombres']));
            $value_['ape_pat'] =utf8_encode(trim($value['ape_pat']));
            $value_['ape_mat'] =utf8_encode(trim($value['ape_mat']));

            $value_['nombre'] =utf8_encode(trim($value['nombres'])).', '.utf8_encode(trim($value['ape_pat'])).' '.utf8_encode(trim($value['ape_mat']));

            $value_['doc_dni'] =trim($value['doc_dni']);
            $value_['id_tel'] = intval($value['id_tel']);
            $value_['numero'] =trim($value['numero']);

            $value_['id_dir'] =trim($value['id_dir']);
            $value_['dir_direccion'] =utf8_encode(trim($value['dir_direccion']));
            $value_['dir_numero'] =utf8_encode(trim($value['dir_numero']));
            $value_['dir_mz'] =utf8_encode(trim($value['dir_mz']));
            $value_['dir_lt'] =utf8_encode(trim($value['dir_lt']));
            $value_['dir_dpto'] =utf8_encode(trim($value['dir_dpto']));
            $value_['dir_interior'] =utf8_encode(trim($value['dir_interior']));
            $value_['dir_urb'] =utf8_encode(trim($value['dir_urb']));
            $value_['dir_referencia'] =utf8_encode(trim($value['dir_referencia']));
            $value_['fecha'] =trim($value['fecha']);
            $value_['cod_ubi'] =utf8_encode(trim($value['cod_ubi']));
            $value_['clase'] = $value['flag']=='A'?'databox_list_menu':'databox_list_menu_disabled';
            $value_['solicitudes'] =trim($value['solicitudes']);
            $value_['sol_monto'] =trim($value['sol_monto']);
            $value_['flag'] =trim($value['flag']);
            $value_['tab'] =trim($value['tab']);
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
    public function get_list_motivos($p){
        $rs = $this->objDatos->get_list_motivos($p);
        //var_export($rs);
        $array = array();
        $lote = 0;
        foreach ($rs as $index => $value){
            $value_['id_mot'] = intval($value['id_mot']);
            $value_['nombre'] = utf8_encode(trim($value['nombre']));
            $value_['fecha'] = trim($value['fecha']);
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
    public function get_list_telefonos($p){
        $rs = $this->objDatos->SP_TELEFONOS_LIST($p);
        //var_export($rs);
        $array = array();
        $lote = 0;
        foreach ($rs as $index => $value){
            $value_['id_per'] = intval($value['id_per']);
            $value_['id_tel'] = intval($value['id_tel']);
            $value_['numero'] = trim($value['numero']);
            $value_['tipo'] = trim($value['tipo']);
            $value_['tnombre'] = trim($value['tnombre']);
            $value_['operador'] = trim($value['operador']);
            $value_['toperador'] = trim($value['toperador']);
            $value_['fecha'] = trim($value['fecha']);
            $value_['flag'] = trim($value['flag']);
            $value_['icono'] = $value['flag']=='A'?'call_phone_mobile.png':'call_phone_mobile_Red.png';
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
    public function setSaveCuota($p){
        $rs = $this->objDatos->SP_CREDITOS_COBROS($p);
        $rs = $rs[0];
        $data = array(
            'success' => true,
            'error' => $rs['RESPONSE'],
            'msn' => utf8_encode(trim($rs['MESSAGE_TEXT'])),
            'CODIGO' => trim($rs['CODIGO']),
            'ID_PER' => trim($rs['ID_PER'])
        );
        header('Content-Type: application/json');
        return $this->response($data);
    }
    public function setSavePersona($p){
        $rs = $this->objDatos->SP_CREDITO_PERSONA($p);
        $rs = $rs[0];
        $data = array(
            'success' => true,
            'error' => $rs['RESPONSE'],
            'msn' => utf8_encode(trim($rs['MESSAGE_TEXT'])),
            'CODIGO' => trim($rs['CODIGO']),
            'ID_PER' => trim($rs['ID_PER'])
        );
        header('Content-Type: application/json');
        return $this->response($data);
    }
    public function setSavePhone($p){
        $rs = $this->objDatos->SP_TELEFONO_MANT($p);
        $rs = $rs[0];
        $data = array(
            'success' => true,
            'error' => $rs['RESPONSE'],
            'msn' => utf8_encode(trim($rs['MESSAGE_TEXT'])),
            'CODIGO' => trim($rs['CODIGO']),
            'ID_PER' => trim($rs['ID_PER'])
        );
        header('Content-Type: application/json');
        return $this->response($data);
    }
    public function setSaveDireccion($p){
        $rs = $this->objDatos->SP_CREDITO_DIREC($p);
        $rs = $rs[0];
        $data = array(
            'success' => true,
            'error' => $rs['RESPONSE'],
            'msn' => utf8_encode(trim($rs['MESSAGE_TEXT'])),
            'CODIGO' => trim($rs['CODIGO']),
            'ID_PER' => trim($rs['ID_PER'])
        );
        header('Content-Type: application/json');
        return $this->response($data);
    }

    public function getListPersona($p){
        
        $this->array = $this->objDatos->SP_PERSONA_LIST($p);
        //var_export($this->arrayMenu);
        $array = array();
        foreach ($this->array as $index => $value){
                //$p['id_asesor'] = intval($value['id_asesor']);
                $value_['id_per'] = intval($value['id_per']);
                $value_['ape_pat'] =utf8_encode(trim($value['ape_pat']));
                $value_['ape_mat'] =utf8_encode(trim($value['ape_mat']));
                $value_['nombres'] =utf8_encode(trim($value['nombres']));
                $value_['sexo'] =trim($value['sexo']);
                $value_['doc_dni'] =trim($value['doc_dni']);

                $value_['doc_dni'] =trim($value['doc_dni']);
                $value_['doc_ce'] =trim($value['doc_ce']);
                $value_['doc_cip'] =trim($value['doc_cip']);
                $value_['doc_ruc'] =trim($value['doc_ruc']);
                $value_['doc_cm'] =trim($value['doc_cm']);
                $value_['estado_civil'] =trim($value['estado_civil']);
                $value_['fecha_nac'] =trim($value['fecha_nac']);
                $value_['id_tel'] =intval($value['id_tel']);

                $value_['domicilio'] =trim($value['domicilio']);
                $value_['estudios'] =trim($value['estudios']);
                $value_['profesion'] =utf8_encode(trim($value['profesion']));
                $value_['laboral'] =trim($value['laboral']);
                $value_['cargo'] =utf8_encode(trim($value['cargo']));
                $value_['id_empresa'] =trim($value['id_empresa']);
                $value_['fecha_ingreso'] =trim($value['fecha_ingreso']);

                $value_['id_dir'] = intval($value['id_dir']);

                $value_['img'] =trim($value['img']);
                $value_['fecha_creacion'] =trim($value['fecha_creacion']);
                $value_['flag'] =trim($value['flag']);
                $value_['id_user'] =trim($value['id_user']);
                //$value_['permisos'] = $this->objDatos->usr_sis_servicios($p);
                $array[]=$value_;
        }
        $data = array(
            'success' => true,
            'total' => count($array),
            'data' => $array
        );
        header('Content-Type: application/json');
        return $this->response($data);
    }

    public function getDataListPersona($p){

        $this->arrayMenu = $this->objDatos->SP_PERSONA_LIST($p);
        //var_export($this->arrayMenu);
        $array = array();
        foreach ($this->arrayMenu as $index => $value){
                //$p['id_per'] = intval($value['id_per']);
                $value_['id_cli'] = intval($value['id_per']);
                $value_['id_per'] = intval($value['id_per']);
                $value_['icono'] = 'default_user.png';
                $value_['nombres'] =utf8_encode(trim($value['nombres']));
                $value_['ape_pat'] =utf8_encode(trim($value['ape_pat']));
                $value_['ape_mat'] =utf8_encode(trim($value['ape_mat']));
                $value_['dni'] =trim($value['doc_dni']);
                $value_['numero'] =trim($value['numero']);

                $value_['id_dir'] =trim($value['id_dir']);
                $value_['dir_direccion'] =utf8_encode(trim($value['dir_direccion']));
                $value_['dir_numero'] =utf8_encode(trim($value['dir_numero']));
                $value_['dir_mz'] =utf8_encode(trim($value['dir_mz']));
                $value_['dir_lt'] =utf8_encode(trim($value['dir_lt']));
                $value_['dir_dpto'] =utf8_encode(trim($value['dir_dpto']));
                $value_['dir_interior'] =utf8_encode(trim($value['dir_interior']));
                $value_['dir_urb'] =utf8_encode(trim($value['dir_urb']));
                $value_['dir_referencia'] =utf8_encode(trim($value['dir_referencia']));
                $value_['fecha'] =trim($value['fecha']);
                $value_['cod_ubi'] =utf8_encode(trim($value['cod_ubi']));
                $value_['clase'] = $value['flag']=='A'?'databox_list_menu':'databox_list_menu_disabled';
                $value_['solicitudes'] =trim($value['solicitudes']);
                $value_['sol_monto'] =trim($value['sol_monto']);
                $value_['flag'] =trim($value['flag']);
                $value_['tab'] =trim($value['tab']);
                //$value_['permisos'] = $this->objDatos->usr_sis_servicios($p);
                $array[]=$value_;
        }
        $data = array(
            'success' => true,
            'total' => count($array),
            'data' => $array
        );
        header('Content-Type: application/json');
        return $this->response($data);
    }

    public function getListDirecciones($p){
        
        $this->array = $this->objDatos->SP_DIRECCIONES_LIST($p);
        //var_export($this->arrayMenu);
        $array = array();
        foreach ($this->array as $index => $value){
                //$p['id_asesor'] = intval($value['id_asesor']);
                $value_['id_dir'] = intval($value['id_dir']);
                
                $value_['icono'] = $value['flag']=='A'?'home_delivery.png':'map-marker-24.png';
                $value_['dir_direccion'] =utf8_encode(trim($value['dir_direccion']));
                $value_['dir_numero'] =utf8_encode(trim($value['dir_numero']));
                $value_['dir_mz'] =utf8_encode(trim($value['dir_mz']));
                $value_['dir_lt'] =trim($value['dir_lt']);
                $value_['dir_dpto'] =trim($value['dir_dpto']);

                $value_['dir_interior'] =trim($value['dir_interior']);
                $value_['dir_urb'] =trim($value['dir_urb']);
                $value_['dir_referencia'] =trim($value['dir_referencia']);
                $value_['cod_ubi_pro'] =trim($value['cod_ubi_pro']);
                $value_['cod_ubi_dep'] =trim($value['cod_ubi_dep']);
                $value_['cod_ubi'] =trim($value['cod_ubi']);
                $value_['flag'] =trim($value['flag']);
                //$value_['permisos'] = $this->objDatos->usr_sis_servicios($p);
                $array[]=$value_;
        }
        $data = array(
            'success' => true,
            'total' => count($array),
            'data' => $array
        );
        header('Content-Type: application/json');
        return $this->response($data);
    }
    public function getListAsesores($p){
        //session_start();
        //$_SESSION['sis_id'] = $p['sis_id'];

        //$this->objDatos->usr_sis_change_first_sistema($p);
        //$p['vp_mod_id'] = 1;
        //$p['vp_menu_id'] = 0;
        // $this->objServicios = $this->objDatos->usr_sis_servicios($p);

        $this->arrayMenu = $this->objDatos->SP_ASESORES_COBROS_LIST($p);
        //var_export($this->arrayMenu);
        $array = array();
        foreach ($this->arrayMenu as $index => $value){
                //$p['id_asesor'] = intval($value['id_asesor']);
                $value_['id_age'] =intval($value['id_age']);
                $value_['fecha'] =trim($value['fecha']);
                $value_['id_asesor'] = intval($value['id_asesor']);
                $value_['id_creditos'] = intval($value['id_creditos']);
                $value_['icono'] = 'if_person_3_1376034.png';
                $value_['nombres'] =utf8_encode(trim($value['nombres']));
                $value_['ape_pat'] =utf8_encode(trim($value['ape_pat']));
                $value_['ape_mat'] =utf8_encode(trim($value['ape_mat']));
                $value_['nombre'] =utf8_encode(trim($value['nombres'])).','.utf8_encode(trim($value['ape_pat'])).' '.utf8_encode(trim($value['ape_mat']));
                $value_['dni'] =trim($value['dni']);
                $value_['monto_aprobado'] =trim($value['monto_aprobado']);
                $value_['solicitudes'] =trim($value['solicitudes']);
                $value_['sol_monto'] =trim($value['sol_monto']);

                $value_['tot_cuotas'] =trim($value['tot_cuotas']);
                $value_['valor_cuota'] =trim($value['valor_cuota']);
                $value_['mora'] =trim($value['mora']);
                $value_['total'] =trim($value['total']);
                $value_['pagado'] =trim($value['pagado']);
                $value_['saldo_cuota'] =trim($value['saldo_cuota']);
                $value_['efectivo'] =trim($value['efectivo']);
                $array[]=$value_;
        }
        $data = array(
            'success' => true,
            'total' => count($array),
            'data' => $array
        );
        header('Content-Type: application/json');
        return $this->response($data);
    }
    public function getCreditosGestionDiaria($p){
        $this->arrayMenu = $this->objDatos->SP_CREDITOS_GESTION_DIARIO($p);
        //var_export($this->arrayMenu);
        $array = array();
        foreach ($this->arrayMenu as $index => $value){
                //$p['id_asesor'] = intval($value['id_asesor']);
                $value_['id_age'] =intval($value['id_age']);
                $value_['fecha'] =trim($value['fecha']);
                $value_['id_asesor'] = intval($value['id_asesor']);
                $value_['id_creditos'] = intval($value['id_creditos']);
                $value_['icono'] = 'if_person_3_1376034.png';
                $value_['nombres'] =utf8_encode(trim($value['nombres']));
                $value_['ape_pat'] =utf8_encode(trim($value['ape_pat']));
                $value_['ape_mat'] =utf8_encode(trim($value['ape_mat']));
                $value_['nombre'] =utf8_encode(trim($value['nombres'])).','.utf8_encode(trim($value['ape_pat'])).' '.utf8_encode(trim($value['ape_mat']));
                $value_['dni'] =trim($value['dni']);
                
                $value_['solicitudes'] =trim($value['solicitudes']);
                $value_['sol_monto'] =trim($value['sol_monto']);

                $value_['tot_cuotas'] =trim($value['tot_cuotas']);
                $value_['valor_cuota'] =trim($value['valor_cuota']);
                $value_['mora'] =trim($value['mora']);
                $value_['total'] =trim($value['total']);
                $value_['tot_cuotas_cobradas'] =trim($value['tot_cuotas_cobradas']);
                $value_['pagado'] =trim($value['pagado']);
                $value_['saldo_cuota'] =trim($value['saldo_cuota']);
                $value_['efectivo'] =trim($value['efectivo']);
                $array[]=$value_;
        }
        $data = array(
            'success' => true,
            'total' => count($array),
            'data' => $array
        );
        header('Content-Type: application/json');
        return $this->response($data);
    }
    public function getDataListClientes($p){
        session_start();
        $_SESSION['sis_id'] = $p['sis_id'];

        //$this->objDatos->usr_sis_change_first_sistema($p);
        //$p['vp_mod_id'] = 1;
        //$p['vp_menu_id'] = 0;
        // $this->objServicios = $this->objDatos->usr_sis_servicios($p);

        $this->arrayMenu = $this->objDatos->SP_ASESORES_CLIENTE_LIST($p);
        //var_export($this->arrayMenu);
        $array = array();
        foreach ($this->arrayMenu as $index => $value){
                //$p['id_asesor'] = intval($value['id_asesor']);
                $value_['id_asesor'] = intval($value['id_asesor']);
                $value_['id_per'] = intval($value['id_per']);
                $value_['icono'] = 'default_user.png';
                $value_['nombres'] =utf8_encode(trim($value['nombres']));
                $value_['ape_pat'] =utf8_encode(trim($value['ape_pat']));
                $value_['ape_mat'] =utf8_encode(trim($value['ape_mat']));
                $value_['doc_dni'] =trim($value['doc_dni']);
                $value_['cantidad'] =trim($value['cantidad']);
                $value_['monto'] =trim($value['monto']);
                //$value_['permisos'] = $this->objDatos->usr_sis_servicios($p);
                $array[]=$value_;
        }
        $data = array(
            'success' => true,
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
            $value_['cod_ubi_pro'] = trim($value['cod_ubi_pro']);
            $value_['cod_ubi_dep'] = trim($value['cod_ubi_dep']);
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
    public function get_list_documentos($p){
        $rs = $this->objDatos->get_list_documentos($p);
        //var_export($rs);
        $array = array();
        $lote = 0;
        foreach ($rs as $index => $value){
            $value_['id_doc'] = intval($value['id_doc']);
            $value_['id_per'] = intval($value['id_per']);
            $value_['time'] = utf8_encode(trim($value['nombre']));
            $value_['img_path'] = '/persona/'.$value['id_per'].'/DOCUMENTOS/'.trim($value['img']);
            $value_['img_thumbs'] = '/persona/'.$value['id_per'].'/DOCUMENTOS/tumblr/'.trim($value['img']);
            $value_['fecha'] = trim($value['fecha']);
            $value_['flag'] = trim($value['flag']);
            $value_['id_user'] = intval($value['id_user']);
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
    public function setFoto($p){
        ini_set("memory_limit", "-1");
        set_time_limit(0);
        sleep(1);
        $array = array();
        
        $nombre_archivo = $_FILES['persona-filex']['name'];
        $tipo_archivo = $_FILES['persona-filex']['type'];
        $tamano_archivo = $_FILES['persona-filex']['size'];

        $path_parts = pathinfo($nombre_archivo);
        $ext=$path_parts['extension'];

        $setTypeFile = array(
            'jpg' => 'jpg',
            'JPEG' => 'JPEG',
            'png' => 'png',
            'PNG' => 'PNG'
        );
        //$tipo = array_search($tipo_archivo, $setTypeFile);

        if (in_array($ext, $setTypeFile)) {

            if (!file_exists(PATH.'public_html/persona/'.$p['vp_sol_id_per'].'/PHOTO')) {
                mkdir(PATH.'public_html/persona/'.$p['vp_sol_id_per'].'/PHOTO', 0777, true);
            }


            $p['vp_name']='per-'.$p['vp_sol_id_per'].'.'.$ext;

            $dir = PATH.'public_html/persona/'.$p['vp_sol_id_per'].'/PHOTO/per-'.$p['vp_sol_id_per'].'.'.$ext;
            $file = $p['vp_name'];
            if (@move_uploaded_file($_FILES['persona-filex']['tmp_name'], $dir)) {

                $rs = $this->objDatos->SP_PERSONA_IMG($p);
                $rs = $rs[0];

                //var_export($respuesta);
                $data = array(
                    'success' => true,
                    'RESPONSE' => $rs['RESPONSE'],
                    'MESSAGE_TEXT' => $rs['MESSAGE_TEXT'],
                    'FILE' => $file
                );
            } else {
                $data = array(
                    'success' => true,
                    'RESPONSE' => 'ER',
                    'MESSAGE_TEXT' => 'A ocurrido un error con la red.<br>No se logro cargar el archivo',
                    'FILE' => $file
                );
            }
        } else {
            $data = array(
                'success' => true,
                'RESPONSE' => 'ER',
                'MESSAGE_TEXT' => 'Extensión del archivo no valido<br>Extensiones admitidas: "JPG o PNG" ',
                'FILE' => $file
            );
        }
        
        return $this->response($data);
    }
    public function setDocumento($p){
        ini_set("memory_limit", "-1");
        set_time_limit(0);
        sleep(1);
        $array = array();
        
        $nombre_archivo = $_FILES['persona-filex-doc']['name'];
        $tipo_archivo = $_FILES['persona-filex-doc']['type'];
        $tamano_archivo = $_FILES['persona-filex-doc']['size'];

        $path_parts = pathinfo($nombre_archivo);
        $ext=$path_parts['extension'];

        $setTypeFile = array(
            'jpg' => 'jpg',
            'JPEG' => 'JPEG',
            'png' => 'png',
            'PNG' => 'PNG'
        );

        //$tipo = array_search($tipo_archivo, $setTypeFile);

        if (in_array($ext, $setTypeFile)) {

            if (!file_exists(PATH.'public_html/persona/'.$p['vp_sol_id_per'].'/DOCUMENTOS')) {
                mkdir(PATH.'public_html/persona/'.$p['vp_sol_id_per'].'/DOCUMENTOS', 0777, true);
            }

            $p['vp_op']='I';
            $rs = $this->objDatos->SP_PERSONA_DOCUMENTOS($p);
            $rs = $rs[0];

            if($rs['RESPONSE']=='OK'){
                $p['vp_id_doc']=$rs['CODIGO'];
                $file='doc-'.$rs['CODIGO'].'.'.$ext;
                $p['vp_img'] =$file;
                $dir = PATH.'public_html/persona/'.$p['vp_sol_id_per'].'/DOCUMENTOS/'.$file;
                
                
                if (@move_uploaded_file($_FILES['persona-filex-doc']['tmp_name'], $dir)){
                    $this->setResizeImage($p['vp_sol_id_per'],trim($file));
                    $p['vp_op']='U';
                    $rs = $this->objDatos->SP_PERSONA_DOCUMENTOS($p);
                    $rs = $rs[0];
                    //var_export($respuesta);
                    if($rs['RESPONSE']=='OK'){
                        $data = array(
                            'success' => true,
                            'RESPONSE' => $rs['RESPONSE'],
                            'MESSAGE_TEXT' => $rs['MESSAGE_TEXT'],
                            'FILE' => $file
                        );
                    }else{
                        
                        $data = array(
                            'success' => true,
                            'RESPONSE' => $rs['RESPONSE'],
                            'MESSAGE_TEXT' => $rs['MESSAGE_TEXT'],
                            'FILE' => $file
                        );
                        unlink($dir);
                        $p['vp_op']='D';
                        $rs = $this->objDatos->SP_PERSONA_DOCUMENTOS($p);
                    }
                } else {
                    $data = array(
                        'success' => true,
                        'RESPONSE' => 'ER',
                        'MESSAGE_TEXT' => 'A ocurrido un error con la red.<br>No se logro cargar el archivo',
                        'FILE' => $file
                    );
                    unlink($dir);
                    $p['vp_op']='D';
                    $rs = $this->objDatos->SP_PERSONA_DOCUMENTOS($p);
                }
            
            }else{
                $data = array(
                    'success' => true,
                    'RESPONSE' => $rs['RESPONSE'],
                    'MESSAGE_TEXT' => $rs['MESSAGE_TEXT'],
                    'FILE' => $file
                );
            }

        }else {
            $data = array(
                'success' => true,
                'RESPONSE' => 'ER',
                'MESSAGE_TEXT' => 'Extensión del archivo no valido<br>Extensiones admitidas: "JPG o PNG" ',
                'FILE' => $file
            );
        }
        
        return $this->response($data);
    }
    public function setResizeImage($id_per,$nameimg){
        $path_parts = pathinfo(PATH.'public_html/persona/'.$id_per.'/DOCUMENTOS/'.$nameimg);
        $ext=$path_parts['extension'];
        $w=60;
        $y=60;
        switch($ext){
            #case 'bmp': $sourceImage = $img = $this->resize_imagejpg(PATH.'public_html/tmp/'.$nameimg, 50, 70); break;
            case 'gif': 
                $img = $this->resize_imagegif(PATH.'public_html/persona/'.$id_per.'/DOCUMENTOS/'.$nameimg, $w, $y); 
            break;
            case 'jpg': 
                $img = $this->resize_imagejpg(PATH.'public_html/persona/'.$id_per.'/DOCUMENTOS/'.$nameimg, $w, $y); 
            break;
            case 'png': 
                $img = $this->resize_imagepng(PATH.'public_html/persona/'.$id_per.'/DOCUMENTOS/'.$nameimg, $w, $y); 
            break;
            case 'tiff': 
                $img = $this->resize_imagetiff(PATH.'public_html/persona/'.$id_per.'/DOCUMENTOS/'.$nameimg, $w, $y); 
            break;
            default : 
                $img = $this->resize_imagejpg(PATH.'public_html/persona/'.$id_per.'/DOCUMENTOS/'.$nameimg, $w, $y); 
            break;
        }
        if (!file_exists(PATH.'public_html/persona/'.$id_per.'/DOCUMENTOS/tumblr/')) {
            mkdir(PATH.'public_html/persona/'.$id_per.'/DOCUMENTOS/tumblr/', 0777, true);
        }
        imagejpeg($img, PATH.'public_html/persona/'.$id_per.'/DOCUMENTOS/tumblr/'.$nameimg);
    }
    // for jpg 
    public function resize_imagejpg($file, $w, $h) {
       list($width, $height) = getimagesize($file);
       $src = imagecreatefromjpeg($file);
       $dst = imagecreatetruecolor($w, $h);
       imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
       return $dst;
    }

     // for png
    public function resize_imagepng($file, $w, $h) {
       list($width, $height) = getimagesize($file);
       $src = imagecreatefrompng($file);
       $dst = imagecreatetruecolor($w, $h);
       imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
       return $dst;
    }

    // for gif
    public function resize_imagegif($file, $w, $h) {
       list($width, $height) = getimagesize($file);
       $src = imagecreatefromgif($file);
       $dst = imagecreatetruecolor($w, $h);
       imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
       return $dst;
    }
    // for tiff
    public function resize_imagetiff($file, $w, $h) {
       list($width, $height) = getimagesize($file);
       $src = imagecreatefromgif($file);
       $dst = imagecreatetruecolor($w, $h);
       imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
       return $dst;
    }
}