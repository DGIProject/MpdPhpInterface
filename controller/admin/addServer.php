<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 12/01/2015
 * Time: 18:24
 */
include_once("model/admin/addServer.php");

if (isset($_GET['action']) && $_GET['action'] == "addServer")
{
    if ($_POST['password'] == '')
    {
        $pass = NULL;
    }
    else{
        $pass = $_POST['password'];
    }
    $return = (is_array(checkServer($_POST['hostName'],$pass, intval($_POST['port']))))? "true" : "false";
    if ($return) {
        addServer($_POST['name'], $_POST['hostName'], $_POST['password'], $_POST['port']);
    }
    echo $return;
    exit(0);
}

include("data://text/plain,".urlencode(translate(file_get_contents("view/admin/addServer.php"))));