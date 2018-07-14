<?php
/**
 * Project:     GERENCIADOR DE SITES
 * File:        MOD_USERS.PHP
 * 
 * @author Diógenes Konrad Götz
 * @copyright Götz & Konrad
 * @link http://www.gotz.com.br
 */

import('package.core.PasswordValidator', ADMINCLASS); # Faz a validação de senhas

$name        = (string) $_POST['name'];
$email       = (string) trim($_POST['email']);
$user        = (string) trim($_POST['user']);
$password    = (string) trim($_POST['password']);
$rpassword   = (string) trim($_POST['rpassword']);
$enabled     = (int) $_POST['enabled'];

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

/**
 * REMOVE O USUARIO
 */
if ($_POST['user_code'])
{
	if (!$permissions['usrdelete'] || $_POST['user_code'] == 1) $error='Você não tem permissões para executar esta ação';
	else
	{
		$builder = new QueryBuilder('delete');
		$builder->setTable('users');
		$builder->setWhere("code={$_POST['user_code']}");
		if ($conn->sql_query($builder->buildQuery())) $display='Usuario excluído com sucesso';
		else $error='Ocorreu um erro ao tentar excluir o usuário';
	}
}

/**
 * ADICIONA UM NOVO USUÁRIO
 */
if ($_POST['salvar'] && !$_GET['option'])
{
	if (!$permissions['usrinsert']) $error='Você não tem permissões para executar esta ação';
	else
	{
		$Validpass = new PasswordValidator($password);

		if (!$name) $error='Preencha o campo nome';
		elseif (!$email) $error='Preencha o campo e-mail';
		elseif (!defaultValid::email($email)) $error='E-mail inválido';
		elseif (!$user) $error='Preencha o campo usuario';
		elseif (!$password) $error='Preencha o campo senha';
		elseif (!$Validpass->validate_length(1, 15)) $error='Senha inválida';
		elseif (!$Validpass->validate_whitespace()) $error='Senha não pode conter espaços em branco';
		else
		{
			/**
			 * VERIFICA SE O USUÁRIO JA EXISTE
			 */
			$builder = new QueryBuilder();
			$builder->setTable('users');
			$builder->addColumn('code');
			$builder->setWhere("username='{$user}'");
			$conn->sql_query($builder->buildQuery());
			if ($conn->sql_numrows()) $error='Nome de usuário já cadastrado!';
			else
			{
				$builder = new QueryBuilder('insert');
				$builder->setTable('users');
				$builder->addColumn('name');
				$builder->addColumn('username');
				$builder->addColumn('password');
				$builder->addColumn('email');
				$builder->addColumn('enabled');
				$builder->addValue("'".$name."'");
				$builder->addValue("'".$user."'");
				$builder->addValue("'".sha1($password)."'");
				$builder->addValue("'".$email."'");
				$builder->addValue($enabled);
				if (!$conn->sql_query($builder->buildQuery())) $error='Ocorreu um erro ao tentar adicionar o usuário';

				/**
				 * SELECIONA O USUARIO
				 */
				$builder = new QueryBuilder();
				$builder->setTable('users');
				$builder->addColumn('code');
				$builder->setWhere("username='".$user."' AND email='".$email."'");
				$tmp = $conn->sql_fetchrow($conn->sql_query($builder->buildQuery()));

				$url = SecureURL::processURL("?page={$page}&user_code={$tmp['code']}&option=1");
				header("Location:{$url}");
				unset($_POST);
			}
		}
	}
}

/**
 * ATUALIZA O USUÁRIO
 */
if ($_GET['user_code'] && !$_GET['option'])
{
	if ($_POST['update'])
	{
		if (!$permissions['usrupdate']) $error='Você não tem permissões para executar esta ação';
		elseif ($_SESSION['data']['usrcode'] != 1 && $_GET['user_code'] == 1) $error='Somente o administrador pode alterar estes dados';
		else
		{
			$Validpass = new PasswordValidator($password);

			if (!$name) $error='Preencha o campo nome';
			elseif (!$email) $error='Preencha o campo e-mail';
			elseif (!defaultValid::email($email)) $error='E-mail inválido';
			else
			{
				if ($password)
				{
					if (!$Validpass->validate_length(1, 15)) $error='Senha inválida';
					elseif (!$Validpass->validate_whitespace()) $error='Senha não pode conter espaços em branco';
					elseif ($password != $rpassword) $error='A senhas digitadas não conferem';
				}
				if (!$errors)
				{
					$enabled = ($enabled)?1:0;
					$builder = new QueryBuilder('update');
					$builder->setTable('users');
					$builder->addColumn('name');
					if ($password) $builder->addColumn('password');
					$builder->addColumn('email');
					$builder->addColumn('enabled');
					$builder->addValue("'".$name."'");
					if ($password) $builder->addValue("'".sha1($password)."'");
					$builder->addValue("'".$email."'");
					$builder->addValue($enabled);
					$builder->setWhere('code='.$_GET['user_code']);
					if (!$conn->sql_query($builder->buildQuery())) $error='Ocorreu um erro ao tentar atualizar o usuário';
					else $display='Usuário atualizado com sucesso';
				}
			}
		}
	}
	else
	{
		/**
		 * SELECIONA O USUÁRIO
		 */
		$builder = new QueryBuilder();
		$builder->setTable('users');
		$builder->addColumn('name');
		$builder->addColumn('email');
		$builder->addColumn('username');
		$builder->addColumn('enabled');
		$builder->setWhere('code='.$_GET['user_code']);
		$tmp = $conn->sql_fetchrow($conn->sql_query($builder->buildQuery()));
		if (!$conn->sql_numrows())
		{
			$error='Usuário não encontrado';
			$permissions['usrupdate'] = false;
		}
		else
		{
			$_POST['name']     = $tmp['name'];
			$_POST['email']    = $tmp['email'];
			$_POST['user']     = $tmp['username'];
			$_POST['enabled']  = $tmp['enabled'];
		}
	}
}

