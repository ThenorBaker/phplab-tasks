<?php

use PHPUnit\Framework\TestCase;

class GetPaginationTest extends TestCase
{
    /**
     * @dataProvider providerPositiveData
     * @param $expected
     * @param $airports
     * @param $currentPage
     * @param $perPage
     */
    public function testPositive($expected, $airports, $currentPage, $perPage)
    {
        $this->assertEquals($expected, getPagination($airports, $currentPage, $perPage));
    }

    public function testWrongArgsType()
    {
        $this->expectException(TypeError::class);

        getPagination(2, 'string', 3);
    }

    public function providerPositiveData()
    {
        return [
            [   'expected_five_elements' =>
                [   0 => ['name' => 'Brace', 'state' => 'Georgia'],
                    1 => ['name' => 'Phil', 'state' => 'Georgia'],
                    2 => ['name' => 'Joe', 'state' => 'New Mexico'],
                    3 => ['name' => 'Brad', 'state' => 'Georgia'],
                    4 => ['name' => 'Jolly', 'state' => 'Alaska']
                ],
                'first_arg' => [
                    0 => ['name' => 'Phil', 'state' => 'Georgia'],
                    1 => ['name' => 'Joe', 'state' => 'New Mexico'],
                    2 => ['name' => 'Brad', 'state' => 'Georgia'],
                    3 => ['name' => 'Jolly', 'state' => 'Alaska'],
                    4 => ['name' => 'Bran', 'state' => 'California'],
                    5 => ['name' => 'Brace', 'state' => 'Georgia'],     /* <--- here 2 page starts */
                    6 => ['name' => 'Phil', 'state' => 'Georgia'],
                    7 => ['name' => 'Joe', 'state' => 'New Mexico'],
                    8 => ['name' => 'Brad', 'state' => 'Georgia'],
                    9 => ['name' => 'Jolly', 'state' => 'Alaska'],      /* <--- here 2 page ends */
                    10 => ['name' => 'Bran', 'state' => 'California'],
                    11 => ['name' => 'Bran', 'state' => 'California']
                ],
                'second_arg_page' => 2,
                'third_arg_perPage' => 5
            ],
        ];
    }
}

