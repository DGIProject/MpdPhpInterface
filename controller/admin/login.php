<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 11/01/2015
 * Time: 17:41
 */
include_once("model/admin/login.php");

if (isset($_GET['action']) && $_GET['action'] == "login")
{
    if( login($_POST['username'], $_POST['password']))
    {
        $_SESSION['user'] = $_POST['username'];
        echo 'true';
    }
    else
    {
        echo 'false';
    }
    exit(0);
}

include("data://text/plain,".urlencode(translate(file_get_contents("view/admin/login.php"))));
