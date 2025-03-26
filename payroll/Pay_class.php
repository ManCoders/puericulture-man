<?php
class Pay_class {
    private $db;

    public function __construct() {
        include '../include/config.php';
        $this->db = $pdo;        
    }
    function __destruct(){
    $this->db = null;
    }

    /* GET METHOD HERE */
    public function get_employees() {
        $stmt = $this->db->prepare("SELECT * FROM employees");
        $stmt->execute();
        return $stmt->fetch();
    }


    /* SET METHOD HERE  */
    /* UPDATE METHOD HERE */
}


?>