<?php
/**
 * @copyright Konrad - Sistemas de Competitividade
 * @author Di�genes Konrad G�tz
 * @link   www.gotz.com.br
 */

require_once('configuration.php');          # Arquivo de configura��o do sistema
#require_once('admin/functions/global.php'); # Pacote de fun��es
require_once(CLASSDIR.'PackageImport.php'); # Fun��o para importa��o dos pacotes
require_once(SMARTYDIR.'Smarty.class.php'); # Classe para gerenciamento de templates

/**
 * FAZ O INCLUDE DOS PACOTES UTILIZADOS
 */
import('package.core.Exeption');          # Faz o tratamento das excess�es
import('package.sql.postgres7');          # Classe para conex�o com o sql server
import('package.sql.QueryBuilder');       # Construtor de express�es sql
import('package.core.defaultValid');      # Valida��es em geral
import('package.mail.phpgmailer');        # Envio de e-mails

$conn = new sql_db(DBHOST, DBUSER, DBPASS, DBNAME, DBPER); # Abre a conex�o com o banco de dados

$getKey = explode("/", $_GET['key']);
array_pop($getKey);

$urls = array(
	'home'                     => 'home.php',
	'conteudo'                 => 'pg_conteudos.php',
	'artigos'                  => 'pg_artigos.php',
	'a-empresa'                => 'pg_a-empresa.php',
	'clientes'                 => 'pg_clientes.php',
	'contato'                  => 'pg_contato.php',
	'mapa-do-site'             => 'pg_mapa-do-site.php',
	'agenda-de-treinamentos'   => 'pg_agenda-de-treinamentos.php',
	'agenda-de-workshops'      => 'pg_agenda-de-workshops.php',
	'fazer-reserva-curso'      => 'pg_fazer-reserva-curso.php',
	'fazer-reserva-workshop'   => 'pg_fazer-reserva-workshop.php',
	'solicitar-informacoes'    => 'pg_solicitar-informacoes.php'
);

$_internal = array(
);

/**
 * CONFIGURA��ES DO SMARTY
 */
$smarty = new Smarty();
$smarty->template_dir    = 'templates';
$smarty->compile_dir     = 'compiled';
$smarty->left_delimiter  = '{{';
$smarty->right_delimiter = '}}';
$smarty->compile_check   = true;
$smarty->assign('rootfolder', ROOTFOLDER);

if (!$getKey[0] || $page=='home') {
	include_once($urls['home']);
}
elseif (!array_key_exists($getKey[0], $urls)){
	
	if (!array_key_exists($getKey[0], $_internal)) {
		header("location: ".ROOTFOLDER);
		exit();
	}
	else
	{
		foreach ($_internal as $key => $value) {
			if ($key == $getKey[0]){
				@include_once($value);
				exit();
			}
		}
	}
}
else {
	foreach ($urls as $key => $value) {
		if ($key == $getKey[0]){
			if (file_exists($value)) {
				include_once($value);
			}
			else {
				$smarty->assign('report', 'A p�gina solicitada n�o est� dispon�vel!');
				$smarty->display('report.htm');
				exit();
			}
		}
	}
}

$smarty->assign('getKey', $getKey);
$smarty->display('index.htm');
$smarty->clear_all_assign();
$conn->sql_close();
?>