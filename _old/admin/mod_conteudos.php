<?php
/**
 * Project:     GERENCIADOR DE SITES
 * File:        MOD_CONTEUDOS.PHP
 * 
 * @author Diógenes Konrad Götz
 * @copyright Götz & Konrad
 * @link http://www.gotz.com.br
 */

$title        = (string) trim($_POST['title']);
$root_content = (int) $_GET['root_content'];
$content      = (string) $_POST['description'];

/**
 * VERIFICA O NIVEL
 */
if ($root_content)
{
	$children = $root_content;
	$menu = array();
	$nivel = 1;

	while (1)
	{
		$builder = new QueryBuilder();
		$builder->setTable('mod_conteudos');
		$builder->addColumn('code');
		$builder->addColumn('title');
		$builder->addColumn('root_content');
		$builder->setWhere("code={$children}");
		$tmp = $conn->sql_fetchrow($conn->sql_query($builder->buildQuery()));

		$menu[] = $tmp;
		$nivel ++;
		$children = $tmp['root_content'];
		if (!$tmp['root_content']) break;
	}

	$smarty->assign('menu', array_reverse($menu));
	$smarty->assign('nivel', $nivel);
}

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
 * REMOVE O CONTEÚDO
 */
if ($_POST['conteudo_code'])
{
	if (!$permissions['usrdelete'] && $root_content) $error='Você não tem permissões para executar esta ação';
	else
	{
		$builder = new QueryBuilder('delete');
		$builder->setTable('mod_conteudos');
		$builder->setWhere("code={$_POST['conteudo_code']}");
		if ($conn->sql_query($builder->buildQuery())) $display='Conteúdo excluído com sucesso';
		else $error='Ocorreu um erro ao tentar excluir o conteúdo';
	}
}

/**
 * ADICIONA UMA NOVO CONTEÚDO
 */
if ($_POST['salvar'])
{
	if (!$permissions['usrinsert'] || !$root_content) $error='Você não tem permissões para executar esta ação';
	else
	{
		if (!$title) $error='Preencha o campo título';
		elseif (!$content) $error='Preencha o campo descrição';
		else
		{
			/**
			 * VERIFICA SE O CONTEÚDO NÃO EXISTE
			 */
			$builder = new QueryBuilder();
			$builder->setTable('mod_conteudos');
			$builder->addColumn('code');
			$builder->setWhere("title='{$title}'");
			$conn->sql_query($builder->buildQuery());
			if ($conn->sql_numrows()) $error='Conteúdo já cadastrado!';
			else
			{
				$content = str_replace("../media/images/upload/", ROOTFOLDER."/".UPLOADDIR, $content);

				$builder = new QueryBuilder('insert');
				$builder->setTable('mod_conteudos');
				$builder->addColumn('title');
				if ($root_content) $builder->addColumn('root_content');
				$builder->addColumn('content');
				$builder->addValue("'{$title}'");
				if ($root_content) $builder->addValue($root_content);
				$builder->addValue("'{$content}'");
				if (!$conn->sql_query($builder->buildQuery())) $error='Ocorreu um erro ao tentar adicionar o conteúdo';
				else
				{
					$display='Conteúdo adicionado com sucesso';
					unset($_POST);
				}
			}
		}
	}
}

/**
 * ATUALIZA O CONTEÚDO
 */
if ($_GET['conteudo_code'])
{
	if ($_POST['update'])
	{
		if (!$permissions['usrupdate']) $error='Você não tem permissões para executar esta ação';
		else
		{
			if (!$title) $error='Preencha o campo título';
			elseif (!$content) $error='Preencha o campo conteudo';
			else
			{
				/**
				 * VERIFICA SE O CONTEÚDO NÃO EXISTE
				 */
				$builder = new QueryBuilder();
				$builder->setTable('mod_artigos');
				$builder->addColumn('code');
				$builder->setWhere("title='{$title}' AND code<>{$_GET['conteudo_code']}");
				$conn->sql_query($builder->buildQuery());
				if ($conn->sql_numrows()) $error='Conteúdo já cadastrado!';
				else
				{
					$content = str_replace("../media/images/upload/", ROOTFOLDER."/".UPLOADDIR, $content);

					$builder = new QueryBuilder('update');
					$builder->setTable('mod_conteudos');
					$builder->addColumn('title');
					$builder->addColumn('content');
					$builder->addValue("'".$title."'");
					$builder->addValue("'".$content."'");
					$builder->setWhere("code={$_GET['conteudo_code']}");
					if (!$conn->sql_query($builder->buildQuery())) $error='Ocorreu um erro ao tentar atualizar o conteúdo';
					else
					{
						$display='Conteúdo atualizado com sucesso';
						unset($_POST);
					}
				}
			}
		}
	}

	/**
	 * SELECIONA O CONTEUDO
	 */
	$builder = new QueryBuilder();
	$builder->setTable('mod_conteudos');
	$builder->addColumn('title');
	$builder->addColumn('content');
	$builder->setWhere("code={$_GET['conteudo_code']}");
	$tmp = $conn->sql_fetchrow($conn->sql_query($builder->buildQuery()));
	if (!$conn->sql_numrows())
	{
		$error='Conteúdo não encontrado';
		$permissions['usrupdate'] = false;
	}
	else
	{
		$_POST['title']       = $tmp['title'];
		$_POST['description'] = $tmp['content'];
	}
}

/**
 * SELECIONA OS CONTEUDOS
 */
$sql = ($root_content)?"root_content={$root_content}":"root_content IS NULL";
$builder = new QueryBuilder();
$builder->setTable('mod_conteudos');
$builder->addColumn('code');
$builder->addColumn('title');
$builder->setOrderBy('code');
$builder->setWhere($sql);
$conteudos = $conn->sql_fetchrowset($conn->sql_query($builder->buildQuery()));
$smarty->assign('conteudos', $conteudos);

$smarty->assign('display', $display);
$smarty->assign('error', $error);
$smarty->assign('permissions', $permissions);
$smarty->display('mod_conteudos.htm');
?>