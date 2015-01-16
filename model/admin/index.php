<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 12/01/2015
 * Time: 18:04
 */

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