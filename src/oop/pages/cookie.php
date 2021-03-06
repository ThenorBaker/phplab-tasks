<?php

use src\classes\Request;
require "../../../vendor/autoload.php";

session_start();
$request = new Request();

//below are some value to test functions
$request->cookie->placeholder = array_merge($request->cookie->placeholder, ['Hello' => 'World!',
                                                                            'Hi' => 'there!',
                                                                            'How' => 'are you?',
                                                                            'Are you' => 'coding?']);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

    <?php require 'common/head.html' ?>

    <body class="container main">

        <?php require 'common/header.html' ?>

        <main class="container ">

            <div clas="ml-5 mt-1">

              <?php
                  $current_method = $request->query('method');
                  $current_arg = getArgCookie($current_method);
                  $method_signature = getSignature($current_method, require '../resources/cookie_methods_info.php');
                  $method_description = getDescription($current_method, require '../resources/cookie_methods_info.php');
      	       ?>

                <div> <!-- method's info -->
                    <article>
                        <p>
                            Method's signature: <span class="method_signature"> <?= $method_signature ?></span>
                        </p>
                        <hr>
                        <p>
                            What does it? <span class="method_description"> <?= $method_description ?></span>
                        </p>
                    </article>
                </div> <!-- /method's info -->

            </div>
            <hr>

            <div> <!-- method's input and output -->
                <p>Result of calling
                    <span class="method_signature"> <?= $method_signature; ?></span> method with the
                    <span class="arg"> <?= var_dump($current_arg); ?> </span> key:
                    <span class="method_calling ml-5"> <?php var_dump($request->cookie->$current_method($current_arg)); ?> </span>.
                </p>
            </div> <!-- /method's input and output -->
            <hr>

        </main>

        <?php require 'common/back_button.html'?>

    </body>
</html>
