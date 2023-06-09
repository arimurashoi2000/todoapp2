<?php

class DbConnect {
    private $Dbservername = 'localhost';
    private $Dbusername = 'root';
    private $Dbpassword = '';
    private $Dbname = 'todoapp';
    private $Dbconnection;
    
    public function __construct() {
        $dbn = 'mysql:dbname='.$this->Dbname.';host='.$this->Dbservername.';charset=utf8';
        try {
                $dbh = new PDO($dbn, $this->Dbusername, $this->Dbpassword);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //
                $this->Dbconnection = $dbh;
                
            } catch (Exception $e) {
                throw new Excption('データベースに接続できませんでした'. $e-≥getMessage());
            }
    }
    public function getDbConnection() {
        return $this->Dbconnection;
    }
}
?>