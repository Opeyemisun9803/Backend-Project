<?php

declare(strict_types=1);

function get_fullname(object $pdo, string $fullname)
 {
   $query = "SELECT fullname FROM users WHERE fullname = :fullname;";
   $stmt = $pdo->prepare($query);
   $stmt->bindParam(":fullname", $fullname);
   $stmt->execute();

   $result = $stmt->fetch(PDO::FETCH_ASSOC);
   return  $result;
}



function get_phonenumber(object $pdo, string $phonenumber)
 {
   $query = "SELECT phonenumber FROM users WHERE phonenumber = :phonenumber;";
   $stmt = $pdo->prepare($query);
   $stmt->bindParam(":phonenumber", $phonenumber);
   $stmt->execute();

   $result = $stmt->fetch(PDO::FETCH_ASSOC);
   return  $result;
}

function get_username(object $pdo, string $username)
 {
   $query = "SELECT username FROM users WHERE username = :username;";
   $stmt = $pdo->prepare($query);
   $stmt->bindParam(":username", $username);
   $stmt->execute();

   $result = $stmt->fetch(PDO::FETCH_ASSOC);
   return  $result;
}


function set_user(object $pdo, string $fullname, string $email, string $phonenumber, string $username, string $pwd, string $gender, string $state)
 {
  $query = "INSERT INTO users (fullname, email, phonenumber, username, pwd, gender, state) VALUES (:fullname, :email, :phonenumber, :username, :pwd, :gender, :state);";
  $stmt = $pdo->prepare($query);

$options = [
  'cost' => 12
];
$hashedpwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

$stmt->bindParam(":fullname", $fullname);
$stmt->bindParam(":email", $email);
$stmt->bindParam(":phonenumber", $phonenumber);
$stmt->bindParam(":username", $username);
$stmt->bindParam(":pwd", $hashedpwd);
  // $stmt->bindParam(":confirmedpwd", $confirmedpwd);
$stmt->bindParam(":gender", $gender);
$stmt->bindParam(":state", $state);
$stmt->execute();

  return "fullname:$fullname, email:$email, phonenumber:$phonenumber, username:$username, pwd:$pwd,  gender:$gender, state:$state";
} 