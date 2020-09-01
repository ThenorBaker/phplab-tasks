<?php

return [
    [
        'name' => 'query($key, $default = null)',
        'description' => 'Returns $_GET parameter by $key and $default if does not exist.',
    ],
    [
        'name' => 'post($key, $default = null)',
        'description' => 'Returns $_POST parameter by $key and $default if does not exist.',
    ],
    [
        'name' => 'get($key, $default = null)',
        'description' => 'Returns $_GET or $_POST parameter by $key. If both are present - return $_POST. If both are empty - return $default.',
    ],
    [
        'name' => 'all(array $only = [])',
        'description' => 'Returns all $_GET + $_POST parameters in the associative array. If $only is not empty - return only keys from $only parameter.',
    ],
    [
        'name' => 'has($key)',
        'description' => 'Return true if $key exists in $_GET or $_POST.',
    ],
    [
        'name' => 'ip()',
        'description' => 'Returns users IP.',
    ],
    [
        'name' => 'userAgent()',
        'description' => 'Returns users browser User Agent.',
    ],
];
