<?php

namespace src\classes;

class Cookie
{
    public $placeholder; //cookie array

    public function __construct()
    {
        $this->placeholder = $_COOKIE;
    }

    public function get(string $key, $default = null)
    {
        $result = $default;

        if (!empty($this->placeholder[$key])) {
          $result = $this->placeholder[$key];
        }
        return $result;
    }

    public function all(array $only = [])
    {
        $result = $this->placeholder;
        if (count($only)) {
            return array_intersect_key($result, array_flip($only));
          }
        return $result;
    }

    public function has(string $key)
    {
        return in_array($key, array_keys($this->placeholder));
    }

    public function set(string $key, $value = 'default')
    {
        return setcookie($key, $value);
    }

    public function remove(string $key)
    {
        if(array_key_exists($key, $this->placeholder)){
            return setcookie($key, '', time() - 3600);
        } else {
            return false;
        }
    }
}
