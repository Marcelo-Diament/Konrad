<?php
/**
 * Project:     GERENCIADOR DE SITES
 * File:        MOD_CLIENTES.PHP
 * 
 * @author Diógenes Konrad Götz
 * @copyright Götz & Konrad
 * @link http://www.gotz.com.br
 */

$nome     = (string) trim($_POST['nome']);
$empresa  = (string) trim($_POST['empresa']);
$cargo    = (string) $_POST['cargo'];
$email    = (string) $_POST['email'];
$telefone = (string) $_POST['telefone'];
$endereco = (string) $_POST['endereco'];
$estado   = (string) $_POST['estado'];
$cidade   = (string) $_POST['cidade'];
$cep      = (string) $_POST['cep'];
$obs      = (string) $_POST['obs'];

/**
 * VERIFICA AS PERMISSOES DE ACESSO
 */
$builder = new QueryBuilder();
$builder->setTable('vw_adminpermissions');
$builder->addColumn('usrinsert');
$builder->addColumn('usrupdate');
$builder->addColumn('usrdelete');
$builder->setWhere('usr_code='.$_SESSION['data']['usrcode'].' AND module_code='.$page);
$permissions = $conn->sql_fetchrow($conn->sql_query($builder->buildQuery()));

/**
 * REMOVE O CLIENTE
 */
if ($_POST['inscricoes_code'])
{
	if (!$permissions['usrdelete']) $error='Você não tem permissões para executar esta ação';
	else
	{
		$builder = new QueryBuilder('delete');
		$builder->setTable('inscricoes_workshop');
		$builder->setWhere("code={$_POST['inscricoes_code']}");
		if ($conn->sql_query($builder->buildQuery())) {
			$display='Inscrição excluída com sucesso!';
		} else { $error='Ocorreu um erro ao tentar excluir o cliente'; }
	}
}

/**
 * ATUALIZA O CLIENTE
 */
if (isset($_GET['inscricoes_code']))
{
	if (isset($_POST['update']))
	{
		if (!$permissions['usrupdate']) $error='Você não tem permissões para executar esta ação';
		else
		{
			if (!$nome) $error='Preencha o campo nome';
			elseif (!$email) $error='Preencha o campo email';
			elseif(!defaultValid::email($email)) $error='Email inválido';
			elseif (!$endereco) $error='Preencha o campo endereço!';
			elseif (!$estado) $error='Selecione um estado';
			elseif (!$cidade) $error='Preencha o campo cidade';
			elseif (!$cep) $error='Preencha o campo CEP';
			else
			{
				
				/**
				 * VERIFICA SE O CLIENTE NÃO EXISTE
				 */
				$builder = new QueryBuilder();
				$builder->setTable('inscricoes_workshop');
				$builder->addColumn('code');
				$builder->setWhere("nome='{$nome}' AND code<>{$_GET['inscricoes_code']}");
				$conn->sql_query($builder->buildQuery());
				if ($conn->sql_numrows()) $error='Cliente já cadastrado!';
				else
				{
					$builder = new QueryBuilder("update");
					$builder->setTable('inscricoes_workshop');
					$builder->addColumn('nome');
					$builder->addColumn('empresa');
					$builder->addColumn('cargo');
					$builder->addColumn('email');
					$builder->addColumn('telefone');
					$builder->addColumn('endereco');
					$builder->addColumn('estado_code');
					$builder->addColumn('cidade');
					$builder->addColumn('cep');
					$builder->addValue("'{$nome}'");
					$builder->addValue("'{$empresa}'");
					$builder->addValue("'{$cargo}'");
					$builder->addValue("'{$email}'");
					$builder->addValue("'{$telefone}'");
					$builder->addValue("'{$endereco}'");
					$builder->addValue($estado);
					$builder->addValue("'{$cidade}'");
					$builder->addValue("'{$cep}'");
					$builder->setWhere("code={$_GET['inscricoes_code']}");
					if (!$conn->sql_query($builder->buildQuery())) $error='Ocorreu um erro ao tentar atualizar o cliente';
					else $display='Cliente atualizado com sucesso';
				}
			}
		}
	}
	else
	{
		/**
		 * SELECIONA O CLIENTE
		 */
		$builder = new QueryBuilder();
		$builder->setTable('inscricoes_workshop');
		$builder->addColumn('code');
		$builder->addColumn('nome');
		$builder->addColumn('empresa');
		$builder->addColumn('cargo');
		$builder->addColumn('email');
		$builder->addColumn('telefone');
		$builder->addColumn('endereco');
		$builder->addColumn('estado_code');
		$builder->addColumn('cidade');
		$builder->addColumn('cep');
		$builder->setWhere('code='.$_GET['inscricoes_code']);
		
		$tmp = $conn->sql_fetchrow($conn->sql_query($builder->buildQuery()));
		if (!$conn->sql_numrows())
		{
			$error='Inscrição não encontrada';
			$permissions['usrupdate'] = false;
		}
		else
		{
			$_POST['nome'] 		= $tmp['nome'];
			$_POST['empresa'] 	= $tmp['empresa'];
			$_POST['cargo'] 	= $tmp['cargo'];
			$_POST['email'] 	= $tmp['email'];
			$_POST['telefone'] 	= $tmp['telefone'];
			$_POST['endereco'] 	= $tmp['endereco'];
			$_POST['estado'] 	= $tmp['estado_code'];
			$_POST['cidade'] 	= $tmp['cidade'];
			$_POST['cep'] 		= $tmp['cep'];
		}
	}
}

