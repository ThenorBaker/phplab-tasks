<?php

namespace src\classes;
require "../../vendor/autoload.php";

?>
<!doctype html>
<html lang="en">

    <?php require 'pages/common/head.html' ?>

    <body class="container">
        <?php require 'pages/common/header.html' ?>

        <?php
        session_start();
//        $request = new Request();
        ?>

        <main role="main1">

            <div class="main"> <!-- column's container -->

                <div class="row container ml-5"> <!-- classes container -->

                    <div class="col-md-4" > <!-- REQUEST class methods -->
                        <h2>Request class</h2>
                        <ul>
                            <?php foreach (get_class_methods('\src\classes\Request') as $method): ?>
                                <?php if($method == '__construct') continue;?>
                            <li><a href="pages\request.php?method=<?= $method; ?>"><?= $method; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>                 <!-- /REQUEST class methods -->

                    <div class="col-md-4"> <!-- COOKIE class methods -->

                        <h2>Cookie class</h2>
                        <ul>
                            <?php foreach (get_class_methods('\src\classes\Cookie') as $method): ?>
                                <?php if($method == '__construct') continue;?>
                                <li><a href="pages\cookie.php?method=<?= $method; ?>"><?= $method; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>                 <!-- /COOKIE class methods -->

                    <div class="col-md-4"> <!-- SESSION class methods -->
                        <h2>Session class</h2>
                        <ul>
                            <?php foreach (get_class_methods('\src\classes\Session') as $method): ?>
                                <?php if($method == '__construct') continue;?>
                                <li><a href="pages\session.php?method=<?= $method; ?>"><?= $method; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>                 <!-- /SESSION class methods -->
                </div> <!-- /classes container -->

            </div> <!-- /column's container -->
            <hr>

        </main>
    </body>
</html>
