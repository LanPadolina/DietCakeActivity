<?php

function eh($string)
{
    if (!isset($string)) return;
    echo htmlspecialchars($string, ENT_QUOTES);
}

function readable_text($s)
{
$s = htmlspecialchars($s, ENT_QUOTES);
$s = nl2br($s);
return $s;
}

//route generator for pagerfanta for pagination
function routeGenerator($page)
{
    return $_SERVER['REDIRECT_URL'].'?page='."$page";
}
