<?php

return [
    [
        'name' => 'all(array $only = [])',
        'description' => 'Returns all $_COOKIES in the associative array. If $only is not empty - return only keys from $only parameter.',
    ],
    [
        'name' => 'get($key, $default = null)',
        'description' => 'Returns $_COOKIE value by key and $default if key does not exist.',
    ],
    [
        'name' => 'set($key, $value)',
        'description' => 'Sets cookie.',
    ],
    [
        'name' => 'has($key)',
        'description' => 'Returns true if $key exists in $_COOKIES.',
    ],
    [
        'name' => 'remove($key)',
        'description' => 'Removes cookie by name.',
    ]
];
