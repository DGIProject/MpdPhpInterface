<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 11/01/2015
 * Time: 09:44
 */

include_once("controller/commons/config.php");

if (!isset($_SESSION['user']))
{
    include_once("controller/admin/login.php");
}
else
{
    if (isset($_GET['type']) && $_GET['type'] == "addServer")
    {
        include_once("controller/admin/addServer.php");
    }
    else
    {
        include_once("controller/admin/index.php");
    }
}