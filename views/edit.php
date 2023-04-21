<?php
require_once('../controllers/variable.php');
require_once('../controllers/db_connect.php');

$db_connect = new DbConnect();
$dbh = $db_connect->getDbConnection();
$id = createGet('id');

$sql = 'SELECT title, content FROM mst_task WHERE id = :id';
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
//多分エスケープ処理ができてないから別で必要
$editTitle = $rec['title'];
$editContent = $rec['content'];

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

    <form action="../controllers/edit_done.php" method="post">
            <div style="margin: 10px">
                <label for="title">編集するタスク名:</label>
                <input type="hidden" name="editId" value="<?php echo $id; ?>"><br>
                <input type="text" name="title" value="<?php echo $editTitle; ?>"> <br>
            </div>

            <div style="margin: 20px 10px">
                <label for="content">編集するタスクコンテンツ:</label>
                <textarea name="content" id="content" cols="30" rows="5"><?php echo $editContent; ?></textarea>
            </div>
            <input type="submit" value="完了する">
            
    </form>

</body>
</html>