<?php

@include 'config.php';

session_start();

if (isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, (isset($_POST['name'])));
   $email = mysqli_real_escape_string($conn, ($_POST['email']));
   $pass = md5(trim($_POST['password']));

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) == 1) {

      $row = mysqli_fetch_array($result);
      /*keeping both admin and user heading statements in case of, 
      different landing page is to be implemented in the future.*/
      if ($row['user_type'] == 'admin') {

         $_SESSION['log_name'] = $row['name'];
         header('location:user_page.php');
      } else {
         $_SESSION['log_name'] = $row['name'];
         header('location:user_page.php');
      }
   } else {
      $message = "Incorrect Information Entered.\\nTry again.";
      echo "<script type='text/javascript'>alert('$message');</script>";
   }
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>

<body>

   <div class="form-container">

      <form action="" method="post">
         <h3>login now</h3>

         <input type="email" name="email" required placeholder="enter your email">
         <input type="password" name="password" required placeholder="enter your password">
         <input type="submit" name="submit" value="login" class="form-btn">
         <p>don't have an account? <a href="register_form.php">register now</a></p>

      </form>
   </div>


</body>

</html>