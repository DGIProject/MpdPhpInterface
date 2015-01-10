<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 08/01/2015
 * Time: 20:30
 */

include_once("controller/commons/config.php");

if (isset($_GET['type']) && $_GET['type'] == "install")
{
    include_once("controller/install/index.php");
}
else{
    if ($CURRENT_CONFIG->isInstalled == "false")
    {
        include_once("controller/install/index.php");
    }
    else
    {
        include_once("controller/Standard/index.php");
    }
}
