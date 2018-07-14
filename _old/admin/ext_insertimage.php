<?php
/**
 * Project:     GERENCIADOR DE SITES
 * File:        EXT_INSERTIMAGE.PHP
 * 
 * @author Di�genes Konrad G�tz
 * @copyright G�tz & Konrad
 * @link http://www.gotz.com.br
 */

session_start();
if (!$_SESSION['data']) exit();

/**
 * ARQUIVOS BASE DO SISTEMA
 */
require_once('../configuration.php');            # Arquivo de configura��o do sistema
require_once('../smarty/Smarty.class.php');      # Gerenciador de tempaltes smarty
require_once('../classes/PackageImport.php');    # Fun��o para importa��o dos pacotes
require_once('functions/global.php');            # Pacote de fun��es

/**
 * FAZ O INCLUDE DOS PACOTES UTILIZADOS
 */
import('package.core.Exeption', ADMINCLASS);     # Faz o tratamento das excess�es
import('package.core.MyUpload', ADMINCLASS);     # Classe para envio de arquivos

$file = $_FILES['file'];

/**
 * FAZ O UPLOAD DA IMAGEM
 */
if ($_POST['option'] == 1)
{
	if ($file['name'])
	{
		$upload = new MyUpload($file['name'], $file['tmp_name'], $file['size']);
		$upload->setDir('../'.UPLOADDIR);
		$upload->cls_arr_ext_accepted = array(".gif", ".jpg", ".jpeg", ".png", ".bmp");
		$upload->cls_max_filesize = 1048576;

		if (!$upload->checkFileExists()) $error='O arquivo j� existe';
		elseif (!$upload->checkExtension()) $error='Extens�o inv�lida. Formatos aceitos (.gif, .jpg, .jpeg, .png, .bmp)';
		elseif (!$upload->checkSize()) $error='Tamanho do arquivo inv�lido';
		else
		{
			$upload->move();
			$_POST['uploaded'] = $file['name'];
		}
	}
	else $error='Selecione um arquivo';
}

/**
 * VARRE O DIRET�RIO EM BUSCA DE ARQUIVOS
 */
$rdir  = opendir('../'.UPLOADDIR);
while (false !== ($filename = readdir($rdir)))
{
	if ($_POST['option'] == 2 && $filename == $_POST['url'])
	{
		if (!unlink('../'.UPLOADDIR.$filename)) $error='Ocorreu um erro ao excluir o arquivo';
		else $display='Arquvo exclu�do com sucesso';
	}
	elseif ($filename != "." && $filename != "..") $arrFiles[]['filename'] = $filename;
}

/**
 * CONFIGURA��ES GLOBAIS DO SMARTY
 */
$smarty = new Smarty();
$smarty->template_dir    = 'templates';
$smarty->compile_dir     = 'compiled';
$smarty->left_delimiter  = '{{';
$smarty->right_delimiter = '}}';
$smarty->compile_check   = true;

$smarty->assign('display', $display);
$smarty->assign('error', $error);
$smarty->assign('permissions', $permissions);
$smarty->assign('files', $arrFiles);
$smarty->assign('uploaddir', ROOTFOLDER."/".UPLOADDIR);
$smarty->display('ext_insertimage.htm');
$smarty->clear_all_assign();
?>