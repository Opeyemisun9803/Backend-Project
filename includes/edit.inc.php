<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $phonenumber = $_POST["phonenumber"];
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $confirmedpwd= $_POST["confirmedpwd"];
    $address= $_POST["address"];


   

    try {

        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';
    
        // ERROR HANDLERS
        $errors = [];
   // echo "fullname:$fullname, email:$email, phonenumber:$phonenumber, username:$username, pwd:$pwd, confirmedpwd:$confirmedpwd, gender:$gender, state:$state";
   
        if (is_input_empty($fullname, $email, $phonenumber, $username, $pwd, $confirmedpwd, $address)) {
   
           $errors["empty_input"] = "Fill in all field!";
        }
   
      //   if($pwd !== "confirmedpwd"){
      //    $errors['Password not match'];
        
        if (is_email_invalid($email))  {
           $errors["invalid_email"] = "invalid email used!";
        }
        if (is_username_taken( $pdo, $username))  {
           $errors["username_taken"] = "username already taken!";
       }
      //  if (is_phonenumber_used( $pdo, $phonenumber))  {
      //      $errors["phonenumber_used"] = "phonenumber had been used!";
      //  }
       if (is_email_registered($pdo,  $email) )  {
           $errors["email_used"] = "email already registered!";
       }
   
   
       require_once 'config_session.inc.php';
   echo "";
       if ($errors) {
          $_SESSION["errors_signupData"] = $errors;
   
          $UpdateData = [
           "fullname" => $fullname,
           "email" => $email,
           "phonenumber" => $phonenumber,
           "username" => $username,
           "address" => $address
          ];
   
          $_SESSION["signup_Data"] = $UpdateData;
   
          header("Location: ../edit.php");
          die("Error encountered...");
       }
   
       update_user($pdo, $fullname, $email, $phonenumber, $username,  $pwd, $confirmedpwd, $address);
      //   echo "I got here";exit;
   
       header("Location: ../edit.php");
   
       $pdo = null;
       $stmt = null;
   
       die('execution completed');
     }
      catch (PDOException $e) {
           die("Query failed: " . $e->getmessage());
    }
         } else {
       header("Location: ../edit.php");
       die();
     }
   