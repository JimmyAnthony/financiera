<?php

/**
 * @version 2.0
 */

class personaController extends AppController {

    private $objDatos;
    private $arrayMenu;

    public function __construct(){
        /**
         * Solo incluir en caso se manejen sessiones
         */
        $this->valida();

        $this->objDatos = new personaModels();
    }

    public function index($p){        
        $this->view('persona/form_index.php', $p);
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
                $value_['domi_propio'] =trim($value['domi_propio']);
                $value_['domi_pagando'] =trim($value['domi_pagando']);
                $value_['domi_alquilado'] =trim($value['domi_alquilado']);
                $value_['domi_familiar'] =trim($value['domi_familiar']);

                $value_['profesion'] =utf8_encode(trim($value['profesion']));
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
    public function getDataMenuView($p){
        //session_start();
        //$_SESSION['sis_id'] = $p['sis_id'];

        //$this->objDatos->usr_sis_change_first_sistema($p);
        //$p['vp_mod_id'] = 1;
        //$p['vp_menu_id'] = 0;
        // $this->objServicios = $this->objDatos->usr_sis_servicios($p);

        $this->arrayMenu = $this->objDatos->SP_ASESORES_LIST($p);
        //var_export($this->arrayMenu);
        $array = array();
        foreach ($this->arrayMenu as $index => $value){
                //$p['id_asesor'] = intval($value['id_asesor']);
                $value_['id_asesor'] = intval($value['id_asesor']);
                $value_['icono'] = 'if_person_3_1376034.png';
                $value_['nombres'] =utf8_encode(trim($value['nombres']));
                $value_['ape_pat'] =utf8_encode(trim($value['ape_pat']));
                $value_['ape_mat'] =utf8_encode(trim($value['ape_mat']));
                $value_['dni'] =trim($value['dni']);
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
    public function getDataListClientes($p){
        session_start();
        $_SESSION['sis_id'] = $p['sis_id'];

        //$this->objDatos->usr_sis_change_first_sistema($p);
        //$p['vp_mod_id'] = 1;
        //$p['vp_menu_id'] = 0;
        // $this->objServicios = $this->objDatos->usr_sis_servicios($p);

        $this->arrayMenu = $this->objDatos->SP_ASESORES_LIST($p);
        //var_export($this->arrayMenu);
        $array = array();
        foreach ($this->arrayMenu as $index => $value){
                //$p['id_asesor'] = intval($value['id_asesor']);
                $value_['id_asesor'] = intval($value['id_asesor']);
                $value_['icono'] = 'batman.png';
                $value_['nombres'] =utf8_encode(trim($value['nombres']));
                $value_['ape_pat'] =utf8_encode(trim($value['ape_pat']));
                $value_['ape_mat'] =utf8_encode(trim($value['ape_mat']));
                $value_['dni'] =trim($value['dni']);
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
}