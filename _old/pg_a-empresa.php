<?php
/**
 * @copyright Konrad - Sistemas de Competitividade
 * @author Diógenes Konrad Götz
 * @link   www.gotz.com.br
 */

$arquivo = 'media/empresa.dat';
$fp = @fopen($arquivo, 'r');
if ($fp)
{
	$content = @fread($fp, filesize($arquivo));
	if ($content) { $smarty->assign('content', $content); }
}

$smarty->assign('page', 'a-empresa.htm');
?>