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

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "User inserted successfully."]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to insert user."]);
    }
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


// ============================== PERSONAL INFORMATION ============================== //
function user_info_st(object $pdo, int $user_id,
string $name_extension,
string $sex,
string $date_of_birth,
string $place_of_birth,
string $telephone_no,
string $mobile_no) {
    $query = "INSERT INTO personal_information_st_ (pdspis_id, name_extension, sex, date_of_birth, place_of_birth, telephone_no, mobile_no) 
              VALUES (:pdspis_id, :name_extension, :sex, :date_of_birth, :place_of_birth, :telephone_no, :mobile_no)";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":pdspis_id", $user_id, PDO::PARAM_INT);
    $stmt->bindParam(":name_extension", $name_extension);
    $stmt->bindParam(":sex", $sex);
    $stmt->bindParam(":date_of_birth", $date_of_birth);
    $stmt->bindParam(":place_of_birth", $place_of_birth);
    $stmt->bindParam(":telephone_no", $telephone_no);
    $stmt->bindParam(":mobile_no", $mobile_no);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "User inserted successfully."]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to insert user."]);
    }
}

function user_info_nd(object $pdo, int $user_id,
string $civil_status,
int $height,
int $weight,
string $blood_type,
string $pagibig_id_no,
string $philhealth_no,
string $sss_no,
string $tin_no,
string $agency_no){
    $query = "INSERT INTO personal_information_nd (pdspis_id, civil_status, height, weight, blood_type, pagibig_id_no, philhealth_no, sss_no, tin_no, agency_no) 
    VALUES (:pdspis_id, :civil_status, :height, :weight, :blood_type, :pagibig_id_no, :philhealth_no, :sss_no, :tin_no, :agency_no)";    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":pdspis_id", $user_id, PDO::PARAM_INT);
    $stmt->bindParam(":civil_status", $civil_status);
    $stmt->bindParam(":height", $height, PDO::PARAM_INT);
    $stmt->bindParam(":weight", $weight, PDO::PARAM_INT);
    $stmt->bindParam(":blood_type", $blood_type);
    $stmt->bindParam(":pagibig_id_no", $pagibig_id_no);
    $stmt->bindParam(":philhealth_no", $philhealth_no);
    $stmt->bindParam(":sss_no", $sss_no);
    $stmt->bindParam(":tin_no", $tin_no);
    $stmt->bindParam(":agency_no", $agency_no);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "User inserted successfully."]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to insert user."]);
    }
}
function user_info_rd(object $pdo, int $user_id,
string $citizenship,
string $house_block,
string $street,
string $subdivision,
string $barangay,
string $city_muntinlupa,
string $province,
string $zip_code){
    $query = "INSERT INTO personal_information_rd (pdspis_id, citizenship, house_block, street, subdivision, barangay, city_muntinlupa, province, zip_code) 
        VALUES (:pdspis_id, :citizenship, :house_block, :street, :subdivision, :barangay, :city_muntinlupa, :province, :zip_code)";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":pdspis_id", $user_id, PDO::PARAM_INT);
    $stmt->bindParam(":citizenship", $citizenship);
    $stmt->bindParam(":house_block", $house_block);
    $stmt->bindParam(":street", $street);
    $stmt->bindParam(":subdivision", $subdivision);
    $stmt->bindParam(":barangay", $barangay);
    $stmt->bindParam(":city_muntinlupa", $city_muntinlupa);
    $stmt->bindParam(":province", $province);
    $stmt->bindParam(":zip_code", $zip_code);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "User inserted successfully."]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to insert user."]);
    }
}
function user_info_th(object $pdo, int $user_id,
string $perma_house_block,
string $perma_street,
string $perma_subdivision,
string $perma_barangay,
string $perma_city_muntinlupa,
string $perma_province,
string $perma_zip_code){
    $query = "INSERT INTO personal_information_th (pdspis_id, perma_house_block, perma_street, perma_subdivision, perma_barangay, perma_city_muntinlupa, perma_province, perma_zip_code) 
    VALUES (:pdspis_id, :perma_house_block, :perma_street, :perma_subdivision, :perma_barangay, :perma_city_muntinlupa, :perma_province, :perma_zip_code)";    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":pdspis_id", $user_id, PDO::PARAM_INT);
    $stmt->bindParam(":perma_house_block", $perma_house_block);
    $stmt->bindParam(":perma_street", $perma_street);
    $stmt->bindParam(":perma_subdivision", $perma_subdivision);
    $stmt->bindParam(":perma_barangay", $perma_barangay);
    $stmt->bindParam(":perma_city_muntinlupa", $perma_city_muntinlupa);
    $stmt->bindParam(":perma_province", $perma_province);
    $stmt->bindParam(":perma_zip_code", $perma_zip_code);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "User inserted successfully."]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to insert user."]);
    }
}

function insert_pid(object $pdo, string $name_extension,
string $sex,
string $date_of_birth,
string $place_of_birth,
string $telephone_no,
string $mobile_no,
string $civil_status,
$height, 
$weight,  
string $blood_type,
string $pagibig_id_no,
string $philhealth_no,
string $sss_no,
string $tin_no,
string $agency_no,
string $citizenship,
string $house_block,
string $street,
string $subdivision,
string $barangay,
string $city_muntinlupa,
string $province,
string $zip_code,
string $perma_house_block,
string $perma_street,
string $perma_subdivision,
string $perma_barangay,
string $perma_city_muntinlupa,
string $perma_province,
string $perma_zip_code){

    $height = is_numeric($height) ? (int)$height : 0;  // Convert string to int safely
    $weight = is_numeric($weight) ? (int)$weight : 0;  // Convert string to int safely

    isset($_SESSION["user_id"]) ? $users_id = $_SESSION["user_id"] : "no user_id";

    $query = "SELECT pdspi_id FROM pds_pi WHERE users_id = :users_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":users_id", $users_id, PDO::PARAM_STR);
    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $user_id = $result["pdspi_id"] ?? null;
    
    if (!$user_id) {
        echo json_encode(["success" => false, "message" => "User ID not found"]);
        return;
    }
    
    user_info_st($pdo, $user_id, $name_extension, $sex, $date_of_birth, $place_of_birth, $telephone_no, $mobile_no);
    user_info_nd($pdo, $user_id, $civil_status, $height, $weight, $blood_type, $pagibig_id_no, $philhealth_no, $sss_no, $tin_no, $agency_no);
    user_info_rd($pdo, $user_id, $citizenship, $house_block, $street, $subdivision, $barangay, $city_muntinlupa, $province, $zip_code);
    user_info_th($pdo, $user_id, $perma_house_block, $perma_street, $perma_subdivision, $perma_barangay,
    $perma_city_muntinlupa, $perma_province, $perma_zip_code);
}


