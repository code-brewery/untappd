<?php

namespace CodeBrewery\Untappd;

class Str
{
    public static function camel($string)
    {
        return lcfirst(static::studly($string));
    }

    public static function studly($string)
    {
        return str_replace(' ', '', ucwords(str_replace(['_', '-'], ' ', $string)));
    }
}
