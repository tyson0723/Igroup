<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./toukou.css">
    </head>
<body>
    <h1>自由に投稿してください！</h1>
<div style="text-align: right" class="container">
    <a class="btn btn-border-1" href="menu.php">メニュー</a>
    <a class="btn btn-border-1" href="index.php">ログアウト</a>
    </div>
</body>
<form action="insert.php" method="post">
    <!--<table border="1">-->
        <tr>
            <td><input type="text" name="articletitle" placeholder="タイトル"></td>
        </tr><br>
        <input type="radio" name="open" value="0" checked>公開
        <input type="radio" name="open" value="1" >非公開<br>
        <tr>
            <td><textarea type="text" name="articlename" placeholder="投稿内容"></textarea></td>
        </tr><br>
        <tr>
            <button onclick="location.href='insert.php'">投稿</button>
        </tr>
    </table>
</form>