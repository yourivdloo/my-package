<?php

namespace Yourivdloo\MyPackage;

class MyPackage
{

    protected static $characters = '0123456789';

    // Build your next great package.
    public static function getRandomNumber($length): string
    {
        $num = '';

        for ($i = 0; $i < $length; $i++) {
            $index = rand(0, strlen(self::$characters) - 1);
            $num .= self::$characters[$index];
        }
        return $num;
    }
}
