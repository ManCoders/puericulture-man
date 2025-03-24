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
    <div class="navs">
        <ul>
            <li><a href="">DASHBOARD</a></li>
            <li><a href="">DASHBOARD</a></li>
            <li><a href="">DASHBOARD</a></li>
        </ul>
    </div>
    <div class="column">
        <div class="header">
            <div class="logo">
                <img src="" alt="LOGO">
                <h1>DASHBOARD</h1>
            </div>
            <div class="go-to-profile">
                <img src="" alt="profile">
                <p>username</p>
                <button>hehe</button>
            </div>
        </div>
        <div class="content">

        </div>
    </div>
    
    
</body>
</html>