<?php

require_once 'db_connect.php';

if(isset($_GET['articleid'])){
    $articleid =$_GET['articleid']; 
    
    $sql = "select * from article where articleid = ".$articleid;
    
    $stm = $pdo->prepare($sql);
    
    $stm->execute();
    
    $result = $stm->fetch(PDO::FETCH_ASSOC);

    // var_dump();
} else {
    echo "ありません";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./update.css">
    <title>Document</title>
</head>
<body>
    <h1>編集</h1>
    <form action="updateEND.php?articleid=<?php echo $result['articleid'];?>" method="post">
    <!--<table border="1">-->
        <div class="tou">
        <tr>
            <td><input type="text" name="articletitle" value="<?php echo $result['articletitle'];?>"></td>
        </tr><br>
        <input type="radio" name="open" value="0" checked>公開
        <input type="radio" name="open" value="1" >非公開<br>
        <tr>
            <td><textarea type="text" name="articlename" ><?php echo $result['articlename'];?></textarea></td>
        </tr><br>
        <tr>
            <button onclick="location.href='insert.php'">更新</button>
        </tr>
</div>
    </form>
</table>
<div class="tou">
<button onclick="location.href='mypage.php'">キャンセル</button>
<button onclick="location.href='delete.php?articleid=<?php echo $result['articleid'];?>'">削除</button>
</div>
</body>
</html>