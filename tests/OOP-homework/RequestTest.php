<?php

use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    /**
     * @dataProvider providerPositiveData
     */
    public function testGet()
    {
        $obj = new Request();

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
