<?php
/**
 * @copyright Konrad - Sistemas de Competitividade
 * @author Diógenes Konrad Götz
 * @link   www.gotz.com.br
 */

define(ROWS, 20);

if ($getKey[1])
{
	/**
	 * SELECIONA O ARTIGO
	 */
	$builder = new QueryBuilder();
	$builder->setTable('mod_artigos');
	$builder->addColumn('title');
	$builder->addColumn('date');
	$builder->addColumn('description');
	$builder->setWhere("parse_url(title)='{$getKey[1]}'");
	$artigo = $conn->sql_fetchrow($conn->sql_query($builder->buildQuery()));
	if (!$conn->sql_numrows()) { $smarty->assign('error', 'Artigo não encontrado'); }
	else { $smarty->assign('artigo', $artigo); }
}
else
{
	$_curPage = (int) $_GET['curpage'];

	/**
	 * SELECIONA OS ARTIGOS
	 */
	$builder = new QueryBuilder();
	$builder->setTable('mod_artigos');
	$builder->addColumn('count(code)');
	$builder->setWhere($sql);
	$totalReg = $conn->sql_fetchrow($conn->sql_query($builder->buildQuery()));
	$totalReg = $totalReg[0];

	$rows = (!$rows)?ROWS:$rows;
	$_curPage = (!$_curPage) ? 1 : $_curPage;
	$start = $_curPage - 1;
	$start = $rows * $start;
	$totalPage = ceil($totalReg / $rows);

	$smarty->assign('totalpage', round($totalPage));
	$smarty->assign('total', $totalReg);

	$builder = new QueryBuilder();
	$builder->setTable('mod_artigos');
	$builder->addColumn('title');
	$builder->addColumn('parse_url(title) AS url');
	$builder->addColumn('date');
	$builder->setOrderBy('date DESC');
	$builder->setLimit($rows);
	$builder->setOffset($start);
	$artigos = $conn->sql_fetchrowset($conn->sql_query($builder->buildQuery()));
	$smarty->assign('artigos', $artigos);
}

$smarty->assign('page', 'artigos.htm');
?>