<?php

use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    protected $fixture;

    protected function setUp(): void
    {
        $this->fixture = new Request();
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
        $this->assertClassHasAttribute('query', Request::class);
    }

    public function testRequestPropertyPositive()
    {
        $this->assertClassHasAttribute('request', Request::class);
    }

    public function testServerPropertyPositive()
    {
        $this->assertClassHasAttribute('server', Request::class);
    }

    // >>>>> 'get' METHOD's TESTS START
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
    // <<<<< 'get' METHOD's TESTS END

    // >>>>> 'all' METHOD's TESTS START
    public function testAllPositive()
    {
        $this->assertEquals(['0' => 23.4], $this->fixture->all(['num']));
    }

    public function testAllNegative()
    {
        $this->expectException(TypeError::class);
        $this->fixture->all(23.4);
    }

    public function testAllDefault()
    {
        //returns an empty array
        $this->assertEquals([], $this->fixture->all());
    }
    // <<<<< 'all' METHOD's TESTS END

    // >>>>> 'has' METHOD's TESTS START
    public function testHasPositive()
    {
        $this->assertEquals(true, $this->fixture->has('num'));
    }

    public function testHasNegative()
    {
        $this->expectException(TypeError::class);
        $this->fixture->has([23.4]);
    }
    // <<<<< 'has' METHOD's TESTS END

    // >>>>> 'query' METHOD's TESTS START
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
        //returns an empty array
        $this->assertEquals(null, $this->fixture->query('some_key'));
    }
    // <<<<< 'query' METHOD's TESTS END

    // >>>>> 'post' METHOD's TESTS START
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
        //returns an empty array
        $this->assertEquals(null, $this->fixture->post('some_key'));
    }
    // <<<<< 'post' METHOD's TESTS END

    // >>>>> 'ip' METHOD's TESTS START
    public function testIpPositive()
    {
        $this->assertEquals('216.58.216.164', $this->fixture->ip());
    }
    // <<<<< 'ip' METHOD's TESTS END

    /* 'userAgent' METHOD's TESTS START >>>>> */
    public function testUserAgentPositive()
    {
        $this->assertEquals('browser', $this->fixture->userAgent());
    }
    // <<<<< 'userAgent' METHOD's TESTS END
}
