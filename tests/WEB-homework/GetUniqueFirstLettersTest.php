<?php

use PHPUnit\Framework\TestCase;

class GetUniqueFirstLettersTest extends TestCase
{
    /**
     * @dataProvider providerPositiveData
     * @param $input
     * @param $expected
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, getUniqueFirstLetters($input));
    }

    public function testWrongArgsType()
    {
        $this->expectException(TypeError::class);

        getUniqueFirstLetters(23);
    }

    public function providerPositiveData()
    {
        return [
            [
                [
                    ['name' => 'Arena', 'code' => 'GSC'],
                    ['name' => 'Royal', 'code' => 'GAX'],
                    ['name' => 'Cloud', 'code' => 'CSF'],
                    ['name' => 'Forward', 'code' => 'ABQ'],
                    ['name' => 'Forward', 'code' => 'FSC'],
                    ['name' => 'Forward', 'code' => 'QAD'],
                    ['name' => 'Z-Index', 'code' => 'CDV']
                ],
                ['A', 'C', 'F', 'R', 'Z']
            ]
        ];
    }
}
