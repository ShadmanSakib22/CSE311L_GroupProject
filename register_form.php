<?php

@include 'config.php';

if (isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $domain = explode('@', $email)[1];
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   //$user_type = $_POST['user_type'];


   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {

      $message = "Info entered already in use.\\nTry again.";
      echo "<script type='text/javascript'>alert('$message');</script>";
   } else {

      if ($domain != 'gmail.com') {
         $message = "Entered email domain is not allowed.\\nTry again.";
         echo "<script type='text/javascript'>alert('$message');</script>";
      } else if ($pass != $cpass) {
         $message = "pass mismatch.\\nTry again.";
         echo "<script type='text/javascript'>alert('$message');</script>";
      } else if ($name == $cpass) {
         $message = "pass cannot be same as name.\\nTry again.";
         echo "<script type='text/javascript'>alert('$message');</script>";
      } else {
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','user')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }
};


?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>

<body>

   <div class="form-container">

      <form action="" method="post">
         <h3>register now</h3>

         <input type="text" name="name" required placeholder="enter your name">
         <input type="email" name="email" required placeholder="enter your email">
         <input type="password" name="password" required placeholder="enter your password">
         <input type="password" name="cpassword" required placeholder="confirm your password">
         <!--<select name="user_type">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>-->
         <input type="submit" name="submit" value="register now" class="form-btn">
         <p>already have an account? <a href="login_form.php">login now</a></p>
      </form>

   </div>

</body>

</html>