<?php

session_start();

require('controller.php');

if ($_POST) {
    /* POST Requests */
    if ($_POST['register_name']) {
        register($_POST['register_name'], $_POST['register_password']);
    } else if ($_POST['login_name']) {
        login($_POST['login_name'], $_POST['login_password']);
    } else if ($_POST['logout']) {
        logout();
    } else if ($_POST['tweet_textarea']) {
        newtweet($_POST['tweet_textarea']);
    }
} else {
    /* GET Requests */
    if ($_SESSION['user_id']) {
        require_once('views/bbs.php');
    } else {
        require_once('views/entrance.php');
    }
}
