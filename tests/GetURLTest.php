<?php

use PHPUnit\Framework\TestCase;

class GetURLTest extends TestCase
{
    /**
     * @dataProvider providerPositiveData
     * @param  $expected
     * @param  $currentURL
     * @param  $key
     * @param  $value
     * @param  $pageReset
     */
    public function testPositive($expected, $currentURL, $key, $value, $pageReset)
    {
        $this->assertEquals($expected, getURL($currentURL, $key, $value, $pageReset));
    }

    public function testWrongArgsType()
    {
        $this->expectException(TypeError::class);

        getURL(2, 'string', 3, true);
    }

    public function providerPositiveData()
    {
        return [
            [   'expected_string' => "/?page=1&sort=state&filter_by_first_letter=Y",
                'first_arg_currentURL' => ['page' => '4', 'sort' => 'state'],
                'second_arg_key' => 'filter_by_first_letter',
                'third_arg_value' => 'Y',
                'fourth_arg_pageReset' => true
            ],
        ];
    }
}

