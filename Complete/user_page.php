<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['log_name'])) {
   header('location:login_form.php');
}

global $user;
$username = $_SESSION['log_name'];
$sql = "SELECT user_type FROM user_form Where name = '$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$user = $row['user_type'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style3.css">
   <style>
      /* Style the search box */
      #mySearch {
         width: 500px;
         font-size: 18px;
         padding: 11px;
         border: 1px solid #ddd;
         opacity: 0.9;
      }

      /* Style the navigation menu inside the left column */
      #myMenu {
         list-style-type: none;
         padding: 0;
         overflow: hidden;
         overflow-y: scroll;
         height: 350px;
         width: 500px;
         white-space: nowrap;
         margin: auto;
         background-color: #fff;
         opacity: 0.9;
      }

      #myMenu li a {
         padding: 12px;
         text-decoration: none;
         text-align: left;
         color: #333;
         display: block;
      }

      #myMenu li a:hover {
         background-color: yellowgreen;
      }
   </style>

</head>

<body>

   <div class="sidenav" class="logo">
      <a href="first.html"><img src="image/logo.png" width="55%" height="auto"></a>
      <b href="#"><?php echo $user ?></b>
      <a href="logout.php">Log out</a>
      <?php if ($user == 'admin') {
      ?> <a href="admin_page.php">Admin-Panel</a>;
      <?php
      }
      ?>
   </div>

   <div class="header">
      <h1>welcome: <span><?php echo $_SESSION['log_name'] ?></span></h1>
   </div>

   <div class="main">
      <h2>Another World</h2>
      <h5>Please Do NOT Repost </h5>
      <h3>List of Chapters:</h3>
      <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search.." title="Type in a category">
      <ul id="myMenu">
         <li><a href="ch1.php">Ch 1 - The Beginning </a></li>
         <li><a href="#">Ch 2 - Lost in the Wild</a></li>
         <li><a href="#">Ch 3 - The Encounter</a></li>
         <li><a href="#">Ch 4 - Incident at the Inn</a></li>
         <li><a href="#">Ch 5 - City Guards arrive</a></li>
         <li><a href="#">Ch 6 - Sentenced to Execution</a></li>
         <li><a href="#">Ch 7 - The Baron's Ploy</a></li>
         <li><a href="#">Ch 8 - Jailbreak I</a></li>
         <li><a href="#">Ch 9 - Jailbreak II</a></li>
         <li><a href="#">Ch 10 - Escape to Sumeru</a></li>
         <li><a href="Ch10.5.php">Ch 10.5 - Season End: Word from Author</a></li>
      </ul>
      <script>
         function myFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("mySearch");
            filter = input.value.toUpperCase();
            ul = document.getElementById("myMenu");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
               a = li[i].getElementsByTagName("a")[0];
               if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                  li[i].style.display = "";
               } else {
                  li[i].style.display = "none";
               }
            }
         }
      </script>
      <!-- script source code: https://www.w3schools.com/howto/howto_js_search_menu.asp -->
      <br><br>
   </div>


   <div class="footer">
      <h3>Contact us: another.world.site@gmail.com</h3>
   </div>

   </div>

</body>

</html>