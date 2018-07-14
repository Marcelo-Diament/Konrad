<?php
/**
 * @copyright Konrad - Sistemas de Competitividade
 * @author Diógenes Konrad Götz
 * @link   www.gotz.com.br
 */

import('package.pdf.fpdf');  # Geração de arquivos PDF

$_GET['key'] = implode("/", $getKey);

$_nome     = (string) trim($_POST['nome']);
$_empresa  = (string) trim($_POST['empresa']);
$_cargo    = (string) $_POST['cargo'];
$_email    = (string) $_POST['email'];
$_telefone = (string) $_POST['telefone'];
$_endereco = (string) $_POST['endereco'];
$_estado   = (string) $_POST['estado'];
$_cidade   = (string) $_POST['cidade'];
$_cep      = (string) $_POST['cep'];
$_obs      = (string) $_POST['obs'];

$_obs = strip_tags($_obs);
$_obs = preg_replace('!\s+!', ' ', $_obs);
$_obs = wordwrap($_obs, 50, ' ', true);
$_obs = str_replace('\"', '"', $_obs);
$_obs = str_replace("\'", "'", $_obs);

/**
 * SELECIONA OS DADOS DA TURMA
 */
$builder = new QueryBuilder();
$builder->setTable('vw_turma');
$builder->addColumn('code');
$builder->addColumn('nome_curso');
$builder->addColumn('cidade');
$builder->addColumn('dt_inicio');
$builder->addColumn('dt_termino');
$builder->setWhere("code={$getKey[1]}");
$turma = $conn->sql_fetchrow($conn->sql_query($builder->buildQuery()));
$smarty->assign('turma', $turma);

/**
 * SELECIONA OS ESTADOS
 */
$builder = new QueryBuilder();
$builder->setTable('estados');
$builder->addColumn('code');
$builder->addColumn('extenso');
$estados = $conn->sql_fetchrowset($conn->sql_query($builder->buildQuery()));
$smarty->assign('estados', $estados);

