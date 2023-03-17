<?php
session_start();
require_once 'db_connect.php';
//公開記事の本文表示
$articleid=$_GET['articleid'];
$sql="select articletitle,articlename,username,date from article where articleid =:id";
$stm=$pdo->prepare($sql);//次に使うデータベースの予約
$stm->bindValue(':id',$articleid,PDO::PARAM_INT);
$stm->execute();
  $result=$stm->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./style.css">
    </head>
<body>
    <div style="text-align: right" class="container">
    <a class="btn btn-border-1" href="index.php">ログアウト</a>
    </div>
       <?php 
       //公開済みの記事の一覧表示
   echo "<table id-'ta' border='1' align='center'>";
   echo "<thead><tr>";
   echo "<th>","タイトル","</th>";
   echo "<th>","著者","</th>";
   echo "<th>","投稿日時","</th>";
   echo "<th>","内容","</th>";
   echo "</thead></tr>";
       foreach($result as $row){
       echo "<tr>";
            echo "<td>",$row['articletitle'],"</td>";
         echo "<td>" ,$row['username'],"</td>";
           echo "<td>",$row['date'],"</td>";
           echo "<td>",$row['articlename'],"</td>";
       echo "</tr>";
    }
    echo "</table>";
    ?>
    <a href="indexlogin.php">トップへ戻る</a>
</body>
</html>