<?php

declare(strict_types=1);

function update_user(object $pdo, string $username)
{
  $query = "UPDATE * FROM users WHERE fullname = :fullname OR email = :email OR  phonenumber = :phonenumber OR address = :address;"; 
   // $query = "SELECT * FROM users WHERE (username, email, phonenumber) VALUE (:username, :email, :phonenumber);";
   $stmt = $pdo->prepare($query);
   $stmt->bindParam(":fullname", $fullname);
   $stmt->bindParam(":username", $username);
   $stmt->bindParam(":email", $username);   
   $stmt->bindParam(":phonenumber", $username);
   $stmt->bindParam(":address", $address);
   
   $stmt->execute();

   $result = $stmt->fetch(PDO::FETCH_ASSOC);
   return  $result;
}