<?php
ob_start();
@error_reporting(E_ALL ^ E_NOTICE);
@ini_set('error_reporting', E_ALL);

include('../inc/functions.php');

    $destinatario = $_POST['email-destinatario'];
    //$nome = 'Konrad';

    $treinamentoescolhido = $_POST['treinamentoescolhido'];
    $treinamentocidade = $_POST['treinamentocidade'];
    $treinamentolocal = $_POST['treinamentolocal'];
    $treinamentoduracao = $_POST['treinamentoduracao'];
    $treinamentocarga = $_POST['treinamentocarga'];
    $treinamentohorario = $_POST['treinamentohorario'];    

    $participantes_nome = $_POST['turmanome'];
    $participantes_cpf = $_POST['turmacpf'];
    $participantes_email = $_POST['turmaemail'];
    $participantes_empresa = $_POST['turmaempresa'];
    $participantes_cargo = $_POST['turmacargo'];
    $participantes_endereco = $_POST['turmaendereco'];
    $participantes_telefone = $_POST['turmatelefone'];

    $total = count($participantes_nome);
    
    $tipo = $_POST['turmatipocliente'];

    if($tipo == 'Cliente ativo' || $tipo == 'Demais interessados'){
        $subtipo = '';
    }

    if($tipo == 'Parceiro'){
        $subtipo = '- '.$_POST['turmaparceironome'];
    }

    if($tipo == 'Outro cfe. de divulgação'){
        $subtipo = '- '.$_POST['turmacfenome'];
    }

    $notatipo = $_POST['turmapessoa'];
    $notanome = $_POST['turmanotarazao'];
    $notacpf = $_POST['turmanotacpf'];
    $notainscricao = $_POST['turmanotaie'];
    $notacep = $_POST['turmanotacep'];
    $notacidade = $_POST['turmanotacidade'];
    $notauf = $_POST['turmanotauf'];
    $notaendereco = $_POST['turmanotaendereco'];
    $notatelefone = $_POST['turmanotatelefone'];

    $notareceber = $_POST['turmaentreganota'];

    if($notareceber == 'Por correio'){
        $complementonotareceber = ' - '.$_POST['turmaendereconota'].' - '.$_POST['turmacidadenota'].' - '.$_POST['turmaufnota'].' - CEP: '.$_POST['turmacepnota'];
    }else{
        $complementonotareceber = '';
    }

        $email_conteudo  = '<HTML>';
        $email_conteudo .= '<HEAD>';
        $email_conteudo .= '<TITLE>Konrad | Contato (Treinamento)</TITLE>';
        $email_conteudo .= '</HEAD>';
        $email_conteudo .= '<BODY BGCOLOR="#FFFFFF">';
        $email_conteudo .= '<BR><B><FONT face="Verdana" size="2">Inscrição em Treinamento | Konrad</FONT></B>';
        $email_conteudo .= '<BR>';
        $email_conteudo .= '<BR><B><FONT face="Verdana" size="2">Dados do treinamento:</FONT></B>';
        $email_conteudo .= '<BR><FONT color="#0000FF" face="Verdana" size="2"><b>Treinamento selecionado:</b> '.$treinamentoescolhido.'</FONT>';
        $email_conteudo .= '<BR><FONT color="#0000FF" face="Verdana" size="2"><b>Cidade:</b> '.$treinamentocidade.'</FONT>';
        $email_conteudo .= '<BR><FONT color="#0000FF" face="Verdana" size="2"><b>Local:</b> '.$treinamentolocal.'</FONT>';
        $email_conteudo .= '<BR><FONT color="#0000FF" face="Verdana" size="2"><b>Duração:</b> '.$treinamentoduracao.'</FONT>';
        $email_conteudo .= '<BR><FONT color="#0000FF" face="Verdana" size="2"><b>Carga:</b> '.$treinamentocarga.'</FONT>';
        $email_conteudo .= '<BR><FONT color="#0000FF" face="Verdana" size="2"><b>Horário: </b> '.$treinamentohorario.'</FONT><br><br>';

        $email_conteudo .= '<BR><B><FONT face="Verdana" size="2">Tipo de cliente:</FONT></B>';
        $email_conteudo .= '<BR><FONT color="#0000FF" face="Verdana" size="2"><b>Total de inscritos:</b> '.$tipo.' '.$subtipo.'</FONT><br><br>';

        $email_conteudo .= '<BR><B><FONT face="Verdana" size="2">Participantes:</FONT></B>';
        $email_conteudo .= '<BR><FONT color="#0000FF" face="Verdana" size="2"><b>Total de inscritos:</b> '.$total.'</FONT><br><br>';

        for($i=0; $i < $total; $i++){ 
            $b = $i+1;
            $email_conteudo .= '<BR><B><FONT face="Verdana" size="2">Participante '.$b.'</FONT></B>';
            $email_conteudo .= '<BR><FONT color="#0000FF" face="Verdana" size="2"><b>Nome:</b> '.$participantes_nome[$i].'</FONT>';
            $email_conteudo .= '<BR><FONT color="#0000FF" face="Verdana" size="2"><b>CPF:</b> '.$participantes_cpf[$i].'</FONT>';
            $email_conteudo .= '<BR><FONT color="#0000FF" face="Verdana" size="2"><b>Email:</b> '.$participantes_email[$i].'</FONT>';
            $email_conteudo .= '<BR><FONT color="#0000FF" face="Verdana" size="2"><b>Empresa:</b> '.$participantes_empresa[$i].'</FONT>';
            $email_conteudo .= '<BR><FONT color="#0000FF" face="Verdana" size="2"><b>Cargo: </b> '.$participantes_cargo[$i].'</FONT>';
            $email_conteudo .= '<BR><FONT color="#0000FF" face="Verdana" size="2"><b>Endereço: </b> '.$participantes_endereco[$i].'</FONT>';
            $email_conteudo .= '<BR><FONT color="#0000FF" face="Verdana" size="2"><b>Telefone: </b> '.$participantes_telefone[$i].'</FONT><br><br>';
        }


        $email_conteudo .= '<BR><B><FONT face="Verdana" size="2">Emissão de Nota: </FONT></B>';
        $email_conteudo .= '<BR><FONT color="#0000FF" face="Verdana" size="2"><b>Tipo:</b> '.$notatipo.'</FONT>';
        $email_conteudo .= '<BR><FONT color="#0000FF" face="Verdana" size="2"><b>Nome/Razão Social:</b> '.$notanome.'</FONT>';
        $email_conteudo .= '<BR><FONT color="#0000FF" face="Verdana" size="2"><b>CPF/CNPJ:</b> '.$notacpf.'</FONT>';
        if ($notainscricao) {
            $email_conteudo .= '<BR><FONT color="#0000FF" face="Verdana" size="2"><b>Inscrição Estadual:</b> '.$notainscricao.'</FONT>';
        }
        $email_conteudo .= '<BR><FONT color="#0000FF" face="Verdana" size="2"><b>CEP:</b> '.$notacep.'</FONT>';
        $email_conteudo .= '<BR><FONT color="#0000FF" face="Verdana" size="2"><b>Cidade:</b> '.$notacidade.' - '.$notauf.'</FONT>';
        $email_conteudo .= '<BR><FONT color="#0000FF" face="Verdana" size="2"><b>Endereço: </b> '.$notaendereco.'</FONT><br><br>';
        $email_conteudo .= '<BR><FONT color="#0000FF" face="Verdana" size="2"><b>Telefone: </b> '.$notatelefone.'</FONT><br><br>';
        $email_conteudo .= '<BR><FONT color="#0000FF" face="Verdana" size="2"><b>Envio: </b> '.$notareceber.$complementonotareceber.'</FONT><br><br>';
        

        $email_conteudo .= '</BODY>';
        $email_conteudo .= '</HTML>';


        
        


/*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/

include_once("./phpmailer/class.phpmailer.php");

$mail = new PHPMailer();
$mail->CharSet = 'UTF-8';
$body = $email_conteudo;
$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host = "email-ssl.com.br"; // SMTP server
$mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
// 1 = errors and messages
// 2 = messages only
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->SMTPSecure = "ssl";
$mail->Port = "465"; // set the SMTP port for the service server
$mail->Username = 'site@konrad.com.br'; // account username
$mail->Password = 'eitodos2014*'; // account password

$mail->SetFrom('site@konrad.com.br', 'Konrad | Site');
$mail->Subject = "Konrad | Inscrição em Treinamento - Site";
$mail->MsgHTML($body);
//$mail->addReplyTo($email, $nome);
// $mail->AddAddress('vicente@eitodos.com.br', "Konrad");
$mail->AddAddress($destinatario, "Konrad");

if(!$mail->Send()) {
$mensagemRetorno = 'Erro ao enviar e-mail: '. print($mail->ErrorInfo);
header( "Refresh:5; url=../contato/", true, 303);
} else {
header( "Location: ../mensagem-enviada/", true, 303);
}
ob_end_flush();
?>
