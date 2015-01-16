<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 16/01/2015
 * Time: 16:21
 */

use Web10Mpc\Mpd;

function autoLoadClass($className) {
    require_once('model/class/' . str_replace('\\', '/', $className) . '.php');
}

spl_autoload_register('autoLoadClass');

function checkServer($host, $pass = NULL, $port = 6600){
    try {
        $mpd = new Mpd\Mpd("$host", $port, $pass );
        $mpd->connect();
        $response = $mpd->executeCommand("stats");
        $mpd->disconnect();
    } catch (\Exception $ex) {
        return $ex->__toString();
    }
    return $response;
}

function addServer($name,$host, $pass, $port)
{
    $currentServers = json_decode(file_get_contents("config/servers.json"),true);
    $currentServers[] = array("hostName" => $host, "password" => $pass, "port" => $port, "name" => $name);
    file_put_contents("config/servers.json", json_encode($currentServers));
}