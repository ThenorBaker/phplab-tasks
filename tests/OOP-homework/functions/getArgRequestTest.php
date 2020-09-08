<?php

use PHPUnit\Framework\TestCase;

class getArgRequestTest extends TestCase
{
    /**
     * @dataProvider providerArgRequest
     * @param mixed $expected
     * @param string $input
     */
    public function testGetArgRequestPositive($expected, $input)
    {
        $this->assertEquals($expected, getArgRequest($input));
    }

    public function testGetArgRequestNegative()
    {
        $this->expectException(TypeError::class);
        getArgRequest([23]);
    }

    /**
     * @dataProvider providerArgCookie
     * @param mixed $expected
     * @param string $input
     */
    public function testGetArgCookiePositive($expected, $input)
    {
        $this->assertEquals($expected, getArgCookie($input));
    }

    public function testGetArgCookieNegative()
    {
        $this->expectException(TypeError::class);
        getArgCookie([23]);
    }

    /**
     * @dataProvider providerArgSession
     * @param mixed $expected
     * @param string $input
     */
    public function testGetArgSessionPositive($expected, $input)
    {
        $this->assertEquals($expected, getArgSession($input));
    }

    public function testGetArgSessionNegative()
    {
        $this->expectException(TypeError::class);
        getArgSession([23]);
    }

    public function providerArgRequest()
    {
        return [
            [
                'expected_result' => 'method',
                '1st_argument' => 'query',
            ],
            [
                'expected_result' => ['method'],
                '1st_argument' => 'all',
            ],
            [
                'expected_result' => 'some_arg',
                '1st_argument' => 'post',
            ],
            [
                'expected_result' => null,
                '1st_argument' => 'default_test',
            ]
        ];
    }

    public function providerArgCookie()
    {
        return [
            [
                'expected_result' => 'Hello',
                '1st_argument' => 'get',
            ],
            [
                'expected_result' => ['Are you'],
                '1st_argument' => 'all',
            ],
            [
                'expected_result' => 'PHPSESSID',
                '1st_argument' => 'has',
            ],
            [
                'expected_result' => 'cookie_setter_test',
                '1st_argument' => 'remove',
            ],
            [
                'expected_result' => null,
                '1st_argument' => 'default_test',
            ]
        ];
    }

    public function providerArgSession()
    {
        return [
            [
                'expected_result' => 'some_key',
                '1st_argument' => 'get',
            ],
            [
                'expected_result' => ['some_key'],
                '1st_argument' => 'all',
            ],
            [
                'expected_result' => 'some_key',
                '1st_argument' => 'has',
            ],
            [
                'expected_result' => 'NEW_PLACE',
                '1st_argument' => 'remove',
            ],
            [
                'expected_result' => null,
                '1st_argument' => 'default_test',
            ]
        ];
    }
}
