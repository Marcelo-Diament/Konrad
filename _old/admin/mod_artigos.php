<?php
/**
 * Project:     GERENCIADOR DE SITES
 * File:        MOD_ARTIGOS.PHP
 * 
 * @author Diógenes Konrad Götz
 * @copyright Götz & Konrad
 * @link http://www.gotz.com.br
 */

$title       = (string) trim($_POST['title']);
$date        = (string) $_POST['date'];
$description = (string) $_POST['description'];

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
 * REMOVE O ARTIGO
 */
if ($_POST['artigo_code'])
{
	if (!$permissions['usrdelete']) $error='Você não tem permissões para executar esta ação';
	else
	{
		$builder = new QueryBuilder('delete');
		$builder->setTable('mod_artigos');
		$builder->setWhere("code={$_POST['artigo_code']}");
		if ($conn->sql_query($builder->buildQuery())) $display='Artigo excluído com sucesso';
		else $error='Ocorreu um erro ao tentar excluir o artigo';
	}
}

/**
 * ADICIONA UMA NOVO ARTIGO
 */
if ($_POST['salvar'])
{
	if (!$permissions['usrinsert']) $error='Você não tem permissões para executar esta ação';
	else
	{
		if (!$title) $error='Preencha o campo título';
		elseif (!$date) $error='Preencha o campo data';
		elseif ($date && !defaultValid::checkDate($date)) $error='Data inválida';
		elseif (!$description) $error='Preencha o campo descrição';
		else
		{
			/**
			 * VERIFICA SE O ARTIGO NÃO EXISTE
			 */
			$builder = new QueryBuilder();
			$builder->setTable('mod_artigos');
			$builder->addColumn('code');
			$builder->setWhere("title='{$title}'");
			$conn->sql_query($builder->buildQuery());
			if ($conn->sql_numrows()) $error='Artigo já cadastrado!';
			else
			{
				$description = str_replace("../media/images/upload/", ROOTFOLDER."/".UPLOADDIR, $description);
				$description = str_replace("'", "''", $description);

				$builder = new QueryBuilder('insert');
				$builder->setTable('mod_artigos');
				$builder->addColumn('title');
				$builder->addColumn('date');
				$builder->addColumn('description');
				$builder->addValue("'{$title}'");
				$builder->addValue("'".date("m-d-Y", strtotime(str_replace("/", "-", $date)))."'");
				$builder->addValue("'{$description}'");
				if (!$conn->sql_query($builder->buildQuery())) $error='Ocorreu um erro ao tentar adicionar o artigo';
				else
				{
					$display='Artigo adicionado com sucesso';
					unset($_POST);
				}
			}
		}
	}
}

/**
 * ATUALIZA O ARTIGO
 */
if ($_GET['artigo_code'])
{
	if ($_POST['update'])
	{
		if (!$permissions['usrupdate']) $error='Você não tem permissões para executar esta ação';
		else
		{
			if (!$title) $error='Preencha o campo título';
			elseif (!$date) $error='Preencha o campo data';
			elseif ($date && !defaultValid::checkDate($date)) $error='Data inválida';
			elseif (!$description) $error='Preencha o campo descrição';
			else
			{
				/**
				 * VERIFICA SE O ARTIGO NÃO EXISTE
				 */
				$builder = new QueryBuilder();
				$builder->setTable('mod_artigos');
				$builder->addColumn('code');
				$builder->setWhere("title='{$title}' AND code<>{$_GET['artigo_code']}");
				$conn->sql_query($builder->buildQuery());
				if ($conn->sql_numrows()) $error='Artigo já cadastrado!';
				else
				{
					$description = str_replace("../media/images/upload/", ROOTFOLDER."/".UPLOADDIR, $description);
					$description = str_replace("'", "''", $description);

					$builder = new QueryBuilder('update');
					$builder->setTable('mod_artigos');
					$builder->addColumn('title');
					$builder->addColumn('date');
					$builder->addColumn('description');
					$builder->addValue("'{$title}'");
					$builder->addValue("'".date("m-d-Y", strtotime(str_replace("/", "-", $date)))."'");
					$builder->addValue("'{$description}'");
					$builder->setWhere("code={$_GET['artigo_code']}");
					if (!$conn->sql_query($builder->buildQuery())) $error='Ocorreu um erro ao tentar atualizar o artigo';
					else
					{
						$display='Artigo atualizado com sucesso';
						unset($_POST);
					}
				}
			}
		}
	}

	/**
	 * SELECIONA O ARTIGO
	 */
	$builder = new QueryBuilder();
	$builder->setTable('mod_artigos');
	$builder->addColumn('title');
	$builder->addColumn('date');
	$builder->addColumn('description');
	$builder->setWhere("code={$_GET['artigo_code']}");
	$tmp = $conn->sql_fetchrow($conn->sql_query($builder->buildQuery()));
	if (!$conn->sql_numrows())
	{
		$error='Artigo não encontrado';
		$permissions['usrupdate'] = false;
	}
	else
	{
		$_POST['title']       = $tmp['title'];
		$_POST['date']        = $tmp['date'];
		$_POST['description'] = $tmp['description'];
	}
}

/**
 * SELECIONA OS ARTIGOS
 */
$builder = new QueryBuilder();
$builder->setTable('mod_artigos');
$builder->addColumn('code');
$builder->addColumn('title');
$builder->setOrderBy('code DESC');
$artigos = $conn->sql_fetchrowset($conn->sql_query($builder->buildQuery()));
$smarty->assign('artigos', $artigos);

$smarty->assign('display', $display);
$smarty->assign('error', $error);
$smarty->assign('permissions', $permissions);
$smarty->display('mod_artigos.htm');
?>