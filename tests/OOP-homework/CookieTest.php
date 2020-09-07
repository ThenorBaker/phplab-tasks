<?php

use PHPUnit\Framework\TestCase;

class CookieTest extends TestCase
{
    protected $fixture;

    protected function setUp(): void
    {
        $this->fixture = new src\classes\Request();

        $this->fixture->cookie->placeholder = ['test1' => '1_cookie_value',
                                               'test2' => '2_cookie_value',
                                               'test3' => '3_cookie_value'];
    }

    protected function tearDown(): void
    {
        $this->fixture = NULL;
    }

    public function testClassPropertiesExist()
    {
        $this->assertClassHasAttribute('placeholder', \src\classes\Cookie::class);
    }

    /**
     * @dataProvider providerGetPositive
     * @param mixed $expected
     * @param string $input
     */
    public function testGetPositive($expected, $input)
    {
        $this->assertEquals($expected, $this->fixture->cookie->get($input));
    }

    public function testGetNegative()
    {
        $this->expectException(TypeError::class);
        $this->fixture->cookie->get([23.4]);
    }

    public function testGetDefault()
    {
        $this->assertEquals(null, $this->fixture->cookie->get('not_exist'));
    }

    /**
     * @dataProvider providerAllPositive
     * @param array $expected
     * @param array $input
     */
    public function testAllPositive($expected, $input)
    {
        $this->assertEquals($expected, $this->fixture->cookie->all($input));
    }

    public function testAllNegative()
    {
        $this->expectException(TypeError::class);
        $this->fixture->cookie->all(23.4);
    }

    /**
     * @dataProvider providerAllDefault
     * @param array $expected
     */
    public function testAllDefault($expected)
    {
        $this->assertEquals($expected, $this->fixture->cookie->all());
    }

    /**
     * @dataProvider providerHasPositive
     * @param boolean $expected
     * @param string $input
     */
    public function testHasPositive($expected, $input)
    {
        $this->assertEquals($expected, $this->fixture->cookie->has($input));
    }

    public function testHasNegative()
    {
        $this->expectException(TypeError::class);
        $this->fixture->cookie->has([23.4]);
    }

    public function providerGetPositive()
    {
        return [
            '1_data_set' => [
                'expected_result' => '1_cookie_value',
                '1st_argument' => 'test1'
            ],
            '2_data_set' => [
                'expected_result' => '2_cookie_value',
                '1st_argument' => 'test2'
            ],
            '3_data_set' => [
                'expected_result' => '3_cookie_value',
                '1st_argument' => 'test3'
            ],
        ];
    }

    public function providerAllPositive()
    {
        return [
            '1_data_set' => [
                'expected_result' => [
                     'test1' => '1_cookie_value',
                     'test2' => '2_cookie_value'
                    ],
                '1st_argument' => ['test1', 'test2']
            ],
            '2_data_set' => [
                'expected_result' => [
                     'test3' => '3_cookie_value',
                     'test1' => '1_cookie_value'
                    ],
                '1st_argument' => ['test3', 'test1']
            ],
            '3_data_set' => [
                'expected_result' => [
                     'test1' => '1_cookie_value',
                     'test3' => '3_cookie_value',
                     'test2' => '2_cookie_value'
                    ],
                '1st_argument' => ['test1', 'test3', 'test2']
            ],
        ];
    }

    public function providerAllDefault()
    {
        return [
            '1_data_set' => [
                'expected_result' => [
                    'test1' => '1_cookie_value',
                    'test2' => '2_cookie_value',
                    'test3' => '3_cookie_value'
                ],
            ]
        ];
    }

    public function providerHasPositive()
    {
        return [
            '1_data_set' => [
                'expected_result' => true,
                '1st_argument' => 'test1'
            ],
            '2_data_set' => [
                'expected_result' => true,
                '1st_argument' => 'test2'
            ],
            '3_data_set' => [
                'expected_result' => true,
                '1st_argument' => 'test3'
            ],
            '4_data_set' => [
                'expected_result' => false,
                '1st_argument' => 'test4'
            ],
        ];
    }
}
