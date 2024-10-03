<?php

declare(strict_types=1);

 function is_input_empty(string $fullname, string $email, string $phonenumber, string $username, string $pwd,  string $confirmedpwd, string $gender, string $state) 
 {
    if (empty($fullname) || empty($email) || empty($phonenumber) || empty($username) || empty($pwd) ||empty($confirmedpwd) || empty($gender) || empty($state)) {
        return true;
    } else {
        return false;
    }
} 

function is_email_invalid(string $email) 
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
} 

// function is_phonenumber_used(object $pdo, string $phonenumber) 
// {
//     if (!filter_var($phonenumber, FILTER_VALIDATE_PHONENUMBER)) {
//         return true;
//     } else {
//         return false;
//     }
// } 

function is_username_taken(object $pdo, string $username) 
{
    if (get_username($pdo, $username)) {
        return true;
    } else {
        return false;
    }
} 
function is_email_registered(object $pdo, string $email) 
{
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
} 

function get_email(object $pdo, string $email)
 {
   $query = "SELECT email FROM users WHERE email = :email;";
   $stmt = $pdo->prepare($query);
   $stmt->bindParam(":email", $email);
   $stmt->execute();

   $result = $stmt->fetch(PDO::FETCH_ASSOC);
   return  $result;
}

function create_user(object $pdo, string $fullname, string $email, string $phonenumber, string $username, string $pwd, string $gender, string $state)  
{
    set_user( $pdo,  $fullname,  $email,  $phonenumber, $username,  $pwd,  $gender, $state); 
} 