<?php

namespace Tests;

use App\Example;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /** @test */
    public function it_tests_if_tests_are_working()
    {
        $example = new Example;
        $this->assertEquals($example->testForTrue(), true);
    }
}