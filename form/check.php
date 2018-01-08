<?php
  $nickname = htmlspecialchars($_POST['nickname']);
  $email    = htmlspecialchars($_POST['email']);
  $content  = htmlspecialchars($_POST['content']);
  // PHPでサニタイジングをするには、「htmlspecialchars()」を使います。
  // htmlspecialchars()の（）の中に、サニタイジングしたい文字列をセットします。
  // サニタイジングとは、入力されたデータの危険な部分を無効化することで、テキストデータのうち、
  // 「＆」や「＞」などの特殊文字を一般的な文字に変換してくれる機能です。


  // 名前
  if ($nickname == '') {
    $nickname_result = '！Please input your name.';
  } else {
    $nickname_result = 'Name：'.$nickname;
  } 

  // メールアドレス
  if ($email == '') {
    $email_result = '！Please input your E-mail.';
  } else {
    $email_result = "E-mail：".$email;
  }


  // お問い合わせ内容
  if ($content == '') {
    $content_result = "！Please input your inquiry";
  } else {
    $content_result = "Message：".$content;
  }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <title>入力内容確認</title>  
  <meta charset="utf-8">
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
    <!-- トップ画像 -->
  <div class="top-cover">
  <img src="../assets/img/01.jpg"></div>

    <!-- 詳細内容確認 -->
    <section class = "row">
      <div class="col-md-8 col-md-offset-2">
        <div class="content text-center"> <br>
          <h1><strong>Confirm</strong></h1> <br>
            <div class="well well-sm">
              <?php echo $nickname_result; ?></div>
            <div class="well well-sm">
              <?php echo $email_result; ?></div>
              <div class="well well-lg">
              <?php echo $content_result;  ?></div>

              <form method="POST" action="thanks.php">
              <input type="hidden" name="nickname" value=" <?php echo $nickname; ?> ">
              <input type="hidden" name="email" value=" <?php echo $email; ?> ">
              <input type="hidden" name="content" value=" <?php echo $content; ?> "> 

               <input type="button" value="Back" onclick="history.back()" class="btn btn-primary btn-lg">
               <input type="submit" value="&nbsp;&nbsp;OK&nbsp;&nbsp;" class="btn btn-primary btn-lg">
               <!-- これはJavaScriptの構文で、inputタグのonclick属性に「history.back()」と指定するとブラウザの戻るボタンをクリックした時と同じ動作をします。 -->

            <!-- 下記は入力漏れがなければOKボタンを表示する式だが、htmlでrequiredしているので今は不要 -->
            <!-- <?php 
              if ($nickname != '' && $email != '' && $content != ''): ?>
              <input type="submit" value="OK">
            <?php endif; ?> -->
        </div>
      </div>
    </section>
  </form>
   
    <br>  
    <div class="col-md-8 col-md-offset-2">
    <div class="content text-center">
      <?php include('copyright.php');?>
    </div>

  </div>
</body>
</html>

