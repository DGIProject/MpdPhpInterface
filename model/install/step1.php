<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 10/01/2015
 * Time: 13:58
 */

function addAdmin($username, $password)
{
    $user = array(array("username" => $username, "password" => sha1($password), "class" => 0));
    $user = json_encode($user);
    return file_put_contents("config/users.json",$user);
}