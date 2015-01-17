<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 11/01/2015
 * Time: 10:05
 */

include_once("model/admin/index.php");

if (isset($_GET['action']) && $_GET['action'] == "getServerInfo")
{
    echo json_encode(getServerStats($_POST['id'], $_POST['cmd']));
    exit(0);
}
else if (isset($_GET['action']) && $_GET['action'] == "getLang")
{
    echo json_encode($CURRENT_LANG->mdp);
    exit(0);
}
else if (isset($_GET['action']) && $_GET['action'] == "getTypes")
{
    echo file_get_contents("config/mpdTypes.json");
    exit(0);
}
$serversList = getServers();

include("data://text/plain,".urlencode(translate(file_get_contents("view/admin/index.php"))));