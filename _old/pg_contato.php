<?php
/**
 * @copyright Konrad - Sistemas de Competitividade
 * @author Diógenes Konrad Götz
 * @link   www.gotz.com.br
 */

$_nome       = (string) trim($_POST['nome']);
$_email      = (string) trim($_POST['email']);
$_mensagem   = (string) $_POST['mensagem'];

/**
 * FILTRA OS DADOS ENVIADOS PELO USUARIO
 */
$_nome = strip_tags($_nome);
$_nome = preg_replace('!\s+!', ' ', $_nome);
$_nome = wordwrap($_nome, 50, ' ', true);
$_nome = str_replace('\"', "", $_nome);
$_nome = str_replace("\'", "", $_nome);
$_POST['nome'] = $_nome;

$_email = strip_tags($_email);
$_email = preg_replace('!\s+!', ' ', $_email);
$_email = wordwrap($_email, 50, ' ', true);
$_email = str_replace('\"', "", $_email);
$_email = str_replace("\'", "", $_email);
$_POST['email'] = $_email;

$_mensagem = strip_tags($_mensagem);
$_mensagem = preg_replace('!\s+!', ' ', $_mensagem);
$_mensagem = wordwrap($_mensagem, 50, ' ', true);
$_mensagem = str_replace('\"', "", $_mensagem);
$_mensagem = str_replace("\'", "", $_mensagem);
$_POST['mensagem'] = $_mensagem;

if ($_POST['sended'])
{
	try
	{
		if (!$_nome) throw new SystemExeption('Informe seu nome para contato');
		if (!$_email) throw new SystemExeption('Informe seu E-mail');
		if (!defaultValid::email($_email)) throw new SystemExeption('E-mail inválido');
		if (!$_mensagem) throw new SystemExeption('Informe uma mensagem');

		$mail = new PHPGMailer();
		$mail->IsSMTP();
		$mail->Username = SMTPUSER;
		$mail->Password = SMTPPASS;
		$mail->From     = SMTPUSER;
		$mail->FromName = $_nome;
		$mail->AddAddress("sergio@konrad.com.br", "Konrad");
		$mail->Subject = "Contato através do website";
		$mail->Body = "De: {$_nome}<br />E-mail: {$_email}<br /><br />{$_mensagem}<br /><br /><strong>Atenção, não responda este e-mail!</strong>";
		$mail->WordWrap = 50;
		$mail->IsHTML(true);
		if ($mail->Send()) {
			$smarty->assign('display', 'E-mail enviado com sucesso!');
			unset($_POST);
		}
		else { throw new SystemExeption('Ocorreu um erro ao enviar o e-mail'); }
	}
	catch (SystemExeption $e) {$smarty->assign('error', $e->getMessage());}
}

$smarty->assign('page', 'contato.htm');
?>