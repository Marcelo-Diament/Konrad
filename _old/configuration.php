<?php
/**
 * @copyright Konrad - Sistemas de Competitividade
 * @author Diógenes Konrad Götz
 * @link   www.gotz.com.br
 */

/**
 * INFORMAÇÕES DE ACESSO AO BANCO DE DADOS
 * Modifique estas informações para conectar-SE ao seu banco de dados
 */
define('DBHOST', '200.234.202.112');    # Host para conexão com o banco de daddos
define('DBNAME', 'konrad');                    # Nome do banco de dados
define('DBUSER', 'konrad');                    # Usuário de acesso ao banco
define('DBPASS', 'n0vopr0ved0r');              # Senha de acesso ao banco
define('DBPER', false);                        # Conexão persistente

/**
 * CONFIGURAÇÕES DE ENVIO DE E-MAIL
 * Sete abaixo as configurações do servidor de emails
 */
define('SMTPUSER', 'website@konrad.com.br');
define('SMTPPASS', '102030');

/**
 * CONSTANTES DO SISTEMA
 */
define('SMARTYDIR','smarty/');
define('CLASSDIR','classes/');
define('ADMINCLASS','../classes/');
define('UPLOADDIR','media/images/upload/');

$ArrMonths = array();
$ArrMonths['1']  = "Janeiro";
$ArrMonths['2']  = "Fevereiro";
$ArrMonths['3']  = "Março";
$ArrMonths['4']  = "Abril";
$ArrMonths['5']  = "Maio";
$ArrMonths['6']  = "Junho";
$ArrMonths['7']  = "Julho";
$ArrMonths['8']  = "Agosto";
$ArrMonths['9']  = "Setembro";
$ArrMonths['10'] = "Outubro";
$ArrMonths['11'] = "Novembro";
$ArrMonths['12'] = "Dezembro";

define('ROOTFOLDER', 'http://www.konrad.com.br');
?>