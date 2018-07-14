<?php
/**
 * @copyright Konrad - Sistemas de Competitividade
 * @author Diógenes Konrad Götz
 * @link   www.gotz.com.br
 */

if (!$getKey[1]) { header("location: ".ROOTFOLDER); }

/**
 * SELECIONA OS SUBMENUS
 */
$key = ($getKey[2])?$getKey[2]:$getKey[1];

$builder = new QueryBuilder();
$builder->setTable('mod_conteudos');
$builder->addColumn('code');
$builder->setWhere("parse_url(title)='{$key}'");
$tmp = $conn->sql_fetchrow($conn->sql_query($builder->buildQuery()));

$builder = new QueryBuilder();
$builder->setTable('mod_conteudos');
$builder->addColumn('title');
$builder->addColumn('parse_url(title) AS url');
$builder->setWhere("root_content={$tmp['code']}");
$builder->setOrderBy('code');
$submenus = $conn->sql_fetchrowset($conn->sql_query($builder->buildQuery()));
$smarty->assign('submenus', $submenus);

/**
 * SELECIONA O CONTEÚDO
 */
$builder = new QueryBuilder();
$builder->setTable('mod_conteudos');
$builder->addColumn('code');
$builder->addColumn('title');
$builder->addColumn('content');
$builder->setWhere("parse_url(title)='{$getKey[count($getKey)-1]}'");
$conteudo = $conn->sql_fetchrow($conn->sql_query($builder->buildQuery()));
$smarty->assign('conteudo', $conteudo);

$smarty->assign('page', 'conteudos.htm');
?>