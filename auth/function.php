<?php
    require_once '../include/config.php';
    require_once '../include/session.php';
    require_once 'model.php';
    require_once 'control.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['action']) && $_POST['action'] === 'signup') {
            
            $first_name = $_POST['first_name'];
            $Last_name = $_POST['Last_name'];
            $Middle_name = $_POST['Middle_name'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            $errors = [];

            if (isset($_FILES["user_profile"]) && $_FILES["user_profile"]["error"] === 0) {
                $profile = $_FILES["user_profile"];
            
                if (empty_image($profile)) {
                    $errors["image_Empty"] = "Please insert your profile image!";
                }
            
                if (fileSize_notCompatible($profile)) {
                    $errors["large_File"] = "The image must not exceed 5MB!";
                }
            
                $allowed_types = [
                    "image/jpeg",
                    "image/jpg",
                    "image/png"
                ];
            
                if (image_notCompatible($profile, $allowed_types)) {
                    $errors["file_Types"] = "Only JPG, JPEG, PNG files are allowed.";
                }
            
                if (!$errors) {
                    $target_dir = "../upload_image/";
                    $image_file_name = uniqid() . "-" . basename($profile["name"]);
                    $target_file = $target_dir . $image_file_name;
                
                    if (move_uploaded_file($profile["tmp_name"], $target_file)) {
                        $profile = $image_file_name;
                    } else {
                        $errors["upload_Error"] = "There was an error uploading your image.";
                    }
                }
            } else {
                $errors["image_file"] = "Please select an image to upload.";
            }
        
            if (empty_inputs($first_name, $Last_name, $Middle_name, $email, $profile, $username, $password, $confirm_password)) {
                $errors["empty_inputs"] = "Please fill all fields!";
            }
            if(invalid_email($email)){
                $errors["invalid_email"] = "your email is invalid!";
            }
            if(email_registered($pdo, $email)){
                $errors["email_registered"] = "your email is already registered!";
            }
            if(password_notMatch ($confirm_password, $password)){
                $errors["password_notMatch"] = "Password not match!";
            }
            if(username_taken($pdo, $username)){
                $errors["username_taken"] = "Username Already Taken!";
            }
            if(password_secured($password)){
                $errors["password_secured"] = "password must be 8 characters above!";
            }
            if(password_security($password)){
                $errors["password_security"] = "password must have at least 1 uppercase, numbers and unique characters like # or !.";
            }
        
            if ($errors) {
                $_SESSION["signup_errors"] = $errors;
                $signup_data = [
                    "first_name" => $first_name,
                    "Last_name" => $Last_name,
                    "Middle_name" => $Middle_name,
                    "email" => $email,
                    "profile" => $profile,
                    "username" => $username
                ];
                $_SESSION["user_signup"] = $signup_data;
                header("Location: ../index.php");
                die();
            }
            
            try {
                getUserIpnputobject($pdo, $first_name, $Last_name, $Middle_name, $email, $profile, $username, $password); 
                header("Location: ../index.php?signup=success");
                die();
            } catch (PDOException $e) {
                die("QUERY FAILED: " . $e->getMessage());
            }

        }
        // ====================== LOGIN ==================== //
        if (isset($_POST['username'], $_POST['password'])) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            try {
                $errors = [];

                if (login_empty_inputs($username, $password)) {
                    $errors["empty_inputs"] = "Please fill in both fields!";
                }

                $result = get_username($pdo, $username);

                if (!$result) {
                    $errors["login_incorrect"] = "Incorrect username!";
                } else {
                    if (wrong_password($password, $result["password"])) {
                        $errors["login_incorrect"] = "Wrong password!";
                    }
                }

                if ($errors) {
                    $_SESSION["errors_login"] = $errors;
                    header("Location: ../index.php");
                    die();
                }

                $_SESSION["user_id"] = $result["id"];
                $_SESSION["username"] = htmlspecialchars($result["username"]);
                $_SESSION["user_role"] = $result["user_role"];
                $_SESSION["last_regeneration"] = time();

                if ($_SESSION["user_role"] == "super_admin") {
                    header("Location: ../super_admin/dashboard.php");
                }else if($_SESSION["user_role"] == "employee"){
                    header("Location: ../employee/dashboard.php");
                }

                $pdo = null;
                die();

            } catch (PDOException $e) {
                die("Query Failed: " . $e->getMessage());
            }
        }

    }