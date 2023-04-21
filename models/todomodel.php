<?php
/*基本のcrud捜査などをまとめたクラスを作成する*/
require_once('../controllers/db_connect.php');
class TodoModel extends DbConnect {
    /*追加する*/
    public function addTodo($title, $content) {
        $sql = 'INSERT INTO mst_task(title, content) VALUES (:title, :content)';
        $stmt = $this->getConnection->prepare($sql);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':content', $title, PDO::PARAM_STR);
        $result = $stmt->execute();
    }
    /*データベースから全部取得する*/
    public function getTask() {
        $sql = 'SELECT id, title, content FROM mst_task ORDER BY created_at ASC';
        $stmt = $this->getConnection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    /*削除*/
    public function deleteTodo($id) {
        $sql = 'DELETE FROM mst_task WHERE id = :id';
        $stmt = $this->getConnection->prepare($sql);
        $stmt->bindParam(':id', $delete_id, PDO::PARAM_INT);
        $stmt->execute();
    }
    /*更新する*/
    public function updateTodo($id, $title, $content) {
        $sql = 'UPDATE mst_task SET title = :title content = :content WHERE id = :id';
        $stmt = $this->getConnection->prepare($sql);
        $stmt->bindParam(':title', $editTitle, PDO::PARAM_STR);
        $stmt->bindParam(':content', $editContent, PDO::PARAM_STR);
        $stmt->bindParam(':id', $delete_id, PDO::PARAM_INT);
        $stmt->execute();
    }

}
?>