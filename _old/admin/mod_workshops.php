<?php
/**
 * Project:     GERENCIADOR DE SITES
 * File:        MOD_CURSOS.PHP
 * 
 * @author Diógenes Konrad Götz
 * @copyright Götz & Konrad
 * @link http://www.gotz.com.br
 */

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
 * CADASTRO DE CURSOS
 */
if (!$_GET['option'])
{

	$nome_curso    = (string) $_POST['nome_curso'];
	$programa      = (string) $_POST['programa'];
	$objetivo      = (string) $_POST['objetivo'];
	$metodologia   = (string) $_POST['metodologia'];
	$depoimentos   = (string) $_POST['depoimentos'];
	$publico_alvo  = (string) $_POST['publico_alvo'];
	$carga_horaria = (string) $_POST['carga_horaria'];
	$instrutor     = (string) $_POST['instrutor'];
	$minicuriculo  = (string) $_POST['minicurriculo'];
	$investimento  = (string) $_POST['investimento'];
	$incluido      = (string) $_POST['incluido'];
	$ordem         = (int) $_POST['ordem'];
	$workshop      = (string) $_POST['workshop'];

	/**
	 * REMOVE O CURSO
	 */
	if ($_POST['curso_code'])
	{
		if (!$permissions['usrdelete']) $error='Você não tem permissões para executar esta ação';
		else
		{
			$builder = new QueryBuilder('delete');
			$builder->setTable('mod_workshops');
			$builder->setWhere("code={$_POST['curso_code']}");
			if ($conn->sql_query($builder->buildQuery())) $display='Workshop excluído com sucesso';
			else $error='Ocorreu um erro ao tentar excluir o workshop';
		}
	}

	/**
	 * ADICIONA UM NOVO CURSO
	 */
	if (isset($_POST['salvar']))
	{
		if (!$permissions['usrinsert']) $error='Você não tem permissões para executar esta ação';
		else
		{
			if (!$nome_curso) $error='Informe o nome do workshop';
			#elseif (!$programa) $error='Informe o programa';
			#elseif (!$objetivo) $error='Informe o objetivo';
			#elseif (!$metodologia) $error='Informe a metodologia';
			#elseif (!$publico_alvo) $error='Informe o público-alvo';
			#elseif (!$carga_horaria) $error='Informe a carga horária';
			#elseif (!$instrutor) $error='Informe o instrutor';
			#elseif (!$investimento) $error='Informe o investimento';
			else
			{
				/**
				 * VERIFICA SE O CURSO NÃO EXISTE
				 */
				$builder = new QueryBuilder();
				$builder->setTable('mod_workshops');
				$builder->addColumn('code');
				$builder->setWhere("nome_curso='{$nome_curso}'");
				$conn->sql_query($builder->buildQuery());
				if ($conn->sql_numrows()) $error='Workshop já cadastrado!';
				else
				{
					$builder = new QueryBuilder('insert');
					$builder->setTable('mod_workshops');
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
					$builder->addColumn('ordem');
					$builder->addColumn('descricao_workshop');
					$builder->addValue("'{$nome_curso}'");
					$builder->addValue("'{$programa}'");
					$builder->addValue("'{$objetivo}'");
					$builder->addValue("'{$metodologia}'");
					$builder->addValue("'{$depoimentos}'");
					$builder->addValue("'{$publico_alvo}'");
					$builder->addValue("'{$carga_horaria}'");
					$builder->addValue("'{$instrutor}'");
					$builder->addValue("'{$minicuriculo}'");
					$builder->addValue("'{$investimento}'");
					$builder->addValue("'{$incluido}'");
					$builder->addValue("'{$ordem}'");
					$builder->addValue("'{$workshop}'");
					if (!$conn->sql_query($builder->buildQuery())) $error='Ocorreu um erro ao tentar adicionar o workshop';
					else
					{
						$display='Workshop adicionado com sucesso';
						unset($_POST);
					}
				}
			}
		}
	}

	/**
	 * ATUALIZA O CURSO
	 */
	if (isset($_GET['curso_code']))
	{
		if (isset($_POST['update']))
		{
			if (!$permissions['usrupdate']) $error='Você não tem permissões para executar esta ação';
			else
			{
				if (!$nome_curso) $error='Informe o nome do curso';
				#elseif (!$programa) $error='Informe o programa';
				#elseif (!$objetivo) $error='Informe o objetivo';
				#elseif (!$metodologia) $error='Informe a metodologia';
				#elseif (!$publico_alvo) $error='Informe o público-alvo';
				#elseif (!$carga_horaria) $error='Informe a carga horária';
				#elseif (!$instrutor) $error='Informe o instrutor';
				#elseif (!$investimento) $error='Informe o investimento';
				else
				{
					/**
					 * VERIFICA SE O CURSO NÃO EXISTE
					 */
					$builder = new QueryBuilder();
					$builder->setTable('mod_workshops');
					$builder->addColumn('code');
					$builder->setWhere("nome='{$nome_curso}' AND code<>{$_GET['curso_code']}");
					$conn->sql_query($builder->buildQuery());
					if ($conn->sql_numrows()) $error='Workshop já cadastrado!';
					else
					{
						$builder = new QueryBuilder('update');
						$builder->setTable('mod_workshops');
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
						$builder->addColumn('ordem');
						$builder->addColumn('descricao_workshop');
						$builder->addValue("'{$nome_curso}'");
						$builder->addValue("'{$programa}'");
						$builder->addValue("'{$objetivo}'");
						$builder->addValue("'{$metodologia}'");
						$builder->addValue("'{$depoimentos}'");
						$builder->addValue("'{$publico_alvo}'");
						$builder->addValue("'{$carga_horaria}'");
						$builder->addValue("'{$instrutor}'");
						$builder->addValue("'{$minicuriculo}'");
						$builder->addValue("'{$investimento}'");
						$builder->addValue("'{$incluido}'");
						$builder->addValue("'{$ordem}'");
						$builder->addValue("'{$workshop}'");
						$builder->setWhere("code={$_GET['curso_code']}");
						if (!$conn->sql_query($builder->buildQuery())) $error='Ocorreu um erro ao tentar atualizar o workshop';
						else $display='Workshop atualizado com sucesso';
					}
				}
			}
		}

		/**
		 * SELECIONA O CURSO
		 */
		$builder = new QueryBuilder();
		$builder->setTable('mod_workshops');
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
		$builder->addColumn('ordem');
		$builder->addColumn('descricao_workshop');
		$builder->setWhere("code={$_GET['curso_code']}");
		$tmp = $conn->sql_fetchrow($conn->sql_query($builder->buildQuery()));
		if (!$conn->sql_numrows())
		{
			$error='Workshop não encontrado';
			$permissions['usrupdate'] = false;
		}
		else
		{
			$_POST['nome_curso']    = $tmp['nome_curso'];
			$_POST['programa']      = $tmp['programa'];
			$_POST['objetivo']      = $tmp['objetivo'];
			$_POST['metodologia']   = $tmp['metodologia'];
			$_POST['depoimentos']   = $tmp['depoimentos'];
			$_POST['publico_alvo']  = $tmp['publico_alvo'];
			$_POST['carga_horaria'] = $tmp['carga_horaria'];
			$_POST['instrutor']     = $tmp['instrutor'];
			$_POST['minicurriculo'] = $tmp['minicurriculo'];
			$_POST['investimento']  = $tmp['investimento'];
			$_POST['incluido']      = $tmp['material_incluido'];
			$_POST['ordem']         = $tmp['ordem'];
			$_POST['workshop']      = $tmp['descricao_workshop'];
		}
	}

	/**
	 * SELECIONA OS CURSOS
	 */
	$builder = new QueryBuilder();
	$builder->setTable('mod_workshops');
	$builder->addColumn('code');
	$builder->addColumn('nome_curso');
	$builder->setOrderBy('code');
	$cursos = $conn->sql_fetchrowset($conn->sql_query($builder->buildQuery()));
	$smarty->assign('cursos', $cursos);
}

