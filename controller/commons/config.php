<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 08/01/2015
 * Time: 20:40
 */
session_start();


include_once("model/commons/globalConfig.php");
include_once("model/commons/lang.php");

$CURRENT_CONFIG = getGlobalConfig();
$CURRENT_LANG = getLang($CURRENT_CONFIG->lang);

