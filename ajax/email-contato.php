<?php
ob_start();
@error_reporting(E_ALL ^ E_NOTICE);
@ini_set('error_reporting', E_ALL);

include('../inc/functions.php');
    
        
    // $email_destinatario = "contato@viverdemusica.com"; 
    
    // $email_assunto = "Viver de Música - Site | Contato";
    
    $nome = $_POST['nome-contato'];
    $email = $_POST['email-contato'];
    $assunto = $_POST['assunto-contato'];
    $telefone = $_POST['telefone-contato'];
    $mensagem = $_POST['mensagem-contato'];
    $destinatario = $_POST['email-destinatario'];


        if ($nome == null || $email == null){
            exit;
        }

        $email_conteudo  = '<HTML>';
        $email_conteudo .= '<HEAD>';
        $email_conteudo .= '<TITLE>Konrad | Contato</TITLE>';
        $email_conteudo .= '</HEAD>';
        $email_conteudo .= '<BODY BGCOLOR="#FFFFFF">';
        $email_conteudo .= '<BR><B><FONT face="Verdana" size="2">Contato | Konrad</FONT></B>';
        $email_conteudo .= '<BR>';
        $email_conteudo .= '<BR><B><FONT face="Verdana" size="2">Nome</FONT></B>';
        $email_conteudo .= '<BR><FONT color="#0000FF" face="Verdana" size="2">'.$nome.'</FONT><BR>';

        $email_conteudo .= '<BR><B><FONT face="Verdana" size="2">Assunto</FONT></B>';
        $email_conteudo .= '<BR><FONT color="#0000FF" face="Verdana" size="2">'.$assunto.'</FONT><BR>';

        $email_conteudo .= '<BR><B><FONT face="Verdana" size="2">Email</FONT></B>';
        $email_conteudo .= '<BR><FONT color="#0000FF" face="Verdana" size="2">'.$email.'</FONT><BR>';

        $email_conteudo .= '<BR><B><FONT face="Verdana" size="2">Telefone</FONT></B>';
        $email_conteudo .= '<BR><FONT color="#0000FF" face="Verdana" size="2">'.$telefone.'</FONT><BR>';        

        $email_conteudo .= '<BR><B><FONT face="Verdana" size="2">Mensagem</FONT></B>';
        $email_conteudo .= '<BR><FONT color="#0000FF" face="Verdana" size="2">'.nl2br($mensagem).'</FONT>';

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
$mail->Subject = $assunto;
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
