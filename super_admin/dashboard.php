<?php

require_once '../include/config.php';
require_once '../include/session.php';

echo isset($_SESSION["user_id"]) ? $users_id = $_SESSION["user_id"] : "no user_id";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>super admin sir!</h1>
    <a href="../logout.php">logout</a>
</body>
</html>