/**
 * CADASTRO DE TURMAS
 */
elseif ($_GET['option'] == 1)
{
	$cidade      = (string) $_POST['cidade'];
	$local       = (string) $_POST['local'];
	$horario     = (string) $_POST['horario'];
	$localizacao = (string) $_POST['localizacao'];
	$date        = (string) $_POST['data'];
	$confirmada  = (int) $_POST['confirmada'];

	/**
	 * REMOVE A TURMA
	 */
	if ($_POST['turma_code'])
	{
		if (!$permissions['usrdelete']) $error='Você não tem permissões para executar esta ação';
		else
		{
			$builder = new QueryBuilder('delete');
			$builder->setTable('mod_turmas_workshop');
			$builder->setWhere("code={$_POST['turma_code']}");
			if ($conn->sql_query($builder->buildQuery())) $display='Turma excluída com sucesso';
			else $error='Ocorreu um erro ao tentar excluir a turma';
		}
	}

	/**
	 * ADICIONA UM NOVA TURMA
	 */
	if (isset($_POST['salvar']) && $_GET['curso_code'])
	{
		if (!$permissions['usrinsert']) $error='Você não tem permissões para executar esta ação';
		else
		{
			if (!$cidade) $error='Informe a cidade';
			elseif (!$local) $error='Informe o local';
			#elseif (!$horario) $error='Informe o horário';
			#elseif (!$localizacao) $error='Informe a localização';
			#elseif (!$dt_inicio) $error='Informe a data de início da turma';
			#elseif ($dt_inicio && !defaultValid::checkDate($dt_inicio)) $error='Data de início da turma inválida';
			#elseif (defaultValid::checkDate($dt_inicio, 1) < date('Ymd')) $error='Data de início da turma não pode ser menor que a data atual';
			#elseif (!$dt_termino) $error='Informe a data de término da turma';
			#elseif (defaultValid::checkDate($dt_termino, 1) < defaultValid::checkDate($dt_inicio, 1)) $error='A data de término não pode ser menor que a data de início da turma';
			else
			{
				$builder = new QueryBuilder('insert');
				$builder->setTable('mod_turmas_workshop');
				$builder->addColumn('curso_code');
				$builder->addColumn('cidade');
				$builder->addColumn('local');
				$builder->addColumn('horario');
				$builder->addColumn('localizacao');
				$builder->addColumn('data');
				$builder->addValue("'{$_GET['curso_code']}'");
				$builder->addValue("'{$cidade}'");
				$builder->addValue("'{$local}'");
				$builder->addValue("'{$horario}'");
				$builder->addValue("'{$localizacao}'");
				$builder->addValue("'{$date}'");
				if (!$conn->sql_query($builder->buildQuery())) $error='Ocorreu um erro ao tentar adicionar a turma';
				else
				{
					$display='Turma adicionada com sucesso';
					unset($_POST);
				}
			}
		}
	}

	/**
	 * ATUALIZA A TURMA
	 */
	if (isset($_GET['turma_code']))
	{
		if (isset($_POST['update']))
		{
			if (!$permissions['usrupdate']) $error='Você não tem permissões para executar esta ação';
			else
			{
				if (!$cidade) $error='Informe a cidade';
				elseif (!$local) $error='Informe o local';
				#elseif (!$horario) $error='Informe o horário';
				#elseif (!$localizacao) $error='Informe a localização';
				#elseif (!$dt_inicio) $error='Informe a data de início da turma';
				#elseif ($dt_inicio && !defaultValid::checkDate($dt_inicio)) $error='Data de início da turma inválida';
				#elseif (defaultValid::checkDate($dt_inicio, 1) < date('Ymd')) $error='Data de início da turma não pode ser menor que a data atual';
				#elseif (!$dt_termino) $error='Informe a data de término da turma';
				#elseif (defaultValid::checkDate($dt_termino, 1) < defaultValid::checkDate($dt_inicio, 1)) $error='A data de término não pode ser menor que a data de início da turma';
				else
				{
					$confirmada = ($confirmada)?'t':'f';
					$builder = new QueryBuilder('update');
					$builder->setTable('mod_turmas_workshop');
					$builder->addColumn('cidade');
					$builder->addColumn('local');
					$builder->addColumn('horario');
					$builder->addColumn('localizacao');
					$builder->addColumn('data');
					$builder->addColumn('confirmada');
					$builder->addValue("'{$cidade}'");
					$builder->addValue("'{$local}'");
					$builder->addValue("'{$horario}'");
					$builder->addValue("'{$localizacao}'");
					$builder->addValue("'{$date}'");
					$builder->addValue("'{$confirmada}'");
					$builder->setWhere("code={$_GET['turma_code']}");
					if (!$conn->sql_query($builder->buildQuery())) $error='Ocorreu um erro ao tentar atualizar a turma';
					else $display='Turma atualizada com sucesso';
				}
			}
		}

		/**
		 * SELECIONA A TURMA
		 */
		$builder = new QueryBuilder();
		$builder->setTable('mod_turmas_workshop');
		$builder->addColumn('cidade');
		$builder->addColumn('local');
		$builder->addColumn('horario');
		$builder->addColumn('localizacao');
		$builder->addColumn('data');
		$builder->addColumn('confirmada');
		$builder->setWhere("code={$_GET['turma_code']}");
		$tmp = $conn->sql_fetchrow($conn->sql_query($builder->buildQuery()));
		if (!$conn->sql_numrows())
		{
			$error='Turma não encontrada';
			$permissions['usrupdate'] = false;
		}
		else
		{
			$_POST['cidade']      = $tmp['cidade'];
			$_POST['local']       = $tmp['local'];
			$_POST['horario']     = $tmp['horario'];
			$_POST['localizacao'] = $tmp['localizacao'];
			$_POST['data']        = $tmp['data'];
			$_POST['confirmada']  = ($tmp['confirmada'] == 't')?true:false;
		}

	}



	/**
	 * SELECIONA AS TURMAS CADASTRADAS
	 */
	$builder = new QueryBuilder();
	$builder->setTable('mod_turmas_workshop');
	$builder->addColumn('code');
	$builder->addColumn('cidade');
	$builder->addColumn('local');
	$builder->setWhere("curso_code={$_GET['curso_code']}");
	$turmas = $conn->sql_fetchrowset($conn->sql_query($builder->buildQuery()));
	$smarty->assign('turmas', $turmas);
}

$smarty->assign('display', $display);
$smarty->assign('error', $error);
$smarty->assign('permissions', $permissions);
$smarty->display('mod_workshops.htm');
?>