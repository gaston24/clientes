<?php
$cliente = $_GET['cliente'];

for($i=0;$i<count($_GET['dsn']);$i++){
	echo $cliente.' - '.$_GET['dsn'][$i].'<br>';
	
	$dsn_lakerbis = 'LOCALES';
	$user_lakerbis = 'sa';
	$pass_lakerbis = 'Axoft';
	
	$cid_lakerbis = odbc_connect($dsn_lakerbis, $user_lakerbis, $pass_lakerbis);
	if(!$cid_lakerbis){echo "</br>Imposible conectarse a la base de datos!</br>";}
	
	$sqlConsulta = "SELECT * FROM GVA14 WHERE COD_CLIENT = '$cliente'";
	
	$result=odbc_exec($cid_lakerbis,$sqlConsulta)or die(exit("Error en odbc_exec"));
	while($v=odbc_fetch_object($result)){
	
		$dsn = $_GET['dsn'][$i];
		$user = 'sa';
		$pass = 'Axoft1988';
		
		if(odbc_connect($dsn, $user, $pass)){

		
		
		$cid = @odbc_connect($dsn, $user, $pass);
		


		//DIRECCION

		$sqlDireccion = 
		"
		IF NOT EXISTS (SELECT * FROM [DIRECCION_ENTREGA] WHERE [COD_CLIENTE] = '$cliente')
		BEGIN 

			INSERT INTO [dbo].[DIRECCION_ENTREGA]
			([ID_DIRECCION_ENTREGA],[COD_DIRECCION_ENTREGA],[COD_CLIENTE],[DIRECCION],[COD_PROVINCIA],[LOCALIDAD],[HABITUAL],[CODIGO_POSTAL],[TELEFONO1],[TELEFONO2],[TOMA_IMPUESTO_HABITUAL]
			,[FILLER],[OBSERVACIONES],[AL_FIJ_IB3],[ALI_ADI_IB],[ALI_FIJ_IB],[IB_L],[IB_L3],[II_IB3],[LIB],[PORC_L],[HABILITADO],[HORARIO_ENTREGA],[ENTREGA_LUNES],[ENTREGA_MARTES]
			,[ENTREGA_MIERCOLES],[ENTREGA_JUEVES],[ENTREGA_VIERNES],[ENTREGA_SABADO],[ENTREGA_DOMINGO],[CONSIDERA_IVA_BASE_CALCULO_IIBB],[CONSIDERA_IVA_BASE_CALCULO_IIBB_ADIC],[WEB_ADDRESS_ID])
			VALUES
			(
			(SELECT MAX(ID_DIRECCION_ENTREGA)+1 FROM DIRECCION_ENTREGA), 'PRINCIPAL', '$cliente', '', '', '', 'S', '', '', '', 'N',
			'', '', 0, 0, 0, 0, 0, 0, 'N', 0, 'S', '',  'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 0
			)

		END
        ";

		@@odbc_exec($cid,$sqlDireccion)or die(exit("Error en odbc_exec"));
		

		//CODIGO

		$sqlInsertar = 
		"

		IF NOT EXISTS (SELECT * FROM [GVA14] WHERE [COD_CLIENT] = '$cliente')
		BEGIN 

		INSERT INTO [GVA14]
		([FILLER],[ADJUNTO],[ALI_NO_CAT],[BMP],[C_POSTAL],[CALLE],[CALLE2_ENV],[CLAUSULA],[CLAVE_IS],[COD_CLIENT],[COD_PROVIN],[COD_TRANSP],[COD_VENDED],
		[COD_ZONA],[COND_VTA],[CUIT],[CUMPLEANIO],[CUPO_CREDI],[DIR_COM],[DOMICILIO],[DTO_ENVIO],[DTO_LEGAL],[E_MAIL],[ENV_DOMIC],[ENV_LOCAL],[ENV_POSTAL],
		[ENV_PROV],[EXPORTA],[FECHA_ALTA],[FECHA_ANT],[FECHA_DESD],[FECHA_HAST],[FECHA_INHA],[FECHA_VTO],[GRUPO_EMPR],[ID_EXTERNO],[ID_INTERNO],[II_D],
		[II_L],[IVA_D],[IVA_L],[LOCALIDAD],[N_IMPUESTO],[N_ING_BRUT],[NOM_COM],[NRO_ENVIO],[NRO_LEGAL],[NRO_LISTA],[OBSERVACIO],[PARTIDOENV],[PERMITE_IS],
		[PISO_ENVIO],[PISO_LEGAL],[PORC_DESC],[PORC_EXCL],[PORC_RECAR],[PUNTAJE],[RAZON_SOCI],[SALDO_ANT],[SALDO_CC],[SALDO_DOC],[SALDO_D_UN],[SOBRE_II],
		[SOBRE_IVA],[TELEFONO_1],[TELEFONO_2],[TIPO],[TIPO_DOC],[ZONA_ENVIO],[FECHA_MODI],[EXP_SALDO],[N_PAGOELEC],[MON_CTE],[SAL_AN_UN],[SALDO_CC_U],
		[SUCUR_ORI],[LIMCRE_EN],[RG_1361],[CAL_DEB_IN],[PORCE_INT],[MON_MI_IN],[DIAS_MI_IN],[DESTINO_DE],[CLA_IMP_CL],[RECIBE_DE],[AUT_DE],[MAIL_DE],[WEB],
		[COD_RUBRO],[CTA_CLI],[CTO_CLI],[COD_GVA14],[CBU],[IDENTIF_AFIP],[IDIOMA_CTE],[DET_ARTIC],[INC_COMENT],[ID_GVA44_FEX],[ID_GVA44_NCEX],[ID_GVA44_NDEX],
		[CIUDAD],[CIUDAD_ENVIO],[APLICA_MORA],[ID_INTERES_POR_MORA],[PUBLICA_WEB_CLIENTES],[MAIL_NEXO],[AUTORIZADO_WEB_CLIENTES],[OBSERVACIONES],
		[RG_3572_EMPRESA_VINCULADA_CLIENTE],[RG_3572_TIPO_OPERACION_HABITUAL_VENTAS],[COD_GVA18],[COD_GVA24],[COD_GVA23],[COD_GVA05],[COD_GVA62],[COD_GVA151],
		[COBRA_LUNES],[COBRA_MARTES],[COBRA_MIERCOLES],[COBRA_JUEVES],[COBRA_VIERNES],[COBRA_SABADO],[COBRA_DOMINGO],[HORARIO_COBRANZA],[COMENTARIO_TYP_FAC],
		[COMENTARIO_TYP_ND],[COMENTARIO_TYP_NC],[TELEFONO_MOVIL],[ID_CATEGORIA_IVA],[ID_GVA14],[COD_GVA150],[TYP_FEX],[TYP_NCEX],[TYP_NDEX]
		,[COD_ACT_CNA25],[COD_GVA05_ENV],[COD_GVA18_ENV],[RG_3685_TIPO_OPERACION_VENTAS],[REQUIERE_INFORMACION_ADICIONAL],[INHABILITADO_NEXO_PEDIDOS],[ID_TIPO_DOCUMENTO_EXTERIOR]
		,[NUMERO_DOCUMENTO_EXTERIOR],[WEB_CLIENT_ID],[NRO_INSCR_RG1817],[CODIGO_AFINIDAD],[INHABILITADO_NEXO_COBRANZAS],[ID_TRA_ORIGEN_INFORMACION],[SEXO])
		VALUES
		(
		'', '',0,'','', '', '', 0, '', '$v->COD_CLIENT', '01', '**', '$v->COD_VENDED',
		'**', 1, '$v->CUIT', '1800-01-01', $v->CUPO_CREDI, '$v->DIR_COM', '$v->DOMICILIO', '', '', '$v->E_MAIL', '', '', '',
		'', 1, '$v->FECHA_ALTA', '1800-01-01', '1800-01-01', '1800-01-01', '1800-01-01', '1800-01-01', '$v->GRUPO_EMPR', '', '', 'N',
		'N', 'N', 'S', '99','$v->N_IMPUESTO', '', '$v->NOM_COM', 0, 0, $v->NRO_LISTA, '$v->OBSERVACIO', '', 1,
		0,0, $v->PORC_DESC, $v->PORC_EXCL, $v->PORC_RECAR, 0, '$v->RAZON_SOCI', 0, 0, 0, 0, 'N', 
		'N', '$v->TELEFONO_1','$v->TELEFONO_2', '$v->TIPO', '$v->TIPO_DOC', '', '1800-01-01', 0, '', 1, 0, 0, 
		1, 'N', 0, 0, 0, 0, 0, 'T', '', 1, 0, '', '', 
		'', 0, '', '$v->COD_GVA14', '', '', 'P', 'P', 'P', NULL, NULL, NULL, 
		'', '', 'N', NULL, 'N', NULL, 'N', NULL, 
		0, '', '01', '**', '$v->COD_VENDED', '**', NULL, NULL,
		'N', 'N', 'N', 'N', 'N', 'N', 'N', '', '',
		'', '', '', $v->ID_CATEGORIA_IVA, (SELECT MAX(ID_GVA14)+1 FROM GVA14), NULL, 'H', 'H', 'H', 
		'', NULL, NULL, 0, 'N', 'N', NULL, NULL, NULL, '', '', 'N', NULL, NULL
		)

		END

        ";

		@@odbc_exec($cid,$sqlInsertar)or die(exit("Error en odbc_exec"));


		//CLASIFICADOR

		
		$sqlClasificador = 
		"

		IF NOT EXISTS (SELECT * FROM GVA14ITC WHERE CODE = '$cliente')
		BEGIN 

		INSERT INTO GVA14ITC (CODE, IDFOLDER, CODEA)
		VALUES ('$cliente', (SELECT IDFOLDER FROM GVA14FLD WHERE DESCRIP = 'LOCALES'), '$cliente')

		END
		";

		@@odbc_exec($cid,$sqlClasificador)or die(exit("Error en odbc_exec"));

		}
	
	}
	
	
	
}


// echo "<script>setTimeout(function () {window.location.href= 'index.php';},1000);</script>";
header("Location: index.php");

?>