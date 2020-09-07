<?php

class Request
{
    public $query;
    public $request;
    public $server;
    public $session;
    public $cookie;

    public function __construct()
    {
        include_once 'Cookie.php';
        include_once 'Session.php';

        $this->cookie = new Cookie();
        $this->session = new Session();

        $this->query = $_GET;
        $this->request = $_POST;
        $this->server = $_SERVER;
    }

    public function get(string $key, $default = null)
    {
        $result = $default;

        if (!empty($this->post($key))) {
            $result = $this->post($key);
        } elseif (!empty($this->query($key))) {
            $result = $this->query($key);
        }
        return $result;
    }

    public function all(array $only = [])
    {
        $result = array_merge($this->query, $this->request);

        if (count($only)) {
          return array_intersect_key($result, array_flip($only));
        }
        return $result;
    }

    public function has(string $key)
    {
        return array_key_exists($key, $this->all());
    }

    public function query(string $key, $default = null)
    {
        if (!empty($this->query[$key])) {
            return $this->query[$key];
        } else {
            return $default;
        }
    }

    public function post(string $key, $default = null)
    {
        $result = $default;

        if (!empty($this->request[$key])) {
            $result =  $this->request[$key];
          }
        return $result;
    }

    public function ip()
    {
        if (!empty($this->server['HTTP_CLIENT_IP'])) {
            $ip = $this->server['HTTP_CLIENT_IP'];
        } elseif (!empty($this->server['HTTP_X_FORWARDED_FOR'])) {
            $ip = $this->server['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $this->server['REMOTE_ADDR'];
        }
        return $ip;
    }

    public function userAgent(): string
    {
        return $this->server['HTTP_USER_AGENT'];
    }

    public function cookies()
    {
        include_once 'Cookie.php';
        return new Cookie();
    }

    public function session()
    {
        include_once 'Session.php';
        return new Session();
    }
}
