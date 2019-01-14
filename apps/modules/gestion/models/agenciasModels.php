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

    public function get_agencias_list($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_AGENCIAS_LIST');
      // parent::SetParameterSP($p['vp_shi_codigo'], 'int');
      //  parent::SetParameterSP($p['vp_fac_cliente'], 'int');
        parent::SetParameterSP($p['vp_cod_age'], 'int');
        parent::SetParameterSP($p['vp_cod_ubi'], 'int');
        parent::SetParameterSP($p['vp_nombre'], 'varchar');
        // echo '=>' . parent::getSql().'<br>'; exit();
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
