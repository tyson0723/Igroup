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
    <title>Document</title>
</head>
<body>
    <form action="updateEND.php?articleid=<?php echo $result['articleid'];?>" method="post">
    <!--<table border="1">-->
        <tr>
            <td><input type="text" name="articletitle" value="<?php echo $result['articletitle'];?>"></td>
        </tr><br>
        <input type="radio" name="open" value="0" checked>公開
        <input type="radio" name="open" value="1" >非公開<br>
        <tr>
            <td><textarea type="text" name="articlename" ><?php echo $result['articlename'];?></textarea></td>
        </tr><br>
        <tr>
            <button onclick="location.href='mypage.php'">キャンセル</button>
            <button onclick="location.href='insert.php'">更新</button>
        </tr>
    </table>
</form>
<button onclick="location.href='delete.php?articleid=<?php echo $result['articleid'];?>'">削除</button>
</body>
</html>