<?php

require_once('variable.php');
require_once('db_connect.php');
require_once('../models/todomodel.php');

$variable = new Variable();

$title = $variable->createInput('title');
$content = $variable->createInput('content');





if ($variable->check($title, $content)==true) {
    //データベースに接続してinsert文を実行する
    $db_connect = new DbConnect();
    $dbh = $db_connect->getDbConnection();
    $todoModel = new TodoModel();

    $todoModel->addTodo($title, $content);

    echo $title.'<br>';
    echo $content.'<br>';
    echo 'を登録完了しました。';
} else {
    echo 'タイトルまたは内容が空白、もしくはタイトル名が１５文字を超えています。';
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
    <br>
    <a href="../views/todo_main.php">戻る</a>
    
</body>
</html>