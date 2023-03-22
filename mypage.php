<?php
session_start();
require_once 'db_connect.php';

$userid=$_SESSION['userid'];
$sql = "select * from article where deleteflag=0 and userid = ".$userid;

$stm = $pdo->prepare($sql);

$stm->execute();

$result = $stm->fetchAll(PDO::FETCH_ASSOC);

//var_dump($_SESSION);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./mypage.css">
    <title>Document</title>
</head>
<body>
<div style="text-align: right" class="container">
    <a class="btn btn-border-1" href="menu.php">メニュー</a>
    <a class="btn btn-border-1" href="index.php">ログアウト</a>
    </div>
<table id-'ta' border='1' align='center'>
    <?php foreach($result as $r) :?>
        <thead><tr>
        <th><a href="title.php?id=<?php echo $r['articleid'];?>"><?php echo $r['articletitle'];?></a></th><th><?php echo $r['date'];?></th>
        <th><button onclick="location.href='update.php?articleid=<?php echo $r['articleid'];?>'">編集</button></th><br>
    </thead></tr>
        <?php endforeach;?>
    </table>
        <a href="indexlogin.php">戻る</a>
</body>
</html>