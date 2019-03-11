<?php

use Blx32\I2P\Url;

if (!function_exists('b32')) {
    function b32($b64)
    {
        return Url::b32($b64);
    }
}
if (!function_exists('i2pHelperAddress')) {
    function i2pHelperAddress($url, $b64)
    {
        return Url::i2pHelperAddress($url, $b64);
    }
}