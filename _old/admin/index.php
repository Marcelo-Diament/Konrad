<?php
/**
 * Project:     GERENCIADOR DE SITES
 * File:        INDEX.PHP
 * 
 * @author Di�genes Konrad G�tz
 * @copyright G�tz & Konrad
 * @link http://www.gotz.com.br
 */

#if (!$_SERVER['HTTPS']) { header('location: https://konrad.websiteseguro.com/admin/'); }

session_start();

/**
 * ARQUIVOS BASE DO SISTEMA
 */
require_once('../configuration.php');            # Arquivo de configura��o do sistema
require_once('../smarty/Smarty.class.php');      # Gerenciador de tempaltes smarty
require_once('../classes/PackageImport.php');    # Fun��o para importa��o dos pacotes
require_once('functions/global.php');            # Pacote de fun��es

import('package.core.Exeption', ADMINCLASS);     # Faz o tratamento das excess�es
import('package.sql.postgres7', ADMINCLASS);     # Classe para conex�o com o sql server
import('package.sql.QueryBuilder', ADMINCLASS);  # Construtor de express�es sql
import('package.core.secureURL', ADMINCLASS);    # Criptografa os dados via GET
import('package.core.defaultValid', ADMINCLASS); # Valida��es em geral

SecureURL::setFilterIncludeOption(true);
SecureURL::Initialize(new URL_Encoder_Base64());

$conn = new sql_db(DBHOST, DBUSER, DBPASS, DBNAME, DBPER); # Abre a conex�o com o banco de dados

/**
 * CONFIGURA��ES GLOBAIS DO SMARTY
 */
$smarty = new Smarty();
$smarty->template_dir    = 'templates';
$smarty->compile_dir     = 'compiled';
$smarty->left_delimiter  = '{{';
$smarty->right_delimiter = '}}';
$smarty->compile_check   = true;
$smarty->assign('modules', $modules);

if (!$_SESSION['data'])
{
	$user    = (string) (string) $_POST['user'] = str_replace("\'", "", trim($_POST['user']));
	$pass    = (string) $_POST['pass'] = str_replace("\'", "", trim($_POST['pass']));

	$smarty->assign('error',"Informe seu nome de usu�rio e senha!");

	if ($_POST['send'])
	{
		if ($user && $pass)
		{
			$builder = new QueryBuilder();
			$builder->setTable('users');
			$builder->addColumn('code');
			$builder->addColumn('last_access');
			$builder->addColumn('ip');
			$builder->setWhere("username='{$user}' AND password='".sha1($pass)."' AND enabled=1");
			$tmp = $conn->sql_fetchrow($conn->sql_query($builder->buildQuery()));
			if ($conn->sql_numrows())
			{
				$builder = new QueryBuilder();
				$builder->setTable('vw_adminpermissions');
				$builder->addColumn('code');
				$builder->setWhere("usr_code={$tmp['code']}");
				$conn->sql_query($builder->buildQuery());
				if ($conn->sql_numrows())
				{
					$builder = new QueryBuilder('update');
					$builder->setTable('users');
					$builder->addColumn('last_access');
					$builder->addColumn('ip');
					$builder->addValue('now()');
					$builder->addValue("'{$_SERVER['REMOTE_ADDR']}'");
					$builder->setWhere("code={$tmp['code']}");
					$conn->sql_query($builder->buildQuery());

					$_SESSION['data']['usrcode']    = $tmp['code'];
					$_SESSION['data']['lastaccess'] = $tmp['last_access'];
					$_SESSION['data']['ip']         = $tmp['ip'];

					header('Location: .');
				}
				else $smarty->assign('error',"Voc� n�o tem permissoes de acesso!");
			}
			else $smarty->assign('error',"Nome de usu�rio ou senha inv�lidos!");
		}
	}

	$smarty->display('login.htm');
}
else
{
	$page = (string) $_GET['page'];

	$builder = new QueryBuilder();
	$builder->setTable('vw_adminpermissions');
	$builder->addColumn('module_code');
	$builder->addColumn('name');
	$builder->addColumn('icon');
	$builder->addColumn('module');
	$builder->setWhere("usr_code={$_SESSION['data']['usrcode']}");
	$builder->setOrderBy('modorder');
	$modules = $conn->sql_fetchrowset($conn->sql_query($builder->buildQuery()));

	array_push($modules, array(module_code=>'settings', name=>'Configura��es', icon=>'settings.jpg', module=>'settings.php'));

	for ($i=0; $i<count($modules); $i++) {
		$urls[$modules[$i]['module_code']] = $modules[$i]['module'];
	}
	$smarty->assign('modules', $modules);

	$_internal = array(
		'logoff' => 'logoff.php'
	);

	if (!$page) {
		$smarty->display('home.htm');
	}
	elseif (!array_key_exists($page, $urls)){

		if (!array_key_exists($page, $_internal)) {
			$smarty->assign('report', 'A p�gina solicitada n�o existe!');
			$smarty->display('report.htm');
			exit();
		}
		else
		{
			foreach ($_internal as $key => $value) {
				if ($key == $page){
					@include_once($value);
					exit();
				}
			}
		}
	}
	else {
		foreach ($urls as $key => $value) {
			if ($key == $page){
				if (file_exists($value)) {
					include_once($value);
				}
				else {
					$smarty->assign('report', 'A p�gina solicitada n�o esta dispon�vel!');
					$smarty->display('report.htm');
					exit();
				}
			}
		}
	}
}

$smarty->clear_all_assign();
$conn->sql_close();
?>