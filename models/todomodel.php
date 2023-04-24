<?php
/*基本のcrud捜査などをまとめたクラスを作成する*/
require_once('../controllers/db_connect.php');
class TodoModel extends DbConnect {
    public $getDbConnection;

    /*追加する*/
    public function addTodo($title, $content) {
        $sql = 'INSERT INTO mst_task(title, content) VALUES (:title, :content)';
        $stmt = $this->getDbConnection()->prepare($sql);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
        $result = $stmt->execute();
        return $result;
    }
    /*データベースから全部取得する*/
    public function getTask() {
        $sql = 'SELECT id, title, content, created_at FROM mst_task ORDER BY created_at ASC';
        $stmt = $this->getDbConnection()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    /*削除*/
    public function deleteTodo($id) {
        $sql = 'DELETE FROM mst_task WHERE id = :id';
        $stmt = $this->getDbConnection()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        return $result;
    }
    /*更新する*/
    public function updateTodo($id, $title, $content) {
        $sql = 'UPDATE mst_task SET title = :title, content = :content WHERE id = :id';
        $stmt = $this->getDbConnection()->prepare($sql);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        return $result;
    }

    public function get($id) {
        $sql = 'SELECT title, content FROM mst_task WHERE id = :id';
        $stmt = $this->getDbConnection()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        //edit.phpに渡すために配列として返す.
        return array('title' => $rec['title'], 'content' => $rec['content']);

    }

}
?>