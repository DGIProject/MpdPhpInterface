<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 08/01/2015
 * Time: 20:34
 */

function getGlobalConfig()
{
    $configFileContent = file_get_contents("config/globalConfig.json");

    return json_decode($configFileContent);
}



function updateConfig()
{
    global $CURRENT_CONFIG;
    $json = json_encode($CURRENT_CONFIG);
    file_put_contents("config/globalConfig.json",$json);
}