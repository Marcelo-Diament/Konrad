<?php
/**
 * Project:     GERENCIADOR DE SITES
 * File:        MOD_EMRPESA.PHP
 * 
 * @author Diѓgenes Konrad Gіtz
 * @copyright Gіtz & Konrad
 * @link http://www.gotz.com.br
 */

$introducao = (string) $_POST['introducao'];
$empresa    = (string) $_POST['empresa'];

$introducao = str_replace("\\", '', $introducao);
$empresa    = str_replace("\\", '', $empresa);

/**
 * VERIFICA AS PERMISSOES DE ACESSO
 */
$builder = new QueryBuilder();
$builder->setTable('vw_adminpermissions');
$builder->addColumn('usrinsert');
$builder->addColumn('usrupdate');
$builder->addColumn('usrdelete');
$builder->setWhere('usr_code='.$_SESSION['data']['usrcode'].' AND module_code='.$page);
$permissions = $conn->sql_fetchrow($conn->sql_query($builder->buildQuery()));

$file_introducao = "../media/introducao.dat";
$file_empresa    = "../media/empresa.dat";

/**
 * ATUALIZA O ARQUIVO
 */
if ($_POST['update'])
{
	if (!$permissions['usrupdate']) $error='Vocъ nуo tem permissѕes para executar esta aчуo';
	else
	{
		if (strlen($introducao) > 300) $error = "A intruчуo щ limitada a 300 caracteres";
		
		$fp = fopen($file_introducao, 'w+');
		if (fwrite($fp, $introducao)) { $display = "Alteraчѕes efetuadas com sucesso!"; }
		fclose($fp);

		$fp = fopen($file_empresa, 'w+');
		if (fwrite($fp, $empresa)) { $display = "Alteraчѕes efetuadas com sucesso!"; }
		fclose($fp);
	}
}

$fp = @fopen($file_introducao, 'r');
if (!$fp) $error='Arquivo nуo encontrado';
else
{
	$itens = @fread($fp, filesize($file_introducao));
	if (!$itens) $error='Nуo foram encontrados registros';
	else $_POST['introducao'] = $itens;
}

$fp = @fopen($file_empresa, 'r');
if (!$fp) $error='Arquivo nуo encontrado';
else
{
	$itens = @fread($fp, filesize($file_empresa));
	if (!$itens) $error='Nуo foram encontrados registros';
	else $_POST['empresa'] = $itens;
}

$smarty->assign('display', $display);
$smarty->assign('error', $error);
$smarty->display('mod_empresa.htm');
?>