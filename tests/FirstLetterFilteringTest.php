<?php

use PHPUnit\Framework\TestCase;

class FirstLetterFilteringTest extends TestCase
{
    /**
     * @dataProvider providerPositiveData
     * @param $names
     * @param $letter
     * @param $expected
     */
    public function testPositive($expected, $names, $letter)
    {
        $this->assertEquals($expected, firstLetterFiltering($names, $letter));
    }

    public function testWrongArgsType()
    {
        $this->expectException(TypeError::class);

        firstLetterFiltering(false, true);
    }

    public function testWrongComparisonUnits()
    {
        $this->expectException(InvalidArgumentException::class);

        firstLetterFiltering([['name' => true]], 'a');
    }

    public function providerPositiveData()
    {
        return [
            [  'expected_multi_array' => [
                2 => ['name' => 'Brad'],
                4 => ['name' => 'Bran'],
                5 => ['name' => 'Brace']
            ],
                'first_arg_names' => [
                    0 => ['name' => 'Phil'],
                    1 => ['name' => 'Joe'],
                    2 => ['name' => 'Brad'],
                    3 => ['name' => 'Jolly'],
                    4 => ['name' => 'Bran'],
                    5 => ['name' => 'Brace']
                ],
                'second_arg_letter' => 'B'
            ],
        ];
    }
}
