<?php
session_start();
require_once 'db_connect.php';
//公開記事の一覧表示
$sql="select articleid,articletitle,username,date from article where deleteflag=0 and open=0";
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
       <!-- 公開済みの記事の一覧表示 -->
   <table id-'ta' border='1' align='center'>
   <thead><tr>
   <th>タイトル</th>
   <th>著者</th>
   <th>投稿日時</th>
   </thead></tr>
   <?php   foreach($result as $row) :?>
           <tr>
           <td> <a href="toparticle.php?articleid=<?php echo $row['articleid'];?>"><?php echo $row['articletitle'];?></a></td>
         <td> <?php echo $row['username'];?></td>
           <td><?php echo $row['date'];?></td>
       </tr>
       <?php endforeach;?>
    </table>
</body>
</html>