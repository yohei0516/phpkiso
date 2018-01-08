<!DOCTYPE html>
<html lang="ja">
<head>
  <title>お問い合わせ</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
  <!-- トップ画像 -->
  <div class="top-cover">
    <img src="../assets/img/01.jpg"></div>

  <!-- データ送信 -->
  <form method="POST" action="check.php">
    <section class = "row">
      <div class="col-md-8 col-md-offset-2">
        <div class="content text-center">
          <h1 style="margin-bottom: :30px"><strong>Info</strong></h1>
          <p>
            <a href="http://nexseed.net/" target="_blank">〜NexSeed 一生モノのセブ島留学〜</a><br>
            <a href="mailto:support@nexseed.net"><strong>support@nexseed.net</strong></a><br>
            <a href="https://www.google.com.ph/maps/place/Cardinal+Rosales+Ave,+Cebu+City,+Cebu/data=!4m2!3m1!1s0x33a9993fc09d6b8f:0x5f80be546afacfc6?sa=X&ved=0ahUKEwjyp6T9uvjXAhUKKZQKHWm8A-UQ8gEIJDAA" target="_blank">Cardinal Rosales Ave, Cebu City, Cebu</a>

          </p>

        <!-- 名前 -->
        <div class="col-sm-12">
          <input type="text" class="from-control" name="nickname" placeholder="Name" required="">
        </div><br>

        <!-- メールアドレス -->
        <div class="col-sm-12">
          <input type="text" class="from-control" name="email" placeholder="E-mail" required="">
        </div><br>

        <!-- お問い合わせ -->
        <div class="col-sm-12">
          <textarea name="content" class="from-control" placeholder="Message" style="height: 100px" required=""></textarea>
        </div><br>
  
    <!-- 送信ボタン -->
    <div class="col-sm-12">
     <input type="submit" name="送信" value="Send" id="submit-btn" class="btn btn-primary btn-block"></div><br>

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