<?php

require_once '../include/config.php';
require_once '../include/session.php';

echo isset($_SESSION["user_id"]) ? $users_id = $_SESSION["user_id"] : "no user_id";

?>


