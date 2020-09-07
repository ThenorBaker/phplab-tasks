<?php

function getDescription($current_method, $method_description)
{
    foreach ($method_description as $key => $value){
        $cutBeforeParentheses = stristr($value['name'], '(', true);
        if($cutBeforeParentheses == $current_method){
            return $value['description'];
        }
    }
}

function getSignature($current_method, $method_description)
{
    foreach ($method_description as $key => $value){
        $cutBeforeParentheses = stristr($value['name'], '(', true);
        if($cutBeforeParentheses == $current_method){
            return $value['name'];
        }
    }
}

function getArgRequest($method)
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
        case 'cookies':
            $arg = '';
        default:
            $arg = null;
        break;
    }
    return $arg;
}

function getArgCookie($method)
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

function getArgSession($method)
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
