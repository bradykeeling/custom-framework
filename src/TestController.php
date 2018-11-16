<?php
declare(strict_types=1);

namespace App;

class TestController
{
    public static function show()
    {
        return phpinfo();
    }
}