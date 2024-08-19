<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back-End Login</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<div class="div2">
<h3>
    <?php
    // output_username();
    ?>
</h3>

<?php
if (isset($_SESSION["user_id"]))?>

<button><a href="index.php"><- Signup Page</a></button><br>
<h3>Login</h3>
<form action="includes/login.inc.php" method="post">
         <input type="text" name="username" placeholder="Username/ Email/ Phonenumber"><br><br>
         <input type="password" name="pwd" placeholder="Password"><br><br>
         <button>Login Here</button>
      </form>

      </div>
<?php
      check_login_errors();
    ?>

</body>
</html>