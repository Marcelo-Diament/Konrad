<?php
/**
 * Project:     GERENCIADOR DE SITES
 * File:        MOD_EMRPESA.PHP
 * 
 * @author Di�genes Konrad G�tz
 * @copyright G�tz & Konrad
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
	if (!$permissions['usrupdate']) $error='Voc� n�o tem permiss�es para executar esta a��o';
	else
	{
		if (strlen($introducao) > 300) $error = "A intru��o � limitada a 300 caracteres";
		
		$fp = fopen($file_introducao, 'w+');
		if (fwrite($fp, $introducao)) { $display = "Altera��es efetuadas com sucesso!"; }
		fclose($fp);

		$fp = fopen($file_empresa, 'w+');
		if (fwrite($fp, $empresa)) { $display = "Altera��es efetuadas com sucesso!"; }
		fclose($fp);
	}
}

$fp = @fopen($file_introducao, 'r');
if (!$fp) $error='Arquivo n�o encontrado';
else
{
	$itens = @fread($fp, filesize($file_introducao));
	if (!$itens) $error='N�o foram encontrados registros';
	else $_POST['introducao'] = $itens;
}

$fp = @fopen($file_empresa, 'r');
if (!$fp) $error='Arquivo n�o encontrado';
else
{
	$itens = @fread($fp, filesize($file_empresa));
	if (!$itens) $error='N�o foram encontrados registros';
	else $_POST['empresa'] = $itens;
}

$smarty->assign('display', $display);
$smarty->assign('error', $error);
$smarty->display('mod_empresa.htm');
?>