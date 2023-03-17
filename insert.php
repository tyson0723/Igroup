<?php
session_start();
require_once 'db_connect.php';

$articletitle = $_POST['articletitle'];
$articlename = $_POST['articlename'];
$open = $_POST['open'];
$userid = $_SESSION['userid'];
$user=$_SESSION['user'];

$sql = "insert into article (articletitle, articlename,username,open,userid) values (:articletitle, :articlename,:user,:open,:userid)";

$stm = $pdo->prepare($sql);

$stm->bindValue(':articletitle', $articletitle, PDO::PARAM_STR);
$stm->bindValue(':articlename', $articlename, PDO::PARAM_STR);
$stm->bindValue(':user', $user, PDO::PARAM_STR);
$stm->bindValue(':open', $open, PDO::PARAM_INT);
$stm->bindValue(':userid', $userid, PDO::PARAM_INT);

$stm->execute();
?>
<p>投稿しました</p>
<a href="indexlogin.php">トップページへ戻る</a>