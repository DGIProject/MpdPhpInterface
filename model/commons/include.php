<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 09/01/2015
 * Time: 17:46
 */

function incl($path)
{
    include("data://text/plain,".urlencode(translate(file_get_contents($path))));
}