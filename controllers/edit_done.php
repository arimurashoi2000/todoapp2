<?php
require_once('../controllers/variable.php');
require_once('../controllers/db_connect.php');
require_once('../models/todomodel.php');

$variable = new Variable();

$editId = $variable->createInput('editId');
$editTitle = $variable->createInput('title');
$editContent = $variable->createInput('content');


if ($variable->check($editTitle, $editContent)==true) {
    //update構文を使って更新する。
    $db_connect = new DbConnect();
    $dbh = $db_connect->getDbConnection();

    $todoModel = new TodoModel();
    $todoModel->updateTodo($editId, $editTitle, $editContent);

    
    echo '編集後のタスク名：　'. $editTitle. '<br>';
    echo '編集後のコンテンツ：　'. $editContent. '<br>';
    echo 'を追加しました<br>';
} else {
    echo 'タイトルまたは内容が空白、もしくはタイトル名が30文字を超えています。';
    echo '<input type=button onclick="history.back()" value="戻る">';
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
    <a href="../views/todo_main.php">戻る</a>
</body>
</html>