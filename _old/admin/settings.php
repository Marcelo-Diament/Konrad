<?php
/**
 * Project:     GERENCIADOR DE SITES
 * File:        SETTINGS.PHP
 * 
 * @author Di�genes Konrad G�tz
 * @copyright G�tz & Konrad
 * @link http://www.gotz.com.br
 */

import('package.core.PasswordValidator', ADMINCLASS); # Faz a valida��o de senhas

$name      = (string) $_POST['name'];
$email     = (string) $_POST['email'];
$user      = (string) $_POST['user'];
$password  = (string) $_POST['password'];
$rpassword = (string) $_POST['rpassword'];

/**
 * ATUALIZA O DADOS DE USU�RIO
 */
if ($_POST['update'])
{
	$Validpass = new PasswordValidator($password);
	if (!$name) $error='Preencha o campo nome';
	elseif (!$email) $error='Preencha o campo e-mail';
	elseif (!defaultValid::email($email)) $error='E-mail inv�lido';
	else
	{
		if ($password)
		{
			if (!$Validpass->validate_length(1, 15)) $error='Senha inv�lida';
			elseif (!$Validpass->validate_whitespace()) $error='Senha n�o pode conter espa�os em branco';
			elseif ($password != $rpassword) $error='A senhas digitadas n�o conferem';
		}
		if (!$errors)
		{
			$enabled = ($enabled)?1:0;
			$builder = new QueryBuilder('update');
			$builder->setTable('users');
			$builder->addColumn('name');
			if ($password) $builder->addColumn('password');
			$builder->addColumn('email');
			$builder->addValue("'{$name}'");
			if ($password) $builder->addValue("'".sha1($password)."'");
			$builder->addValue("'{$email}'");
			$builder->setWhere('code='.$_SESSION['data']['usrcode']);
			if (!$conn->sql_query($builder->buildQuery())) $error='Ocorreu um erro ao tentar atualizar o usu�rio';
			else $display='Usu�rio atualizado com sucesso';
		}
	}
}
else
{
	/**
	 * SELECIONA O USU�RIO
	 */
	$builder = new QueryBuilder();
	$builder->setTable('users');
	$builder->addColumn('name');
	$builder->addColumn('email');
	$builder->addColumn('username');
	$builder->setWhere("code={$_SESSION['data']['usrcode']}");
	$tmp = $conn->sql_fetchrow($conn->sql_query($builder->buildQuery()));
	if (!$conn->sql_numrows())
	{
		$error='Usu�rio n�o encontrado';
		$permissions['usrupdate'] = false;
	}
	else
	{
		$_POST['name']  = $tmp['name'];
		$_POST['email'] = $tmp['email'];
		$_POST['user']  = $tmp['username'];
	}
}

$smarty->assign('display', $display);
$smarty->assign('error', $error);
$smarty->display('settings.htm');
?>