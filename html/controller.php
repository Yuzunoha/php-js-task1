<?php

session_start();

require_once('db.php');

function register($register_name, $register_password)
{
    // 名前の重複チェック
    if (getUserByName($register_name)) {
        $msg = "name $register_name は既に使われています。";
        require_once('views/entrance.php');
        return;
    }

    $password_hash = password_hash($register_password, null);
    $result = createUser($register_name, $password_hash);

    if ($result) {
        $msg = "name $register_name を新規登録しました。";
    } else {
        $msg = "新規登録に失敗しました。";
    }
    require_once('views/entrance.php');
}

function login($login_name, $login_password)
{
    // name存在チェック
    $a = getUserByName($login_name);
    if ($a) {
        /* nameが存在した */
        $user = $a[0];

        // パスワードチェック
        if (password_verify($login_password, $user['password_hash'])) {
            /* ログインに成功した */
            // セッションにユーザidを格納する
            $_SESSION['user_id'] = $user['id'];

            $msg = 'ログインに成功しました';
            require_once('views/bbs.php');
            return;
        }
    }

    /* ログインに失敗した */
    $msg = 'ログインに失敗しました';
    require_once('views/entrance.php');
}

function logout()
{
    $_SESSION = [];
    $msg = 'ログアウトしました。';
    require_once('views/entrance.php');
}

function newtweet($tweet_textarea)
{
    // 汎用ログインチェック処理をルータに作る。早期リターンで
    createTweet($tweet_textarea, $_SESSION['user_id']);
    require_once('views/bbs.php');
}
