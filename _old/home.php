<?php
/**
 * @copyright Konrad - Sistemas de Competitividade
 * @author Diógenes Konrad Götz
 * @link   www.gotz.com.br
 */

$arquivo = 'media/introducao.dat';
$fp = @fopen($arquivo, 'r');
if ($fp)
{
	$content = @fread($fp, filesize($arquivo));
	if ($content) { $smarty->assign('content', $content); }
}

/**
 * SELECIONA OS ARTIGOS
 */
$builder = new QueryBuilder();
$builder->setTable('mod_artigos');
$builder->addColumn('code');
$builder->addColumn('title');
$builder->addColumn('parse_url(title) AS url');
$builder->addColumn('date');
$builder->setLimit(5);
$builder->setOrderBy('date DESC');
$artigos = $conn->sql_fetchrowset($conn->sql_query($builder->buildQuery()));
$smarty->assign('artigos', $artigos);

/**
 * SELECIONA OS WORKSHOPS
 */
$builder = new QueryBuilder();
$builder->setTable('vw_workshops');
$builder->addColumn('curso_code');
$builder->addColumn('curso_nome');
$builder->addColumn('parse_url(curso_nome) AS url');
$builder->setLimit(20);
$builder->setOrderBy('ordem');
$cursos = $conn->sql_fetchrowset($conn->sql_query($builder->buildQuery()));

for ($i=0; $i<count($cursos); $i++)
{
	$builder = new QueryBuilder();
	$builder->setTable('mod_turmas_workshop');
	$builder->addColumn('code');
	$builder->addColumn('cidade');
	$builder->addColumn('data');
	$builder->addColumn('confirmada');
	$builder->setOrderBy('code');
	$builder->setWhere("curso_code={$cursos[$i]['curso_code']}");
	$turmas = $conn->sql_fetchrowset($conn->sql_query($builder->buildQuery()));
	$cursos[$i]['turmas'] = $turmas;

	foreach ($turmas as $turma){
		if (!$cursos[$i]['confirmado']) { $cursos[$i]['confirmado'] = ($turma['confirmada']=='t')?true:false; }
	}
}

$smarty->assign('workshops', $cursos);

/**
 * SELECIONA OS CURSOS
 */
$builder = new QueryBuilder();
$builder->setTable('vw_cursos');
$builder->addColumn('curso_code');
$builder->addColumn('curso_nome');
$builder->addColumn('parse_url(curso_nome) AS url');
$builder->setLimit(20);
$builder->setOrderBy('ordem');
$cursos = $conn->sql_fetchrowset($conn->sql_query($builder->buildQuery()));

for ($i=0; $i<count($cursos); $i++)
{
	$builder = new QueryBuilder();
	$builder->setTable('mod_turmas');
	$builder->addColumn('code');
	$builder->addColumn('cidade');
	$builder->addColumn('dt_inicio');
	$builder->addColumn('dt_termino');
	$builder->addColumn('confirmada');
	$builder->setOrderBy('dt_termino');
	$builder->setWhere("curso_code={$cursos[$i]['curso_code']}");
	$turmas = $conn->sql_fetchrowset($conn->sql_query($builder->buildQuery()));
	$cursos[$i]['turmas'] = $turmas;

	foreach ($turmas as $turma){
		if (!$cursos[$i]['confirmado']) { $cursos[$i]['confirmado'] = ($turma['confirmada']=='t')?true:false; }
	}
}

$smarty->assign('cursos', $cursos);

$smarty->assign('data', date('d')." de ".$ArrMonths[date('n')]. " de ".date('Y'));
$smarty->assign('page', 'home.htm');
?>