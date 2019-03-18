<?php

/**
 * Geekode php (http://jimmyanthony.com/)
 * @link    https://github.com/jbazan/geekcode_php
 * @author  Jimmy Anthony @jbazan (https://twitter.com/jbazan)
 * @version 2.0
 */

class cierreModels extends Adodb {

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


        parent::SetParameterSP($p['vp_sol_domicilio'], 'varchar');//21
        parent::SetParameterSP($p['vp_sol_estudios'], 'varchar');//22
        parent::SetParameterSP(utf8_decode($p['vp_sol_profesion']), 'varchar');//24----------------------------
        parent::SetParameterSP($p['vp_sol_laboral'], 'varchar');//23
        parent::SetParameterSP($p['vp_sol_cargo'], 'varchar');//24
        parent::SetParameterSP($p['vp_sol_centro_trabajo'], 'varchar');//24
        parent::SetParameterSP($p['vp_sol_fecha_ingreso'], 'varchar');//24
        

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
    public function SP_CONCEPTO_LIST($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_CONCEPTO_LIST');
        parent::SetParameterSP(USR_ID, 'int');
        // echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }
    public function SP_GENERAR_DATA_DIARIA($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_GENERAR_DATA_DIARIA');
        parent::SetParameterSP($p['vp_agencia'], 'int');//19 
        parent::SetParameterSP($p['vp_fecha'], 'varchar');//19 
        parent::SetParameterSP(USR_ID, 'int');//19
        // echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }
    public function SP_GENERAR_CAJA_DIARIA($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_GENERAR_CAJA_DIARIA');
        parent::SetParameterSP($p['vp_id_caja'], 'int');//19 
        parent::SetParameterSP($p['vp_agencia'], 'int');//19 
        parent::SetParameterSP($p['vp_fecha'], 'varchar');//19 
        parent::SetParameterSP(USR_ID, 'int');//19
        parent::SetParameterSP('@OUT', 'int');//140
        parent::SetParameterSP('@OUT', 'int');//140
        parent::SetParameterSP('@OUT', 'int');//140
        parent::SetParameterSP('@OUT', 'int');//140
        // echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }
    public function SP_GENERAR_CIERRE_CAJA_DIARIA($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_GENERAR_CIERRE_CAJA_DIARIA');
        parent::SetParameterSP($p['vp_id_caja'], 'int');//19 
        parent::SetParameterSP($p['vp_agencia'], 'int');//19 
        parent::SetParameterSP($p['vp_fecha'], 'varchar');//19 
        parent::SetParameterSP(USR_ID, 'int');//19
        parent::SetParameterSP('@OUT', 'int');//140
        parent::SetParameterSP('@OUT', 'int');//140
        parent::SetParameterSP('@OUT', 'int');//140
        parent::SetParameterSP('@OUT', 'int');//140
        // echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }
    public function SP_GENERAR_CLASIFICACION_CAJA($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_GENERAR_CLASIFICACION_CAJA');
        parent::SetParameterSP($p['vp_id_caja_det'], 'int');//19 
        parent::SetParameterSP($p['vp_id_caja'], 'int');//19 
        parent::SetParameterSP($p['vp_id_age'], 'int');//19 
        parent::SetParameterSP($p['vp_id_asesor'], 'int');//19
        parent::SetParameterSP($p['vp_fecha_pago'], 'varchar');//19 
        parent::SetParameterSP($p['vp_efectivo'], 'varchar');//19 
        parent::SetParameterSP($p['vp_orden'], 'int');//19 
        parent::SetParameterSP($p['vp_moneda'], 'varchar');//19 
        parent::SetParameterSP($p['vp_valor'], 'varchar');//19 
        parent::SetParameterSP($p['vp_cantidad'], 'varchar');//19 

        parent::SetParameterSP(USR_ID, 'int');//19
        parent::SetParameterSP('@OUT', 'int');//140
        parent::SetParameterSP('@OUT', 'int');//140
        parent::SetParameterSP('@OUT', 'int');//140
        // echo '=>' . parent::getSql().'<br>'; //exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }
    public function SP_GENERAR_CIERRE_CAJA_INDIVIDUAL($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_GENERAR_CIERRE_CAJA_INDIVIDUAL');
        parent::SetParameterSP($p['vp_op'], 'varchar');//19 
        parent::SetParameterSP($p['vp_id_caja_det'], 'int');//19 
        parent::SetParameterSP($p['vp_id_caja'], 'int');//19 
        parent::SetParameterSP($p['vp_id_age'], 'int');//19 
        parent::SetParameterSP($p['vp_id_asesor'], 'int');//19
        parent::SetParameterSP($p['vp_fecha_pago'], 'varchar');//19 
        parent::SetParameterSP($p['vp_efectivo'], 'varchar');//19 

        parent::SetParameterSP(USR_ID, 'int');//19
        parent::SetParameterSP('@OUT', 'int');//140
        parent::SetParameterSP('@OUT', 'int');//140
        parent::SetParameterSP('@OUT', 'int');//140
        // echo '=>' . parent::getSql().'<br>'; //exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }
    public function SP_GENERAR_MOVIMIENTO_CAJA($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_GENERAR_MOVIMIENTO_CAJA');
        parent::SetParameterSP($p['vp_id_caja'], 'int');//19 
        parent::SetParameterSP($p['vp_id_age'], 'int');//19 
        parent::SetParameterSP($p['vp_id_concepto'], 'int');//19
        parent::SetParameterSP($p['vp_monto_mov'], 'varchar');//19 

        parent::SetParameterSP(USR_ID, 'int');//19
        parent::SetParameterSP('@OUT', 'int');//140
        parent::SetParameterSP('@OUT', 'int');//140
        parent::SetParameterSP('@OUT', 'int');//140
        // echo '=>' . parent::getSql().'<br>'; //exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }
    public function SP_CREDITOS_DETALLE_LIST($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_CREDITOS_DETALLE_LIST');
        parent::SetParameterSP($p['VP_CODIGO'], 'int');//19 
        parent::SetParameterSP(USR_ID, 'int');//19
        // echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }
    public function SP_ASESORES_DISTRIBUCION_LIST($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_ASESORES_DISTRIBUCION_LIST');
        parent::SetParameterSP($p['vp_id_caja_det'], 'int');//19 
        parent::SetParameterSP($p['vp_id_caja'], 'int');//19 
        parent::SetParameterSP($p['vp_id_asesor'], 'int');//19
        parent::SetParameterSP(USR_ID, 'int');//19
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
        parent::ConnectionOpen($this->dsn, 'SP_ASESORES_CIERRE_LIST');
      // parent::SetParameterSP($p['vp_shi_codigo'], 'int');
      //  parent::SetParameterSP($p['vp_fac_cliente'], 'int');
        parent::SetParameterSP($p['vp_id_caja'], 'int');
        parent::SetParameterSP($p['vp_id_age'], 'int');
        parent::SetParameterSP($p['vp_fecha'], 'varchar');
        parent::SetParameterSP($p['vp_dni'], 'varchar');
        parent::SetParameterSP($p['vp_nombres'], 'varchar');
         parent::SetParameterSP(USR_ID, 'int');//141
        // echo '=>' . parent::getSql().'<br>'; exit();
        $array = parent::ExecuteSPArray();
        return $array;
    }
    public function SP_ASESORES_CLIENTE_LIST($p){
        parent::ReiniciarSQL();
        parent::ConnectionOpen($this->dsn, 'SP_ASESORES_CLIENTE_LIST');
        parent::SetParameterSP($p['vp_id'], 'int');
        parent::SetParameterSP(USR_ID, 'int');//141
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
        parent::ConnectionOpen($this->dsn, 'SP_AGENCIAS_LIST');
      // parent::SetParameterSP($p['vp_shi_codigo'], 'int');
      //  parent::SetParameterSP($p['vp_fac_cliente'], 'int');
        parent::SetParameterSP($p['vp_cod_age'], 'int');
        parent::SetParameterSP($p['vp_cod_ubi'], 'varchar');
        parent::SetParameterSP($p['vp_nombre'], 'varchar');
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
