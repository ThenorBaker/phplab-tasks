<?php

return [
    [
        'name' => 'all(array $only = [])',
        'description' => 'Returns all $_SESSION in the associative array. If $only is not empty - return only keys from $only parameter.',
    ],
    [
        'name' => 'get($key, $default = null)',
        'description' => 'Returns $_SESSION value by key and $default if key does not exist.',
    ],
    [
        'name' => 'set($key, $value)',
        'description' => 'Sets data to session.',
    ],
    [
        'name' => 'has($key)',
        'description' => 'Return true if $key exists in $_SESSION.',
    ],
    [
        'name' => 'remove($key)',
        'description' => 'Removes session data by name.',
    ],
    [
        'name' => 'clear()',
        'description' => 'Clears the session.',
    ]
];