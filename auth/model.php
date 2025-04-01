<?php

declare(strict_types=1);

function get_email(object $pdo, string $email){
    $query = "SELECT email FROM personal_information_st WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $email_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $email_result;
}

function get_username($pdo, $username) {
    $stmt = $pdo->prepare("SELECT id, username, password, user_role FROM users WHERE username = ?");
    $stmt->execute([$username]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function get_password(object $pdo, int $id){
    $query = "SELECT password FROM users WHERE id = :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function get_pid(object $pdo, string $user_id){
    $query = "SELECT pdspi_id FROM pds_pi WHERE user_id = :user_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
    $stmt->execute();
    return $user_id = $stmt->fetch(PDO::FETCH_ASSOC);
}