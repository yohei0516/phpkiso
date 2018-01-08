<?php
  //var_dump 変数の中身を表示する
  //Undefined index: code が表示されている時
  // POST送信されていない
  // エラーが表示されない時はPOST送信されている
  // var_dump($_POST["code"]);

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
    // SQLインジェクションを防ぐ！
    // プリペーアドステートメントを使う

    // isset 変数が存在しているかチェック
    if ((isset($_POST['code'])) && ($_POST['code'] != '')){
      // POST送信されている（?は置き換えたい値がある場所に記述）
      $sql = 'SELECT * FROM `survey` WHERE `code`=?;';

      //置き換えたいデータを配列の形で保存する
      //$data[] と書くと配列の末尾に追加される
      //$data = $_POST['code']; -> $dataの中に1とか2とか記述された文字が格納される
      // $data[] = $_POST['code']; -> $data[0]の中に記述された文字が格納される
      $data[] = $_POST['code'];

    // SQLを実行する準備
    // -> アロー演算子
    $stmt = $dbh->prepare($sql);

    // SQL文を実行
    $stmt->execute($data);

    } else {
      // POST送信されている
      // 空文字が送られてきている
      $sql = 'SELECT * FROM `survey`;';
    
    // SQLを実行する準備
    // -> アロー演算子
    $stmt = $dbh->prepare($sql);

    // SQL文を実行
    $stmt->execute();

    // ステップ3 データベースの切断（オブジェクトを空っぽにしている）
    // $dbh = null;
  }
?>

<!DOCTYPE html>
<html>

  <head>
    <link rel="stylesheet" href="../assets/css/view.css">
<!--     <link rel="stylesheet" href="assets/css/bootstrap.css"> -->
      <title>お問い合わせ一覧</title>
      <h1>[ お問い合わせ一覧 ]</h1>
  </head>

  <body>
    <form action="" method="post">
    <p>検索したいcodeを入力してください。</p>
    <input type="text" name="code">
    <input type="submit" value="検索">
  </form>

  <hr  class="underline" color="#2a6496" size="1px">
  
<!-- ここからPHPコードを記述する -->
<?php
// while 条件設定ができる繰り返し文
// while (1)無限ループ
  while (1) {
  // 一行取得
  $record = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($record == false){
    // 処理を中断する
    break;
  }
  // 連想配列のキーがカラム名と同じものになっている！
?>


  <table class="yokonarabi">
    <tbody class="company">
        <tr>
            <th>code</th>
            <td> <?php echo $record["code"]; ?></td>


        <tr>
            <th>name</th>
            <td><?php echo $record["nickname"];?></td>
        </tr>

        <tr>
            <th>email</th>
            <td><?php echo $record["email"];?></td>
        </tr>

        <tr>
            <th>content</th>
            <td><?php echo $record["content"];?></td>
        </tr>
    </tbody>

        <!-- 編集ボタン -->
      <tfoot>
        <th></th>
        <td>
          <a href="edit.php?code=<?php echo $record["code"]; ?>"><button>編集</button></a>
        <!-- 削除ボタン  -->
          <a onclick="return confirm('<?php echo $record["code"]; ?>を削除します、よろしいですか？');" href="delete.php?code=<?php echo $record["code"]; ?>"><button>削除</button></a>
        </td>
      </tfoot>


  </table> 

<?php

}
    // ステップ3 データベースの切断（オブジェクトを空っぽにしている）
    $dbh = null;
    // 宿題　リストタグかtableタグを使って、画面を装飾してみましょう
?>

  </body>
</html>