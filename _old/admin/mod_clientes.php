<?php
/**
 * Project:     GERENCIADOR DE SITES
 * File:        MOD_CLIENTES.PHP
 * 
 * @author Diógenes Konrad Götz
 * @copyright Götz & Konrad
 * @link http://www.gotz.com.br
 */

$nome        = (string) trim($_POST['nome']);
$descricao   = (string) $_POST['descricao'];

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
if ($_POST['cliente_code'])
{
	if (!$permissions['usrdelete']) $error='Você não tem permissões para executar esta ação';
	else
	{
		$builder = new QueryBuilder('delete');
		$builder->setTable('mod_clientes');
		$builder->setWhere("code={$_POST['cliente_code']}");
		if ($conn->sql_query($builder->buildQuery())) {
			$display='Cliente excluído com sucesso';
		} else { $error='Ocorreu um erro ao tentar excluir o cliente'; }
	}
}


/**
 * ADICIONA UM NOVO CLIENTE
 */
if ($_POST['salvar'])
{
	if (!$permissions['usrinsert']) $error='Você não tem permissões para executar esta ação';
	else
	{
		if (!$nome) $error='Preencha o campo nome';
		else
		{
			/**
			 * VERIFICA SE O CLIENTE NÃO EXISTE
			 */
			$builder = new QueryBuilder();
			$builder->setTable('mod_clientes');
			$builder->addColumn('code');
			$builder->setWhere("name='{$nome}'");
			$conn->sql_query($builder->buildQuery());
			if ($conn->sql_numrows()) $error='Cliente já cadastrado!';
			else
			{
				$builder = new QueryBuilder('insert');
				$builder->setTable('mod_clientes');
				$builder->addColumn('name');
				$builder->addColumn('description');
				$builder->addValue("'{$nome}'");
				$builder->addValue("'{$descricao}'");
				if (!$conn->sql_query($builder->buildQuery())) $error='Ocorreu um erro ao tentar adicionar o cliente';
				else
				{
					$display='Cliente adicionado com sucesso';
					unset($_POST);
				}
			}
		}
	}
}

/**
 * ATUALIZA O CLIENTE
 */
if (isset($_GET['cliente_code']))
{
	if (isset($_POST['update']))
	{
		if (!$permissions['usrupdate']) $error='Você não tem permissões para executar esta ação';
		else
		{
			if (!$nome) $error='Preencha o campo nome';
			else
			{
				/**
				 * VERIFICA SE O CLIENTE NÃO EXISTE
				 */
				$builder = new QueryBuilder();
				$builder->setTable('mod_clientes');
				$builder->addColumn('code');
				$builder->setWhere("name='{$nome}' AND code<>{$_GET['cliente_code']}");
				$conn->sql_query($builder->buildQuery());
				if ($conn->sql_numrows()) $error='Cliente já cadastrado!';
				else
				{
					$builder = new QueryBuilder('update');
					$builder->setTable('mod_clientes');
					$builder->addColumn('name');
					$builder->addColumn('description');
					$builder->addValue("'{$nome}'");
					$builder->addValue("'{$descricao}'");
					$builder->setWhere("code={$_GET['cliente_code']}");
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
		$builder->setTable('mod_clientes');
		$builder->addColumn('name');
		$builder->addColumn('description');
		$builder->setWhere('code='.$_GET['cliente_code']);
		$tmp = $conn->sql_fetchrow($conn->sql_query($builder->buildQuery()));
		if (!$conn->sql_numrows())
		{
			$error='Cliente não encontrado';
			$permissions['usrupdate'] = false;
		}
		else
		{
			$_POST['nome']      = $tmp['name'];
			$_POST['descricao'] = $tmp['description'];
		}
	}
}

/**
 * SELECIONA OS CLIENTES CADASTRADOS
 */
$builder = new QueryBuilder();
$builder->setTable('mod_clientes');
$builder->addColumn('code');
$builder->addColumn('name');
$builder->setOrderBy('name');
$clientes = $conn->sql_fetchrowset($conn->sql_query($builder->buildQuery()));
$smarty->assign('clientes', $clientes);

$smarty->assign('display', $display);
$smarty->assign('error', $error);
$smarty->assign('permissions', $permissions);
$smarty->display('mod_clientes.htm');
?>