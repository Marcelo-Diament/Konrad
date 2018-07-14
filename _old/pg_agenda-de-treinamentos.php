<?php
/**
 * @copyright Konrad - Sistemas de Competitividade
 * @author Diógenes Konrad Götz
 * @link   www.gotz.com.br
 */

/**
 * SELECIONA AS INFORMAÇÕES DO CURSO
 */
if ($getKey[2])
{
	$_GET['key'] = implode("/", $getKey);

	$builder = new QueryBuilder();
	$builder->setTable('vw_turma');
	$builder->addColumn('nome_curso');
	$builder->addColumn('programa');
	$builder->addColumn('objetivo');
	$builder->addColumn('metodologia');
	$builder->addColumn('depoimentos');
	$builder->addColumn('publico_alvo');
	$builder->addColumn('carga_horaria');
	$builder->addColumn('instrutor');
	$builder->addColumn('minicurriculo');
	$builder->addColumn('investimento');
	$builder->addColumn('material_incluido');
	$builder->addColumn('cidade');
	$builder->addColumn('local');
	$builder->addColumn('horario');
	$builder->addColumn('localizacao');
	$builder->addColumn('dt_inicio');
	$builder->addColumn('dt_termino');
	$builder->addColumn('confirmada');
	$builder->setWhere("code={$getKey[2]}");
	$turma = $conn->sql_fetchrow($conn->sql_query($builder->buildQuery()));
	$smarty->assign('turma', $turma);
}
/**
 * LISTA OS CURSOS
 */
else
{
	/**
	 * SELECIONA OS CURSOS
	 */
	$builder = new QueryBuilder();
	$builder->setTable('vw_cursos');
	$builder->addColumn('curso_code');
	$builder->addColumn('curso_nome');
	$builder->addColumn('parse_url(curso_nome) AS url');
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
		$builder->setWhere("curso_code={$cursos[$i]['curso_code']}");
		$builder->setOrderBy('dt_termino');
		$turmas = $conn->sql_fetchrowset($conn->sql_query($builder->buildQuery()));
		$cursos[$i]['turmas'] = $turmas;
	}

	$smarty->assign('cursos', $cursos);
}

$smarty->assign('page', 'agenda-de-treinamentos.htm');
?>