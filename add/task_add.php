<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>新しいタスクの追加</h1>
    <form action="task_add_done.php" method="post">
        <div style="margin: 10px">
            <label for="title">新しいタスク名:</label>
            <input type="text" name="title"> <br>
        </div>

        <div style="margin: 20px 10px">
            <label for="content">新しいタスクコンテンツ:</label>
            <textarea name="content" id="content" cols="30" rows="5"></textarea>
        </div>
        <input type="submit" value="追加する">
        
    </form>
</body>
</html>