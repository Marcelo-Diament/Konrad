<?php
/**
 * @copyright Konrad - Sistemas de Competitividade
 * @author Diógenes Konrad Götz
 * @link   www.gotz.com.br
 */


/**
 * SELECIONA OS CLIENTES CADASTRADOS
 */
$sql = ($getKey[1] == 'outros')?"LOWER(TO_ASCII(name,'LATIN1')) !~* '^[A-Z]'":"LOWER(TO_ASCII(name,'LATIN1')) LIKE '{$getKey[1]}%'";

$builder = new QueryBuilder();
$builder->setTable('mod_clientes');
$builder->addColumn('name');
$builder->addColumn('description');
$builder->setOrderBy('name');
if ($sql) $builder->setWhere($sql);
$clientes = $conn->sql_fetchrowset($conn->sql_query($builder->buildQuery()));
$smarty->assign('clientes', $clientes);

$smarty->assign('page', 'clientes.htm');
?>