<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $phonenumber = $_POST["phonenumber"];
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $address = $_POST["address"];
    // $confirmedpwd= $_POST["confirmedpwd"];


   
    try {

        require_once 'dbh.inc.php';
        require_once 'edit_model.inc.php';
        require_once 'signup_contr.inc.php';
    
        // ERROR HANDLERS
        $errors = [];
   // echo "fullname:$fullname, email:$email, phonenumber:$phonenumber, username:$username, pwd:$pwd, confirmedpwd:$confirmedpwd, gender:$gender, state:$state";
   
        if (is_edit_empty ($fullname, $email, $phonenumber, $username, $pwd,  $address)) {
   
          $errors["empty_input"] = "Fill in all field!";
        }
        
       
        if (is_email_invalid($email))  {
           $errors["invalid_email"] = "invalid email used!";
        }
     
       if (is_email_registered($pdo,  $email) )  {
           $errors["email_used"] = "email already registered!";
       }
       
       
      //  echo "im here";
       
      //   require_once 'config_session.inc.php';
      //  die();
     
      //  if ($errors){
      //     $_SESSION["errors_edit"] = $errors;                           
      //     header("Location: ../edit.php");
      //     die();
      //  }
       
       update_user($pdo, $fullname, $email, $phonenumber, $username,  $address);
      //   echo "I got here";exit;
       
       $_SESSION["fullname"] = htmlspecialchars(["$fullname"]);
       $_SESSION["email"] = htmlspecialchars(["$email"] );
       $_SESSION["phonenumber"] = htmlspecialchars(["$phonenumber"]);
       $_SESSION["gender"] = htmlspecialchars($result["gender"]);
       $_SESSION["state"] = htmlspecialchars($result["state"]);
       $_SESSION["address"] = htmlspecialchars($address);
       $_SESSION["last_regeneration"] = time();
       header("Location: ../edited.php");
   
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
   