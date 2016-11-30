<?php

/**
 * Get Syrator third-party package directory：\syrator
 *
 * @return string
 **/
function dys_path() {
    $dir = dirname(dirname(__FILE__));
    return $dir;
}


/**
 * Get Dictionary config
 *
 * @return mixed
 */
function dict($dot_key = null, $default = null)
{
    $dict = app('Syrator\Dict');
    return $dict->getDict($dot_key, $default);
}
