<?php

//var_dump($_GET);


$codClient = $_GET['codClient'];
$nombre = $_GET['nombre'];
$dni = $_GET['dni'];
if(!isset($_GET['porcDesc'])){
	$porcDesc = 0;
}else{
	$porcDesc = $_GET['porcDesc'];
}


if(!isset($_GET['dni'])){
	$dni = 0;
}else{
	$dni = $_GET['dni'];
}

if(!isset($_GET['nroSucurs'])){
	$nroSucurs = '';
}else{
	$nroSucurs = $_GET['nroSucurs'];
}

$hoy = date("Y-m-d");
	
$dsn = 'LOCALES';
$user = 'sa';
$pass = 'Axoft';

$sqlDireccion = 
"
INSERT INTO [dbo].[DIRECCION_ENTREGA]
([ID_DIRECCION_ENTREGA],[COD_DIRECCION_ENTREGA],[COD_CLIENTE],[DIRECCION],[COD_PROVINCIA],[LOCALIDAD],[HABITUAL],[CODIGO_POSTAL],[TELEFONO1],[TELEFONO2],[TOMA_IMPUESTO_HABITUAL]
,[FILLER],[OBSERVACIONES],[AL_FIJ_IB3],[ALI_ADI_IB],[ALI_FIJ_IB],[IB_L],[IB_L3],[II_IB3],[LIB],[PORC_L],[HABILITADO],[HORARIO_ENTREGA],[ENTREGA_LUNES],[ENTREGA_MARTES]
,[ENTREGA_MIERCOLES],[ENTREGA_JUEVES],[ENTREGA_VIERNES],[ENTREGA_SABADO],[ENTREGA_DOMINGO],[CONSIDERA_IVA_BASE_CALCULO_IIBB],[CONSIDERA_IVA_BASE_CALCULO_IIBB_ADIC],[WEB_ADDRESS_ID])
VALUES
(
(SELECT MAX(ID_DIRECCION_ENTREGA)+1 FROM DIRECCION_ENTREGA), 'PRINCIPAL', '$codClient', '', '', '', 'S', '', '', '', 'N',
'', '', 0, 0, 0, 0, 0, 0, 'N', 0, 'S', '',  'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 0
)
";
$cid = odbc_connect($dsn, $user, $pass);
odbc_exec($cid,$sqlDireccion)or die(exit("Error en odbc_exec"));



$sqlInsertar = 
"
SET DATEFORMAT YMD

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
'', '',0,'','', '', '', 0, '', '$codClient', '01', '**', 'ZZ',
'**', 1, '$dni', '1800-01-01', 10000, '', '', '', '', '', '', '', '',
'', 1, '$hoy', '1800-01-01', '1800-01-01', '1800-01-01', '1800-01-01', '1800-01-01', '', '', '', 'N',
'N', 'N', 'S', '99','$nroSucurs', '', '$nombre', 0, 0, 20, 'CARGADO POR APP WEB', '', 1,
0,0, $porcDesc, 0, 0, 0, '$nombre', 0, 0, 0, 0, 'N', 
'N', '','', '', '99', '', '1800-01-01', 0, '', 1, 0, 0, 
1, 'N', 0, 0, 0, 0, 0, 'T', '', 1, 0, '', '', 
'', 0, '', '$codClient', '', '', 'P', 'P', 'P', NULL, NULL, NULL, 
'', '', 'N', NULL, 'N', NULL, 'N', NULL, 
0, '', '01', '**', 'ZZ', '**', NULL, NULL,
'N', 'N', 'N', 'N', 'N', 'N', 'N', '', '',
'', '', '', 2, (SELECT MAX(ID_GVA14)+1 FROM GVA14), NULL, 'H', 'H', 'H', 
'', NULL, NULL, 0, 'N', 'N', NULL, NULL, NULL, '', '', 'N', NULL, NULL
)
";
$cid = odbc_connect($dsn, $user, $pass);
odbc_exec($cid,$sqlInsertar)or die(exit("Error en odbc_exec"));
	
$sqlClasificador = 
"
INSERT INTO GVA14ITC (CODE, IDFOLDER, CODEA)
VALUES ('$codClient', (SELECT IDFOLDER FROM GVA14FLD WHERE DESCRIP = 'LOCALES'), '$codClient')
";
$cid = odbc_connect($dsn, $user, $pass);
odbc_exec($cid,$sqlClasificador)or die(exit("Error en odbc_exec"));


echo "<script>setTimeout(function () {window.location.href= 'index.php';},1000);</script>";

?>