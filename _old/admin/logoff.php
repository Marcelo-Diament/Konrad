<?php
/**
 * Project:     GERENCIADOR DE SITES
 * File:        LOGOFF.PHP
 * 
 * @author Di�genes Konrad G�tz
 * @copyright G�tz & Konrad
 * @link http://www.gotz.com.br
 */

session_start();
session_destroy();

header('Location: index.php');
?>