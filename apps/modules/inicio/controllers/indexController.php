<?php

/**
 * Xim php (https://twitter.com/JimAntho)
 * @link    http://zucuba.com/
 * @author  Jimmy Anthony B.S.
 * @version 1.0
 */

class indexController extends AppController {

    private $objDatos;
    private $objServicios;
    private $arrayMenu;

    public function __construct(){
        /**
         * Solo incluir en caso se manejen sessiones
         */
        $this->valida();

        $this->objDatos = new indexModels();
    }

    public function index($p){
        /**
         * Cargando datos de archivo de configuracion
         */
        
        $this->view('index/form_index.php', $p);
    }

    /**
     * Obtiene la lista de sistemas
     */
    public function get_sistemas($p){
        $rs = $this->objDatos->usr_sis_sistemas($p);
        $array = array();
        if (count($rs) > 0){
            foreach($rs as $index => $value){
                $value['nombre'] = ucfirst(strtolower($value['nombre']));
                $array[] = $value;
            }
        }
        $data = array(
            'success' => true,
            'total' => count($array),
            'data' => $array
        );
        return json_encode($data);
    }

    /**
     * Genera dinámicamente el Menu de opciones.
     */
    public function getMenu($p){
        session_start();
        $_SESSION['sis_id'] = $p['sis_id'];

        /**
         * Estableciendo el último sistema por default
         */
        $this->objDatos->usr_sis_change_first_sistema($p);
        $p['vp_mod_id'] = 0;
        $p['vp_menu_id'] = 0;
        $this->objServicios = $this->objDatos->usr_sis_servicios($p);

        $this->arrayMenu = $this->objDatos->usr_sis_menus($p);
        $objMenu = new Menu($this->arrayMenu, $this->objServicios);
        $array = array(
            'toolbar' => trim($objMenu->getMenu())
        );
        header('Content-Type: application/json');
        return json_encode($array);
    }

