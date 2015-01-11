<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 08/01/2015
 * Time: 21:14
 */
function getLang($lang)
{
    $configFileContent = file_get_contents("config/lang/$lang.json");

    return json_decode($configFileContent, false);
}

function translate($pageContent)
{
    return preg_replace_callback("{{(.*?)}}", "getTranslationCb", $pageContent);
}

function getListLang()
{
    $directory = 'config/lang/';
    $scanned_directory = array_diff(scandir($directory), array('..', '.'));

    $langs = array();

    foreach($scanned_directory as $langFile);
    {
        $langs[] = json_decode(file_get_contents($directory.$langFile))->fullLanguageName;
    }

    return $langs;
}

function getTranslationCb($matches)
{
    return getTranslation($matches[1]);
}

function getTranslation($tag)
{
    global $CURRENT_LANG;
    $tags = explode('.', $tag);
    $value = $CURRENT_LANG;

    foreach ($tags as $tag)
    {
        $value = $value->$tag;
    }

    return $value;
}