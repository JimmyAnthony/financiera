<?php

/**
 * Geekode php (http://jimmyanthony.com/)
 * @link    https://github.com/jbazan/geekcode_php
 * @author  Jimmy Anthony Bazán Solis @remicioluis (https://twitter.com/jbazan)
 * @version 2.0
 */

class clientesModels extends Adodb {

    private $dsn;

    public function __construct(){
        $this->dsn = Common::read_ini(PATH.'config/config.ini', 'server_main');
    }
    public function SP_ASESORES_LIST($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_ASESORES_LIST');
      // parent::SetParameterSP($p['vp_shi_codigo'], 'int');
      //  parent::SetParameterSP($p['vp_fac_cliente'], 'int');
        parent::SetParameterSP($p['vp_op'], 'varchar');
        parent::SetParameterSP($p['vp_id'], 'int');
        parent::SetParameterSP($p['vp_dni'], 'varchar');
        parent::SetParameterSP($p['vp_nombres'], 'varchar');
        // echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }
    
    public function SP_CLIENTES_LIST($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_CLIENTES_LIST');
        parent::SetParameterSP($p['vp_op'], 'varchar');
        parent::SetParameterSP($p['vp_id'], 'int');
        parent::SetParameterSP($p['vp_dni'], 'varchar');
        parent::SetParameterSP($p['vp_nombres'], 'varchar');
        // echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }

    /**
     * Obtiene el listado de menus al que se tiene permiso
     * por usuario y sistema
     */
    public function usr_sis_menus($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_MENU');
        parent::SetParameterSP(USR_ID, 'int');
        parent::SetParameterSP($p['sis_id'], 'int');
        // echo '=>' . parent::getSql() . '</br>';
        $array = parent::ExecuteSPArray(array('sql_error', 'msn_error'));
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
