<?php
session_start();
require_once 'db_connect.php';

$articletitle = $_POST['articletitle'];
$articlename = $_POST['articlename'];
$open = $_POST['open'];
$userid = $_SESSION['userid'];

$sql = "insert into article (articletitle, articlename,open,userid) values (:articletitle, :articlename,:open,:userid)";

$stm = $pdo->prepare($sql);

$stm->bindValue(':articletitle', $articletitle, PDO::PARAM_STR);
$stm->bindValue(':articlename', $articlename, PDO::PARAM_STR);
$stm->bindValue(':open', $open, PDO::PARAM_INT);
$stm->bindValue(':userid', $userid, PDO::PARAM_INT);

$stm->execute();
?>
<p>投稿しました</p>
<a href="indexlogin.php">トップページへ戻る</a>