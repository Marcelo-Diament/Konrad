<?php
/**
 * Project:     GERENCIADOR DE SITES
 * File:        SETTINGS.PHP
 * 
 * @author Diуgenes Konrad Gцtz
 * @copyright Gцtz & Konrad
 * @link http://www.gotz.com.br
 */

import('package.core.PasswordValidator', ADMINCLASS); # Faz a validaзгo de senhas

$name      = (string) $_POST['name'];
$email     = (string) $_POST['email'];
$user      = (string) $_POST['user'];
$password  = (string) $_POST['password'];
$rpassword = (string) $_POST['rpassword'];

/**
 * ATUALIZA O DADOS DE USUБRIO
 */
if ($_POST['update'])
{
	$Validpass = new PasswordValidator($password);
	if (!$name) $error='Preencha o campo nome';
	elseif (!$email) $error='Preencha o campo e-mail';
	elseif (!defaultValid::email($email)) $error='E-mail invбlido';
	else
	{
		if ($password)
		{
			if (!$Validpass->validate_length(1, 15)) $error='Senha invбlida';
			elseif (!$Validpass->validate_whitespace()) $error='Senha nгo pode conter espaзos em branco';
			elseif ($password != $rpassword) $error='A senhas digitadas nгo conferem';
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
			if (!$conn->sql_query($builder->buildQuery())) $error='Ocorreu um erro ao tentar atualizar o usuбrio';
			else $display='Usuбrio atualizado com sucesso';
		}
	}
}
else
{
	/**
	 * SELECIONA O USUБRIO
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
		$error='Usuбrio nгo encontrado';
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