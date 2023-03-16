<?php

require_once 'db_connect.php';

$articletitle=$_POST['articletitle'];
$articlename=$_POST['articlename'];
$open=$_POST['open'];
$articleid=$_GET['articleid'];

$sql = "update article set articletitle=:articletitle,articlename=:articlename,open=:open where articleid=".$articleid; 

$stm = $pdo->prepare($sql);

$stm->bindValue(':articletitle', $articletitle, PDO::PARAM_STR);
$stm->bindValue(':articlename', $articlename, PDO::PARAM_STR);
$stm->bindValue(':open', $open, PDO::PARAM_INT);

$stm->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>編集しました</p>
    <a href="mypage.php">戻る</a>
</body>
</html>