if ($_POST['busca'])
{

/**
 * SELECIONA OS CLIENTES CADASTRADOS
 */
$builder = new QueryBuilder();
$builder->setTable('vw_inscricoes_workshop');
$builder->addColumn('code');
$builder->addColumn('nome');
$builder->addColumn('dt_inicio');
$builder->addColumn('dt_termino');
$builder->addColumn('curso_nome');
$builder->addColumn('cidade_turma');

$builder->setWhere("turma_code = {$_POST['turma']}");
$builder->setOrderBy('nome');

$inscricoes = $conn->sql_fetchrowset($conn->sql_query($builder->buildQuery()));
$smarty->assign('inscricoes', $inscricoes);


}
else {
/**
 * SELECIONA OS CLIENTES CADASTRADOS
 */
$builder = new QueryBuilder();
$builder->setTable('vw_inscricoes_workshop');
$builder->addColumn('code');
$builder->addColumn('nome');
$builder->addColumn('dt_inicio');
$builder->addColumn('dt_termino');
$builder->addColumn('curso_nome');
$builder->addColumn('cidade_turma');
$builder->setOrderBy('nome');
$inscricoes = $conn->sql_fetchrowset($conn->sql_query($builder->buildQuery()));
$smarty->assign('inscricoes', $inscricoes);	
}
/**
 * SELECIONA OS ESTADOS
 */
$builder = new QueryBuilder();
$builder->setTable('estados');
$builder->addColumn('code');
$builder->addColumn('extenso');
$estados = $conn->sql_fetchrowset($conn->sql_query($builder->buildQuery()));
$smarty->assign('estados', $estados);


/**
 * SELECIONA OS cursos/turmas
 */
$builder = new QueryBuilder();
$builder->setTable('mod_workshops');
$builder->addColumn('mod_workshops.code');
$builder->addColumn('nome_curso');
$builder->setJoin("INNER JOIN public.mod_turmas_workshop ON (public.mod_workshops.code = public.mod_turmas_workshop.curso_code)");
$cursos = $conn->sql_fetchrowset($conn->sql_query($builder->buildQuery()));
$smarty->assign('cursos', $cursos);

for($contador = 0; $contador < count($cursos); $contador++)
{
	$builder = new QueryBuilder();
	$builder->setTable('mod_turmas_workshop');
	$builder->addColumn('code');
	$builder->addColumn('cidade');
	$builder->addColumn('dt_inicio');
	$builder->addColumn('dt_termino');
	$builder->setWhere('curso_code='.$cursos[$contador]['code']);
	$cursos[$contador]['turmas'] = $conn->sql_fetchrowset($conn->sql_query($builder->buildQuery()));
	$smarty->assign('cursos', $cursos);
}

$smarty->assign('display', $display);
$smarty->assign('error', $error);
$smarty->assign('permissions', $permissions);
$smarty->display('mod_inscricoes-workshops.htm');
?>