<?php

use PHPUnit\Framework\TestCase;

class SortByKeyTest extends TestCase
{
    /**
     * @dataProvider providerPositiveData
     * @param $expected
     * @param $airports
     * @param $sortKey
     */
    public function testPositive($expected, $airports, $sortKey)
    {

        $this->assertEquals($expected, sortByKey($airports, $sortKey));
    }

    public function testNegative()
    {
        $this->expectException(InvalidArgumentException::class);

        sortByKey([['name' => 'Joe', 'state' => 'New Mexico']], 'Something else');
    }

    public function providerPositiveData()
    {
        return [
            [  'expected_multi_array_first' => [
                0 => ['name' => 'Brace', 'state' => 'Georgia'],
                1 => ['name' => 'Brad', 'state' => 'Georgia'],
                2 => ['name' => 'Bran', 'state' => 'California'],
                3 => ['name' => 'Joe', 'state' => 'New Mexico'],
                4 => ['name' => 'Jolly', 'state' => 'Alaska'],
                5 => ['name' => 'Phil', 'state' => 'Georgia'],
            ],
                'first_arg_airports' => [
                    0 => ['name' => 'Phil', 'state' => 'Georgia'],
                    1 => ['name' => 'Joe', 'state' => 'New Mexico'],
                    2 => ['name' => 'Brad', 'state' => 'Georgia'],
                    3 => ['name' => 'Jolly', 'state' => 'Alaska'],
                    4 => ['name' => 'Bran', 'state' => 'California'],
                    5 => ['name' => 'Brace', 'state' => 'Georgia']
                ],
                'second_arg_sortKey' => 'name' /* NAME filtering */
            ],
            [  'expected_multi_array_second' => [
                0 => ['name' => 'Jolly', 'state' => 'Alaska'],
                1 => ['name' => 'Bran', 'state' => 'California'],
                2 => ['name' => 'Phil', 'state' => 'Georgia'],
                3 => ['name' => 'Brad', 'state' => 'Georgia'],
                4 => ['name' => 'Brace', 'state' => 'Georgia'],
                5 => ['name' => 'Joe', 'state' => 'New Mexico'],
            ],
                'first_arg_airports' => [
                    0 => ['name' => 'Phil', 'state' => 'Georgia'],
                    1 => ['name' => 'Joe', 'state' => 'New Mexico'],
                    2 => ['name' => 'Brad', 'state' => 'Georgia'],
                    3 => ['name' => 'Jolly', 'state' => 'Alaska'],
                    4 => ['name' => 'Bran', 'state' => 'California'],
                    5 => ['name' => 'Brace', 'state' => 'Georgia']
                ],
                'second_arg_sortKey' => 'state'   /* STATE filtering */
            ],
        ];
    }
}
