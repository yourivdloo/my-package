<?php

namespace Yourivdloo\MyPackage;

use Exception;

class MyPackage
{

    protected static $characters = '0123456789';

    // Build your next great package. last webhook commit
    public static function getRandomNumber($length): string
    {

        if (is_null(config('my-package'))) {
            throw new Exception("Missing config file");
        }
        if ($length > config("my-package.max_num_length")) {
            throw new Exception("Package configured with a max number length of " . strval(config("my-package.max_num_length")) . " - Passed a length of " . strval($length));
        }
        $num = '';

        for ($i = 0; $i < $length; $i++) {
            $index = rand(0, strlen(self::$characters) - 1);
            $num .= self::$characters[$index];
        }
        return $num;
    }
}
