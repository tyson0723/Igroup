<?php
require_once 'db_connect.php';

$articleid=$_GET['articleid'];

$sql = "update article set deleteflag=1 where articleid=".$articleid;

$stm = $pdo->prepare($sql);

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
    <p>削除しました</p>
    <a href="mypage.php">戻る</a>
</body>
</html>