<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $phonenumber = $_POST["phonenumber"];
    $username = $_POST["username"];
    $gender = $_POST["gender"];
    $state = $_POST["state"];
    $pwd = $_POST["pwd"];
    $confirmedpwd= $_POST["confirmedpwd"];

    

    try {

     require_once 'dbh.inc.php';
     require_once 'signup_model.inc.php';
     require_once 'signup_contr.inc.php';
 
     // ERROR HANDLERS
     $errors = [];
// echo "fullname:$fullname, email:$email, phonenumber:$phonenumber, username:$username, pwd:$pwd, confirmedpwd:$confirmedpwd, gender:$gender, state:$state";

     if (is_input_empty($fullname, $email, $phonenumber, $username, $pwd, $confirmedpwd, $gender, $state)) {

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
       $_SESSION["errors_signup"] = $errors;

       $signupData = [
        "fullname" => $fullname,
        "email" => $email,
        "phonenumber" => $phonenumber,
        "username" => $username,
        "gender" => $gender,
        "state" => $state
       ];

       $_SESSION["signup_Data"] = $signupData;

       header("Location: ../index.php");
       die("Error encountered...");
    }

    create_user($pdo, $fullname, $email, $phonenumber, $username, $pwd, $gender, $state);
   //   echo "I got here";exit;

    header("Location: ../login.php");

    $pdo = null;
    $stmt = null;

    die('execution completed');
  }
   catch (PDOException $e) {
        die("Query failed: " . $e->getmessage());
 }
      } else {
    header("Location: ../index.php");
    die();
  }
