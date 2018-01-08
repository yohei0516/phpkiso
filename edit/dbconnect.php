<?php
    // 開発環境用
    $dsn = 'mysql:dbname=phpkiso;host=localhost';

    // $user データベース接続用ユーザ名
    // $password データベース接続用のパスワード
    $user = 'root';
    $password='';

// 本番環境用
// ステップ1 データベースに接続する
    // $dsn = 'mysql:dbname=LAA0918765-phpkiso;host=mysql103.phy.lolipop.lan';

    // // $user データベース接続用ユーザ名
    // // $password データベース接続用のパスワード
    // $user = 'LAA0918765';
    // $password='yohei1991';




    // データベース接続オブジェクト
    $dbh = new PDO($dsn, $user, $password);

    // 今から実行するSQL文を文字コードutf8で送るという設定（文字化け防止）
    $dbh->query('SET NAMES utf8');
?>