if ($_POST['sended'])
{
	try
	{
		if (!$_nome) throw new SystemExeption('Informe seu nome');
		if (!$_email) throw new SystemExeption('Informe seu E-mail');
		if (!defaultValid::email($_email)) throw new SystemExeption('E-mail inválido');
		if (!$_telefone) throw new SystemExeption('Informe seu telefone');
		if (!$_endereco) throw new SystemExeption('Informe seu endereço');
		if (!$_estado) throw new SystemExeption('Informe o estado');
		if (!$_cidade) throw new SystemExeption('Informe a cidade');
		if (!$_cep) throw new SystemExeption('Informe o cep');

		
		$builder = new QueryBuilder();
		$builder->setTable('estados');
		$builder->addColumn('code');
		$builder->addColumn('extenso');
		$builder->setWhere("code={$_estado}");
		$estado = $conn->sql_fetchrow($conn->sql_query($builder->buildQuery()));
		
		/**
		 * salva inscricao
		 */
		$builder = new QueryBuilder("insert");
		$builder->setTable('inscricoes');
		$builder->addColumn('turma_code');
		$builder->addColumn('nome');
		$builder->addColumn('empresa');
		$builder->addColumn('cargo');
		$builder->addColumn('email');
		$builder->addColumn('telefone');
		$builder->addColumn('endereco');
		$builder->addColumn('estado_code');
		$builder->addColumn('cidade');
		$builder->addColumn('cep');
		$builder->addColumn('observacao');
		$builder->addValue($getKey[1]);
		$builder->addValue("'{$_nome}'");
		$builder->addValue("'{$_empresa}'");
		$builder->addValue("'{$_cargo}'");
		$builder->addValue("'{$_email}'");
		$builder->addValue("'{$_telefone}'");
		$builder->addValue("'{$_endereco}'");
		$builder->addValue($_estado);
		$builder->addValue("'{$_cidade}'");
		$builder->addValue("'{$_cep}'");
		$builder->addValue("'{$_obs}'");
		
			//die($builder->buildQuery());
		if($conn->sql_query($builder->buildQuery())){
		}
		else { throw new SystemExeption('Ocorreu um erro ao cadastrar os dados, tente novamente!'); }	
		

		/**
		 * GERA O PDF
		 */
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AutoPageBreak = false;
		$pdf->SetTitle('Reserva');
		$pdf->SetAuthor('Konrad');
		$pdf->SetDisplayMode(100);

		$pdf->Open();
		$pdf->AddPage();

		$pdf->SetFont('Arial', '', 18);
		$pdf->cell(190, 5, "Ficha de reserva de curso",0, 0, 'C');
		$pdf->Ln();
		$pdf->Ln();
		$pdf->SetFont('Arial', '', 14);
		$pdf->cell(190, 5, $turma['nome_curso'], 0, 0, 'C');
		$pdf->Ln();
		$pdf->SetFont('Arial', '', 14);
		$pdf->cell(190, 5, "{$turma['cidade']} - ".date("d/m/Y", strtotime($turma['dt_inicio']))." à ".date("d/m/Y", strtotime($turma['dt_termino'])), 0, 0, 'C');
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->SetFont('Arial', '', 12);
		$pdf->Cell(40, 8, 'Nome:', 1);
		$pdf->Cell(150, 8, $_nome, 1);
		$pdf->Ln();
		$pdf->Cell(40, 8, 'Empresa:', 1);
		$pdf->Cell(150, 8, $_empresa, 1);
		$pdf->Ln();
		$pdf->Cell(40, 8, 'Cargo:', 1);
		$pdf->Cell(150, 8, $_cargo, 1);
		$pdf->Ln();
		$pdf->Cell(40, 8, 'E-mail:', 1);
		$pdf->Cell(150, 8, $_email, 1);
		$pdf->Ln();	
		$pdf->Cell(40, 8, 'Telefone:', 1);
		$pdf->Cell(150, 8, $_telefone, 1);
		$pdf->Ln();
		$pdf->Cell(40, 8, 'Endereço:', 1);
		$pdf->Cell(150, 8, "{$_endereco}", 1);
		$pdf->Ln();
		$pdf->Cell(40, 8, 'Estado:', 1);
		$pdf->Cell(70, 8, $estado['extenso'], 1);
		$pdf->Cell(25, 8, 'Cidade:', 1);
		$pdf->Cell(55, 8, $_cidade, 1);;
		$pdf->Ln();
		$pdf->Cell(40, 8, 'CEP:', 1);
		$pdf->Cell(150, 8, $_cep, 1);
		$pdf->Ln();
		$pdf->Cell(190, 8, 'Observações / Comentários:', 1);
		$pdf->Ln();
		$pdf->MultiCell(190, 5, $_obs, 1);
		
		$filename = mktime().".pdf";
		$pdf->Output("tmp/{$filename}");

		$mail = new PHPGMailer();
		$mail->IsSMTP();
		$mail->Username = SMTPUSER;
		$mail->Password = SMTPPASS;
		$mail->From     = SMTPUSER;
		$mail->FromName = $_nome;
		$mail->AddAddress("sergio@konrad.com.br", "Konrad");
		$mail->Subject = "Reserva";
		$mail->Body = "De: {$_nome}<br />E-mail: {$_email}<br /><br /><strong>Atenção, não responda este e-mail!</strong>";
		$mail->AddAttachment("tmp/{$filename}");
		$mail->WordWrap = 50;
		$mail->IsHTML(true);
		if ($mail->Send()) {
			$smarty->assign('display', 'E-mail enviado com sucesso!');
			unlink("tmp/{$filename}");
			unset($_POST);
		}
		else { throw new SystemExeption('Ocorreu um erro ao enviar o e-mail'); }
	}
	catch (SystemExeption $e) {$smarty->assign('error', $e->getMessage());}
}

$smarty->assign('page', 'fazer-reserva-curso.htm');
?>