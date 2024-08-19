<?php

declare(strict_types=1);

function output_username()
{
    if (isset($_SESSION["userId"])) {
        echo "<b> Profile Info: " .'<br><br>'. $_SESSION["fullname"] .'<br><br>'. $_SESSION["email"] .'<br><br>'. $_SESSION["phonenumber"] .'<br><br>'. $_SESSION["username"] .'<br><br>'. $_SESSION["gender"] .'<br><br>'. $_SESSION["state"];
    } else {
        echo "You are logged in";
    }
}

function check_login_errors()
{
    if (isset($_SESSION["errors_login"])){
        $errors = $_SESSION["errors_login"];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class"form-error">' . $error . '</p>';
        }

        unset($_SESSION['errors_login']);
    }
    else if (isset($_GET['login']) && $_GET['login'] === "success") {

    }
}