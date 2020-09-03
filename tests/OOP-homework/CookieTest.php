<?php

use PHPUnit\Framework\TestCase;

class CookieTest extends TestCase
{
    protected $fixture;

    protected function setUp(): void
    {
        $this->fixture = new Cookie();
        $this->fixture->placeholder = ['test1' => 'cookie_value',
                                       'test2' => 'another_cookie_value'];
    }

    protected function tearDown(): void
    {
        $this->fixture = NULL;
    }

    public function testPlaceholderPropertyPositive()
    {
        $this->assertClassHasAttribute('placeholder', Cookie::class);
    }


    // >>>>> 'get' METHOD's TESTS START
    public function testGetPositive()
    {
        $this->assertEquals('cookie_value', $this->fixture->get('test1'));
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
        $this->assertEquals([0 => 'cookie_value', 1 => 'another_cookie_value'],
            $this->fixture->all(['test1', 'test2']));
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
        $this->assertEquals(true, $this->fixture->has('test1'));
    }

    public function testHasNegative()
    {
        $this->expectException(TypeError::class);
        $this->fixture->has([23.4]);
    }
    // <<<<< 'has' METHOD's TESTS END
}
