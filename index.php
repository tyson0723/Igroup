<?php
session_start();
require_once 'db_connect.php';
//公開記事の一覧表示
$sql="select articleid,articletitle,username,date from article where deleteflag=0 and open=1";
$stm=$pdo->prepare($sql);//次に使うデータベースの予約
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
    <a class="btn btn-border-1" href="login.php">ログイン</a>
    </div>
        <p style="text-align: center">ジョビッターへようこそ！！</p>
        <p style="text-align: center">ここでは以下のような自由な記事を閲覧、投稿できます。</p>
        <p style="text-align: center">ログインするとさらに多くの記事が閲覧でき、自分で記事の投稿もできます。</p><br>
        <form action="toparticle.php" method="post">
       <?php 
       //公開済みの記事の一覧表示
   echo "<table id-'ta' border='1' align='center'>";
   echo "<thead><tr>";
   echo "<th>","タイトル","</th>";
   echo "<th>","著者","</th>";
   echo "<th>","投稿日時","</th>";
   echo "</thead></tr>";
       foreach($result as $row){
           echo "<tr>";
            echo "<td><input type='submit' name=articletitle value=",$row['articletitle'],"></td>";
         echo "<td>" ,$row['username'],"</td>";
           echo "<td>",$row['date'],"</td>";
       echo "</tr>";
    }
    echo "</table>";
    ?>
    </form>
</body>
</html>