<?php

/**
 * Geekode php (http://jimmyanthony.com/)
 * @link    https://github.com/jbazan/geekcode_php
 * @author  Jimmy Anthony Bazán Solis @remicioluis (https://twitter.com/jbazan)
 * @version 2.0
 */

class personaModels extends Adodb {

    private $dsn;

    public function __construct(){
        $this->dsn = Common::read_ini(PATH.'config/config.ini', 'server_main');
    }
    public function SP_CREDITO_PERSONA($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_PERSONA_MANT');
        parent::SetParameterSP($p['vp_op'], 'varchar');//1
        parent::SetParameterSP($p['vp_sol_id_cli'], 'int');//8
        parent::SetParameterSP($p['vp_sol_id_per'], 'int');//8

        parent::SetParameterSP(utf8_decode($p['vp_sol_ape_pat']), 'varchar');//9
        parent::SetParameterSP(utf8_decode($p['vp_sol_ape_mat']), 'varchar');//10
        parent::SetParameterSP(utf8_decode($p['vp_sol_nombres']), 'varchar');//11
        parent::SetParameterSP($p['vp_sol_sexo'], 'varchar');
        parent::SetParameterSP($p['vp_sol_doc_dni'], 'varchar');//12
        parent::SetParameterSP($p['vp_sol_doc_ce'], 'varchar');//13
        parent::SetParameterSP($p['vp_sol_doc_cip'], 'varchar');//14
        parent::SetParameterSP($p['vp_sol_doc_ruc'], 'varchar');//15
        parent::SetParameterSP($p['vp_sol_doc_cm'], 'varchar');//16
        parent::SetParameterSP($p['vp_sol_estado_civil'], 'varchar');//17
        parent::SetParameterSP($p['vp_sol_fecha_nac'], 'varchar');//18
        parent::SetParameterSP($p['vp_sol_id_tel'], 'int');//19
        parent::SetParameterSP($p['vp_sol_domi_propio'], 'varchar');//21
        parent::SetParameterSP($p['vp_sol_domi_pagando'], 'varchar');//22
        parent::SetParameterSP($p['vp_sol_domi_alquilado'], 'varchar');//23
        parent::SetParameterSP($p['vp_sol_domi_familiar'], 'varchar');//24
        parent::SetParameterSP(utf8_decode($p['vp_profesion']), 'varchar');//24----------------------------

        parent::SetParameterSP($p['vp_sol_id_dir'], 'int');//26
        parent::SetParameterSP($p['vp_sol_img'], 'varchar');//25

        parent::SetParameterSP($p['vp_flag'], 'varchar');//140
        parent::SetParameterSP(USR_ID, 'int');//141

        parent::SetParameterSP('@OUT', 'int');//140
        parent::SetParameterSP('@OUT', 'int');//140
        parent::SetParameterSP('@OUT', 'int');//140
        parent::SetParameterSP('@OUT', 'int');//140
        // echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }
    
    public function SP_TELEFONOS_LIST($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_TELEFONOS_LIST');
        parent::SetParameterSP($p['vp_op'], 'varchar');//1
        parent::SetParameterSP($p['vp_id'], 'int');//8
        parent::SetParameterSP($p['vp_flag'], 'varchar');//19
        // echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }
    public function SP_TELEFONO_MANT($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_TELEFONO_MANT');
        parent::SetParameterSP($p['vp_op'], 'varchar');//1
        parent::SetParameterSP($p['vp_sol_id_per'], 'int');//8
        parent::SetParameterSP($p['vp_sol_id_tel'], 'int');//19
        parent::SetParameterSP($p['vp_sol_tel_cel'], 'varchar');//20

        parent::SetParameterSP($p['vp_sol_tipo_tel'], 'varchar');//20
        parent::SetParameterSP($p['vp_sol_line_tel'], 'varchar');//20

        parent::SetParameterSP($p['vp_flag'], 'varchar');//140
        parent::SetParameterSP(USR_ID, 'int');//141
        parent::SetParameterSP('@OUT', 'int');//140
        parent::SetParameterSP('@OUT', 'int');//140
        parent::SetParameterSP('@OUT', 'int');//140
        // echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }

    public function SP_CREDITO_DIREC($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_CREDITO_SAVE');
        parent::SetParameterSP($p['vp_op'], 'varchar');//1
        parent::SetParameterSP($p['vp_sol_id_per'], 'int');//8
        parent::SetParameterSP($p['vp_sol_id_dir'], 'int');//26
        
        parent::SetParameterSP(utf8_decode($p['vp_sol_dir_direccion']), 'varchar');//27
        parent::SetParameterSP($p['vp_sol_dir_numero'], 'varchar');//28
        parent::SetParameterSP($p['vp_sol_dir_mz'], 'varchar');//29
        parent::SetParameterSP($p['vp_sol_dir_lt'], 'varchar');//30
        parent::SetParameterSP($p['vp_sol_dir_dpto'], 'varchar');//31
        parent::SetParameterSP($p['vp_sol_dir_interior'], 'varchar');//32
        parent::SetParameterSP($p['vp_sol_dir_urb'], 'varchar');//33
        parent::SetParameterSP(utf8_decode($p['vp_sol_dir_referencia']), 'varchar');//34
        
        parent::SetParameterSP($p['vp_sol_distrito'], 'varchar');//35

        parent::SetParameterSP($p['vp_flag'], 'varchar');//140
        parent::SetParameterSP(USR_ID, 'int');//141

         echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }
    public function SP_CREDITO_AGE($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_CREDITO_SAVE');
        parent::SetParameterSP($p['vp_op'], 'varchar');//1
        parent::SetParameterSP($p['vp_sol_id_per'], 'int');//8
        parent::SetParameterSP($p['vp_mot_cod_agencia'], 'varchar');//132
        
        parent::SetParameterSP($p['vp_flag'], 'varchar');//140
        parent::SetParameterSP(USR_ID, 'int');//141

         echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }
    public function SP_PERSONA_LIST($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_PERSONA_LIST');
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
