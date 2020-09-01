<?php

require_once 'Cookie.php';

class Session extends Cookie
{
	
    public $placeholder; //session array

    public function __construct($session)
    {
        $this->placeholder = $session;
    }

    public function set($key, $value = 'default')
    {
        $this->placeholder = array_merge($this->placeholder, [$key => $value]);

        //the next return statement was crated only for the method's working visualization on the web page
        return "Data with the $value value was created under the $key key.";
    }

    public function remove($key)
    {
        
        if (array_key_exists($key, $this->placeholder)) {
            unset($this->placeholder[$key]);

            //the next return statement was crated only for the method's working visualization on the web page
            return "Session data with the $key key was removed.";
        } else {
            return 'No such key.';
        }
    }

    public function clear()
    {
        return session_destroy();
    }
}
