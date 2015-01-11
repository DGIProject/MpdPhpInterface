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
    include_once("controller/admin/index.php");
}