<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 12/01/2015
 * Time: 18:04
 */

use Web10Mpc\Mpd;

function autoLoadClass($className) {
    require_once('model/class/' . str_replace('\\', '/', $className) . '.php');
}

spl_autoload_register('autoLoadClass');

function getServers()
{
    $list = json_decode(file_get_contents("config/servers.json"), true);
    return $list;
}

function getServerById($id)
{
    $list = json_decode(file_get_contents("config/servers.json"), true);
    return $list[$id];
}

function executeCommand($id,$command, $argv)
{
    $ids = getServerById($id);
    $host = $ids['hostName'];
    $port = $ids['port'];
    $pass = $ids['password'];

    if ($pass == '')
    {
        $pass = NULL;
    }

    try {
        $mpd = new Mpd\Mpd("$host", $port, $pass );
        $mpd->connect();
        $response = $mpd->executeCommand("$command", "$argv");
        $mpd->disconnect();
    } catch (\Exception $ex) {
        return array("code" => -1, "data" => $ex->__toString());
    }
    return array("code" => 0, "data" => $response);
}

function getServerStats($id, $cmd)
{
    $ids = getServerById($id);
    $host = $ids['hostName'];
    $port = $ids['port'];
    $pass = $ids['password'];
    if ($pass == '')
    {
        $pass = NULL;
    }

    try {
        $mpd = new Mpd\Mpd("$host", $port, $pass );
        $mpd->connect();
        $response = $mpd->executeCommand("$cmd");
        $mpd->disconnect();
    } catch (\Exception $ex) {
        return array("code" => -1, "data" => $ex->__toString());
    }
    return array("code" => 0, "data" => $response);
}