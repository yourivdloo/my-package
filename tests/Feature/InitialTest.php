<?php

namespace Yourivdloo\MyPackage\Tests;

use Exception;
use Orchestra\Testbench\TestCase;
use Yourivdloo\MyPackage\MyPackage;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertFileDoesNotExist;
use function PHPUnit\Framework\assertNotEquals;
use function PHPUnit\Framework\assertTrue;

class InitialTest extends TestCase
{


    /**
     * @test 
     * */
    public function my_first_test()
    {
        $myPackage = new MyPackage();
        config(['my-package.max_num_length' => 10]);
        assertEquals(strlen($myPackage->getRandomNumber(8)), 8);
    }

    /**
     * @test 
     * */
    public function my_second_test()
    {
        $myPackage = new MyPackage();
        config(['my-package.max_num_length' => 10]);
        assertNotEquals(strlen($myPackage->getRandomNumber(8)), 4);
    }
    /**
     * @test 
     * */
    public function missing_config_test()
    {
        $myPackage = new MyPackage();
        $this->expectExceptionMessage('Missing config file');
        $myPackage->getRandomNumber(8);
    }

    /**
     * @test 
     * */
    public function exception_test()
    {
        $myPackage = new MyPackage();
        config(['my-package.max_num_length' => 4]);
        $this->expectException(Exception::class);
        $myPackage->getRandomNumber(8);
    }
}
