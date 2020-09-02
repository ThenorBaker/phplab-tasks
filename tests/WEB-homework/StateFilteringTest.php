<?php

use PHPUnit\Framework\TestCase;

class StateFilteringTest extends TestCase
{
    /**
     * @dataProvider providerPositiveData
     * @param $expected
     * @param $airports
     * @param $state
     */
    public function testPositive($expected, $airports, $state)
    {
        $this->assertEquals($expected, stateFiltering($airports, $state));
    }

    public function testNegative()
    {
        $this->expectException(InvalidArgumentException::class);

        stateFiltering([['name' => 'Joe', 'state' => 123]], 'Georgia');
    }

    public function providerPositiveData()
    {
        return [
            [  'expected_multi_array' => [
                0 => ['name' => 'Phil', 'state' => 'Georgia'],
                2 => ['name' => 'Brad', 'state' => 'Georgia'],
                5 => ['name' => 'Brace', 'state' => 'Georgia']
            ],
                'first_arg_airports' => [
                    0 => ['name' => 'Phil', 'state' => 'Georgia'],
                    1 => ['name' => 'Joe', 'state' => 'New Mexico'],
                    2 => ['name' => 'Brad', 'state' => 'Georgia'],
                    3 => ['name' => 'Jolly', 'state' => 'Alaska'],
                    4 => ['name' => 'Bran', 'state' => 'California'],
                    5 => ['name' => 'Brace', 'state' => 'Georgia']
                ],
                'second_arg_state' => 'Georgia'
            ],
        ];
    }
}
