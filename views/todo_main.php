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
    require_once('../controllers/db_connect.php');
    require_once('../controllers/variable.php');
    $db_connect = new DbConnect();
    $dbh = $db_connect->getDbConnection();
    $sql = 'SELECT * FROM mst_task';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    //idが渡された時にはdelete文を実行する
    if(isset($_POST['delete_id'])) {
        $delete_id = $_POST['delete_id'];
        $delete_sql = 'DELETE FROM mst_task WHERE id = :deleteId';
        $stmt = $dbh->prepare($delete_sql);
        $stmt->bindParam(':deleteId', $delete_id, PDO::PARAM_INT);
        $stmt->execute();

        header('Location: todo_main.php');
        exit;
    }
?>
<h1>TODOLIST</h1>
<!--新規作成ボタン-->
<form action="task_add.php" method="post">
<input type="submit" value="新規追加">
</form>

<!--並び替えボタン-->
<!--todoリストの一覧を表示-->
<table border="1">
    <tr>
        <th>ID</th>
        <th>タイトル</th>
        <th>内容</th>
        <th>作成日時</th>
        <th>削除</th>
    </tr>

        <!-- todoリストから取り出すための$stmt->fetch(PDO::FETCH_ASSOC)が必要 -->
        <?php while($rec = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?php echo $rec['id']; ?></td>
                <td><a href="edit.php?id=<?php echo $rec['id']; ?>"><?php echo $rec['title']; ?></a></td>
                <td><?php echo $rec['content']; ?></td>
                <td><?php echo $rec['created_at']; ?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="delete_id" value="<?php echo $rec['id']; ?>">
                        <button type="submit" onclick="return confirm('削除してもよろしいですが？')">削除する</button>
                    </form>
                </td>
        
                
            </tr>
        <?php endwhile; ?>
</table>
</body>
</html>