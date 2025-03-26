<?php
$action = $_get['action'];
include "./Pay_class.php";

$crud = new Pay_class();

if ($action == 'get_id') {
    $crud = $crud->get_employees();
    if($crud){
        echo $crud;
    }
}

?>