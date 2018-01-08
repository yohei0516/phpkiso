<?php
    // 扱いやすいように変 数に代入
    $nickname = htmlspecialchars($_POST['nickname']);
    $email = htmlspecialchars($_POST['email']);
    $content = htmlspecialchars($_POST['content']);

    // データベースとのやりとりの処理を記述

    // ステップ1 データベースに接続する
    // データベース接続文字列
    // mysql: 接続するデータベースの種類
    // dbname データベース名 
    // host パソコンのアドレス　localhost このプログラムが存在している場所と同じサーバー
    // 空欄入れないように記述する
    // $dsn = 'mysql:dbname=phpkiso;host=localhost';

    // // $user データベース接続用ユーザ名
    // // $password データベース接続用のパスワード
    // $user = 'root';
    // $password='';

    // // データベース接続オブジェクト
    // $dbh = new PDO($dsn, $user, $password);

    // // 今から実行するSQL文を文字コードutf8で送るという設定（文字化け防止）
    // $dbh->query('SET NAMES utf8');
    require('dbconnect.php');

    // ステップ2 SQL文の実行
    $sql = 'INSERT INTO `survey` (`nickname`,`email`,`content`) 
            VALUES ("'.$nickname.'","'.$email.'","'.$content.'");';

    // SQLを実行する準備
    // -> アロー演算子
    $stmt = $dbh->prepare($sql);

    // SQL文を実行
    $stmt->execute();

    // ステップ3 データベースの切断（オブジェクトを空っぽにしている）
      $dbh = null;
?>

<?php
  $nickname = htmlspecialchars($_POST['nickname']);
  $email    = htmlspecialchars($_POST['email']);
  $content  = htmlspecialchars($_POST['content']);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <title>送信完了</title>
  <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
    <!-- トップ画像 -->
    <div class="top-cover">
    <img src="../assets/img/02.jpg"></div>

      <section class = "row">
        <div class="col-md-8 col-md-offset-2">
          <div class="content text-center">

            <h1>Thank you for your inquiry!</h1>
            <div>
              <h4>I'll contact you as soon as I finish reviewing.</h4> <br>
                    <div class="well well-lg">
                    <p>Name:
                      <?php echo $nickname; ?></p>
                    <p>E-mail:
                      <?php echo $email; ?>   </p>
                    <p>Message:
                      <?php echo $content; ?> </p>
                    </div>
            </div>
          </div>
        </div>
      </section>
    <div class="col-md-8 col-md-offset-2">
    <div class="content text-center">
      <?php include('copyright.php');?>
    </div>
</body>
</html>