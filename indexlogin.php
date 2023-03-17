<?php
session_start();
require_once 'db_connect.php';
//公開記事の一覧表示
$sql="select articleid,articletitle,username,date from article where deleteflag=0";
$stm=$pdo->prepare($sql);//次に使うデータベースの予約
$stm->execute();
  $result=$stm->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./indexlogin.css">
    </head>
<body>
    <div style="text-align: right" class="container">
    <a class="btn btn-border-1" href="menu.php">メニュー</a>
    <a class="btn btn-border-1" href="index.php">ログアウト</a>
    </div>
    <div class="post-btn">
    <a class="btn btn-border-1" href="toukou.php">投稿</a>
    </div>
    <h1 style="text-align: center">ジョビッター</h1>
    <table id-'ta' border='1' align='center'>
   <thead><tr>
   <th>タイトル</th>
   <th>著者</th>
   <th>投稿日時</th>
   </thead></tr>
   <?php   foreach($result as $row) :?>
           <tr>
           <td> <a href="loginarticle.php?articleid=<?php echo $row['articleid'];?>"><?php echo $row['articletitle'];?></a></td>
         <td> <?php echo $row['username'];?></td>
           <td><?php echo $row['date'];?></td>
       </tr>
       <?php endforeach;?>
    </table>
</body>
</html>