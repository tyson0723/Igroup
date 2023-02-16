<?php
session_start();
require_once 'db_connect.php';
//ユーザー名とパスワードが入力されているかチェックする。
//ユーザー名とパスワードが空じゃなかったとき
if(!empty($_POST["user"]) && !empty($_POST["pw"])){
  //入力されたユーザー名とパスワードを取得する
  $user = $_POST["user"];
  $pw = $_POST["pw"];
  //echo $user;
  //echo $pw;
  //入力されたユーザー名がデータベースの中に存在するかチェックする。
  $sql="select * from usertable where user = :user";
  $stm=$pdo->prepare($sql);//次に使うデータベースの予約
  $stm->bindValue(':user', $user, PDO::PARAM_STR);

  $stm->execute();
    $result=$stm->fetch(PDO::FETCH_ASSOC);
    //echo"<pre>";
    var_dump($result);
    //echo"</pre>";
    //入力されたユーザーが存在していたら
    if($result){
      //echo "いた";
      //入力されたpwとデータベースのpwが同じだったら
      if($pw === $result["pw"]){
        //echo "ログイン成功";
        //index.phpにリダイレクトする
        header('Location: ./menu.php');
        exit();
      }else{
        //echo "失敗";
        //header('Location: ./notlogin.php');
      }
    }else{
      //echo "いません";
      header('Location: ./notlogin.php');
    }
}else{
  //echo "入力エラーです";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./login.css">
    </head>
<body>
<div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">ログイン失敗</h2>

  <form action="login.php" class="login-container" method="post">
    <p><input name="user" type="text" placeholder="ユーザー名"></p>
    <p><input name="pw" type="password" placeholder="パスワード"></p>
    <p><input type="submit" value="戻る"></p>
    <p><input type="submit" value="ログイン"></p>
    <div style="text-align: center">
    <a href="#">新規登録はこちら</a>
    </div>
  </form>
</div>
</body>