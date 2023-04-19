<?php
$dbn = 'mysql:dbname=shop;host=localhost;charset=utf8';
$user = '';
$password = '';
$dbh = new PDO($dbn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'select * from shop where id = :id';
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
class DbConnect {
    private $Dbservername = 'localhost';
    private $Dbusername = '';
    private $Dbpassword = '';
    private $Dbname = 'shop';
    private $Dbconnection;


    public function __construct() {
        $dbn = 'mysql:dbname='.$this->Dbname.';host='.$this->Dbservername.';charset=utf8';
        try {
                $dbh = new PDO($this->Dbname, $this->Dbusername, $this->Dbpassword);
                $dbh->setAttribute(PDO::ATTR_EERRMODE, PDO::ERRMODE_EXCEPTION);
                
            } catch (Exception $e) {
                $e->getMessage();
                die();
            }
    }
}
?>