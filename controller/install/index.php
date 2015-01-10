<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 08/01/2015
 * Time: 20:44
 */

if (!isset($_GET['step']) || $_GET['step'] == 0 )
{
    if (isset($_GET['action']) && $_GET['action'] == "updateLang")
    {
        $CURRENT_CONFIG->lang = $_POST['lang'];
        $CURRENT_CONFIG->installState = 1;
        updateConfig();
        echo 'true';
        exit(0);
    }
    $listLang = getListLang();

    include("data://text/plain,".urlencode(translate(file_get_contents("view/install/index.php"))));

}
elseif ($_GET['step'] == 1 && $CURRENT_CONFIG->installState == 1 )
{
    include_once("model/install/step1.php");

    if (isset($_GET['action']) && $_GET['action'] == "addAdmin" && isset($_POST['username']))
    {
        addAdmin($_POST['username'], $_POST['password']);
        $CURRENT_CONFIG->installState = 2;
        updateConfig();
        echo 'true';
        exit(0);
    }
    include("data://text/plain,".urlencode(translate(file_get_contents("view/install/step1.php"))));
}
elseif ($_GET['step'] == 2 && $CURRENT_CONFIG->installState == 2 )
{
    include_once("model/install/step2.php");

    if (isset($_GET['action']) && $_GET['action'] == "addServer" && isset($_POST['hostName']) && isset($_POST['name']))
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
            $CURRENT_CONFIG->installState = 3;
            $CURRENT_CONFIG->isInstalled = "true";
            updateConfig();
        }
        echo $return;
        exit(0);
    }
    include("data://text/plain,".urlencode(translate(file_get_contents("view/install/step2.php"))));
}
elseif ($_GET['step'] == 3 && $CURRENT_CONFIG->installState == 3 )
{
    include("data://text/plain,".urlencode(translate(file_get_contents("view/install/step3.php"))));
}
