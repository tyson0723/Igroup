<?php
session_start();
require_once 'db_connect.php';
define('max_view','5');
//公開記事の一覧表示
$count = "SELECT COUNT(*) AS count FROM article where deleteflag=0 and open=0";
$countin=$pdo->prepare($count);
$countin->execute();
$total_count = $countin->fetch(PDO::FETCH_ASSOC);
$pages = ceil($total_count['count'] / max_view);

    //現在いるページのページ番号を取得
    if(!isset($_GET['page_id'])){ 
        $now = 1;
    }else{
        $now = $_GET['page_id'];
    }

$sql="select articleid,articletitle,username,date from article where deleteflag=0 and open=0 LIMIT :start,:max";
$stm=$pdo->prepare($sql);//次に使うデータベースの予約
if ($now == 1){
    //1ページ目の処理
            $stm->bindValue(':start', $now -1,PDO::PARAM_INT);
            $stm->bindValue(':max', max_view,PDO::PARAM_INT);
}else{    
    //1ページ目以外の処理
            $stm->bindValue(':start', ($now -1 ) * max_view,PDO::PARAM_INT);
            $stm->bindValue(':max', max_view,PDO::PARAM_INT);
        }
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
           <td> <a href="toparticle.php?articleid=<?php echo htmlspecialchars($row['articleid']);?>"><?php echo htmlspecialchars($row['articletitle']);?></a></td>
         <td> <?php echo htmlspecialchars($row['username']);?></td>
           <td><?php echo htmlspecialchars($row['date']);?></td>
       </tr>
       <?php endforeach;?>
    </table>
    <?php
//ページネーションを表示
for ( $n = 1; $n <= $pages; $n ++){
                if ( $n == $now ){
                    echo "<span style='padding: 5px;'>$now</span>";
                }else{
                    echo "<a href='index.php?page_id=$n' style='padding: 5px;'>$n</a>";
                }
            }
            ?>
</body>
</html>