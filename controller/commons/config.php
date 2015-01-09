<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 08/01/2015
 * Time: 20:40
 */
session_start();
$_SESSION['lang'] = "fr";


include_once("model/commons/globalConfig.php");
include_once("model/commons/lang.php");
include_once("model/commons/include.php");

$CURRENT_CONFIG = getGlobalConfig();
$CURRENT_LANG = getLang($_SESSION['lang']);

if ($CURRENT_CONFIG->isInstalled == "false")
{
   include_once("controller/install/index.php");
}