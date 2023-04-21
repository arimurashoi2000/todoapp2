<?php

require_once('../controllers/variable.php');
require_once('../controllers/db_connect.php');

$title = createInput('title');
$content = createInput('content');


if ($title != '' || $content != '' || mb_strlen($title) > 15) {
    //データベースに接続してinsert文を実行する
    $db_connect = new DbConnect();
    $dbh = $db_connect->getDbConnection();

    $sql = 'INSERT INTO mst_task(title, content) VALUES (:title, :content)';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':content', $title, PDO::PARAM_STR);
    $stmt->execute();

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