/**
 * SETA AS PERMISSÕES
 */
if ($_GET['user_code'] && $_GET['option'])
{
	/**
	 * SELECIONA OS MÓDULOS
	 */
	$builder = new QueryBuilder();
	$builder->setTable('modules');
	$builder->addColumn('code');
	$builder->addColumn('name');
	$builder->setOrderBy('modorder');
	$modules = $conn->sql_fetchrowset($conn->sql_query($builder->buildQuery()));

	if ($_POST['salvar'])
	{
		foreach ($_POST['per'] as $key => $value) $arrKeys[] = $key;
		$builder = new QueryBuilder('delete');
		$builder->setTable('usr_permissions');
		$builder->setWhere('module_code<>'. implode(' AND module_code<>', $arrKeys).' AND usr_code='.$_GET['user_code']);
		$conn->sql_query($builder->buildQuery());

		foreach ($_POST['per'] as $key => $value)
		{
			$builder = new QueryBuilder();
			$builder->setTable('usr_permissions');
			$builder->addColumn('code');
			$builder->addColumn('usrinsert');
			$builder->addColumn('usrupdate');
			$builder->addColumn('usrdelete');
			$builder->setWhere('module_code='.$key.' AND usr_code='.$_GET['user_code']);
			$tmp = $conn->sql_fetchrow($conn->sql_query($builder->buildQuery()));

			$insert = ($value[INSERT])?1:0;
			$update = ($value[UPDATE])?1:0;
			$delete = ($value[DELETE])?1:0;

			if ($conn->sql_numrows())
			{
				if ($tmp['usrinsert'] != $insert || $tmp['usrupdate'] != $update || $tmp['usrdelete'] != $delete)
				{
					$builder = new QueryBuilder('update');
					$builder->setTable('usr_permissions');
					$builder->addColumn('usrinsert');
					$builder->addColumn('usrupdate');
					$builder->addColumn('usrdelete');
					$builder->addValue($insert);
					$builder->addValue($update);
					$builder->addValue($delete);
					$builder->setWhere('code='.$tmp['code'].' AND usr_code='.$_GET['user_code']);
					$conn->sql_query($builder->buildQuery());
				}
			}
			else
			{
				$builder = new QueryBuilder('insert');
				$builder->setTable('usr_permissions');
				$builder->addColumn('module_code');
				$builder->addColumn('usr_code');
				$builder->addColumn('usrinsert');
				$builder->addColumn('usrupdate');
				$builder->addColumn('usrdelete');
				$builder->addValue($key);
				$builder->addValue($_GET['user_code']);
				$builder->addValue($insert);
				$builder->addValue($update);
				$builder->addValue($delete);
				$conn->sql_query($builder->buildQuery());
			}
		}
	}

	/**
	 * SELECIONA AS PERMISSÕES DO USUARIO
	 */
	$builder = new QueryBuilder();
	$builder->setTable('usr_permissions');
	$builder->addColumn('code');
	$builder->addColumn('module_code');
	$builder->addColumn('usrinsert');
	$builder->addColumn('usrupdate');
	$builder->addColumn('usrdelete');
	$builder->setWhere('usr_code='.$_GET['user_code']);
	$tmp = $conn->sql_fetchrowset($conn->sql_query($builder->buildQuery()));

	$mpermissions =array();
	for ($i=0; $i<count($tmp); $i++)
	{
		$mpermissions[$tmp[$i]['module_code']]['code']   = $tmp[$i]['code'];
		$mpermissions[$tmp[$i]['module_code']]['insert'] = $tmp[$i]['usrinsert'];
		$mpermissions[$tmp[$i]['module_code']]['update'] = $tmp[$i]['usrupdate'];
		$mpermissions[$tmp[$i]['module_code']]['delete'] = $tmp[$i]['usrdelete'];
	}
}

/**
 * SELECIONA OS USUARIOS CADASTRADOS
 */
$builder = new QueryBuilder();
$builder->setTable('users');
$builder->addColumn('code');
$builder->addColumn('name');
$builder->addColumn('enabled');
$builder->setOrderBy('code');
$users = $conn->sql_fetchrowset($conn->sql_query($builder->buildQuery()));

/**
 * VERIFICA SE O USUÁRIO POSSUI PERMISSOES DE ACESSO
 */
for ($i=0; $i<count($users); $i++)
{
	$builder = new QueryBuilder();
	$builder->setTable('usr_permissions');
	$builder->addColumn('code');
	$builder->setWhere('usr_code='.$users[$i]['code']);
	$conn->sql_query($builder->buildQuery());
	if ($conn->sql_numrows()) $users[$i]['permissions'] = true;
}

$smarty->assign('display', $display);
$smarty->assign('error', $error);
$smarty->assign('permissions', $permissions);
$smarty->assign('users', $users);
$smarty->assign('modules', $modules);
$smarty->assign('mpermissions', $mpermissions);
$smarty->display('mod_users.htm');
?>