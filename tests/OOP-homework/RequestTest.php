<?php

use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    protected $fixture;

    protected function setUp(): void
    {
        $this->fixture = new src\classes\Request();

        $this->fixture->request = ['Hi' => 'There', 'bool' => true];
        $this->fixture->query = ['Hello' => 'World', 'num' => 23.4];
        $this->fixture->server['HTTP_CLIENT_IP'] = '216.58.216.164';
        $this->fixture->server['HTTP_USER_AGENT'] = 'browser';
    }

    protected function tearDown(): void
    {
        $this->fixture = NULL;
    }

    public function testClassPropertiesExist()
    {
        $this->assertClassHasAttribute('query', \src\classes\Request::class);
        $this->assertClassHasAttribute('request', \src\classes\Request::class);
        $this->assertClassHasAttribute('server', \src\classes\Request::class);
        $this->assertClassHasAttribute('cookie', \src\classes\Request::class);
        $this->assertClassHasAttribute('session', \src\classes\Request::class);

    }

    /**
     * @dataProvider providerGetPositive
     * @param mixed $expected
     * @param string $input
     */
    public function testGetPositive($expected, $input)
    {
        $this->assertEquals($expected, $this->fixture->get($input));
    }

    public function testGetNegative()
    {
        $this->expectException(TypeError::class);
        $this->fixture->get([23.4]);
    }

    public function testGetDefault()
    {
        $this->assertEquals(null, $this->fixture->get('not_exist'));
    }

    /**
     * @dataProvider providerAllPositive
     * @param array $expected
     * @param array $input
     */
    public function testAllPositive($expected, $input)
    {
        $this->assertEquals($expected, $this->fixture->all($input));
    }

    public function testAllNegative()
    {
        $this->expectException(TypeError::class);
        $this->fixture->all(23.4);
    }

    /**
     * @dataProvider providerAllDefault
     * @param $expected
     */
    public function testAllDefault($expected)
    {
        $this->assertEquals($expected, $this->fixture->all());
    }

    /**
     * @dataProvider providerHasPositive
     * @param boolean $expected
     * @param string $input
     */
    public function testHasPositive($expected, $input)
    {
        $this->assertEquals($expected, $this->fixture->has($input));
    }

    public function testHasNegative()
    {
        $this->expectException(TypeError::class);
        $this->fixture->has([23.4]);
    }

    /**
     * @dataProvider providerQueryPositive
     * @param mixed $expected
     * @param string $input
     */
    public function testQueryPositive($expected, $input)
    {
        $this->assertEquals($expected, $this->fixture->query($input));
    }

    public function testQueryNegative()
    {
        $this->expectException(TypeError::class);
        $this->fixture->query([23.4]);
    }

    public function testQueryDefault()
    {
        $this->assertEquals(null, $this->fixture->query('some_key'));
    }

    /**
     * @dataProvider providerPostPositive
     * @param mixed $expected
     * @param string $input
     */
    public function testPostPositive($expected, $input)
    {
        $this->assertEquals($expected, $this->fixture->post($input));
    }

    public function testPostNegative()
    {
        $this->expectException(TypeError::class);
        $this->fixture->post([23.4]);
    }

    public function testPostDefault()
    {
        $this->assertEquals(null, $this->fixture->post('some_key'));
    }

    public function testIpPositive()
    {
        $this->assertEquals('216.58.216.164', $this->fixture->ip());
    }

    public function testUserAgentPositive()
    {
        $this->assertEquals('browser', $this->fixture->userAgent());
    }

    public function providerGetPositive()
    {
        return [
            '1_data_set' => [
                'expected_result' => 'World',
                '1st_argument' => 'Hello'
            ],
            '2_data_set' => [
                'expected_result' => 23.4,
                '1st_argument' => 'num'
            ]
        ];
    }

    public function providerAllPositive()
    {
        return [
            '1_data_set' => [
                'expected_result' => ['Hello' => 'World'],
                '1st_argument' => ['Hello']
            ],
            '2_data_set' => [
                'expected_result' => ['num' => 23.4],
                '1st_argument' => ['num']
            ],
            '3_data_set' => [
                'expected_result' => ['Hello' => 'World', 'num' => 23.4],
                '1st_argument' => ['num', 'Hello']
            ],
            '4_data_set' => [
                'expected_result' => ['num' => 23.4, 'Hello' => 'World'],
                '1st_argument' => ['Hello', 'num']
            ]
        ];
    }

    public function providerHasPositive()
    {
        return [
            '1_data_set' => [
                'expected_result' => true,
                '1st_argument' => 'Hello'
            ],
            '2_data_set' => [
                'expected_result' => true,
                '1st_argument' => 'num'
            ],
            '3_data_set' => [
                'expected_result' => false,
                '1st_argument' => 'not_exist'
            ]
        ];
    }

    public function providerQueryPositive()
    {
        return [
            '1_data_set' => [
                'expected_result' => 'World',
                '1st_argument' => 'Hello'
            ],
            '2_data_set' => [
                'expected_result' => 23.4,
                '1st_argument' => 'num'
            ]
        ];
    }

    public function providerAllDefault()
    {
        return [
            '1_data_set' => [
                'expected_result' => [
                    'Hello' => 'World',
                    'num' => 23.4,
                    'Hi' => 'There',
                    'bool' => true
                ],
            ]
        ];
    }

    public function providerPostPositive()
    {
        return [
            '1_data_set' => [
                'expected_result' => 'There',
                '1st_argument' => 'Hi'
            ],
            '2_data_set' => [
                'expected_result' => true,
                '1st_argument' => 'bool'
            ]
        ];
    }
}
