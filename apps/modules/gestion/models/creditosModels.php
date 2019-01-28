<?php

/**
 * Geekode php (http://jimmyanthony.com/)
 * @link    https://github.com/jbazan/geekcode_php
 * @author  Jimmy Anthony Bazán Solis @remicioluis (https://twitter.com/jbazan)
 * @version 2.0
 */

class creditosModels extends Adodb {

    private $dsn;

    public function __construct(){
        $this->dsn = Common::read_ini(PATH.'config/config.ini', 'server_main');
    }

    public function SP_CREDITO_SAVE($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_CREDITOS_SAVE');
        parent::SetParameterSP($p['vp_op'], 'varchar');
        parent::SetParameterSP($p['vp_cod_credito'], 'int');
        parent::SetParameterSP($p['vp_cod_cli'], 'int');
        parent::SetParameterSP($p['vp_cod_tipo'], 'int');
        parent::SetParameterSP($p['vp_cod_metodo'], 'int');
        parent::SetParameterSP($p['vp_cod_entrega'], 'int');
        parent::SetParameterSP($p['vp_fecha'], 'varchar');
        parent::SetParameterSP($p['vp_tasa_interes'], 'varchar');
        parent::SetParameterSP($p['vp_prestamo'], 'varchar');
        parent::SetParameterSP($p['vp_cuotas'], 'int');
        parent::SetParameterSP($p['vp_valor_cuota'], 'varchar');
        parent::SetParameterSP($p['vp_fecha_calculo'], 'varchar');
        parent::SetParameterSP($p['vp_total_credito'], 'varchar');
        parent::SetParameterSP($p['vp_limite_cred'], 'varchar');
        parent::SetParameterSP($this->strip_carriage_returns(utf8_decode($p['vp_nota'])), 'varchar');
        // echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }

    public function get_credit_list($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_CREDITOS_LIST');
      // parent::SetParameterSP($p['vp_shi_codigo'], 'int');
      //  parent::SetParameterSP($p['vp_fac_cliente'], 'int');
        parent::SetParameterSP($p['VP_CODIGO'], 'int');
        parent::SetParameterSP($p['VP_CLIENTE'], 'int');
        parent::SetParameterSP($p['VP_FECHA'], 'int');
        parent::SetParameterSP($p['start'], 'int');
        parent::SetParameterSP($p['limit'], 'int');
        // echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }
    public function get_credit_record($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_CREDITOS_RECORD');
        parent::SetParameterSP($p['VP_CODIGO'], 'int');
        // echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }
    public function SP_CREDITOS_DETALLE_LIST($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_CREDITOS_DETALLE_LIST');
        parent::SetParameterSP($p['VP_CODIGO'], 'int');
        // echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }
    public function SP_CLIENTES_RECORD($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_CLIENTES_RECORD');
        parent::SetParameterSP($p['VP_CODIGO_CLIENTE'], 'int');
         //echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }
    public function SP_EMPRESA_RECORD($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_EMPRESA_RECORD');
         //echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }
    public function SP_CLIENTES_DATA_REPORT($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_CLIENTES_DATA_REPORT');
        parent::SetParameterSP($p['VP_CODIGO'], 'int');
        parent::SetParameterSP($p['VP_CODIGO_CLIENTE'], 'int');
        // echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }
    public function strip_carriage_returns($string){
        return str_replace(array("\n\r", "\n", "\r","'"), '', $string);
    }
    public function SP_CREDITOS_SAVE($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_CREDITOS_SAVE');
        parent::SetParameterSP($p['vp_op'], 'varchar');
        parent::SetParameterSP($p['vp_cod_credito'], 'int');
        parent::SetParameterSP($p['vp_cod_cli'], 'int');
        parent::SetParameterSP($p['vp_cod_tipo'], 'int');
        parent::SetParameterSP($p['vp_cod_metodo'], 'int');
        parent::SetParameterSP($p['vp_cod_entrega'], 'int');
        parent::SetParameterSP($p['vp_fecha'], 'varchar');
        parent::SetParameterSP($p['vp_tasa_interes'], 'varchar');
        parent::SetParameterSP($p['vp_prestamo'], 'varchar');
        parent::SetParameterSP($p['vp_cuotas'], 'int');
        parent::SetParameterSP($p['vp_valor_cuota'], 'varchar');
        parent::SetParameterSP($p['vp_fecha_calculo'], 'varchar');
        parent::SetParameterSP($p['vp_total_credito'], 'varchar');
        parent::SetParameterSP($p['vp_limite_cred'], 'varchar');
        parent::SetParameterSP($this->strip_carriage_returns(utf8_decode($p['vp_nota'])), 'varchar');
        // echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }

}
