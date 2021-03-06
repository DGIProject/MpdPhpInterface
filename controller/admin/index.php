<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 11/01/2015
 * Time: 10:05
 */

include_once("model/admin/index.php");

if (isset($_GET['action']) && $_GET['action'] == "getServerInfo" && isset($_POST['cmd']))
{
    echo json_encode(getServerStats($_POST['id'], $_POST['cmd']));
    exit(0);
}
else if (isset($_GET['action']) && $_GET['action'] == "getLang")
{
    echo json_encode($CURRENT_LANG->mpd);
    exit(0);
}
else if (isset($_GET['action']) && $_GET['action'] == "getTypes")
{
    echo file_get_contents("config/mpdTypes.json");
    exit(0);
}
else if (isset($_GET['action']) && $_GET['action'] == "command" && isset($_POST['serverId']))
{
    echo json_encode(executeCommand($_POST['serverId'],$_POST['command'], $_POST['args']));
    exit(0);
}
$serversList = getServers();

include("data://text/plain,".urlencode(translate(file_get_contents("view/admin/index.php"))));