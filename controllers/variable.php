<?php
class Variable {

    public function createInput($variable) {
        $filter_input = filter_input(INPUT_POST, $variable);
        $escaped_input = htmlspecialchars($filter_input, ENT_QUOTES, 'UTF-8');
        return $escaped_input;
    }
    public function createGet($variable) {
        $filter_get = filter_input(INPUT_GET, $variable);
        $escaped_get = htmlspecialchars($filter_get, ENT_QUOTES, 'UTF-8');
        return $escaped_get;
    }
    public function check($title, $content) {
        if ($title != '' && $content != '' || mb_strlen($title) < $title_length) {
            return true;
        } else {
            return false;
        }
    }
   
}
?>