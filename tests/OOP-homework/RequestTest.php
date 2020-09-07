<?php

use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    protected $fixture;

    protected function setUp(): void
    {
        $this->fixture = new \src\classes\Request();
        $this->fixture->query = ['Hello' => 'World', 'num' => 23.4];
        $this->fixture->request = ['Test' => 'Space'];
        $this->fixture->server['HTTP_CLIENT_IP'] = '216.58.216.164';
        $this->fixture->server['HTTP_USER_AGENT'] = 'browser';
    }

    protected function tearDown(): void
    {
        $this->fixture = NULL;
    }

    public function testQueryPropertyPositive()
    {
        $this->assertClassHasAttribute('query', \src\classes\Request::class);
    }

    public function testRequestPropertyPositive()
    {
        $this->assertClassHasAttribute('request', \src\classes\Request::class);
    }

    public function testServerPropertyPositive()
    {
        $this->assertClassHasAttribute('server', \src\classes\Request::class);
    }

    public function testCookieObjectPositive()
    {
        $this->assertClassHasAttribute('cookie', \src\classes\Request::class);
    }

    public function testSessionObjectPositive()
    {
        $this->assertClassHasAttribute('session', \src\classes\Request::class);
    }

    public function testGetPositive()
    {
        $this->assertEquals('World', $this->fixture->get('Hello'));
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

    public function testAllPositive()
    {
        $this->assertEquals(['num' => 23.4], $this->fixture->all(['num']));
    }

    public function testAllNegative()
    {
        $this->expectException(TypeError::class);
        $this->fixture->all(23.4);
    }

    public function testAllDefault()
    {
        $this->assertEquals(['Hello' => 'World',
            'num' => 23.4,
            'Test' => 'Space'],
            $this->fixture->all());
    }

    public function testHasPositive()
    {
        $this->assertEquals(true, $this->fixture->has('num'));
    }

    public function testHasNegative()
    {
        $this->expectException(TypeError::class);
        $this->fixture->has([23.4]);
    }

    public function testQueryPositive()
    {
        $this->assertEquals(23.4, $this->fixture->query('num'));
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

    public function testPostPositive()
    {
        $this->assertEquals('Space', $this->fixture->post('Test'));
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
}
