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
        //parent::SetParameterSP($this->strip_carriage_returns(utf8_decode($p['vp_nota'])), 'varchar');


        parent::SetParameterSP($p['vp_op'], 'varchar');//1

        parent::SetParameterSP($p['vp_sol_id_sol'], 'int');//2
        parent::SetParameterSP($p['vp_sol_moneda'], 'varchar');//3
        parent::SetParameterSP($p['vp_sol_monto'], 'varchar');//4
        parent::SetParameterSP($p['vp_sol_tipo_cliente'], 'varchar');//5
        parent::SetParameterSP($p['vp_sol_excep'], 'varchar');//6
        parent::SetParameterSP($p['vp_sol_fecha'], 'varchar');//7

        
        parent::SetParameterSP($p['vp_sol_id_cli'], 'int');//8

        parent::SetParameterSP($p['vp_sol_ape_pat'], 'varchar');//9
        parent::SetParameterSP($p['vp_sol_ape_mat'], 'varchar');//10
        parent::SetParameterSP($p['vp_sol_nombres'], 'varchar');//11
        parent::SetParameterSP($p['vp_sol_sexo'], 'varchar');//--------------------------------
        parent::SetParameterSP($p['vp_sol_doc_dni'], 'varchar');//12
        parent::SetParameterSP($p['vp_sol_doc_ce'], 'varchar');//13
        parent::SetParameterSP($p['vp_sol_doc_cip'], 'varchar');//14
        parent::SetParameterSP($p['vp_sol_doc_ruc'], 'varchar');//15
        parent::SetParameterSP($p['vp_sol_doc_cm'], 'varchar');//16
        parent::SetParameterSP($p['vp_sol_estado_civil'], 'varchar');//17
        parent::SetParameterSP($p['vp_sol_fecha_nac'], 'varchar');//18

        
        parent::SetParameterSP($p['vp_sol_id_tel'], 'int');//19

        parent::SetParameterSP($p['vp_sol_tel_cel'], 'varchar');//20

        parent::SetParameterSP($p['vp_sol_domi_propio'], 'varchar');//21
        parent::SetParameterSP($p['vp_sol_domi_pagando'], 'varchar');//22
        parent::SetParameterSP($p['vp_sol_domi_alquilado'], 'varchar');//23
        parent::SetParameterSP($p['vp_sol_domi_familiar'], 'varchar');//24

        parent::SetParameterSP($p['vp_sol_img'], 'varchar');//25

        
        parent::SetParameterSP($p['vp_sol_id_dir'], 'int');//26

        parent::SetParameterSP($p['vp_sol_dir_direccion'], 'varchar');//27
        parent::SetParameterSP($p['vp_sol_dir_numero'], 'varchar');//28
        parent::SetParameterSP($p['vp_sol_dir_mz'], 'varchar');//29
        parent::SetParameterSP($p['vp_sol_dir_lt'], 'varchar');//30
        parent::SetParameterSP($p['vp_sol_dir_dpto'], 'varchar');//31
        parent::SetParameterSP($p['vp_sol_dir_interior'], 'varchar');//32
        parent::SetParameterSP($p['vp_sol_dir_urb'], 'varchar');//33
        parent::SetParameterSP($p['vp_sol_dir_referencia'], 'varchar');//34
        
        parent::SetParameterSP($p['vp_sol_distrito'], 'varchar');//35

        
        parent::SetParameterSP($p['vp_lab_id_dir'], 'int');//36

        parent::SetParameterSP($p['vp_lab_dir_direccion'], 'varchar');//37
        parent::SetParameterSP($p['vp_lab_dir_numero'], 'varchar');//38
        parent::SetParameterSP($p['vp_lab_dir_mz'], 'varchar');//39
        parent::SetParameterSP($p['vp_lab_dir_lt'], 'varchar');//40
        parent::SetParameterSP($p['vp_lab_dir_dpto'], 'varchar');//41
        parent::SetParameterSP($p['vp_lab_dir_interior'], 'varchar');//42
        parent::SetParameterSP($p['vp_lab_dir_urb'], 'varchar');//43
        parent::SetParameterSP($p['vp_lab_dir_referencia'], 'varchar');//44
       
        parent::SetParameterSP($p['vp_lab_distrito'], 'varchar');//45

        
        parent::SetParameterSP($p['vp_lab_id_negocio'], 'int');//46

        parent::SetParameterSP($p['vp_lab_negocio'], 'varchar');//47
        parent::SetParameterSP($p['vp_lab_ant_negocio'], 'varchar');//48
        parent::SetParameterSP($p['vp_lab_obs'], 'varchar');//49
        parent::SetParameterSP($p['vp_lab_neg_cod_ubi'], 'varchar');//50

        
        parent::SetParameterSP($p['vp_conyu_id_cli'], 'int');//51

        parent::SetParameterSP($p['vp_conyu_ape_pater'], 'varchar');//52
        parent::SetParameterSP($p['vp_conyu_ape_mater'], 'varchar');//53
        parent::SetParameterSP($p['vp_conyu_nombres'], 'varchar');//54
        parent::SetParameterSP($p['vp_conyu_sexo'], 'varchar');//--------------------------------
        parent::SetParameterSP($p['vp_conyu_dni'], 'varchar');//55
        parent::SetParameterSP($p['vp_conyu_ce'], 'varchar');//56
        parent::SetParameterSP($p['vp_conyu_cip'], 'varchar');//57
        parent::SetParameterSP($p['vp_conyu_ruc'], 'varchar');//58
        parent::SetParameterSP($p['vp_conyu_cm'], 'varchar');//59
        parent::SetParameterSP($p['vp_conyu_estado_civil'], 'varchar');//60
        parent::SetParameterSP($p['vp_conyu_fecha_nacimiento'], 'varchar');//61

        parent::SetParameterSP($p['vp_conyu_id_tel'], 'int');//62
        parent::SetParameterSP($p['vp_conyu_telefonos'], 'varchar');//63

        parent::SetParameterSP($p['vp_conyu_img'], 'varchar');//64

        parent::SetParameterSP($p['vp_conyu_contratado'], 'varchar');//65
        parent::SetParameterSP($p['vp_conyu_dependiente'], 'varchar');//66
        parent::SetParameterSP($p['vp_conyu_independiente'], 'varchar');//67
        parent::SetParameterSP($p['vp_conyu_otros'], 'varchar');//68
        parent::SetParameterSP($p['vp_conyu_bachiller'], 'varchar');//69
        parent::SetParameterSP($p['vp_conyu_tecnologia'], 'varchar');//70
        parent::SetParameterSP($p['vp_conyu_titulado'], 'varchar');//71
        parent::SetParameterSP($p['vp_conyu_magister'], 'varchar');//72
        parent::SetParameterSP($p['vp_conyu_profesion'], 'varchar');//73

        parent::SetParameterSP($p['vp_conyu_id_lab'], 'int');//74
        parent::SetParameterSP($p['vp_conyu_sueldo'], 'varchar');//75
        
        parent::SetParameterSP($p['vp_conyu_centro_trab'], 'varchar');//76

        
        parent::SetParameterSP($p['vp_conyu_antiguedad'], 'int');//77

        parent::SetParameterSP($p['vp_conyu_cargo'], 'varchar');//78
        parent::SetParameterSP($p['vp_conyu_fecha_ingreso'], 'varchar');//79

        
        parent::SetParameterSP($p['vp_garan_id_cli'], 'int');//80

        parent::SetParameterSP($p['vp_garan_ape_pate'], 'varchar');//81
        parent::SetParameterSP($p['vp_garan_ape_mate'], 'varchar');//82
        parent::SetParameterSP($p['vp_garan_ape_nombres'], 'varchar');//83
        parent::SetParameterSP($p['vp_garan_sexo'], 'varchar');//--------------------------------
        parent::SetParameterSP($p['vp_garan_doc_dni'], 'varchar');//84
        parent::SetParameterSP($p['vp_garan_doc_ce'], 'varchar');//85
        parent::SetParameterSP($p['vp_garan_doc_cip'], 'varchar');//86
        parent::SetParameterSP($p['vp_garan_doc_ruc'], 'varchar');//87
        parent::SetParameterSP($p['vp_garan_doc_cm'], 'varchar');//88
        parent::SetParameterSP($p['vp_garan_estado_civil'], 'varchar');//89
        parent::SetParameterSP($p['vp_garan_fecha_nac'], 'varchar');//90

        parent::SetParameterSP($p['vp_garan_id_tel'], 'int');//91
        parent::SetParameterSP($p['vp_garan_telefonos'], 'varchar');//92

        parent::SetParameterSP($p['vp_garan_domi_propio'], 'varchar');//93
        parent::SetParameterSP($p['vp_garan_domi_pagando'], 'varchar');//94
        parent::SetParameterSP($p['vp_garan_domi_alquilado'], 'varchar');//95
        parent::SetParameterSP($p['vp_garan_domi_familiar'], 'varchar');//96
        parent::SetParameterSP($p['vp_garan_profesion'], 'varchar');//97
        parent::SetParameterSP($p['vp_garan_img'], 'varchar');//98

        parent::SetParameterSP($p['vp_garan_id_lab'], 'int');//99
        parent::SetParameterSP($p['vp_garan_sueldo'], 'varchar');//100
        
        
        parent::SetParameterSP($p['vp_garan_centro_lab'], 'varchar');//101
        
        parent::SetParameterSP($p['vp_garan_antiguedad'], 'int');//102

        parent::SetParameterSP($p['vp_garan_cargo'], 'varchar');//103
        parent::SetParameterSP($p['vp_garan_fecha_ingreso'], 'varchar');//104

        parent::SetParameterSP($p['vp_garan_id_dir'], 'int');//105
        
        parent::SetParameterSP($p['vp_garan_dir_direccion'], 'varchar');//106
        parent::SetParameterSP($p['vp_garan_dir_numero'], 'varchar');//107
        parent::SetParameterSP($p['vp_garan_dir_mz'], 'varchar');//108
        parent::SetParameterSP($p['vp_garan_dir_lt'], 'varchar');//109
        parent::SetParameterSP($p['vp_garan_dir_dpto'], 'varchar');//110
        parent::SetParameterSP($p['vp_garan_dir_interior'], 'varchar');//111
        parent::SetParameterSP($p['vp_garan_dir_ubr'], 'varchar');//112
        parent::SetParameterSP($p['vp_garan_dir_ref'], 'varchar');//113
        
        parent::SetParameterSP($p['vp_garan_distrito'], 'varchar');//114

        parent::SetParameterSP($p['vp_garan_personal'], 'varchar');//115
        parent::SetParameterSP($p['vp_garan_personal_telf_1'], 'varchar');//116
        parent::SetParameterSP($p['vp_garan_personal_telf_2'], 'varchar');//117
        parent::SetParameterSP($p['vp_garan_comercial'], 'varchar');//118
        parent::SetParameterSP($p['vp_garan_comercial_telf_1'], 'varchar');//119
        parent::SetParameterSP($p['vp_garan_comercial_telf_2'], 'varchar');//120

        parent::SetParameterSP($p['vp_rese_resena'], 'varchar');//121

        parent::SetParameterSP($p['vp_sol_moneda'], 'varchar');//122
        parent::SetParameterSP($p['vp_sol_nro_cuota'], 'varchar');//123
        parent::SetParameterSP($p['vp_sol_fecha_1_letra'], 'varchar');//124
        parent::SetParameterSP($p['vp_sol_importe_aprobado'], 'varchar');//125

        parent::SetParameterSP($p['vp_mot_adqui_merca'], 'varchar');//126
        parent::SetParameterSP($p['vp_mot_ampliar_neg'], 'varchar');//127
        parent::SetParameterSP($p['vp_mot_compra_acc_insu'], 'varchar');//128
        parent::SetParameterSP($p['vp_mot_otros'], 'varchar');//129

        parent::SetParameterSP($p['vp_mot_fecha'], 'varchar');//130
        parent::SetParameterSP($p['vp_mot_cod_asesor'], 'varchar');//131
        parent::SetParameterSP($p['vp_mot_cod_agencia'], 'varchar');//132

        parent::SetParameterSP($p['vp_ana_serv_luz'], 'varchar');//133
        parent::SetParameterSP($p['vp_ana_serv_agua'], 'varchar');//134
        parent::SetParameterSP($p['vp_ana_serv_cable'], 'varchar');//135
        parent::SetParameterSP($p['vp_ana_serv_internet'], 'varchar');//136
        parent::SetParameterSP($p['vp_ana_descripcion'], 'varchar');//137
        parent::SetParameterSP($p['vp_ana_apro_aprobado'], 'varchar');//138
        parent::SetParameterSP($p['vp_ana_apro_asesor'], 'varchar');//139

        parent::SetParameterSP($p['vp_flag'], 'varchar');//140
        parent::SetParameterSP(USR_ID, 'int');//141

         echo '=>' . parent::getSql().'<br>'; exit();
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
