<?php

/**
 * Geekode php (http://jimmyanthony.com/)
 * @link    https://github.com/jbazan/geekcode_php
 * @author  Jimmy Anthony Bazán Solis @remicioluis (https://twitter.com/jbazan)
 * @version 2.0
 */

class agenciasModels extends Adodb {

    private $dsn;

    public function __construct(){
        $this->dsn = Common::read_ini(PATH.'config/config.ini', 'server_main');
    }

<<<<<<< HEAD
    public function get_agencias_list($p){
=======
    public function get_list_agencias($p){
>>>>>>> 08ba32a10657d83d10c8135b3d7309d01c135f36
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_AGENCIAS_LIST');
      // parent::SetParameterSP($p['vp_shi_codigo'], 'int');
      //  parent::SetParameterSP($p['vp_fac_cliente'], 'int');
        parent::SetParameterSP($p['vp_cod_age'], 'int');
<<<<<<< HEAD
        parent::SetParameterSP($p['vp_cod_ubi'], 'int');
=======
        parent::SetParameterSP($p['vp_cod_ubi'], 'varchar');
>>>>>>> 08ba32a10657d83d10c8135b3d7309d01c135f36
        parent::SetParameterSP($p['vp_nombre'], 'varchar');
        // echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }

    public function get_man_agencias($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_AGENCIAS_MANT');
        parent::SetParameterSP($p['vp_op'], 'varchar');
        parent::SetParameterSP($p['vp_codigo'], 'int');
        parent::SetParameterSP($p['vp_nombre'], 'varchar');
        parent::SetParameterSP($p['vp_descripcion'], 'varchar');
        parent::SetParameterSP($p['vp_direccion'], 'varchar');
        parent::SetParameterSP($p['vp_telefonos'], 'varchar');
        parent::SetParameterSP($p['vp_distri'], 'varchar');
        parent::SetParameterSP($p['vp_x'], 'varchar');
        parent::SetParameterSP($p['vp_y'], 'varchar');
        parent::SetParameterSP($p['vp_fecha'], 'varchar');
        parent::SetParameterSP($p['vp_estado'], 'varchar');
         //echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }

    public function SP_UBIGEO_LIST($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_UBIGEO_LIST');
        parent::SetParameterSP($p['VP_OP'], 'varchar');
        parent::SetParameterSP($p['VP_VALUE'], 'varchar');
        // echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }

}
