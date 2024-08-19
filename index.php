<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/login_view.inc.php';
require_once 'includes/signup_view.inc.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back-End Signup</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>

     <!-- <h3>
       <?php
      //  output_username();
       ?>
    </h3> -->

    <?php
    if (!isset($_SESSION["user_id"])) { ?> 

<div>
<h3>Register Here!</h3><br>

<form action="includes/signup.inc.php" method="post">
    <label for="full name">FULL NAME</label><br>
    <input type="text" name="fullname" placeholder="Fullname" required><br><br>

    <label for="email">EMAIL</label><br>
    <input type="text" name="email" placeholder="E.g Opeyemi@gmail.com" required><br><br>

    <label for="state">SELECT STATE</label>
    <select class="input"name="state" id="state" required>
      <option value="SELECT">--STATES--</option>
      <option value="ABIA">ABIA</option>
      <option value="ENUGUN">ENUGUN</option>
      <option value="IMO">IMO</option>
      <option value="OYO">OYO</option>
      <option value="OSUN">OSUN</option>
      <option value="LAGOS">LAGOS</option>
      <option value="ONDO">ONDO</option>
      <option value="EDO">EDO</option>
      <option value="OGUN">OGUN</option>
      <option value="ADAMAWA">ADAMAWA</option>
    </select><br><br> 

    <label for="Gender">GENDER</label><br> 
    <label for="male">MALE</label>
    <input class="input2" type="radio" id="male" name="gender" value="male" required>
    <label for="male">FEMALE</label>
    <input class="input2" type="radio" id="female" name="gender" value="female" required><br><br>

    <input type="number" name="phonenumber" placeholder="Phone Number" required><br><br>

    <input type="text" name="username" placeholder="Username" required><br><br>

    <input type="password" name="pwd" placeholder="Password" required><br><br> 

    <input type="password" name="confirmedpwd" placeholder="Confirmed password" required><br><br>  
     
    <button a herf="../login.php">Submit Button</button>

    </div>

     <!-- <?php
     signup_input();
     ?>  -->

      
     

    <?php } ?>    

   
    
    </form>

    <?php
    check_signup_errors();      
   ?>

<h3>Logout</h3>

<form action="includes/logout.inc.php" method="post">
        <button>Logout</button>
</form>

</body>
</html>