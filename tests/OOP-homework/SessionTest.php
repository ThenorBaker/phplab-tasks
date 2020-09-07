<?php

use PHPUnit\Framework\TestCase;

class SessionTest extends TestCase
{
    protected $fixture;

    protected function setUp(): void
    {
        $this->fixture = new Request();
        $this->fixture->session->placeholder = ['test1' => 'session_value',
                                                'test2' => 'another_session_value'];
    }

    protected function tearDown(): void
    {
        $this->fixture = NULL;
    }

    public function testPlaceholderPropertyPositive()
    {
        $this->assertClassHasAttribute('placeholder', Session::class);
    }

    public function testGetPositive()
    {
        $this->assertEquals('session_value', $this->fixture->session->get('test1'));
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

    public function testAllPositive()
    {
        $this->assertEquals(['test1' => 'session_value'],
            $this->fixture->session->all(['test1']));
    }

    public function testAllNegative()
    {
        $this->expectException(TypeError::class);
        $this->fixture->session->all(23.4);
    }

    public function testAllDefault()
    {
        $this->assertEquals(['test1' => 'session_value', 'test2' => 'another_session_value'],
            $this->fixture->session->all());
    }

    public function testHasPositive()
    {
        $this->assertEquals(true, $this->fixture->session->has('test1'));
    }

    public function testHasNegative()
    {
        $this->expectException(TypeError::class);
        $this->fixture->session->has([23.4]);
    }

    public function testSetPositive()
    {
        $this->assertEquals(['test1' => 'session_value',
                             'test2' => 'another_session_value',
                             'test3' => 'default'],
            $this->fixture->session->set('test3'));
    }

    public function testSetNegative()
    {
        $this->expectException(TypeError::class);
        $this->fixture->session->has([23.4]);
    }

    public function testRemovePositive()
    {
        $this->assertEquals(true, $this->fixture->session->remove('test2'));
    }
    public function testRemoveNegative()
    {
        $this->assertEquals(false, $this->fixture->session->remove('not_exist'));
    }
}
