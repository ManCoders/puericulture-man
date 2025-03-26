<?php
require_once '../include/config.php';
require_once '../include/session.php';
echo isset($_SESSION["user_id"]) ? $users_id = $_SESSION["user_id"] : header("Location: ../index.php"); /* you can use here the header('location: ../index.php') */
echo isset($_SESSION["username"]) ? $username = $_SESSION["username"] :"no username";
?>

<a href="../logout.php">logout</a>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>this is super admin</h1>
</body>
</html>