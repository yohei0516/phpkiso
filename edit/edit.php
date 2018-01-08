<?php
  // ステップ1 
  // DBの接続
  require('dbconnect.php');

  // A部分---------------------------------------------------------
  // var_dump($_POST["code"]);
  if (isset($_POST['code'])){
  // ボタンが押されたらUPDATE文を実行
  $sql = 'UPDATE `survey` SET `nickname`="'.$_POST["nickname"].'",`email`="'.$_POST["email"].'",`content`="'.$_POST['content'].'" WHERE `code` = '.$_POST['code'];
// var_dump($sql);
  $stmt = $dbh->prepare($sql);

  // SQL文を実行
  $stmt->execute();

  // 一覧へ戻る
  header('Location: view.php');
  }
  // A部分 終了 ----------------------------------------------------

  // B部分---------------------------------------------------------
  // ステップ2 
  // SQL文実行
  $sql = 'SELECT * FROM `survey` WHERE `code`='.$_GET['code'];

   // SQL文を実行する準備
  $stmt = $dbh->prepare($sql);
    // SQL文を実行
  $stmt->execute();
  // ヒント：ここにフェッチしたデータを保存しておく代入文を記述！！
  $record = $stmt->fetch(PDO::FETCH_ASSOC);
  // B部分 終了 ----------------------------------------------------

  // ステップ3 
  // 接続の解除
  $dbh = null;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <title>お問い合わせ情報編集</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
  <!-- トップ画像 -->
  <div class="top-cover">
    <img src="../assets/img/01.jpg"></div>

  <!-- データ送信 -->
  <form method="POST" action="">
    <section class = "row">
      <div class="col-md-8 col-md-offset-2">
        <div class="content text-center">
          <h1>お問い合わせ情報編集</h1> 

        <!-- 名前 -->
        <div>
          コード <br>
          <?php echo $_GET['code'] ?>
          <input type="hidden" name="code" value="<?php echo $_GET['code']; ?>">
        </div>
        <div class="col-sm-12">
          <input type="text" class="from-control" name="nickname" placeholder="Name" required="" value="<?php echo $record['nickname']; ?>">

        </div><br>

        <!-- メールアドレス -->
        <div class="col-sm-12">
          <input type="text" class="from-control" name="email" placeholder="E-mail" required="" value="<?php echo $record['email']; ?>" >
        </div><br>

        <!-- お問い合わせ -->
        <div class="col-sm-12">
          <textarea name="content" class="from-control" placeholder="Message" style="height: 100px" required=""><?php echo $record['content']; ?></textarea>
        </div><br>
  
        <!-- 送信ボタン -->
        <div class="col-sm-12">
         <input type="submit" value="Send" id="submit-btn" class="btn btn-primary btn-block"></div><br>

        </div>
      </div>
    </section>
  </form>


  <div class="col-md-8 col-md-offset-2">
    <div class="content text-center">
      <?php include('copyright.php');?>
    </div>
  </div>



</body>
</html>