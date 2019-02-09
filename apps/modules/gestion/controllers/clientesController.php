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
   public function getDataListClientes($p){
        //session_start();
        //$_SESSION['sis_id'] = $p['sis_id'];

        //$this->objDatos->usr_sis_change_first_sistema($p);
        //$p['vp_mod_id'] = 1;
        //$p['vp_menu_id'] = 0;
        // $this->objServicios = $this->objDatos->usr_sis_servicios($p);

        $this->arrayMenu = $this->objDatos->SP_CLIENTES_LIST($p);
        //var_export($this->arrayMenu);
        $array = array();
        foreach ($this->arrayMenu as $index => $value){
                //$p['id_per'] = intval($value['id_per']);
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


    public function getDataMenu($p){
        session_start();
        $_SESSION['sis_id'] = $p['sis_id'];
        $p['vp_mod_id'] = 1;
        $p['vp_menu_id'] = 0;
        // $this->objServicios = $this->objDatos->usr_sis_servicios($p);

        $this->arrayMenu = $this->objDatos->usr_sis_menus($p);
        //var_export($this->arrayMenu);
        $array = array();
        foreach ($this->arrayMenu as $index => $value){
                $p['vp_mod_id'] = 1;
                $p['vp_menu_id'] = intval($value['id_menu']);
                $value_['id'] =intval($value['id_menu']);
                $value_['nombre'] =utf8_encode(trim($value['nombre']));
                $value_['url'] =trim($value['url']);
                $value_['nivel'] =trim($value['nivel']);
                $value_['icono'] = (trim($value['icono']) == '' || trim($value['icono']) == './') ? 'form.png' : $value['icono'];
                $value_['menu_class'] = (trim($value['menu_class']) == '.') ? '' : trim($value['menu_class']);
                $value_['menu_estado'] = trim($value['menu_estado']);
                $value_['clase_disabled'] = $value['menu_estado']==1?'databox_list_menu':'databox_list_menu_disabled';
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