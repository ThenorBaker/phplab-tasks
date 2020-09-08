<?php

use PHPUnit\Framework\TestCase;

class SessionTest extends TestCase
{
    protected $fixture;

    protected function setUp(): void
    {
        $this->fixture = new src\classes\Request();

        $this->fixture->session->placeholder = ['test1' => '1_session_value',
                                                'test2' => '2_session_value',
                                                'test3' => '3_session_value'];
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
     *
     * @param mixed $expected
     * @param string $input
     */
    public function testGetPositive($expected, $input)
    {
        $this->assertEquals($expected, $this->fixture->session->get($input));
    }

    public function testGetNegative()
    {
        $this->expectException(TypeError::class);
        $this->fixture->session->get([23.4]);
    }

    public function testGetDefault()
    {
        $this->assertEquals(null, $this->fixture->session->get('not_exist'));
    }

    /**
     * @dataProvider providerAllPositive
     *
     * @param array $expected
     * @param array $input
     */
    public function testAllPositive($expected, $input)
    {
        $this->assertEquals($expected, $this->fixture->session->all($input));
    }

    public function testAllNegative()
    {
        $this->expectException(TypeError::class);
        $this->fixture->session->all(23.4);
    }

    /**
     * @dataProvider providerAllDefault
     * @param array $expected
     */
    public function testAllDefault($expected)
    {
        $this->assertEquals($expected, $this->fixture->session->all());
    }

    /**
     * @dataProvider providerHasPositive
     *
     * @param boolean $expected
     * @param string $input
     */
    public function testHasPositive($expected, $input)
    {
        $this->assertEquals($expected, $this->fixture->session->has($input));
    }

    public function testHasNegative()
    {
        $this->expectException(TypeError::class);
        $this->fixture->session->has([23.4]);
    }

    /**
     * @dataProvider providerSetPositive
     *
     * @param array $expected
     * @param string $key
     * @param mixed $value
     */
    public function testSetPositive($expected, $key, $value)
    {
        $this->assertEquals($expected, $this->fixture->session->set($key, $value));
    }

    public function testSetNegative()
    {
        $this->expectException(TypeError::class);
        $this->fixture->session->has([23.4]);
    }

    /**
     * @dataProvider providerRemovePositive
     *
     * @param boolean $expected
     * @param string $input
     */
    public function testRemovePositive($expected, $input)
    {
        $this->assertEquals($expected, $this->fixture->session->remove($input));
    }
    public function testRemoveNegative()
    {
        $this->assertEquals(false, $this->fixture->session->remove('not_exist'));
    }

    public function providerGetPositive()
    {
        return [
            '1_data_set' => [
                'expected_result' => '1_session_value',
                '1st_argument' => 'test1'
            ],
            '2_data_set' => [
                'expected_result' => '2_session_value',
                '1st_argument' => 'test2'
            ],
            '3_data_set' => [
                'expected_result' => '3_session_value',
                '1st_argument' => 'test3'
            ],
        ];
    }

    public function providerAllPositive()
    {
        return [
            '1_data_set' => [
                'expected_result' => [
                    'test1' => '1_session_value',
                    'test2' => '2_session_value'
                ],
                '1st_argument' => ['test1', 'test2']
            ],
            '2_data_set' => [
                'expected_result' => [
                    'test3' => '3_session_value',
                    'test1' => '1_session_value'
                ],
                '1st_argument' => ['test3', 'test1']
            ],
            '3_data_set' => [
                'expected_result' => [
                    'test1' => '1_session_value',
                    'test3' => '3_session_value',
                    'test2' => '2_session_value'
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
                    'test1' => '1_session_value',
                    'test2' => '2_session_value',
                    'test3' => '3_session_value'
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

    public function providerSetPositive()
    {
        return [
            '1_data_set' => [
                'expected_result' => [
                    'test1' => '1_session_value',
                    'test2' => '2_session_value',
                    'test3' => '3_session_value',
                    'test4' => '4_session_value'
                ],
                '1st_argument' => 'test4',
                '2nd_argument' => '4_session_value',
            ]
        ];
    }

    public function providerRemovePositive()
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
            ]
        ];
    }
}
