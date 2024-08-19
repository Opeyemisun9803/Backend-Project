<?php
require_once 'includes/config_session.inc.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Edit page</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    
<div>

<button><a href="login.php"><- Login Page</a></button><br>

<h3>Edit Profile Here!</h3><br>

<form action="includes/edit.inc.php" method="post">
    <input type="text" name="fullname" VALUE=<?php echo ($_SESSION["fullname"])?>> <br><br>

    <input type="text" name="email" VALUE=<?php echo ($_SESSION["email"])?>><br><br>

    <input type="number" name="phonenumber" VALUE=<?php echo ($_SESSION["phonenumber"])?>><br><br>

    <input type="text" name="username" VALUE=<?php echo ($_SESSION["username"])?> readonly><br><br>

    <!-- <input type="password" name="currentpwd" placeholder="Current Password"><br><br> -->

    <input type="password" name="pwd" placeholder="Password"><br><br> 

    <input type="password" name="confirmedpwd" placeholder="Confirm New password"><br><br>  
     
    <input type="text" name="address" placeholder="Add Address"><br><br> 

        
    <button>Submit Update</button>

    </div>



</body>
</html>