    public function getDataMenuView($p){
        session_start();
        $_SESSION['sis_id'] = $p['sis_id'];

        $this->objDatos->usr_sis_change_first_sistema($p);
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
                $value_['id_menu'] =intval($value['id_menu']);
                $value_['nombre'] =utf8_encode(trim($value['nombre']));
                $value_['url'] =trim($value['url']);
                $value_['nivel'] =trim($value['nivel']);
                $value_['icono'] = (trim($value['icono']) == '' || trim($value['icono']) == './') ? 'form.png' : $value['icono'];
                $value_['menu_class'] = (trim($value['menu_class']) == '.') ? '' : trim($value['menu_class']);
                $value_['menu_estado'] = trim($value['menu_estado']);
                $value_['clase_disabled'] = $value['menu_estado']==1?'databox_list_menu':'databox_list_menu_disabled';
                $value_['permisos'] = $this->objDatos->usr_sis_servicios($p);
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

    public function getDataMenuNew($p){
        session_start();
        $_SESSION['sis_id'] = $p['sis_id'];

        //$this->objDatos->usr_sis_change_first_sistema($p);
        $p['vp_mod_id'] = 0;
        $p['vp_menu_id'] = 0;
        // $this->objServicios = $this->objDatos->usr_sis_servicios($p);

        $this->arrayMenu = $this->objDatos->usr_sis_menus($p);
        $array = $this->generateTree();
        $data = array(
            'success' => true,
            'total' => count($array),
            'data' => $array
        );
        return $this->response($array);
    }

    public function getDataMenu($p){
        session_start();
        $_SESSION['sis_id'] = $p['sis_id'];

        //$this->objDatos->usr_sis_change_first_sistema($p);
        $p['vp_mod_id'] = 0;
        $p['vp_menu_id'] = 0;
        $this->objServicios = $this->objDatos->usr_sis_servicios($p);

        $this->arrayMenu = $this->objDatos->usr_sis_menus($p);
        $array = $this->getMenuRecursivo();
        $data = array(
            'success' => true,
            'total' => count($array),
            'data' => $array
        );
        return $this->response($data);
    }

    public function getMenuRecursivo(){
        $array = array();
        foreach ($this->arrayMenu as $index => $value){
            if(intval($value['nivel'])==0){
                $value['icono'] = (trim($value['icono']) == '' || trim($value['icono']) == './') ? 'form.png' : $value['icono'];
                $value['menu_class'] = (trim($value['menu_class']) == '.') ? '' : trim($value['menu_class']);
                $value['children'] = $this->getMenuInterno($value['id_menu']);
                $array[]=$value;
            }
        }
        return $array;
    }

    public function getMenuInterno($_parent){
        $array = array();
        foreach ($this->arrayMenu as $index => $value){
            if(intval($_parent)==intval($value['padre'])){
                $p['vp_mod_id'] = 0;
                $p['vp_menu_id'] = intval($value['id_menu']);
                $value['permisos'] = $this->objDatos->usr_sis_servicios($p);
                $value['icono'] = (trim($value['icono']) == '' || trim($value['icono']) == './') ? 'form.png' : $value['icono'];
                $value['menu_class'] = (trim($value['menu_class']) == '.') ? '' : trim($value['menu_class']);
                $array[]=$value;
            }
        }
        return $array;
    }

    public function generateTree($parent_id = 0){
        $array = array();
        $value_ = array();
        //$tree = '<ul>';
        //for($i=0, $ni=count($this->arrayMenu); $i < $ni; $i++){
        foreach ($this->arrayMenu as $index => $value){
            if(intval($value['parent_id']) == $parent_id){
                /*$tree .= '<li>';
                $tree .= $items[$i]['name'];
                $tree .= $this->generateTree($items, $items[$i]['id']);
                $tree .= '</li>';*/
                $value_['id'] = trim($value['id']);
                $value_['parent_id'] = trim($value['parent_id']);
                $value_['text'] = utf8_encode(trim($value['nombre']));
                $value_['nombre'] = utf8_encode(trim($value['nombre']));
                $value_['icon'] = utf8_encode(trim($value['menu_icono']));
                $value_['icono'] = utf8_encode(trim($value['menu_icono']));
                $value_['menu_url'] = utf8_encode(trim($value['menu_url']));
                $value_['permisos'] = $this->response($this->objDatos->usr_sis_servicios($value_));
                $chl=$this->generateTree(intval($value['id']));
                if(count($chl)!=0){
                    $value_['expanded'] = 'true';
                    $value_['children'] = $chl;
                    $value_['leaf'] = 'false';
                }else{
                    $value_['leaf'] = 'true';
                }
                $array[]=$value_;
            }
        }
        //$tree .= '</ul>';
        return $array;
    }

    /**
     * Método para expirar session de usuario.
     */
    public function logout($p){
        $this->expire();
    }

    /**
     * Formulario de prueba
     */
    public function form_demo($p){
        $this->view('index/demo.php', $p);
    }

    public function get_form_demo_table($p){
        $this->view('index/form_demo_table.php', $p);
    }

    public function get_dataTest($p){

        $rs = array(
            array('id' => '1', 'nombre' => 'Luis Remicio Obregón', 'descripcion' => 'Software Developer'),
            array('id' => '2', 'nombre' => 'Luis Remicio Obregón', 'descripcion' => 'Software Developer'),
            array('id' => '3', 'nombre' => 'Luis Remicio Obregón', 'descripcion' => 'Software Developer'),
            array('id' => '4', 'nombre' => 'Luis Remicio Obregón', 'descripcion' => 'Software Developer'),
            array('id' => '5', 'nombre' => 'Luis Remicio Obregón', 'descripcion' => 'Software Developer')
        );

        $array = array();
        if (count($rs) > 0){
            foreach($rs as $index => $value){
                $array[] = $value;
            }
        }
        $data = array(
            'success' => true,
            'total' => count($array),
            'data' => $array
        );
        return $this->response($data);
    }

    public function demo_maps($p){
        $this->view('index/demo_maps.php', $p);
    }

}