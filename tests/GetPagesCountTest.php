<?php

use PHPUnit\Framework\TestCase;

class GetPagesCountTest extends TestCase
{
    protected function setUp(): void
    {
        define('PER_PAGE', 5);
    }

    /**
     * @dataProvider providerPositiveData
     * @param $expected
     * @param $airports
     */
    public function testPositive($expected, $airports)
    {
        $this->assertSame($expected, getPagesCount($airports));
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
                ]
            ],
        ];
    }
}
