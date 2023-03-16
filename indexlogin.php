<?php
session_start();
require_once 'db_connect.php';
//公開記事の一覧表示
$sql="select articletitle,username,date from article where deleteflag=0";
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
    <form action="loginarticle.php" method="post">
    <?php 
       //記事の一覧表示
   echo "<table id-'ta' border='1' align='center'>";
   echo "<thead><tr>";
   echo "<th>","タイトル","</th>";
   echo "<th>","著者","</th>";
   echo "<th>","投稿日時","</th>";
   echo "</thead></tr>";
       foreach($result as $row){
       echo "<tr>";
            echo "<td><input type='submit' name='articletitle' value=",$row['articletitle'],"></td>";
         echo "<td>",$row['username'],"</td>";
           echo "<td>",$row['date'],"</td>";
       echo "</tr>";
    }
    echo "</table>";
    ?>
    </form>
</body>
</html>