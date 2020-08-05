<?php

use PHPUnit\Framework\TestCase;

class GetUniqueFirstLettersTest extends TestCase
{
    /**
     * @dataProvider providerPositiveData
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, getUniqueFirstLetters($input));
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
