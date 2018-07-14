<?php
/**
 * @copyright Konrad - Sistemas de Competitividade
 * @author Diѓgenes Konrad Gіtz
 * @link   www.gotz.com.br
 */

require_once('configuration.php');          # Arquivo de configuraчуo do sistema
#require_once('admin/functions/global.php'); # Pacote de funчѕes
require_once(CLASSDIR.'PackageImport.php'); # Funчуo para importaчуo dos pacotes
require_once(SMARTYDIR.'Smarty.class.php'); # Classe para gerenciamento de templates

/**
 * FAZ O INCLUDE DOS PACOTES UTILIZADOS
 */
import('package.core.Exeption');          # Faz o tratamento das excessѕes
import('package.sql.postgres7');          # Classe para conexуo com o sql server
import('package.sql.QueryBuilder');       # Construtor de expressѕes sql
import('package.core.defaultValid');      # Validaчѕes em geral
import('package.mail.phpgmailer');        # Envio de e-mails

$conn = new sql_db(DBHOST, DBUSER, DBPASS, DBNAME, DBPER); # Abre a conexуo com o banco de dados

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
 * CONFIGURAЧеES DO SMARTY
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
				$smarty->assign('report', 'A pсgina solicitada nуo estс disponэvel!');
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