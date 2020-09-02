<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsTest extends TestCase
{
    public function testNoArg()
    {
        $this->assertTrue(['argument_count' => 0, 'argument_values' => []] === countArguments());
    }

    public function testOneArg()
    {
        $this->assertTrue(['argument_count' => 1, 'argument_values' => [12]] === countArguments(12));
    }

    public function testSeveralArgs()
    {
        $this->assertTrue(['argument_count' => 5, 'argument_values' => [12, true, false,'string', 1.2]] === countArguments(12, true, false, 'string', 1.2));
    }
}
