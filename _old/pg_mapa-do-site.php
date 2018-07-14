<?php
/**
 * @copyright Konrad - Sistemas de Competitividade
 * @author Diógenes Konrad Götz
 * @link   www.gotz.com.br
 */

/**
 * MONTA O MAPA DO SITE
 */

$mapa = array();


array_push($mapa, array(submenu=>0, name=>'A Empresa', url=>'a-empresa'));
array_push($mapa, array(submenu=>0, name=>'Clientes', url=>'clientes'));

function submenus($root, $key, $url)
{
	global $conn, $mapa;
	
	$builder = new QueryBuilder();
	$builder->setTable('mod_conteudos');
	$builder->addColumn('code');
	$builder->addColumn('title');
	$builder->addColumn('parse_url(title)AS url');
	$builder->setWhere("root_content = {$root}");
	$builder->setOrderBy('code');
	$itens = $conn->sql_fetchrowset($conn->sql_query($builder->buildQuery()));

	if ($conn->sql_numrows())
	{
		for ($i=0; $i<count($itens); $i++)
		{
			array_push($mapa, array(submenu=>$key, name=>$itens[$i]['title'], url=>"{$url}/{$itens[$i]['url']}"));
			submenus($itens[$i]['code'], count($mapa), "{$url}/{$itens[$i]['url']}");
		}
	}
}

$builder = new QueryBuilder();
$builder->setTable('mod_conteudos');
$builder->addColumn('code');
$builder->addColumn('title');
$builder->addColumn('parse_url(title)AS url');
$builder->setWhere("root_content IS NULL");
$builder->setOrderBy('code');
$menus = $conn->sql_fetchrowset($conn->sql_query($builder->buildQuery()));

for ($i=0; $i<count($menus); $i++)
{
	array_push($mapa, array(submenu=>0, name=>$menus[$i]['title'], url=>"conteudo/{$menus[$i]['url']}"));
	submenus($menus[$i]['code'], count($mapa), "conteudo/{$menus[$i]['url']}");
}

array_push($mapa, array(submenu=>0, name=>'Agenda de cursos', url=>'agenda-de-cursos'));
array_push($mapa, array(submenu=>0, name=>'Artigos', url=>'artigos'));
array_push($mapa, array(submenu=>0, name=>'Contato', url=>'contato'));

$smarty->assign('mapa', $mapa);
$smarty->assign('page', 'mapa-do-site.htm');
?>