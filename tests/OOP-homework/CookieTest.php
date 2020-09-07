<?php

use PHPUnit\Framework\TestCase;

class CookieTest extends TestCase
{
    protected $fixture;

    protected function setUp(): void
    {
        $this->fixture = new \src\classes\Request();
        $this->fixture->cookie->placeholder = ['test1' => 'cookie_value',
                                               'test2' => 'another_cookie_value'];
    }

    protected function tearDown(): void
    {
        $this->fixture = NULL;
    }

    public function testPlaceholderPropertyPositive()
    {
        $this->assertClassHasAttribute('placeholder', \src\classes\Cookie::class);
    }

    public function testGetPositive()
    {
        $this->assertEquals('cookie_value', $this->fixture->cookie->get('test1'));
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

    public function testAllPositive()
    {
        $this->assertEquals(['test1' => 'cookie_value'],
            $this->fixture->cookie->all(['test1']));
    }

    public function testAllNegative()
    {
        $this->expectException(TypeError::class);
        $this->fixture->cookie->all(23.4);
    }

    public function testAllDefault()
    {
        $this->assertEquals(['test1' => 'cookie_value', 'test2' => 'another_cookie_value'],
            $this->fixture->cookie->all());
    }

    public function testHasPositive()
    {
        $this->assertEquals(true, $this->fixture->cookie->has('test1'));
    }

    public function testHasNegative()
    {
        $this->expectException(TypeError::class);
        $this->fixture->cookie->has([23.4]);
    }
}
