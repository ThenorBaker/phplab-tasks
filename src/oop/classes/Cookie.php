<?php

class Cookie
{
    public $placeholder; //cookie array

    public function __construct($cookie)
    {   
        $this->placeholder = $cookie;
    }

    public function get($key, $default = null)
    {
        if(!empty($this->placeholder[$key])){
            return $this->placeholder[$key];
        } else {
            return $default;
        }
    }

    public function all(array $only = [])
    {
        $result = [];

        if(!empty($only)){
            foreach ($only as $filteringKey) {
                    if(isExists($filteringKey, $this->placeholder)){
                        array_push($result, $this->placeholder[$filteringKey]);
                    }
                }
            }

        if(!empty($result)){
           return $result;
        } else {
            return $this->placeholder;
        }
    }

    public function has($key)
    {
        return in_array($key, array_keys($this->placeholder));
    }

    public function set($key, $value = 'default')
    {
           return setcookie($key, $value);
    }


    public function remove($key)
    {
        if(array_key_exists($key, $this->placeholder)){
            return setcookie($key, '', time() - 3600);
        } else {
            return 'No such key.';
        }
    }
}

