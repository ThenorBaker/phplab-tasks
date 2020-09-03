<?php

class Request
{
    public $query;
    public $request;
    public $server;

    public function __construct()
    {
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
        $merged = array_merge($this->query, $this->request);
        $result = [];

        if (!empty($only)) {
            foreach ($only as $filteringKey) {
                    if (isExists($filteringKey, $merged)) {
                        array_push($result, $merged[$filteringKey]);
                    }
                }
            }

        return $result;
    }

    public function has(string $key)
    {
        $keys = array_merge(array_keys($this->query),  array_keys($this->request));

        return in_array($key, $keys);
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
        if (!empty($this->request[$key])) {
            return $this->request[$key];
        } else {
            return $default;
        }
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
}
