<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 11/01/2015
 * Time: 10:09
 */

function login($user, $pass)
{
    $userFile = json_decode(file_get_contents("config/users.json"), true);
    for ($i = 0; $i<count($userFile);$i++)
    {
        if ($userFile[$i]['username'] == $user && $userFile[$i]['class'] == 0 && $userFile[$i]['password'] == sha1($pass))
        {
            return true;
        }
    }
    return false;
}