<?php

use PHPUnit\Framework\TestCase;

class GetSignatureTest extends TestCase
{
    /**
     * @dataProvider providerRequestSignature
     * @dataProvider providerCookieSignature
     * @dataProvider providerSessionSignature
     *
     * @param string $expected
     * @param string $methodsName
     * @param array $methodsDescriptions
     */
    public function testGetSignature($expected, $methodsName, $methodsDescriptions)
    {
        $this->assertEquals($expected, getSignature($methodsName, $methodsDescriptions));
    }

    public function testGetSignatureNegative()
    {
        $this->expectException(TypeError::class);
        getSignature('string', 23);
    }

    public function providerRequestSignature()
    {
        return [
            [
                'expected_result' => 'get($key, $default = null)',
                '1st_argument' => 'get',
                '2st_argument' => require 'providerFunctionTest/request_methods_info.php'
            ],
            [
                'expected_result' => 'all(array $only = [])',
                '1st_argument' => 'all',
                '2st_argument' => require 'providerFunctionTest/request_methods_info.php'
            ],
            [
                'expected_result' => 'has($key)',
                '1st_argument' => 'has',
                '2st_argument' => require 'providerFunctionTest/request_methods_info.php'
            ],
            [
                'expected_result' => 'userAgent()',
                '1st_argument' => 'userAgent',
                '2st_argument' => require 'providerFunctionTest/request_methods_info.php'
            ]
        ];
    }

    public function providerCookieSignature()
    {
        return [
            [
                'expected_result' => 'all(array $only = [])',
                '1st_argument' => 'all',
                '2st_argument' => require 'providerFunctionTest/cookie_methods_info.php'
            ],
            [
                'expected_result' => 'get($key, $default = null)',
                '1st_argument' => 'get',
                '2st_argument' => require 'providerFunctionTest/cookie_methods_info.php'
            ],
            [
                'expected_result' => 'set($key, $value)',
                '1st_argument' => 'set',
                '2st_argument' => require 'providerFunctionTest/cookie_methods_info.php'
            ],
            [
                'expected_result' => 'has($key)',
                '1st_argument' => 'has',
                '2st_argument' => require 'providerFunctionTest/cookie_methods_info.php'
            ]
        ];
    }

    public function providerSessionSignature()
    {
        return [
            [
                'expected_result' => 'remove($key)',
                '1st_argument' => 'remove',
                '2st_argument' => require 'providerFunctionTest/session_methods_info.php'
            ],
            [
                'expected_result' => 'get($key, $default = null)',
                '1st_argument' => 'get',
                '2st_argument' => require 'providerFunctionTest/session_methods_info.php'
            ],
            [
                'expected_result' => 'set($key, $value)',
                '1st_argument' => 'set',
                '2st_argument' => require 'providerFunctionTest/session_methods_info.php'
            ],
            [
                'expected_result' => 'has($key)',
                '1st_argument' => 'has',
                '2st_argument' => require 'providerFunctionTest/session_methods_info.php'
            ]
        ];
    }
}
