<?php

use PHPUnit\Framework\TestCase;

class GetDescriptionTest extends TestCase
{
    /**
     * @dataProvider providerRequestDescription
     * @dataProvider providerCookieDescription
     * @dataProvider providerSessionDescription
     *
     * @param string $expected
     * @param string $methodsName
     * @param array $methodsDescriptions
     */
    public function testGetDescription($expected, $methodsName, $methodsDescriptions)
    {
        $this->assertEquals($expected, getDescription($methodsName, $methodsDescriptions));
    }

    public function testGetDescriptionNegative()
    {
        $this->expectException(TypeError::class);
        getDescription('string', 23);
    }

    public function providerRequestDescription()
    {
        return [
            [
                'expected_result' => 'Returns $_GET or $_POST parameter by $key. If both are present - return $_POST. If both are empty - return $default.',
                '1st_argument' => 'get',
                '2st_argument' => require 'providerFunctionTest/request_methods_info.php'
            ],
            [
                'expected_result' => 'Returns all $_GET + $_POST parameters in the associative array. If $only is not empty - return only keys from $only parameter.',
                '1st_argument' => 'all',
                '2st_argument' => require 'providerFunctionTest/request_methods_info.php'
            ],
            [
                'expected_result' => 'Return true if $key exists in $_GET or $_POST.',
                '1st_argument' => 'has',
                '2st_argument' => require 'providerFunctionTest/request_methods_info.php'
            ],
            [
                'expected_result' => 'Returns users browser User Agent.',
                '1st_argument' => 'userAgent',
                '2st_argument' => require 'providerFunctionTest/request_methods_info.php'
            ]
        ];
    }

    public function providerCookieDescription()
    {
        return [
            [
                'expected_result' => 'Returns all $_COOKIES in the associative array. If $only is not empty - return only keys from $only parameter.',
                '1st_argument' => 'all',
                '2st_argument' => require 'providerFunctionTest/cookie_methods_info.php'
            ],
            [
                'expected_result' => 'Returns $_COOKIE value by key and $default if key does not exist.',
                '1st_argument' => 'get',
                '2st_argument' => require 'providerFunctionTest/cookie_methods_info.php'
            ],
            [
                'expected_result' => 'Sets cookie.',
                '1st_argument' => 'set',
                '2st_argument' => require 'providerFunctionTest/cookie_methods_info.php'
            ],
            [
                'expected_result' => 'Returns true if $key exists in $_COOKIES.',
                '1st_argument' => 'has',
                '2st_argument' => require 'providerFunctionTest/cookie_methods_info.php'
            ]
        ];
    }

    public function providerSessionDescription()
    {
        return [
            [
                'expected_result' => 'Returns all $_SESSION in the associative array. If $only is not empty - return only keys from $only parameter.',
                '1st_argument' => 'all',
                '2st_argument' => require 'providerFunctionTest/session_methods_info.php'
            ],
            [
                'expected_result' => 'Returns $_SESSION value by key and $default if key does not exist.',
                '1st_argument' => 'get',
                '2st_argument' => require 'providerFunctionTest/session_methods_info.php'
            ],
            [
                'expected_result' => 'Sets data to session.',
                '1st_argument' => 'set',
                '2st_argument' => require 'providerFunctionTest/session_methods_info.php'
            ],
            [
                'expected_result' => 'Return true if $key exists in $_SESSION.',
                '1st_argument' => 'has',
                '2st_argument' => require 'providerFunctionTest/session_methods_info.php'
            ]
        ];
    }
}
