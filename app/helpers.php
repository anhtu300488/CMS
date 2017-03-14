<?php
/**
 * Return nav-here if current path begins with this path.
 *
 * @param string $path
 * @return string
 */
use Illuminate\Http\Request;
function setActive($path)
{
    return \Request::is($path . '*') ? ' class=active' :  '';
}

function setOpen($path)
{
    return \Request::is($path . '*') ? ' class=open' :  '';
}