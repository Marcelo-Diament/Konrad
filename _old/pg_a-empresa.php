<?php
/**
 * @copyright Konrad - Sistemas de Competitividade
 * @author Di�genes Konrad G�tz
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