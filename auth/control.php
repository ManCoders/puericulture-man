<?php

declare(strict_types=1);

function fileSize_notCompatible(array $profile){
    if($profile["size"] > 5 * 1024 * 1024){
        return true;
    }else{
        return false;
    }
}

function image_notCompatible(array $profile, array $allowed_types){
    if(!in_array($profile["type"], $allowed_types)){
        return true;
    }else{
        return false;
    }
}

function file_notUploaded(array $profile, string $target_file){
    if (!move_uploaded_file($profile["tmp_name"], $target_file)) {
        return true;
    }else{
        return false;
    }
}
function empty_image(array $profile){
    if(empty($profile)){
        return true;
    }else{
        return false;
    }
}

function empty_inputs($first_name, $Last_name, $Middle_name, $email, $profile, $username, $password, $confirm_password) {
    if (empty($first_name) || empty($Last_name) || empty($Middle_name) || empty($email) || empty($profile)
    || empty($username) || empty($password) || empty($confirm_password)) {
        return true;
    }else{
        return false;
    }
}

function invalid_email(string $email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}

function email_registered(object $pdo, string $email){
   if(get_email($pdo, $email)) {
        return true;
   }else{
        return false;
   }
}

function wrong_username(bool|array $result){
    if(!$result){
        return true;
    }else{
        return false;
    }
}
function password_secured(string $password) {
    if (strlen($password) < 8) {
        return true;
    }else{
        return false;
    }
}

function password_security(string $password){
    if (preg_match('/[A-Z]/', $password) &&    
        preg_match('/[0-9]/', $password) &&    
        preg_match('/[\W_]/', $password)) {      

        return false;
    } else {
        return true;
    }
}

function wrong_password(string $password, ?string $hashedPassword): bool {
    if ($hashedPassword === null) {
        return true;
    }
    return !password_verify($password, $hashedPassword); 
}

function login_empty_inputs($username, $password) {
    if (empty($username) || empty($password)) {
        return true;
    }
    return false;
}

function password_notMatch(string $confirm_password, string $hased_password){
    if($confirm_password !== $hased_password){
        return true;
    }else{
        return false;
    }
}

function username_taken(object $pdo, string $username){
    if(get_username($pdo, $username)) {
        return true;
   }else{
        return false;
   }
}

function uers_data(object $pdo, int $user_id, String $first_name, String $Last_name, String $Middle_name, String $email,
    string $profile) {

    $query = "INSERT INTO personal_information_st (pdspis_id, first_name, Last_name, Middle_name, email, user_profile)
        VALUES (:pdspis_id, :first_name, :Last_name, :Middle_name, :email, :user_profile);";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":pdspis_id", $user_id, PDO::PARAM_INT);
    $stmt->bindParam(":first_name", $first_name);
    $stmt->bindParam(":Last_name", $Last_name);
    $stmt->bindParam(":Middle_name", $Middle_name);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":user_profile", $profile);
    $stmt->execute();

    echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));

}

function users_authentication(object $pdo, string $username, string $password){
    $user_role = "employee";
    $hased_password = password_hash($password, PASSWORD_BCRYPT);
    $query = "INSERT INTO users (username, password, user_role) VALUES
    (:username, :password, :user_role);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $hased_password);
    $stmt->bindParam(":user_role", $user_role);
    $stmt->execute();

    return(int) $pdo->lastInsertId();
}

function users_pdspi(object $pdo, int $id){
    $query = "INSERT INTO pds_pi (users_id) VALUES (:users_id);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":users_id", $id, PDO::PARAM_INT);
    $stmt->execute();

    return(int) $pdo->lastInsertId();
}

function getUserIpnputobject(object $pdo, String $first_name, String $Last_name, String $Middle_name, String $email,
        string $profile, string $username, string $password) {
        
    $id = users_authentication($pdo, $username, $password); 
    $user_id = users_pdspi($pdo, $id); 
    uers_data($pdo, $user_id, $first_name, $Last_name, $Middle_name, $email, $profile);
}
