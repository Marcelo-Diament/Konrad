<?php
/**
 * Project:     GERENCIADOR DE SITES
 * File:        LOGOFF.PHP
 * 
 * @author Diógenes Konrad Götz
 * @copyright Götz & Konrad
 * @link http://www.gotz.com.br
 */

session_start();
session_destroy();

header('Location: index.php');
?>