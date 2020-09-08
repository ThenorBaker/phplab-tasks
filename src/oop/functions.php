<?php

function getDescription(string $current_method, array $method_description)
{
    foreach ($method_description as $subArray) {
        if (array_key_exists('description', $subArray) && array_key_exists('name', $subArray)) {
            $trimmedMethodsName = stristr($subArray['name'], '(', true);

            if ($trimmedMethodsName == $current_method) {
                return $subArray['description'];
            }
        } else {
            continue;
        }
    }
}

function getSignature(string $current_method, array $method_description)
{
    foreach ($method_description as $subArray) {
        if (array_key_exists('description', $subArray) && array_key_exists('name', $subArray)) {
            $trimmedMethodsName = stristr($subArray['name'], '(', true);

            if ($trimmedMethodsName == $current_method) {
                return $subArray['name'];
            }
        } else {
            continue;
        }
    }
}

function getArgRequest(string $method)
{
    $arg = null;
    switch ($method) {
        case 'get':
        case 'has':
        case 'query':
            $arg = 'method';
            break;
        case 'all':
            $arg = ['method'];
            break;
        case 'post':
            $arg = 'some_arg';
            break;
        default:
            $arg = null;
        break;
    }
    return $arg;
}

function getArgCookie(string $method)
{
    $arg = null;
    switch ($method) {
        case 'get':
            $arg = 'Hello';
            break;
        case 'all':
            $arg = ['Are you'];
            break;
        case 'has':
            $arg = 'PHPSESSID';
            break;
        case 'set':
        case 'remove':
            $arg = 'cookie_setter_test';
            break;
        default:
            $arg = null;
        break;
    }
    return $arg;
}

function getArgSession(string $method)
{
    $arg = null;
    switch ($method) {
        case 'get':
        case 'has':
            $arg = 'some_key';
            break;
        case 'all':
            $arg = ['some_key'];
            break;
        case 'set':
        case 'remove':
            $arg = 'NEW_PLACE';
            break;
        default:
            $arg = null;
        break;
    }
    return $arg;
}
