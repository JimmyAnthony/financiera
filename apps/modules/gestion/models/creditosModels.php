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
        parent::ConnectionOpen($this->dsn, 'SP_CREDITO_SAVE');
        parent::SetParameterSP($p['vp_op'], 'varchar');//1
        parent::SetParameterSP($p['vp_id_solicitud'], 'int');//8
        parent::SetParameterSP($p['vp_sol_id_per'], 'int');//8
        parent::SetParameterSP($p['vp_id_garante'], 'int');//8
        parent::SetParameterSP($p['vp_id_asesor'], 'int');//8
        parent::SetParameterSP($p['vp_id_agencia'], 'int');//8

        parent::SetParameterSP($p['vp_nro_solicitud'], 'varchar');
        parent::SetParameterSP($p['vp_fecha_solicitud'], 'varchar');
        parent::SetParameterSP($p['vp_moneda'], 'varchar');
        parent::SetParameterSP($p['vp_monto'], 'varchar');
        parent::SetParameterSP($p['vp_tipo_cliente'], 'varchar');
        parent::SetParameterSP($p['vp_excepcion'], 'varchar');
        parent::SetParameterSP($p['vp_import_aprobado'], 'varchar');
        parent::SetParameterSP($p['vp_fecha_1ra_letra'], 'varchar');
        parent::SetParameterSP($p['vp_nro_cuotas'], 'int');
        parent::SetParameterSP($p['vp_interes'], 'varchar');
        parent::SetParameterSP($p['vp_mora'], 'varchar');
        parent::SetParameterSP($p['vp_id_mot'], 'int');

        parent::SetParameterSP(utf8_decode($p['vp_resena']), 'varchar');//9
        //parent::SetParameterSP($p['vp_estado'], 'varchar');
        parent::SetParameterSP(USR_ID, 'int');//141

        parent::SetParameterSP('@OUT', 'int');//140
        parent::SetParameterSP('@OUT', 'int');//140
        parent::SetParameterSP('@OUT', 'int');//140
        parent::SetParameterSP('@OUT', 'int');//140
         //echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }
    
    public function SP_CREDITOS_CLIENTE_LIST($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_CREDITOS_CLIENTE_LIST');
        parent::SetParameterSP($p['VP_T_DOC'], 'varchar');//1
        parent::SetParameterSP($p['VP_ID_PER'], 'int');//19 
        parent::SetParameterSP($p['VP_DOC'], 'varchar');//8
        parent::SetParameterSP(USR_ID, 'int');//19
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
        parent::ConnectionOpen($this->dsn, 'SP_DIRECCION_MANT');
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
        
        parent::SetParameterSP($p['vp_sol_departamento'], 'varchar');//35
        parent::SetParameterSP($p['vp_sol_provincia'], 'varchar');//35
        parent::SetParameterSP($p['vp_sol_distrito'], 'varchar');//35

        parent::SetParameterSP($p['vp_flag'], 'varchar');//140
        parent::SetParameterSP(USR_ID, 'int');//141

        parent::SetParameterSP('@OUT', 'int');//140
        parent::SetParameterSP('@OUT', 'int');//140
        parent::SetParameterSP('@OUT', 'int');//140
        parent::SetParameterSP('@OUT', 'int');//140

         //echo '=>' . parent::getSql().'<br>'; exit();
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

         //echo '=>' . parent::getSql().'<br>'; exit();
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
    public function SP_DIRECCIONES_LIST($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_DIRECCIONES_LIST');
      // parent::SetParameterSP($p['vp_shi_codigo'], 'int');
      //  parent::SetParameterSP($p['vp_fac_cliente'], 'int');
        parent::SetParameterSP($p['vp_op'], 'varchar');
        parent::SetParameterSP($p['vp_id'], 'int');
        parent::SetParameterSP($p['vp_nombre'], 'varchar');
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

    public function get_list_agencias($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_AGENCIAS_USUARIO_LIST');
      // parent::SetParameterSP($p['vp_shi_codigo'], 'int');
      //  parent::SetParameterSP($p['vp_fac_cliente'], 'int');
        parent::SetParameterSP($p['vp_cod_age'], 'int');
        parent::SetParameterSP($p['vp_cod_ubi'], 'varchar');
        parent::SetParameterSP($p['vp_nombre'], 'varchar');
        parent::SetParameterSP(USR_ID, 'int');//141
        // echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }

    public function get_list_asesores($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_ASESORES_AGENCIA_LIST');
      // parent::SetParameterSP($p['vp_shi_codigo'], 'int');
      //  parent::SetParameterSP($p['vp_fac_cliente'], 'int');
        parent::SetParameterSP($p['vp_cod_age'], 'int');
        parent::SetParameterSP(USR_ID, 'int');//141
        // echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }
    public function get_list_motivos($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_MOTIVOS_LIST');
      // parent::SetParameterSP($p['vp_shi_codigo'], 'int');
      //  parent::SetParameterSP($p['vp_fac_cliente'], 'int');
        parent::SetParameterSP('A', 'varchar');
        parent::SetParameterSP(USR_ID, 'int');//141
        // echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }
    public function get_list_documentos($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_PERSONA_DOCUMENTOS_LIST');
      // parent::SetParameterSP($p['vp_shi_codigo'], 'int');
      //  parent::SetParameterSP($p['vp_fac_cliente'], 'int');
        parent::SetParameterSP($p['vp_sol_id_per'], 'int');
        parent::SetParameterSP($p['vp_flag'], 'varchar');
        // echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }
    public function SP_PERSONA_IMG($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_PERSONA_IMG');
        parent::SetParameterSP($p['vp_sol_id_per'], 'int');//8
        parent::SetParameterSP($p['vp_name'], 'varchar');//8
        parent::SetParameterSP(USR_ID, 'int');//141

         //echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }
    public function SP_PERSONA_DOCUMENTOS($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_PERSONA_DOCUMENTOS');
        parent::SetParameterSP($p['vp_op'], 'varchar');//8
        parent::SetParameterSP($p['vp_id_doc'], 'int');//8
        parent::SetParameterSP($p['vp_sol_id_per'], 'int');//8
        parent::SetParameterSP($p['vp_nombre'], 'varchar');//8
        parent::SetParameterSP($p['vp_img'], 'varchar');//8
        parent::SetParameterSP(USR_ID, 'int');//141

         //echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }

}
