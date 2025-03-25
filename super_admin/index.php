<?php
require_once '../include/config.php';
require_once '../include/session.php';
echo isset($_SESSION["user_id"]) ? $users_id = $_SESSION["user_id"] : "no login session"; /* you can use here the header('location: ../index.php') */
echo isset($_SESSION["username"]) ? $username = $_SESSION["username"] :"no username";
?>





<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>