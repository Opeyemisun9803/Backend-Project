<?php

declare(strict_types=1);

function get_user(object $pdo, string $username)
{
  $query = "SELECT * FROM users WHERE username = :username OR email = :email OR phonenumber = :phonenumber;"; 
   // $query = "SELECT * FROM users WHERE (username, email, phonenumber) VALUE (:username, :email, :phonenumber);";
   $stmt = $pdo->prepare($query);
   $stmt->bindParam(":username", $username);
   $stmt->bindParam(":email", $username);   
   $stmt->bindParam(":phonenumber", $username);
   
   $stmt->execute();

   $result = $stmt->fetch(PDO::FETCH_ASSOC);
   return  $result;
}