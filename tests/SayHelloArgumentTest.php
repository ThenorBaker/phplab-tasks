<?php

use PHPUnit\Framework\TestCase;

class SayHelloArgumentTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, sayHelloArgument($input));
    }

    public function positiveDataProvider()
    {
        return [
            [ 'World', 'Hello World'],
            [23, 'Hello 23'],
            [23.7, 'Hello 23.7'],
            [true, 'Hello 1'],
            [false, 'Hello '],
        ];
    }
}
