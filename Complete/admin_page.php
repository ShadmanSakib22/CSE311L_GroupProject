<?php

@include 'config.php';

session_start();

//checks if logged in
if (!isset($_SESSION['log_name'])) {
   header('location:login_form.php');
}

//ensures only admin user_type has access
$name = $_SESSION['log_name'];
$sql = "SELECT user_type FROM user_form Where name = '$name'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$user = $row['user_type'];
if ($user <> 'admin') {
   header('location:login_form.php');
}

//removes an entity from user table
if (isset($_POST['kick'])) {

   $kick = $_POST['kickName'];
   $sql = "DELETE FROM user_form WHERE name = '$kick'";
   if (mysqli_query($conn, $sql)) {
      //echo "<script>alert('the user entered, is kicked from server')</script>";
      header('location:admin_page.php');
   }
}
//edits user_type attribute in user table
if (isset($_POST['promote'])) {

   $proName = $_POST['proName'];
   $sql = "UPDATE user_form Set user_type = 'admin' WHERE name = '$proName'";
   if (mysqli_query($conn, $sql)) {
      //echo "<script>alert('the user entered, is promoted to admin')</script>";
      header('location:admin_page.php');
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin-Panel</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style5.css">

</head>

<body>

   <div class="sidenav" class="logo">
      <a href="first.html"><img src="image/logo.png" width="55%" height="auto"></a>
      <b href="#"><?php echo $user ?></b>
      <a href="user_page.php">Chapters</a>
      <a href="logout.php">Log out</a>

   </div>
   <div class="header">
      <h1>List of Users:</h1>
   </div>
   <div class="scrollBox">
      <input type="text" id="myInput" size='60' style="font-size: 20px;" onkeyup="myFunction()" placeholder="Search User by Name..">

      <table id="myTable" style="width:100%">
         <tr>
            <th style="width:35%">Name</th>
            <th style="width:50%">Email</th>
            <th>User_Type</th>
         </tr>
         <?php
         $sql = "SELECT name, email, user_type FROM user_form";
         $result = mysqli_query($conn, $sql);
         while ($row = mysqli_fetch_assoc($result)) {
         ?>
            <tr>
               <td><?php echo $row["name"] ?></td>
               <td><?php echo $row["email"] ?></td>
               <td><?php echo $row["user_type"] ?></td>
            </tr>
         <?php
         }
         ?>
      </table>
      <script>
         function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
               td = tr[i].getElementsByTagName("td")[0];
               if (td) {
                  txtValue = td.textContent || td.innerText;
                  if (txtValue.toUpperCase().indexOf(filter) > -1) {
                     tr[i].style.display = "";
                  } else {
                     tr[i].style.display = "none";
                  }
               }
            }
         } //script source code: https://www.w3schools.com/howto/howto_js_filter_table.asp
      </script>

   </div>
   <div class="header">
      <h1>Remove User:</h1>
   </div>
   <div class="main">
      <p><b>To Kick User, type out the user name in the box and submit.</b></p>
      <p><i style="font-size: 15px;">This action is irreversible. The user will have to Sign up Again!</i></p>
      <form action="" method="POST">
         <input type="text" name='kickName' required placeholder="enter user name to kick" size="50" style="font-size:20px;">
         <button size='50' style="font-size:20px;" type="submit" name="kick">Kick</button>
      </form>
      <br>
   </div>
   <div class="header">
      <h1>Promote User:</h1>
   </div>
   <div class="main">
      <p><b>To Promote User, type out the user name in the box and submit.</b></p>
      <p><i style="font-size: 15px;">admin cannot be promoted!</i></p>
      <form action="" method="POST">
         <input type="text" name='proName' required placeholder="enter user name to promote" size="50" style="font-size:20px;">
         <button size='50' style="font-size:20px;" type="submit" name="promote">Promote</button>
      </form>
      <br>
   </div>

</body>

</html>