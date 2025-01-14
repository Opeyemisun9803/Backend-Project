<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        // ERROR HANDLERS
     $errors = [];

      if (is_input_empty($username, $pwd)) {
        $errors["empty_input"] = "Fill in all fields!";
     }    

     $result = get_user($pdo, $username);
     
     if (is_username_wrong($result)) {
        $errors["login_incorrect"] = "incorrect login info";
     }
     if (is_email_wrong($result)) {
      $errors["login_incorrect"] = "incorrect login info";
   }
   if (is_phonenumber_wrong($result)) {
      $errors["login_incorrect"] = "incorrect login info";
   }
     if (!is_username_wrong($result) && is_password_wrong($pwd, $result["pwd"])) {
        $errors["login_incorrect"] = "incorrect login info";
     }

    require_once 'config_session.inc.php';

    if ($errors) {
       $_SESSION["errors_login"] = $errors;

       header("Location: ../login.php");
       die();
    }

    $newsessionId = session_create_id();
    $sessionId = $newsessionId . "_" . $result["id"];
    session_id($sessionId);

       $_SESSION["userId"] = $result["id"];
       $_SESSION["fullname"] = htmlspecialchars($result["fullname"]);
       $_SESSION["email"] = htmlspecialchars($result["email"] );
       $_SESSION["phonenumber"] = htmlspecialchars($result["phonenumber"]);
       $_SESSION["username"] = htmlspecialchars($result["username"]);
       $_SESSION["gender"] = htmlspecialchars($result["gender"]);
       $_SESSION["state"] = htmlspecialchars($result["state"]);
       $_SESSION["pwd"] = htmlspecialchars($result["pwd"]);

       $_SESSION["last_regeneration"] = time();

       header("Location: ../dashboard.php?login=success");
       $pdo = null;
       $stmt = null;

       die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../login.php");
    die();
}