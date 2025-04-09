<?php
    require_once 'include/config.php';
    require_once 'auth/view.php';
    require_once 'include/session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css?=v<?php echo time(); ?>">
    <script src="js/index.js"></script>
</head>
<body>
    <div class="form" id="login_form" style="display: <?php echo isset($_SESSION["signup_errors"]) ? 'none' : 'flex'; ?>;">
        <div class="login">
            <h2 id="h2">Login</h2>
            <form action="auth/function.php" method="post">
                <label for="username" id="label">Username</label>
                <input type="text" name="username" id="username">
                <label for="password" id="label">Password</label>
                <input type="password" name="password" id="password">
                <button id="login-btn">Login</button>
            </form>
            <p id="p-login">don't have an account? <button id="go-to-signup" onclick="go_to_signup()">Sign-up</button></p>
        </div>
        <div class="title">
            <img src="assets/images/pueri-logo.png" alt="LOGO">
            <h2 id="h1">ZAMBOANGA PUERICULTURE</h2>
            <h2 id="h1">CENTER ORG NO. 114</h2>
            <p id="p-title">HR, SCHOOL AND PAYROLL</p>
            <p id="p-title">MANAGEMENT SYSTEM</p>
        </div>
    </div>

    <div class="signup-form" id="signup_form" style="display: <?php echo isset($_SESSION["signup_errors"]) ? 'flex' : 'none'; isset($_GET["signup"]) && $_GET["signup"] == "success" ?>;">
        <?php
            signup_inputs();
        ?>
    </div>
    
    <?php
        signup_errors();
        login_errors();
    ?>
    <script src="js/input.js"></script>
</body>
</html>