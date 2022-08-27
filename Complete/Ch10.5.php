<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['log_name'])) {
    header('location:login_form.php');
}

if (isset($_POST['submit'])) {

    $username = $_SESSION['log_name'];
    $msg = $_POST['msg'];
    date_default_timezone_set('Asia/Dhaka');
    $date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO comments10_5(name, msg, dtime) VALUES ('$username', '$msg', '$date')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Comment sent')</script>";
    }
}

if (isset($_POST['delete'])) {

    $cid = $_POST['Cid'];
    $sql = "DELETE FROM comments10_5 WHERE Cid = $cid";
    if (mysqli_query($conn, $sql)) {
        //echo "<script>alert('Comment deleted')</script>";
        header('location:Ch10.5.php');
    }
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
    <title>chapter 10.5</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style4.css">
    <style>
        textarea {
            width: 700px;
            height: 40px;
            background-color: #fff;
            opacity: 0.9;
            resize: none;
            font-size: 18px;
        }

        button {
            width: 150px;
            height: 40px;
            border: none;
            background: yellowgreen;
            opacity: 0.9;
            color: #333;
            font-size: 18px;
            cursor: pointer;
        }

        .form-btn {
            width: 60px;
            height: 18px;
            border: none;
            background: yellowgreen;
            opacity: 0.9;
            color: #333;
            font-size: 12px;
            cursor: pointer;
        }
    </style>

</head>

<body>

    <div class="sidenav" class="logo">
        <a href="first.html"><img src="image/logo.png" width="55%" height="auto"></a>
        <b href="#"><?php echo $user ?></b>
        <a href="user_page.php">Chapters</a>
        <a href="logout.php">Log out</a>

    </div>

    <div class="header">
        <h1>Ch 10.5 - Season End, Word From Author</h1>
    </div>

    <div class="storyScrollBox">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Nullam vestibulum orci a sapien imperdiet maximus.
            Suspendisse vel ex eget mauris efficitur finibus eu a enim.
            Aenean tellus neque, consectetur sit amet lacus a, hendrerit ornare urna.
            Fusce venenatis lorem vitae augue suscipit, eu tempor massa vulputate.
            Praesent iaculis velit libero, vel faucibus sem pulvinar vel.
            Curabitur viverra nisl dui, a venenatis felis pellentesque id.
            Donec non lacus diam.
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Nullam vestibulum orci a sapien imperdiet maximus.
            Suspendisse vel ex eget mauris efficitur finibus eu a enim.
            Aenean tellus neque, consectetur sit amet lacus a, hendrerit ornare urna.
            Fusce venenatis lorem vitae augue suscipit, eu tempor massa vulputate.
            Praesent iaculis velit libero, vel faucibus sem pulvinar vel.
            Curabitur viverra nisl dui, a venenatis felis pellentesque id.
            Donec non lacus diam.
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Nullam vestibulum orci a sapien imperdiet maximus.
            Suspendisse vel ex eget mauris efficitur finibus eu a enim.
            Aenean tellus neque, consectetur sit amet lacus a, hendrerit ornare urna.
            Fusce venenatis lorem vitae augue suscipit, eu tempor massa vulputate.
            Praesent iaculis velit libero, vel faucibus sem pulvinar vel.
            Curabitur viverra nisl dui, a venenatis felis pellentesque id.
            Donec non lacus diam.
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Nullam vestibulum orci a sapien imperdiet maximus.
            Suspendisse vel ex eget mauris efficitur finibus eu a enim.
            Aenean tellus neque, consectetur sit amet lacus a, hendrerit ornare urna.
            Fusce venenatis lorem vitae augue suscipit, eu tempor massa vulputate.
            Praesent iaculis velit libero, vel faucibus sem pulvinar vel.
            Curabitur viverra nisl dui, a venenatis felis pellentesque id.
            Donec non lacus diam.
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Nullam vestibulum orci a sapien imperdiet maximus.
            Suspendisse vel ex eget mauris efficitur finibus eu a enim.
            Aenean tellus neque, consectetur sit amet lacus a, hendrerit ornare urna.
            Fusce venenatis lorem vitae augue suscipit, eu tempor massa vulputate.
            Praesent iaculis velit libero, vel faucibus sem pulvinar vel.
            Curabitur viverra nisl dui, a venenatis felis pellentesque id.
            Donec non lacus diam.
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Nullam vestibulum orci a sapien imperdiet maximus.
            Suspendisse vel ex eget mauris efficitur finibus eu a enim.
            Aenean tellus neque, consectetur sit amet lacus a, hendrerit ornare urna.
            Fusce venenatis lorem vitae augue suscipit, eu tempor massa vulputate.
            Praesent iaculis velit libero, vel faucibus sem pulvinar vel.
            Curabitur viverra nisl dui, a venenatis felis pellentesque id.
            Donec non lacus diam.
        </p>
    </div>

    <div class="ses">
        <span><?php echo $_SESSION['log_name'] ?></span>:
    </div>
    <div class="main">
        <form action="" method="POST">
            <textarea name='msg' required placeholder="enter comment"></textarea>
            <br>
            <button type="submit" name="submit">post comment</button>
        </form>
    </div>
    <div class="ses">
        <?php
        $sql = "SELECT name, dtime, msg, Cid FROM comments10_5 ORDER BY Cid DESC LIMIT 0,3";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='commentBox'>";
            echo "<ses style='color:yellowgreen'>" . $row["name"] . '<br></ses>';
            echo "<d style='font-weight: bold'>" . $row['dtime'] . "<br></d>";
            echo nl2br($row["msg"]);
            echo "</div>";
            if ($user == 'admin') {
        ?>
                <form action="" method="POST">
                    <input type="hidden" name="Cid" value="<?php echo $row["Cid"] ?>">
                    <input type="submit" name="delete" value="Delete" class="form-btn">
                </form>
        <?php
            }
        }
        if (isset($_POST['showMore'])) {
            $sql = "SELECT name, dtime, msg, Cid FROM comments10_5 ORDER BY Cid DESC LIMIT 3,50";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='commentBox'>";
                echo "<ses style='color:yellowgreen'>" . $row["name"] . '<br></ses>';
                echo "<d style='font-weight: bold'>" . $row['dtime'] . "<br></d>";
                echo nl2br($row["msg"]);
                echo "</div>";
                if ($user == 'admin') {
                    echo '<form action="" method="POST">';
                    echo '<input type="hidden" name="Cid" value="' . $row["Cid"] . '">';
                    echo '<input type="submit" name="delete" value="Delete" class="form-btn">';
                    echo '</form>';
                }
            }
            exit();
        }
        ?>
        <form action="" method="POST">
            <input type="submit" name="showMore" value="Show More" style="font-size: 18px; background-color: yellowgreen ; margin-left: 40%;">
        </form>

    </div>

</body>

</html>