<?php

declare(strict_types=1);

// function update_user(object $pdo, string $username)
function update_user(object $pdo, string $fullname, string $email, string $phonenumber, string $username, string $pwd, string $address){
  $query = "UPDATE * FROM users WHERE fullname = :fullname, email = :email,  phonenumber = :phonenumber, username = :username, pwd = :pwd, address = :address;"; 
   // $query = "SELECT * FROM users WHERE (username, email, phonenumber) VALUE (:username, :email, :phonenumber);";
   $stmt = $pdo->prepare($query);
   $options = [
    'cost' => 12
  ];
   $stmt->bindParam(":fullname", $fullname);   
   $stmt->bindParam(":email", $email);
   $stmt->bindParam(":phonenumber", $phonenumber);
   $stmt->bindParam(":username", $username);  
   $stmt->bindParam(":pwd", $hashedpwd);
   $stmt->bindParam(":address", $address);
   
   $stmt->execute();

   $result = $stmt->fetch(PDO::FETCH_ASSOC);
   return  $result;
}

function check_edit_errors()
{
    if (isset($_SESSION['errors_edit'])){
        $errors = $_SESSION['errors_edit'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }

        unset($_SESSION['errors_edit']);
    }
    else if (isset($_GET['edit']) && $_GET['edit'] === "success") {
        echo "<br>";
        echo '<h3>edit succecfull</h3>';
    }
}

function is_edit_empty(string $fullname, string $email, string $phonenumber, string $username, string $pwd,  string $address) 
{
   if (empty($fullname) || empty($email) || empty($phonenumber) || empty($username) || empty($pwd) ||empty($address)) {
       return true;
   } else {
       return false;
   }
} 
