<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/login_model.inc.php';
require_once 'includes/login_view.inc.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div>
    <h3>Login Successful!</h3><br>

    <!-- <form action="includes/dashboard.inc.php" method="post">
   
    <input type="text" name="fullname" placeholder="Fullname"><br><br>

      <input type="text" name="email" placeholder="E.g Opeyemi@gmail.com"><br><br>
    
    <input type="number" name="phonenumber" placeholder="Phone Number"><br><br>
   
    <input type="text" name="username" placeholder="Username" required><br><br>

    <input type="text" name="gender" placeholder="Gender" required><br><br>

    <input type="text" name="state" placeholder="state" required><br><br>

    </form> -->

    <?php
    output_username();
    ?>

    
   
 <br><br><br>
<button><a href="edit.php">Edit Profile</a></button>

</div>
</body>
</html>