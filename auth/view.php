<?php

declare(strict_types=1);

function signup_inputs(){
    echo '<div class="title" id="signup-title">';
            echo '<img src="images/pueri-logo.png" alt="LOGO">';
            echo '<h2 id="h1">ZAMBOANGA PUERICULTURE</h2>';
            echo '<h2 id="h1">CENTER ORG NO. 114</h2>';
            echo '<p id="p-title">HR, SCHOOL AND PAYROLL</p>';
            echo '<p id="p-title">MANAGEMENT SYSTEM</p>';
        echo '</div>';
        echo '<div class="signup">';
            echo '<form action="auth/function.php" method="post" enctype="multipart/form-data" novalidate>';
                echo '<div class="first-column" id="fc">';
                    echo '<h2>REGISTER HERE</h2>';
                    echo '<input type="hidden" name="action" value="signup">';
                    if (isset($_SESSION["user_signup"]["first_name"]) && isset($_SESSION["signup_errors"])) {
                        echo '<input type="text" name="first_name" placeholder="First Name:" value = "' . $_SESSION["user_signup"]["first_name"] . '">';
                    } else {
                        echo '<input type="text" name="first_name" placeholder="First Name:">';
                    }
                    if (isset($_SESSION["user_signup"]["Last_name"]) && isset($_SESSION["signup_errors"])) {
                        echo '<input type="text" name="Last_name" placeholder="Last Name:" value = "' . $_SESSION["user_signup"]["Last_name"] . '">';
                    } else {
                        echo '<input type="text" name="Last_name" placeholder="Last Name:">';
                    }
                    if (isset($_SESSION["user_signup"]["Middle_name"]) && isset($_SESSION["signup_errors"])) {
                        echo '<input type="text" name="Middle_name" placeholder="Middle Name:" value = "' . $_SESSION["user_signup"]["Middle_name"] . '">';
                    } else {
                        echo '<input type="text" name="Middle_name" placeholder="Middle Name:">';
                    }
                    if (isset($_SESSION["user_signup"]["email"]) && !isset($_SESSION["signup_errors"]["invalid_email"])) {
                        echo '<input type="email" name="email" placeholder="E-mail: " value = "' . $_SESSION["user_signup"]["email"] . '">';
                    } else {
                        echo '<input type="email" name="email" placeholder="E-mail:">';
                    }
                echo '</div>';
                echo '<div class="second-column" id="sc" style="display: none;">';
                    echo '<label for="profile">';
                        echo '<img src="images/user.png" alt="Profile" id="profile-image">';
                    echo '</label>';
                    echo '<input type="file" name="user_profile" id="profile" accept="image/*" style="display: none;" onchange="previewImage(event)" required>';
                    echo '<p id="p_profile">Profile</p>';
                    if (isset($_SESSION["user_signup"]["username"]) && !isset($_SESSION["signup_errors"]["username_taken"])) {
                        echo '<input type="text" name="username" placeholder="Username: " value = "' . $_SESSION["user_signup"]["username"] . '">';
                    } else {
                        echo '<input type="text" name="username" placeholder="Username:">';
                    }
                    echo '<input type="password" name="password" placeholder="Password" required>';
                    echo '<input type="password" name="confirm_password" placeholder="Confirm Password" required>';
                    echo '<button id="login-btn" type="submit">Sign-up</button>';
                echo '</div>';
            echo '</form>';
            echo '<button id="gtsc" onclick="gtsc()">next</button>';
            echo '<button id="gtfc" onclick="gtfc()" style="display: none;">Back</button>';
            echo '<p id="goTsc">Already have an account? <button id="gtl" onclick="gtl()">Login</button></p>';
        echo '</div>';
}

function signup_errors(){
    if (isset($_SESSION['signup_errors'])) {
        $errors = $_SESSION['signup_errors'];

        echo "<br>";
        echo '<div class="error-messages">';
            echo '<div class="p-error">';
                echo '<p>Error!</p>';
            echo '</div>';
            echo '<ul>';
                foreach ($errors as $error){
                    echo '<li><p id="p-error">' . $error . '</p></li>';  
                }
            echo '</ul>';
        echo '<div>';
        unset($_SESSION['signup_errors']);
    }else if(isset($_GET["signup"]) && $_GET["signup"] == "success"){
        echo '<div class="success-div">';
            echo '<a class="a-register" href="index.php"><p>Account has been successfully created</p>tap to continue</a>';
        echo '</div>';
    }
}

function login_errors() {
    if (isset($_SESSION['errors_login'])) {
        $errors = $_SESSION['errors_login'];
        echo "<div class='error-messages'>";
            echo '<div class="p-error">';
                    echo '<p>Error!</p>';
                echo '</div>';
            echo '<ul>';
            foreach ($errors as $error) {
                echo "<li><p>$error</p></li>";
            }
            echo '</ul>';
            unset($_SESSION['errors_login']); 
        echo "</div>";
    }
}