<?php

use PHPUnit\Framework\TestCase;

class GetPagesCountTest extends TestCase
{
    /**
     * @dataProvider providerPositiveData
     * @param $expected
     * @param $airports
     * @param $perPage
     */
    public function testPositive($expected, $airports, $perPage)
    {
        $this->assertSame($expected, getPagesCount($airports, $perPage));
    }

    public function testWrongArgType()
    {
        $this->expectException(TypeError::class);

        getPagesCount('String');
    }

    public function providerPositiveData()
    {
        return [
            [  'expected_pages_count' => (int) 2,
                'arg' => [
                    0 => ['name' => 'Phil', 'state' => 'Georgia'],
                    1 => ['name' => 'Joe', 'state' => 'New Mexico'],
                    2 => ['name' => 'Brad', 'state' => 'Georgia'],
                    3 => ['name' => 'Jolly', 'state' => 'Alaska'],
                    4 => ['name' => 'Bran', 'state' => 'California'],
                    5 => ['name' => 'Brace', 'state' => 'Georgia']
                ],
                'perPage' => 5
            ],
        ];
    }
}
