<?php

require_once 'Cookie.php';

class Session extends Cookie
{
    public $placeholder; //session array

    public function __construct()
    {
        $this->placeholder = &$_SESSION;
    }

    public function set(string $key, $value = 'default')
    {
        return $this->placeholder = array_merge($this->placeholder, [$key => $value]);
    }

    public function remove($key)
    {
        if (array_key_exists($key, $this->placeholder)) {
            unset($this->placeholder[$key]);
            return true;
        }
        return false;
    }

    public function clear()
    {
        return session_destroy();
    }
}
