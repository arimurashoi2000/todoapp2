<?php
require_once('../variable.php');
require_once('../db_connect.php');
$editId = createInput('editId');
$editTitle = createInput('title');
$editContent = createInput('content');
//15はマジックナンバーだから時間があったら後で修正
if ($editTitle != '' && $editContent != '' || mb_strlen($editTitle) < 15) {
    //update構文を使って更新する。
    $db_connect = new DbConnect();
    $dbh = $db_connect->getDbConnection();

    $sql = 'UPDATE mst_task SET title = :title, content = :content WHERE id = :id';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':title', $editTitle, PDO::PARAM_STR);
    $stmt->bindParam(':content', $editContent, PDO::PARAM_STR);
    $stmt->bindParam(':id', $editId, PDO::PARAM_INT);
    echo '編集後のタスク名：　'. $editTitle. '<br>';
    echo '編集後のコンテンツ：　'. $editContent. '<br>';
    echo 'を追加しました<br>';
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
    <a href="../todo_main.php">戻る</a>
</body>
</html>