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
    <title>Document</title>
</head>
<body>
    <?php foreach($result as $r) :?>
        <a href="title.php?id=<?php echo $r['articleid'];?>"><?php echo $r['articletitle'];?></a><?php echo $r['date'];?>
        <button onclick="location.href='update.php?articleid=<?php echo $r['articleid'];?>'">編集</button><br>
        <?php endforeach;?>
        <a href="indexlogin.php">戻る</a>
</body>
</html>