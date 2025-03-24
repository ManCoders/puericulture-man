<?php

require_once '../include/config.php';
require_once '../include/session.php';

echo isset($_SESSION["user_id"]) ? $users_id = $_SESSION["user_id"] : header("location: ../index.php");

?>


<a href="../logout.php"><button>LOGOUT</button></a>