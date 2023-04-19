<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    require_once('db_connect.php');
    $db_connect = new DbConnect();
    $db = $db_connect->getDbConnection();

?>
<h1>TODOLIST</h1>
<!--新規作成ボタン-->
<form action="task_add.php" method="post">
<input type="submit" value="新規追加">
</form>

<!--並び替えボタン-->
<!--todoリストの一覧を表示-->
<table>
    <tr>
        <th>ID</th>
        <th>タイトル</th>
        <th>内容</th>
        <th>作成日時</th>
        <th>編集</th>
        <th>削除</th>
    </tr>

        <!-- todoリストから取り出すための$stmt->fetch(PDO::FETCH_ASSOC)が必要 -->
    
</table>
</body>
</html>