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
    if ($CURRENT_CONFIG->isInstalled == "true")
    {
        include("data://text/plain,".urlencode(translate(file_get_contents("view/install/installed.php"))));
        exit(0);
    }
    include_once("controller/install/index.php");
}
elseif (isset($_GET['type']) && $_GET['type'] == "admin")
{
    include_once("controller/admin/index.php");
}
elseif (isset($_GET['type']) && $_GET['type'] == "logout")
{
    session_destroy();
    header('Location: index.php');
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
