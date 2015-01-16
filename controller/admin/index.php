<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 11/01/2015
 * Time: 10:05
 */

include_once("model/admin/index.php");

$serversList = getServers();

include("data://text/plain,".urlencode(translate(file_get_contents("view/admin/index.php"))));